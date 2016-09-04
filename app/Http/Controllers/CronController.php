<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;
use Twitter;

class CronController extends Controller
{
    public function run(Request $request)
    {
    	if($request->key=='G1e9A737YRVojP5k2UdVmD53M0hJX5H2')
    	{
    		$tweets = Twitter::getUserTimeline(['screen_name' => 'next_degree', 'count' => 4, 'format' => 'array']);
	        Storage::put('twitter_cache.txt', serialize($tweets));

	        return 'Crononimo';
    	}
    	abort(404);
        
    

    }
}
