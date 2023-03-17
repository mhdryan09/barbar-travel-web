<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TravelPackage;
use App\Transaction;
use App\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Traversable;

class CheckoutController extends Controller
{
    public function index(Request $request, $id)
    {
        // ambil data dari tabel transaction yang be-relasi ke tabel berikut
        $item = Transaction::with(['details', 'travel_package', 'user'])->findOrFail($id);

        return view(
            'pages.checkout',
            [
                'item' => $item
            ]
        );
    }

    // process : memasukkan data ke tabel transaction
    public function process(Request $request, $id)
    {
        // ambil data dari tabel travel_package berdasarkan id
        $travel_package = TravelPackage::findOrFail($id);

        // tambahkan data ke tabel transaction
        $transaction = Transaction::create(
            [
                'travel_packages_id' => $id,
                'users_id' => Auth::user()->id, // diambil dari user yang login,
                'additional_visa' => 0,
                'transaction_total' => $travel_package->price, // ambil dari harga di tabel travel_package
                'transaction_status' => 'IN_CART',
            ]
        );

        // tambahkan data ke tabel transaction_details
        TransactionDetail::create(
            [
                'transactions_id' => $transaction->id,
                'username' => Auth::user()->username,
                'nationality' => 'ID',
                'is_visa' => false,
                'doe_passport' => Carbon::now()->addYears(5)
            ]
        );

        // arahkan ke halaman checkout, dan kirim transaksi id
        return redirect()->route('checkout', $transaction->id);
    }

    public function create(Request $request, $id)
    {
        // validasi inputan dari user alias $request
        $request->validate(
            [
                'username' => 'required|string|exists:users,username',
                'is_visa' => 'boolean|required',
                'doe_passport' => 'required'
            ]
        );

        // ambil semua data
        $data = $request->all();

        // tambahkan data transactions_id dari id transaction
        $data['transactions_id'] = $id;

        // masukan semua data di atas ke tabel transaction_details
        TransactionDetail::create($data);

        // hubungkan tabel transaction dengan tabel travel_package, dan cari data berdasarkan id travel_package
        $transaction = Transaction::with(['travel_package'])->find($id);

        // jika is_visa bernilai true, alias ada
        if ($request->is_visa) {
            // update transaction_total
            $transaction->transaction_total += 190;
            $transaction->additional_visa += 190;
        }

        // update total transaction dari harga travel_package
        $transaction->transaction_total += $transaction->travel_package->price;

        // jalankan fungsi save / simpan data
        $transaction->save();

        // arahkan ke halaman checkout, dengan mengirimkan data id dari transaksi trsebut
        return redirect()->route('checkout', $id);
    }

    public function success(Request $request, $id)
    {
        // ambil id dari tabel transction_details
        $transaction = Transaction::findOrFail($id);

        // update transaction_status
        $transaction->transaction_status = 'PENDING';

        // simpan data
        $transaction->save();

        // arahkan ke halaman success,
        return view('pages.success');
    }

    public function remove(Request $request, $detail_id)
    {
        // ambil id dari tabel transaction_details
        $item = TransactionDetail::findOrFail($detail_id);

        // relasikan tabel transaction dgn tabel transaction_details dan travel_package
        // lalu ambil data dari kolom transactions_id 
        $transaction = Transaction::with(['details', 'travel_package'])
            ->findOrFail($item->transactions_id);

        // jika is_visa bernilai true, alias ada
        if ($item->is_visa) {
            // update transaction_total
            $transaction->transaction_total -= 190;
            $transaction->additional_visa -= 190;
        }

        // update total transaction dari harga travel_package
        $transaction->transaction_total -= $transaction->travel_package->price;

        // jalankan fungsi save / simpan data
        $transaction->save();

        // hapus data dari tabel transaction_details
        $item->delete();

        // arahkan ke halaman checkout, dengan mengirimkan data id dari transaction_details
        return redirect()->route('checkout', $item->transactions_id);
    }
}
