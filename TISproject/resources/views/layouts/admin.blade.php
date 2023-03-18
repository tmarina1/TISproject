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
    <div class="row g-0"> 
    <div class="p-3 col-3 fixed text-white" id="backgroundAdminColor"> 
      <a href="{{ route('admin.home.index') }}" class="text-white text-decoration-none"> 
        <span class="fs-4">{{ __('texts.adminPanel') }}</span> 
      </a> 
      <hr />
      <ul class="nav flex-column"> 
        <li>
          <a href="{{ route('admin.home.index') }}" class="nav-link text-white">° {{ __('texts.adminHome') }}</a>
        </li> 
        <li>
          <a href="{{ route('admin.product.index') }}" class="nav-link text-white">° {{ __('texts.adminProducts') }}</a>
        </li> 
        <li>
          <a href="{{ route('admin.product.index') }}" class="nav-link text-white">° {{ __('texts.adminReviews') }}</a>
        </li> 
        <li> 
          <a href="{{ route('product.index') }}" class="nav-link mt-5 text-white">{{ __('texts.backToProductsPage') }}</a> 
        </li> 
      </ul> 
    </div>
    <div class="col content-black"> 
      <div class="g-0 m-5"> 
        @yield('content') 
      </div> 
    </div> 
  </div>
  </body> 
</html>