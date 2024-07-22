<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin-login',[LoginController::class,'login'])->name('admin.login');
Route::post('admin-auth',[LoginController::class,'login_auth'])->name('admin.auth');

Route::middleware('auth:admin')->group( function () {
    Route::get('admin-dash',[DashboardController::class,'dashboard'])->name('admin.dashboard');
    Route::get('admin/logout',[LoginController::class,'logout'])->name('admin.logout');
});

