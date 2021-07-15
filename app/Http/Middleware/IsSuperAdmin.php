<?php

namespace App\Http\Middleware;

use App\Models\User_role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsSuperAdmin
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
        $superAdminRoleId = User_role::select('id')->where('role','Super Admin')->first();
        if(Auth::user()->role_id === $superAdminRoleId['id'])
        {
            return $next($request);
        }else{
            return redirect('/logoo');
        }
    }
}
