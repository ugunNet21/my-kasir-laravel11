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
Route::get('print-invoices/{invoice}/print-pdf', [InvoiceController::class, 'printPdf'])->name('print.invoices');
Route::get('/invoices-status', [InvoiceController::class, 'indexStatus'])->name('invoices.checkStatus');
Route::get('/invoices/{id}/status', [InvoiceController::class, 'checkStatus'])->name('invoices.checkStatus');

