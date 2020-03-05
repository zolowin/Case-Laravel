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
            <input id="productsId" type='hidden' value={{json_encode($productsId)}}>
            @foreach($products as $key => $product)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td><a href="{{ route('page.show_product', $product->options->slug) }}">{{ $product->name }}</a>
                    </td>
                    <td class="text-center"><img src="{{ 'data:image/jpeg;base64,'.$product->options->image }}"
                                                 alt="Slide" style="height: 120px; width: 120px"></td>
                    <input id="{{'price' . $product->id}}" type="hidden" value="{{$product->price}}">
                    <input id="{{'rowId' . $product->id}}" type="hidden" value="{{$product->rowId}}">
                    <td><p class="text-right">${{ number_format($product->price, 0,',','.') }}</p></td>
                    <td>
                        <input id="{{'qty' . $product->id}}" type="number" class="input-text qty text" title="Qty" value="{{ $product->qty }}"
                               name="quantity" min="1" step="1" style="height: 35px; width: 100px;" onchange="changeQty(this.id); updateCart(this.id)">
                        <p style="color: red; font-size: 12px" id="{{'qty_error' . $product->id}}"></p>
                    </td>
                    <td><p class="text-right" id="{{'total'. $product->id}}" >${{ number_format($product->qty * $product->price, 0, ',', ' ') }}</p></td>
                    <td>&emsp;
                        <a href="{{ route('remove.shopping.cart', $product->rowId) }}" class="btn btn-danger" title="Delete"
                           onclick="return(confirm('Are you sure delete this?'))"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            @endif
        </table>
    </div>
    <div class="container text-center" style="margin-bottom: 20px">
        <h2 class="font-weight-bold d-inline">Total cost is <span class="text-success cart-amunt">${{ Cart::subtotal(0,',',' ') }}</span></h2>
        <a href="{{ route('checkout.shopping') }}" class="btn btn-success btn-lg d-inline" style="float: right">Check Out</a>
    </div>
@endsection
@section('script')
    <script>
        var formatNumber = (num) => {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1 ')
        };

        var changeQty = (rowId) => {
            id = rowId.slice(3);
            price = $('#price' + id).val();
            qty = parseInt($('#' + rowId).val());
            if(qty < 1 || isNaN(qty)){
                $('#qty_error' + id).text('Quantity must greater than 1');
                $('#total' + id).text('$ ' + '0');
            }
            else{
                $('#qty_error' + id).text('');
                $('#total' + id).text('$'+ price * qty);
            }
        }

        var updatePriceAndQty = () => {
            ids = JSON.parse($('#productsId').val());
            total_price = 0;
            total_qty = 0;
            $.each(ids, (key, value) => {
                total_price += parseInt($('#total' + value).text().slice(1));
                total_qty += parseInt($('#qty' + value).val());
            });

            return {total_price, total_qty};
        }

        var updateCart = (rowId) => {
            id = rowId.slice(3);
            rowId_Product = $('#rowId' + id).val();

            array = updatePriceAndQty();

            $('.cart-amunt').text('$ ' + formatNumber(array['total_price']));
            $('.product-count').text(array['total_qty']);

            return $.ajax({
                method: 'get',
                url: 'ajaxadd/' + id + '/' + qty + '/' + rowId_Product,
                contentType: 'application/json',
                dataType: 'json'
            });
        };


        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
@endsection
