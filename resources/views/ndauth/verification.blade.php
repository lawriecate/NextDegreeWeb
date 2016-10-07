@extends('onecol')
@section('title', 'Account Verification')

@section('container')
	<h1>Account Verification</h1>
     @if(!Auth::user()->verified)
     @if(Session::has('resent'))
     <div class="uk-alert uk-alert-primary"><i class="uk-icon-envelope-o"></i> We have sent you another email - make sure you open the newest one.</div>
     @endif
     @if(Session::has('invalid_attempt'))
     <div class="uk-alert uk-alert-danger"><i class="uk-icon-exclamation-triangle"></i> Unfortunately the link you just used has expired, please look for the newest email from us.</div>
     @endif
     
     @if(!is_null(Auth::user()->business))
        <p>It's important you verify your account so we can trust you own the email you used to sign up.</p>
     @else
     <p>It's important you verify your account so employers can trust you are a genuine student.  You can only use an unverified account for 7 days after registration.</p>
     @endif
     <p>To do this, we have sent an message to you containing a link which will verify your account when opened.</p>
     <form method="post" action="{{action('VerificationController@request_resend')}}">{{ csrf_field() }}<button class="uk-button-primary uk-button-large uk-button"><i class="uk-icon-envelope"></i> Resend Email</button></form>
     @else
     <div class="uk-alert uk-alert-success"><i class="uk-icon-check"></i> Congratulations, you have succesfully verified your account.</div> 
     @endif
    
@endsection