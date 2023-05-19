<?php

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

Route::get("/modules", [\App\Http\Controllers\ModuleController::class, 'index']);

Route::get("/video/{id}", [\App\Http\Controllers\VideoController::class, 'getVideoById']);

Route::get("/module/{id}", [\App\Http\Controllers\ModuleController::class, 'getModuleVideos']);

Route::put("/module/edit", [\App\Http\Controllers\ModuleController::class, 'editModule']);

Route::delete("/module/delete", [\App\Http\Controllers\ModuleController::class, 'deleteModule']);

Route::get("/test", function(){
    return "Test";
});
