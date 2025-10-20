<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLogin
{
    public function handle(Request $request, Closure $next)
    {
        $authUser = session('auth_user');

        if (!is_array($authUser) || empty($authUser['id'])) {
            $request->session()->forget('auth_user');
            $request->session()->put('url.intended', $request->fullUrl());

            return redirect()->route('login');
        }

        return $next($request);
    }
}
