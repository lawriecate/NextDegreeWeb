@extends('admin.layout')

@section('admin-panel')

<div class="uk-container uk-margin-top">
<h1>Dashboard</h1>
<div class="uk-grid">
<div class="">
<iframe src="https://app.datadoghq.com/graph/embed?token=0e4620337d13549ebc44715dc7c6c7ce8cc0207ff937eca52874b84b653e0e71&height=300&width=600&legend=true" width="600" height="300" frameborder="0"></iframe>
</div>
<div class="">

</div>
<div class="">
</div>
</div>

<div class="uk-grid">
    <div class="uk-width-1-3"><span class="nd-dash-stat">{{App\User::all()->count()}}</span> users registered</div>
    <div class="uk-width-1-3"><span class="nd-dash-stat">{{App\Post::all()->count()}}</span> posts written</div>
   	<div class="uk-width-1-3">launched at <span class="nd-dash-stat">{{App\Institution::all()->count()}}</span> universities</div>
</div>

<div>
<h3>Data over last 30 days</h3>
 <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th>Day</th>
                    <th>No Users</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($user_data as $datapoint)
                <tr>
                    <td>{{$datapoint['day']}}</td>
                    <td>{{$datapoint['no_users']}}</td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
</div>

</div>

@endsection

