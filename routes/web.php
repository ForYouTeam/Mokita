<?php

use App\Http\Controllers\cms\ClientController;
use App\Http\Controllers\Cms\HakimController;
use App\Http\Controllers\JadwalSidangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('v1/hakim')->controller(HakimController::class)->group(function() {
    Route::get('/', 'getAllData');
    Route::get('/{hakim}', 'getDataById');
    Route::post('/', 'upsertData');
    Route::delete('/{hakim}', 'deleteData');
});

Route::prefix('v1/client')->controller(ClientController::class)->group(function() {
    Route::get('/', 'getAllData');
    Route::get('/{client}', 'getDataById');
    Route::post('/', 'upsertData');
    Route::delete('/{client}', 'deleteData');
});

Route::prefix('v1/jadwal')->controller(JadwalSidangController::class)->group(function() {
    Route::get('/', 'getAllData');
    Route::get('/{jadwal}', 'getDataById');
    Route::post('/', 'upsertData');
    Route::delete('/{jadwal}', 'deleteData');
});
