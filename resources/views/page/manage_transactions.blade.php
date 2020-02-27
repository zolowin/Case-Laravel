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
                            <td>
                                @if ($transaction->tr_status === 0)
                                    <p class="text-primary">Shipping</p>
                                @elseif ($transaction->tr_status === 1)
                                    <p class="text-danger">Canceled</p>
                                @else
                                    <p class="text-success">Finished </p>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary edit-transaction mr-2" data-toggle="modal"
                                        data-target="#cancle-transaction" data-id="{{$transaction->id}}"><i
                                        class="fa fa-edit"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>

    </script>
@endsection
