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
    return view('welcome');
});

Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('get_company', [App\Http\Controllers\CompanyController::class, 'get_company'])->name('get_company');
Route::get('/admin/employes/cetak_pdf', [App\Http\Controllers\EmployeController::class, 'cetak_pdf'])->name('cetak_pdf');
Route::resource('/admin/company', App\Http\Controllers\CompanyController::class)->middleware('auth');
Route::resource('/admin/employes', App\Http\Controllers\EmployeController::class)->middleware('auth');
route::get('/soal_1', [App\Http\Controllers\SoalController::class, 'soal_1']);
route::get('/soal_2', [App\Http\Controllers\SoalController::class, 'soal_2']);
route::get('/soal_3', [App\Http\Controllers\SoalController::class, 'soal_3']);