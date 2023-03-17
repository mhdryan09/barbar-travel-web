<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use App\Gallery;
use App\TravelPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class GalleryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // akses model dgn relasi tabel travel_package
    $items = Gallery::with(['travel_package'])->get();

    // panggil view index dan kirim data
    return view(
      'pages.admin.gallery.index',
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
    // ambil semua data
    $travel_packages = TravelPackage::all();

    // panggil view dan kirim data
    return view(
      'pages.admin.gallery.create',
      [
        'travel_packages' => $travel_packages
      ]
    );
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(GalleryRequest $request)
  {
    // panggil semua data
    $data = $request->all();

    // tambah data image, lalu jalankan fungsi store untuk menyimpan data gambar
    $data['image'] = $request->file('image')->store(
      'assets/gallery',
      'public'
    );

    // panggil model, lalu jalankan fungsi create
    Gallery::create($data);

    // lalu arahkan ke halaman index
    return redirect()->route('gallery.index');
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
    $item = Gallery::findOrFail($id);

    // ambil semua data
    $travel_packages = TravelPackage::all();

    // panggil halaman dan kirimkan data diatas
    return view(
      'pages.admin.gallery.edit',
      [
        'item' => $item,
        'travel_packages' => $travel_packages
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
  public function update(GalleryRequest $request, $id)
  {
    // panggil semua data
    $data = $request->all();

    // tambah data image, lalu jalankan fungsi store untuk menyimpan data gambar
    $data['image'] = $request->file('image')->store(
      'assets/gallery',
      'public'
    );

    // panggil model, lalu cari berdasarkan id
    $item = Gallery::findOrFail($id);

    // jalankan fungsi update
    $item->update($data);

    // lalu arahkan ke halaman index
    return redirect()->route('gallery.index');
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
    $item = Gallery::findOrFail($id);

    // jalankan fungsi delet
    $item->delete();

    // lalu arahkan ke halaman index
    return redirect()->route('gallery.index');
  }
}
