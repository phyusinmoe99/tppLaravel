<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryRepository implements CategoryRepositoryInterface{

    public function index(){
        $category = Category::with('categoryAttachments')->get();
        return $category;
    }
    public function show($id){
        $category = Category::with('categoryAttachments')->findOrFail($id);
        // dd($category);
        return $category;
    }
    public function store($data)
    {
        return Category::create($data);
    }
}
