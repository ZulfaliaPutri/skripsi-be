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
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('landingpage.index', [
        "title" => "Landingpage"
    ]);
});
Route::get('/landingpage', [LandingpageController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/rekomendasi', [RekomendasiController::class, 'index']);
Route::get('/rekomendasilanding', [RekomendasilandingController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/profile', [ProfileController::class, 'index']);

Route::get('/aboutus', [AboutController::class, 'index']);
Route::get("/aboutdash", [AboutdashController::class, 'index']);

Route::get("/food", [FoodController::class, 'index']);
Route::get("/makanan", [MakananController::class, 'index']);

Route::get("/clothes", [ClothesController::class, 'index']);
Route::get("/pakaian", [PakaianController::class, 'index']);

Route::get('/sharingmakanan', [SharingMakananController::class, 'index']);
Route::get('/sharingpakaian', [SharingpakaianController::class, 'index']);
Route::get('/sharingfood', [SharingfoodController::class, 'index']);

Route::get('/test', [RekomendasiController::class, 'test']);
