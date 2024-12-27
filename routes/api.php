<?php

use App\Http\Controllers\productApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(\App\Http\Controllers\AuthController::class)->group(function(){
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');

    Route::get('/product', [productApiController::class, 'index']);
    Route::post('/product', [productApiController::class, 'simpan']);
    Route::get('/product/{id}/lihat', [productApiController::class,'show']);
    Route::post('/product/{id}/edit', [productApiController::class, 'edit']);
    Route::put('/product/{id}', [productApiController::class,'update']);
    Route::delete('/product/{id}/hapus', [productApiController::class,'destroy']);

});