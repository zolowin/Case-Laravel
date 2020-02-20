@extends('layouts.app')
@section('title', 'Quản lý sản phẩm')
@section('content')
    <div class="row">
        <div class="col-md-2">
            @include('admin.nav')
        </div>
        <div class="col-md-9">
            @if(Session::has('success'))
                <p class="mt-3 text-success text-center"> {{Session::get('success')}} </p>
            @endif
            <table class="table table-bordered">
                <thead class="thead-dark text-center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product's Name</th>
                    <th scope="col">Product's SKU</th>
                    <th scope="col">Product's Chip</th>
                    <th scope="col">Product's Enable</th>
                    <th scope="col">Product's Ram</th>
                    <th scope="col">Product's In Stock</th>
                    <th scope="col">Product's Price</th>
                    <th scope="col">Product's Image</th>
                    <th scope="col">Product's Category</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $key => $product)
                    <tr>
                        <th scope="row">{{ $products->firstItem() +$key }}</th>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->product_sku }}</td>
                        <td>{{ $product->product_chip }}</td>
                        <td>
                            @if($product->product_enable === 0)
                                Disable
                            @else
                                Enable
                            @endif
                        </td>
                        <td>{{ $product->product_ram }}</td>
                        <td>{{ $product->product_iStock }}</td>
                        <td>{{ $product->product_price }}</td>
                        <td><img src="{{ 'data:image/jpeg;base64,'.$product->product_image }}" alt="product_image"
                                 style="max-width: 200px"></td>
                        <td>
                            @foreach($categories as $cate_sub)
                                @if($cate_sub->category_id === $product->product_category_id)
                                    {{ $cate_sub->category_name }}
                                @endif
                            @endforeach
                        </td>

                        <td>
                            <a href=" {{ route('product.edit', $product->product_id) }}"><i class="fa fa-edit mr-1"
                                                                                            title="Edit"> Edit</i></a>
                            <a href="{{ route('product.destroy', $product->product_id) }}"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')"><i
                                    class="fa fa-trash"
                                    title="Delete"> Delete</i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <span>{!! $products->render() !!}</span>
        </div>
    </div>
@endsection
