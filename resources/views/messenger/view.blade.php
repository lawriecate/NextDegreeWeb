@extends('messenger.layout')
@section('title', 'Messages')

@section('messenger.container')

	<h1>{{$thread->title}}</h1>
		<ul class="nd-msg-thread">
		@foreach($thread->messages as $message)
		<li class="nd-msg-m nd-msg-m-{{$message->from_or_to}}"><p class="b">{{$message->body}}</p><p class="uk-text-small t">{{$message->created_at->diffForHumans()}}</p></li>
		@endforeach
		</ul>
		<div class="uk-clearfix">&nbsp;</div>
		<form class="uk-form" action="{{action('MessageController@storeToThread',$thread)}}" method="post">
		{{ csrf_field() }}
		<input type="hidden" value="{{$thread->long_id}}" name="thread_id" />
		<div class="msg-enter-box">
			<div class="uk-form-row ">
			<textarea name="msg" id="msgTextarea" class="uk-width-1-1"></textarea>
			</div>
			<div class="uk-form-row ">
			<input class="uk-button-primary uk-button uk-contrast" type="submit" value="Send"/>
			</div>
			</div>

		</form>

@endsection