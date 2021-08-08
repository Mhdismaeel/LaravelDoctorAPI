<?php

use Illuminate\Support\Facades\Route;

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
    return view('Dashboard/charts/charts');
});


Route::get('/Doctors',[App\Http\Controllers\Web\Doctors::class,'index'])->name('Doctors');
Route::get('/DeleteDoctor/{id}',[App\Http\Controllers\Web\Doctors::class,'destroy']);
Route::get('/CreateDoctor',[App\Http\Controllers\Web\Doctors::class, 'create']);
Route::post('/StoreDoctor',[App\Http\Controllers\Web\Doctors::class, 'store'])->name('StoreDoctor');
Route::get('/EditDoctor/{id}',[App\Http\Controllers\Web\Doctors::class, 'edit'])->name('EditDoctor');
Route::post('/UpdateDoctor/{id}',[App\Http\Controllers\Web\Doctors::class, 'update'])->name('UpdateDoctor');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
