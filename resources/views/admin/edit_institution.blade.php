@extends('admin.layout')

@section('admin-panel')

<div class="uk-container uk-margin-top">
	<h1>Edit Institution</h1>
	
	<form class="uk-form" action="{{$submit_to}}" method="POST"  enctype="multipart/form-data">
	{{csrf_field()}}
        
        @if(isset($method)){{ method_field($method) }}@endif
 @if ($errors->has('name'))
      <div class="uk-alert uk-alert-danger">{{ $errors->first('name') }}</div>
  @endif  
        <div class="uk-form-row">
			<input class="{{ $errors->has('name') ? ' uk-form-danger' : '' }} titleToSlug" type="text" placeholder="Name" name="name" value="{{old('name',$institution->name)}}">
        </div>

        <div class="uk-form-row">
      <input class="{{ $errors->has('slug') ? ' uk-form-danger' : '' }}" type="text" placeholder="URL" name="slug" value="{{old('slug',$institution->slug)}}">
        </div>

        <div class="uk-form-row">
      <input class="{{ $errors->has('domain') ? ' uk-form-danger' : '' }}" type="text" placeholder="Domain" name="domain" value="{{old('domain',$institution->domain)}}">
        </div>

 <div class="uk-form-row">
      Allow Signups: <input type="checkbox" name="enable_registration" value="true" @if(old('enable_registration')=="true" || ($institution->enable_registration&&old('enable_registration')==null))checked="checked"@endif>
        </div>
     
       <div class="uk-form-row">
       		<button class="uk-button-primary uk-button uk-button-large" type="submit">Save</button>
       </div>
    </form>

</div>
@endsection

