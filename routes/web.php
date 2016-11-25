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
        print_r($names);

        $all = DB::connection()->table('users')->get();
        print_r($all);

        return "list complete";
    });


    Route::get('/search', function () {

        $search = Request::get('search');

        $stmt = DB::connection()->table('users')->where('name', $search);
        $all = $stmt->get();
        print_r("SQL Query : \n".$stmt->toSql()."\n\n\n");
        print_r($all);

        return "search complete";
    });


    Route::get('/delete', function () {

        DB::connection()->table('users')->delete();

        return "deleted";
    });
});