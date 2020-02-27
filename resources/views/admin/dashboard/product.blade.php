<div class="card" style="display: none" id="pro_main">
    @if(Session::has('success'))
        <p class="mt-3 text-success text-center"> {{Session::get('success')}} </p>
    @endif
    <div class="card-header">
        <strong>List Products</strong>
        <a href="{{ route('product.create') }}" class="btn btn-success float-right">New Product</a>
    </div>
   <div class="card-body">
       <table class="table table-bordered" id="product-table">
           <thead class="thead-dark text-center">
           <tr>
               <th scope="col">#</th>
               <th scope="col">Product's Name</th>
               <th scope="col">Product's In Stock</th>
               <th scope="col">Product's Image</th>
               <th scope="col">Create At</th>
               <th scope="col">Update At</th>
               <th scope="col">Action</th>
           </tr>
           </thead>
           <tbody>
           <?php $i = 1 ?>
           @foreach($products as $key => $product)
               <tr>
                   <th scope="row">{{ $i++ }}</th>
                   <td>{{ $product->product_name }}</td>
                   <td>{{ $product->product_iStock }}</td>
                   <td><img src="{{ 'data:image/jpeg;base64,'.$product->product_image }}" alt="product_image"
                            style="max-width: 200px"></td>
                   <td>{{ date("d-m-Y", strtotime($product->created_at)) }}</td>
                   <td>{{ $product->updated_at }}</td>
                   <td>
                       <a href=" {{ route('product.edit', $product->product_id) }}" class="btn btn-primary"><i
                               class="fa fa-edit mr-1"
                               title="Edit"> Edit</i></a>
                       <a href="{{ route('product.destroy', $product->product_id) }}" class="btn btn-danger"
                          onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')"><i
                               class="fa fa-trash"
                               title="Delete"> Delete</i></a>
                   </td>
               </tr>
           @endforeach
           </tbody>
       </table>
   </div>
</div>
