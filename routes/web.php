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
use App\Http\Controllers\RecordController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\SeedController;
use App\Http\Controllers\PesticideController;
use App\Http\Controllers\FertilizerController;
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

// 作付関連
Route::get('/cropping',[CroppingController::class, 'index'])->name('cropping.index');
Route::get('/cropping/create',[CroppingController::class, 'create'])->name('cropping.create');
Route::post('/cropping',[CroppingController::class, 'store'])->name('cropping.store');

// 台帳関連
Route::get('/ledger', function () {
    return view('ledger.index'); // 台帳のトップページを指すビューを指定
})->name('ledger.index');

Route::middleware(['auth'])->group(function () {
    // 圃場関連
    Route::prefix('ledger/fields')->group(function () {
        Route::get('/', [FieldController::class, 'index'])->name('ledger.fields.index');
        Route::get('/create', [FieldController::class, 'create'])->name('ledger.fields.create');
        Route::post('/', [FieldController::class, 'store'])->name('ledger.fields.store');
        Route::get('/{field}/edit', [FieldController::class, 'edit'])->name('ledger.fields.edit');
        Route::patch('/{field}', [FieldController::class, 'update'])->name('ledger.fields.update');
    });
    // 作業者関連
    Route::prefix('ledger/workers')->group(function () {
        Route::get('/', [WorkerController::class, 'index'])->name('ledger.workers.index');
        Route::get('/create', [WorkerController::class, 'create'])->name('ledger.workers.create');
        Route::post('/', [WorkerController::class, 'store'])->name('ledger.workers.store');
        Route::get('/{worker}/edit', [WorkerController::class, 'edit'])->name('ledger.workers.edit');
        Route::patch('/{worker}', [WorkerController::class, 'update'])->name('ledger.workers.update');
    });
    // 顧客関連
    Route::prefix('ledger/clients')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('ledger.clients.index');
        Route::get('/create', [ClientController::class, 'create'])->name('ledger.clients.create');
        Route::post('/', [ClientController::class, 'store'])->name('ledger.clients.store');
        Route::get('/{client}/edit', [ClientController::class, 'edit'])->name('ledger.clients.edit');
        Route::patch('/{client}', [ClientController::class, 'update'])->name('ledger.clients.update');
    });
    // 品目関連
    Route::prefix('ledger/items')->group(function () {
        Route::get('/', [ItemController::class, 'index'])->name('ledger.items.index');
        Route::get('/create', [ItemController::class, 'create'])->name('ledger.items.create');
        Route::post('/', [ItemController::class, 'store'])->name('ledger.items.store');
        Route::get('/{item}/edit', [ItemController::class, 'edit'])->name('ledger.items.edit');
        Route::patch('/{item}', [ItemController::class, 'update'])->name('ledger.items.update');
    });
    // 作業関連
    Route::prefix('ledger/tasks')->group(function () {
        Route::get('/', [TaskController::class, 'index'])->name('ledger.tasks.index');
        Route::get('/create', [TaskController::class, 'create'])->name('ledger.tasks.create');
        Route::post('/', [TaskController::class, 'store'])->name('ledger.tasks.store');
        Route::get('/{task}/edit', [TaskController::class, 'edit'])->name('ledger.tasks.edit');
        Route::patch('/{task}', [TaskController::class, 'update'])->name('ledger.tasks.update');
    });
    // 設備関連
    Route::prefix('ledger/equipment')->group(function () {
        Route::get('/', [EquipmentController::class, 'index'])->name('ledger.equipment.index');
        Route::get('/create', [EquipmentController::class, 'create'])->name('ledger.equipment.create');
        Route::post('/', [EquipmentController::class, 'store'])->name('ledger.equipment.store');
        Route::get('/{equipment}/edit', [EquipmentController::class, 'edit'])->name('ledger.equipment.edit');
        Route::patch('/{equipment}', [EquipmentController::class, 'update'])->name('ledger.equipment.update');
    });
    // 商品関連
    Route::prefix('ledger/products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('ledger.products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('ledger.products.create');
        Route::post('/', [ProductController::class, 'store'])->name('ledger.products.store');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('ledger.products.edit');
        Route::patch('/{product}', [ProductController::class, 'update'])->name('ledger.products.update');
    });

    // 資材関連
    Route::prefix('materials')->group(function () {
        // 資材カテゴリ一覧ページ
        Route::get('/', [MaterialController::class, 'index'])->name('materials.index');
    
        // 種苗
        Route::prefix('seeds')->group(function () {
            Route::get('/', [SeedController::class, 'index'])->name('materials.seeds.index');
            Route::get('/create', [SeedController::class, 'create'])->name('materials.seeds.create');
            Route::post('/', [SeedController::class, 'store'])->name('materials.seeds.store');
            Route::get('/{material}/edit', [SeedController::class, 'edit'])->name('materials.seeds.edit');
            Route::patch('/{material}', [SeedController::class, 'update'])->name('materials.seeds.update');
        });
    
        // 農薬
        Route::prefix('pesticides')->group(function () {
            Route::get('/', [PesticideController::class, 'index'])->name('materials.pesticides.index');
            Route::get('/create', [PesticideController::class, 'create'])->name('materials.pesticides.create');
            Route::post('/', [PesticideController::class, 'store'])->name('materials.pesticides.store');
            Route::get('/{material}/edit', [PesticideController::class, 'edit'])->name('materials.pesticides.edit');
            Route::patch('/{material}', [PesticideController::class, 'update'])->name('materials.pesticides.update');
        });
    
        // 肥料
        Route::prefix('fertilizers')->group(function () {
            Route::get('/', [FertilizerController::class, 'index'])->name('materials.fertilizers.index');
            Route::get('/create', [FertilizerController::class, 'create'])->name('materials.fertilizers.create');
            Route::post('/', [FertilizerController::class, 'store'])->name('materials.fertilizers.store');
            Route::get('/{material}/edit', [FertilizerController::class, 'edit'])->name('materials.fertilizers.edit');
            Route::patch('/{material}', [FertilizerController::class, 'update'])->name('materials.fertilizers.update');
        });
    
        // 床土
        Route::prefix('soil')->group(function () {
            Route::get('/', [MaterialController::class, 'soilIndex'])->name('materials.soil.index');
            Route::get('/create', [MaterialController::class, 'soilCreate'])->name('materials.soil.create');
            Route::post('/', [MaterialController::class, 'soilStore'])->name('materials.soil.store');
            Route::get('/{material}/edit', [MaterialController::class, 'soilEdit'])->name('materials.soil.edit');
            Route::patch('/{material}', [MaterialController::class, 'soilUpdate'])->name('materials.soil.update');
        });
    
        // 資材
        Route::prefix('materials')->group(function () {
            Route::get('/', [MaterialController::class, 'materialsIndex'])->name('materials.materials.index');
            Route::get('/create', [MaterialController::class, 'materialsCreate'])->name('materials.materials.create');
            Route::post('/', [MaterialController::class, 'materialsStore'])->name('materials.materials.store');
            Route::get('/{material}/edit', [MaterialController::class, 'materialsEdit'])->name('materials.materials.edit');
            Route::patch('/{material}', [MaterialController::class, 'materialsUpdate'])->name('materials.materials.update');
        });
    });
});


require __DIR__.'/auth.php';
