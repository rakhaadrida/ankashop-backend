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

Route::get('/', 'DashboardController@index')->name('dashboard');

Auth::routes(['register' => false]);

Route::get('product/{id}/gallery', 'ProductController@gallery')->name('productGallery');
Route::resource('product', 'ProductController');
Route::resource('product-gallery', 'ProductGalleryController');
Route::resource('transaction', 'TransactionController');
Route::get('transaction/{id}/status', 'TransactionController@status')
      ->name('transaction-status');
