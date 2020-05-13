<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\Log;

class IsAdmin
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
        // return $next($request);
        if (Auth::user() &&  Auth::user()->is_admin == 1) {
            Log::debug('Tboxmy IsAdmin.handle function. Auth::user=' . Auth::user()->name . ' is_admin');
            return $next($request);
       }

       Log::debug('Tboxmy IsAdmin.handle function. Auth::user=' . Auth::user()->name . ' NOT admin');

       return redirect('topics')->with('error','You do not have admin access');
    }
}
