@extends('layouts.app')

@section('content')
    <div class="build_wrapper">
        @for ($index = 0; $index < 21; $index++)
            @php
            $build = $map_field->builds->where('index', $index)->first();
            @endphp
            <div>
                @if ($build !== null)
                    <a href="{{route('city.view', $index+1)}}" class="build__img">
                        @if ($build->build_level->build->image !== null)
                            <img src="{{asset('images/'.$build->build_level->build->image->url)}}" alt="">
                        @endif
                        <span class="build">{{$build->build_level->level}}</span>

                    </a>
                @else
                    <img src="{{asset('images/empty_field.gif')}}" alt="">
                @endif

            </div>
        @endfor
    </div>
@endsection