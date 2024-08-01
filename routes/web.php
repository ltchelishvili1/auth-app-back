<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return redirect('/cp');
});

Route::get('csrf_token', function (Request $request) {
	$token = $request->session()->token();
	return response()->json([
		'token' => $token,
	]);
});
