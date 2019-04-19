<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; // or use Illuminate\Foundation\Auth\User; works too
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id =  Auth::id(); 
        $user = User::find($id);
        $user_role = $user->roles()->get();
        session([ 'user_role' => $user_role[0]['pivot']['role_id'] ]); // associative array to write
        return view('pages.home', ['user' => $user]);
    }
}
