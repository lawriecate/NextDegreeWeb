@extends('admin.layout')

@section('admin-panel')


<h1>Dashboard</h1>
<div>
G1
</div>
<div class="uk-grid">
    <div class="uk-width-1-3">{{App\User::all()->count()}} users registered</div>
    <div class="uk-width-1-3">S2</div>
    <div class="uk-width-1-3">S3</div>
</div>

@endsection

