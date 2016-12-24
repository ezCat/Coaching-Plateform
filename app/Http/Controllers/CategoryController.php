<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;

        if ($category->save()) return "OK";
        return "Nope";
    }

    public function show(Request $request)
    {
        return Category::where('id', $request->id)->firstOrFail();
    }

    public function update(Request $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->name;
        if ($category->save()) return "OK";
        return "Nope";
    }

    public function destroy(Request $request)
    {
        if (Category::where('id', $request->id)->delete()) return "OK";
        return "Nope";
    }
}
