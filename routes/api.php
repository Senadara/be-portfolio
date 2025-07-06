<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HardSkillController;
use App\Http\Controllers\SoftSkillController;
use App\Http\Controllers\ToolController;

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


Route::apiResource('portfolios', PortfolioController::class);
Route::apiResource('achievements', AchievementController::class);
Route::apiResource('education', EducationController::class);
Route::apiResource('profiles', ProfileController::class);
Route::apiResource('hard-skills', HardSkillController::class);
Route::apiResource('soft-skills', SoftSkillController::class);
Route::apiResource('tools', ToolController::class);
