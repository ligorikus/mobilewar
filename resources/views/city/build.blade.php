@extends('layouts.app')

@section('content')
    <div>
        {{trans('builds.'.$build->build_level->build->title)}}. {{trans('builds.level')}} {{$build->build_level->level}}
    </div>
    <hr>
    <div>
        <h3>{{trans('builds.upgrade_build')}}</h3>
        <h4>{{trans('builds.build_level')}} {{$next_level_build->level}}</h4>
        <div>{{trans('builds.build_cost')}}</div>
        @foreach($game_resources as $resource)
            <div>
                {{trans('resources.'.$resource->title)}}:
                {{$next_level_build->resources->where('game_resource_id', $resource->id)->first()->value}}
            </div>
        @endforeach
        <div>
            {{trans('builds.build_time')}}:
            {{\Carbon\Carbon::createFromTimestamp($next_level_build->time->time)->format('H:i:s')}}
        </div>
    </div>
@endsection