<?php

use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('/users',[AuthController::class,'index']);
Route::post('/auth/register', [AuthController::class, 'register']);

Route::get('/accounts', [AccountController::class, 'index']);

