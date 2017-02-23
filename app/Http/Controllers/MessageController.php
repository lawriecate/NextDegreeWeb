<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Message;
use App\User;
use Vinkla\Hashids\Facades\Hashids;
use Auth;
use App\Events\MessageSent;

class MessageController extends Controller
{
    
    public function index(Request $request){
        if($request->st!="") {
            $user = User::where('long_id',$request->st)->firstOrFail();

            return view('messenger.new')->with('prefill_id',$user->long_id)->with('prefill_name',$user->name);
        }
    	return view('messenger.new');
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
        $message->sender_id = $sender->id;
		$message->save();

        $return = array(
            'result'=>'sent',
            'threadUrl'=>$thread->url
            );

        if($request->ajax()){
            return response()->json($return);
        }
    	return redirect($thread->url);

    }

    public function storeToThread(Request $request,Thread $thread) {
    	if(!$thread->users->contains(Auth::user())) {
           abort(403, 'Unauthorized action.');
        }
        // send message
    	
    	$message = new Message;
    	$message->body = $request->msg;
    	$message->thread_id = $thread->id;
        $message->sender_id = Auth::user()->id;
		$message->save();
        //$message->load('thread.users','sender');
        event(new MessageSent($message));

    	return redirect($thread->url);

    }


    public function create(Request $request) {
    	return view('messenger.new');
    }

    public function view(Request $request, $thread) {
    	// view thread
        if(!$thread->users->contains(Auth::user())) {
           abort(403, 'Unauthorized action.');
        }
        //Message::where('thread_id',$thread->id)->where('sender_id','!=',Auth::user())->where('read','0')->update(['read'=>'1']);
        //$threadable = $thread->users->where('threadable_id',Auth::user();
        $threadable = ($thread->users->where('id',Auth::user()->id)->first());
        //print_r($threadable);
  //  die(); 
        $last_msg_id = $thread->messages()->orderBy('created_at', 'desc')->first()->id;
        $thread->users()->updateExistingPivot($threadable->id, ['last_read_message_id'=>$last_msg_id]);
        //$threadable->save();
	return view('messenger.view')->with('thread',$thread);
    }

    public function userAutocomplete(Request $request){
    	$query = $request->search;
    	$users = User::where('id','!=',Auth::user()->id)->where('name','like',"%$query%")->get();
    	$data =array();
    	foreach($users as $user) {
    		$data[]= array(
    			'value'=>$user->long_id . '+' . $user->name,
    			'title'=>$user->name,
                'img'=>$user->profile_image_or_placeholder()->small_url,
    			'url'=>'#',
    			'text'=>$user->name);
    	
    	}
    	 return response()->json($data);

    }
}
