<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="{!! asset('/css/app.css') !!}">
	<title>Mobile War</title>
</head>
<body>
	<main>
		<header></header>
		<nav>
			<a href="">Фермы</a>
			<a href="{{route('maps.index')}}">Карта</a>
		</nav>
		<article>
			@foreach($resources as $resource)
				<div>
					{{trans('resources.'.$resource->game_resource->title)}}: {{$resource->value}}
					+
					{{$map_field->productions->where('game_resource_id', $resource->game_resource_id)->first()->production}}
				</div>
			@endforeach
		</article>
	</main>
</body>
</html>