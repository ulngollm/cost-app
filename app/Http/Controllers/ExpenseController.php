<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function getAll()
    {
        return Expense::orderBy('date', 'desc')->paginate(10);
    }

    public function getAllOfLastWeek()
    {
        //работа с датами https://www.digitalocean.com/community/tutorials/easier-datetime-in-laravel-and-php-with-carbon
        $startDate = now()->subWeek()->toDateString();
        $query = Expense::where('date', '>', $startDate)->orderBy('date', 'desc');
        $query->addSelect([
            'category' => Category::select('name')
                ->whereColumn('categories.id','category')
        ]);
        return $query->get();
    }

    public function getAllByDate()
    {
        $list = $this->getAllOfLastWeek();
        $groupedList = [];
        foreach ($list as $item) {
            $groupedList[$item->date]['items'][] = $item;
        }
        foreach ($groupedList as &$group) {
            $group['total'] = array_sum(array_column($group['items'], 'sum'));
        }
        return $groupedList;
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

    public function deleteOne($id){
        $expense = Expense::find($id);
        $expense->delete();
        return response('OK');
    }
}
