@extends('admin.layout')

@section('admin-panel')

<div class="uk-container uk-margin-top">
<h1>Dashboard</h1>
<div class="uk-grid">
<div class="">
<iframe src="https://app.datadoghq.com/graph/embed?token=16416bf5dc3856126ee60912b10be154dc95b589bb3f8495f1c9ec448b78312b&height=200&width=400&legend=true" width="400" height="200" frameborder="0"></iframe>
</div>
<div class="">
<iframe src="https://app.datadoghq.com/graph/embed?token=cb419cb82d1059528bfa737853a825decdaff43654a44667ae6a6017c9b2d423&height=200&width=400&legend=true" width="400" height="200" frameborder="0"></iframe>
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

