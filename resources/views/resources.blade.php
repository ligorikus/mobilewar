@foreach($resources as $resource)
    <div>
        {{trans('resources.'.$resource->title)}}
        :
        {{$map_field->resources->where('game_resource_id', $resource->id)->first()->value}}
        +
        {{$map_field->productions->where('game_resource_id', $resource->id)->first()->production}}
    </div>
@endforeach
<div>
    {{trans('builds.warehouse')}}: {{$warehouse->value}}
    {{trans('builds.barn')}}: {{$barn->value}}
</div>
<hr>