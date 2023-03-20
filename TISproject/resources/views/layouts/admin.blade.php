<!doctype html> 
<html lang="en"> 
  <head> 
    <meta charset="utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" /> 
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" /> 
    <title>@yield('title', 'Admin Point and shoot')</title> 
  </head> 
  <body> 
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-secondary py-4">
      <div class="container">
        <a class="navbar-brand" href="{{ route('product.index')}}" id="titleNav">{{ __('texts.adminPanel') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <a href="{{ route('admin.home.index') }}" class="nav-link text-white">{{ __('texts.adminHome') }}</a>
            <a href="{{ route('admin.product.index') }}" class="nav-link text-white">{{ __('texts.adminProducts') }}</a>
            <a href="{{ route('admin.review.index') }}" class="nav-link text-white">{{ __('texts.adminReviews') }}</a>
            <a href="{{ route('product.index') }}" class="btn bg-primary text-white">{{ __('texts.backToProductsPage') }}</a>
          </div>
        </div>
      </div>
    </nav>
    <div class="row g-0"> 
      <div class="col content-black"> 
        <div class="g-0 m-5"> 
          @yield('content') 
        </div> 
      </div> 
    </div>
  </body> 
</html>