@extends('layouts.modal')

@section('title', 'Sign Up')

@section('modal')
<form method="post" action="{{ url('/register') }}" id="signUpForm" class="uk-panel uk-panel-box uk-form">
{{ csrf_field() }}
    {{--<input id="signUpInput" type="email" class="uk-hidden" name="email" value="">
    <input type="password" value="" class="uk-hidden">--}}

                     {{--<div class="uk-form-row">
                             @if ($errors->has('name'))
                                <div class="uk-alert uk-alert-danger">{{ $errors->first('name') }}</div>
                            @endif
                        <input class="uk-width-1-1 uk-form-large {{ $errors->has('name') ? ' uk-form-danger' : '' }}" type="text" placeholder="Name" value="{{ old('name') }}">
                    </div>--}}
                    <div class="uk-form-row">
                             @if ($errors->has('email'))
                                <div class="uk-alert uk-alert-danger">{{ $errors->first('email') }}</div>
                            @endif
                        <input class="uk-width-1-1 uk-form-large {{ $errors->has('email') ? ' uk-form-danger' : '' }}" type="text" placeholder="Email"  value="{{ old('email') }}" name="email">
                    </div>
                    <div class="uk-form-row">

                            @if ($errors->has('password'))
                                <div class="uk-alert uk-alert-danger">{{ $errors->first('password') }}</div>
                            @endif
                    
                        <input class="uk-width-1-1 uk-form-large {{ $errors->has('password') ? ' uk-form-danger' : '' }}" type="text" placeholder="Password" name="password">
                    </div>

                    <div class="uk-form-row">

                            @if ($errors->has('password_confirmation'))
                                <div class="uk-alert uk-alert-danger">{{ $errors->first('password_confirmation') }}</div>
                            @endif
                    
                        <input class="uk-width-1-1 uk-form-large {{ $errors->has('password_confirmation') ? ' uk-form-danger' : '' }}" type="text" placeholder="Confirm Password" name="password_confirmation">
                    </div>
                    <div class="uk-form-row">
                        <button  class="uk-button uk-button-large uk-button-primary" type="submit">Sign Up <i class="uk-icon-arrow-right"></i></button>                    </div>
                    <div class="uk-form-row uk-text-small">
                        
                        <a class="uk-float-right uk-link uk-link-muted" href="{{ url('/login') }}">Sign In</a><br>
                        <a class="uk-float-right uk-link uk-link-muted" href="{{ url('/password/reset') }}">Forgot Password?</a>
                    </div>

</form>
@endsection
