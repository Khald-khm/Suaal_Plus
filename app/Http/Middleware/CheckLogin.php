<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class CheckLogin
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
        // if(session('email'))
        // {
        //     return $next($request);
        // }



        // $request->validate([
        //     'username' => 'required',
        //     'password' => 'required'
        // ]);


        // $check = DB::table('users')->where('email', '=', $request->username)->limit(1)->get();

        // if(count($check) == 1)
        // {
        //     if($request->password == $check[0]->password)
        //     {
        //         $request->session()->put('email', $check[0]->email);
                
        //         // return redirect('/dashboard');
        //         // return $next($request);
        //         dd('welcom');
        //     }
        //     else
        //     {
        //         // return redirect('/login'); 
        //         dd('welcome');  
        //     }
            


        // }
        // else
        // {
        //     // return redirect('/login');
        //     dd('not welcome');
        // }


        // // return redirect('/login');
        // dd('not working');


        if(!session('loggedIn'))
        {
            return redirect('/login');
        }
        else
        {
            return $next($request);
        }


    }
}
