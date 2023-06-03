<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AchievementsController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\UserChannelController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SubsController;
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
// get all the users
Route::middleware('auth:sanctum')->get('/users',[UserController::class, 'show']);
// route for updating the users information
Route::middleware('auth:sanctum')->put('/user',[UserController::class, 'update']);
Route::middleware('auth:sanctum')->get('/channels',[UserChannelController::class, 'show']);
// route for getting a channel
Route::middleware('auth:sanctum')->get('/channel/{id}/messages',[MessageController::class, 'index']);
Route::middleware('auth:sanctum')->post('/channel/messages',[MessageController::class, 'create']);

// routes for creating, editing and deleting a channel
Route::middleware('auth:sanctum')->get('/channel',[ChannelController::class, 'index']);
Route::middleware('auth:sanctum')->post('/channel/add',[ChannelController::class, 'create']);
Route::middleware('auth:sanctum')->get('/channel/{id}',[ChannelController::class, 'edit']);
Route::middleware('auth:sanctum')->put('/channel/update',[ChannelController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/channel/delete',[ChannelController::class, 'destroy']);


Route::get("/modules", [\App\Http\Controllers\ModuleController::class, 'index']);
Route::get("/videos", [\App\Http\Controllers\VideoController::class, 'index']);
Route::get("/video/{id}", [\App\Http\Controllers\VideoController::class, 'getVideoById']);
Route::get("/module/{id}", [\App\Http\Controllers\ModuleController::class, 'getModuleVideos']);

Route::post("/module/add", [\App\Http\Controllers\ModuleController::class, 'addModule']);
Route::put("/module/edit", [\App\Http\Controllers\ModuleController::class, 'editModule']);
Route::delete("/module/delete", [\App\Http\Controllers\ModuleController::class, 'deleteModule']);

Route::put("/video/edit", [\App\Http\Controllers\VideoController::class, 'editVideo']);
Route::post("/video/add", [\App\Http\Controllers\VideoController::class, 'addVideo']);
Route::delete("/video/delete", [\App\Http\Controllers\VideoController::class, 'deleteVideo']);
// route for updating the users information
Route::middleware('auth:sanctum')->put('/user',[UserController::class, 'update']);

Route::get("/test", function(){
    return "Test";
});

Route::get('/achievements', [AchievementsController::class, 'index']);
Route::get('/subs', [SubsController::class, 'index']);
