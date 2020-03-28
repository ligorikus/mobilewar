@extends('layouts.app')

@section('content')
    <div class="panel">
        <div class="item_panel">
            {{trans('builds.'.$build->build_level->build->title)}}. {{trans('builds.level')}} {{$build->build_level->level}}
        </div>
    </div>
    <div class="panel">
        <div class="item_panel">
            @if ($next_level_build !== null)
                <span>{{trans('builds.upgrade_build')}}</span>
                <div class="item">
                    <span>{{trans('builds.build_level')}} {{$next_level_build->level}}</span>
                    @include('city.build')
                </div>
            @else
                {{trans('builds.you_are_have_max_level_build')}}
            @endif
        </div>
    </div>
@endsection