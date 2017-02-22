@extends('messenger.layout')
@section('title', 'Messages')

@section('messenger.container')
		<h1>New Message</h1>
	<div class="uk-grid ">

		<div class="uk-width-xlarge-4-4">
	
			<form action="{{action('MessageController@store')}}" method="post" class="uk-form new-msg-form" id="newMsgForm">
			{{ csrf_field() }}
			<input type="hidden" name="recipient" class="msg-recipient-field " value="{{$prefill_id or ''}}"  />
			<!--<input type="text" placeholder="Send To ID" name="recipient" />-->
			<div class="uk-form-row uk-autocomplete msg-name-ac uk-form uk-width-1-1" data-uk-autocomplete="{source:'{{action('MessageController@userAutocomplete')}}' }">

			    <span class="msg-to-label">To: </span><input type="text" class="msg-recipient-name uk-form-controls-text" placeholder="Start typing a name or email"  value="{{$prefill_name or ''}}"  />
			    <script type="text/autocomplete">
			        <ul class="uk-nav uk-nav-autocomplete uk-autocomplete-results">
			            @{{~items}}
			            <li data-value="@{{ $item.value }}">
			                <a>
			                <img src="@{{$item.img}}" width="50" height="50" alt="Profile image for @{{ $item.title }}" />
			                    @{{ $item.title }}
			                    
			                </a>
			            </li>
			            @{{/items}}
			        </ul>
			    </script>
			</div>
			<div class="msg-enter-box msg-enter-box-new">
			<div class="uk-form-row ">
			<textarea name="msg" id="msgTextarea" class="uk-width-1-1 nd-newmsg-textarea"></textarea>
			</div>
			<div class="uk-form-row ">
			<input class="uk-button-primary uk-button" type="submit" value="Send"/>
			</div>
			</div>
		
			</form>
		</div>
</div>
@endsection