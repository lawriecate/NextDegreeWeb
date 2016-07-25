@extends('admin.layout')

@section('admin-panel')

<div class="uk-container uk-margin-top">
	<h1>Files</h1>
	<div class="uk-form-file">
		<div id="upload-drop" class="uk-placeholder uk-placeholder-large">
		    <a class="uk-form-file">Select a file<input id="upload-select" type="file"></a>
		</div>

		<div id="progressbar" class="uk-progress uk-hidden">
		    <div class="uk-progress-bar" style="width: 0%;">...</div>
		</div>
	    <!--<button class="uk-button">Upload File</button>
	    <input type="file">-->
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
                <tr>
                    <td>Table Data</td>
                    <td>Table Data</td>
                    <td>Table Data</td>
                </tr>
                <tr>
                    <td>Table Data</td>
                    <td>Table Data</td>
                    <td>Table Data</td>
                </tr>
                <tr>
                    <td>Table Data</td>
                    <td>Table Data</td>
                    <td>Table Data</td>
                </tr>
            </tbody>
        </table>
	</div>


</div>
@endsection

