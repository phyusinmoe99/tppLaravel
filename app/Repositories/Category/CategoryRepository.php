<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface{

    public function index(){
        $category = Category::with('categoryAttachments')->get();
        return $category;
    }
    public function show($id){
        $category = Category::where('id',$id)->first();
        return $category;
    }
}
