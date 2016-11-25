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

// Simple POST method, this will work, because CSRF
// is disabled in API middleware
Route::post('/hello', function () {
    return ["data" => "hello world by post"];
});

// This route will tell you what method was used to call it
Route::any('/method-test', function (Request $request) {
    return ["data" => "This endpoint was called with : ".$request->method()];
});

// Using Controllers to house business logic
Route::get('test/{who}', 'TestController@test');

// Use route groups to club together similar requests
Route::group(['prefix' => 'pet'], function () {

    Route::get('dog', function () {
        return "my doggie !";
    });

    Route::get('cat', function () {
        return "my kitten !";
    });
});