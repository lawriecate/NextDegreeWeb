@extends('layouts.modal')

@section('title', 'Hello!')

@section('modal')
<div class="uk-contrast">
<h1>What's your name?</h1>
{{--<p>To verify your identity, we have emailed you a link which you must open in the next 7 days!</p>--}}
<p>Before you can get started please enter your name.</p>
</div>
<form method="post" action="{{action('QuickSignupController@saveName')}}"  id="nameFOrm" class="uk-panel uk-panel-box uk-form">
{{ csrf_field() }}
	

                    <div class="uk-form-row">
                        <input class="uk-width-1-1 uk-form-large {{ $errors->has('name') ? ' uk-form-danger' : '' }}" name="name" type="text" placeholder="Name">
                    </div>
                   
                    <div class="uk-form-row">
                        <button type="submit" class="uk-width-1-1 uk-button uk-button-primary uk-button-large" href="#">Save &amp; Continue <i class="uk-icon-arrow-right"></i></button>
                    </div>
                    <div class="uk-form-row uk-text-small">
                       ...
                    </div>

</form>
@endsection
