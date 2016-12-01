@extends('onecol')
@section('title', 'Messages')

@section('container')
<div class="uk-grid">
	<div class="uk-width-medium-2-6">
		<h1>Messages</h1>
		<a href="{{action('MessageController@create')}}" class="uk-button uk-button-primary">New Message </a>
		<ul>
		@foreach(Auth::user()->threads as $thread)
			<li><a href="{{$thread->url}}">{{$thread->title}}</a></li>
		@endforeach
		</ul>
			
		
</div>
	<div class="uk-width-medium-4-6">
		Thread
	</div>
</div>
@endsection