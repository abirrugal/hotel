<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Dashboard
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
        if (auth()->user()->role_as === 'superadmin' || auth()->user()->role_as === 'admin' || auth()->user()->role_as === 'creator' || auth()->user()->role_as === 'branch') {
            
            return $next($request);
            
        }
        else{

            session()->flash('type','danger');
            session()->flash('message','Permission denied.');
            return redirect()->back();
        }
    }
}
