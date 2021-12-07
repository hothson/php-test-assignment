<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('parts.favicon-meta')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
{{--    <script src="{{ asset('assets/js/dashforge.js') }}" defer></script>--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/dashforge.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/skin.light.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/skin.charcoal.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-header navbar-header-fixed">
            <div class="navbar-brand">
                <a href="{{ url('/') }}" class="df-logo">Eq<span>centric</span></a>
            </div>
            @auth
                <div id="navbarMenu" class="navbar-menu-wrapper">
                    <div class="navbar-menu-header">
                        <a href="../../index.html" class="df-logo">dash<span>forge</span></a>
                        <a id="mainMenuClose" href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></a>
                    </div><!-- navbar-menu-header -->
                    <ul class="nav navbar-menu">
                        <li class="nav-label pd-l-20 pd-lg-l-25 d-lg-none">Main Navigation</li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sites.index') }}">{{ __('Sites') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{ __('Maintenance Plans') }}</a>
                        </li>
                    </ul>
                </div>
            @else
            @endauth
            <div class="navbar-right">
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-menu ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
        <main class="content py-4 mt-5">
            @yield('content')
        </main>
    </div>
</body>
</html>
