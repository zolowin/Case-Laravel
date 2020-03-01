@extends('page.layout.page')
@section('title page', 'SHOP')
@section('title', 'SHOP')
@section('content')
    @if(isset($alert))
        <script type='text/javascript'>alert("{{ $alert }}");</script>;
    @endif
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-3 col-sm-6">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <a href="{{ route('page.show_product', $product->product_slug) }}"><img
                                        src="{{ 'data:image/jpeg;base64,'.$product->product_image }}"
                                        alt="{{ $product->product_name }}" style="width: 195px; height: 243px"></a>
                            </div>
                            <h2>
                                <a href="{{ route('page.show_product', $product->product_slug) }}">{{ $product->product_name }}</a>
                            </h2>
                            <div class="product-carousel-price">
                                <ins>${{ number_format($product->product_price, 0, ',', ' ') }}</ins>
                                <del>${{ number_format($product->product_price * 1.10 , 0, ',', ' ') }}</del>
                            </div>

                            <div class="product-option-shop">
                                <form action="{{ route('add.shopping.cart', $product->product_id) }}" method="post"
                                      class="cart">
                                    @csrf
                                    <div class="quantity">
                                        <input type="number" size="4" class="input-text qty text" title="Qty" value="1"
                                               name="quantity" min="1" step="1" style="height: 42px">
                                    </div>
                                    <button type="submit" class="add_to_cart_button"> Add to cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach


                <div class="row">
                    <div class="col-md-12">
                        <div class="product-pagination text-center">
                            <nav>
                                <ul class="pagination">
                                    {{ $products->render() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
