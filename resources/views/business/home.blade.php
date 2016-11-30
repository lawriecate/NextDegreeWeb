@extends('onecol')
@section('title', 'Next Degree For Business')

@section('container')
<div class="uk-grid">
	<div class="uk-width-medium-4-6">
		<h1>Next Degree for Business</h1>
		<h3>Search</h3>
		<form method="get" action="{{action('SearchController@search')}}" class="uk-form business-search-form">
		<input type="text" name="q" class="business-search-input uk-form-large uk-width-1-1" placeholder="Search for people, skills, companies" class="uk-width-1-1 uk-form-large">
		</form>
		<hr/>
		<div class="business-search-results">
		&nbsp;
		</div>
		<div class="business-monitor">
			<h3>Skills Radar</h3>
			
			<p>Let people know what you're looking for and we'll match you with students who can help you.</p>  
			<p>What skills do you need?</p>
			<form method="post" action="{{url('/business/save-radar')}}" class="uk-form">
			{{csrf_field() }}
			<input type="text" name="rskills" class="uk-form-large uk-width-1-1" placeholder="Enter skills you need" class="uk-width-1-1 uk-form-large" value="{{old('rskills',Auth::user()->business->skills_string)}}">
			</form>
			<p>Results go here</p>
		</div>
		<hr/>
		<div class="business-feed">
			<h3>News</h3>
			<ul class="nd-stream"> 
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
			</ul>
		</div>
	</div>
	<div class="uk-width-medium-2-6">
		@if(!is_null(Auth::user()->business))
		@include('components.edit_business_profile')

		@endif
	</div>
</div>
@endsection