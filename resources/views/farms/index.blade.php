@extends('layouts.app')

@section('content')
    @foreach($map_field->farms as $farm)
        <div>
            <a href="{{route('farms.view', $farm)}}">
                {{trans('farms.'.$farm->farm_level->farm->title)}}
            </a>

        </div>
    @endforeach
@endsection