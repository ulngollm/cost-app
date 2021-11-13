<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/expense', [ExpenseController::class, 'getAll']);
Route::get('/expense/week', [ExpenseController::class, 'getAllOfLastWeek']);
Route::get('/expense/day', [ExpenseController::class, 'getAllByDate']);
Route::get('/expense/day/{date}', [ExpenseController::class, 'getOneByDate']);
Route::get('/expense/{id}', [ExpenseController::class, 'getOne']);
Route::put('/expense/{id}', [ExpenseController::class, 'updateOne']);
Route::post('/expense', [ExpenseController::class, 'add']);
Route::get('/income', [IncomeController::class, 'getAll']);
Route::post('/income', [IncomeController::class, 'add']);
Route::get('/category', [CategoryController::class, 'getAll']);
Route::get('/category/{id}', [CategoryController::class, 'getOne']);
Route::post('/category', [CategoryController::class, 'add']);
