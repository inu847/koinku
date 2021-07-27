<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BuyerController;
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

Route::get('/', [BuyerController::class, 'index'])->name('home');
Route::get('/umkm', [BuyerController::class, 'getUmkm'])->name('filterUmkm');

Route::prefix('umkm')->middleware('umkm')->group(function () {
    Route::get('login', [AuthController::class, 'todoLogin'])->name('todoLogin');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('register', [AuthController::class, 'todoRegistrasi'])->name('todoRegistrasi');
    
    // DASHBOARD
    Route::get('dashboard', [UmkmController::class, 'dashboard'])->name('dashboard');

    // ACCOUNT SETTING
    Route::get('account-setting', [UmkmController::class, 'todoSetting'])->name('umkm.account');
    Route::put('account-setting', [UmkmController::class, 'setting'])->name('umkm.updateAccount');

    // PRODUCT
    Route::get('product', [UmkmController::class, 'gotoProduct'])->name('manage-product.index');
    Route::get('product/create', [UmkmController::class, 'gotoProductStore'])->name('manage-product.create');
    Route::post('product/created', [UmkmController::class, 'productStore'])->name('manage-product.store');
    Route::get('product/{id}', [UmkmController::class, 'gotoProductShow'])->name('manage-product.show');
    Route::get('product/edit/{id}', [UmkmController::class, 'gotoProductEdit'])->name('manage-product.edit');
    Route::put('product/update/{id}', [UmkmController::class, 'gotoProductUpdate'])->name('manage-product.update');
    Route::post('product/delete/{id}', [UmkmController::class, 'gotoProductDestroy'])->name('manage-product.destroy');
});
