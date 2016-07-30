@extends('admin.layout')

@section('admin-panel')

<div class="uk-container uk-margin-top">
	
	<form class="uk-form" action="{{$submit_to}}" method="POST"  enctype="multipart/form-data">
	{{csrf_field()}}
        <div class="uk-form-row">
<input type="text" placeholder="Title" maxlength="255" class="{{ $errors->has('title') ? ' uk-form-danger' : '' }} titleToSlug uk-form-large uk-width-1-1" name="title" value="{{old('title',$post->title)}}">
        </div>
        @if ($errors->has('title'))
            <div class="uk-alert uk-alert-danger">{{ $errors->first('title') }}</div>
        @endif
        @if(isset($method)){{ method_field($method) }}@endif

        <div class="uk-grid">
        <div class=" uk-width-1-2">
        <div class="uk-form-row">
        	{{url('') }}/<input class="checkSlug {{ $errors->has('slug') ? ' uk-form-danger' : '' }}" maxlength="255" type="text" placeholder="URL" class="uk-form-small" name="slug" value="{{old('slug',$post->slug)}}">
            @if ($errors->has('slug'))
            <div class="uk-alert uk-alert-danger">{{ $errors->first('slug') }}</div>
        @endif
        </div>
        @if ($errors->has('publish_date'))
            <div class="uk-alert uk-alert-danger">{{ $errors->first('publish_date') }}</div>
        @endif
        @if ($errors->has('publish_time'))
            <div class="uk-alert uk-alert-danger">{{ $errors->first('publish_time') }}</div>
        @endif
         	<select name="status" id="publicationStatus">
	            <option value="draft" @if(old('status')=='draft' || ($post->publish_at==null && old('status') == ''))selected="selected"@endif >Draft</option>
	            <option value="publish_now">Publish Now</option>
	            <option value="publish" @if(old('status')=='publish' || ($post->publish_at!=null && old('status') == ''))selected="selected"@endif>Publish After</option>
	        </select> 
         	<input name="publish_date" class="{{ $errors->has('publish_date') ? ' uk-form-danger' : '' }}" type="text" placeholder="Publish Date" data-uk-datepicker="{format:'DD.MM.YYYY'}" value="{{old('publish_date',($post->publish_at != null) ? (date('d.m.Y',strtotime($post->publish_at))) : ''  )}}">
   			 <input name="publish_time" class="{{ $errors->has('publish_time') ? ' uk-form-danger' : '' }}" type="text" placeholder="Time" data-uk-timepicker="{format:'12h'}" value="{{old('publish_time',($post->publish_at != null) ? (date('h:i A',strtotime($post->publish_at))) : '')}}">

        </div>
        <div class="uk-width-1-2">
            
		    <textarea placeholder="Description" class="uk-width-1-1 {{ $errors->has('description') ? ' uk-form-danger' : '' }}" name="description"  >{{old('description',$post->description)}}</textarea>
            @if ($errors->has('description'))
                <div class="uk-alert uk-alert-danger">{{ $errors->first('description') }}</div>
            @endif
            @include('components.imageselect', ['field'=>'display_image','image' => $post->image])
        </div>
        </div>

        <div class="uk-form-row">
            @if ($errors->has('html'))
                <div class="uk-alert uk-alert-danger">{{ $errors->first('html') }}</div>
            @endif
		    <textarea rows="20" placeholder="HTML" class="uk-width-1-1 " name="html">{{old('html',$post->html)}}</textarea>
		    <p class="uk-form-help-block">i</p>
		</div>
       
       <div class="uk-form-row">
       		<button class="uk-button-primary uk-button uk-button-large" type="submit">Save</button>
       </div>
    </form>

</div>
@endsection

