<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\GadaiController;
use App\Http\Controllers\InvestasiController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\ManageOrderController;
use App\Http\Controllers\RekpenController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\ChatController;
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
Route::get('job/{id}', [BuyerController::class, 'viewJob'])->name('viewJob');
Route::get('/shoping', [BuyerController::class, 'getUmkm'])->name('filterUmkm');
Route::get('/market/{name}', [BuyerController::class, 'shoping'])->name('shoping');
Route::get('/product/{id}', [BuyerController::class, 'showProd'])->name('buyer.showprod');
Route::post('/checkout/{id}', [BuyerController::class, 'checkout'])->name('checkout');

Route::get('login', [AuthController::class, 'todoLogin'])->name('todoLogin');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'todoRegistrasi'])->name('todoRegistrasi');
Route::post('register', [AuthController::class, 'registrasi'])->name('registrasi');

Route::prefix('umkm')->middleware('umkm')->group(function () {
    // UPGRADE BUYER TO SELLER
    Route::get('register', [AuthController::class, 'todoRegistrasiUmkm'])->name('todoRegistrasiUmkm');
    Route::post('register', [AuthController::class, 'registrasiUmkm'])->name('registrasiUmkm');

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

    // MANAGE ORDER
    Route::get('manage-order', [ManageOrderController::class, 'index'])->name('manage-order.index');
    
    // INVESTASI
    Route::get('investasi', [InvestasiController::class, 'index'])->name('investasi.index');
    Route::post('investasi/investPerusahaan/{id}', [InvestasiController::class, 'investPerusahaan'])->name('investasi.investPerusahaan');

    // PEGADAIAN
    Route::get('pegadaian', [GadaiController::class, 'index'])->name('gadai.index');
    Route::get('pegadaian/create/{id}', [GadaiController::class, 'create'])->name('gadai.create');
    Route::post('pegadaian/storeGadai/{id}', [GadaiController::class, 'storeGadai'])->name('gadai.storeGadai');
    
    // REKPEN
    Route::get('rekpen', [RekpenController::class, 'index'])->name('rekpen.index');
    Route::get('rekpen/create', [RekpenController::class, 'create'])->name('rekpen.create');
    Route::post('rekpen/pembayaran', [RekpenController::class, 'bayar'])->name('rekpen.bayar');
    Route::post('rekpen/find-email', [RekpenController::class, 'findByEmail'])->name('rekpen.findByEmail');

    // JOB
    Route::get('job', [JobsController::class, 'index'])->name('job.index');
    Route::get('job/create', [JobsController::class, 'create'])->name('job.create');
    Route::get('job/{id}', [JobsController::class, 'show'])->name('job.show');
    Route::get('job/edit/{id}', [JobsController::class, 'edit'])->name('job.edit');
    Route::post('job/store', [JobsController::class, 'store'])->name('job.store');
    Route::post('job/update/status', [JobsController::class, 'ubahStatus'])->name('job.status');
    Route::post('job/delete', [JobsController::class, 'destroy'])->name('job.destroy');

    // Chat
    Route::get('chat', [ChatController::class, 'chat'])->name('chat');
    Route::get('chat/show', [ChatController::class, 'showchat'])->name('showchat');
    Route::post('chat/post', [ChatController::class, 'postChatSeller'])->name('post.chatSeller');
});
