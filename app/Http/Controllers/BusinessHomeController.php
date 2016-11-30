<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use App\Skill;
use App\Business;
class BusinessHomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('business.home');
    }

    public function search(Request $request)
    {
    	$results= User::all()->take(5);
    	if($request->ajax()){
            return response()->json(array('status'=>'success','data'=>$results));
        }
        return redirect(action('HomeController@index'));
    }

    public function saveRadarSkills(Request $request)
    {
        $business = Auth::user()->business;
        $business->skills()->detach();
            if(null!==($request->input('rskills'))) 
            {
                $skills = explode(",", $request->input('rskills'));
                foreach($skills as $skill) {
                    $skillf = ucwords(trim(str_replace( ',', '', $skill )));
                    if($skillf != "" ) {
                        if($skill_model = Skill::where('name' , $skillf)->first()) {

                            $business->skills()->attach($skill_model);
                        }
                        else
                        {
                            $skill_model = new Skill;
                            $skill_model->name = $skillf;
                            $skill_model->save();
                            $business->skills()->attach($skill_model);
                        }
                    }
                }
            }

        if($request->ajax()){
            return response()->json(array('status'=>'success'));
        }
        return redirect(action('BusinessHomeController@index'));
    }

}
