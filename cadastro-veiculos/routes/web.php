<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;


Route::get('/', function () {
    return view('welcome');
});
//Route::resource('vehicles', VehicleController::class);

Route::get('/vehicles', [VehicleController::class,'index'])->name('vehicles.index');
Route::get('/vehicles/create', [VehicleController::class,'create'])->name('vehicles.create');
Route::post('/vehicles', [VehicleController::class,'store'])->name('vehicles.store');
Route::get('/vehicles{vehicle}', [VehicleController::class,'show'])->name('vehicles.show');
Route::get('/vehicles{vehicle}/edit', [VehicleController::class,'edit'])->name('vehicles.edit');
Route::put('/vehicles{vehicle}', [VehicleController::class,'update'])->name('vehicles.update');
Route::delete('/vehicles{vehicle}', [VehicleController::class,'destroy'])->name('vehicles.destroy');

