<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminPelangganController;

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
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/admin', function () {
    if (auth()->user()->role == "admin") {
        return view('admin.index', [
                "title" => "Admin Dashboard"
            ]);
    } else {
        return redirect()->intended('/');
    }
    // return view('admin.index', [
    //     "title" => "Admin Dashboard"
    // ]);
})->middleware('auth');

Route::get('/produk', [ProdukController::class, 'produk']);
Route::get('/produk/{post:slug}', [ProdukController::class, 'produkshow']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::resource('/admin/data-produk', AdminProdukController::class)->middleware('auth');
// Route::get('/admin/data-produk', [AdminProdukController::class, 'index'])->middleware('auth');
// Route::post('/admin/data-produk', [AdminProdukController::class, 'store'])->middleware('auth');
// Route::delete('/admin/data-produk', [AdminProdukController::class, 'destroy'])->middleware('auth');
Route::resource('/admin/data-pelanggan', AdminPelangganController::class)->middleware('auth');

// Route::get('/admin', [AdminDashboardController::class, 'index'])->middleware('auth');
// Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');
