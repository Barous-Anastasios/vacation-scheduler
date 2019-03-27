<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfAdmin
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
        if(auth()->check()) {
            foreach (auth()->user()->roles as $role) {
                if($role->id==1){
                    return $next($request);
                }
            }
        }

        return redirect('login')->with(['message'=>'You have to login as admin']);
    }
}
