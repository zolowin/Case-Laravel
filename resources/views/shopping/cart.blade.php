@extends('page.layout.page')
@section('title','Cart')
@section('title page', 'Your Cart')
@section('content')

    @if(Session::has('alertErr'))
        <div class="container alert alert-danger text-center" role="alert">
            <h2>{{ session::get('alertErr') }}</h2>
        </div>
    @endif
    @if(Session::has('success'))
        <div class="container alert alert-success text-center" role="alert">
            <h2>{{ session::get('success') }}</h2>
        </div>
    @endif
    <div class="container" style="margin-bottom: 5px; margin-top: 15px">
        <a href="{{ route('destroy.shopping.cart') }}" class="btn btn-danger" style="margin-bottom: 10px; float: right"
            onclick="confirm('Are you sure remove all?')">Remove
            all cart</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Price</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($products))
            <?php $i = 1 ?>
            @foreach($products as $key => $product)
{{--                {{ dd(Cart::remove($product->rowId) )}}--}}
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td><a href="{{ route('page.show_product', $product->options->slug) }}">{{ $product->name }}</a>
                    </td>
                    <td class="text-center"><img src="{{ 'data:image/jpeg;base64,'.$product->options->image }}"
                                                 alt="Slide" style="height: 120px; width: 120px"></td>
                    <td><p class="text-right">${{ number_format($product->price, 0,',','.') }}</p></td>
                    <td>
                        <input type="number" size="4" class="input-text qty text" title="Qty" value="{{ $product->qty }}"
                               name="quantity" min="1" step="1" style="height: 35px; width: 100px;" onkeyup="changeQty()">
                        <button type="submit" class="btn btn-primary" id='update_cart' title="update" style="height: 36px"><i class="fa fa-save"></i></button>
                    </td>
                    <td><p class="text-right" id="total" >${{ number_format($product->qty * $product->price, 0, ',', ' ') }}</p></td>
                    <td>&emsp;
                        <a href="{{ route('remove.shopping.cart', $product->rowId) }}" class="btn btn-danger" title="Delete"
                           onclick="confirm('Are you sure delete this?')"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            @endif
        </table>
    </div>
    <div class="container text-center" style="margin-bottom: 20px">
        <h2 class="font-weight-bold d-inline">Total cost is <span class="text-success">${{ Cart::subtotal(0,',',' ') }}</span></h2>
        <a href="{{ route('checkout.shopping') }}" class="btn btn-success btn-lg d-inline" style="float: right">Check Out</a>
    </div>
@endsection
@section('script')
    <script>
        function changeQty() {
            let qty = parseInt($('.qty').val());

            $('.qty').text(222);
        }
    </script>
@endsection
