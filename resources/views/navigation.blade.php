<nav>
    <div>
        <img src="{{asset('images/main_page.gif')}}" alt="">
        <a href="{{route('home')}}">{{trans('navigation.main')}}</a>
    </div>
    <div>
        <img src="{{asset('images/farm.gif')}}" alt="">
        <a href="{{route('farms.index')}}">{{trans('navigation.farms')}}</a>
    </div>
    <div>
        <img src="{{asset('images/town.gif')}}" alt="">
        <a href="{{route('city.index')}}">{{trans('navigation.city')}}</a>
    </div>
    <div>
        <img src="{{asset('images/map.gif')}}" alt="">
        <a href="{{route('maps.index')}}">{{trans('navigation.map')}}</a>
    </div>
    <div>
        <img src="{{asset('images/logout.gif')}}" alt="">
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{trans('auth.logout')}}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
</nav>
