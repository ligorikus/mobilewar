@extends('layouts.app')

@section('content')
    <div class="build_wrapper">
        @foreach($map_field->farms as $farm)
            <div>
                <a href="{{route('farms.view', $farm)}}">
                    <img src="{{asset('images/'.$farm->farm_level->farm->title.'.gif')}}" alt="">
                </a>
            </div>
        @endforeach
    </div>
@endsection