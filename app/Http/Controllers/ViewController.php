<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function getCostAddForm()
    {
        $controller = new CategoryController();
        $categories = $controller->getAll();
        return view('cost/add', ['categories' => $categories]);
    }

    public function getIncomeAddForm()
    {
        return view('income/add');
    }

    public function showCostList(Request $request)
    {
        $controller = new ExpenseController();
        $expenses = $controller->getAllByDate();
        return view('cost/list', ['title' => 'Список расходов', 'expenses' => $expenses]);
    }

    public function showIncomeList()
    {
        $controller = new IncomeController();
        $incomes = $controller->getAll();
        return view('income/list', ['title' => 'Список доходов', 'incomes' => $incomes]);
    }
}
