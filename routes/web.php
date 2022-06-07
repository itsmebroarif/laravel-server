<?php

use Illuminate\Support\Facades\Route;

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

// Ketika Sudah Berhasil Login Maka Langsung Di Arahkan Ke Halaman Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


route::view('/', 'welcome');

route::view('/about', 'about')
->name('about');

route::view('/gallery', 'gallery')
->name('gallery');

route::view('/product', 'product')
->name('product');

route::view('/service', 'service')
->name('service');

route::view('/contact', 'contact')
->name('contact');





require __DIR__.'/auth.php';