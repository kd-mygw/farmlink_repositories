<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CropController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 認証が必要なユーザー向けのルート設定
Route::middleware(['auth'])->group(function () {
    Route::resource('crops', CropController::class);
});


require __DIR__.'/auth.php';
