<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;


Route::get('/motas', [ApiController::class,'index']);
Route::get('/motas/{id}', [ApiController::class,'show']);

Route::get('marcas/',[ApiController::class,'indexMarca']);
Route::get('marcas/{id}',[ApiController::class,'showMarca']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
