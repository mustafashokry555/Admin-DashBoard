<?php

namespace App\Http\Middleware;

use App\Models\User_role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        $adminID = User_role::select('id')->where('role','Admin')
        ->orWhere('role','Super Admin')->get();
        if(Auth::user()->role_id == $adminID[0]['id'] || Auth::user()->role_id == $adminID[1]['id'])
        {
            return $next($request);
        }else{
            return redirect('/logoutt');
        }
    }
}
