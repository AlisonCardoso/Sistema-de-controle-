<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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

    Route::resources(['vehicles'=>VehicleController::class]);
    Route::resources(['customers'=> CustomerController::class]);
    Route::resources(['products'=> ProductController::class]);
    Route::resources(['categories'=> CategoryController::class]);

    Route::get('/admin', [UserController::class, 'index'])->name('user.index');

Route::group(['prefix' => 'admin/user'], function () {
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/add', [UserController::class, 'store'])->name('user.store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::post('/delete', [UserController::class, 'destroy'])->name('user.delete');

});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/create', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::post('/delete', [CategoryController::class, 'destroy'])->name('categories.delete');

});

});





require __DIR__.'/auth.php';
