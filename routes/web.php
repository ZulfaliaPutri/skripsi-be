<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AboutdashController;
use App\Http\Controllers\ClothesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\LandingpageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\PakaianController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProdukdashController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecommendController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\RekomendasilandingController;
use App\Http\Controllers\SharingfoodController;
use App\Http\Controllers\SharingMakananController;
use App\Http\Controllers\SharingpakaianController;
use App\Models\Clothes;

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

Route::get('/', [LandingpageController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/rekomendasi', [RekomendasiController::class, 'index'])->name("rekomendasi");
Route::get('/rekomendasilanding', [RekomendasilandingController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/profile', [ProfileController::class, 'index']);

Route::get('/aboutus', [AboutController::class, 'index']);
Route::get("/aboutdash", [AboutdashController::class, 'index']);

Route::get('/sharingmakanan', [SharingMakananController::class, 'index'])->name("sharing-makanan");
Route::post('/sharingmakanan', [SharingMakananController::class, 'store'])->name("sharing-makanan");
Route::get('/sharingpakaian', [SharingpakaianController::class, 'index'])->name("sharing-pakaian");
Route::post('/sharingpakaian', [SharingpakaianController::class, 'store'])->name("sharing-pakaian");
Route::get('/sharingfood', [SharingfoodController::class, 'index']);

Route::get('/produk/{id}', [ProdukController::class, 'index']);
Route::post('/produk/{id}', [ProdukController::class, 'store'])->name("rate-product");
Route::get('produkdash', [ProdukdashController::class, 'index']);

Route::get('/test', [RecommendController::class, 'index']);
