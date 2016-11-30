@extends('onecol')
@section('title', 'Next Degree For Institutions')

@section('container')
<div class="uk-grid">
	<div class="uk-width-medium-4-6">
		<h1>Next Degree for Institutions</h1>
		
		<hr/>
		<div class="partner-stats">
			<h3>Your Statistics</h3>
			<p>There are {{App\Student::where('institution_id',$institution->id)->count() }} students registered from {{$institution->name}}</p>
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
		<h2>Partner Tools:</h2>
	</div>
</div>
@endsection