<div class="single-product-widget">
    <h2 class="product-wid-title">Recently Viewed</h2>
    <a href="#" class="wid-view-more">View All</a>
    @foreach($products as $product)
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

