<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/index',[TaskController::class,'index']);
Route::post('/createTask',[TaskController::class,'createTask']);
Route::delete('/deleteTask/{id}',[TaskController::class,'deleteTask']);
Route::patch('/changeTaskStatus/{id}',[TaskController::class,'changeTaskStatus']);
Route::put('/updateTask/{id}',[TaskController::class,'updateTask']);
