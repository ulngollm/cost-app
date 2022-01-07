<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAll()
    {
        return Category::all();
    }

    public function getOne($id)
    {
        return Category::find($id);
    }

    public function add(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return response('OK');
    }

    public function updateOne(Request $request, $id)
    {
        $expense = Category::find($id);
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
        $expense = Category::find($id);
        $expense->delete();
        return response('OK');
    }

}
