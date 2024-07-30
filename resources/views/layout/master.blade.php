<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="close">
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Start::app-header -->
    @yield('header')
    <!-- End::app-header -->
    <meta name="Author" content="Spruko Technologies Private Limited">

    <!-- Favicon -->
    <link rel="icon" href="https://spruko.com/demo/ynex/dist/assets/images/brand-logos/favicon.ico" type="image/x-icon">
    <!-- Choices JS -->
    <script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js')}}"></script> <!-- Main Theme Js -->
    <script src="{{ asset('assets/js/main.js')}}"></script> <!-- Bootstrap Css -->
    <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> <!-- Style Css -->
    <link href="{{ asset('assets/css/styles.min.css')}}" rel="stylesheet"> <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.css')}}" rel="stylesheet"> <!-- Node Waves Css -->
    <link href="{{ asset('assets/libs/node-waves/waves.min.css')}}" rel="stylesheet"> <!-- Simplebar Css -->
    <link href="{{ asset('assets/libs/simplebar/simplebar.min.css')}}" rel="stylesheet"> <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/libs/%40simonwep/pickr/themes/nano.min.css')}}"> <!-- Choices Css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/choices.js/public/assets/styles/choices.min.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    @yield('custom-css')
</head>

<body>

    <!-- ============================== -->
            @yield('layouts')
    <!-- ============================== -->


    <div class="scrollToTop"> <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span> </div>
    <div id="responsive-overlay"></div> <!-- Popper JS -->
    <script src="{{ asset('assets/libs/%40popperjs/core/umd/popper.min.js')}}"></script> <!-- Bootstrap JS -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script> <!-- Defaultmenu JS -->
    <script src="{{ asset('assets/js/defaultmenu.min.js')}}"></script> <!-- Node Waves JS-->
    <script src="{{ asset('assets/libs/node-waves/waves.min.js')}}"></script> <!-- Sticky JS -->
    <script src="{{ asset('assets/js/sticky.js')}}"></script> <!-- Simplebar JS -->
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ asset('assets/js/simplebar.js')}}"></script> <!-- Color Picker JS -->
    <script src="{{ asset('assets/libs/%40simonwep/pickr/pickr.es5.min.js')}}"></script>
    <script src="{{ asset('assets/js/custom.js')}}"></script>
</body>

</html>