@extends('layouts.modal')

@section('title', 'Sign Up')

@section('modal')
<h1>Welcome!</h1>
<p>To verify your identity, we have emailed you a link which you must open in the next 7 days!</p>
<p>Your password is: <span class="uk-text-danger">{{$password}}</span>.  <br>You can change it from your settings.</p>

<form method="post" action="{{action('QuickSignupController@redirect')}}" id="signUpForm" class="uk-panel uk-panel-box uk-form">
{{ csrf_field() }}
	{{--<input id="signUpInput" type="email" class="uk-hidden" name="email" value="">
	<input type="password" value="" class="uk-hidden">--}}


                    {{--<div class="uk-form-row">
                        <input class="uk-width-1-1 uk-form-large" type="text" placeholder="Email">
                    </div>
                    <div class="uk-form-row">
                        <input class="uk-width-1-1 uk-form-large" type="text" placeholder="Password">
                    </div>--}}
                    <div class="uk-form-row">
             			<input id="email" type="text"  disabled="disabled" name="email" value="{{$email}}">
             			<input id="password" type="password" disabled="disabled"  name="password" value="{{$password}}">
                        <button type="submit" class="uk-width-1-1 uk-button uk-button-primary uk-button-large" href="#" type="submit">Continue <i class="uk-icon-arrow-right"></i></button>
                       
                    </div>
                    {{--<div class="uk-form-row uk-text-small">
                        <label class="uk-float-left"><input type="checkbox"> Remember Me</label>
                        <a class="uk-float-right uk-link uk-link-muted" href="#">Forgot Password?</a>
                    </div>--}}

</form>
@endsection
