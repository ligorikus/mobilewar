<div>{{trans('builds.build_cost')}}:</div>
@php
    $not_enough_resources = false;
@endphp
@foreach($game_resources as $resource)
    @php
        if ((int)$next_level_build
            ->resources
            ->where('game_resource_id', $resource->id)
            ->first()
            ->value > (int)$resources->where('game_resource_id', $resource->id)->first()->value) {
            $not_enough_resources = true;
        }
    @endphp
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
    {{\Carbon\Carbon::createFromTimestamp($build_time)->format('H:i:s')}}
</div>
<div>
    @if ($not_enough_resources)
        <p class="red bold">{{trans('builds.not_enough_resources')}}</p>
    @elseif ($build_processes->count() === 0)
        <form action="{{$build_route}}" method="post">
            {{csrf_field()}}
            <button class="btn btn-default">{{trans('builds.build_action')}}</button>
        </form>
    @elseif ($build_processes->count() < 1)
        <form action="{{$build_route}}" method="post">
            {{csrf_field()}}
            <button class="btn btn-default">{{trans('builds.add_to_queue')}}</button>
        </form>
    @else
        <p class="red bold">{{trans('builds.builders_are_busy')}}</p>
    @endif
</div>