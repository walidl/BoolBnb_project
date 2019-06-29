<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title --}}
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">

            <!-- Right Side Of Navbar -->
            <div class="navbar__right">

              <ul class="navbar-nav ml-auto">
                <li class="nav-item nav-link dropdown">Host a home</li>
                <li class="nav-item nav-link dropdown">Host an experience</li>

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
                        @if (auth()->user()->renting)

                          <a href="{{route('user.rentals')}}" class="dropdown-item">My Rentals</a>
                        @endif
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
        <main class="p-0">
            @yield('content')
        </main>
        <footer>
          <div class="row">
            <div class="footer">
              <div class="footer__section">
                <p class="title__section">BoolBnb</p>
                <p>Careers</p>
                <p>Press</p>
                <p>Policies</p>
                <p>Help</p>
                <p>Diversity and Belonging</p>
                <p>Accessibility</p>
                <p>Company details</p>
              </div>
              <div class="footer__section">
                <p class="title__section">Discover</p>
                <p>Trust and safety</p>
                <p>Travel Credit</p>
                <p>BoolBnb Citizen</p>
                <p>Business Travel</p>
                <p>Guidebooks</p>
                <p>BoolBnbmag</p>
              </div>
              <div class="footer__section">
                <p class="title__section">Hosting</p>
                <p>Why Host</p>
                <p>Hospitality</p>
                <p>Responsible Hosting</p>
                <p>Community Center</p>
                <p>Host and Experience</p>
                <p>Open Homes</p>
              </div>
              <div class="footer__section">
                <p class="title__section">
                  <i class="social__section fab fa-facebook-f"></i>
                  <i class="social__section fab fa-twitter"></i>
                  <i class="social__section fab fa-instagram"></i>
                </p>
                <p>Terms</p>
                <p>Privacy</p>
                <p>Site Map</p>
              </div>
            </div>
          </div>
          <div class="container fooFoo">
            <i class="fab fa-airbnb"></i>
            <i class="far fa-copyright"></i>
            <h6 class="copyrights">BoolBnb. All rights reserved.</h6>
            <h6>Powered with <i class="fas fa-heart"></i> by Walid, Emanuele, Riccardo, Sara.</h6>
          </div>
        </footer>
      </div>
  </body>
</html>
