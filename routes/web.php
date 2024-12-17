<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;

Route::get('/', [UserController::class, 'home'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['IsAdmin'])->group(function () {
        //user routes
        Route::get('/user', [UserController::class, 'index'])->name('user');
        Route::get('/user/{id}', [UserController::class, 'edit'])->name('userEdit');
        Route::post('/user/update', [UserController::class, 'update'])->name('userUpdate');
        Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->name('userDestroy');
         //routes setting
        Route::get('/setting',[SettingController::class, 'index'])->name('setting');
        Route::get('/setting/sifat/add',[SettingController::class, 'addSifat'])->name('settingSifatsAdd');
        Route::post('/setting/sifat/store',[SettingController::class, 'storeSifat'])->name('settingSifatStore');
        Route::get('/setting/sifat/edit/{id}',[SettingController::class, 'editSifat'])->name('settingSifatEdit');
        Route::patch('/setting/sifat/update',[SettingController::class, 'updateSifat'])->name('settingSifatUpdate');
        Route::delete('/setting/sifat/destroy/{id}', [SettingController::class, 'destroySifat'])->name('settingSifatDestroy');

        Route::get('/setting/klasifikasi/add', [SettingController::class, 'addKlasifikasi'])->name('addKlasifikasi');
        Route::post('/setting/klasifikasi/store',[SettingController::class, 'storeKlasifikasi'])->name('klasifikasiStore');
        Route::get('/setting/klasifikasi/edit/{id}',[SettingController::class, 'editKlasifikasi'])->name('klasifikasiEdit');
        Route::patch('/setting/klasifikasi/update',[SettingController::class, 'updateKlasifikasi'])->name('klasifikasiUpdate');
        Route::delete('/setting/klasifikasi/destroy/{id}', [SettingController::class, 'destroyKlasifikasi'])->name('klasifikasiDestroy');

        Route::get('/setting/status/add', [SettingController::class, 'addStatus'])->name('statusAdd');
        Route::post('/setting/status/store',[SettingController::class, 'storeStatus'])->name('statusStore');
        Route::get('/setting/status/edit/{id}',[SettingController::class, 'editStatus'])->name('statusEdit');
        Route::patch('/setting/status/update',[SettingController::class, 'updateStatus'])->name('statusUpdate');
        Route::delete('/setting/status/destroy/{id}', [SettingController::class, 'destroyStatus'])->name('statusDestroy');
    });

    Route::middleware(['IsActive'])->group(function () {
    //surat masuk Route
        Route::get('/surat-masuk', [SuratMasukController::class, 'index'])->name('suratMasuk');
        Route::get('/surat-masuk/add', [SuratMasukController::class, 'add'])->name('suratMasukAdd');
        Route::post('/surat-masuk/store', [SuratMasukController::class, 'store'])->name('suratMasukStore');
        Route::get('/surat-masuk/{id}', [SuratMasukController::class, 'edit'])->name('suratMasukEdit');
        Route::patch('/surat-masuk/update', [SuratMasukController::class,'update'])->name('suratMasukUpdate');
        Route::delete('/surat-masuk/destroy/{id}', [SuratMasukController::class, 'destroy'])->name('suratMasukDestroy');
        Route::patch('/info/update', [InfoController::class, 'update'])->name('infoUpdate');
        Route::get('/surat-masuk/info/{id}', [InfoController::class, 'info'])->name('info');

        Route::get('/surat-keluar', [SuratKeluarController::class, 'index'])->name('suratKeluar');
        Route::get('/surat-keluar/add', [SuratKeluarController::class, 'addSuratKeluar'])->name('addSuratKeluar');
    });

});
