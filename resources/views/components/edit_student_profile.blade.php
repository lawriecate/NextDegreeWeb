<h1>Your Profile:</h1>

		
		<div id="profile_progressbar" class="uk-progress">
            <div class="uk-progress-bar" style="width: 20%;">&nbsp;</div>
        </div>
        <form id="profileCompleteForm" action="{{action('ProfileController@saveProfile')}}" method="POST" class="uk-form-stacked uk-form">
        {{csrf_field()}}
				@include('components.edit_profile_form_shared')
		<div class="uk-form-row uk-width-1-1">
				<label class="uk-form-label" for="bio">Describe yourself! <i class="uk-icon-check uk-text-success uk-hidden" id="bio-check"></i></label>
				<div class="uk-form-controls">
                    <textarea id="ndStudentProfilePitch" class="nd-profile-autosave uk-width-1-1 nd-profile-cocheck" placeholder="Pitch yourself in 300 characters!" name="bio" maxlength="300">{{old('bio',Auth::user()->student->bio)}}</textarea>
                </div>
            	<span id="ndStudentProfilePitchRChar">300</span><span> characters left</span>
			</div>
		<div class="uk-form-row uk-width-1-1">
		<label class="uk-form-label" for="degree">What do you study? <i class="uk-icon-check uk-text-success uk-hidden" id="degree-check"></i></label>
		<div class="uk-form-controls  uk-width-1-1uk-form" id="ndProfileCourse" >
			
			 <input type="text" class="nd-profile-cocheck nd-profile-autosave uk-form-small uk-width-1-1" name="degree" value="{{old('degree',Auth::user()->student->degree)}}" />

		 </div>
		</div>
		<div class="uk-form-row uk-width-1-1">
		<label class="uk-form-label" for="skills">What are your top skills? <i class="uk-icon-check uk-text-success uk-hidden" id="skills-check"></i></label>
		<div class="uk-form-controls  uk-width-1-1">
		 <input id="ndProfileSkills" type="text" class="nd-profile-cocheck nd-profile-autosave uk-form-small uk-width-1-1" name="skills" value="{{old('skills',Auth::user()->student->skills_string)}}" />
		 </div>
		</div>
		<div class="uk-form-row  uk-width-1-1"> 
			@if(Auth::user()->student->cv_path != null)
			<input type="hidden" name="cv-exists" class="nd-profile-cocheck" value="1" >
			<p>CV last updated {{ Auth::user()->student->cv_uploaded_at_human }} <a href="{{Auth::user()->student->cv_path}}" class="uk-button uk-button-mini" target="_new">Open <i class="uk-icon-external-link"></i></a></p>
			@else
			<input type="hidden" name="cv-exists" class="nd-profile-cocheck" value="" >
			@endif
			<div id="cv-upload-drop" class="uk-placeholder ">
	    
			<a class="uk-form-file uk-button uk-button-primary uk-width-1-1" id="nd-cv-upload-button"><span id="nd-cv-upload-status">Upload PDF CV or Drag Here <i class="uk-icon-check uk-text-success uk-hidden" id="cv-exists-check"></i></span><input id="cv-upload-select" type="file"></a>
        </div>
	</div>
		<div class="uk-form-row uk-width-1-1">
			<input id="profileFormSave" type="submit"/>
			<span class="uk-text-small" id="profileFormStatus">&nbsp;</span>
			  <a href="{{Auth::user()->profile_url}}" class="uk-button uk-button-primary">Preview Profile</a>
		</div>


		</form>