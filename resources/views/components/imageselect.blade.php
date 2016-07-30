<div class="imageselect">
@if ($errors->has($field))
    <div class="uk-alert uk-alert-danger">{{ $errors->first($field) }}</div>
@endif
<input type="hidden" name="{{ $field }}" id="imageselect_id" value="@if(isset($image)){{ $image->id }}@else{{ ''}}@endif">
	<div id="imageselect-upload-drop" class="uk-placeholder ">
    
		<a class="uk-form-file uk-button">Upload Image <input id="imageselect-upload-select" type="file"></a> or <a class="uk-button" href="#" id="imageselect_browse_button">Browse Images</a>
        <div id="imageselect_progressbar" class="imageselect_progressbar uk-progress uk-hidden">
            <div class="uk-progress-bar" style="width: 0%;">...</div>
        </div>
        <div class="imageselect_preview uk-float-right">
            <div class="uk-thumbnail uk-thumbnail-mini">
                <img src="@if(isset($image)){{ url($image->thumbnail->path) }}@endif" >
            </div>

        </div>
        <div class="uk-clearfix">&nbsp;</div>
	</div>
	
   

	<div class="uk-modal imageselect_modal">
    <div class="uk-modal-dialog  uk-modal-dialog-large">
        <div class="uk-modal-header">Select Image</div>
        <div class="imageselect_images">
        Loading...
        </div>
        <div class="uk-modal-footer uk-text-right">
        	<button type="button" class="uk-button uk-modal-close">Cancel</button>
            <button type="button" class="uk-button uk-button-primary">Save</button>
        </div>
    </div>
</div>
</div>