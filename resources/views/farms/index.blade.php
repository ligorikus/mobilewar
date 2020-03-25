@extends('layouts.app')

@section('content')
    <div class="build_wrapper">
        @foreach($map_field->farms as $farm)
            <div>
                <a href="{{route('farms.view', $farm->index+1)}}" class="build__img">
                    <img src="{{asset('images/'.$farm->farm_level->farm->title.'.gif')}}" alt="">
                    <span class="farm">{{$farm->farm_level->level}}</span>
                </a>
            </div>
        @endforeach
    </div>
@endsection