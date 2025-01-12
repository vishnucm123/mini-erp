<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;




Route::get('/', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::group([
    'middleware' => 'useradmin',
    'prefix' => 'panel'
], function(){

    Route::get('dashboard',[DashboardController::class,'dashboard']);
    Route::resource('users',UserController::class)->except(['show']);
    Route::get('users/data', [UserController::class, 'getData'])->name('users.data');
    Route::resource('customers', CustomerController::class)->except(['show']);
    Route::get('customers/data', [CustomerController::class, 'getData'])->name('customers.data');
    Route::resource('invoices', InvoiceController::class)->except(['show']);
    Route::get('invoices/data', [InvoiceController::class, 'getData'])->name('invoices.data');



});

