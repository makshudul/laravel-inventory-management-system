<?php

use App\Http\Controllers\BankCostController;
use App\Http\Controllers\BankSavingController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductReturnController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\StockAndNeedbuyController;
use App\Http\Controllers\AdminApprovedController;
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
Route::post('/insert/summaries',[PurchaseController::class,'storeSummary']);
Route::get('/show',[PurchaseController::class,'show']);
Route::get('/delete/{slug}',[PurchaseController::class,'destroy']);
Route::get('/branch/show',[PurchaseController::class,'showbranchName']);
Route::get('/branch/company/show/{company_id}/{branch_name}',[PurchaseController::class,'CompanyItemShow']);
Route::get('/product/show/{product_id}/{branch_name}',[PurchaseController::class,'ProductItemShow']);
});

// Route sales Group Controller
Route::prefix('/sales')->group(function () {
Route::get('/index',[SalesController::class,'index'])->name('sales');
Route::post('/insert',[SalesController::class,'store']);
Route::post('/insert/summaries',[SalesController::class,'storeSummary']);
Route::get('/show/{invoice}',[SalesController::class,'show']);
Route::get('/delete/{id}',[SalesController::class,'destroy']);
Route::get('/branch/show',[SalesController::class,'showbranchName']);
Route::get('/product/show/{product_id}/{branch_name}',[SalesController::class,'ProductItemShow']);
Route::get('/product/sales/{invoice}',[SalesController::class,'invoice'])->name('invoice');
});
// Route Stock Group Controller
Route::prefix('/stock')->group(function () {
Route::get('/index',[StockAndNeedbuyController::class,'index'])->name('StockProduct');
Route::get('/buyNeed/product',[StockAndNeedbuyController::class,'BuyNeed'])->name('BuyNeed');
});


// Route income  Group Controller
    Route::prefix('/income')->group(function () {
    Route::get('/index/daily/income',[IncomeController::class,'index'])->name('dailyincome');
    Route::get('/index/monthly/income',[IncomeController::class,'monthlyindex'])->name('monthlyincome');
    Route::get('/index/Yearly/income',[IncomeController::class,'yearlyindex'])->name('yearlyincome');
     });

     // Route Approved system.
     Route::prefix('/approved')->group(function(){
        Route::get('/index/Admin/Approved',[AdminApprovedController::class,'index'])->name('adminArppovedindex');
        // Route::get('/index/monthly/income',[AdminApprovedController::class,'monthlyindex'])->name('monthlyincome');
        // Route::get('/index/Yearly/income',[AdminApprovedController::class,'yearlyindex'])->name('yearlyincome');
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
// Route product return Controller with group
Route::prefix('/product/return')->group(function () {
Route::get('/view',[ProductReturnController::class,'index'])->name('productReturn');
Route::post('/insert',[ProductReturnController::class,'store']);
Route::get('/show',[ProductReturnController::class,'show']);
Route::get('/single/data/show/{id}',[ProductReturnController::class,'edit']);
Route::get('/delete/{id}',[ProductReturnController::class,'destroy']);
Route::post('/update/{id}',[ProductReturnController::class,'update']);
});
// Route product return Controller with group
Route::prefix('/profile')->group(function () {
Route::get('/view',[ProfileController::class,'index'])->name('ProfileView');
});
require __DIR__.'/auth.php';
