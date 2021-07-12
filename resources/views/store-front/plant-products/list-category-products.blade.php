@extends('store-front.layout.master')

@section('main-content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3> {{ ucfirst($category->name) }} Plants</h3>
                        <ul>
                            <li><a href="/">home</a></li>
                            <li>{{ ucfirst($category->name) }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->
       <!--shop  area start-->
       <div class="shop_area shop_fullwidth mt-100 mb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">

                            <button data-role="grid_3" type="button" class=" btn-grid-3" data-toggle="tooltip"
                                title="3"></button>

                            <button data-role="grid_4" type="button" class="active btn-grid-4" data-toggle="tooltip"
                                title="4"></button>

                            <button data-role="grid_list" type="button" class="btn-list" data-toggle="tooltip"
                                title="List"></button>
                        </div>
                        <div class=" niceselect_option">
                            <form class="select_option" action="#">
                                <select name="orderby" id="short">

                                    <option selected value="1">Sort by average rating</option>
                                    <option value="2">Sort by popularity</option>
                                    <option value="3">Sort by newness</option>
                                    <option value="4">Sort by price: low to high</option>
                                    <option value="5">Sort by price: high to low</option>
                                    <option value="6">Product Name: Z</option>
                                </select>
                            </form>
                        </div>
                        <div class="page_amount">
                            <p>Showing 1–9 of 21 results</p>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <div class="row shop_wrapper grid_4">
                        @foreach($products as $product)
                        <div class="col-lg-3 col-md-4 col-12 ">
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
                                    <div class="product_content grid_content">
                                        <div class="product_price_rating">
                                         
                                            <h4 class="product_name"><a href="{{ route('plantsProductDetail', ['category_slug' => $product->category->slug, 'product_slug' => $product->slug]) }}">
                                                    {{ $product->title }}</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">${{ $product->selling_price }}</span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_content list_content">
                                       
                                        
                                        <h4 class="product_name"><a href="{{ route('plantsProductDetail', ['category_slug' => $product->category->slug, 'product_slug' => $product->slug]) }}"> {{ $product->title }} </a>
                                        </h4>
                                        <div class="price_box">
                                            <span class="current_price">${{ $product->selling_price }}</span>
                                           
                                        </div>
                                        <div class="product_desc">
                                            <p> {!!  $product->description !!} </p>
                                        </div>
                                        <div class="action_links list_action_right">
                                            <ul>
                                                <li class="add_to_cart addToCartBtn" data-product-id="{{ $product->id }}"> <a href="javascript:void(0)" title="Add to cart">Add to
                                                        cart</a></li>
                                             

                                            </ul>
                                        </div>
                                    </div>
                                </figure>
                            </article>
                        </div>
                        @endforeach
                    </div>

                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                            <ul>
                                <li class="current">1</li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="next"><a href="#">next</a></li>
                                <li><a href="#">>></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->
@endsection