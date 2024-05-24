<?php

use App\Http\Controllers\AllController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AllController::class,'index'])->name('home');
Route::get('/users/create', [AllController::class, 'create'])->name('create');
Route::post('/users/store', [AllController::class,'store'])->name('store');
Route::post('/users/login', [AllController::class, 'progress'])->name('progress');
Route::post('/time_tracker/time_id/time_in/{user_id}', [AllController::class,'time_in'])->name('time_in');
Route::post('/time_tracker/time_id/time_out/{user_id}', [AllController::class,'time_out'])->name('time_out');
