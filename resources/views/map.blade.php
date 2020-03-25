@extends('layouts.app')

@section('content')
<div class="map">
	@foreach($map as $row)
		<div class="map__row">
		@foreach($row as $map_field)
			<div class="map__col">
				@if ($map_field->type === 1)
					<a href="{{ route('map_info', $map_field) }}"><img src="/images/clay.gif" alt="clay" /></a>
				@elseif ($map_field->type === 2)
					<a href="{{ route('map_info', $map_field) }}"><img src="/images/wood.gif" alt="wood" /></a>
				@elseif ($map_field->type === 3)
					<a href="{{ route('map_info', $map_field) }}"><img src="/images/iron.gif" alt="iron" /></a>
				@elseif ($map_field->type === 'new_village')
					<a href="{{ route('map_info', $map_field) }}"><img src="/images/new_village.gif" alt="corn" /></a>
				@else
					<a href="{{ route('map_info', $map_field) }}"><img src="/images/corn.gif" alt="corn" /></a>
				@endif
			</div>
		@endforeach
		</div>
	@endforeach
</div>
@endsection
