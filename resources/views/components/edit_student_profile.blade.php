<h1>Your Profile:</h1>

		
		<div id="profile_progressbar" class="uk-progress">
            <div class="uk-progress-bar" style="width: 20%;">&nbsp;</div>
        </div>
        <form id="profileCompleteForm" action="{{action('ProfileController@saveProfile')}}" method="POST" class="uk-form-stacked uk-form">
        {{csrf_field()}}
		<div class="uk-grid">
			<div class="uk-width-medium-3-10 uk-form-row">
			<label class="uk-form-label">Profile Photo: <i class="uk-icon-check uk-text-success uk-hidden" id="profile-exists-check"></i></label>
				<input type="hidden" name="profile-exists" @if(!is_null(Auth::user()->profile_image)) value="1" @endif>
				<div id="profile-upload-drop" style="background-size: 100% 100%;background-color:#ccc;width:100px;height:100px;@if(!is_null(Auth::user()->profile_image)) background-image: url('{{Auth::user()->profile_image->medium_url }}') @endif" >
					<div id="profileProgress" class="uk-text-center uk-hidden" style="width:100px;height:100px;line-height: 100px;display: inline-block;"><span style="display: inline-block; vertical-align: middle;">*</span></div>
					<a style="width:100px;height:100px;" class="uk-form-file"><input id="profile-upload-select" type="file"></a>
				</div>
				<span class="uk-text-small">< 4 MB</span>
			</div>
			<div class="uk-width-medium-7-10">
			<div class="uk-form-row">
				<label class="uk-form-label" for="name">What's your name? <i class="uk-icon-check uk-text-success uk-hidden" id="name-check"></i></label>
					<input class="nd-profile-autosave uk-form-small uk-width-1-1" placeholder="Name" name="name" value="{{old('name',Auth::user()->name)}}" />
			</div>
			<div class="uk-form-row">
				<label class="uk-form-label" for="bio">Describe yourself! <i class="uk-icon-check uk-text-success uk-hidden" id="bio-check"></i></label>
				<div class="uk-form-controls">
                    <textarea class="nd-profile-autosave uk-width-1-1 " placeholder="Pitch yourself in 300 characters!" name="bio">{{old('bio',Auth::user()->student->bio)}}</textarea>
                </div>
            </p>
			</div>
		</div>
		
		<div class="uk-form-row uk-width-1-1">
		<label class="uk-form-label" for="degree">What do you study? <i class="uk-icon-check uk-text-success uk-hidden" id="degree-check"></i></label>
		<div class="uk-form-controls  uk-width-1-1">
		 <input type="text" class="nd-profile-autosave uk-form-small uk-width-1-1" name="degree" value="{{old('degree',Auth::user()->student->degree)}}" />
		 </div>
		</div>
		<div class="uk-form-row  uk-width-1-1"> 
			@if(Auth::user()->student->cv_path != null)
			<input type="hidden" name="cv-exists" value="1" >
			<p>CV last updated {{ Auth::user()->student->cv_uploaded_at_human }} <a href="{{Auth::user()->student->cv_path}}" class="uk-button uk-button-mini" target="_new">Open <i class="uk-icon-external-link"></i></a></p>
			@endif
			<div id="cv-upload-drop" class="uk-placeholder ">
	    
			<a class="uk-form-file uk-button uk-button-primary uk-width-1-1" id="nd-cv-upload-button"><span id="nd-cv-upload-status">Upload PDF CV or Drag Here <i class="uk-icon-check uk-text-success uk-hidden" id="cv-exists-check"></i></span><input id="cv-upload-select" type="file"></a>
        </div>
	</div>
	<div class="uk-form-row  uk-width-1-1"> 
		<h1>I want to find:</h1>
		@foreach(App\JobType::orderBy('created_at', 'desc')->get() as $job_type)
		<label><input type="checkbox" class="nd-profile-autosave" name="jobtype[{{$job_type->id}}]" value="1" @if(Auth::user()->job_types()->find($job_type->id)) checked="checked" @endif> {{$job_type->title}}</label><br>
		@endforeach
		<input id="profileFormSave" type="submit"/>
		<span class="uk-text-small" id="profileFormStatus">&nbsp;</span>
	</div>
		</form>