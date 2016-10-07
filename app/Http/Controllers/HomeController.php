<?php

namespace App\Http\Controllers;

use App\Http\Requests;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!is_null(Auth::user()->student)) 
        {
            return redirect(action('StudentHomeController@index'));
        }
        else if(!is_null(Auth::user()->business)) 
        {
            return redirect(action('BusinessHomeController@index'));
        }
        else 
        {
            return '<h1>No profile available</h1>';
        }
    }


}
