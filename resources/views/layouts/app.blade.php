<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Visual Lent') }}</title>


  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}"></script>
</head>

<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-info shadow-sm">
      <div class="container">
        <a class="navbar-brand text-light bold" href="{{ url('/') }}">
          {{ config('app.name', 'Visión Lents') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
            @if (Route::has('login'))
            <li class="nav-item">
              <a class="nav-link text-light" href="{{ route('login') }}"></a>
            </li>
            @endif

            @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle text-light align-items-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <i class="fas fa-user-circle" style="font-size: 1.5rem; vertical-align: sub;"></i>
                {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <div class="d-flex justify-content-center">
                  <a href="{{url('locale/es')}}" class="dropdown-item text-center border-info border-right" style="max-width: 50%;" id="LanguagesEs">{{__('messages.Spanish')}}</a>
                  <a href="{{url('locale/en')}}" class="dropdown-item text-center" style="max-width: 50%;" id="LanguagesEn">{{__('messages.English')}}</a>
                </div>
                <a class="dropdown-item text-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt text-info"></i>
                  {{ __('messages.Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
  @yield('script')
</body>

</html>