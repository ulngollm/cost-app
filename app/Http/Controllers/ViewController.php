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

    public function showCostList()
    {
        $controller = new ExpenseController();
        $expenses = $controller->getAll();
        return view('cost/list-grouped', [
            'title' => 'Список расходов',
            'groups' => $expenses->groupBy('date'),
            'expenses' => $expenses
        ]);
    }

    public function showIncomeList()
    {
        $controller = new IncomeController();
        $incomes = $controller->getAll();
        return view('income/list', [
            'title' => 'Список доходов',
            'incomes' => $incomes
        ]);
    }

    public function test(Request $request){
        // print($id);
        // $request['$id'] = $id;
        return $request;
    }
}
