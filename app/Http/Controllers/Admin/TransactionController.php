<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionRequest;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TransactionController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // with = memanggil relasi tabel yang bersangkutan
    // diambil dari method yg udah ada di model Transaction
    $items = Transaction::with(
      ['details', 'travel_package', 'user']
    )->get();

    // panggil view index dan kirim data
    return view(
      'pages.admin.transaction.index',
      [
        'items' => $items
      ]
    );
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(TransactionRequest $request)
  {
    // panggil semua data
    $data = $request->all();

    // slug sebagai penanda seperti id
    $data['slug'] = Str::slug($request->title);

    // panggil model, lalu jalankan fungsi create
    Transaction::create($data);

    // lalu arahkan ke halaman index
    return redirect()->route('transaction.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    // panggil model, dengan relasi lalu sertakan cari id
    $item = Transaction::with(
      [
        'details', 'travel_package', 'user'
      ]
    )->findOrFail($id);

    return view(
      'pages.admin.transaction.detail',
      [
        'item' => $item
      ]
    );
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    // panggil model, sertakan cari id
    $item = Transaction::findOrFail($id);

    return view(
      'pages.admin.transaction.edit',
      [
        'item' => $item
      ]
    );
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(TransactionRequest $request, $id)
  {
    // panggil semua data
    $data = $request->all();

    // slug sebagai penanda seperti id
    $data['slug'] = Str::slug($request->title);

    // panggil model, lalu cari berdasarkan id
    $item = Transaction::findOrFail($id);

    // jalankan fungsi update
    $item->update($data);

    // lalu arahkan ke halaman index
    return redirect()->route('transaction.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    // panggil model, lalu cari berdasarkan id
    $item = Transaction::findOrFail($id);

    // jalankan fungsi delet
    $item->delete();

    // lalu arahkan ke halaman index
    return redirect()->route('transaction.index');
  }
}
