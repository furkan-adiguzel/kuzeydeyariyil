<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\AttenderController;
use \App\Http\Controllers\Admin\HomeController;
use \App\Http\Controllers\Admin\PackageController;
use \App\Http\Controllers\Admin\RoomController;
use \App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MessageController;

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('download/{folder}/{file}', [AttenderController::class, 'download'])->name('download');
Route::get('attender/data', [AttenderController::class, 'data'])->name('attender.data');
Route::resource('attender', AttenderController::class);

Route::get('package/data', [PackageController::class, 'data'])->name('package.data');
Route::resource('package', PackageController::class);

Route::get('room/data', [RoomController::class, 'data'])->name('room.data');
Route::resource('room', RoomController::class);

Route::get('user/data', [UserController::class, 'data'])->name('user.data');
Route::resource('user', UserController::class);

Route::get('message', [MessageController::class, 'index'])->name('message');
Route::post('message/send', [MessageController::class, 'send'])->name('message.send');
