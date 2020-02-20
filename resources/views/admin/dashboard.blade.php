@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ count($new_tr) }}</h3>

                                <p>New Transactions</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <button id="btn_transaction">More info <i class="fas fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ count($categories) }}</h3>

                                <p>Categories</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-list-alt"></i>
                            </div>
                            <button id="btn_cate">More info <i class="fas fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ count($products) }}</h3>

                                <p>Product</p>
                            </div>
                            <div class="icon">
                                <i class="fab fa-product-hunt"></i>
                            </div>
                            <button id="btn_pro">More info <i class="fas fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ count($users) }}</h3>

                                <p>User Registered</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <button id="btn_user">More info <i class="fas fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                @include('admin.dashboard.category')
                @include('admin.dashboard.product')
                @include('admin.dashboard.transaction')
                @include('admin.dashboard.user')
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $("#btn_transaction").click(function () {
                $("#pro_main, #cate_main, #user_main").hide();
                $("#transaction_main").show();
            });
        });

        $(document).ready(function () {
            $("#btn_cate").click(function () {
                $("#pro_main, #transaction_main, #user_main").hide();
                $("#cate_main").show();
            });
        });

        $(document).ready(function () {
            $("#btn_pro").click(function () {
                $("#transaction_main, #cate_main, #user_main").hide();
                $("#pro_main").show();
            });
        });

        $(document).ready(function () {
            $("#btn_user").click(function () {
                $("#pro_main, #cate_main, #transaction_main").hide();
                $("#user.main").show();
            });
        });
    </script>
    <script>
        $(function () {
            $('#transaction-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('datatable.tr') }}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'tr_user_id', name: 'tr_user_id'},
                    {data: 'tr_address', name: 'tr_address'},
                    {data: 'tr_phone', name: 'tr_phone'},
                    {data: 'tr_total_price', name: 'tr_total_price'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

            $('#category-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('datatable.cate') }}',
                columns: [
                    {data: 'category_id', name: 'category_id'},
                    {data: 'category_name', name: 'category_name'},
                    {data: 'category_alias', name: 'category_alias'},
                    {data: 'p_category_id', name: 'p_category_id'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endpush
