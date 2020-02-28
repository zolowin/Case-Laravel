@extends('page.layout.page')
@section('title', 'Shop Home')
@section('style')
    <style>
        @media screen and (max-width: 600px) {
            div.slider-infomation {
                display: none;
            }
        }

        .product-bit-title {
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="slider-area">
        <!-- Slider -->
        <div class="block-slider block-slider4">
            <ul class="" id="bxslider-home4">
                @foreach($slider_products as $product)
                    <li>
                        <img src="{{ 'data:image/jpeg;base64,'.$product->product_image }}" alt="Slide"
                             style="max-height: 600px; max-width: 600px">
                        <div class="caption-group slider-infomation">
                            <h2 class="caption title">
                                {{ $product->product_name }}
                            </h2>
                            <h4 class="caption subtitle">
                                <ins>${{ number_format($product->product_price, 0, ',', ' ') }}</ins>
                            </h4>
                            <a class="caption button-radius"
                               href="{{ route('page.show_product', $product->product_slug) }}"><span
                                    class="icon"></span>Shop now</a>
                        </div>
                    </li>
                @endforeach
            </ul>

        </div>
        <!-- ./Slider -->
    </div> <!-- End slider area -->

    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>30 Days return</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Free shipping</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Secure payments</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>New products</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->

    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Latest Products</h2>
                        <div class="product-carousel">
                            @foreach($latest_products as $product)
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="{{ 'data:image/jpeg;base64,'.$product->product_image }}"
                                             alt="product-image" style="width: 280px; height: 300px">
                                        <div class="product-hover">
                                            <a href="{{ route('page.show_product', $product->product_slug) }}"
                                               class="view-details-link"><i
                                                    class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2>
                                        <a href="{{ route('page.show_product', $product->product_slug) }}">{{ $product->product_name }}</a>
                                    </h2>

                                    <div class="product-carousel-price">
                                        <ins>${{ number_format($product->product_price, 0, ',', ' ') }}</ins>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->

    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            <a href="{{ route('page.category', 'iphone' ) }}"><img src="{{ asset('img/iphone.png') }}" alt=""></a>
                            <a href="{{ route('page.category', 'samsung' ) }}"><img src="{{ asset('img/samsung.jpg') }}" alt=""></a>
                            <a href="{{ route('page.category', 'oppo' ) }}"><img src="{{ asset('img/oppo.jpg') }}" alt=""></a>
                            <a href="{{ route('page.category', 'huawei' ) }}"><img src="{{ asset('img/huawei.png') }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->

    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Top Sellers</h2>
                        @foreach($topSell_product as $key => $product)
                            <div class="single-wid-product">
                                <a href="{{ route('page.show_product', $product->product_slug) }}"><img
                                        src="{{ 'data:image/jpeg;base64,'.$product->product_image }}" alt="Slide"
                                        style="height: 90px; width: 100px" class="product-thumb"></a>
                                <h2>
                                    <a href="{{ route('page.show_product', $product->product_slug) }}">{{ $product->product_name }}</a>
                                </h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                    <ins>${{ number_format($product->product_price, 0, ',', ' ') }}</ins>
                                    <del>${{ number_format($product->product_price * 1.10 , 0, ',', ' ') }}</del>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-md-4" id="product_view">
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Top New</h2>
                        @foreach($top_new as $product)
                            <div class="single-wid-product">
                                <a href="{{ route('page.show_product', $product->product_slug) }}"><img
                                        src="{{ 'data:image/jpeg;base64,'.$product->product_image }}" alt="Slide"
                                        style="height: 90px; width: 100px" class="product-thumb"></a>
                                <h2>
                                    <a href="{{ route('page.show_product', $product->product_slug) }}">{{ $product->product_name }}</a>
                                </h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                    <ins>${{ number_format($product->product_price, 0, ',', ' ') }}</ins>
                                    <del>${{ number_format($product->product_price * 1.10 , 0, ',', ' ') }}</del>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End product widget area -->
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('js/bxslider.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script.slider.js') }}"></script>
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function () {
                let products = localStorage.getItem('products');
                products = $.parseJSON(products)

                if (products.length > 0)
                    $.ajax({
                        url: 'api/recent-product',
                        method: "POST",
                        data: {product_id: products},
                        success: function (result) {
                            $("#product_view").html('').append(result)
                        }
                    });
            })
        })
    </script>
@endsection
