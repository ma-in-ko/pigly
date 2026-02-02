<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WeightController;
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

Route::get('/register/step1',[AuthController::class,'step1'] 
);

Route::get('/register/step2',[AuthController::class,'step2']);

Route::get('/login', [AuthController::class,'login']);

Route::get('/weight_logs', [WeightController::class,'index'])->name('weight.index');
