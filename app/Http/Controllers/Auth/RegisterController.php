<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register ()
    {
        return view('auth.register');
    }

    public function postRegister (Request $request)
    {
        $credentials = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
        ];

        Sentinel::registerAndActivate($credentials);
    }
}
