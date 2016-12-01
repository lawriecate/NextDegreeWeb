<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Message;
use App\User;
use Vinkla\Hashids\Facades\Hashids;
use Auth;

class MessageController extends Controller
{
    public function index(){
    	return view('messenger.index');
    }

    public function store(Request $request) {
    	// send message
    	// check if thread exists for the recipient
    	$recipient = User::where('long_id',$request->recipient)->firstOrFail();
    	$sender = Auth::user();

    	$thread = Thread::whereHas('users', function ($query) use ($sender) {
		    $query->where('threadable_id', '=',$sender->id);
		})->whereHas('users', function ($query) use ($recipient) {
		    $query->where('threadable_id', '=', $recipient->id);
		})->first();


    	// if not create 
    	if($thread==null) {
    		
    		$thread = new Thread;
    		$thread->save();
    		$thread->long_id= Hashids::encode($thread->id);
    		$thread->save();
    		$sender->threads()->save($thread);
    		$recipient->threads()->save($thread);
    	}
    	// insert new message

    	$message = new Message;
    	$message->body = $request->msg;
    	$message->thread_id = $thread->id;
		$message->save();

    	return redirect($thread->url);

    }

    public function storeToThread(Request $request,Thread $thread) {
    	// send message
    	
    	$message = new Message;
    	$message->body = $request->msg;
    	$message->thread_id = $thread->id;
		$message->save();

    	return redirect($thread->url);

    }


    public function create(Request $request) {
    	return view('messenger.new');

    }

    public function view(Request $request, $thread) {
    	// view thread
	return view('messenger.view')->with('thread',$thread);
    }

    public function userAutocomplete(Request $request){
    	$query = $request->search;

    	$users = User::where('name','like',"%$query%")->get();

    	$data =array();
    	foreach($users as $user) {
    		$data[]= array(
    			'value'=>$user->long_id . '+' . $user->name,
    			'title'=>$user->name,
    			'url'=>'#',
    			'text'=>$user->name);
    	
    	}
    	 return response()->json($data);

    }
}
