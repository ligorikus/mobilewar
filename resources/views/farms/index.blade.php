@extends('layouts.app')

@section('content')
    @foreach($map_field->farms as $farm)
        <div>
            <a href="{{route('farms.view', $farm)}}">
                {{trans('farms.'.$farm->farm_level->farm->title)}}.
                {{trans('builds.level')}} {{$farm->farm_level->level}}
            </a>

        </div>
    @endforeach
@endsection