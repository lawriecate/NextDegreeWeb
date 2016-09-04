<!DOCTYPE html>
<html lang="en-gb">
<head>

  <meta charset="utf-8">
  <title>
    @hasSection('title')
        @yield('title') - Next Degree
    @else
        Next Degree
    @endif
</title>
@hasSection('description')<meta name="description" content="@yield('description')">@endif
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">

  <link rel="icon" type="image/png" href="{{asset('images/favicon_256.png')}}">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon-precomposed" href="{{asset('images/favicon_256.png')}}">
  <meta name="csrf_token" content="{{ csrf_token() }}">
</head>
<body>

<div class="uk-grid ">
    <div class="uk-width-2-10 adminSidebar nd-bg-dark-geo uk-contrast ">
    <img style="padding:8px" class="uk-responsive-height" src="{{asset('assets/images/Logo_400x97.png')}}"/>
    <ul class="uk-nav uk-nav-side">
        <li @if(Route::getCurrentRoute()->getActionName() == "App\Http\Controllers\AdminController@index")class="uk-active"@endif><a href="{{action('AdminController@index')}}">Dashboard</a></li>
        <li @if(Route::getCurrentRoute()->getActionName() == "App\Http\Controllers\PostController@index")class="uk-active"@endif><a href="{{action('PostController@index')}}">Posts</a></li>
        <li @if(Route::getCurrentRoute()->getActionName() == "App\Http\Controllers\FileController@index")class="uk-active"@endif><a href="{{action('FileController@index')}}">Files</a></li>
        <li @if(Route::getCurrentRoute()->getActionName() == "App\Http\Controllers\UserController@index")class="uk-active"@endif><a href="{{action('UserController@index')}}">Users</a></li>
        <li @if(Route::getCurrentRoute()->getActionName() == "App\Http\Controllers\InstitutionController@index")class="uk-active"@endif><a href="{{action('InstitutionController@index')}}">Institutions</a></li>
        <li @if(Route::getCurrentRoute()->getActionName() == "App\Http\Controllers\JobController@index")class="uk-active"@endif><a href="{{action('JobController@index')}}">Jobs</a></li>
         <li><a href="{{url('')}}" target="_new">Go To Site</a></li>
    </ul>
</div>
    <div class="uk-width-8-10 uk-padding-remove">@yield('admin-panel')</div>

</div>
<script src="{{asset('assets/js/all.js')}}"></script>
<script src="{{asset('assets/js/admin.js')}}"></script>

</body>
</html>
