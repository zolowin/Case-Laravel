@extends('layouts.app')
@section('title', 'Sửa Danh Mục')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
               @include('admin.nav')
                <br><br>
                <div class="card">
                    <div class="card-header font-weight-bold">Edit Category</div>
                    @if(Session::has('success'))
                        <p class="mt-3 text-success text-center"> {{Session::get('success')}} </p>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('category.update', $category->category_id) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="category_name" class="col-md-4 col-form-label text-md-right">Category
                                    Name</label>

                                <div class="col-md-6">
                                    <input id="category_name" type="text"
                                           class="form-control @error('category_name') is-invalid @enderror"
                                           name="category_name" value="{{ $category->category_name}}" required
                                           autocomplete="category_name" autofocus>

                                    @error('category_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_alias" class="col-md-4 col-form-label text-md-right">Category
                                    Alias</label>

                                <div class="col-md-6">
                                    <input id="category_alias" type="text"
                                           class="form-control @error('category_alias') is-invalid @enderror"
                                           name="category_alias" value="{{ $category->category_alias  }}" required
                                           autocomplete="category_alias">

                                    @error('category_alias')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_status" class="col-md-4 col-form-label text-md-right">Category
                                    Status</label>

                                <div class="col-md-6">
                                    <select name="category_status" id="category_status" class="form-control">
                                        @if($category->category_status === 0)
                                        <option value="0">Out of stock</option>
                                            <option value="1">Stocking</option>
                                        @else
                                        <option value="1">Stocking</option>
                                            <option value="0">Out of stock</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_enable" class="col-md-4 col-form-label text-md-right">Category
                                    Enable</label>

                                <div class="col-md-6">
                                    <select name="category_enable" id="category_enable" class="form-control">
                                        @if($category->category_enable === 0)
                                            <option value="0">Disable</option>
                                            <option value="1">Enable</option>
                                        @else
                                            <option value="1">Enable</option>
                                            <option value="0">Disable</option>
                                        @endif
                                    </select>
                                    @error('category_enable')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="p_category_id" class="col-md-4 col-form-label text-md-right">Category
                                    Parent</label>

                                <div class="col-md-6">
                                    <select name="p_category_id" id="p_category_id" class="form-control">
                                        <option value="0">---Danh Mục Gốc---</option>
                                        @foreach($categories as $cate)
                                            @if($cate->p_category_id === 0)
                                                <option
                                                    value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                                @foreach($categories as $cate_sub)
                                                    @if($cate_sub->p_category_id != 0 && $cate_sub->p_category_id === $cate->category_id)
                                                        <option
                                                            value="{{ $cate_sub->category_id }}">{{ '----'.$cate_sub->category_name }}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('p_category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Edit Category
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-2">
        <a href="{{ URL::to('/category/') }}" class="btn btn-warning">Về Trang Quản Lý Danh Mục</a>
    </div>
@endsection
