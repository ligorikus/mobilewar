@extends('layouts.app')

@section('content')
    <div class="panel">
        <div class="item_panel">
            <span>{{trans('builds.available')}}:</span>
            <div class="item">
                @foreach($can_build as $build)
                    <div class="available_build__container">
                        <div class="item_new_build">
                            <span><a href="#">{{trans('builds.'.$build->title)}}</a></span>
                            @if ($build->image !== null)
                                <img src="{{asset('images/'.$build->image->url)}}" alt="">
                            @endif
                        </div>
                        <div class="available_build__container-item">
                            @include('city.build', [
                                'next_level_build' => $build->next_level,
                                'build_time' => $build->time,
                                'build_route' => route('build.build_construction', ['index' => $index, 'build' => $build])
                            ])
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection