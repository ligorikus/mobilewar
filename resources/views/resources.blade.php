@foreach($resources as $resource)
    <div>
        <img src="{{asset('images/'.$resource->title.'_resource.gif')}}" alt="">
        {{$map_field->resources->where('game_resource_id', $resource->id)->first()->value}}
        +
        {{$map_field->productions->where('game_resource_id', $resource->id)->first()->production}}/{{trans('time.hour')}}
    </div>
@endforeach
<div>
    <img src="{{asset('images/warehouse_icon.gif')}}" alt=""> {{$warehouse->value}}
    <img src="{{asset('images/barn_icon.gif')}}" alt=""> {{$barn->value}}
</div>