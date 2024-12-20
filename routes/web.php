<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\PublicCropController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\LedgerController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CroppingController;
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

// QRコードからアクセスされる公開ページ用のルート
Route::get('/crops/public/{id}', [PublicCropController::class, 'show'])->name('crops.public.show');


// 認証が必要なユーザー向けのルート設定
Route::middleware(['auth'])->group(function () {
    Route::resource('crops', CropController::class);
});

// QRコード生成用のルート
Route::middleware(['auth'])->group(function () {
    Route::get('crops/{crop}/generate-qr', [QRCodeController::class, 'create'])->name('qr.create');
    Route::post('crops/{crop}/generate-qr', [QRCodeController::class, 'store'])->name('qr.store');
});

Route::post('/profile/upload-icon', [ProfileController::class, 'uploadIcon'])->name('profile.upload-icon');


// QRコード作成用のルート
Route::post('/qr/create/{crop}', [QRCodeController::class, 'store'])->name('qr.store');

// routes/web.php
Route::get('crops/{crop}/templates', [CropController::class, 'editTemplate'])->name('crops.templates.edit');
Route::post('crops/{crop}/templates', [CropController::class, 'updateTemplate'])->name('crops.templates.update');

Route::get('/crops/preview/{template}', [CropController::class, 'preview'])->name('crops.preview');

Route::get('/crops/preview/{id}/{template}', [CropController::class, 'preview'])->name('crops.preview');

Route::prefix('ledger')->group(function () {
    Route::get('/', [LedgerController::class, 'index'])->name('ledger.index');
    Route::get('/fields', [LedgerController::class, 'fields'])->name('ledger.fields');
    Route::get('/workers', [LedgerController::class, 'workers'])->name('ledger.workers');
    Route::get('/clients', [LedgerController::class, 'clients'])->name('ledger.clients');
    Route::get('/items', [LedgerController::class, 'items'])->name('ledger.items');
    Route::get('/tasks', [LedgerController::class, 'tasks'])->name('ledger.tasks');
    Route::get('/equipment', [LedgerController::class, 'equipment'])->name('ledger.equipment');
    Route::get('/products', [LedgerController::class, 'products'])->name('ledger.products');
});

Route::post('/fields', [FieldController::class, 'store'])->name('fields.store');
Route::post('/workers', [WorkerController::class, 'store'])->name('workers.store');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::post('/equipment', [EquipmentController::class, 'store'])->name('equipment.store');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Route::get('/cropping',[CroppingController::class, 'index'])->name('cropping.index');
Route::get('/cropping/create',[CroppingController::class, 'create'])->name('cropping.create');
Route::post('/cropping',[CroppingController::class, 'store'])->name('cropping.store');

Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/fields', [FieldController::class, 'index'])->name('fields.index');

require __DIR__.'/auth.php';
