<?php

namespace App\Http\Middleware;
use Session;

use Closure;

class AdminMiddleware
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
        $Session = Session::get('admin');
        if(!empty($Session))
        {
            return $next($request);
        }
        else{
            return redirect('admin-login');
        }
        
    }
}
