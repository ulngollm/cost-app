<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Models\Expense;
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

Route::get('/expense', [ExpenseController::class, 'getLast']);
Route::post('/expense', [ExpenseController::class, 'add']);
Route::get('/expense/week', [ExpenseController::class, 'getAllOfLastWeek']);
Route::get('/expense/day', [ExpenseController::class, 'getAllByDate']);
Route::get('/expense/day/{date}', [ExpenseController::class, 'getOneByDate']);
Route::get('/expense/{id}', [ExpenseController::class, 'getOne']);
Route::put('/expense/{id}', [ExpenseController::class, 'updateOne']);
Route::delete('/expense/{id}', [ExpenseController::class, 'deleteOne']);

Route::get('/income', [IncomeController::class, 'getAll']);
Route::post('/income', [IncomeController::class, 'add']);
Route::get('/income/{id}', [IncomeController::class, 'getOne']);
Route::put('/income/{id}', [IncomeController::class, 'updateOne']);
Route::delete('/income/{id}', [IncomeController::class, 'deleteOne']);



Route::get('/category', [CategoryController::class, 'getAll']);
Route::post('/category', [CategoryController::class, 'add']);
Route::get('/category/{id}', [CategoryController::class, 'getOne']);
Route::put('/category/{id}', [CategoryController::class, 'updateOne']);
Route::delete('/category/{id}', [CategoryController::class, 'deleteOne']);

