@extends('onecol_100')
@section('title', 'For Students')
@section('description', 'Learn about Next Degree and how you can find work opportunities, including summer jobs and internships.')

@section('container')
<div class="uk-vertical-align uk-text-center uk-margin-bottom" style="height:450px;background: url('{{asset('assets/images/for_students_cover.jpg')}}');background-size:cover;">
                        <div class="uk-vertical-align-middle uk-width-1-2 uk-contrast ">
                            <h1 class="uk-heading-large nd-splash-text-highlight">For Students</h1>
                            <p class="uk-text-large nd-splash-text-highlight">Next Degree gives you exclusive access to news and opportunities to help you <span class="uk-text-bold">earn money</span> and <span class="uk-text-bold">gain experience</span> as a student or a graduate.</p>
                            <p>
                                <a class="uk-button uk-button-primary uk-button-large" href="{{url('')}}">Sign Up Now!</a>
                   
                            </p>
                        </div>
                    </div>
	{{--<h1 class="uk-heading-large">For Students</h1>

	<p class="uk-text-large">Next Degree gives you exclusive access to news and opportunities to help you <span class="uk-text-bold">earn money</span> and <span class="uk-text-bold">gain experience</span> as a student or a graduate.</p>--}}
	<div class="uk-container uk-container-center">
	<div class=" uk-text-large">

		<p>More and more students are looking to take on part time work while studying. <br>Why not make the most of your time by finding work that is relevant to your future career?</p>
		<p>Signing up to Next Degree is free and will give you:<ul>
		<li>Unique opportunities near your university: part time work, placements/internships and graduate jobs</li>
		<li>Exclusive news and articles that will help you boost your career prospects</li>
		<li>A platform to network with local businesses</li>
		</ul>
		<p>We have launched in Nottingham - one of the fastest growing cities in the UK - because it has tons of students and a wide range of businesses looking for fresh local talent.  </p>
		<p>If you have any questions or enquiries please fill out this contact form</p>
	</div>
	@include('components.contact_form')
	</div>


@endsection