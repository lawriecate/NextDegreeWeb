@if ($errors->has('html'))
    <div class="uk-alert uk-alert-danger">{{ $errors->first('html') }}</div>
@endif
{{--<textarea rows="20" placeholder="HTML" class="uk-width-1-1 " name="html">{{old('html',$post->html)}}</textarea>--}}

<div class="nd-editor">
<input type="hidden" name="nd-editor-slug" value="{{$post->slug}}">
<div class="nd-editor-area">
<ul id="edc" class="nd-editor-components">

</ul>
</div>
<a href="#" class="uk-button-small uk-button nd-editor-add-text">+ Text</a>
<a href="#" class="uk-button-small uk-button nd-editor-add-html">+ HTML</a>
<a href="#" class="uk-button-small uk-button nd-editor-add-image">+ Image</a>
<a href="#" class="uk-button-small uk-button nd-editor-add-video">+ Video</a>
</div>