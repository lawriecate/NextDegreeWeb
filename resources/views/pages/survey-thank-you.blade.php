@extends('onecol_100')
@section('title', 'Thank You!')

@section('container')
<div class="uk-vertical-align uk-text-center uk-margin-bottom" style="height:450px;background: url('{{asset('assets/images/thank_you_cloud.jpg')}}');background-size:cover;">
                        <div class="uk-vertical-align-middle uk-width-1-2 uk-contrast ">
                            <h1 class="uk-heading-large nd-splash-text-highlight">Thank You!</h1>
                           
                        </div>
                    </div>

	<div class="uk-container uk-container-center">
	<div class=" uk-text-large">
	<p class="uk-text-bold">Thanks for taking part in our survey!</p>
	<p>If you have any other suggestions or enquiries, please send us an email using the form below:</p>
	
	</div>
	@include('components.contact_form')
	</div>


@endsection