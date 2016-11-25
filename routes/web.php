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

        App\User::create([
            'name' => Request::get('name'),
            'email' => Request::get('email'),
            'password' => Request::get('password'),
        ]);

        return "inserted";
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