<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    
    public function view()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);


        $check = DB::table('users')->where('email', '=', $request->username)->limit(1)->get();

        if(count($check) == 1)
        {
            if($request->password == $check[0]->password)
            {
                $request->session()->put('email', $check[0]->email);
                
                return redirect('/dashboard');
            }
            
            
            return redirect('/login');
            


        }
        else
        {
            return redirect('/login');
        }


    }


    public function logout()
    {
        session()->flush();

        return redirect('/login');
    }

}
