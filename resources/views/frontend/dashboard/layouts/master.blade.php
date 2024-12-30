<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <title>@yield('title')</title>
  <link rel="icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" href="{{asset('frontend/dashboard/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/dashboard/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/dashboard/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/dashboard/css/slick.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/dashboard/css/jquery.nice-number.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/dashboard/css/jquery.calendar.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/dashboard/css/add_row_custon.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/dashboard/css/mobile_menu.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/dashboard/css/jquery.exzoom.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/dashboard/css/multiple-image-video.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/dashboard/css/ranger_style.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/dashboard/css/jquery.classycountdown.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/dashboard/css/venobox.min.css')}}">

  <link rel="stylesheet" href="{{asset('frontend/dashboard/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/dashboard/css/responsive.css')}}">
  <!-- <link rel="stylesheet" href="css/rtl.css"> -->
</head>

<body>


  <!--=============================
    DASHBOARD MENU START
  ==============================-->
    @include('frontend.dashboard.layouts.header')
  <!--=============================
    DASHBOARD MENU END
  ==============================-->


  <!--=============================
    DASHBOARD START
  ==============================-->
    @yield('content')
  <!--=============================
    DASHBOARD START
  ==============================-->


  <!--============================
      SCROLL BUTTON START
    ==============================-->
  <div class="wsus__scroll_btn">
    <i class="fas fa-chevron-up"></i>
  </div>
  <!--============================
    SCROLL BUTTON  END
  ==============================-->


  <!--jquery library js-->
  <script src="{{('frontend/dashboard/js/jquery-3.6.0.min.js')}}"></script>
  <!--bootstrap js-->
  <script src="{{('frontend/dashboard/js/bootstrap.bundle.min.js')}}"></script>
  <!--font-awesome js-->
  <script src="{{('frontend/dashboard/js/Font-Awesome.js')}}"></script>
  <!--select2 js-->
  <script src="{{('frontend/dashboard/js/select2.min.js')}}"></script>
  <!--slick slider js-->
  <script src="{{('frontend/dashboard/js/slick.min.js')}}"></script>
  <!--simplyCountdown js-->
  <script src="{{('frontend/dashboard/js/simplyCountdown.js')}}"></script>
  <!--product zoomer js-->
  <script src="{{('frontend/dashboard/js/jquery.exzoom.js')}}"></script>
  <!--nice-number js-->
  <script src="{{('frontend/dashboard/js/jquery.nice-number.min.js')}}"></script>
  <!--counter js-->
  <script src="{{('frontend/dashboard/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{('frontend/dashboard/js/jquery.countup.min.js')}}"></script>
  <!--add row js-->
  <script src="{{('frontend/dashboard/js/add_row_custon.js')}}"></script>
  <!--multiple-image-video js-->
  <script src="{{('frontend/dashboard/js/multiple-image-video.js')}}"></script>
  <!--sticky sidebar js-->
  <script src="{{('frontend/dashboard/js/sticky_sidebar.js')}}"></script>
  <!--price ranger js-->
  <script src="{{('frontend/dashboard/js/ranger_jquery-ui.min.js')}}"></script>
  <script src="{{('frontend/dashboard/js/ranger_slider.js')}}"></script>
  <!--isotope js-->
  <script src="{{('frontend/dashboard/js/isotope.pkgd.min.js')}}"></script>
  <!--venobox js-->
  <script src="{{('frontend/dashboard/js/venobox.min.js')}}"></script>
  <!--classycountdown js-->
  <script src="{{('frontend/dashboard/js/jquery.classycountdown.js')}}"></script>

  <!--main/custom js-->
  <script src="{{('frontend/dashboard/js/main.js')}}"></script>
</body>

</html>