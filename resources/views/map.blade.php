@extends('layouts.app')

@section('content')
<div class="map">
	@foreach($map as $row)
		<div class="map__row">
		@foreach($row as $col)
			<div class="map__col">
				@php
					$field_type = $game_resources->where('id', $col)->first()->title;
				@endphp
				@if ($field_type === 'clay')
					<img src="/images/clay.gif" alt="clay" />
				@elseif ($field_type === 'wood')
					<img src="/images/wood.gif" alt="wood" />
				@elseif ($field_type === 'iron')
					<img src="/images/iron.gif" alt="iron" />
				@else
					<img src="/images/corn.gif" alt="corn" />
				@endif
			</div>
		@endforeach
		</div>
	@endforeach
</div>
@endsection
