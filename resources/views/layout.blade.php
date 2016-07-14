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
  <link rel="stylesheet" href="{{asset('assets/css/all.css')}}">

  <link rel="icon" type="image/png" href="{{asset('images/favicon_256.png')}}">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon-precomposed" href="{{asset('images/favicon_256.png')}}">

</head>
<body>

 @yield('content') 

<script src="{{asset('assets/js/all.js')}}"></script>

</body>
</html>
