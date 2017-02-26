<h1>Your Profile:</h1>

		
		<div id="profile_progressbar" class="uk-progress">
            <div class="uk-progress-bar" style="width: 20%;">&nbsp;</div>
        </div>
        <form id="profileCompleteForm" action="{{action('ProfileController@saveProfile')}}" method="POST" class="uk-form-stacked uk-form">
        {{csrf_field()}}
		@include('components.edit_profile_form_shared')
		
		<div class="uk-form-row uk-width-1-1">
			<label class="uk-form-label" for="businessname">What's the name of your business? <i class="uk-icon-check uk-text-success uk-hidden" id="businessname-check"></i></label>
			<div class="uk-form-controls  uk-width-1-1">
			 <input type="text" class="nd-profile-autosave uk-form-small uk-width-1-1 nd-profile-cocheck" name="businessname" value="{{old('businessname',Auth::user()->business->name)}}" />
			 </div>
		</div>
		<div class="uk-form-row uk-width-1-1">
			<label class="uk-form-label" for="businesslocation">Where is it based? <i class="uk-icon-check uk-text-success uk-hidden" id="businesslocation-check"></i></label>
			<div class="uk-form-controls  uk-width-1-1">
			 <input type="text" class="nd-profile-autosave uk-form-small uk-width-1-1 nd-profile-cocheck" name="businesslocation" value="{{old('businesslocation',Auth::user()->business->location)}}" />
			 </div>
		</div>
		
		<div class="uk-form-row uk-width-1-1">
				<label class="uk-form-label" for="businessdescription">Describe your business<i class="uk-icon-check uk-text-success uk-hidden" id="businessdescription-check"></i></label>
				<div class="uk-form-controls">
                    <textarea id="ndBusinessPitch" class="nd-profile-autosave uk-width-1-1 nd-profile-cocheck" placeholder="Describe your business and who you look for" name="businessdescription">{{old('businessdescription',Auth::user()->business->description)}}</textarea>
                    <span id="ndBusinessProfilePitchRChar">300</span><span> characters left</span>
                </div>
            </p>
		</div>
		
	<div class="uk-form-row  uk-width-1-1"> 
		
		<input id="profileFormSave" type="submit"/>
		  <a href="{{Auth::user()->profile_url}}" class="uk-button uk-button-primary">Preview Profile</a>
		<span class="uk-text-small" id="profileFormStatus">&nbsp;</span>
	</div>
		</form>