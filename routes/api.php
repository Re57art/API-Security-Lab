<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;

Route::controller(AuthController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('passwordRecover', 'passwordRecovery');


});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user',[AuthController::class,'getUserInfo']); // SECURE
    Route::put('/email-change',[AuthController::class,'updateEmail']); // SECURE
    Route::get('/users/{id}/books', [BookController::class, 'showByUser']);
    Route::get('/books', [BookController::class, 'index'])->middleware('throttle:5,1');
    Route::get('/books/{id}', [BookController::class, 'show']);
    Route::post('/books', [BookController::class, 'store']);
    Route::put('/books/{id}', [BookController::class, 'update']);
    Route::delete('/books/{id}', [BookController::class, 'destroy']);

});

