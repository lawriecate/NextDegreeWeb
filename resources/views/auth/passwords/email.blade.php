@extends('layouts.modal')

@section('title', 'Reset Password')

@section('modal')
<form method="post" action="{{ url('/password/email') }}" class="uk-panel uk-panel-box uk-form">
{{ csrf_field() }}
	{{--<input id="signUpInput" type="email" class="uk-hidden" name="email" value="">
	<input type="password" value="" class="uk-hidden">--}}

                    <div class="uk-form-row">
                             @if ($errors->has('email'))
                                <div class="uk-alert uk-alert-danger">{{ $errors->first('email') }}</div>
                            @endif
                        <input class="uk-width-1-1 uk-form-large {{ $errors->has('email') ? ' uk-form-danger' : '' }}" type="text" placeholder="Email" name="email" value="{{ old('email') }}">
                    </div>
                    
                    <div class="uk-form-row">
                        <button  class="uk-button uk-button-large uk-button-primary" type="submit">Send Password Reset Link <i class="uk-icon-envelope"></i></button>                    </div>
                     <div class="uk-form-row uk-text-small">
                      
                    </div>

</form>
  <a class="uk-float-right uk-button uk-button-primary  uk-link uk-margin-top" href="{{ url('/') }}">Return To Homepage</a>
@endsection