<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class AuthController extends Controller
{
    public function store(Request $request)
    {

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $modelUser = new User();

        $modelUser->name = $name;
        $modelUser->email = $email;
        $modelUser->password = bcrypt($password);

        if ($modelUser->save()) {
            $modelUser->singin = [
                'href' => 'api/v1/user/signin',
                'method' => 'POST',
                'params' => 'email, password'
            ];

            $response = [
                'msg' => 'User created successfully',
                'user' => $modelUser
            ];

            return response()->json($response, 200);
        }

        $response = [
                'msg' => 'An error occured'
            ];

        return response()->json($response, 404);
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
