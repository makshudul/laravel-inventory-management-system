<?php

use App\Http\Controllers\BankCostController;
use App\Http\Controllers\BankSavingController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCodeController;
use App\Models\BankSaving;

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

Route::redirect('/', 'login');

Route::get('/dashboard', function () {
    return view('backend.dashboard.dashboard');
})->middleware(['auth'])->name('dashboard');

// Route Product Code Controller
Route::get('/product/code',[ProductCodeController::class,'index'])->name('Product_code');
Route::post('/product/code/insert',[ProductCodeController::class,'store']);

//Route Product Controller
Route::get('/product',[ProductController::class,'index'])->name('product');
Route::post('/product/insert',[ProductController::class,'store']);
Route::get('/product/show',[ProductController::class,'show']);
Route::get('/product/single/data/show/{id}',[ProductController::class,'edit']);
Route::get('/product/delete/{id}',[ProductController::class,'destroy']);
Route::post('/product/update/{id}',[ProductController::class,'update']);

// Route Employee Controller
Route::get('/employee',[EmployeeController::class,'index'])->name('employee');
Route::post('/employee/insert',[EmployeeController::class,'store']);
Route::get('/employee/show',[EmployeeController::class,'show']);
Route::get('/employee/single/data/show/{id}',[EmployeeController::class,'edit']);
Route::get('/employee/delete/{id}',[EmployeeController::class,'destroy']);
Route::post('/employee/update/{id}',[EmployeeController::class,'update']);

// Route Company Controller
Route::get('/company',[CompanyController::class,'index'])->name('company');
Route::post('/company/insert',[CompanyController::class,'store']);
Route::get('/company/show',[CompanyController::class,'show']);
Route::get('/company/single/data/show/{id}',[CompanyController::class,'edit']);
Route::get('/company/delete/{id}',[CompanyController::class,'destroy']);
Route::post('/company/update/{id}',[CompanyController::class,'update']);

// Route Bank Saveing  Controller
Route::get('/bank/saving',[BankSavingController::class,'index'])->name('Banksaving');
Route::post('/bank/saving/insert',[BankSavingController::class,'store']);
Route::get('/bank/saving/show',[BankSavingController::class,'show']);
Route::get('/bank/saving/single/data/show/{id}',[BankSavingController::class,'edit']);
Route::get('/bank/saving/delete/{id}',[BankSavingController::class,'destroy']);
Route::post('/bank/saving/update/{id}',[BankSavingController::class,'update']);

// Route Bank Cost Controller
Route::get('/bank/cost',[BankCostController::class,'index'])->name('Bankcost');
Route::post('/bank/cost/insert',[BankCostController::class,'store']);
Route::get('/bank/cost/show',[BankCostController::class,'show']);
Route::get('/bank/cost/single/data/show/{id}',[BankCostController::class,'edit']);
Route::get('/bank/cost/delete/{id}',[BankCostController::class,'destroy']);
Route::post('/bank/cost/update/{id}',[BankCostController::class,'update']);

// Route Cost Controller
Route::get('/cost',[CostController::class,'index'])->name('cost');
Route::post('/cost/insert',[CostController::class,'store']);
Route::get('/cost/show',[CostController::class,'show']);
Route::get('/cost/single/data/show/{id}',[CostController::class,'edit']);
Route::get('/cost/delete/{id}',[CostController::class,'destroy']);
Route::post('/cost/update/{id}',[CostController::class,'update']);

require __DIR__.'/auth.php';
