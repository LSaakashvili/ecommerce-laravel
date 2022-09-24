<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    function LogIn(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::validate($credentials)) {
            return redirect()->to('login')->withErrors(['password' => 'Credentials is not correct']);
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return redirect()->to('/');
    }
    
    function view()
    {
        return view('login');
    }

}
