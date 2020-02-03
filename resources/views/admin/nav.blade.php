<div class="card">
    <div class="card-header font-weight-bold">Task Management</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <ul>
            <li><a href="{{ route('category.create')}}">Add Category</a></li>
            <li><a href="{{ route('category.index') }}">Manage Category</a></li>
            <li><a href="{{ route('product.create') }}">Add Product</a></li>
            <li><a href="{{ route('product.index') }}">Manage Product</a></li>
        </ul>
    </div>
</div>
