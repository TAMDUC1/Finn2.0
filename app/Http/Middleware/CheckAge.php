<?php

namespace App\Http\Middleware;
use Symfony\Component\HttpKernel\Exception\HttpException;

use Closure;

class CheckAge
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

        if($request->age<18){
            echo "your are not older enough";

        }
        if($request->age > 18){
            return $next($request);
        }




    }
}
