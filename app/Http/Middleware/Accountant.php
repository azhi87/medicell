<?php

namespace App\Http\Middleware;

use Closure;

class Accountant
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
        if(Auth::user()->type!='accountant')
        {
            $text="Not enough Privileges";
            \Session::flash('message', $text);

            
           return back();
        }
        return $next($request);
    }
}
