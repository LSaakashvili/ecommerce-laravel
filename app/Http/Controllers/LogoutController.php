<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    function LogOut()
    {
        Auth::logout();

        return redirect()->to('/');
    }
}
