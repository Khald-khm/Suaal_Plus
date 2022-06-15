<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    
    public function index()
    {
        $home = DB::table('users')->get();

        $countUser = count(DB::table('users')->where('status', '=', 'active')->get());

        $countPublic = count(DB::table('users')->where('learning_type', '=', 'public')->get());

        $countPrivate = count(DB::table('users')->where('learning_type', '=', 'private')->get());

        $countVirtual = count(DB::table('users')->where('learning_type', '=', 'virtual')->get());

        $countOpen = count(DB::table('users')->where('learning_type', '=', 'open')->get());

        $userSession = session('email');

        return view('/dashboard', ['home' => $home, 'count' => $countUser, 'public' => $countPublic, 'private' => $countPrivate, 'open' => $countOpen, 'virtual' => $countVirtual, 'session' => $userSession]);
    }


}
