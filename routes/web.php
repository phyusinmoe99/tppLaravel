<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/blogs',function(){
    return "This is blogs page.";
});

Route::get('/blogs/{id}',function($id){
    return "This is blog detail of -$id ";
});

Route::get('/dashboard',function(){
    return "This is dashboard page.";
})->name("dashboard.tpp");

Route::get('/tpp',function(){
    return redirect()->route('dashboard.tpp');
});

Route::prefix('dashboard')->group(function(){
    Route::get('/admin',function(){
        return "This is admin page.";
    });
    Route::get('/users',function(){
        return "This is users page.";
    });
});

Route::get('/',function(){
    return view('index');
});

Route::get('/students',[StudentController::class,'index']);
Route::get('/articles',[ArticlesController::class,'index']);
Route::get('/categories',[CategoryController::class,'index']);
Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
Route::get('/categories/edit',[CategoryController::class,'edit'])->name('categories.edit');
Route::get('/products',[ProductController::class,'index']);
Route::get('/products/edit',[ProductController::class,'edit'])->name('products.edit');
