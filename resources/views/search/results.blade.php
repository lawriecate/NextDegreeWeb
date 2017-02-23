@extends('onecol_100')
@section('title', 'Search Results')
@section('description', 'Search results from Next Degree')

@section('container')
<div class="uk-container uk-container-center uk-margin-bottom uk-margin-top">
<h1>Search Results</h1>
<form method="get" class="uk-form" >
<input name="q" class="uk-form-large uk-width-1-1" placeholder="Search for people, skills, companies" @if(isset($query)) value="{{$query}}" @endif />
</form>
</div>
<div class="uk-container uk-container-center uk-margin-large-bottom ">
@if($query=="")
<h3>Enter a search query</h3>
@elseif(empty($results))
<h3>No matches found</h3>
@else
	
	<div class="uk-grid">
	    <div class="uk-width-medium-1-2">
	       
	    @foreach($results as $result)
		
			<div class="uk-panel uk-panel-divider">
				<a href="{{$result['url']}}">
				 <img class="uk-align-left uk-margin-right" width="150" height="150" src="{{$result['image']}}" alt="Image for {{$result['name']}}">
				 </a>
                <h3 class="uk-panel-title"><a href="{{$result['url']}}">{{$result['name']}}</a></h3>
                	@if($result['type']	=='skill')
                    		{{$result['people_count']}} people have this skill listed<br/>
                    		@foreach($result['people_names'] as $name) {{$name}}, @endforeach
                    @elseif($result['type']=='person')
                    	@if(isset($result['person']->student))
                    	 	Studies at {{$result['person']->student->institution->name}}
                    	@endif
                    @endif
            </div>
			
				@endforeach

			

		</div>
	</div>
@endif
</div>

@endsection