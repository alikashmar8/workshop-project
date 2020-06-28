<!doctype html>
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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('resources/sass/app.scss') }}" rel="stylesheet">
    <link href="{{ asset('style1.css') }}" rel="stylesheet">
    <link href="{{ asset('homestyle.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>

</head>
<body>


{{--@guest--}}
{{--        <div class="logo"><a class="nav-link1" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--        </div>--}}
{{--        @if (Route::has('register'))--}}

{{--            <div class="logo"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--            </div>--}}
{{--        @endif--}}
@auth
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('/') }}">
            Crowd Sourcing
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
                </li>
                @if(Auth::user()->type>0)
                    <li class="nav-item">
                        <a class="nav-link" href="/myWorkshops">My Workshops</a>
                    </li>
                @endif

                @if (Auth::user()->type == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="/workshop/create">Create workshop</a>
                    </li>
                @endif
                @if(Auth::user()->type==2)
                    <li class="nav-item">
                        <a class="nav-link" href="/ideasToRate">Ideas to rate</a>
                    </li>
                @endif
            </ul>
        </div>
        <form class="form-inline">
            <span class="navbar-text" style="margin-right: 20px">
                {{ Auth::user()->name }}
            </span>
        </form>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            <input type="submit"> {{ __('Logout') }}</form>
        </form>
        <a href="{{ route('logout') }}" class="btn btn-outline-danger my-2 my-sm-0"
           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
    </nav>
@endauth

<main class="py-4">
    @guest
        @yield('authentication')
    @else
        @yield('content')
    @endguest

</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

</body>
</html>
