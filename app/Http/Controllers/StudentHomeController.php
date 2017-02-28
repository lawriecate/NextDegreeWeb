<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Skill;
use Auth;

class StudentHomeController extends Controller
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
        return view('student.home');
    }

    public function getSuggestedSkills() 
    {
        
        $hasSkills = Auth::user()->skills;
        $skills = Skill::where('verified',true)->whereNotIn('id',$hasSkills->pluck('id'));

        if(Auth::user()->student->course_id != null) {
            $filter = Auth::user()->student->course->suggested_skills;
            if($filter->count() > 0) {
                $skills = $skills->whereIn('id',$filter->pluck('id'));
            } else {
                $skills = $skills->orderByRaw('RAND()');
            }
        } else {
            $skills = $skills->orderByRaw('RAND()');
        }

        
        return response()->json($skills->take(5)->get());
    }
}
