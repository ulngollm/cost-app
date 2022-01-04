<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use App\Services\ExpenseService;
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

    public function showCostList(Request $request)

    {
        $result = call_user_func([ExpenseController::class, 'getAllOfLastWeek'], $request);
        return view('cost/list-grouped', [
            'title' => 'Список расходов',
            'expenses' => $result
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
