<div class="uk-grid">
			<div class="uk-width-medium-3-10 uk-form-row">
			<label class="uk-form-label">Profile Photo: <i class="uk-icon-check uk-text-success uk-hidden" id="profile-exists-check"></i></label>
				<input type="hidden" name="profile-exists" class="nd-profile-cocheck" @if(!is_null(Auth::user()->profile_image)) value="1" @endif>

				<div id="profile-upload-drop" style="background-size: 100% 100%;background-color:#ccc;width:100px;height:100px;@if(!is_null(Auth::user()->profile_image)) background-image: url('{{Auth::user()->profile_image->medium_url }}') @else background-image: url('{{asset('assets/images/placeholder_300.jpg')}}') @endif" >
					<div id="profileProgress" class="uk-text-center uk-hidden" style="width:100px;height:100px;line-height: 100px;display: inline-block;"><span style="display: inline-block; vertical-align: middle;">*</span></div>
					<a style="width:100px;height:100px;" class="uk-form-file"><input id="profile-upload-select" type="file"></a>
				</div>
				<span class="uk-text-small">Click or Drag Image, < 4 MB</span>
			</div>
			<div class="uk-width-medium-7-10">
			<div class="uk-form-row">
				<label class="uk-form-label" for="name">What's your name? <i class="uk-icon-check uk-text-success uk-hidden" id="name-check"></i></label>
					<input class="nd-profile-autosave uk-form-small uk-width-1-1 nd-profile-cocheck" placeholder="Name" name="name" value="{{old('name',Auth::user()->name)}}" />
			</div>
			
		</div>