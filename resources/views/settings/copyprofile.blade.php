@extends('layouts.modal')
@section('title', 'Account Connected')

@section('modal')
<div class="uk-contrast">
    <h2>Would you like to copy your profile photo and name from {{$network}}?</h2>
    <div class="uk-text-center">
    <h1>{{session('social_name')}}</h1>
    <img src="{{session('social_avatar')}}" />
    <p>
    <form action="" method="post">
    {{csrf_field()}}
    <button class="uk-button-primary uk-button uk-button-large">Yes please!</button>
    </form>
    </p>
    <p>
    <a href="{{action('SettingsController@accountForm')}}" class=" uk-button uk-button">No thanks</a>
    </p>
    </div>
</div> 
    
@endsection