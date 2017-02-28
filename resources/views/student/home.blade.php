@extends('onecol')
@section('title', 'Dashboard')

@section('container')
<div class="uk-grid">
	<div class="uk-width-medium-4-6">
		
	<form method="get" action="{{action('SearchController@search')}}" class="uk-form business-search-form">
		<input type="text" name="q" class="business-search-input uk-form-large uk-width-1-1" placeholder="Search for people, skills, companies" class="uk-width-1-1 uk-form-large">
		</form>
		<hr/>
		<div class="business-search-results">
		&nbsp;
		</div>

		<div class="user-welcome uk-margin-bottom">
			<h3>Welcome {{Auth::user()->name}}</h3>
			<p>Thanks for signing up to Next Degree!</p>
		</div>
		<div class="suggested-skills uk-margin-bottom">
			<h3>Suggested Skills</h3>
			<p>Add these skills which are in demand in Nottingham</p>
			<ul class="suggested-skills-l">
			<li><a href="#"  class="uk-button uk-button-large ">...</a></li>
			<li><a href="#"  class="uk-button uk-button-large ">...</a></li>
			<li><a href="#"  class="uk-button uk-button-large ">...</a></li>
			<li><a href="#"  class="uk-button uk-button-large ">...</a></li>
			<li><a href="#"  class="uk-button uk-button-large ">...</a></li>
			</ul>
			<div class="uk-clearfix">&nbsp;</div>
		</div>
		<div class="job-seek uk-margin-bottom">
			<form id="jobseekForm" action="{{action('ProfileController@saveJobSearch')}}" method="POST" class="uk-form-stacked uk-form">
			    {{csrf_field()}}
			<div class="uk-form-row  uk-width-1-1"> 
		
				<h3>What kind of work are you looking for?</h3>
				<p>Keep this area up to date so businesses can find you!</p>
				<ul class="jobseek-checkboxes">
				
					@foreach(App\JobType::orderBy('created_at', 'desc')->get() as $job_type)
						<li>
						<a href="#"  class="uk-button uk-button-large "><i class="uk-icon-square-o uk-icon-large"></i><br>{{$job_type->title}}</a>
						<div class="control"><label><input type="checkbox" class="nd-jobseek-autosave " name="jobtype[{{$job_type->id}}]" value="1" @if(Auth::user()->job_types()->find($job_type->id)) checked="checked" @endif> {{$job_type->title}}</label></div>
					</li>
					@endforeach

				</ul>
				

			</div>
				<input id="jobseekFormSave" type="submit"/>
			</form>
		</div>
		<div class="business-feed uk-margin-bottom">
			<h3>News</h3>
			{{--<ul class="nd-stream"> 
			@foreach(App\Post::stream()->take(10)->get() as $post)
			<li class="uk-animation-slide-left uk-margin-bottom">
				<div class="uk-grid">
					<div class="uk-width-medium-3-10">
						<a href="{{$post->url}}"/><img src="{{$post->preview_image_url}}"/></a>
					</div>
					<div class="uk-width-medium-7-10">
						<h1><a href="{{$post->url}}"/>{{$post->title}}</a></h1>
					<p>{{$post->description}}  <a href="{{$post->url}}"/><span class="uk-text-primary uk-float-right">Read More...</span></a></p>
					</div>
				</div>
					
					
				
			</li>
			@endforeach
			</ul>--}}
			<div class="uk-grid uk-grid-match nd-news" data-uk-grid-match="{target:'.uk-panel'}" >
		            &nbsp;    	
			</div>
		</div>

</div>

	<div class="uk-width-medium-2-6">
		@if(!is_null(Auth::user()->student))
		@include('components.edit_student_profile')

		@endif
	</div>
</div>

@endsection