@extends('layout')

@section('content')

@include('components.navbar')

<div class="uk-width-1-1">
  <div class="uk-container uk-container-center uk-margin-large-bottom">
    <div class="uk-grid " data-uk-grid-margin>
        <div class="uk-width-medium-1-1 uk-margin-top  ">
          @yield('container')
        </div> 
    </div>
  </div>
</div>


@include('components.footer')


@endsection