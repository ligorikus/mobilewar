@extends('layouts.app')

@section('content')
    <div>
        {{trans('farms.'.$farm->farm_level->farm->title)}}. {{trans('builds.level')}} {{$farm->farm_level->level}}
    </div>
    <hr>
    <div>
        <h3>{{trans('builds.upgrade_build')}}</h3>
        <h4>{{trans('builds.build_level')}} {{$next_level_farm->level}}</h4>
        <div>{{trans('builds.build_cost')}}</div>
        @foreach($game_resources as $resource)
            <div>
                {{trans('resources.'.$resource->title)}}:
                {{$next_level_farm->resources->where('game_resource_id', $resource->id)->first()->value}}
            </div>
        @endforeach
    </div>
@endsection