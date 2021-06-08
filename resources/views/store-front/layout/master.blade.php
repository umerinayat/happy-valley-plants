<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Happy Valley Plants</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- CSS
    ========================= -->
    <!--bootstrap min css-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <!--slick min css-->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!--font awesome css-->
    <link rel="stylesheet" href="{{ asset('assets/css/font.awesome.css') }}">
    <!--animate css-->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}">
    <!--slinky menu css-->
    <link rel="stylesheet" href="{{ asset('assets/css/slinky.menu.css') }}">
    <!--plugins css-->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!--modernizr min js here-->
    <script src="{{ asset('assets/js/vendor/modernizr-3.7.1.min.js') }}"></script>
</head>

<body>

    <!--header area start-->
    <!-- mobile off screen left panel -->
    @include('store-front.layout.partials.mobile-offcanvas-menu')
    @include('store-front.layout.partials.desktop-header')
    <!--header area end-->

    <!--slider area start-->
    {{-- @include('store-front.layout.partials.home-slider') --}}
    <!--slider area end-->

    @yield('main-content')

    <!--footer area start-->
    @include('store-front.layout.partials.footer')
    <!--footer area end-->

 
    <!--news letter popup start-->
    <div class="newletter-popup">
        <div id="boxes" class="newletter-container">
            <div id="dialog" class="window">
                <div id="popup2">
                    <span class="b-close"><span>close</span></span>
                </div>
                <div class="box">
                    <div class="newletter-title">
                        <h2>Newsletter</h2>
                    </div>
                    <div class="box-content newleter-content">
                        <label class="newletter-label">Enter your email address to subscribe our notification of our new
                            post &amp; features by email.</label>
                        <div id="frm_subscribe">
                            <form name="subscribe" id="subscribe_popup">
                                <!-- <span class="required">*</span><span>Enter you email address here...</span>-->
                                <input type="text" value="" name="subscribe_pemail" id="subscribe_pemail"
                                    placeholder="Enter you email address here...">
                                <input type="hidden" value="" name="subscribe_pname" id="subscribe_pname">
                                <div id="notification"></div>
                                <a class="theme-btn-outlined"
                                    onclick="email_subscribepopup()"><span>Subscribe</span></a>
                            </form>
                            <div class="subscribe-bottom">
                                <input type="checkbox" id="newsletter_popup_dont_show_again">
                                <label for="newsletter_popup_dont_show_again">Don't show this popup again</label>
                            </div>
                        </div>
                        <!-- /#frm_subscribe -->
                    </div>
                    <!-- /.box-content -->
                </div>
            </div>

        </div>
        <!-- /.box -->
    </div>
    <!--news letter popup start-->



    <!-- JS
============================================ -->
    <!--jquery min js-->
    <script src="{{ asset('assets/js/vendor/jquery-3.4.1.min.js') }}"></script>
    <!--popper min js-->
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <!--bootstrap min js-->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!--owl carousel min js-->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!--slick min js-->
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <!--magnific popup min js-->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!--counterup min js-->
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <!--jquery countdown min js-->
    <script src="{{ asset('assets/js/jquery.countdown.js') }}"></script>
    <!--jquery ui min js-->
    <script src="{{ asset('assets/js/jquery.ui.js') }}"></script>
    <!--jquery elevatezoom min js-->
    <script src="{{ asset('assets/js/jquery.elevatezoom.js') }}"></script>
    <!--isotope packaged min js-->
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <!--slinky menu js-->
    <script src="{{ asset('assets/js/slinky.menu.js') }}"></script>
    <!-- Plugins JS -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>


</body>

</html>