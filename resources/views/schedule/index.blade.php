@extends('templates.layout')

@section('content')
	<div class="row">
		@foreach($field as $value)
			<div class="col s12 m4">
				<div class="card small">
					<div class="card-image">
						<img src='{{asset("storage/field/$value->customer_id/$value->picture")}}'>
					</div>
					<div class="card-content">
						<span class="card-title grey-text text-darken-4">{{$value->name}}</span>
						<p><a href='{{url("/schedule/$value->id/create")}}'>Edit Jadwal</a></p>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endsection