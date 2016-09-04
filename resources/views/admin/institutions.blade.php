@extends('admin.layout')

@section('admin-panel')

<div class="uk-container uk-margin-top">
	<h1>Institutions</h1>
	
    <a href="{{action('InstitutionController@create')}}" class="uk-button-primary uk-button uk-button-large">New Institution</a>

	<div class="uk-overflow-container">
	    <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            	@foreach(App\Institution::orderBy('created_at', 'desc')->get() as $institution)
                <tr>
                    <td>{{$institution->id}}</td>
                    <td>{{$institution->name}}</td>
                    <td><a href="{{action('InstitutionController@edit',$institution->id)}}" class="uk-button-mini uk-button uk-button-primary">Edit</a>
	                   
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
	</div>


</div>
@endsection

