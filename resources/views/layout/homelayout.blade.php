<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'BoolBnb') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('tomtom-sdk/tomtom.min.js') }}" defer></script>
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('tomtom-sdk/map.css') }}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
      <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
          <!-- Left Side Of Navbar -->
          <div class="navbar__left">
            <div class="navbar_logo">
              <img src="https://cdn.worldvectorlogo.com/logos/airbnb-1.svg" alt="" href="{{ url('/') }}">
            </div>
          </div>
            {{-- <a href="{{route('rental.show-all')}}" class="btn btn-primary mx-2">Tutte le stanze</a>
            <a href="{{route('rental.create')}}" class="btn btn-success mx-2"> Crea Stanza</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <span class="navbar-toggler-icon"></span>
            </button>
          </div> --}}

          <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Right Side Of Navbar -->
          <div class="navbar__right">

            <ul class="navbar-nav ml-auto">

                <!-- Authentication Links -->
              @guest
                <li class="nav-item nav-link dropdown">Host a home</li>
                <li class="nav-item nav-link dropdown">Host and experience</li>
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
        </div>
      </nav>

      <main class="py-4">
          @yield('content')
      </main>
      <footer>
        <div class="footer">
          <div class="footer__section">
            <p class="title__section">airbnb</p>
            <p>opportunita di lavoro</p>
            <p>stampa</p>
            <p>condizioni</p>
            <p>aiuto</p>
            <p>diversità e <br> appartenenza</p>
            <p>informazioni di contatto</p>

          </div>
          <div class="footer__section">
            <p class="title__section">scopri</p>
            <p>affidabilità e sicurezza</p>
            <p>travel credit</p>
            <p>cittadino di boolb&b</p>
            <p>viaggio di lavoro</p>
            <p>guide</p>
          </div>
          <div class="footer__section">
            <p class="title__section">ospita</p>
            <p>perchè affittare</p>
            <p>ospitalità</p>
            <p>comunity center</p>
            <p>offri un esperienza</p>
            <p>open home</p>
          </div>
          <div class="footer__section">
            <p class="title__section">social</p>
            <p>opportunità di lavoro</p>
            <p>stampa</p>
            <p>condizioni</p>
          </div>

        </div>

      </footer>
    </div>
</body>
</html>
