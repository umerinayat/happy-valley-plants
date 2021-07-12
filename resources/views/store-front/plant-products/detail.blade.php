@extends('store-front.layout.master')

@section('main-content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="{{ route('plantsProducts', ['category_slug' =>  $product->category->slug]) }}">{{ $product->category->name }}</a></li>
                            <li>{{ $product->title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->
    <!--product details start-->
    <div class="product_details mt-100 mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="{{ asset('assets/img/product/image.jpg') }}"
                                    data-zoom-image="{{ asset('assets/img/product/image.jpg') }}" alt="big-1">
                            </a>
                        </div>
                       {{-- <div class="single-zoom-thumb">
                            <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update=""
                                        data-image="assets/img/product/productbig4.jpg"
                                        data-zoom-image="assets/img/product/productbig4.jpg">
                                        <img src="assets/img/product/productbig4.jpg" alt="zo-th-1" />
                                    </a>

                                </li>
                                <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update=""
                                        data-image="assets/img/product/productbig1.jpg"
                                        data-zoom-image="assets/img/product/productbig1.jpg">
                                        <img src="assets/img/product/productbig1.jpg" alt="zo-th-1" />
                                    </a>

                                </li>
                                <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update=""
                                        data-image="assets/img/product/productbig2.jpg"
                                        data-zoom-image="assets/img/product/productbig2.jpg">
                                        <img src="assets/img/product/productbig2.jpg" alt="zo-th-1" />
                                    </a>

                                </li>
                                <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update=""
                                        data-image="assets/img/product/productbig3.jpg"
                                        data-zoom-image="assets/img/product/productbig3.jpg">
                                        <img src="assets/img/product/productbig3.jpg" alt="zo-th-1" />
                                    </a>

                                </li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                  
                            <h1><a href="#">{{ $product->title }}</a></h1>
                            
                            <div class="price_box">
                                <span class="current_price">&#36;{{ $product->selling_price }}</span>
                            </div>
                            <div class="product_desc">
                                <p> {!! $product->description !!} </p>
                            </div>
                            
                            <div class="product_variant quantity">
                                <label>quantity</label>
                                <input min="1" max="{{ $product->stock }}" value="1" type="number">
                                <button class="button addToCartBtn" data-product-id="{{ $product->id }}"  type="submit">add to cart</button>

                            </div>
                            
                            <div class="product_meta">
                                <span>Category: <a href="{{ route('plantsProducts', ['category_slug' =>  $product->category->slug]) }}"> {{ $product->category->name }} </a></span>
                            </div>

                 
                        <div class="priduct_social">
                            <ul>
                                <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i>
                                        Like</a></li>
                                <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a>
                                </li>
                                <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i>
                                        save</a></li>
                                <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i>
                                        share</a></li>
                                <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i>
                                        linked</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product details end-->

    <!--product info start-->
    <div class="product_d_info mb-90">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">
                        <div class="product_info_button">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info"
                                        aria-selected="false">Description</a>
                                </li>
                              
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel">
                                <div class="product_info_content">
                                    <p>
                                        {!! $product->description !!}
                                    </p>
                                   
                                </div>
                            </div>
                           

                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product info end-->

@endsection

@push('scripts')



@endpush

