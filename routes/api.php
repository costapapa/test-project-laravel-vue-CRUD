<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;

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

Route::get('/courses', [CoursesController::class, 'index']);
Route::prefix('/course')->group( function() {
    Route::get('/{id}', [CoursesController::class, 'show']);
    Route::put('/edit/{id}', [CoursesController::class, 'update']);
    Route::delete('/{id}', [CoursesController::class, 'destroy']);
    Route::post('/store', [CoursesController::class, 'store']); 
});