<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Manager\AttenderController;
use \App\Http\Controllers\Manager\HomeController;

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('download/{folder}/{file}', [AttenderController::class, 'download'])->name('download');
Route::get('attender/data', [AttenderController::class, 'data'])->name('attender.data');
Route::get('attender/entered/{id}', [AttenderController::class, 'entered'])->name('attender.entered');
Route::get('attender', [AttenderController::class, 'index'])->name('attender.index');
