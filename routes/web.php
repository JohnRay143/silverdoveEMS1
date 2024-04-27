<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('events', EventController::class);
Route::resource('staffs', StaffController::class);
Route::resource('users', UserController::class);
Route::resource('customers', CustomerController::class);

Auth::routes();

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

Route::middleware(['auth', 'user-access:staff'])->group(function () {
    Route::post('events/{event}/confirm', [EventController::class, 'confirm'])->name('events.confirm');
    Route::get('/staff/home', [HomeController::class, 'staffHome'])->name('staff.home');
});