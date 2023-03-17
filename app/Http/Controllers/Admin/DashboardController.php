<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Transaction;
use App\TravelPackage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view(
            'pages.admin.dashboard',
            [
                'travel_package' => TravelPackage::count(), // count : menghitung jumlah data yang ada di tabel'    
                'transaction' => Transaction::count(),
                'transaction_pending' => Transaction::where('transaction_status', 'pending')->count(),
                'transaction_success' => Transaction::where('transaction_status', 'success')->count()
            ]
        );
    }
}
