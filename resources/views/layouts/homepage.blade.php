<!doctype html>
<html lang='en'>
<head>
  @include('layouts.include.core.head')

  @include('layouts.include.homepage.head')

  @stack('header-css')
  @stack('style')
</head>
<body>
<header class="header_03">
  <div class="header_main">
    <div class="header_menu fixed-top">
      <div class="container">
        <div class="header_top">
          @include('layouts.include.homepage.header_top')
        </div>
      </div>
    </div>
    <div class="header_btm" style="position:relative">
      @include('layouts.include.homepage.header_bottom')
    </div>
  </div>
</header>
<main>
  @yield('content')
</main>

<footer id="colophon" class="site-footer custom_footer dark_footer" style="padding:0">
  <div class="container">
    <div class="row footer_widget">
      <div class="col-md-12">
        <div class="footer_widget_box">
          <p class="copyright-text">© Copyright 2020 by RekapDigi. All rights reserved.
          </p>
        </div>
      </div>
    </div>
  </div>
</footer>

<script type='text/javascript' src="{{ asset('asset-homepage/js/jquery-3.4.1.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('asset-homepage/js/aos.js') }}"></script>
<script type='text/javascript' src="{{ asset('asset-homepage/js/select2.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('asset-homepage/js/bootstrap.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('asset-homepage/js/owl.carousel.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('asset-homepage/js/custom.js') }}"></script>
</body>
</html>
