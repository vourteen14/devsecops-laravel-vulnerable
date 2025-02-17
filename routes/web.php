<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('/upload', [FileController::class, 'showUploadForm'])->middleware('auth')->name('upload');
Route::post('/upload', [FileController::class, 'uploadFile']);
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery')->middleware('auth');
Route::get('/users', [UserController::class, 'index'])->name('users')->middleware('auth');;
