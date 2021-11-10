<?php

use App\Http\Controllers\AddController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return redirect('/cost/add');
});
Route::get('/cost/add', [ViewController::class, 'getCostAddForm']);
Route::get('/cost/all', [ViewController::class, 'showCostList']);
Route::get('/income/add', [ViewController::class, 'getIncomeAddForm']);
Route::get('/income/all', [ViewController::class, 'showIncomeList']);
