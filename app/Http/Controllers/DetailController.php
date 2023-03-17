<?php

namespace App\Http\Controllers;

use App\TravelPackage;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request, $slug)
    {
        // hubungkan dengan tabel galleries, cari data berdasarkan slug, dan ambil data pertama
        $item = TravelPackage::with(['galleries'])
            ->where('slug', $slug)
            ->firstOrFail();
        return view(
            'pages.detail',
            [
                'item' => $item
            ]
        );
    }
}
