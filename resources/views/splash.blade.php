@extends('layout')
@section('title', 'Welcome')
@section('description', 'A new way for students and businesses in Nottingham to find and create local opportunities')

@section('content')
{{-- data-uk-parallax="{bg: '-100'}"--}}
<div class="uk-cover-background uk-height-viewport splash-bg uk-animation-fade" data-uk-parallax="{bg: '-100'}" >

	<div class="uk-container uk-container-center uk-margin-large-bottom ">
		<div class="uk-grid" data-uk-grid-margin>
		                <div class="uk-width-medium-1-1 uk-margin-large-top  " >
		                	<h1 class="uk-hidden">Next Degree</h1>
		                	<img class="" width="800" height="193" src="{{asset('assets/images/Logo_800x193.png')}}" alt="Next Degree Logo" />
		                	
		                </div>
		</div>
	</div>
</div>
<div class="uk-width-1-1">
	<div class="uk-container uk-container-center uk-margin-large-bottom">
		<div class="uk-grid " data-uk-grid-margin>
		                <div class="uk-width-medium-1-1 uk-margin-top  ">
		 
		                	<h2 class="uk-heading-large">Jumpstart Your Career</h2>
		                	<p class="uk-text-large uk-text-bold">Next Degree connects students and local businesses to help you build your career from the moment you start your degree through to graduation and beyond. </p><p>
Through Next Degree you can use the skills you're developing at university in paid work experience or other work to help fund your degree. <br>From programming to tuition, Next Degree brings work to you.</p>
		                	<h2>Sign up now with your university email</h2>
		                	<p>Currently open to students of the University of Nottingham or Nottingham Trent University</p>
		                	@if(Auth::guest())
		                	<form method="post" action="{{action('QuickSignupController@makeUser')}}" id="signUpForm" class="uk-form">
		                	{{ csrf_field() }}
		                		<input id="signUpInput" type="email" class="uk-form-width-large uk-form-large" name="email">
		                		<button  class="uk-button uk-button-large" type="submit">Sign Up <i class="uk-icon-arrow-right"></i></button>
		                	</form>
		                	@if (count($errors) > 0)
							    <div class="uk-alert uk-alert-danger">
							        <ul>
							            @foreach ($errors->all() as $error)
							                <li>{{ $error }}</li>
							            @endforeach
							        </ul>
							    </div>
							@endif
		                	<p id="invalidUniMsg" class="uk-hidden">Unfortunately we are not currently accepting registrations from your University yet!<br>If you're interested in getting Next Degree at your University please <a href="#">get in touch</a>.</p>
		                	@else
		                	<p>You're already signed in!</p>
		                	@endif
		                </div>	
		</div>
	</div>
</div>
<div class="uk-modal" id="signUpModal">
							    <div class="uk-modal-dialog">
							        <div class="uk-modal-spinner"></div>
							    </div>
							</div>

{{--<div class="uk-width-1-1 uk-cover-background banner1"  data-uk-parallax="{bg: '-300'}">
	<div class="uk-container uk-container-center uk-margin-large-bottom">
		<div class="uk-grid" data-uk-grid-margin>
		                <div class="uk-width-medium-1-1 uk-margin-top ">
		                	
		                </div>
		</div>
	</div>
</div>--}}

<div class="uk-cover-background banner1" data-uk-parallax="{bg: '-100'}" >
	&nbsp;
</div>

<div class="uk-width-1-1 h300">
	<div class="uk-container uk-container-center uk-margin-large-bottom">
		<div class="uk-grid" data-uk-grid-margin>
		                <div class="uk-width-medium-1-1 uk-margin-top " >
		                	<h1>Why waste your time?</h1>
		                	<p>There are hundreds of businesses in Nottingham that need the skills you have, which could provide you with opportunities that boost your CV and income.</p>
		                	<p>Next Degree will 
		                </div>
		</div>
	</div>
</div>

<div class="uk-cover-background banner2" data-uk-parallax="{bg: '-100'}">
	&nbsp;
</div>

<div class="uk-width-1-1 h300">
	<div class="uk-container uk-container-center uk-margin-large-bottom">
		<div class="uk-grid" data-uk-grid-margin>
		                <div class="uk-width-medium-1-1 uk-margin-top ">
		                	<h1>Sunny Days</h1>
		                	<p>Working in a small business while studying, during your summer break or after graduating will let you develop a wider range of your skills in a friendly atmosphere.</p>
		                	
		                </div>
		</div>
	</div>
</div>


<div class="uk-cover-background banner3" data-uk-parallax="{bg: '-100'}">
	&nbsp;
</div>

<div class="uk-width-1-1 " >
	<div class="uk-container uk-container-center uk-margin-large">
		<div class="uk-grid" data-uk-grid-margin>
		                <div class="uk-width-medium-1-1 uk-margin-top ">
		                	<h1>Latest Tweets</h1>
		                	<div class="uk-grid uk-grid-match" data-uk-grid-match="{target:'.uk-panel'}">
		                	
		                	@foreach( $tweets as $tweet)
		                	 <div class="uk-width-medium-1-4" >
						        <div class="uk-panel-box" >
							        @if(isset($tweet['entities']['media'][0]['media_url_https'])) 
							        <div class="uk-panel-teaser">
							        	<img src="{{ $tweet['entities']['media'][0]['media_url_https']}}"/>
							        </div> 
							        @endif
						        	<p> {{ $tweet['text'] }}</p>
						        </div>
						        
						        <p><i class="uk-icon-twitter uk-icon-small"></i> {{ $tweet['created_at'] }}</p>
						    	

						    </div>
		                	@endforeach
						   </div>
						    
						
		                </div>

		</div>
	</div>
</div>

@include('components.footer');
@endsection