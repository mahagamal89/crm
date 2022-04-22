<?php

use App\Models\Customer;
use App\Http\Livewire\Admin;
use App\Http\Controllers\Login;
use App\Http\Controllers\Logout;
use App\Http\Livewire\Customers;
use App\Http\Controllers\Register;
use App\Http\Livewire\CreateCustomer;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ViewEmployeeCustomers;
use App\Http\Livewire\ViewEmployeesCustomer;

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
    return redirect()->route('register.index');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', Admin::class)->name('admin');
    Route::get('/admin/{employee}/customers', ViewEmployeeCustomers::class)->name('admin.employee.customers');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/customers', Customers::class)->name('admin.customers.index');
    Route::get('/admin/customers/create', CreateCustomer::class)->name('admin.customers.create');
    Route::post('/logout', Logout::class)->name('logout');
});

Route::resource('register', Register::class)->only('index');
Route::resource('login', Login::class)->only('index');