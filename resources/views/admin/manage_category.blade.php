@extends('layouts.app')
@section('title', 'Quản lý danh mục')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('admin.nav')
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header font-weight-bold">List Categories</div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="thead-dark text-center">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Category Alias</th>
                                <th scope="col">Category Enable</th>
                                <th scope="col">Category Belongs</th>
                                <th scope="col">Category Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $key => $cate)
                                <tr>
                                    <th scope="row">{{ $categories->firstItem() +$key }}</th>
                                    <td>{{ $cate->category_name }}</td>
                                    <td>{{ $cate->category_alias }}</td>
                                    <td>
                                        @if($cate->category_enable === 0)
                                            Disable
                                        @else
                                            Enable
                                        @endif
                                    </td>
                                    <td>
                                        @if($cate->p_category_id === 0)
                                            ----
                                        @else
                                            @foreach($categories as $cate_sub)
                                                @if($cate_sub->category_id == $cate->p_category_id)
                                                    {{ $cate_sub->category_name }}
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @if($cate->category_status === 0)
                                            Out Of Stock
                                        @else
                                            Stocking
                                        @endif
                                    </td>
                                    <td>
                                        <a href=" {{ route('category.edit', $cate->category_id) }}" ><i class="fa fa-edit mr-1" title="Edit"> Edit</i></a>
                                        <a href="{{ route('category.destroy', $cate->category_id) }}" onclick="return confirm('Bạn có chắc chắn xóa danh mục này?')" ><i class="fa fa-trash" title="Delete"> Delete</i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <span>{{ $categories->render() }}</span>
            </div>
        </div>

    </div>

@endsection

