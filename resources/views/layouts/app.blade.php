<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('font-awesome/all.css')}}">
    <script rel="script" type="text/javascript" src="{{asset('jss/all.js')}}"></script>



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <h2 style="font-weight: bold">Logo</h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <span style="font-weight: bold;font-family:'Comic Sans MS';font-size: 20px">{{ __('Login') }}</span></a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <span style="font-weight: bold;font-family:'Comic Sans MS';font-size: 20px">{{ __('Register') }}</span></a>
                                </li>
                            @endif
                        @else
                            <ul class="nav">
                          <li class="nav-item"><a class="nav-link" href="{{'/pmanager/public/companies'}}"><span style="font-weight: bold;font-size: 20px;font-family: 'Comic Sans MS'">Companies</span></a></li>
                            <li class="nav-item"><a href="{{'/pmanager/public/projects'}}" class="nav-link"><span style="font-weight: bold;font-size: 20px;font-family: 'Comic Sans MS'">Projects</span></a></li>
                            </ul>
                        @if(Auth::user()->role_id==1)

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle"
                                       href="#" role="button" data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false" v-pre>
                                        <span style="font-family: 'Comic Sans MS';font-weight: bold;font-size: 20px">Admin</span>  <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{'/pmanager/public/companies'}}"><span style="font-weight: bold;font-size: 10px;font-family: 'Comic Sans MS'">All Companies</span></a>
                                        <a class="dropdown-item" href="{{'/pmanager/public/projects'}}"><span style="font-weight: bold;font-size: 10px;font-family: 'Comic Sans MS'">All Projects</span></a>
                                    </div>
                                </li>
                            @endif

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span style="font-family: 'Comic Sans MS';font-weight: bold;font-size: 17px"> {{ Auth::user()->name }} </span><span class="caret"></span>
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
            </div>
        </nav>
@include('partials.errors')
        @include('partials.sucess')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>