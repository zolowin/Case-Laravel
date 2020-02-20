<div class="card" id="cate_main" style="display: none">
    <div class="card-header">
        <strong>List Categories</strong>
        <a href="{{ route('category.create') }}" class="btn btn-success float-right">New Category</a>
    </div>

    <div class="card-body">
        <table class="table table-bordered" id="category-table">
            <thead class="thead-dark text-center">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col">Category Alias</th>
                <th scope="col">Category Belongs</th>
                <th scope="col">Create At</th>
                <th scope="col">Update At</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
