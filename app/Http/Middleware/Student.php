<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Student
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->num==3
        ||auth()->user()->num==2
        ||auth()->user()->num==1
        ) {
         return $next($request);
     }
 
     return abort(403, 'ليس لديك إذن للوصول إلى هذا المورد.');
     }
}
