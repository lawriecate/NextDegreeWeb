<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Skill;
use App\Business;
class SearchController extends Controller
{
    public function search(Request $request)
    {
    	$results = array();
    	$query = $request->q;
    	if($query!="") {
	    	// retrieve people by name
	    	$people_by_name = User::where('name','like',"%$query%")->take(5);
	    	
	    	foreach($people_by_name->get() as $person) 
	    	{
	    		$results[] = array(
	    			'type'=>'person',
	    			'name'=>$person->name,
	    			'image'=>$person->profile_image_or_placeholder()->small_url,
	    			'person'=>$person,
	    			'url'=>$person->profile_url
	    			);
	    	}
	    	// retrieve people by skills
	    	$skills_query = Skill::where('name','like',"%$query%")->take(5);
	    	if($skills_query->count() > 0) {
	    		foreach($skills_query->get() as $skill) {
	    			if($skill->users()->count() > 0) {
		    			$results[] = array(
		    				'type'=>'skill',
		    				'name'=>$skill->name,
		    				'skill'=>$skill,
		    				'people_count'=>$skill->users()->count(),
		    				'image'=>asset('assets/images/skill.gif'),
		    				'url'=>$skill->url
		    			);
		    		}
	    		}
	    	}

	    	$business_query = Business::where('name','like',"%$query%")->take(5);
	    	if($business_query->count() > 0) {
	    		foreach($business_query->get() as $business) {
	    			
		    			$results[] = array(
		    				'type'=>'business',
		    				'name'=>$business->name,
		    				'business'=>$business,
		    				'person'=>$business->user(),
		    				'image'=>asset('assets/images/business.gif'),
		    				'url'=>'#'
		    			);
		    		
	    		}
	    	}
	    }
    	if($request->ajax()){
    		return response()->json(array('status'=>'success','results'=>$results));
    	}
    	return view('search.results')->with('results',$results)->with('query',$query);
    }


}
