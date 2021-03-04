<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() ){
            if (Auth::user()->role !== 'GUEST'  ){
                return $next($request);

            }else{

                return redirect()->route('client.home');
            }


        }else{

            return redirect()->route('admin.login');
        }

    }
}