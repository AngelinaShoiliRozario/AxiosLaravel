<?php

use App\Category;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/category', function () {
    $categories = Category::all();
    return response()->json($categories);
});
Route::post('/post_category', function (Request $request) {
    $request->validate([
    'name' =>'required',
    ]);
    Category::create([
        'name' => $request->name,
    ]);
    return response()->json($request->name);
});
