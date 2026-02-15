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

Route::get('/register/step1',[AuthController::class,'step1']);
Route::post('/register/step1', [AuthController::class, 'step2'])->name('register.step1.post');

Route::get('/register/step2', [AuthController::class,'showStep2']);
Route::post('/register/complete',[AuthController::class,'register'])->name('register.complete');

Route::get('/login', [AuthController::class,'showLogin']);
Route::post('/login',[AuthController::class,'login'])->name('login');


Route::post('auth/logout', [AuthController::class, 'logout']);


Route::middleware('auth')->group(function() {

Route::get('/weight_logs', [WeightController::class,'index'])->name('weight.index');

Route::get('weight_logs/create',[WeightController::class,'create'])->name('weight.create');

Route::post('weight_logs', [WeightController::class,'store'])->name('weight.store');

Route::get('weight_logs/{id}/edit', [WeightController::class, 'update'])->name('weight.edit');

Route::put('weight_logs/{id}', [WeightController::class, 'updatePost'])->name('weight.update.post');

});

Route::get('weight_logs/target_edit', [WeightController::class, 'target_edit']);

Route::get('/weight/goal_setting', [WeightController::class, 'goalSetting']);

Route::post('/weight/goal_setting', [WeightController::class, 'goalUpdate'])->middleware('auth');

Route::delete('/weight_logs/{id}', [WeightController::class,'destroy'])->name('weight.destroy');