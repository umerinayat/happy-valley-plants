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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.2/axios.min.js" integrity="sha512-SRGf0XYPMWMGCYQg7sQsW2/FMWq0L/mYhwxDraoUOeZ9sWO2/+R48bcXZaWOpwjCQbyRWP24zsbtqQxJXU1W2w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script> 

            $addToCartBtn = $('.addToCartBtn');
            $cartItemsCount = $('.cartsItemsCount');

            // init local storage
            // var cartProductIds = [];
            // if ( ! ('cartProductIds' in localStorage) ) {
            //     localStorage.setItem('cartProductIds', JSON.stringify([]));
            //     cartProductIds = JSON.parse(localStorage.getItem('cartProductIds'));
            // }  else {
            //     cartProductIds = JSON.parse(localStorage.getItem('cartProductIds'));
            //     $cartItemsCount.text(cartProductIds.length);
            // }


            $addToCartBtn.on('click', function(event) {
                var productId = $(this).data('productId');
                axios.get('/products/add-to-cart/' + productId).then( function({data} ) {
                    $.toast({
                        heading: data.message,
                        position: 'bottom-center',
                        stack: false
                    });
                    $cartItemsCount.text(data.cartCount);
                });


                // if ( cartProductIds.find(function(cartProductId) { return productId === cartProductId }) ) {
                //     console.log('Already in cart');
                //     return;
                // }
                // cartProductIds.push(productId);

                // var updatedCartIds = [ ...(JSON.parse( localStorage.getItem('cartProductIds') )), productId];
                
                // localStorage.setItem('cartProductIds', JSON.stringify(updatedCartIds) );

            });

    </script>


    @stack('scripts')
    @endstack




</body>

</html>