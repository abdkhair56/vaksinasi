<!doctype html>
<html lang='{{ app()->getLocale() }}'>
<head>
  @include('layouts.include.core.head')
  <meta />
  <!-- BEGIN: Page CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/authentication.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/Login.css') }}">
  <!-- END: Page CSS-->

  @stack('head-script')
</head>
<body class='vertical-layout vertical-menu-modern boxicon-layout no-card-shadow 1-column navbar-sticky footer-static bg-full-screen-image blank-page blank-page' data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
<div class="app-content content">
  <div class="content-overlay"></div>
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class='content-body'>
      @yield('main-content')
    </div>
  </div>
</div>
<!-- END: Content-->

@include('layouts.include.core.javascript')

<!-- BEGIN: Page JS-->
<script type='text/javascript' src='{{ asset('plugins/F30Plugins.js') }}'></script>
<script type='text/javascript'>
  @php
    $error = session()->get('__error_message__');
    $info = session()->get('__info_message__')
  @endphp
  @if (!empty($error))
  alertError ({
    title: 'Error',
    html: '{{ $error }}'
  })
  @endif

  @if(!empty($info))
  alertInfo ({
    title: 'Info',
    html: '{{ $info }}'
  })
  @endif
</script>
@stack('javascript')
<!-- END: Page JS-->
</body>
</html>
