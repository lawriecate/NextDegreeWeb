<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Twitter;
use Carbon\Carbon;

class SplashController extends Controller
{


    public function splash() {
    	$tweets = Twitter::getUserTimeline(['screen_name' => 'next_degree', 'count' => 4, 'format' => 'array']);
    	return view('splash')->with('tweets',$tweets);
    }
}

