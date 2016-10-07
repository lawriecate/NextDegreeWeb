@extends('admin.layout')

@section('admin-panel')

<div class="uk-container uk-margin-top">
	<h1>Support</h1>
	
	<div class="uk-overflow-container">
	    <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>From</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            	@foreach(App\SupportMessage::orderBy('created_at', 'desc')->get() as $msg)
                <tr>
                    <td>{{$msg->id}}</td>
                    <td>{{$msg->email_from}}</td>
                    <td>{{$msg->status}}</td>
                    <td>
	                   <a href="{{action('SupportController@edit',$msg->id)}}" class="uk-button-mini uk-button uk-button-primary">Open</a>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
	</div>


</div>
@endsection

