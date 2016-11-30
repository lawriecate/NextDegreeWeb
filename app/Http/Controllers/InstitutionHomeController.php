<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class InstitutionHomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// /{{App\Student::where('institution_id',Auth::user()->institution->id)->count() }}
    	$user = Auth::user();
    	$institution = $user->institution->first();
        return view('institution.home')->with('institution',$institution);
    }

}
