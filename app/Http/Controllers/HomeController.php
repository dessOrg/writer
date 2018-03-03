<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','isVerified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == "Admin"){
            return redirect('admin');
        }elseif(Auth::user()->role == "Client"){
            return redirect('client');
        }elseif(Auth::user()->role == "Writer"){

            return redirect('writer');
        }else{

            return redirect('/');
        }
    }
}
