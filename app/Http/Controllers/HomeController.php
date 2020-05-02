<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\ContactController;
use Brian2694\Toastr\Facades\Toastr;
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
       
        
        
        
        if(Auth::user()->role=='admin' ){
        return view('productAjax');
        }
        else
        
        if(Auth::user()->role=='user' ){
            return view('download');
            }
else 
if(Auth::user()->role=='visiteur' ){
    return view('visiteur');
    }
    else
    return view('/');

    }
}
