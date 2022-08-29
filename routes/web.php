<?php

use App\Http\Controllers\BankCostController;
use App\Http\Controllers\BankSavingController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCodeController;
use App\Http\Controllers\PurchaseController;
use App\Models\BankSaving;
use App\Models\Branch;

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

// Route Branch Group Controller
Route::prefix('/branch')->group(function () {
Route::get('/index',[BranchController::class,'index'])->name('branch');
Route::post('/insert',[BranchController::class,'store']);
Route::get('/show',[BranchController::class,'show']);
Route::get('/single/data/show/{id}',[BranchController::class,'edit']);
Route::get('/delete/{id}',[BranchController::class,'destroy']);
Route::post('/update/{id}',[BranchController::class,'update']);
});

// Route purchase Group Controller
Route::prefix('/purchase')->group(function () {
Route::get('/index',[PurchaseController::class,'index'])->name('purchase');
Route::post('/insert',[PurchaseController::class,'store']);
Route::get('/show',[PurchaseController::class,'show']);
Route::get('/single/data/show/{id}',[PurchaseController::class,'edit']);
Route::get('/delete/{id}',[PurchaseController::class,'destroy']);
Route::post('/update/{id}',[PurchaseController::class,'update']);

Route::get('/branch/show',[PurchaseController::class,'showbranchName']);
Route::get('/branch/company/show/{company_id}/{branch_name}',[PurchaseController::class,'CompanyItemShow']);
Route::get('/product/show/{product_id}/{branch_name}',[PurchaseController::class,'ProductItemShow']);
});

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
Route::get('/bank/saving/branch/show',[BankCostController::class,'showbranchName']);
Route::get('/bank/saving/single/data/show/{id}',[BankSavingController::class,'edit']);
Route::get('/bank/saving/delete/{id}',[BankSavingController::class,'destroy']);
Route::post('/bank/saving/update/{id}',[BankSavingController::class,'update']);

// Route Bank Cost Controller
Route::get('/bank/cost',[BankCostController::class,'index'])->name('Bankcost');
Route::post('/bank/cost/insert',[BankCostController::class,'store']);
Route::get('/bank/cost/show',[BankCostController::class,'show']);
Route::get('/bank/branch/show',[BankCostController::class,'showbranchName']);
Route::get('/bank/cost/single/data/show/{id}',[BankCostController::class,'edit']);
Route::get('/bank/cost/delete/{id}',[BankCostController::class,'destroy']);
Route::post('/bank/cost/update/{id}',[BankCostController::class,'update']);

// Route Cost Controller with group
Route::prefix('/cost')->group(function () {
Route::get('/view',[CostController::class,'index'])->name('cost');
Route::post('/insert',[CostController::class,'store']);
Route::get('/show',[CostController::class,'show']);
Route::get('/single/data/show/{id}',[CostController::class,'edit']);
Route::get('/delete/{id}',[CostController::class,'destroy']);
Route::post('/update/{id}',[CostController::class,'update']);
});
require __DIR__.'/auth.php';
