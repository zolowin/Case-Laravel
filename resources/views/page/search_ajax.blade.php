@foreach($products as $product)
    <div class="thubmnail-recent">
        <img src="{{ 'data:image/jpeg;base64,' . $product->product_image }}" class="recent-thumb" alt="">
        <h2><a href="{{ route('page.show_product', $product->product_slug) }}">{{ $product->product_name }}</a></h2>
        <div class="product-sidebar-price">
            <ins>Price : ${{ number_format($product->product_price, 0, ',', ' ') }}</ins>
            <del>${{ number_format($product->product_price * 1.10 , 0, ',', ' ') }}</del>
        </div>
    </div>
@endforeach
