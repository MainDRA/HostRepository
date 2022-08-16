<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\DashboardController;

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

// Test


Route::get('/', [DrugController::class, 'home'])->name('home');

Route::get('/dashboard',[DrugController::class, 'dashboard']);

// Valid and Invalid drugs
Route::get('/listofdrugs',[DrugController::class, 'lists'])->name('list');
Route::get('/listofdrugs/expiry',[DrugController::class, 'expiry'])->name('expiry');

// For create
Route::get('/add_create',[DrugController::class, 'store']);
Route::post('/add_create/create',[DrugController::class, 'create']);


// For show more detail
Route::get('/{id}',[DrugController::class, 'show'])->name('show_case');

// For Certification generation
Route::get('/certification/{id}',[CertificationController::class, 'certification']);

// For Update
Route::get('/edit/{id}',[DrugController::class, 'edit']);
Route::match(['put','patch'],'/update/{id}',[DrugController::class, 'update']);


// Read more
Route::get('/dashboard/expire',[DashboardController::class, 'Expire_more']);
Route::get('/dashboard/manufacturer',[DashboardController::class, 'Manufacturer']);
Route::get('/dashboard/essential',[DashboardController::class, 'Essential']);
Route::get('/dashboard/non_essential',[DashboardController::class, 'Non_essential']);












