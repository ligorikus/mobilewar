@extends('layouts.app')

@section('content')
<div class="map">
	@foreach($map as $row)
		<div class="map__row">
		@foreach($row as $col)
			<div class="map__col">
				@if ($col === 1)
					<a href="{{ route('info') }}"><img src="/images/clay.gif" alt="clay" /></a>
				@elseif ($col === 2)
					<a href="{{ route('info') }}"><img src="/images/wood.gif" alt="wood" /></a>
				@elseif ($col === 3)
					<a href="{{ route('info') }}"><img src="/images/iron.gif" alt="iron" /></a>
				@elseif ($col === 'new_village')
					<a href="{{ route('info') }}"><img src="/images/new_village.gif" alt="corn" /></a>
				@else
					<a href="{{ route('info') }}"><img src="/images/corn.gif" alt="corn" /></a>
				@endif
			</div>
		@endforeach
		</div>
	@endforeach
</div>
@endsection
