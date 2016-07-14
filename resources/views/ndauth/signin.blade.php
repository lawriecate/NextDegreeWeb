@extends('layouts.modal')

@section('title', 'Sign In')

@section('modal')
<form method="post" action="{{ url('/login') }}" id="signUpForm" class="uk-panel uk-panel-box uk-form">
{{ csrf_field() }}
	{{--<input id="signUpInput" type="email" class="uk-hidden" name="email" value="">
	<input type="password" value="" class="uk-hidden">--}}


                    <div class="uk-form-row">
                        <input class="uk-width-1-1 uk-form-large {{ $errors->has('email') ? ' uk-form-danger' : '' }}" type="text" placeholder="Email">
                    </div>
                    <div class="uk-form-row">
                    <div class="uk-alert uk-alert-danger">...</div>
                        <input class="uk-width-1-1 uk-form-large {{ $errors->has('password') ? ' uk-form-danger' : '' }}" type="text" placeholder="Password">
                    </div>
                    <div class="uk-form-row">
                        <a class="uk-width-1-1 uk-button uk-button-primary uk-button-large" href="#">Continue <i class="uk-icon-arrow-right"></i></a>
                    </div>
                    <div class="uk-form-row uk-text-small">
                        <label class="uk-float-left"><input type="checkbox"> Remember Me</label>
                        <a class="uk-float-right uk-link uk-link-muted" href="#">Forgot Password?</a>
                    </div>

</form>
@endsection
