 <div class="">


<nav class="uk-navbar">
<div class="uk-container uk-container-center">
    <a class="uk-navbar-brand" href="{{url('')}}"><img style="padding:8px" class="uk-responsive-height" src="{{asset('assets/images/Logo_400x97_beta.png')}}"/></a>
  {{--  <ul class="uk-navbar-nav uk-hidden-small">
        <li class="uk-active">
            <a href="{{action('HomeController@index')}}"><i class="uk-icon-newspaper-o uk-icon-justify"></i> News</a>
        </li>
        <li>
            <a href="{{action('HomeController@index')}}"><i class="uk-icon-user uk-icon-justify"></i> Profile</a>
        </li> 
        <li>
            <a href="{{action('HomeController@index')}}"><i class="uk-icon-envelope uk-icon-justify"></i> Messages</a>
        </li> 
       
    </ul>--}}
	 <div class="uk-navbar-flip">
	    <ul class="uk-navbar-nav">
	    @if(!Auth::guest())
	       <li class="uk-parent" data-uk-dropdown="" aria-haspopup="true" aria-expanded="false">
                <a href="#">@if(!Auth::user()->verified)<i class="uk-icon-asterisk uk-text-danger"></i> @endif {{Auth::user()->email}} <i class="uk-icon-caret-down"></i></a>

                <div class="uk-dropdown uk-dropdown-navbar uk-dropdown-bottom" style="top: 40px; left: 0px;">
                    <ul class="uk-nav uk-nav-navbar">
                        @if(!Auth::user()->verified)<li ><a href="{{action('VerificationController@status')}}" class="uk-text-danger"><i class="uk-icon-exclamation-triangle "></i> Verify Account</a></li>@endif
                        <li><a href="{{action('SettingsController@accountForm')}}"><i class="uk-icon-justify uk-icon-wrench"></i> Settings</a></li>
                        <li><a href="{{ url('/logout') }}"><i class="uk-icon-justify uk-icon-sign-out"></i> Sign Out </a></li>
                        {{--<li class="uk-nav-header">Header</li>
                        <li><a href="#">Item</a></li>
                        <li><a href="#">Another item</a></li>
                        <li class="uk-nav-divider"></li>--}}
                        @if(Auth::user()->admin)
                        <li><a href="{{action('AdminController@index')}}">Admin Panel</a></li>
                        @endif
                    </ul>
                </div>

            </li>
            @if(!is_null(Auth::user()->student) && !is_null(Auth::user()->student))
            <li class="uk-parent" data-uk-dropdown="" aria-haspopup="true" aria-expanded="false">
                <a href="#">Switch Account <i class="uk-icon-caret-down"></i></a>

                <div class="uk-dropdown uk-dropdown-navbar uk-dropdown-bottom" style="top: 40px; left: 0px;">
                    <ul class="uk-nav uk-nav-navbar">
                        
                        <li><a href="{{action('StudentHomeController@index')}}">Student</a></li>
                        <li><a href="{{action('BusinessHomeController@index')}}">Business</a></li>
                    </ul>
                </div>

            </li>
            @endif
	    @else 
 			<li><a href="{{url('signin')}}">Sign In <i class="uk-icon-arrow-right"></i></a></li>
	    @endif
		 </ul>
	</div>
</div>
</nav>

</div>