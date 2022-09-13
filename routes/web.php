<?php

use App\Http\Controllers\Cms\AnakController;
use App\Http\Controllers\cms\ClientController;
use App\Http\Controllers\Cms\GugatanController;
use App\Http\Controllers\Cms\HakimController;
use App\Http\Controllers\Cms\JadwalSidangController;
use App\Http\Controllers\Cms\PerkaraController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('base.Skelton');
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

Route::prefix('v1/anak')->controller(AnakController::class)->group(function() {
    Route::get('/{anak}', 'getDataByIdAnak');
    Route::post('/', 'upsertDataAnak');
    Route::delete('/{anak}', 'deleteDataAnak');
});

Route::prefix('v1/detail_anak')->controller(AnakController::class)->group(function() {
    Route::get('/', 'getAllDataDetail');
    Route::get('/{detail}', 'getDataByIdDetail');
    Route::post('/', 'upsertDataDetail');
    Route::delete('/{detail}', 'deleteDataDetail');
});

Route::prefix('v1/gugatan')->controller(GugatanController::class)->group(function() {
    Route::get('/', 'getAllData');
    Route::get('/{gugatan}', 'getDataById');
    Route::post('/', 'upsertData');
    Route::delete('/{gugatan}', 'deleteData');
});

Route::prefix('v1/perkara')->controller(PerkaraController::class)->group(function() {
    Route::get('/', 'getAllData');
    Route::get('/{perkara}', 'getDataById');
    Route::post('/', 'upsertData');
    Route::delete('/{perkara}', 'deleteData');
});
