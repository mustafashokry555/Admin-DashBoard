<?php

namespace App\Http\Middleware;

use App\Models\User_role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsPharmacist
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
        $pharmacistRoleId = User_role::select('id')->where('role','Pharmacist')->first();
        if(Auth::user()->role_id == $pharmacistRoleId['id'])
        {
            return $next($request);
        }else{
            return redirect(url('/logoutt'));
        }
    }
}
