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
					{{trans('resources.'.$resource->title)}}: {{$map_field->resources->where('game_resource_id', $resource->id)->first()->value}}
					+
					{{$map_field->productions->where('game_resource_id', $resource->id)->first()->production}}
				</div>
			@endforeach
		</article>
	</main>
</body>
</html>