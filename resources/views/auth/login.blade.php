@extends('layouts.modal')

@section('title', 'Sign In')

@section('modal')
<form method="post" action="{{ url('/login') }}" id="login" class="uk-panel uk-panel-box uk-form">
{{ csrf_field() }}
	{{--<input id="signUpInput" type="email" class="uk-hidden" name="email" value="">
	<input type="password" value="" class="uk-hidden">--}}


                    <div class="uk-form-row">
                             @if ($errors->has('email'))
                                <div class="uk-alert uk-alert-danger">{{ $errors->first('email') }}</div>
                            @endif
                        <input class="uk-width-1-1 uk-form-large {{ $errors->has('email') ? ' uk-form-danger' : '' }}" type="email" placeholder="Email" name="email">
                    </div>
                    <div class="uk-form-row">

                            @if ($errors->has('password'))
                                <div class="uk-alert uk-alert-danger">{{ $errors->first('password') }}</div>
                            @endif
                    
                        <input class="uk-width-1-1 uk-form-large {{ $errors->has('password') ? ' uk-form-danger' : '' }}" type="password" placeholder="Password" name="password">
                    </div>
                    <div class="uk-form-row">
                    <a  class="uk-button uk-button-large uk-button-primary" href="{{url('signin/facebook')}}">Sign In with Facebook <i class="uk-icon-facebook-square"></i></a>    
                        <button  class="uk-button uk-button-large uk-button-primary" type="submit">Sign In <i class="uk-icon-arrow-right"></i></button>                    </div>
                    <div class="uk-form-row uk-text-small">
                        <label class="uk-float-left"><input name="remember" type="checkbox"> Remember Me</label>
                        <a class="uk-float-right uk-link uk-link-muted" href="{{ url('/') }}">Sign Up</a><br>
                        <a class="uk-float-right uk-link uk-link-muted" href="{{ url('/password/reset') }}">Forgot Password?</a>
                    </div>

</form>
@endsection
