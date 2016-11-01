<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\SupportMessage;
use Mail;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.support');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ticket)
    {
        return view('admin.view_support_case')->with('ticket',$ticket); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reply($ticket,Request $request)
    {
         Mail::send('emails.support_reply', ['ticket' => $ticket,'reply_msg'=>$request->msg], function ($m) use ($ticket) {
            $m->from('support@nextdegree.co.uk', 'Next Degree Support');

            $m->to($ticket->email,$ticket->email)->subject('RE Support Enquiry #'.$ticket->id);
        });

        $message = new SupportMessage;
        $message->support_ticket_id = $ticket->id;
        $message->is_incoming = 0;
        $message->email_subject = 'RE Support Enquiry #'.$ticket->id;
        $message->email_body = $request->msg;
        $message->save();
        return redirect()->action('SupportController@edit',array('ticket'=>$ticket));
    }

    public function downloadAttachment($ticket,$message,$filename) 
    {
        $message = SupportMessage::findOrFail($message);
        $found = false;
        foreach($message->attachments as $attachment) {
            if($filename == $attachment->filename) {
                $found = true;
            }
        }
        if($found) {
            return response()->file('../piping/attachments/'.$filename);
        }
        abort(404);

    }
}
