@extends('onecol_100')
@section('title', $skill->name . ' on Next Degree')
@section('description', 'See people who can do ' . $skill->name . ' on Next Degree')

@section('container')
<div class="uk-container uk-container-center uk-margin-bottom uk-margin-top">
<h1>{{$skill->name}}</h1>
<h2>{{$skill->users()->count() }} people list {{$skill->name}} as their skill</h2>


<div class="uk-container uk-container-center uk-margin-large-bottom ">

	<div class="uk-grid">
	    <div class="uk-width-medium-1-2">
	       
	    @foreach($skill->users as $person)
		
			<div class="uk-panel uk-panel-divider">

				<a href="{{$person->url}}">
				 <img class="uk-align-left uk-margin-right" width="150" height="150" src="{{$person->profile_image_or_placeholder()->medium_url}}" alt="Image for {{$person->name}}">
				 </a>
                <h3 class="uk-panel-title"><a href="{{$person->profile_url}}">{{$person->name}}</a></h3>
                <h4>Studies {{$person->student->degree or ''}} at {{$person->student->institution->name}}</h4>
                	<p>{{$person->student->bio or ""}}</p>
            </div>
			
				@endforeach

			

		</div>
	</div>

</div>

@endsection