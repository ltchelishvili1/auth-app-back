<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EmailVerifyController;

Route::get('/user', function (Request $request) {
	return $request->user();
})->middleware('auth:sanctum');

Route::prefix('/custom')->group(function () {
	Route::middleware('guest')->group(function () {
		Route::post('register', [RegisterController::class, 'register'])->name('register');
		Route::get('email/verify/{id}/{email}', [EmailVerifyController::class, 'emailVerify'])->name('verification.verify');
	});
});
