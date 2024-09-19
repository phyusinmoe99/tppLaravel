<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Brick\Math\RoundingMode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/blogs', function () {
//     return "This is blogs page.";
// });

// Route::get('/blogs/{id}', function ($id) {
//     return "This is blog detail of -$id ";
// });

// Route::get('/dashboard', function () {
//     return "This is dashboard page.";
// })->name("dashboard.tpp");

// Route::get('/tpp', function () {
//     return redirect()->route('dashboard.tpp');
// });

// Route::prefix('dashboard')->group(function () {
//     Route::get('/admin', function () {
//         return "This is admin page.";
//     });
//     Route::get('/users', function () {
//         return "This is users page.";
//     });
// });

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('index');
})->name('dashboard');

Route::get('/students', [StudentController::class, 'index']);
Route::get('/articles', [ArticlesController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
Route::post('/categories/{id}/delete', [CategoryController::class, 'destroy'])->name('categories.delete');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');
Route::post('/products/{id}/delete', [ProductController::class, 'destroy'])->name('products.delete');

Route::get('/user',[UserController::class,'index'])->name('users.index');
Route::get('/users/create',[UserController::class,'create'])->name('users.create');
Route::post('/users/store',[UserController::class,'store'])->name('users.store');
// Route::post('/users/store',function () {
//     return "store route";
// })->name('users.store');
Route::get('/users/edit/{id}',[UserController::class,'edit'])->name('users.edit');
Route::post('/users/update/{id}',[UserController::class,'update'])->name('users.update');
Route::post('/users/delete/{id}',[UserController::class,'destroy'])->name('users.delete');



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['register'=>false]);
Route::resource('/role', RoleController::class);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
