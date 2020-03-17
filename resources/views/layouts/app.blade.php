<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
@auth
    <main id="app">
        <div class="container">
            <header>

                <div class="header__data">
                    @include('header.timer')
                    @include('header.collection_point')
                </div>
                <div>
                    @include('header.user')
                </div>
            </header>
            <div class="line"></div>
            @include('navigation')
            <div class="line"></div>
            @include('resources')
            @include('builders')
            @yield('content')
        </div>
    </main>
@endauth
@guest
    <main id="app">
        <div class="container noauth" >
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <ul class="nav navbar-nav">
                            <!-- Authentication Links -->
                            <li><a href="{{ route('login') }}">{{trans('auth.sign_in')}}</a></li>
                            <li><a href="{{ route('register') }}">{{trans('auth.sign_up')}}</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('content')
        </div>
    </main>

@endguest
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
