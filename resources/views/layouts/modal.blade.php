@extends('layout')

@section('content')
 <div class="uk-vertical-align uk-text-center uk-height-1-1  uk-height-viewport">
     <div class="uk-vertical-align-middle uk-animation-scale" style="width: 500px;">

              <img class="uk-margin-bottom" width="400" height="97" src="{{asset('assets/images/Logo_800x193.png')}}" alt="Next Degree Logo" />

               {{-- <form class="uk-panel uk-panel-box uk-form">
                    <div class="uk-form-row">
                        <input class="uk-width-1-1 uk-form-large" type="text" placeholder="Username">
                    </div>
                    <div class="uk-form-row">
                        <input class="uk-width-1-1 uk-form-large" type="text" placeholder="Password">
                    </div>
                    <div class="uk-form-row">
                        <a class="uk-width-1-1 uk-button uk-button-primary uk-button-large" href="#">Login</a>
                    </div>
                    <div class="uk-form-row uk-text-small">
                        <label class="uk-float-left"><input type="checkbox"> Remember Me</label>
                        <a class="uk-float-right uk-link uk-link-muted" href="#">Forgot Password?</a>
                    </div>
                </form>--}}

                @yield('modal')

            </div>
        



@endsection