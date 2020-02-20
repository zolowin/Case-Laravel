@extends('page.layout.page')
@section('title','Cart')
@section('title page', 'Your Cart')
@section('content')

    @if(Session::has('flash'))
        <div class="alert alert-danger text-center" role="alert">
            <h2>{{ session::get('flash') }}</h2>
        </div>
    @endif
    <div class="container" style="margin-bottom: 5px; margin-top: 15px">
        <a href="{{ route('destroy.shopping.cart') }}" class="btn btn-danger" style="margin-bottom: 10px; float: right">Remove
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
            <?php $i = 1 ?>
            @foreach($products as $key => $product)
{{--                {{ dd(Cart::remove($product->rowId) )}}--}}
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td><a href="{{ route('page.show_product', $product->options->slug) }}">{{ $product->name }}</a>
                    </td>
                    <td class="text-center"><img src="{{ 'data:image/jpeg;base64,'.$product->options->image }}"
                                                 alt="Slide" style="height: 120px; width: 120px"></td>
                    <td>${{ number_format($product->price, 0,',','.') }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>${{ number_format($product->qty * $product->price, 0, ',', ' ') }}</td>
                    <td>
                        <a href="" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                        &emsp;
                        <a href="{{ route('remove.shopping.cart', $product->rowId) }}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="container text-center" style="margin-bottom: 20px">
        <h2 class="font-weight-bold d-inline">Total cost is <span class="text-success">${{ Cart::subtotal(0,',',' ') }}</span></h2>
        <a href="{{ route('checkout.shopping') }}" class="btn btn-success btn-lg d-inline" style="float: right">Check Out</a>
    </div>

    {{--    modal--}}
    <div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="update">
                        @csrf
                        <div class="form-group">
                            <label for="category_name" class="col-form-label">Category Name:</label>
                            <input type="text" class="form-control" id="category_name">
                            <input type="hidden" id="category_id">

                        </div>
                        <div class="form-group">
                            <label for="category_alias" class="col-form-label">Category Alias:</label>
                            <input type="text" class="form-control" id="category_alias">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-target="#editCategory" onclick="update()">
                        Update
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#editCategory').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var category_id = button.data('category_id');
            var category_name = $(`#category_name_${category_id}`).html();
            var category_alias = $(`#category_alias_${category_id}`).html();

            var modal = $(this);
            modal.find('.modal-title').text('Edit ' + category_name);
            modal.find('#category_name').val(category_name);
            modal.find('#category_alias').val(category_alias);
            modal.find('#category_id').val(category_id);

        });

        function update() {
            var category_id = $('#category_id').val();
            var category_name = $('#category_name').val();
            var category_alias = $('#category_alias').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: `../../admin/category/${category_id}`,
                method: 'PUT',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    category_id: category_id,
                    category_name: category_name,
                    category_alias: category_alias
                },
                success: function (result) {
                    var data = result['data'];
                    $('#editCategory').modal('hide');
                    $(`#category_name_${data.category_id}`).replaceWith(
                        `<td id="category_name_${data.category_id}">${data.category_name}</td>`);
                    $(`#category_alias_${data.category_id}`).replaceWith(
                        `<td id="category_alias_${data.category_id}">${data.category_alias}</td>`);
                },
                error: function () {
                    alert(category_name);
                }
            });
        }
    </script>
@endsection
