<?php

namespace App\Http\Middleware;

use App\Models\Adminuser;
use App\Models\Pret;
use App\Models\Prev;
use Closure;

class IndexLogin
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
        $user=session('indexuser_id');
        if(!$user){
            return redirect('/index/login');
        }
        return $next($request);
    }
}
