<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SparePartController;
use App\Http\Controllers\Admin\TechnicianController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\RepairStatusController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TaxController;


Route::get('/', function () {
    return view('welcome');
});


Route::resource('customers', CustomerController::class);
Route::resource('invoices', InvoiceController::class);
Route::resource('services', ServiceController::class);
Route::resource('spareparts', SparePartController::class);
Route::resource('technicians', TechnicianController::class);
Route::resource('paymentmethods', PaymentMethodController::class);
Route::resource('repairstatuses', RepairStatusController::class);
Route::resource('categories', CategoryController::class);
Route::resource('taxes', TaxController::class);
