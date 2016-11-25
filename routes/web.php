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
    Route::get('/add', function (\Illuminate\Http\Request $request) {

        DB::connection()->table('users')->insert([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ]);

        return "inserted";
    });

    Route::get('/list', function () {

        $names = DB::connection()->table('users')->select(['name'])->get();

        $all = DB::connection()->table('users')->get();

        return ["names" => $names->toArray(), "all" => $all->toArray()];
    });


    Route::get('/search', function () {

        $search = Request::get('search');

        $stmt = DB::connection()->table('users')->where('name', $search);
        $all = $stmt->get();

        return ["query" => $stmt->toSql(), "all" => $all->toArray()];
    });


    Route::get('/delete', function () {

        DB::connection()->table('users')->delete();

        return "deleted";
    });
});