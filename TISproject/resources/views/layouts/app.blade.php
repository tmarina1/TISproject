<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
  <title>@yield('title', "Point 'n shoot")</title>
</head>
<body>
  <!-- header -->
  <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-secondary py-3">
    <div class="container">
      <a class="navbar-brand" href="{{ route('product.index')}}" id="titleNav">Point 'n shoot</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <img src="{{ asset('/img/logo.svg') }}" alt="Logo point 'n shoot" id="logoNav">
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link active" href="{{ route('product.index')}}">{{ __('texts.start') }}</a>
          <a class="nav-link active" href="{{ route('home.about')}}">{{ __('texts.aboutUs') }}</a>
          <a class="nav-link active" href="{{ route('cart.index')}}">{{ __('texts.car') }}</a>
          @guest 
            <div class="vr bg-white mx-2 d-none d-lg-block"></div> 
            <a class="nav-link active" href="{{ route('login') }}">{{ __('texts.logIn') }}</a> 
            <a class="nav-link active" href="{{ route('register') }}">{{ __('texts.register') }}</a> 
          @else 
            <a class="nav-link active" href="{{ route('order.index')}}">Ordenes</a>
            <div class="vr bg-white mx-2 d-none d-lg-block"></div> 
            <form id="logout" action="{{ route('logout') }}" method="POST"> 
              <a role="button" class="nav-link active" onclick="document.getElementById('logout').submit();">{{ __('texts.logOut') }}</a> 
              @csrf 
            </form> 
          @endguest
        </div>
      </div>
    </div>
  </nav>

  <header class="masthead bg-primary text-white text-center py-2">
    <div class="container d-flex align-items-center flex-column">
      <h2>@yield('subtitle', 'Venta de articulos fotograficos')</h2>
    </div>
  </header>
  <!-- header -->

  <div class="container my-4">
    @yield('content')
  </div>

  <!-- footer -->
  <div class="copyright py-4 text-center text-white">
    <div class="container">
      <small>
          Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank"
          href="#">
          Tomas Marin 
        </a>
        <a class="text-reset fw-bold text-decoration-none" target="_blank"
          href="#">
          Simon Cardenas
        </a>
        <a class="text-reset fw-bold text-decoration-none" target="_blank"
          href="#">
          Juan Pablo Yepes
        </a>
      </small>
    </div>
  </div>
  <!-- footer -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
</body>
</html>
