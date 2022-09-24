<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{

    function SignUp(Request $request) 
    {

        // Validate form data

        $request->validate([
            'name' => 'required|min:4|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirmpassword' => 'required|same:password'
        ]);

        // Sign up user in database

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');

        // Login user in to account

        if (Auth::attempt($credentials)) {
            // Return to the dashboard

            return redirect()->to("/");
        }
        
        // If there's some error refresh the page;

        return redirect()->back();
    }
    
    function view()
    {
        return view('signup');
    }

}
