@extends('store-front.layout.master')


@section('main-content')
    <!--product area start-->
    <div class="product_area  mb-95 mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header">
                        <div class="section_title">
                            <h2>Our Plants</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                @foreach($products as $product)
                <div class="col-lg-3" style="margin-bottom: 60px">
                    <article class="single_product">
                        <figure>
                            <div class="product_thumb">
                                <a class="primary_img" href="{{ route('plantsProductDetail', ['category_slug' => $product->category->slug, 'product_slug' => $product->slug]) }}"><img
                                        src="{{ asset('assets/img/product/image.jpg') }}" alt=""></a>
                            
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart addToCartBtn" data-product-id="{{ $product->id }}"><a href="javascript:void(0)" title="Add to cart"><i
                                                class="icon-shopping-bag"></i></a></li>
                                            </ul>
                                        </div>
                            </div>
                            <figcaption class="product_content">
                                <h4 class="product_name"><a href="{{ route('plantsProductDetail', ['category_slug' => $product->category->slug, 'product_slug' => $product->slug]) }}">{{ $product->title }}</a></h4>
                                <div class="price_box">
                                    <span class="current_price"> ${{ $product->selling_price }}</span>
                                </div>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                @endforeach
            </div>

        </div>
    </div>
    <!--product area end-->

    <!--shipping area start-->
    <div class="shipping_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="{{ asset('assets/img/about/shipping1.png') }}" alt="">
                        </div>
                        <div class="shipping_content">
                            <h3>Free Delivery</h3>
                            <p>Free shipping around the world for all <br> orders over $120</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_shipping col_2">
                        <div class="shipping_icone">
                            <img src="{{ asset('assets/img/about/shipping2.png') }}" alt="">
                        </div>
                        <div class="shipping_content">
                            <h3>Safe Payment</h3>
                            <p>With our payment gateway, don’t worry <br> about your information</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_shipping col_3">
                        <div class="shipping_icone">
                            <img src="{{ asset('assets/img/about/shipping3.png') }}" alt="">
                        </div>
                        <div class="shipping_content">
                            <h3>Friendly Services</h3>
                            <p>You have 30-day return guarantee for <br> every single order</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--shipping area end-->

    <!--testimonial area start-->
    <div class="testimonial_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>What Our Customers Says ?</h2>
                    </div>
                </div>
            </div>
            <div class="testimonial_container">
                <div class="row">
                    <div class="testimonial_carousel owl-carousel">
                        <div class="col-12">
                            <div class="single-testimonial">
                                <div class="testimonial-icon-img">
                                    <img src="{{ asset('assets/img/about/testimonials-icon.png') }}" alt="">
                                </div>
                                <div class="testimonial_content">
                                    <p>“ When a beautiful design is combined with powerful technology, <br>
                                        it truly is an artwork. I love how my website operates and looks with this
                                        theme. Thank you for the awesome product. ”</p>
                                    <div class="testimonial_text_img">
                                        <a href="#"><img src="{{ asset('assets/img/about/testimonial1.png') }}" alt=""></a>
                                    </div>
                                    <div class="testimonial_author">
                                        <p><a href="#">Rebecka Filson</a> / <span>CEO of CSC</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single-testimonial">
                                <div class="testimonial-icon-img">
                                    <img src="{{ asset('assets/img/about/testimonials-icon.png') }}" alt="">
                                </div>
                                <div class="testimonial_content">
                                    <p>“ When a beautiful design is combined with powerful technology, <br>
                                        it truly is an artwork. I love how my website operates and looks with this
                                        theme. Thank you for the awesome product. ”</p>
                                    <div class="testimonial_text_img">
                                        <a href="#"><img src="{{ asset('assets/img/about/testimonial2.png') }}" alt=""></a>
                                    </div>
                                    <div class="testimonial_author">
                                        <p><a href="#">Amber Laha</a> / <span>CEO of DND</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single-testimonial">
                                <div class="testimonial-icon-img">
                                    <img src="{{ asset('assets/img/about/testimonials-icon.png') }}" alt="">
                                </div>
                                <div class="testimonial_content">
                                    <p>“ When a beautiful design is combined with powerful technology, <br>
                                        it truly is an artwork. I love how my website operates and looks with this
                                        theme. Thank you for the awesome product. ”</p>
                                    <div class="testimonial_text_img">
                                        <a href="#"><img src="{{ asset('assets/img/about/testimonial3.png') }}" alt=""></a>
                                    </div>
                                    <div class="testimonial_author">
                                        <p><a href="#">Lindsy Neloms</a> / <span>CEO of SFD</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--testimonial area end-->

    <!--newsletter area start-->
    <div class="newsletter_area_start">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="newsletter_container">
                        <div class="subscribe_form">
                            <form id="mc-form" class="mc-form footer-newsletter">
                                <input id="mc-email" type="email" autocomplete="off" placeholder="Enter you email" />
                                <button id="mc-submit">Subscribe</button>
                                <div class="email_icon">
                                    <i class="icon-mail"></i>
                                </div>
                            </form>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts text-centre">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div><!-- mailchimp-alerts end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--newsletter area end-->
@endsection