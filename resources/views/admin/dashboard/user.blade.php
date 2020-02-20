{{--<tbody>--}}
{{--@foreach($categories as $key => $cate)--}}
{{--    <tr>--}}
{{--        <th scope="row">{{ $key++ }}</th>--}}
{{--        <td>{{ $cate->category_name }}</td>--}}
{{--        <td>{{ $cate->category_alias }}</td>--}}
{{--        <td>--}}
{{--            @if($cate->category_enable === 0)--}}
{{--                Disable--}}
{{--            @else--}}
{{--                Enable--}}
{{--            @endif--}}
{{--        </td>--}}
{{--        <td>--}}
{{--            @if($cate->p_category_id === 0)--}}
{{--                ------}}
{{--            @else--}}
{{--                @foreach($categories as $cate_sub)--}}
{{--                    @if($cate_sub->category_id == $cate->p_category_id)--}}
{{--                        {{ $cate_sub->category_name }}--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            @endif--}}
{{--        </td>--}}
{{--        <td>--}}
{{--            @if($cate->category_status === 0)--}}
{{--                Out Of Stock--}}
{{--            @else--}}
{{--                Stocking--}}
{{--            @endif--}}
{{--        </td>--}}
{{--        <td>--}}
{{--            <a href=" {{ route('category.edit', $cate->category_id) }}" class="btn btn-primary"><i--}}
{{--                    class="fa fa-edit mr-1" title="Edit"> Edit</i></a>--}}
{{--            &ensp;--}}
{{--            <a href="{{ route('category.destroy', $cate->category_id) }}" class="btn btn-danger"--}}
{{--               onclick="return confirm('Bạn có chắc chắn xóa danh mục này?')"><i--}}
{{--                    class="fa fa-trash" title="Delete"> Delete</i></a>--}}
{{--        </td>--}}
{{--    </tr>--}}
{{--@endforeach--}}
{{--</tbody>--}}

{{--<tbody>--}}
{{--@foreach($products as $key => $product)--}}
{{--    <tr>--}}
{{--        <th scope="row">{{ $key++ }}</th>--}}
{{--        <td>{{ $product->product_name }}</td>--}}
{{--        <td>{{ $product->product_iStock }}</td>--}}
{{--        <td>{{ $product->product_price }}</td>--}}
{{--        <td><img src="{{ 'data:image/jpeg;base64,'.$product->product_image }}" alt="product_image"--}}
{{--                 style="max-width: 200px"></td>--}}
{{--        <td>--}}
{{--            @foreach($categories as $cate_sub)--}}
{{--                @if($cate_sub->category_id === $product->product_category_id)--}}
{{--                    {{ $cate_sub->category_name }}--}}
{{--                @endif--}}
{{--            @endforeach--}}
{{--        </td>--}}

{{--        <td>--}}
{{--            <a href=" {{ route('product.edit', $product->product_id) }}" class="btn btn-primary"><i--}}
{{--                    class="fa fa-edit mr-1"--}}
{{--                    title="Edit"> Edit</i></a>--}}
{{--            <a href="{{ route('product.destroy', $product->product_id) }}" class="btn btn-danger"--}}
{{--               onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')"><i--}}
{{--                    class="fa fa-trash"--}}
{{--                    title="Delete"> Delete</i></a>--}}
{{--        </td>--}}
{{--    </tr>--}}
{{--@endforeach--}}
{{--</tbody>--}}
