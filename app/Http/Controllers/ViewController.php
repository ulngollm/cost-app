<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

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
        $expenses = Expense::orderBy('date', 'desc')->get()->groupBy('date');
        $result =  new Paginator($expenses, 7, null, [
            'path' => '/cost/all'
        ]);
        return view('cost/list-grouped', [
            'title' => 'Список расходов',
            'expenses' => $result->withPath('/cost/all')
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
