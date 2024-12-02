<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\userController;


//listado general
Route::get('/user', [userController::class, 'finduser']);

//listado por id
Route::get('/user/{id}',[userController::class, 'findbyid']);

//creando usuario
Route::post('/user',  [userController::class, 'createuser']);

//actuliza
Route::put('/user/{id}', [userController::class, 'update']);

//eliminando por id
Route::delete('/user/{id}', [userController::class, 'deletebyid']);