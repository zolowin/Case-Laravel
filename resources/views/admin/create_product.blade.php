@extends('layouts.app')
@section('title', 'Thêm Sản Phẩm')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('admin.nav')
            </div>
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
                                <label for="product_chip" class="col-md-4 col-form-label text-md-right">Product's
                                    Chipset</label>

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
                                <label for="product_ram" class="col-md-4 col-form-label text-md-right">Product's
                                    Ram</label>

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
                                <label for="product_battery" class="col-md-4 col-form-label text-md-right">Product's
                                    Battery</label>

                                <div class="col-md-6">
                                    <input id="product_battery" type="number"
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
                                <label for="product_screen" class="col-md-4 col-form-label text-md-right">Product's
                                    Screen</label>

                                <div class="col-md-6">
                                    <input id="product_screen" type="number" step="0.1 "
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
                                <label for="product_camera_resolution" class="col-md-4 col-form-label text-md-right">Product's
                                    Camera Resolution</label>

                                <div class="col-md-6">
                                    <input id="product_camera_resolution" type="number"
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
                                <label for="product_describes" class="col-md-2 col-form-label text-md-right">Product's
                                    Description</label>

                                <div class="col-md-10   ">
                                    <textarea name="product_describes" id="product_describes" class="col-md-4 col-form-label text-md-right ckeditor" cols="30" rows="10"></textarea>
                                    @error('product_describes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product_feature" class="col-md-4 col-form-label text-md-right">Product's
                                    Feature</label>

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
                                <label for="product_price" class="col-md-4 col-form-label text-md-right">Product's
                                    Price</label>

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
                                <label for="product_weight" class="col-md-4 col-form-label text-md-right">Product's
                                    Weight</label>

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
                                <label for="product_color" class="col-md-4 col-form-label text-md-right">Product's
                                    Color</label>

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
                                <label for="product_image" class="col-md-4 col-form-label text-md-right">Product's
                                    Image</label>

                                <div class="col-md-6">
                                    <input id="product_image" type="file"
                                           class="form-control" name="product_image">

                                    @error('product_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product_sim_slot" class="col-md-4 col-form-label text-md-right">Product's
                                    Sim Slot</label>

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
                                <label for="product_guarantee" class="col-md-4 col-form-label text-md-right">Product's
                                    Guarantee</label>

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
                                <label for="product_operating_system" class="col-md-4 col-form-label text-md-right">Product's
                                    Operating System</label>

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
                                <label for="product_origin" class="col-md-4 col-form-label text-md-right">Product's
                                    Origin</label>

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
                                <label for="product_year_made" class="col-md-4 col-form-label text-md-right">Product's
                                    Year Made</label>

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
                                <label for="product_sku" class="col-md-4 col-form-label text-md-right">Product's
                                    SKU</label>

                                <div class="col-md-6">
                                    <input id="product_sku" type="number"
                                           class="form-control @error('product_sku') is-invalid @enderror"
                                           name="product_sku" value="{{ old('product_sku') }}" required
                                           autocomplete="product_sku">

                                    @error('product_sku')
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
                                        <option value="0">---Danh Mục Gốc---</option>
                                        @foreach($categories as $cate)
                                            @if($cate->p_category_id === 0)
                                                <option
                                                    value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                                @foreach($categories as $cate_sub)
                                                    @if($cate_sub->p_category_id != 0 && $cate_sub->p_category_id === $cate->category_id)
                                                        <option
                                                            value="{{ $cate_sub->category_id }}">&emsp;{{'--'.$cate_sub->category_name.'--'}}</option>
                                                    @endif
                                                @endforeach
                                            @endif
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
@endsection
