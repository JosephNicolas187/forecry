<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PredictController;
use App\Http\Controllers\SentimentController;
use App\Http\Controllers\AuthController;

// ==================== MIDLEWARE ============================================================================

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', [SentimentController::class, 'getSentimentBeranda'])
    ->name('beranda');

Route::view('/tentang', 'tentang')->name('tentang');
Route::view('/test', 'test')->name('test');

Route::get('/berita', [SentimentController::class, 'getListBerita'])
    ->name('berita.index');

Route::get('/prediksi', [SentimentController::class, 'getSentimentPrediksi'])
    ->name('prediksi.index');

Route::post('/prediksi', [PredictController::class, 'predict'])
    ->name('prediksi.predict');


