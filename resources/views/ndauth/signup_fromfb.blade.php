@extends('layouts.modal')

@section('title', 'Sign Up')

@section('modal')
<div class="uk-contrast">
<h1>Welcome to Next Degree!</h1>
{{--<p>To verify your identity, we have emailed you a link which you must open in the next 7 days!</p>--}}
<p>Please enter your university email address to continue:</p>
@if(session('fbcallbackaction')=='register') 
{{session('fbpromptemail')}}
@endif
</div>
<form method="post" action="{{action('QuickSignupController@facebookEmailPromptSave')}}" class="uk-panel uk-panel-box uk-form">
{{ csrf_field() }}
	
             		<div class="uk-form-row">
                        <input class="uk-width-1-1 uk-form-large" type="text" placeholder="Email" name="email">
                    </div>
                    
                    <div class="uk-form-row">
             			
                        <button type="submit" class="uk-width-1-1 uk-button uk-button-primary uk-button-large" href="#" type="submit">Signup with Facebook <i class="uk-icon-facebook-square"></i></button>
                       
                    </div>
                   

</form>

@endsection
