@extends('layouts.app')

@section('content')
<div class="map">
	@foreach($map as $row)
		<div class="map__row">
		@foreach($row as $col)
			<div class="map__col">
				@if ($col === 1)
					<img src="/images/clay.gif" alt="clay" />
				@elseif ($col === 2)
					<img src="/images/wood.gif" alt="wood" />
				@elseif ($col === 3)
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
