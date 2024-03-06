<?php

use App\Http\Controllers\HomePageController;
use App\Http\Controllers\Settings\Auth\SettingsAuthPasswordUpdate;
use App\Http\Controllers\Settings\Profile\SettingsProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomePageController::class, 'Index'])->name('home');
Route::get('/home', [HomePageController::class, 'Index'])->name('home');
Route::post('/userRegister', [HomePageController::class, 'userRegister'])->name('userRegister');

// Route::middleware('auth')->group(function () {
//     Route::get('/', function () {

//     });
// });

Route::controller(SettingsProfileController::class)->middleware(['auth','verified'])->group(function () {
    Route::get('account/delete','accountDelete')->name('account.delete');
    Route::post('account/delete','profileDeleteConfirm');
});
Route::middleware(['auth','verified'])->group(function () {
    Route::get('auth/password',[SettingsAuthPasswordUpdate::class, 'passwordUpdate'])->name('password-update');
});


