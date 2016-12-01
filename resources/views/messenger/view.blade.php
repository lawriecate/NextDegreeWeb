@extends('onecol')
@section('title', 'Messages')

@section('container')
<div class="uk-grid">
	<div class="uk-width-medium-2-6">
		<h1>View</h1>
		<a href="{{action('MessageController@create')}}" class="uk-button uk-button-primary">New Message </a>
		<ul>
		@foreach(Auth::user()->threads as $thread)
			<li><a href="{{$thread->url}}">{{$thread->title}}</a></li>
		@endforeach
		</ul>
			
		
</div>
	<div class="uk-width-medium-4-6">
	<h1>{{$thread->title}}</h1>
		<ul>
		@foreach($thread->messages as $message)
		<li>{{$message->body}}</li>
		@endforeach
		</ul>
		<form action="{{action('MessageController@storeToThread',$thread)}}" method="post">
		{{ csrf_field() }}
		<input type="hidden" value="{{$thread->long_id}}" name="thread_id" />
		<textarea name="msg"></textarea>
		<input type="submit" value="Send"/>
		</form>
	</div>
</div>
@endsection