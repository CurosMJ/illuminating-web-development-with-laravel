<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/validate', function () {

    // Request::all() returns all the parameters passed in the request
    $validator = Validator::make(Request::all(), [
        'name' => 'required|string|min:2',
        'password' => 'required|string|min:5|max:10',
        'email' => 'required|email'
    ]);

    return ["passes" => $validator->passes(), "messages" => $validator->messages()->toArray()];
});

Route::get('/validate-controller', 'ValidatingController@testValidation');