<div class="panel">
    <div class="item_panel">
        <span>{{trans('builds.building')}}:</span>
        <div class="item">
            @if ($build_process === null)
                {{trans('builds.builders_are_free')}}
            @else
                <div>
                    {{trans($type.'s.'.$build_level->$type->title)}}
                    {{$build_level->level + 1}} {{trans('builds.level_short')}}.
                </div>
                <div>
                    <img src="{{asset('images/time.gif')}}" alt=""> :
                    {{\Carbon\Carbon::createFromTimestamp($seconds_left)->format('H:i:s')}}
                </div>
            @endif
        </div>
    </div>
</div>