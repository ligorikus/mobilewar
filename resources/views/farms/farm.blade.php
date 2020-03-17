@extends('layouts.app')

@section('content')
    <div class="panel">
        <div class="item_panel">
            {{trans('farms.'.$farm->farm_level->farm->title)}}. {{trans('builds.level')}} {{$farm->farm_level->level}}
        </div>
    </div>
    <div class="panel">
        <div class="item_panel">
            <span>{{trans('builds.upgrade_build')}}</span>
            <div class="item">
                <span>{{trans('builds.build_level')}} {{$next_level_farm->level}}</span>
                <div>{{trans('builds.build_cost')}}</div>
                @foreach($game_resources as $resource)
                    <div>
                        <img src="{{asset('images/'.$resource->title.'_resource.gif')}}" alt=""> :
                        {{$next_level_farm->resources->where('game_resource_id', $resource->id)->first()->value}}
                    </div>
                @endforeach
                <div>
                    <img src="{{asset('images/population.gif')}}" alt=""> :
                    {{$next_level_farm->population}}
                </div>
                <div>
                    {{trans('builds.build_time')}}:
                    {{\Carbon\Carbon::createFromTimestamp($next_level_farm->time->time)->format('H:i:s')}}
                </div>
                <div>
                    <form action="{{route('build.build_farm', ['farm' => $farm])}}" method="post">
                        {{csrf_field()}}
                        <button class="btn btn-default">{{trans('builds.build_action')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection