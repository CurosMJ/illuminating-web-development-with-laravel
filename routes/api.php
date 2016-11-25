<?php

use Illuminate\Http\Request;

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

// Simple GET route, will return JSON
Route::get('/hello/{name?}', function ($name = "Guest") {
    return ["data" => "hello $name"];
});

Route::post('/hello', function () {
    return ["data" => "hello world by post"];
});

// This route will tell you what method was used to call it
Route::any('/test', function (Request $request) {
    return ["data" => "This endpoint was called with : ".$request->method()];
});