<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfEmployee
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
        foreach (auth()->user()->roles as $role) {
            if($role->id==2){
                return $next($request);
            }
        }

        return redirect('forbidden');
    }
}
