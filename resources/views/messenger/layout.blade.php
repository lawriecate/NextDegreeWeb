@extends('layout')

@section('content')

@include('components.navbar')
<div class="uk-container uk-container-center">
<div class="uk-width-1-1 ">
  <div class="uk-margin-large-bottom">

          <div class="uk-grid uk-height-viewport"  data-uk-grid-margin>
			<div class="uk-width-medium-2-6 uk-panel  uk-panel-box">

				<h1 class="uk-panel-title">Messages</h1>
				
				<ul class="uk-nav  uk-nav-side">
				<li ><a href="{{action('MessageController@create')}}"><i class="uk-icon-pencil"></i> New Message </a></li>
				  <li class="uk-nav-divider"></li>
				   <li class="uk-nav-header">Recent Messages</li>

				   @if(Auth::user()->threads->count() ==0)
				   	<li><a href="#">No messages yet </a></li>	
				   @else
					   	@foreach(Auth::user()->threads->take(10) as $thread)
							<li><a href="{{$thread->url}}">{{$thread->title}} @if($thread->new_messages() > 0) <span class="uk-float-right uk-text-bold"> {{$thread->new_messages()}} unread </span> @endif</a></li>
						@endforeach
				   @endif
				
				</ul>
					
			
				</div>
					<div class="uk-width-medium-4-6 uk-margin-top">
						@yield('messenger.container')
					</div>
				</div>


    </div>
  </div>
</div>
</div>

@include('components.footer')


@endsection
