@extends('admin.layout')

@section('admin-panel')

<div class="uk-container uk-margin-top">
	<h1>Jobs</h1>
	
	<a href="#" class="uk-button-primary uk-button uk-button-large" data-uk-modal="{target:'#nd-manage-job-types-modal'}">Manage Types</a>

	* the rest is coming soon *
</div>

<div id="nd-manage-job-types-modal" class="uk-modal">
    <div class="uk-modal-dialog">
        <button type="button" class="uk-modal-close uk-close"></button>
        <div class="uk-modal-header">
            <h2>Manage Job Types</h2>

        </div>

        <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            	@foreach(App\JobType::orderBy('created_at', 'desc')->get() as $job_type)
                <tr>
                    <td>{{$job_type->id}}</td>
                    <td>{{$job_type->title}}</td>  
                    <td></td>
                </tr>
                @endforeach
                <tr>
                    <td>#</td>
                    <td><form class="uk-form" method="POST" action="{{action('JobTypeController@store')}}">{{csrf_field()}}<input type="text" class="uk-form-controls" name="title" /><button class="uk-button-primary uk-button"><i class="uk-icon-plus"></i></button></form></td>  
                    <td></td>
                </tr>
            </tbody>
        </table>
        
        
        <div class="uk-modal-footer uk-text-right">
            <button type="button" class="uk-button uk-button-primary uk-modal-close">Done</button>
            {{--<button type="button" class="uk-button uk-button-primary" id="nd-select-institution-modal-add-button">Add</button>--}}
        </div>
    </div>
</div>

@endsection

