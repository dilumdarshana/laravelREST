<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AuthController extends Controller
{
    public function store(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

    }

    public function signin(Request $request)
    {
        // validation
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        // do authentication aginst database

        $credentials = $request->only('email', 'password');


        $meeting = [
            'msg' => $credentials
        ];

        // send results
        return response()->json($meeting, 200);
    }
}
