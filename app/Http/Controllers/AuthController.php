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
        $email = $request->input('email');
        $password = $request->input('password');

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $meeting = [
            'msg' => 'Successfully logged'
        ];

        return response()->json($meeting, 200);
    }
}
