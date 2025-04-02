<?php

use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return "ABOUT PAGE";
});

//Nhóm tiền tố lại thành 1
Route::prefix('admin')->group(function () {
    Route::get('/posts', function () {
        return "Admin Posts";
    });
    Route::get('/users', function () {
        return "Admin Users";
    });
});

//Khai báo tham số
Route::get('/posts/{id}', function ($id) {
    return "POST ID: " . $id;
});
Route::get('/posts/{id}/comments/{c_id}', function ($id, $c_id) {
    return "POST ID: $id & comment id: $c_id";
})->name('posts.comment');

Route::get('/posts', [PostController::class, 'index']);

Route::get('/test', [ProductController::class, 'index']);
Route::get('/test2', [ProductController::class, 'list']);


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('/products', AdminProductController::class);
    Route::get('/variants/{id}/product', [ProductVariantController::class, 'index'])->name('variants.index');
    Route::get('/variants/{id}/create', [ProductVariantController::class, 'create'])->name('variants.create');
    Route::post('/variants', [ProductVariantController::class, 'store'])->name('variants.store');
    Route::get('/variants/{id}/edit', [ProductVariantController::class, 'edit'])->name('variants.edit');
    Route::put('/variants/{id}', [ProductVariantController::class, 'update'])->name('variants.update');
    Route::delete('/variants/{id}', [ProductVariantController::class, 'destroy'])->name('variants.destroy');
});


