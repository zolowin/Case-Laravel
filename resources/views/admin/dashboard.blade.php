@extends('layouts.admin')
@section('title', 'Dashboard')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
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
                                <h3 id="count_new_tr">{{ count($new_tr) }}</h3>

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
                                <h3 id="count_category">{{ count($categories)}}</h3>
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

                                <p>Products</p>
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

                                <p>Users Registered</p>
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
                @include('admin.dashboard.modal')
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
                $("#user_main").show();
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
                    {data: 'id',
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {data: 'tr_user_id', name: 'tr_user_id'},
                    {data: 'tr_user_name', name: 'tr_user_name'},
                    {data: 'tr_city', name: 'tr_city'},
                    {data: 'tr_phone', name: 'tr_phone'},
                    {data: 'tr_total_price', name: 'tr_total_price'},
                    {data: 'tr_status', name: 'tr_status'},
                    {data: 'tr_note', name: 'tr_note'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

            $('#category-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('datatable.cate') }}',
                columns: [
                    {data: 'category_id',
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {data: 'category_name', name: 'category_name'},
                    {data: 'category_alias', name: 'category_alias'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

            $('#product-table').DataTable();

            $('#user-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('datatable.user') }}',
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'money', name: 'money'},
                    {data: 'level', name: 'level'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

        $("#categoryDeleted").DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("datatable.cateDelData") }}',
            columns: [
                {
                    data: 'category_id',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'category_name', name: 'category_name'
                },
                {
                    data: 'category_alias', name: 'category_alias'
                },
                {
                    data: 'Total Products',
                },
                {
                    data: 'action', name: 'action', orderable: false, searchable: false
                }
            ],
            order: [[0, 'asc']]
        });
    </script>
    <script>
        $(document).ready(function () {
            var count_category = parseInt($('#count_category').text());
            var count_new_tr = parseInt($('#count_new_tr').text());
            var count_product = parseInt($('#count_product').text());
            var count_user = parseInt($('#count_user').text());

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //cate
            $('#create_category').click(function () {
                $('.modal-title').val('Add New Category');
                $('#action').val('Add');
            });

            $('#form_category').on('submit', function (e) {
                e.preventDefault();
                count_category +=1 ;
                let action_url = '';
                let type = '';
                let category_name = jQuery('#category_name').val()
                let category_alias = jQuery('#category_alias').val()
                let id = jQuery('#category_id').val();

                if ($('#action').val() === 'Add') {
                    action_url = 'category/create-category';
                }

                if ($('#action').val() === 'Edit') {
                    action_url = `category/edit-category/${id}`;
                }

                $.ajax({
                    url: action_url,
                    method: 'POST',
                    data: {
                        category_name: category_name,
                        category_alias: category_alias
                    },

                    success: function () {
                        $('#add_category').modal('hide');
                        $('#category-table').DataTable().ajax.reload();
                        $('#form_category')[0].reset();
                        $('#success_content').html('This category has been updated');
                        $('#success').modal('show');
                        $('#count_category').text(count_category);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            });

            //edit-cate
            $(document).on('click', '.edit-category', function () {
                let id = $(this).data('id');
                $.ajax({
                    url: `category/edit-category/${id}`,
                    success: function (data) {
                        $('#category_id').val(id),
                            $('#category_name').val(data.category_name),
                            $('#category_alias').val(data.category_alias),
                            $('#action').val('Edit')
                    },
                    error: function (error) {
                        console.log(error)
                    }
                });
            });

            //delete cate
            $(document).on('click', '.delete-category', function(){
                let id = $(this).data('id');
                $('#delete-id').val(id);
                $('#delete-action').val('SoftDelete');
            })
            $(document).on('click', '.force-delete', function(){
                let id = $(this).data('id');
                $('#delete-id').val(id);
                $('#delete-action').val('ForceDelete');
            })
            $('#form-delete').on('submit', function(e){
                e.preventDefault();
                let id = $('#delete-id').val();
                count_category -= 1;
                $.ajax({
                    url: `category/destroy-category/${id}`,
                    method: 'GET',
                    success: function(){
                        alert(2);
                        $('#confirm-modal').modal('hide');
                        $('#category-table').DataTable().ajax.reload();
                        $('#categoryDeleted').DataTable().ajax.reload();
                        $('#count_category').text(count_category);
                        $('#success_content').html('Your record has been deleted');
                        $('#success').modal('show');
                    },
                    error: function(err){
                        console.log(err);
                    }
                })
            })

            //restore-cate
            $(document).on('click', '.restore-category', function () {
                let id = $(this).data('id');
                count_category += 1;

                if (confirm('Are you sure to restore?')) {
                    $.ajax({
                        url: `category/restore-category/${id}`,
                        method: 'GET',
                        success: function () {
                            $('#category-table').DataTable().ajax.reload();
                            $('#categoryDeleted').DataTable().ajax.reload();
                            $('#count_category').text(count_category);
                            $('#success_content').html('Your record has been restore');
                            $('#success').modal('show');
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                }
            });
            // endcate

            //transaction
            $(document).on('click', '.edit-transaction', function () {
                let id = $(this).data('id');
                $.ajax({
                    url: `../shopping/edit-transaction/${id}`,
                    success: function (data) {
                        $('#id').val(id),
                            $('#tr_user_name').val(data.tr_user_name),
                            $('#tr_address').val(data.tr_address),
                            $('#tr_city').val(data.tr_city),
                            $('#tr_phone').val(data.tr_phone),
                            $('#tr_note').val(data.tr_note),
                            $('#tr_status').val(data.tr_status)
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
                count_new_tr -= 1;

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
                        $('#transaction-table').DataTable().ajax.reload();
                        $('#form-transaction')[0].reset();
                        $('#count_new_tr').text(count_new_tr);
                        $('#success_content').html('Transaction has been updated');
                        $('#success').modal('show');
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            });
        });
    </script>
@endpush
