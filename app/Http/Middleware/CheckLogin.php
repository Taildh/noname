<?php

namespace App\Http\Middleware;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Closure;
use Illuminate\Http\Request;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Sentinel::check();

        if (!$user) {
            return redirect()->guest(route('auth.login'))->with('error', 'Login requried');
        }

        view()->share('user', $user);

        return $next($request);
    }
}
