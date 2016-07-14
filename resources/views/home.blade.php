@extends('onecol')
@section('title', 'Dashboard')

@section('container')
	<h1>Hello {{Auth::user()->email}}</h1>
	<p>You have no new messages</p>
	<p>You are a member of {{Auth::user()->student->institution->name}}</p>
	<p>Content that will go here: news, blog, events</p>
@endsection