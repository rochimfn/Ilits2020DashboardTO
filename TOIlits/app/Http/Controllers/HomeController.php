<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
include "config\adminlte.php";

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $status = DB::table('users')->pluck('status');
        // echo '<script language="javascript">';
        // echo 'alert('.status.')';
        // echo '</script>';
        if(Auth::user()->status == 1){
            
        }
        return view('admin.umum.dashboard');
    }
}
