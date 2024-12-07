@php use App\Models\BanglaText; @endphp
@extends('frontend.app')

@section('content')
    <div class="desktop home-menu">
        <div class="container-fluid-fluid">
            <div class="header-navbar">
                <div class="header-main-nav" style="box-shadow: 2px 5px 7px 0px #808080a6; margin-bottom: 30px;">
                    <!-- Start Mainmanu Nav -->
                    <div class="topnava">
                        <nav class="mainmenu-nav pe-5">
                            <ul class="mainmenu slick-mainmenu">
                                @foreach($cats as $cat)
                                    <li class="{{ $cat->subcats->count() >0? 'menu-item-has-children':'' }}">
                                        <a href="{{ route('front.subCategories',[$cat->url])}}">{{ $cat->name}}</a>
                                        @if($cat->subcats->count())
                                            <ul class="axil-submenu ">
                                                @foreach($cat->subcats as $sub)
                                                    <li>
                                                        <a href="{{ route('front.products.index')}}?category_id={{ $cat->id}}&sub_category_id={{ $sub->id}}">{{ $sub->name}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                    <!-- End Mainmanu Nav -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Mainmenu Area -->

    <main class="main-wrapper">
        <!-- Start Desktop Slider Area -->
        <div class="desktop-slide slider axil-main-slider-area main-slider-style-2">
            <div class="container-fluid">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($sliders as $key=>$s)
                            <div class="carousel-item  {{ $key==0 ?'active':''}}">
                                <a href="{{$s->link}}">
                                    <img src="{{ getImage('sliders', $s->image) }}" class="d-block w-100" alt="..."/>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- End Slider Area -->

        <!-- Start Mobile Slider Area -->
        <div class="mobile-slide slider axil-main-slider-area main-slider-style-2" style="padding-top: 18px;">
            <div class="container-fluid">
                <div id="McarouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($sliders as $key=>$s)
                            <div class="carousel-item  {{ $key==0 ?'active':''}}">
                                <a href="{{$s->link}}">
                                    <img src="{{ getImage('sliders', $s->mobile_image) }}" style="display:none"
                                         class="d-block w-100" alt="..."/>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- End Slider Area -->

        <!-- Start Axil Newsletter Area  -->
        @foreach($images as $im)
            @if($im->section=='3')
                <div class="desktop-slide recommended axil-newsletter-area pt--10">
                    <div class="container-fluid">
                        <div class="etrade-newsletter-wrapper bg_image">
                            <div class="newsletter-content">
                                <a href="{{$im->link}}">
                                    <img src="{{ getImage('homeimages', $im->image) }}" class="d-block w-100"
                                         style="height: 125px;" alt="..."/>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mobile-slide recommended axil-newsletter-area pt--10">
                    <div class="container-fluid">
                        <div class="etrade-newsletter-wrapper bg_image">
                            <div class="newsletter-content">
                                <a href="{{$im->link}}">
                                    <img src="{{ getImage('homeimages', $im->mobile_image) }}" class="d-block w-100"
                                         style="height: 80px;" alt="..."/>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        <!-- End Axil Newsletter Area  -->
        <div class="mobile-gap-trending"></div>


        <!-- New Featured Product Area  -->
        <div class="axil-product-area bg-color-white pt--10">
            <div class="container-fluid featured-products-container" style="position: relative;">
                <button class="slide-arrow prev"><i class="fal fa-long-arrow-left"></i></button>
                <button class="slide-arrow next"><i class="fal fa-long-arrow-right"></i></button>
                <h4>Featured Products</h4>
                <div id="featured-products" class="row">
                    @foreach($featuredProducts as $product)
                        @php
                            $data = getProductInfo($product);
                            $bangla_text = BanglaText::first();
                        @endphp
                        <div class="axil-product product-style-one col-lg-4 mx-1" style="padding: 0px !important;">
                            <div class="thumbnail" style="padding: 10px !important">
                                <a href="{{ route('front.products.show',[$product->id])}}">
                                    <img src="{{ getImage('products', $product->image)}}" class="product_img"
                                         alt="Product Images">
                                </a>

                                @if($product->discount_type)
                                    <div class="label-block label-right">
                                        <div class="product-badget"
                                             style="background: #fca204;">{{$product->discount_type=='fixed'?'':''}}{{$product->discount}} {{$product->discount_type=='fixed'?'':'%'}}
                                            Off
                                        </div>
                                    </div>
                                @endif
                                <div class="product-hover-action">
                                    <ul class="cart-action d-none">
                                        <li class="quickview">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                        </li>
                                        <li class="wishlist">
                                            <a href="wishlist.php"><i class="far fa-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content" style="padding: 10px !important;">
                                <div class="inner">
                                    <h5 class="title text-start"><a
                                            href="{{ route('front.products.show',[$product->id])}}">{{ \Illuminate\Support\Str::limit($product->name, 15) }}</a>
                                    </h5>
                                    <div class="product-price-variant text-start">
                                        <span class="price current-price" style="color: #a8b6e1">
                                            {{ $currencySymbol . $data['old_price'] }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End Featured Product Area  -->


        <!-- New Arrivals Product Area  -->
        <div class="axil-product-area bg-color-white pt--10">
            <div class="container">

                <a class="viewall-right" href="{{ route('front.products.index')}}">
                    <span class="title-highlighter view all highlighter-primary"> View All >></span>
                </a>
                <div class="section-title-wrapper">
                    <h2 class="title">New Arrivals</h2>
                </div>

                <div
                    class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                    <div class="slick-single-layout" id="trending_data">

                    </div>
                    <!-- End .slick-single-layout -->
                </div>

            </div>
        </div>
        <!-- End New Arrivals Product Area  -->

        <div class="mobile-gap-recommended"></div>

        <!-- Start Explore Product Area  -->
        <div class="axil-product-area bg-color-white pt--10">
            <div class="container">
                <a class="viewall-right" href="{{ route('front.products.index')}}"><span
                        class="title-highlighter view all highlighter-primary"> View All <span
                            class="visualy"> >> </span></span></a>
                <div class="section-title-wrapper">
                    <h2 class="title">Recommended Product</h2>
                </div>

                <div
                    class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                    <div class="slick-single-layout" id="recommended_data">

                    </div>
                    <!-- End .slick-single-layout -->
                </div>
            </div>
        </div>
        <!-- End Expolre Product Area  -->


        <!--
        @foreach($images as $im)
            @if($im->section=='2')
                <div class="desktop-slide hot-deals axil-newsletter-area pt--10">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="etrade-newsletter-wrapper bg_image">
                                <div class="newsletter-content">
                                      <a href="{{$im->link}}">
                    <img src="{{ getImage('homeimages', $im->image) }}" class="d-block w-100" style="height: 125px;" alt="..." />
                  </a>
                </div>
            </div>
            </div>
        </div>
    </div>

</div>

<div class="mobile-slide hot-deals axil-newsletter-area pt--10">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="etrade-newsletter-wrapper bg_image">
                <div class="newsletter-content">
                  	<a href="{{$im->link}}">
                    <img src="{{ getImage('homeimages', $im->mobile_image) }}" class="d-block w-100" style="height: 80px;" alt="..." />
                  </a>
                </div>
            </div>
            </div>
        </div>
    </div>
    -->
                </div>
            @endif
        @endforeach
        <!-- End Image Area  -->


        <!-- Recommended Product Area  -->
        <div class="axil-product-area bg-color-white pt--10">
            <div class="container">
                <a class="viewall-right" href="{{ route('front.discountProduct')}}"><span
                        class="title-highlighter view all highlighter-primary"> View All >></span></a>
                <div class="section-title-wrapper">
                    <h2 class="title">Best Offers</h2>
                </div>
                <div class="hotdeal-data" style="padding-top:12px">
                    <div
                        class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide"
                        id="hotdeal_data">
                    </div>
                </div>

            </div>
        </div>
        <!-- End Recommended Product Area  -->


        <!-- Start Image Area  -->
        @foreach($images as $im)
            @if($im->section=='1')
                <div class="desktop-slide trending axil-newsletter-area pt--10">
                    <div class="container-fluid">
                        <div class="etrade-newsletter-wrapper bg_image">
                            <div class="newsletter-content">
                                <a href="{{$im->link}}">
                                    <img src="{{ getImage('homeimages', $im->image) }}" class="d-block w-100"
                                         style="height: 125px;" alt="..."/>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End .container-fluid -->
                </div>

                <div class="mobile-slide trending axil-newsletter-area pt--10">
                    <div class="container-fluid">
                        <div class="etrade-newsletter-wrapper bg_image">
                            <div class="newsletter-content">
                                <a href="{{$im->link}}">
                                    <img src="{{ getImage('homeimages', $im->mobile_image) }}" class="d-block w-100"
                                         style="height: 80px;" alt="..."/>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
        @endforeach
        <!-- End Image Area  -->

        <!-- Start Image Area  -->
        @foreach($images as $im)
            @if($im->section=='4')
                <div class="desktop-slide top-brands axil-newsletter-area pt--10 pb-6">
                    <div class="container-fluid">
                        <div class="etrade-newsletter-wrapper bg_image">
                            <div class="newsletter-content">
                                <a href="{{$im->link}}">
                                    <img src="{{ getImage('homeimages', $im->image) }}" class="d-block w-100"
                                         style="height: 125px;" alt="..."/>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End .container-fluid -->
                </div>

                <div class="mobile-slide top-brands axil-newsletter-area pt--10 pb-6">
                    <div class="container-fluid">
                        <div class="etrade-newsletter-wrapper bg_image">
                            <div class="newsletter-content">
                                <a href="{{$im->link}}">
                                    <img src="{{ getImage('homeimages', $im->mobile_image) }}" class="d-block w-100"
                                         style="height: 80px;" alt="..."/>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End .container-fluid -->
                </div>

            @endif
        @endforeach
        <!-- End Image Area  -->

        <!-- Start Brand Area  -->
        <div class="brand bg-color-white" style="margin-top: -15px;">
            <div class="container">
                <h2 class="title">Brand</h2>

                <div class="row pt-5">
                    @foreach($brands as $item)
                        <div class="col-6 col-sm-4 col-lg-2">
                            <a title="{{$item->name}}"
                               href="{{ route('front.products.index')}}?brand_id={{ $item->id}}" class="cat-block">
                                <figure>
                        <span>
                            <img style="padding: 10px;" src="{{ getImage('types', $item->image)}}"/>
                        </span>
                                </figure>
                            </a>
                        </div>
                    @endforeach
                    <!-- End .col-sm-4 col-lg-2 -->
                </div>
            </div>
        </div>
        <!-- End Brand Area  -->

    </main>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            getTrending();
            getHotDeal();
            getRecommended();

            function getTrending() {
                let url = '{{ route("front.trendingProduct")}}';
                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {},
                    dataType: "JSON",
                    success: function (res) {
                        if (res.success) {
                            $('div#trending_data').html(res.html);
                        }
                    }
                });
            }

            function getHotDeal() {
                let url = '{{ route("front.hotdealProduct")}}';
                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {},
                    dataType: "JSON",
                    success: function (res) {
                        if (res.success) {
                            $('div#hotdeal_data').html(res.html);
                        }
                    }
                });
            }

            function getRecommended() {
                let url = '{{ route("front.recommendedProduct")}}';
                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {},
                    dataType: "JSON",
                    success: function (res) {
                        if (res.success) {
                            $('div#recommended_data').html(res.html);
                        }
                    }
                });
            }
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#featured-products').slick({
                infinite: true,
                slidesToShow: 5,
                slidesToScroll: 5,
                arrows: true,
                dots: true,
                autoplay: false,
                mobileFirst:true,
                accessibility: false,
                speed: 1000,
                prevArrow: $('.featured-products-container .prev'),
                nextArrow: $('.featured-products-container .next'),
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 5,
                            slidesToScroll: 5,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4
                        }
                    },
                    {
                        breakpoint: 400,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>

@endpush

@push("css")
    <style>
        .topnava {
            background-color: #f85506;
            color: white;
        }

        .topnava a {
            color: white;
            text-align: center;
            padding: 7px 7px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnava a:hover {
            background-color: #8d0033;
            color: white;
        }

        .mainmenu > .menu-item-has-children > a::after {
            color: #ffffff;
        }

        .header-main-nav .mainmenu-nav .mainmenu > li > a {
            color: #fff;
        }

        .mainmenu > .menu-item-has-children .axil-submenu li a:hover {
            color: #ffffff;
        }
    </style>
    <style type="text/css">
        .featured-products-container .prev {
            position: absolute;
            top: 50%;
            left: 0px;
            padding: 10px;
            border-radius: 50%;
            display: inline-block;
            width: auto;
            z-index: 10;
            background: #ffffff;
            border: 3px solid #00000030;
        }

        .featured-products-container .next {
            position: absolute;
            top: 50%;
            right: 0px;
            padding: 10px;
            border-radius: 50%;
            display: inline-block;
            width: auto;
            z-index: 10;
            background: #ffffff;
            border: 3px solid #00000030;
        }
    </style>
@endpush




