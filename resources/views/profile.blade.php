@extends('onecol_100')
@section('title', $user->name)
@section('description', $user->name . ' is on Next Degree - a platform to connect students, graduates and businesses and create new work opportunities.')

@section('container')
<div class="uk-container uk-container-center uk-margin-large-bottom uk-margin-top">
<img src="{{$user->profile_image_or_placeholder()->large_url}}" width="300" height="300" alt="Profile image for {{$user->name}}" class="uk-align-center" />
<h1 class="uk-align-center uk-text-center">{{$user->name}}</h1>
@if($user->student != null)

	
	<div class="uk-block uk-block-muted">

	    <div class="uk-container">

	    	<h3>Studies {{$user->student->degree or ''}} at {{$user->student->institution->name}}</h3>
	    	<p>{{$user->student->bio}}</p>
	        <div class="uk-grid uk-grid-match" data-uk-grid-margin="">
	            <div class="uk-width-medium-1-3 uk-row-first">
	                <div class="uk-panel">
	                    @if($user->skills->first())
						<h4>Skills:</h4>
						<ul class="uk-list uk-list-line">
							@foreach($user->skills as $i=> $skill)
							<li class="@if($i > 10) hiddenSkill @endif"><i class="uk-icon-{{$skill->icon}}"></i> {{$skill->name}}</li>
							@endforeach
						</ul>
						@if($user->skills->count() > 10)
						<p><a href="#" class="showAllSkills">Plus {{($user->skills->count())-10}} more</a></p>
						@endif

						@endif
	                </div>
	            </div>
	            <div class="uk-width-medium-1-3">
	                <div class="uk-panel">
	                 @if($user->job_types->first())
						<h4>Looking for:</h4>
						<ul class="uk-list uk-list-line">
							@foreach($user->job_types as $job_type)
							<li>{{$job_type->title}}</li>
							@endforeach
						</ul>
						@endif
	                </div>
	            </div>
	            <div class="uk-width-medium-1-3">
	                <div class="uk-panel">
	                <p>
	                    @if((isset(Auth::user()->id)) && Auth::user()->id != $user->id)
	                    <a href="{{action('MessageController@index')}}?st={{$user->long_id}}" class="uk-button uk-button-primary"><i class="uk-icon-envelope"></i> Send Message</a>
	                    @endif
	                    </p>
	                    @if(isset(Auth::user()->student->cv_path) && Auth::user()->student->cv_path != null)
	                    <p>
	                    <a href="{{Auth::user()->student->cv_path}}" class="uk-button uk-button-primary"><i class="uk-icon-download"></i> Download CV</a>
	                    </p>
	                    @endif
	                </div>
	            </div>
	        </div>

	    </div>

    </div>
@elseif($user->business != null)

	
	<div class="uk-block uk-block-muted">

	    <div class="uk-container">

	    	<h3>Represents {{$user->business->name}}</h3>
	        <div class="uk-grid uk-grid-match" data-uk-grid-margin="">
	            <div class="uk-width-medium-1-3 uk-row-first">
	                <div class="uk-panel">
	                   
	                </div>
	            </div>
	            <div class="uk-width-medium-1-3">
	                <div class="uk-panel">
	                
	                </div>
	            </div>
	            <div class="uk-width-medium-1-3">
	                <div class="uk-panel">
	                <p>
	                    
	                    <a href="{{action('MessageController@index')}}?st={{$user->long_id}}" class="uk-button uk-button-primary"><i class="uk-icon-envelope"></i> Send Message</a>

	                    </p>
	                    
	                </div>
	            </div>
	        </div>

	    </div>

    </div>
@else

@endif
</div>

@endsection