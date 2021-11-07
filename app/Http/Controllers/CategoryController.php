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

    public function add(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return response('OK');
    }
}
