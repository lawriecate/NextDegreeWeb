<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class InstitutionHomeController extends Controller
{
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
    	// /
    	$user = Auth::user();
    	$institution = $user->institution->first();
        return view('institution.home')->with('institution',$institution);
    }

  

}
