<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function getAll()
    {
        return Income::orderBy('date', 'desc')->paginate(10);
    }

    public function getOne($id)
    {
        return Income::find($id);
    }

    public function updateOne(Request $request, $id)
    {
        $expense = Income::find($id);
        if ($expense) {
            foreach ($request->keys() as $key) {
                $expense->$key = $request->$key;
            }
            $expense->save();
        }
        return response()->setStatusCode(404);
    }

    public function add(Request $request)
    {
        Income::create([
            'name'=>$request->name,
            'sum'=>$request->sum,
            'date'=>$request->date
        ]);
        return response('OK');
    }
}
