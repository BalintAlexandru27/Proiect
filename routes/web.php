<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
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

Route::get('/home', 'App\Http\Controllers\HomeController@index');
Route::get('/', 'App\Http\Controllers\AlbumsController@index');
Route::get('/albums', 'App\Http\Controllers\AlbumsController@index');
Route::get('/albums/create', 'App\Http\Controllers\AlbumsController@create')->name('album-create');
Route::post('/albums/store', 'App\Http\Controllers\AlbumsController@store')->name('album-store');
Route::get('/albums/{id}', 'App\Http\Controllers\AlbumsController@show')->name('album-show');

Route::get('/photos/create/{albumId}', 'App\Http\Controllers\PhotosController@create')->name('photo-create');
//Route::get('/photos/createThumbnail', 'App\Http\Controllers\PhotosController@createThumbnails');
Route::post('/photos/store', 'App\Http\Controllers\PhotosController@store')->name('photo-store');
Route::get('/photos/edit/{albumId}', 'App\Http\Controllers\PhotosController@edit')->name('photo-edit');
Route::put('/photos/update/{id}', 'App\Http\Controllers\PhotosController@update');
Route::get('/photos/{id}', 'App\Http\Controllers\PhotosController@show')->name('photo-show');

Route::get('/albums/search', 'App\Http\Controllers\AlbumsController@search')->name('search');

//Route::get('/', [AlbumsController::class, 'index']);
//Route::get('/albums', [AlbumsController::class, 'index']);
//Route::get('/albums/create', [AlbumsController::class, 'create']);
//Route::get('/albums/store', [AlbumsController::class, 'store']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
