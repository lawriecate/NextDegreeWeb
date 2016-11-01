@extends('admin.layout')

@section('admin-panel')

<div class="uk-container uk-margin-top">
	<h1>Support Case #{{$ticket->id}}</h1>
	
  <h4>From: {{$ticket->email}} @if(App\User::where('email',$ticket->email)->count()>0 && $user=App\User::where('email',$ticket->email)->get()) (registered) @else (no account registered with this email) @endif</h4>
  
 
  @foreach($ticket->messages as $msg)

  <h5>Message ID: {{$msg->id}}<br> {{ucfirst($msg->verb)}}: <time class="htr" datetime="{{date("c",strtotime($msg->created_at))}}" title="{{$msg->created_at}}">{{$msg->created_at}}</time></h5>
  <div class="uk-block uk-padding @if($msg->is_incoming) uk-block-primary uk-contrast @else uk-block-secondary uk-contrast @endif">
      <div class="uk-container" >
      {{$msg->email_body}}
      </div>
   </div>
	
  @if(!empty($msg->attachments)) 
    <h5>Attachments</h5>
    <ul>
      @foreach($msg->attachments as $attachment)
      <li><a href="#">{{$attachment->filename}} ({{$attachment->filesize}}) </a></li>
      @endforeach
    </ul>
  @endif
  @endforeach
  <h2>Send Response:</h2>
  <form class="uk-form" action="{{action('SupportController@reply',['ticket'=>$ticket->id])}}" method="post">
  {{ csrf_field() }}
    <fieldset data-uk-margin>
    <div class="uk-form-controls">
        <legend>Message:</legend>
        <textarea name="msg" class="uk-width-1-1" cols="30" rows="8"></textarea>
    </div>
        <br/>
        <button class="uk-button">Send</button>
  
    </fieldset>

</form>
</div>
@endsection

