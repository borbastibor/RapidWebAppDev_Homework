<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index']);
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index']);
Route::get('/supporter', [App\Http\Controllers\SupportController::class, 'index']);
Route::get('/gallery', [App\Http\Controllers\GalleryController::class, 'index']);
Route::post('/gallery/store', [App\Http\Controllers\GalleryController::class, 'store']);
Route::post('/contact/store', [App\Http\Controllers\ContactController::class, 'store']);
Route::resource('files', App\Http\Controllers\FileController::class)->except(['show']);
Route::resource('messages', App\Http\Controllers\MessageController::class)->except(['show', 'create']);
Route::resource('users', App\Http\Controllers\UserController::class)->except(['show']);
