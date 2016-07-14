@extends('layouts.modal')

@section('title', 'Reset Password')

@section('modal')
<form method="post" action="{{ url('/password/reset') }}" class="uk-panel uk-panel-box uk-form">
{{ csrf_field() }}
	{{--<input id="signUpInput" type="email" class="uk-hidden" name="email" value="">
	<input type="password" value="" class="uk-hidden">--}}

      <input type="hidden" name="token" value="{{ $token }}">
                    <div class="uk-form-row">
                             @if ($errors->has('email'))
                                <div class="uk-alert uk-alert-danger">{{ $errors->first('email') }}</div>
                            @endif
                        <input class="uk-width-1-1 uk-form-large {{ $errors->has('email') ? ' uk-form-danger' : '' }}" type="text" placeholder="Email" name="email"  value="{{ $email or old('email') }}">
                    </div>
                    
                     <div class="uk-form-row">
                             @if ($errors->has('password'))
                                <div class="uk-alert uk-alert-danger">{{ $errors->first('password') }}</div>
                            @endif
                        <input class="uk-width-1-1 uk-form-large {{ $errors->has('password') ? ' uk-form-danger' : '' }}" type="password" placeholder="Password" name="password">
                    </div>
                    
                    <div class="uk-form-row">
                             @if ($errors->has('password_confirmation'))
                                <div class="uk-alert uk-alert-danger">{{ $errors->first('password_confirmation') }}</div>
                            @endif
                        <input class="uk-width-1-1 uk-form-large {{ $errors->has('password_confirmation') ? ' uk-form-danger' : '' }}" type="password" placeholder="Confirm Password" name="password_confirmation">
                    </div>
                    
                    <div class="uk-form-row">
                        <button  class="uk-button uk-button-large uk-button-primary" type="submit">Reset Password <i class="uk-icon-refresh"></i></button>                    </div>
                     <div class="uk-form-row uk-text-small">
                        
                      
                    </div>

</form>
  <a class="uk-float-right uk-link uk-link-muted uk-margin-top" href="{{ url('/') }}">Return To Homepage</a>
@endsection
