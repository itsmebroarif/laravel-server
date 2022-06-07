<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    // Bagian ini untuk menampilkan data program
    Route::resource('programs', App\Http\Controllers\API\ProgramController::class);
    
    // Bagian ini untuk menampilkan data gallery
    Route::resource('galleries', App\Http\Controllers\API\GalleryController::class);

    // Bagian ini untuk menampilkan data product
    Route::resource('products', App\Http\Controllers\API\ProductController::class);

    // Bagian ini untuk menampilkan data service
    Route::resource('services', App\Http\Controllers\API\ServiceController::class);

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});