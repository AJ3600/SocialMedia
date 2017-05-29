<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;
use Auth;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        return view('category.index')->withCategories($categories);
    }
    public function store(Request $request) {
        if (Auth::check()) {
            $this->validate($request, [
                'name' => 'required|unique:categories|max:255'
            ]);
            $category = new Category;
            $category->name = $request->name;
            $category->user_id = Auth::user()->id;
            $category->save();

            Session::flash('success', 'Category was added succesfully');
        }
        return redirect('/category');
    }
}
