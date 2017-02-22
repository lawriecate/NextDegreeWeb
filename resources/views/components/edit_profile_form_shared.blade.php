<div class="uk-grid">
			<div class="uk-width-medium-10-10 uk-form-row uk-text-center">
			<label class="uk-form-label">Profile Photo: <i class="uk-icon-check uk-text-success uk-hidden" id="profile-exists-check"></i></label>
				<input type="hidden" name="profile-exists" class="nd-profile-cocheck" @if(!is_null(Auth::user()->profile_image)) value="1" @endif>

				<div id="profile-upload-drop" style="margin:0 auto;cursor:pointer;background-size: 100% 100%;background-color:#ccc;width:200px;height:200px;@if(!is_null(Auth::user()->profile_image)) background-image: url('{{Auth::user()->profile_image->medium_url }}') @else background-image: url('{{asset('assets/images/placeholder_300.jpg')}}') @endif" >
					<div id="profileProgress" class="uk-text-center uk-hidden" style="width:200px;height:200px;line-height: 100px;display: inline-block;"><span style="cursor:pointer;display: inline-block; vertical-align: middle;">*</span></div>
					<a style="width:200px;height:200px;" class="uk-form-file"><input id="profile-upload-select" type="file" style="cursor:pointer;"></a>
				</div>
				<span class="uk-text-small">Click or Drag Image, < 4 MB</span>
			</div>
			<div class="uk-width-medium-10-10 uk-form-row">
			
				<label class="uk-form-label" for="name">What's your name? <i class="uk-icon-check uk-text-success uk-hidden" id="name-check"></i></label>
					<input class="nd-profile-autosave uk-form-small uk-width-1-1 nd-profile-cocheck" placeholder="Name" name="name" value="{{old('name',Auth::user()->name)}}" />
			</div>
			
		</div>