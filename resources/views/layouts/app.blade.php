<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{--<!-- Scripts -->--}}
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{--<!-- Styles -->--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
</head>
<body>
<div class="col-md-3 menu-left">
    @yield('left')
</div>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-default navbar-laravel navbar-fixed-top position-fixed">
        <div class="container">
            <li class="nav navbar-nav homepage">
                <a href="{{ url('/') }}">
                    {{ config('app.name', 'HomePage') }}
                </a>
            </li>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <div class="top-center links nav navbar-nav">
                    <li class="{{@$navact == '/index.php/course' ? 'active' : ''}}"><a href="#">{{ trans('validation.Courses')}}</a></li>
                    <li class="{{@$navact == '/index.php/teacher' ? 'active' : ''}}"><a href="#">{{ trans('validation.Teacher')}}</a></li>
                    <li class="{{@$navact == '/index.php/promotion' ? 'active' : ''}}"><a href="#">{{ trans('validation.Promotion')}}</a></li>
                    <li class="{{@$navact == '/index.php/tutorial' ? 'active' : ''}}"><a href="#">{{ trans('validation.Advisory')}}</a></li>
                </div>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item {{@$navact == '/index.php/login' ? 'active' : ''}}">
                            <a class="nav-link" href="{{ route('login') }}">{{ trans('validation.Login') }}</a>
                        </li>
                        <li class="nav-item {{@$navact == '/index.php/register' ? 'active' : ''}}">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{  trans('validation.Register') }}</a>
                            @endif
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ trans('validation.Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
