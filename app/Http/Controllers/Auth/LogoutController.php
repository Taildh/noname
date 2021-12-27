<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout ()
    {
        Sentinel::logout(null, true);

        return redirect()->route('auth.login')->with('message', 'Logout successfully');
    }
}
