<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="{{ asset('js/app.js') }}" defer></script>
  <title>First Blog | Welcome</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
  @stack("styles")
 
</head>

<body>

  <!-- Start Top Bar -->
  <div class="navbar navbar-dark bg-dark">
    <div  id="topheader" class="top-bar-left">
      <ul class="menu">
        <li class="active">Blog</li>
        <li  ><a href="/">Home</a></li>
        <li ><a href={{route('articles.index')}}>Articles</a></li>
        <li ><a  href="/contact">Contact</a></li>
      </ul>
    </div>

    <div class="top-bar-right">
      <ul class="menu">
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
          </li>
        @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('S\'inscrire') }}</a>
          </li>
        @endif
          @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                {{ __('se déconnecter') }}
              </a>
              @if (Auth::user()->role->role_name=="Admin")
              <a class="dropdown-item" aria-labelledby="navbarDropdown" href="{{route('administration')}}">   {{ __('Ouvrir le panneau d\'administration') }} </a>
              @endif
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
        @endguest
      </ul>
    </div>
  </div>
  <!-- End Top Bar -->


  <!-- We can now combine rows and columns when there's only one column in that row -->
  <div class="row medium-8 large-7 columns">
    @yield('content')
  </div>

  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
  <script>
    $(document).foundation();
  </script>
  @stack('scripts')
</body>

</html>


