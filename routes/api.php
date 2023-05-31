<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AchievementsController;
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


// route for updating the users information
Route::put('/user',[UserController::class, 'update']);
Route::middleware('auth:sanctum')->get('/channels',[UserChannelController::class, 'index']);
// route for getting a channel
Route::middleware('auth:sanctum')->get('/channel/{id}',[UserChannelController::class, 'show']);
Route::middleware('auth:sanctum')->get('/channel/{id}/messages',[MessageController::class, 'index']);
Route::middleware('auth:sanctum')->post('/channel/{id}/messages',[MessageController::class, 'create']);

Route::middleware('auth:sanctum')->group(function() {
    Route::get("/modules", [\App\Http\Controllers\ModuleController::class, 'index']);
    Route::get("/categories", [\App\Http\Controllers\LearningCategoryController::class, 'index']);
    Route::get("/videos", [\App\Http\Controllers\VideoController::class, 'index']);
    Route::get("/questions", [\App\Http\Controllers\QuestionController::class, 'index']);
    Route::get("/video/{id}", [\App\Http\Controllers\VideoController::class, 'getVideoById']);
    Route::get("/category/{id}", [\App\Http\Controllers\LearningCategoryController::class, 'getCategoryById']);
    Route::get("/module/{id}", [\App\Http\Controllers\ModuleController::class, 'getModuleVideos']);
    Route::get("/question/{id}", [\App\Http\Controllers\QuestionController::class, 'getQuestion']);
    Route::post("/question/add", [\App\Http\Controllers\QuestionController::class, 'addQuestion']);
    Route::put("/question/edit", [\App\Http\Controllers\QuestionController::class, 'editQuestion']);
    Route::delete("/question/delete", [\App\Http\Controllers\QuestionController::class, 'deleteQuestion']);
    Route::post("/category/add", [\App\Http\Controllers\LearningCategoryController::class, 'addCategory']);
    Route::put("/category/edit", [\App\Http\Controllers\LearningCategoryController::class, 'editCategory']);
    Route::delete("/category/delete", [\App\Http\Controllers\LearningCategoryController::class, 'deleteCategory']);
    Route::post("/module/add", [\App\Http\Controllers\ModuleController::class, 'addModule']);
    Route::put("/module/edit", [\App\Http\Controllers\ModuleController::class, 'editModule']);
    Route::delete("/module/delete", [\App\Http\Controllers\ModuleController::class, 'deleteModule']);
    Route::put("/video/edit", [\App\Http\Controllers\VideoController::class, 'editVideo']);
    Route::post("/video/add", [\App\Http\Controllers\VideoController::class, 'addVideo']);
    Route::delete("/video/delete", [\App\Http\Controllers\VideoController::class, 'deleteVideo']);
});


// route for updating the users information
Route::middleware('auth:sanctum')->put('/user',[UserController::class, 'update']);


Route::get("/test", function(){
    return "Test";
});

Route::get('/achievements', [AchievementsController::class, 'index']);
Route::get('/subs', [SubsController::class, 'index']);
