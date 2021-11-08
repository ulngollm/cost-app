<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function getAll(Request $request = null)
    {
        $count = $request->count ?? '100';
        $page = $request->page ?? '1';
        $offset = ($page - 1) * $count;
        return Expense::all()->skip($offset)->take($count);
    }

    public function getAllOfLastWeek()
    {
        //работа с датами https://www.digitalocean.com/community/tutorials/easier-datetime-in-laravel-and-php-with-carbon
        $startDate = now()->subWeek()->toDateString();
        return Expense::where('date', '>', $startDate)->get();
    }

    public function getAllByDate()
    {
        $list = $this->getAll();
        $groupedList = [];
        foreach($list as $item){
            $groupedList[$item->date]['items'][] = $item;
        }
        foreach($groupedList as &$group){
            $group['total'] = array_sum(array_column($group['items'], 'sum'));
        }
        return $groupedList;
    }

    public function getOneByDate(Request $request){
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

    public function getOne(Request $request)
    {
        return Expense::find($request->id);
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

    public function showList(Request $request)
    {
        $expenses = $this->getAllByDate();
        return view('cost/list', ['title'=>'list', 'expenses'=>$expenses]);
    }
}
