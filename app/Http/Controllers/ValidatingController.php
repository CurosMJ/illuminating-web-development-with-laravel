<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidatingController extends Controller
{
    public function testValidation(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|min:2',
            'password' => 'required|string|min:5|max:10',
            'email' => 'required|email'
        ]);
        
        return ["passes" => true];
    }
}
