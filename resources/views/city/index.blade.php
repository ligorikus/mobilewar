@extends('layouts.app')

@section('content')
    @foreach($map_field->builds as $build)
        <div>
            <a href="{{route('city.view', $build)}}">
                {{trans('builds.'.$build->build_level->build->title)}}.
                {{trans('builds.level')}} {{$build->build_level->level}}
            </a>

        </div>
    @endforeach
@endsection