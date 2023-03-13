<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TravelPackageRequest;
use App\TravelPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TravelPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // akses model, dan ambil semua data
        $items = TravelPackage::all();

        // panggil view index dan kirim data
        return view(
            'pages.admin.travel-package.index',
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
        return view('pages.admin.travel-package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TravelPackageRequest $request)
    {
        // panggil semua data
        $data = $request->all();

        // slug sebagai penanda seperti id
        $data['slug'] = Str::slug($request->title);

        // panggil model, lalu jalankan fungsi create
        TravelPackage::create($data);

        // lalu arahkan ke halaman index
        return redirect()->route('travel-package.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $item = TravelPackage::findOrFail($id);

        return view(
            'pages.admin.travel-package.edit',
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
    public function update(TravelPackageRequest $request, $id)
    {
        // panggil semua data
        $data = $request->all();

        // slug sebagai penanda seperti id
        $data['slug'] = Str::slug($request->title);

        // panggil model, lalu cari berdasarkan id
        $item = TravelPackage::findOrFail($id);

        // jalankan fungsi update
        $item->update($data);

        // lalu arahkan ke halaman index
        return redirect()->route('travel-package.index');
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
        $item = TravelPackage::findOrFail($id);

        // jalankan fungsi delet
        $item->delete();

        // lalu arahkan ke halaman index
        return redirect()->route('travel-package.index');
    }
}
