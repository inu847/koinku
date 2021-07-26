<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UmkmController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('home');

Route::prefix('umkm')->group(function () {
    Route::get('login', [AuthController::class, 'todoLogin'])->name('todoLogin');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('register', [AuthController::class, 'todoRegistrasi'])->name('todoRegistrasi');

    Route::get('dashboard', [UmkmController::class, 'dashboard'])->name('dashboard');
    Route::get('account-setting', [UmkmController::class, 'todoSetting'])->name('umkm.account');
    Route::put('account-setting', [UmkmController::class, 'setting'])->name('umkm.updateAccount');
});
