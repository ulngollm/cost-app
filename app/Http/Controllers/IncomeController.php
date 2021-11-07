<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function getAll()
    {
        return Income::all();
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
