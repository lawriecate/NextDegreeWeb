@extends('admin.layout')

@section('admin-panel')

<div class="uk-container uk-margin-top">
	<h1>Register User</h1>

	<form class="uk-form" action="{{$submit_to}}" method="POST"  enctype="multipart/form-data">
	{{csrf_field()}}
        
        @if(isset($method)){{ method_field($method) }}@endif
 @if ($errors->has('email'))
      <div class="uk-alert uk-alert-danger">{{ $errors->first('email') }}</div>
  @endif  
        <div class="uk-form-row">
			<input class="{{ $errors->has('email') ? ' uk-form-danger' : '' }}" type="text" placeholder="Email" name="email" value="{{old('email',$user->email)}}">
        </div>

         <div class="uk-form-row">
      <input class="{{ $errors->has('name') ? ' uk-form-danger' : '' }}" type="text" placeholder="Name" name="name" value="{{old('name',$user->name)}}">
        </div>

        <div class="uk-form-row">
			<input type="text" placeholder="Password" name="password" value="{{old('password')}}">
        </div>

        <div class="uk-form-row">
			Administrator: <input type="checkbox" name="admin" value="true" @if(old('admin')=="true" || ($user->admin&&old('admin')==null))checked="checked"@endif>
        </div>
       <div class="uk-form-row">
       		<button class="uk-button-primary uk-button uk-button-large" type="submit">Save</button>
       </div>
    </form>

</div>
@endsection

