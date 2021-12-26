<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login ()
    {
        if (Sentinel::guest() == false) {
            return redirect()->route('dashboard.index');
        }
        return view('auth.login');
    }

    public function postLogin (Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        try {
            if (Sentinel::authenticateAndRemember($credentials)) {
                return redirect()->intended(route('dashboard.index'))->with('success', 'Login successfully!');
            } else {
                redirect()->route('auth.login')->with('error', 'Login failed');
            }
        } catch (ThrottlingException $exception) {
            dd($exception->getMessage());
        } catch (NotActivatedException $exception) {
            dd("Chua active");
        }
    }
}
