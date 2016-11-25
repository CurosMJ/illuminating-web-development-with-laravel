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

Route::group(['prefix' => 'users'], function () {
    Route::get('/add', function () {
        
        $user = new \App\User();
        $user->name = Request::get('name');
        $user->email = Request::get('email');
        $user->password = Hash::make(Request::get('password'));
        $user->save(); // Persist to DB

        return "inserted";
    });

    Route::get('/login', function () {

        if (Auth::attempt(['email' => Request::get('email'), 'password' => Request::get('password')])) {
            return "Auth Successful";
        } else {
            return "Invalid credentials";
        }
    });

    Route::get('/me', function () {

        return ["check" => Auth::check(), "user" => Auth::user()];
    });

    Route::get('/list', function () {

        return App\User::all()->toArray();
    });


    Route::get('/find/{id}', function ($id) {

        return App\User::find($id)->toArray();
    });

    Route::get('/search', function () {

        $search = Request::get('search');

        return App\User::where('name', $search)->get()->toArray();
    });


    Route::get('/delete', function () {

        App\User::where(1, 1)->delete();

        return "deleted";
    });
});