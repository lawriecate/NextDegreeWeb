@extends('admin.layout')

@section('admin-panel')

<div class="uk-container uk-margin-top">
	<h1>Users</h1>
	   <a href="{{action('UserController@create')}}" class="uk-button-primary uk-button uk-button-large">Register User Manually</a>

	<div class="uk-overflow-container">
	    <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            	@foreach(App\User::orderBy('created_at', 'desc')->get() as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->email}}</td>
                    <td><a href="{{action('UserController@edit',$user->id)}}" class="uk-button-mini uk-button uk-button-primary">Edit</a>
	                   
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
	</div>


</div>
@endsection

