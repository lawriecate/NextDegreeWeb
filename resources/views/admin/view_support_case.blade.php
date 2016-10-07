@extends('admin.layout')

@section('admin-panel')

<div class="uk-container uk-margin-top">
	<h1>Support Case #{{$case->id}}</h1>
	
  <h4>From: {{$case->email_from}} @if(App\User::where('email',$case->email_from)->count()>0 && $user=App\User::where('email',$case->email_from)->get()) (registered) @else (not registered with this email) @endif</h4>
  
  <h4>Message:</h4> 
  <div class="uk-block uk-block-default">{{$case->email_body}}</div>
	
  <h3>Attachments</h3>
  <p>{{var_dump($case->attachments)}}

  <h2>Send Response:</h2>
  <form class="uk-form">

    <fieldset data-uk-margin>
        <legend>Message:</legend>
        <input type="text" placeholder="">
        
        <button class="uk-button">Send</button>
  
    </fieldset>

</form>
</div>
@endsection

