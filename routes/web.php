<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendController;
use App\Http\Controllers\ProfileController;

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

Route::get('/coming-soon', [HomeController::class, 'coming'])->name('coming-soon');
Route::get('/', [HomeController::class, 'index'])->name('home');
//Route::get('/committee/{slug}', [HomeController::class, 'committeeDetail'])->name('committee.detail');
Route::get('/committee', [HomeController::class, 'committee'])->name('committee');
Route::get('/hotel', [HomeController::class, 'hotel'])->name('hotel');
Route::get('/kvkk', [HomeController::class, 'kvkk'])->name('kvkk');
Route::get('/sponsors', [HomeController::class, 'sponsors'])->name('sponsors');
Route::get('/program', [HomeController::class, 'program'])->name('program');

Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/auth/register', [AuthController::class, 'register']);
Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/auth/reset-password', [AuthController::class, 'resetPassword'])->name('auth.reset-password');
Route::post('/auth/reset-password', [AuthController::class, 'resetPassword']);

Route::get('/roommate/{token}', [ProfileController::class, 'acceptRoommateRequest'])->name('profile.accept-roommate');

Route::middleware(['auth'])->group(function () {
    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');
    Route::get('/packages', [HomeController::class, 'packages'])->name('packages');
    Route::get('/attenders', [AttendController::class, 'attenders'])->name('attenders');
    Route::get('/attend/register', [AttendController::class, 'register'])->name('attend.register');
    Route::post('/attend/register', [AttendController::class, 'register']);
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/add-roommate', [ProfileController::class, 'addRoommate'])->name('profile.add-roommate');
    Route::post('/profile/add-receipt', [ProfileController::class, 'addReceipt'])->name('profile.add-receipt');
});
