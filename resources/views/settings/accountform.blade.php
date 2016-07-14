@extends('onecol')
@section('title', 'Settings')

@section('container')
	<h1>Your Settings</h1>
     @if(!Auth::user()->verified) <div class="uk-alert uk-alert-danger"><i class="uk-icon-exclamation-triangle"></i> Please remember to verify your account, check your email inbox for a message with a link</div> @endif
    @if(Session::has('saved')) <div class="uk-alert uk-alert-success"><i class="uk-icon-check"></i> Settings Saved </div> @endif

	<form method="post" action="{{ action('SettingsController@update') }}" class="uk-panel uk-panel-box uk-form">
{{ csrf_field() }}
                    <div class="uk-form-row">
                             @if ($errors->has('email'))
                                <div class="uk-alert uk-alert-danger">{{ $errors->first('email') }}</div>
                            @endif
                        <input class="uk-width-1-1 uk-form-large {{ $errors->has('email') ? ' uk-form-danger' : '' }}" type="text" placeholder="Email"  value="@if(null !== old('email')){{ old('email') }}@else{{ Auth::user()->email }}@endif" name="email">
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
                        <button  class="uk-button uk-button-large uk-button-primary" type="submit"><i class="uk-icon-save"></i> Save Settings</button>                    </div>
                  

</form>
@endsection