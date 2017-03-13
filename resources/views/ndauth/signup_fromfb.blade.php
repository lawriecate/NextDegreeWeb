@extends('layouts.modal')

@section('title', 'Sign Up')

@section('modal')
<div class="uk-contrast">
<h1>Welcome to Next Degree!</h1>
{{--<p>To verify your identity, we have emailed you a link which you must open in the next 7 days!</p>--}}
<p>Please enter your university email address to continue:</p>
</div>
<form method="post" action="{{action('QuickSignupController@QuickSignupController@facebookEmailPromptSave')}}" id="signUpForm" class="uk-panel uk-panel-box uk-form">
{{ csrf_field() }}
	{{--<input id="signUpInput" type="email" class="uk-hidden" name="email" value="">
	<input type="password" value="" class="uk-hidden">--}}


             		<div class="uk-form-row">
                        <input class="uk-width-1-1 uk-form-large" type="text" placeholder="Email">
                    </div>
                    
                    <div class="uk-form-row">
             			
                        <button type="submit" class="uk-width-1-1 uk-button uk-button-primary uk-button-large" href="#" type="submit">Signup with Facebook <i class="uk-icon-facebook-square"></i></button>
                       
                    </div>
                    {{--<div class="uk-form-row uk-text-small">
                        <label class="uk-float-left"><input type="checkbox"> Remember Me</label>
                        <a class="uk-float-right uk-link uk-link-muted" href="#">Forgot Password?</a>
                    </div>--}}

</form>
<p><a href="{{action('QuickSignupController@namePrompt')}}" class="uk-button uk-button-small">Cancel</a></p>
@endsection
