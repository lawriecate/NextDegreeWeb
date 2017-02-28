<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use Carbon\Carbon;

use Auth;
use Mail;
use Illuminate\Support\Facades\Storage;

class SplashController extends Controller
{


    public function splash() {
    	if(!Auth::guest()) {
    		return redirect(action('HomeController@index'));
    	}
    	if(Storage::exists('twitter_cache.txt') ) 
    	{
    		$tweets = unserialize(Storage::get('twitter_cache.txt'));
    	}
    	else 
    	{
    		$tweets = array();
    	}
    	return view('splash')->with('tweets',$tweets);
    }

    public function sendContactForm(Request $request) {
		 $this->validate($request, [
		        'name' => 'required|max:255',
		        'email' => 'required|email',
		        'message'=>'required|max:10000'
		    ]);
		

		Mail::send('admin.emails.enquiry', ['name'=>$request->name,'email'=>$request->email,'mtxt'=>$request->message], function ($m) {
            $m->from('system@nextdegree.co.uk', 'Next Degree');
            $m->to('mvine@nextdegree.co.uk');
            $m->to('lcate@nextdegree.co.uk');
            $m->subject('Next Degree Enquiry Submission');
        });
		//$request->session()->flash('sent','Message Sent');
         return back()->with('message_sent',true);


    }

    public function newsFeed() {
        $file = file_get_contents('https://news.nextdegree.co.uk/wp-json/wp/v2/posts');
        return response($file)->header('Content-Type', 'application/json');
    }
}

