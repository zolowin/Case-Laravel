@extends('layouts.admin')
@section('title', 'Thêm Sản Phẩm')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Add New Product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add new product</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header font-weight-bold">Add Product</div>
                            @if(Session::has('success'))
                                <p class="mt-3 text-success text-center"> {{Session::get('success')}} </p>
                            @endif
                            <div class="card-body">
                                <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="product_name" class="col-md-4 col-form-label text-md-right">Product's
                                            Name</label>

                                        <div class="col-md-6">
                                            <input id="product_name" type="text"
                                                   class="form-control @error('product_name') is-invalid @enderror"
                                                   name="product_name" value="{{ old('product_name') }}" required
                                                   autocomplete="product_name" autofocus>
                                            @error('product_name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="product_operating_system" class="col-md-4 col-form-label text-md-right">Operating System</label>

                                        <div class="col-md-6">
                                            <input id="product_operating_system" type="text"
                                                   class="form-control @error('product_operating_system') is-invalid @enderror"
                                                   name="product_operating_system" value="{{ old('product_operating_system') }}"
                                                   required
                                                   autocomplete="product_operating_system">

                                            @error('product_operating_system')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="product_chip" class="col-md-4 col-form-label text-md-right">Processor</label>
                                        <div class="col-md-6">
                                            <input id="product_chip" type="text"
                                                   class="form-control @error('product_chip') is-invalid @enderror"
                                                   name="product_chip" value="{{ old('product_chip') }}" required
                                                   autocomplete="product_chip">

                                            @error('product_chip')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="product_ram" class="col-md-4 col-form-label text-md-right">Memory</label>
                                        <div class="col-md-6">
                                            <input id="product_ram" type="number"
                                                   class="form-control @error('product_ram') is-invalid @enderror"
                                                   name="product_ram" value="{{ old('product_ram') }}" required
                                                   autocomplete="product_ram">

                                            @error('product_ram')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="product_storage" class="col-md-4 col-form-label text-md-right">Storage</label>
                                        <div class="col-md-6">
                                            <input id="product_storage" type="number"
                                                   class="form-control @error('product_storage') is-invalid @enderror"
                                                   name="product_storage" value="{{ old('product_storage') }}" required
                                                   autocomplete="product_storage">

                                            @error('product_storage')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="product_battery" class="col-md-4 col-form-label text-md-right">Battery</label>

                                        <div class="col-md-6">
                                            <input id="product_battery" type="text"
                                                   class="form-control @error('product_battery') is-invalid @enderror"
                                                   name="product_battery" value="{{ old('product_battery') }}" required
                                                   autocomplete="product_battery">

                                            @error('product_battery')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="product_screen" class="col-md-4 col-form-label text-md-right">Display Size</label>

                                        <div class="col-md-6">
                                            <input id="product_screen" type="number" step="0.01"
                                                   class="form-control @error('product_screen') is-invalid @enderror"
                                                   name="product_screen" value="{{ old('product_screen') }}" required
                                                   autocomplete="product_screen">

                                            @error('product_screen')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="product_camera_resolution" class="col-md-4 col-form-label text-md-right">Camera Resolution</label>

                                        <div class="col-md-6">
                                            <input id="product_camera_resolution" type="number" step="0.01"
                                                   class="form-control @error('product_camera_resolution') is-invalid @enderror"
                                                   name="product_camera_resolution"
                                                   value="{{ old('product_camera_resolution') }}" required
                                                   autocomplete="product_camera_resolution">

                                            @error('product_camera_resolution')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="product_describes" class="col-md-2 col-form-label text-md-right">Description</label>

                                        <div class="col-md-10   ">
                                    <textarea name="product_describes" id="product_describes"
                                              class="col-md-4 col-form-label text-md-right ckeditor" cols="30"
                                              rows="10"></textarea>
                                            @error('product_describes')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="product_feature" class="col-md-4 col-form-label text-md-right">Feature</label>

                                        <div class="col-md-6">
                                            <input id="product_feature" type="text"
                                                   class="form-control @error('product_feature') is-invalid @enderror"
                                                   name="product_feature"
                                                   value="{{ old('product_feature') }}" required
                                                   autocomplete="product_feature">

                                            @error('product_feature')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="product_price" class="col-md-4 col-form-label text-md-right">Price</label>

                                        <div class="col-md-6">
                                            <input id="product_price" type="number"
                                                   class="form-control @error('product_price') is-invalid @enderror"
                                                   name="product_price" value="{{ old('product_price') }}" required
                                                   autocomplete="product_price">

                                            @error('product_price')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="product_weight" class="col-md-4 col-form-label text-md-right">Weight</label>

                                        <div class="col-md-6">
                                            <input id="product_weight" type="number"
                                                   class="form-control @error('product_weight') is-invalid @enderror"
                                                   name="product_weight" value="{{ old('product_weight') }}" required
                                                   autocomplete="product_weight">

                                            @error('product_weight')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="product_iStock" class="col-md-4 col-form-label text-md-right">Product's
                                            In Stock</label>

                                        <div class="col-md-6">
                                            <input id="product_iStock" type="number"
                                                   class="form-control @error('product_iStock') is-invalid @enderror"
                                                   name="product_iStock" value="{{ old('product_iStock') }}" required
                                                   autocomplete="product_iStock">

                                            @error('product_iStock')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="product_image" class="col-md-4 col-form-label text-md-right">Product's
                                            Image</label>

                                        <div class="col-md-6">
                                            <img style="max-width:200px" src="http://placehold.it/180" id="photo"
                                                 alt="your image"/>

                                            <input id="product_image" type="file"
                                                   class="form-control" name="product_image" onchange="readURL(this);">

                                            @error('product_image')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="product_sim_slot" class="col-md-4 col-form-label text-md-right">Sim Slot</label>

                                        <div class="col-md-6">
                                            <input id="product_sim_slot" type="number"
                                                   class="form-control @error('product_sim_slot') is-invalid @enderror"
                                                   name="product_sim_slot" value="{{ old('product_sim_slot') }}" required
                                                   autocomplete="product_sim_slot">

                                            @error('product_sim_slot')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="product_guarantee" class="col-md-4 col-form-label text-md-right">Guarantee</label>

                                        <div class="col-md-6">
                                            <input id="product_guarantee" type="number"
                                                   class="form-control @error('product_guarantee') is-invalid @enderror"
                                                   name="product_guarantee" value="{{ old('product_guarantee') }}" required
                                                   autocomplete="product_guarantee">

                                            @error('product_guarantee')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="product_origin" class="col-md-4 col-form-label text-md-right">Origin</label>

                                        <div class="col-md-6">
                                            <input id="product_origin" type="text"
                                                   class="form-control @error('product_origin') is-invalid @enderror"
                                                   name="product_origin" value="{{ old('product_origin') }}" required
                                                   autocomplete="product_origin">

                                            @error('product_origin')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="product_year_made" class="col-md-4 col-form-label text-md-right">Year Made</label>

                                        <div class="col-md-6">
                                            <input id="product_year_made" type="number"
                                                   class="form-control @error('product_year_made') is-invalid @enderror"
                                                   name="product_year_made" value="{{ old('product_year_made') }}" required
                                                   autocomplete="product_year_made">

                                            @error('product_year_made')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="product_color" class="col-md-4 col-form-label text-md-right">Color</label>

                                        <div class="col-md-6">
                                            <input id="product_color" type="text"
                                                   class="form-control @error('product_color') is-invalid @enderror"
                                                   name="product_color" value="{{ old('product_color') }}" required
                                                   autocomplete="product_color">

                                            @error('product_color')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="product_enable" class="col-md-4 col-form-label text-md-right">Product
                                            Enable</label>

                                        <div class="col-md-6">
                                            <select name="product_enable" id="product_enable" class="form-control">
                                                <option value="1">---Enable---</option>
                                                <option value="0">---Disable---</option>
                                            </select>

                                            @error('product_enable')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="product_category_id" class="col-md-4 col-form-label text-md-right">Product
                                            Category</label>

                                        <div class="col-md-6">
                                            <select name="product_category_id" id="product_category_id" class="form-control">
                                                @foreach($categories as $cate)
                                                    <option
                                                        value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                                @endforeach
                                            </select>

                                            @error('product_category_id')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4 text-center">
                                            <button type="submit" class="btn btn-primary">
                                                Add Product
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#photo')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
