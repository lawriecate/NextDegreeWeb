@extends('messenger.layout')
@section('title', 'Messages')

@section('messenger.container')
		<h1 class="uk-text-center">Write A New Message</h1>
	<div class="uk-grid ">

		<div class="uk-width-xlarge-2-4 uk-align-center">
	
			<form action="{{action('MessageController@store')}}" method="post" class="uk-form">
			{{ csrf_field() }}
			<input type="hidden" name="recipient" class="msg-recipient-field " />
			<!--<input type="text" placeholder="Send To ID" name="recipient" />-->
			<div class="uk-form-row uk-autocomplete msg-name-ac uk-form uk-width-1-1" data-uk-autocomplete="{source:'{{action('MessageController@userAutocomplete')}}' }">

			    <input type="text" class="msg-recipient-name uk-form-controls-text uk-width-1-1" placeholder="Enter name or email"  />
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
			<div class="msg-enter-box msg-enter-box-new">
			<div class="uk-form-row ">
			<textarea name="msg" id="msgTextarea" class="uk-width-1-1"></textarea>
			</div>
			<div class="uk-form-row ">
			<input class="uk-button-primary uk-button" type="submit" value="Send"/>
			</div>
			</div>
		
			</form>
		</div>
</div>
@endsection