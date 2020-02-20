@extends('page.layout.page')
@section('title', $product->product_name)
@section('title page', "Product $product->product_name")
@section('content')
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Search Products</h2>
                    <form action="" method="post">
                        @csrf
                        <input type="text" placeholder="Search products...">
                        <input type="submit" value="Search">
                    </form>
                </div>

                <div class="single-sidebar">
                    <h2 class="sidebar-title">Products</h2>
{{--                    dùng ajax--}}
                    <div class="thubmnail-recent">
                        <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                        <h2><a href="">Sony Smart TV - 2015</a></h2>
                        <div class="product-sidebar-price">
                            <ins>$700.00</ins>
                            <del>$100.00</del>
                        </div>
                    </div>
                    <div class="thubmnail-recent">
                        <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                        <h2><a href="">Sony Smart TV - 2015</a></h2>
                        <div class="product-sidebar-price">
                            <ins>$700.00</ins>
                            <del>$100.00</del>
                        </div>
                    </div>
                    <div class="thubmnail-recent">
                        <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                        <h2><a href="">Sony Smart TV - 2015</a></h2>
                        <div class="product-sidebar-price">
                            <ins>$700.00</ins>
                            <del>$100.00</del>
                        </div>
                    </div>
                    <div class="thubmnail-recent">
                        <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                        <h2><a href="">Sony Smart TV - 2015</a></h2>
                        <div class="product-sidebar-price">
                            <ins>$700.00</ins>
                            <del>$100.00</del>
                        </div>
                    </div>
                </div>

                <div class="single-sidebar">
                    <h2 class="sidebar-title">Recent Posts</h2>
                    <ul>
                        <li><a href="">Sony Smart TV - 2015</a></li>
                        <li><a href="">Sony Smart TV - 2015</a></li>
                        <li><a href="">Sony Smart TV - 2015</a></li>
                        <li><a href="">Sony Smart TV - 2015</a></li>
                        <li><a href="">Sony Smart TV - 2015</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="product-breadcroumb">
                        <a href="{{ route('page.index') }}">Home</a>
                        <a href="">{{ $category_name }}</a>
                        <a href="">{{ $product->product_name }}</a>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="product-images">
                                <div class="product-main-img">
                                    <img src="{{ 'data:image/jpeg;base64,'.$product->product_image }}" alt="Slide" style="max-height: 600px; max-width: 400px">
                                </div>

                                <div class="product-gallery">
                                    <img src="img/product-thumb-1.jpg" alt="">
                                    <img src="img/product-thumb-2.jpg" alt="">
                                    <img src="img/product-thumb-3.jpg" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="product-inner bg-warning">
                                <h2 class="product-name text-center text-danger">{{ $product->product_name }}</h2>
                                <div class="product-inner-price">
                                    <ins>Price : ${{ number_format($product->product_price, 0, ',', ' ') }}</ins>
                                    <del>${{ number_format($product->product_price * 1.10 , 0, ',', ' ') }}</del>
                                </div>
                                <div class="product-inner-price ml-5">
                                    <ins>Chipset : {{ $product->product_chip }}</ins>
                                </div>
                                <div class="product-inner-price">
                                    <ins>Screen : {{ $product->product_screen }} inchs</ins>
                                </div>
                                <div class="product-inner-price">
                                    <ins>RAM : {{ $product->product_ram }} GB</ins>
                                </div>
                                <div class="product-inner-price">
                                    <ins>Battery : {{ $product->product_battery }} mAh</ins>
                                </div>
                                <div class="product-inner-price">
                                    <ins>Camera Resolution : {{ $product->product_camera_resolution }} MP</ins>
                                </div>
                                <div class="product-inner-price">
                                    <ins>Color : {{ $product->product_color }}</ins>
                                </div><div class="product-inner-price">
                                    <ins>Salient Features : {{ $product->product_feature }}</ins>
                                </div>
                                <div class="product-inner-price">
                                    <ins>Operating System : {{ $product->product_operating_system }}</ins>
                                </div>
                                <div class="product-inner-price">
                                    <ins>Origin : {{ $product->product_origin }}</ins>
                                </div>
                                <div class="product-inner-price">
                                    <ins>Made Year : {{ $product->product_year_made }}</ins>
                                </div>

                                <form action="" class="cart">
                                    @csrf
                                    <div class="quantity">
                                        <input type="number" size="4" class="input-text qty text" title="Qty" value="1"
                                               name="quantity" min="1" step="1">
                                    </div>
                                    <a href="{{ route('add.shopping.cart', $product->product_id) }}" class="add_to_cart_button"> Add to cart</a>
                                </form>

                                <div role="tabpanel">
                                    <ul class="product-tab" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home"
                                                                                  role="tab" data-toggle="tab">Description</a>
                                        </li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab"
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
                                                <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                <p><label for="email">Email</label> <input name="email" type="email">
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
                                                <p><label for="review">Your review</label> <textarea name="review" id=""
                                                                                                     cols="30"
                                                                                                     rows="10"></textarea>
                                                </p>
                                                <p><input type="submit" value="Submit"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-inner-category">
                                    <p>Category: <a href="{{ route('page.category') }}">{{ $category_name }}</a>. Tags: <a href="">awesome</a>, <a
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
                                        <a href="{{ route('add.shopping.cart', $product->product_id) }}" class="aadd-to-cart-link">
                                            <i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="{{ route('page.show_product', $product->product_slug) }}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>

                                <h2><a href="{{ route('page.show_product', $product->product_slug) }}">{{ $product->product_name }}</a></h2>

                                <div class="product-carousel-price">
                                    <ins>${{ number_format($product->product_price, 0, ',', ' ') }}</ins>
                                    <del>${{ number_format($product->product_price * 1.10 , 0, ',', ' ') }}</del>
                                </div>
                            </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
