<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use App\User;
class SkillController extends Controller
{
    public function public_page(Request $request, $slug) {
    		$first_sp = strpos($slug, "-");

    	$id=substr($slug, 0,$first_sp);
    	$name=substr($slug, ($first_sp+1));
    	$name = str_replace("-", " ", $name);
    	$skill  = Skill::where('id',$id)->where('name',$name)->firstOrFail();
	/*
	    $results = array();
		if($skill->users()->count() > 0) {
			foreach($skill->users() as $person) {
    			$results[] = array(
    			'type'=>'person',
    			'name'=>$person->name,
    			'image'=>$person->profile_image_or_placeholder()->small_url,
    			'person'=>$person,
    			'url'=>$person->profile_url
    			);
    		}
		}*/
	    	
	    	return view('skills.skill')->with('skill',$skill);
    }
}
