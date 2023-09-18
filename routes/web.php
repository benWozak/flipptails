<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\RecipeController;


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

// Recipes Route
Route::get('/recipes', [RecipeController::class, 'index']);
Route::get('/recipes/{filter?}', [RecipeController::class, 'browse']);

Route::get('/excel', [ExcelController::class, 'index']);


// Excel Export Route
Route::get('/recipes/export', [RecipeController::class, 'exportToExcel']);