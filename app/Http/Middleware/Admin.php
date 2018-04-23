<?php

namespace App\Http\Middleware;
use Closure;

class Admin
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

       if(session('email')==='tamduc@stud.ntnu.no'){
        return $next($request);
    }
        //echo 'abc';
        return redirect('/');
    }
}
