@extends('admin.layout')

@section('admin-panel')

<div class="uk-container uk-margin-top">
	<h1>Posts</h1>
	
	<a href="{{action('PostController@create')}}" class="uk-button-primary uk-button uk-button-large">New Post</a>
	<div class="uk-overflow-container">
	    <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Publication</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            	@foreach(App\Post::orderBy('created_at', 'desc')->get() as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->status}}</td>
                    <td><a href="{{action('PostController@edit',$post->slug)}}" class="uk-button-mini uk-button uk-button-primary">Edit</a><a href="{{$post->url}}" class="uk-button-mini uk-button ">Open</a>
                    
	                    <form action="{{action('PostController@destroy',$post->slug)}}" method="POST" class="uk-form uk-display-inline confirmDelete">
	                   	 	<input type="hidden" name="_method" value="DELETE">
	    					<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                    	<button  class="uk-button-mini uk-button uk-button-danger">Delete</button>
	                    </form>
	                   
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
	</div>


</div>
@endsection

