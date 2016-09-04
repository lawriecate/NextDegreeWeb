@extends('layout')

@section('content')

@include('components.navbar')

<div class="uk-width-1-1">
  <div class="super-container">
    <div class="uk-grid " data-uk-grid-margin>
        <div class="uk-width-medium-1-1  ">
          @yield('container')
        </div> 
    </div>
  </div>
</div>


@include('components.footer')


@endsection