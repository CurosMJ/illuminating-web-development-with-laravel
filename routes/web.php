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

// A simple GET method route
Route::get('/hello', function () {
    return "Hello World";
});

// A simple POST method route.
// NOTE : This will fail because in web routes, CSRF protection is
// enabled by default. You can change this behaviour by changing
// app/Http/Kernel.php
Route::post('/hello', function () {
    return "Hello World by POST";
});

// GET method route with a parameter
Route::get('/hello/{one}/{two}', function ($one, $two) {
    return "Hello World, you sent $one and $two";
});