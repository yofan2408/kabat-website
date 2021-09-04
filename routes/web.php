<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;






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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route Clicky
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'store'])->name('store');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'destroy']);


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile/profileedit/{id}',[ProfileController::class, 'edit']);
Route::put('/profile/update/{id}', [ProfileController::class, 'update']);

// Controller User & Admin
Route::resource('profile' , ProfileController::class);
Route::resource('userpage', MonitoringController::class);
Route::resource('user' , UserController::class);
Route::resource('home' , HomeController::class);


// API
Route::get('api/user', [App\Http\Controllers\ApiController::class, 'data_user']);
