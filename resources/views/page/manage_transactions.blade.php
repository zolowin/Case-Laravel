@extends('page.layout.page')
@section('title','Manage Transactions')
@section('title page', 'Manage Your Transactions')
@section('content')
    <div class="container" style="margin-top: 10px">
        <div class="card" id="manage-transaction">
            <div class="card-body">
                <table class="table table-bordered" id="tr-user-table">
                    <thead class="thead-dark text-center">
                    <tr>
                        <th>Transaction Code</th>
                        <th>Order Date</th>
                        <th>Product</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction)
                        <tr>
                            <td>TR{{ Auth::user()->id . $transaction->id }}</td>
                            <td>{{ $transaction->created_at }}</td>
                            <td>
                                @foreach($transaction->orders as $item)
                                    <ul>
                                        <li class="d-inline font-weight-bold">{{ $item->product->product_name }}</li>
                                        <li class="d-inline font-italic"> : {{ $item->or_qty }} item</li>
                                    </ul>
                                    @endforeach
                            </td>
                            <td><p class="text-right">${{ number_format($transaction->tr_total_price, 0, ',', ' ') }}</p></td>
                            <td class="tr_status">
                                @if ($transaction->tr_status === 0)
                                    <p class="text-primary">Shipping</p>
                                @elseif ($transaction->tr_status === 1)
                                    <p class="text-danger">Canceled</p>
                                @else
                                    <p class="text-success">Finished </p>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary edit-transaction ml-2" data-toggle="modal"
                                        data-target="#edit-transaction" data-id="{{$transaction->id}}"><i
                                        class="fa fa-edit"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="edit-transaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Transactions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="form-transaction" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row justify-content-center">
                                    <div class="form-group col-md-12">
                                        <label><strong>Recipient's Name</strong> <small class="text-danger">*</small></label>
                                        <input type="text" id="tr_user_name" name="tr_user_name" class="form-control">
                                        <input type="hidden" id="id" name="id" value="">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label><strong>Address</strong> <small class="text-danger">*</small></label>
                                        <input type="text" id="tr_address" name="tr_address" class="form-control">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label><strong>City</strong> <small class="text-danger">*</small></label>
                                        <input type="text" id="tr_city" name="tr_city" class="form-control">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label><strong>Phone</strong> <small class="text-danger">*</small></label>
                                        <input type="text" id="tr_phone" name="tr_phone" class="form-control">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label><strong>Status</strong> <small class="text-danger">*</small></label>
                                        <select class="form-control" name="tr_status" id="tr_status">
                                            <option value="0">Shipping</option>
                                            <option value="1">Canceled</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label><strong>Note</strong> <small class="text-danger">*</small></label>
                                        <input type="text" id="tr_note" name="tr_note" class="form-control">
                                    </div>
                                </div>

                                <div class="form-row justify-content-center">
                                    <div class="form-group col-sm-12">
                                        <hr/>
                                        <button type="reset" class="btn btn-outline-primary"><i
                                                class="fa fa-refresh"></i>
                                            Reset
                                        </button>
                                        <button type="submit" class="btn btn-primary btn-submit" name="action_button"
                                                id="action_button"><i class="fa fa-save"></i>
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).on('click', '.edit-transaction', function () {
            let id = $(this).data('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: `../shopping/edit-transaction/${id}`,
                success: function (data) {
                    $('#id').val(id),
                        $('#tr_user_name').val(data.tr_user_name),
                        $('#tr_address').val(data.tr_address),
                        $('#tr_city').val(data.tr_city),
                        $('#tr_phone').val(data.tr_phone),
                        $('#tr_note').val(data.tr_note),
                        $('#tr_status').val(data.tr_status),
                        console.log($('#tr_note').val())
                },
                error: function (error) {
                    console.log(error)
                }
            });
        });

        $('#form-transaction ').on('submit', function (e) {
            e.preventDefault();

            let tr_user_name = jQuery('#tr_user_name').val()
            let tr_address = jQuery('#tr_address').val()
            let tr_city = jQuery('#tr_city').val()
            let tr_phone = jQuery('#tr_phone').val()
            let tr_note = jQuery('#tr_note').val()
            let tr_status = jQuery('#tr_status').val()
            let id = jQuery('#id').val();


            $.ajax({
                url: `../shopping/edit-transaction/${id}`,
                method: 'POST',
                data: {
                    tr_user_name: tr_user_name,
                    tr_address: tr_address,
                    tr_city: tr_city,
                    tr_phone: tr_phone,
                    tr_note: tr_note,
                    tr_status: tr_status
                },

                success: function () {
                    $('#edit-transaction').modal('hide');
                    $('.tr_status').reload();
                    $('#form-transaction')[0].reset();
                },
                error: function (err) {
                    console.log(err);
                }
            });
        });
    </script>
@endsection
