<?php

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
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('portfolios', PortfolioController::class);
Route::resource('achievements', AchievementController::class);
Route::resource('education', EducationController::class);
Route::resource('profiles', ProfileController::class);
Route::resource('hard-skills', HardSkillController::class);
Route::resource('soft-skills', SoftSkillController::class);
Route::resource('tools', ToolController::class);
