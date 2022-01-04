<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Services\ExpenseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ExpenseController extends Controller
{
    public function getLast()
    {
        $expenses = Expense::orderBy('date', 'desc')->paginate(10);
        return $expenses;
    }

    public function getAllOfLastWeek(Request $request)
    {
        $page = $request->page ?? 1;
        $expenses = ExpenseService::getExpensesByWeek($page);
        $baseUri = Route::current()->uri;
        $result = $expenses->withPath("/$baseUri");
        return $result;

    }

    public function getOneByDate(Request $request)
    {
        return Expense::where('date', $request->date)->get();
    }

    public function add(Request $request)
    {
        Expense::create([ //работает, если указаны fillable поля
            'name' => $request->name,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'sum' => $request->sum,
            'date' => $request->date
        ]);
        return response('OK');
    }

    public function getOne($id)
    // можно без параметра request
    // https://laravel.com/docs/8.x/routing#required-parameters
    {
        // зачем id есть и в $request, и в $id??
        return Expense::find($id);
    }

    public function updateOne(Request $request)
    {
        $expense = Expense::find($request->id);
        if ($expense) {
            foreach ($request->keys() as $key) {
                $expense->$key = $request->$key;
            }
            $expense->save();
        }
        return response('OK');
    }

    public function deleteOne($id)
    {
        $expense = Expense::find($id);
        $expense->delete();
        return response('OK');
    }
}
