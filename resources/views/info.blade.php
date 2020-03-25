@extends('layouts.app')

@section('content')
@if($mapField->type === 'new_village')
<div class="panel">
	Посление
	<div class="item_panel">
		Владелец:{{ $village_owner }}
		Нация:{{ $village_owner_nat }}
		Популяция:{{ $population }}
	</div>
</div>
@endif
<div class="panel">
	Ресурсы клетки
	<div class="item_panel">
		@foreach($game_resources as $resource)
		<img src="{{asset('images/'.$resource->title.'_resource.gif')}}" alt=""> :
		{{$resources->where('game_resource_id', $resource->id)->first()->value}}
		@endforeach
	</div>
</div>
@endsection