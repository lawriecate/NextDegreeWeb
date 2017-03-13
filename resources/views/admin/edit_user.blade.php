@extends('admin.layout')

@section('admin-panel')

<div class="uk-container uk-margin-top">
	<h1>Edit User</h1>
	<p>Registered on {{ $user->created_at}}</p>
	<p>Verification Status: @if($user->verified)<i class="uk-icon uk-icon-check"></i> Verified @else<i class="uk-icon uk-icon-exclamation-triangle"></i> Not Verified @endif</p>
  <p>Student Profile:@if(is_null($user->student)) <i class="uk-icon-close"></i> No <a href="#" id="ndAdminUserAddStudentProfile" class="uk-button uk-button-mini">Add Profile</a>  @else <i class="uk-icon-check"></i> belongs to <span id="nd-user-institution-name">{{$user->student->institution->name}}</span> <a href="#" id="ndAdminUserAddStudentProfile" class="uk-button uk-button-mini">Switch Institution</a>@endif </p>
  <p>Business Profile: @if(is_null($user->business)) <i class="uk-icon-close"></i> No <a href="#" id="ndAdminUserAddBusinessProfile" class="uk-button uk-button-mini">Add Profile</a>  @else <i class="uk-icon-check"></i> Yes {{ $user->business->name or '' }} @endif </p>
<p>Name: {{ $user->name}}</p>
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
			<input type="text" placeholder="Replace Password" name="new_password" value="{{old('new_password')}}">
        </div>

        <div class="uk-form-row">
			Administrator: <input type="checkbox" name="admin" value="true" @if(old('admin')=="true" || ($user->admin&&old('admin')==null))checked="checked"@endif>
        </div>
       <div class="uk-form-row">
       		<button class="uk-button-primary uk-button uk-button-large" type="submit">Save</button>
       </div>
       <input type="hidden" id="nd-user-id" value="{{$user->id}}">
    </form>

</div>

<div id="nd-select-institution-modal" class="uk-modal">
    <div class="uk-modal-dialog">
        <button type="button" class="uk-modal-close uk-close"></button>
        <div class="uk-modal-header">
            <h2>Add Student Profile</h2>
        </div>
        <p>Select Institution:</p>
        {{--<input type="hidden" name="nd-select-institution-modal-field">
        <div class="uk-autocomplete uk-form" id="nd-select-institution-modal-autocomplete">
            <input type="text" name="nd-select-institution-modal-institution">
            <script type="text/autocomplete">
                <ul class="uk-nav uk-nav-autocomplete uk-autocomplete-results">
                    @{{~items}}
                    <li data-value="@{{ $item.value }}">
                        <a>
                            @{{ $item.title }}
                            
                        </a>
                    </li>
                    @{{/items}}
                </ul>
            </script>
        </div>--}}
        <div class="uk-button uk-form-select uk-width-1-1" data-uk-form-select>
            <span>Select University</span>
            <i class="uk-icon-caret-down"></i>
            <select id="nd-select-institution-modal-field">
              @foreach(App\Institution::all() as $institution)
                <option value="{{$institution->id}}">{{$institution->name}}</option>
              @endforeach
            </select>
        </div>
        
        <div class="uk-modal-footer uk-text-right">
            <button type="button" class="uk-button uk-modal-close">Cancel</button>
            <button type="button" class="uk-button uk-button-primary" id="nd-select-institution-modal-add-button">Add</button>
        </div>
    </div>
</div>


@endsection

