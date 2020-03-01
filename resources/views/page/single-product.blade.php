@extends('page.layout.page')
@section('title', $product->product_name)
@section('title page', "$product->product_name")
@section('content')
    <div class="single-product-area" id="content_product" data-id="{{ $product->product_id }}">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="{{ 'data:image/jpeg;base64,'.$product->product_image }}" alt="Slide"
                                             style="max-height: 600px; max-width: 400px">
                                        <div class="product-inner-price text-center" style="margin-left: 10px">
                                            <h3 ><span class="text-primary">${{ number_format($product->product_price, 0, ',', ' ') }}</span>
                                                <del>
                                                    ${{ number_format($product->product_price * 1.10 , 0, ',', ' ') }}</del>
                                            </h3>
                                        </div>
                                        <div class="text-center">
                                            <p class="font-weight-bold">Color : {{ $product->product_color }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 bg-warning">
                                <div class="product-inner" style="margin-top: 15px">
                                    <h2 class="product-name text-center text-danger">{{ $product->product_name }}.</h2>
                                    <div class="product-inner-price ml-5">
                                        <ins>Operating System : {{ $product->product_operating_system }}.</ins>
                                    </div>
                                    <div class="product-inner-price">
                                        <ins>Processor : {{ $product->product_chip }}.</ins>
                                    </div>
                                    <div class="product-inner-price">
                                        <ins>Memory : {{ $product->product_ram }} GB.</ins>
                                    </div>
                                    <div class="product-inner-price">
                                        <ins>Storage : {{ $product->product_storage }} GB.</ins>
                                    </div>
                                    <div class="product-inner-price">
                                        <ins>Camera Resolution : {{ $product->product_camera_resolution }} MP.</ins>
                                    </div>
                                    <div class="product-inner-price">
                                        <ins>Battery : {{ $product->product_battery }}.</ins>
                                    </div>

                                    <div class="product-inner-price">
                                        <ins>Display Size : {{ $product->product_screen }}".</ins>
                                    </div>
                                    <div class="product-inner-price">
                                        <ins>Salient Features : {{ $product->product_feature }}.</ins>
                                    </div>
                                    <div class="product-inner-price">
                                        <ins>Origin : {{ $product->product_origin }}.</ins>
                                    </div>
                                    <div class="product-inner-price">
                                        <ins>Made Year : {{ $product->product_year_made }}.</ins>
                                    </div>
                                    <div class="product-inner-price">
                                        <ins>Weight : {{ $product->product_weight }} oz.</ins>
                                    </div>
                                    <form action="{{ route('add.shopping.cart', $product->product_id) }}" method="post"
                                          class="cart">
                                        @csrf
                                        <div class="quantity">
                                            <input type="number" size="4" class="qty" style="font-size: 20px"
                                                   title="Qty"
                                                   value="1"
                                                   name="quantity" min="1" step="1">
                                        </div>
                                        <button type="submit" class="add_to_cart_button"> Add to cart</button>
                                    </form>
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home"
                                                                                      role="tab" data-toggle="tab">Description</a>
                                            </li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile"
                                                                       role="tab"
                                                                       data-toggle="tab">Reviews</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>
                                                {!! $product->product_describes !!}
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                {{--                                            dùng ajax--}}
                                                <h2>Reviews</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">Name</label> <input name="name" type="text">
                                                    </p>
                                                    <p><label for="email">Email</label> <input name="email"
                                                                                               type="email">
                                                    </p>
                                                    <div class="rating-chooser">
                                                        <p>Your rating</p>

                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">Your review</label> <textarea name="review"
                                                                                                         id=""
                                                                                                         cols="30"
                                                                                                         rows="10"></textarea>
                                                    </p>
                                                    <p><input type="submit" value="Submit"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-inner-category">
                                        {{--                                        <p>Category: <a href="{{ route('page.category') }}">{{ $category_name }}</a>.--}}
                                        Tags: <a href="">awesome</a>, <a
                                            href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>. </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Related Products</h2>
                            <div class="related-products-carousel">
                                @foreach($related_products as $product)
                                    <div class="single-product">
                                        <div class="product-f-image">
                                            <img src="{{ 'data:image/jpeg;base64,'.$product->product_image }}" alt="">
                                            <div class="product-hover">
                                                {{--                                                <a href="{{ route('add.shopping.cart', $product->product_id) }}"--}}
                                                {{--                                                   class="aadd-to-cart-link">--}}
                                                {{--                                                    <i class="fa fa-shopping-cart"></i> Add to cart</a>--}}
                                                <a href="{{ route('page.show_product', $product->product_slug) }}"
                                                   class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                            </div>
                                        </div>

                                        <h2>
                                            <a href="{{ route('page.show_product', $product->product_slug) }}">{{ $product->product_name }}</a>
                                        </h2>

                                        <div class="product-carousel-price">
                                            <ins>${{ number_format($product->product_price, 0, ',', ' ') }}</ins>
                                            <del>
                                                ${{ number_format($product->product_price * 1.10 , 0, ',', ' ') }}</del>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        @foreach($latest_products as $product)
                            <div class="thubmnail-recent">
                                <img src="{{ 'data:image/jpeg;base64,' . $product->product_image }}"
                                     class="recent-thumb" alt="">
                                <h2>
                                    <a href="{{ route('page.show_product', $product->product_slug) }}">{{ $product->product_name }}</a>
                                </h2>
                                <div class="product-sidebar-price">
                                    <ins>Price : ${{ number_format($product->product_price, 0, ',', ' ') }}</ins>
                                    <del>${{ number_format($product->product_price * 1.10 , 0, ',', ' ') }}</del>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        //luu slug san pham vao storage
        let idProduct = $("#content_product").attr('data-id');
        //lay gia tri storage
        let products = localStorage.getItem('products');
        let maxelements = 3;

        if (products == null) {
            arrayProduct = new Array();
            arrayProduct.unshift(idProduct)
            localStorage.setItem('products', JSON.stringify(arrayProduct))
        } else {
            //chuyen ve mang
            products = $.parseJSON(products)

            if (products.indexOf(idProduct) == -1 && products.length < maxelements) {
                products.unshift(idProduct);
                localStorage.setItem('products', JSON.stringify(products))
            } else if (products.indexOf(idProduct) == -1 && products.length == maxelements) {
                products.pop();
                products.unshift(idProduct);
                localStorage.setItem('products', JSON.stringify(products))
            }
        }
    </script>
@endsection
