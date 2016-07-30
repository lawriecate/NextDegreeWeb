@extends('admin.layout')

@section('admin-panel')

<div class="uk-container uk-margin-top">
	<h1>Files</h1>
	<div class="uk-form-file">
		{{--<div id="upload-drop" class="uk-placeholder uk-placeholder-large">
		    <a class="uk-form-file">Select a file<input id="upload-select" type="file"></a>
		</div>
	--}}
		
	    <button class="uk-button uk-button-primary uk-button-large">Upload File</button>
	    <input type="file"  id="upload-select" multiple="multiple">
	</div>
	<div id="progressbar" class="uk-progress uk-progress-striped uk-active uk-hidden">
		    <div class="uk-progress-bar" style="width: 0%;">...</div>
		</div>
	

	<div class="uk-overflow-container">
	    <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Filename</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            	@foreach(App\File::orderBy('created_at', 'desc')->get() as $file)
                <tr>
                    <td>{{$file->id}}</td>
                    <td>{{$file->original_name}}</td>
                    <td><a href="{{$file->url}}" class="uk-button-mini uk-button uk-button-primary">Open</a>
	                    <form action="{{action('FileController@destroy',$file->id)}}" method="POST" class="uk-form uk-display-inline confirmDelete">
	                   	 	<input type="hidden" name="_method" value="DELETE">
	    					<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                    	<button  class="uk-button-mini uk-button uk-button-danger">Delete</button>
	                    </form>
	                    @if($file->image != null)
	                    <a href="{{$file->url}}" class="uk-button-mini uk-button">Image</a>
	                    @endif
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
	</div>


</div>
@endsection

