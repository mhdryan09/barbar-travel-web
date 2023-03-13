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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Route::get('/detail', 'DetailController@index')->name('detail');

Route::get('/checkout', 'CheckoutController@index')->name('checkout');

Route::get('/checkout/success', 'CheckoutController@success')->name('checkout-success');

Route::prefix('admin') // website.com/admin 
    ->namespace('Admin') // nama folder Controllers
    ->middleware(['auth', 'admin']) // middelware => satpam
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');
    });

Auth::routes(['verify' => true]);
