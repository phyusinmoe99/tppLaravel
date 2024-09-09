<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view('categories.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
        ]);
        return redirect()->route('categories.index');
    }


    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request,$id)
    {
        $category = Category::where('id', $id)->first();
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index');
    }


    public function destroy($id)
    {

        $category = Category::where('id', $id)->first();
        $category->delete();
        return redirect()->route('categories.index');
    }
}
