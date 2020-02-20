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

           </tbody>
       </table>
   </div>
</div>
