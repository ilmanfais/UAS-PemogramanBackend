<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\BukuController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\KategoriController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

    Route::resource('kategori', KategoriController::class)->middleware('auth');
    Route::resource('inventaris', InventarisController::class)->middleware('auth');
    Route::resource('gedung', GedungController::class)->middleware('auth');



    // Export PDF 
    Route::get('inventarispdf',[InventarisController::class,'inventarisPDF'])->middleware('auth');
    Route::get('gedungpdf',[GedungController::class,'gedungpdf'])->middleware('auth');
    Route::get('kategoripdf',[KategoriController::class,'kategoripdf'])->middleware('auth');
    // Export Excel/CSV
    Route::get('inventariscsv',[InventarisController::class,'inventariscsv'])->middleware('auth');
    Route::get('gedungcsv',[GedungController::class,'gedungcsv'])->middleware('auth');
    Route::get('kategoricsv',[KategoriController::class,'kategoricsv'])->middleware('auth');

    Auth::routes();
    Route::get('/home',
    [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/afterRegister', function () {
        return view('layouts.afterRegister');
    });

    Route::get('/users', function () {
        return view('layouts.users');
    });