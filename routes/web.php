<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

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
Route::get('storage/{filename}', function ($filename)
{
    $path = storage_path('app/public/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = new Response($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index']);
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index']);
Route::get('/supporter', [App\Http\Controllers\SupportController::class, 'index']);
Route::get('/gallery', [App\Http\Controllers\GalleryController::class, 'index']);
Route::post('/gallery/store', [App\Http\Controllers\GalleryController::class, 'store']);
Route::post('/contact/store', [App\Http\Controllers\ContactController::class, 'store']);
Route::post('/message/order', [App\Http\Controllers\MessageController::class, 'order_data']);
Route::post('/file/order', [App\Http\Controllers\FileController::class, 'order_data']);
Route::post('/user/order', [App\Http\Controllers\UserController::class, 'order_data']);
Route::resource('files', App\Http\Controllers\FileController::class)->except(['show']);
Route::resource('messages', App\Http\Controllers\MessageController::class)->except(['show', 'create']);
Route::resource('users', App\Http\Controllers\UserController::class)->except(['show']);
