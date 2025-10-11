<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function() {
   Route::group(['prefix' => 'auth', 'controller' => AuthController::class], function() {
      Route::post('/login', 'login');
   });
});
