<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('auth/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/users', [AuthController::class, 'register']);
});

Route::apiResource('/categories',CategoryController::class);
Route::apiResource('/products',ProductController::class);
