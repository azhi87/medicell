<?php

namespace App\Http\Middleware;

use Closure;

class Doctor
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
       if(Auth::user()->type!='admin')
        {
            $text="Not enough Privileges";
            \Session::flash('message', $text);

            
           return back();
        }
        return $next($request);
    }
}
