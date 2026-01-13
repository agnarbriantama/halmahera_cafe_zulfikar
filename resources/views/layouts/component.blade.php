<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.header')
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      @include('partials.navbar')
      @include('partials.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      @include('partials.footer')
    </div>
  </div>

  @include('partials.scripts')
</body>
</html>