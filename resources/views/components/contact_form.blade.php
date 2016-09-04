<div class="uk-container"> 
@if (count($errors) > 0)
    <div class="uk-alert uk-alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('message_sent'))
<div class="uk-alert uk-alert-success" id="nd-contact-sent">
        Your message has been sent, we will try to reply ASAP.  Thanks for getting in touch!
    </div>
@endif

<form class="uk-form uk-form-stacked" action="{{action('SplashController@sendContactForm')}}" id="nd-contact-form" method="post">
{{csrf_field()}}
    <fieldset>
        <legend class="uk-text-bold">Get In Touch:</legend>
        <div class="uk-form-row">
        	<label class="uk-form-label" for="name">Your Name</label>
        	<input type="text" name="name" />
        </div>
        <div class="uk-form-row">
        	<label class="uk-form-label" for="email">Your Email</label>
        	<input type="text" name="email" />
        </div>
        <div class="uk-form-row">
        	<label class="uk-form-label" for="message">Message</label>
        	<textarea name="message" class="nd-contact-form-textarea" maxlength="10000"></textarea>
        </div>
        <div class="uk-form-row">
        <button class="uk-button-primary uk-button">Send Enquiry</button>
        </div>
    </fieldset>
</form>
</div>