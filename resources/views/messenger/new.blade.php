@extends('onecol')
@section('title', 'Messages')

@section('container')
<div class="uk-grid">
	<div class="uk-width-medium-2-6">
		<h1>Messages</h1>
		<a href="#" class="uk-button uk-button-primary">New Message </a>
		<ul>
		@foreach(Auth::user()->threads as $thread)
			<li><a href="{{$thread->url}}">{{$thread->title}}</a></li>
		@endforeach
		</ul>
			
		
</div>
	<div class="uk-width-medium-4-6">
		New Message
		<form action="{{action('MessageController@store')}}" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="recipient" class="msg-recipient-field" />
		<!--<input type="text" placeholder="Send To ID" name="recipient" />-->
		<div class="uk-autocomplete msg-name-ac uk-form" data-uk-autocomplete="{source:'{{action('MessageController@userAutocomplete')}}' }">
		    <input type="text" class="msg-recipient-name" />
		    <script type="text/autocomplete">
		        <ul class="uk-nav uk-nav-autocomplete uk-autocomplete-results">
		            @{{~items}}
		            <li data-value="@{{ $item.value }}">
		                <a>
		                    @{{ $item.title }}
		                    <div>@{{{ $item.text }}}</div>
		                </a>
		            </li>
		            @{{/items}}
		        </ul>
		    </script>
		</div>
		<textarea name="msg"></textarea>
		<input type="submit" value="Send"/>
		</form>
	</div>
</div>
@endsection