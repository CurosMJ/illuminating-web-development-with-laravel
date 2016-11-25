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

Route::get('/set', function () {
    Session::set('last_seen', time());
    return ["session state" => Session::all()];
});

Route::get('/flush', function () {
    Session::flush();
    return ["session state" => Session::all()];
});

Route::get('/get', function () {
    return ["all" => Session::all(), "last_seen" => Session::get('last_seen')];
});
