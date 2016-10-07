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
		                	<img class="" width="800" height="193" src="{{asset('assets/images/Logo_800x193_Purple.png')}}" alt="Next Degree Logo" />
		                	@if(Auth::guest())
		                	<a class="uk-button uk-button-primary uk-float-right" href="{{url('home/')}}">Sign In <i class="uk-icon-arrow-right"></i></a>
		                	@else
		                	<a class="uk-button uk-button-primary uk-float-right" href="{{url('home/')}}">Your Dashboard <i class="uk-icon-arrow-right"></i></a>
		                	@endif
		                </div>
		</div>
	</div>
</div>
<div class="uk-width-1-1  nd-bg-dark-geo" id="signUpFormDiv">
	<div class="uk-container uk-container-center ">
		<div class="uk-grid " data-uk-grid-margin>
		                <div class="uk-width-medium-1-1 uk-margin-top uk-margin-large-bottom uk-contrast ">
		 
		                	<h2 class="uk-heading-large ">Jumpstart Your Career</h2>
		                	<p class="uk-text-large uk-text-bold">Next Degree connects students and local businesses to help develop student careers from freshers week to graduation and beyond. </p>{{--<p class="uk-text-large">
You can use the skills you're developing at University to gain paid work experience, boosting your income and your CV. <br>From programming to tuition, Next Degree brings work to you.</p>--}}
<p class="uk-text-large">Next Degree is being developed for students in Nottingham. Our website will give you your own profile and schedule.  Based on your profile and interests employers will be able to contact you to offer work opportunities.</p>
<p class="uk-text-large ">Sign up now to create your basic profile, to access careers and university advice written by recent graduates and current students, and to stay up to date with Next Degree's development.   <a href="{{url('for-students')}}"  class="uk-contrast">Read more &raquo;</a></p>
		                	<h2>Sign up now with your university email</h2>
		                	<p>Open to students of the University of Nottingham or Nottingham Trent University</p>
		                	@if(Auth::guest())
		                	<form method="post" action="{{action('QuickSignupController@makeUser')}}" id="signUpForm" class="uk-form">
		                	{{ csrf_field() }}
		                	<input name="type" value="student" type="hidden">
		                		<input id="signUpInput" type="email" class="uk-form-width-large uk-form-large" name="email">
		                		<button  class="uk-button uk-button-large uk-button-primary" type="submit">Sign Up <i class="uk-icon-arrow-right"></i></button>
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
		                	<p id="invalidUniMsg" class="uk-hidden">Unfortunately we are not currently accepting registrations from your University yet!<br>If you're interested in getting Next Degree at your University please <a href="#">get in touch</a>.  </p>
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

<div class="uk-width-1-1 " id="buSignUpFormDiv">
	<div class="uk-container uk-container-center ">
		<div class="uk-grid " data-uk-grid-margin>
		                <div class="uk-width-medium-1-1 uk-margin-top uk-margin-large-bottom  ">
		 
		                	<h2 class="uk-heading-large ">Recruit Fresh Talent</h2>
		                	<p class="uk-text-large uk-text-bold">Next Degree will put you in touch with local students and graduates so you can bring fresh talent and skills into your business. <a href="{{url('for-business')}}">Read more &raquo;</a></p>
		                	<h2>Sign up for a business account now</h2>
		                	
		                	@if(Auth::guest())
		                	<form method="post" action="{{action('QuickSignupController@makeUser')}}" id="buSignUpForm" class="uk-form">
		                	{{ csrf_field() }}
		                	<input name="type" value="business" type="hidden">
		                		<input id="signUpInput" type="email" class="uk-form-width-large uk-form-large" name="email">
		                		<button  class="uk-button uk-button-large uk-button-primary" type="submit">Sign Up <i class="uk-icon-arrow-right"></i></button>
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
		                	
		                	@else
		                	<p>You're already signed in!</p>
		                	@endif
		                </div>	
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
		                <div class="uk-width-medium-1-1 uk-margin-top " >
		                	<h1>Get the Know How</h1>
		                	<p class="uk-text-large">Hear advice from Nottingham graduates to help you learn from their experience, mistakes and top tips for university.</p>
		                	<p>Read the latest articles posted on Next Degree:</p>
		                	{{--<ul>
		                		<li><a href="#">Writing your CV 101</a></li>
		                		<li><a href="#"></a></li>
		                		<li><a href="#">August job ops in Nottingham</a></li>
								<li><a href="#"></a></li>
								<li><a href="#">Do I need a LinkedIn profile?</a></li>
		                	</ul>--}}

		                	<div class="uk-grid uk-grid-match" data-uk-grid-match="{target:'.uk-panel'}">
		                		@foreach(App\Post::stream()->take(4)->get() as $post)
		                		<div class="uk-width-medium-1-4" >
						        <div class="uk-panel-box" >
							        <a href="{{$post->url}}">
							        <div class="uk-panel-teaser">
							        	<img src="{{$post->preview_image_url}}"/>
							        </div> 
							        
<h3>{{$post->title}}</h3><p>{{$post->description}}</p>
						        	</a>
						        </div>
						     </div>
		                		@endforeach
						   </div>
						    
		                </div>
		</div>
	</div>
	<div class="uk-container uk-container-center uk-margin-large-bottom">
		<div class="uk-grid" data-uk-grid-margin>
		                <div class="uk-width-medium-1-1 uk-margin-top ">
		                	<h1>What's on Offer? </h1>
		                	<p class="uk-text-large">
		                		<ul>
		                		<li>Flexible Part Time Work</li>
		                		<li>Freelancing</li>
		                		<li>Graduate Jobs
</li>
<li>Holiday Jobs &amp; Work Experience
</li>
<li>Paid Internships
</li>
		                		</ul>
		                		<a href="{{url('faq')}}">Read our FAQ to find out more!</a>
		                	</p>
		                	{{--<blockquote class="uk-text-large">"Quote about working in a small business goes here."</blockquote> - Some Person--}}
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