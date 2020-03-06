@extends('page.layout.page')
@section('title', 'Shop Home')
@section('style')
    <style>
        @media screen and (max-width: 1000px) {
            div.slider-infomation {
                display: none;
            }

            .footer-about-us {
                margin-top: 10px;
            }
        }

        .product-bit-title {
            display: none;
        }

        @media (min-width: 48em) {
            .nav-masthead {
                float: right;
            }
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
                        <a class="caption button-radius"
                           href="{{ route('page.show_product', $product->product_slug) }}">
                            <img src="{{ 'data:image/jpeg;base64,'.$product->product_image }}" alt="Slide"
                                 style="max-height: 600px; max-width: 600px">
                        </a>
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
                                            <a href="javascript:void(0)" id="{{'add_to_cart' . $product->product_id}}"
                                               class="add-to-cart-link" onclick="addToCard(this.id)"><i
                                                    class="fa fa-shopping-cart"></i> Add to cart</a>
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
                                        <input type="hidden" id="{{ 'price' . $product->product_id }}"
                                               value="{{ $product->product_price }}">
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
                            <a href="{{ route('page.category', 'iphone' ) }}"><img src="{{ asset('img/iphone.png') }}"
                                                                                   alt=""></a>
                            <a href="{{ route('page.category', 'samsung' ) }}"><img src="{{ asset('img/samsung.jpg') }}"
                                                                                    alt=""></a>
                            <a href="{{ route('page.category', 'oppo' ) }}"><img src="{{ asset('img/oppo.jpg') }}"
                                                                                 alt=""></a>
                            <a href="{{ route('page.category', 'huawei' ) }}"><img src="{{ asset('img/huawei.png') }}"
                                                                                   alt=""></a>
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

    {{--    modal success--}}
    <div class="modal fade" id="success" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close  " data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Awesome</h4>
                </div>
                <div class="modal-body text-center text-success">
                    <p>Added to cart.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    {{--    endmodal--}}
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
                    {{--$('.add-to-cart-link').click(function () {--}}
                    {{--    @if(!Auth::check())--}}
                    {{--        window.location.href="http://anhtanmobile.herokuapp.com/login"--}}
                    {{--        @else--}}
                    {{--            let id = $('.add-to-cart-link').attr('id').slice(11);--}}
                    {{--            let total_price =  parseInt($('.cart-amunt').text().slice(1));--}}
                    {{--            alert(id)--}}
                    {{--            alert(total_price)--}}
                    {{--            return $.ajax({--}}
                    {{--            method: 'get',--}}
                    {{--            url: 'shopping/ajaxaddproduct/' + id,--}}
                    {{--            contentType: 'application/json',--}}
                    {{--            dataType: 'json',--}}
                    {{--            success: function () {--}}
                    {{--               $('#success').modal();--}}
                    {{--               setTimeout(function () {--}}
                    {{--                   $('#success').modal('hide')},2000--}}
                    {{--               );--}}
                    {{--                // $('.modal-backdrop').remove();--}}
                    {{--                $('.cart-amunt').text('$ ' + formatNumber(array['total_price']));--}}
                    {{--                $('.product-count').text(array['total_qty']);--}}

                    {{--            }--}}
                    {{--        });--}}
                    {{--    @endif--}}

                    {{--});--}}

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

        let formatNumber = (num) => {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1 ')
        };

        let addToCard = (rowId) => {
            @if(!Auth::check())
                window.location.href = "http://anhtanmobile.herokuapp.com/login"
                @else
            let id = rowId.slice(11);
            let price = parseInt($('#price' + id).val());
            let total_price = parseInt($('.cart-amunt').text().slice(1));
            let product_count = parseInt($('.product-count').text()) + 1;
            return $.ajax({
                method: 'get',
                url: 'shopping/ajaxaddproduct/' + id,
                contentType: 'application/json',
                dataType: 'json',
                success: function () {

                    $('.cart-amunt').text('$' + formatNumber(price + total_price));
                    $('.product-count').text(product_count);
                    $('#success').modal('show');
                    setTimeout(function () {
                            $('#success').modal('hide')
                        }, 2000
                    );
                }
            });
            @endif
        }

    </script>
@endsection
