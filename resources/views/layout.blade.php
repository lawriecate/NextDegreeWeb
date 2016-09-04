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
    <meta name="csrf_token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('assets/css/all.css')}}">

  <link rel="icon" type="image/png" href="{{asset('images/favicon_256.png')}}">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon-precomposed" href="{{asset('images/favicon_256.png')}}">

</head>
<body>

 @yield('content') 

<script src="{{asset('assets/js/all.js')}}"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-83446319-1', 'auto');
  @if(!Auth::guest()) ga('set', 'userId', '{{md5(Auth::user()->id.Auth::user()->created_at)}}');@endif
  ga('send', 'pageview');


</script>
</body>
</html>
