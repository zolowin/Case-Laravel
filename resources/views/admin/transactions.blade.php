@extends('layouts.admin')
@section('title', 'Transactions')
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <section class="content">
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Transactions</h3>
                                </div>
                                {{-- thêm mới --}}
                                <div class="card-body">
                                    <div class="col-12 mb-3">
                                        <a href="javascript:void(0);" class="btn btn-info"
                                           onclick="product.openaddTransaction()">Create</a>
                                    </div>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Recipient's Name</th>
                                            <th>City</th>
                                            <th>Phone</th>
                                            <th>Total Price</th>
                                            <th>Status</th>
                                            <th>Note</th>
                                            <th>Order Date</th>
                                            <th>action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="tbTransaction">
                                        {{-- đỗ dữ liệu --}}
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Recipient's Name</th>
                                            <th>City</th>
                                            <th>Phone</th>
                                            <th>Total Price</th>
                                            <th>Status</th>
                                            <th>Order Date</th>
                                            <th>Updated Date</th>
                                            <th>action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                @include('admin.dashboard.form-createTransaction ')
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/transaction.js') }}"></script>
@endpush
