<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Login Route

Route::post('/login',[AuthController::class,'Login']);

//Register Route

Route::post('/register',[AuthController::class,'Register']);
