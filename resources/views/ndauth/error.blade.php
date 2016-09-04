@extends('layouts.modal')

@section('title', 'Sign Up Error')

@section('modal')
<div class="uk-contrast">
<h1>Uh oh.</h1>
<p>Unfortunately we couldn't sign you up because:</p>
@if (count($errors) > 0)
							    <div class="uk-alert uk-alert-danger">
							        <ul>
							            @foreach ($errors->all() as $error)
							                <li>{{ $error }}</li>
							            @endforeach
							        </ul>
							    </div>
							@endif
<p>If you need more help creating a Next Degree account, then please email us.</p>
<p><a href="{{url('/')}}">Return to Homepage</a></p>
</div>
@endsection
