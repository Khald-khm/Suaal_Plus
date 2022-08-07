<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrivilegePage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = DB::table('users')->where('email', session('email'))->get();

        $privilege = DB::table('user_privileges')->where('user_id', $user[0]->id)->get();

        foreach($privilege as $userPrivilege)
        {
            if($userPrivilege->privilege_id == '6')
            {
                return $next($request);
            }

        }

        return redirect('/dashboard');
    }
}
