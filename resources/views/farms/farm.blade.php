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
                @php
                    $not_enough_resources = false;
                @endphp
                @foreach($game_resources as $resource)
                    @php
                        if ((int)$next_level_farm
                            ->resources
                            ->where('game_resource_id', $resource->id)
                            ->first()
                            ->value > (int)$resources->where('game_resource_id', $resource->id)->first()->value) {
                            $not_enough_resources = true;
                        }
                    @endphp
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
                    @if ($not_enough_resources)
                        <p class="red bold">{{trans('builds.not_enough_resources')}}</p>
                    @elseif ($build_processes->count() === 0)
                        <form action="{{route('build.build_farm', ['build' => $farm])}}" method="post">
                            {{csrf_field()}}
                            <button class="btn btn-default">{{trans('builds.build_action')}}</button>
                        </form>
                    @elseif ($build_processes->count() < 3)
                        <form action="{{route('build.build_farm', ['build' => $farm])}}" method="post">
                            {{csrf_field()}}
                            <button class="btn btn-default">{{trans('builds.add_to_queue')}}</button>
                        </form>
                    @else
                        <p class="red bold">{{trans('builds.builders_are_busy')}}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection