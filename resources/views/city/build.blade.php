@extends('layouts.app')

@section('content')
    <div class="panel">
        <div class="item_panel">
            {{trans('builds.'.$build->build_level->build->title)}}. {{trans('builds.level')}} {{$build->build_level->level}}
        </div>
    </div>
    <div class="panel">
        <div class="item_panel">
            <span>{{trans('builds.upgrade_build')}}</span>
            <div class="item">
                <span>{{trans('builds.build_level')}} {{$next_level_build->level}}</span>
                <div>{{trans('builds.build_cost')}}</div>
                @foreach($game_resources as $resource)
                    <div>
                        <img src="{{asset('images/'.$resource->title.'_resource.gif')}}" alt=""> :
                        {{$next_level_build->resources->where('game_resource_id', $resource->id)->first()->value}}
                    </div>
                @endforeach
                <div>
                    <img src="{{asset('images/population.gif')}}" alt=""> :
                    {{$next_level_build->population}}
                </div>
                <div>
                    <img src="{{asset('images/time.gif')}}" alt=""> :
                    {{\Carbon\Carbon::createFromTimestamp($next_level_build->time->time)->format('H:i:s')}}
                </div>
                <div>
                    <form action="{{route('build.build_construction', ['build' => $build])}}" method="post">
                        {{csrf_field()}}
                        <button class="btn btn-default">{{trans('builds.build_action')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection