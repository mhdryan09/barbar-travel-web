<?php

namespace App\Http\Controllers;

use App\TravelPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // ambil data dari tabel galleries
        // with sebagai relasi tabel
        $items = TravelPackage::with(['galleries'])->get();
        return view(
            'pages.home',
            [
                'items' => $items
            ]
        );
    }
}
