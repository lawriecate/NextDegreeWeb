@extends('onecol_100')
@section('title', 'For Business')
@section('description', 'Learn about Next Degree and how you can make the most of student talent.')

@section('container')
<div class="uk-vertical-align uk-text-center uk-margin-bottom" style="height:450px;background: url('{{asset('assets/images/for_business_cover.jpg')}}');background-size:cover;background-position: center bottom;">
                        <div class="uk-vertical-align-middle uk-width-1-2 uk-contrast ">
                            <h1 class="uk-heading-large nd-splash-text-highlight">For Business</h1>
                            <p class="uk-text-large nd-splash-text-highlight">Next Degree gives you easier access to <span class="uk-text-bold">student talent</span> to <span class="uk-text-bold">boost your organisation.</span></p>
                            <p>
                                <a class="uk-button uk-button-primary uk-button-large" href="#">Sign Up Soon</a>
                   
                            </p>
                        </div>
                    </div>
	{{--<h1 class="uk-heading-large">For Students</h1>

	<p class="uk-text-large">Next Degree gives you exclusive access to news and opportunities to help you <span class="uk-text-bold">earn money</span> and <span class="uk-text-bold">gain experience</span> as a student or a graduate.</p>--}}
	<div class="uk-container uk-container-center ">
	<div class="uk-text-large">
		<p>Businesses often struggle to attract students because they do not have the time or resources to compete with large organisations.  We hope to build a local community of dynamic companies and entrepreneurial students who can work together to grow.</p>
		<p>We aren't signing up business users quite yet, but we will be soon! When we launch our business section you will be able to:</p>
		<ul>
		<li>Reach out to local students </li>
		<li>Post job listings</li>
		<li>Promote your business from a recruitment perspective</li>
		
		</ul>

		<p>If you have any questions or enquiries please fill out this contact form</p>
	</div>
	@include('components.contact_form')
	</div>
@endsection