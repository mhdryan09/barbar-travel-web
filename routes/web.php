<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Route::get('/detail/{slug}', 'DetailController@index')->name('detail');

// routing untuk proses checkout
Route::post('/checkout/{id}', 'CheckoutController@process')
    ->name('checkout-process')
    ->middleware(['auth', 'verified']);

// routing halaman checkout, id disini adalah id transaction
Route::get('/checkout/{id}', 'CheckoutController@index')
    ->name('checkout')
    ->middleware(['auth', 'verified']);

// routing untuk penambahan member untuk join, selain si user itu sendiri
Route::post('/checkout/create/{detail_id}', 'CheckoutController@create')
    ->name('checkout-create')
    ->middleware(['auth', 'verified']);

// routing untuk menghapus member 
Route::get('/checkout/remove/{detail_id}', 'CheckoutController@remove')
    ->name('checkout-remove')
    ->middleware(['auth', 'verified']);

// routing untuk konfirmasi sukses
Route::get('/checkout/confirm/{id}', 'CheckoutController@success')
    ->name('checkout-success')
    ->middleware(['auth', 'verified']);

Route::prefix('admin') // website.com/admin 
    ->namespace('Admin') // nama folder Controllers
    ->middleware(['auth', 'admin']) // middelware => satpam
    ->group(function () {

        // panggil halaman dashboard
        Route::get('/', 'DashboardController@index')->name('dashboard');

        // panggil TravelController
        Route::resource('travel-package', 'TravelPackageController');

        // panggil GalleryController
        Route::resource('gallery', 'GalleryController');

        // panggil TransactionController
        Route::resource('transaction', 'TransactionController');
    });

Auth::routes(['verify' => true]);
