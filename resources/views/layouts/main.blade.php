<html lang='{{ app()->getLocale() }}'>
<head>
@include('layouts.include.core.head')

<!-- BEGIN: Vendor CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/dragula.min.css') }}">
 
  <!-- END: Vendor CSS-->


  <!-- BEGIN: Theme CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset ('app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset ('app-assets/vendors/css/pickers/daterange/daterangepicker.css')}}">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

  @stack('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

  <link rel='stylesheet' type='text/css' href='{{ asset('css/Fix.css') }}' />
</head>
<body class='vertical-layout vertical-menu-modern semi-dark-layout 2-columns navbar-sticky footer-static'
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
<div class="header-navbar-shadow"></div>
<nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top ">
  <div class="navbar-wrapper">
    <div class="navbar-container content">
      <div class="navbar-collapse" id="navbar-mobile">
        @include('layouts.include.main.navbar')
      </div>
    </div>
  </div>
</nav>

<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="navbar-header">
    <ul class="nav navbar-nav flex-row">
      <li class="nav-item mr-auto">
        <a class="navbar-brand" href="">
          <!-- <div class="brand-logo"><img class="logo" src="{{ asset('images/logo/no-image.png') }}" /></div> -->
          <h2 class="brand-text mb-0">TEMPLATE</h2>
        </a></li>
      <li class="nav-item nav-toggle">
        <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
          <i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i>
          <i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc" style='color: #FFF !important;'></i>
        </a>
      </li>
    </ul>
  </div>
  <div class="shadow-bottom"></div>
  <div class="main-menu-content">
    @include('layouts.include.main.sidebar')
  </div>
</div>

<!-- BEGIN: Content-->
  <div class="content-overlay"></div>
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      @yield('main-content')
    </div>
  </div>

<!-- BEGIN: Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js') }}"></script>
<script src="{{ asset('app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js') }}"></script>
<script src="{{ asset('app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js') }}"></script>
<script src="{{ asset('app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js') }}"></script>
<script src="{{ asset('app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js') }}"></script>

<!-- BEGIN Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('app-assets/js/scripts/configs/vertical-menu-dark.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
<script src="{{ asset('app-assets/js/core/app-menu.min.js') }}"></script>
<script src="{{ asset('app-assets/js/core/app.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/components.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/footer.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript" src="{{asset ('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset ('app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{asset ('js/sweetalert2.js')}}"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

<!-- END: Theme JS-->

@stack('javascript')
{!! Toastr::message() !!}

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/extensions/dragula.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<script src="{{asset ('app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset ('app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{asset ('app-assets/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{asset ('app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
<script src="{{asset ('app-assets/vendors/js/pickers/daterange/moment.min.js')}}"></script>
<script src="{{asset ('app-assets/vendors/js/pickers/daterange/daterangepicker.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{asset('app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js')}}"></script>
<!-- calender js -->
@stack('calendar-js')
@stack('select2')
<!-- end calender js -->
</body>
</html>
