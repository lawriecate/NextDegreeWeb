@extends('admin.layout')

@section('admin-panel')

<div class="uk-container uk-margin-top">
<h1>Dashboard</h1>
<div>
G1
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

