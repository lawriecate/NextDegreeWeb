@extends('onecol')
@section('title', 'Dashboard')

@section('container')
	<h1>Hello {{Auth::user()->email}}</h1>
	<ul>
	@foreach(App\Post::all() as $post)
	<li><a href="{{$post->url}}"/>{{$post->title}}</a></li>
	@endforeach
	</ul>
	<p>You are a member of {{Auth::user()->student->institution->name}}</p>
	<p>Content that will go here: news, blog, events</p>
@endsection