<div class="row">
    <div class="col-12">
        <div class="card" id="cate_main" style="display: none">
            <ul class="nav nav-tabs d-print-none mb-2" role="tablist">
                <li class="nav-item ">
                    <a class="nav-link  active " href="#active" role="tab" data-toggle="tab"
                       aria-selected="true">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#deleted" role="tab" data-toggle="tab">Deleted</a>
                </li>
            </ul>
            <div class="tab-content">

                <div role="tabpanel" class="tab-pane active" id="active">
                    <div class="card-body">
                       <div class="row">
                           <div class="col-md-3">
                               List Categories
                           </div>
{{--                           <div class="col-md-6"></div>--}}
                           <div class="col-md-9 mb-2">
                               <button type="button" id="create_category" class="btn btn-primary float-right" data-toggle="modal"
                                       data-target="#add_category"><i class="fa fa-plus"></i> Add New Category
                               </button>
                           </div>
                       </div>
                        <table class="table table-bordered" id="category-table">
                            <thead class="thead-dark text-center">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Category Alias</th>
                                <th scope="col">Create At</th>
                                <th scope="col">Update At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="deleted">
                    <div class="card-body">
                        <table id="categoryDeleted" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>Name</th>
                                <th>Alias</th>
                                <th>Total Product</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

<div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="form_category" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-12">
                                    <label><strong>Name</strong> <small class="text-danger">*</small></label>
                                    <input type="hidden" name="category_id" id="category_id" value="">
                                    <input type="text" id="category_name" name="category_name" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                    <label><strong>Alias</strong> <small class="text-danger">*</small></label>
                                    <input type="text" id="category_alias" name="category_alias" class="form-control">
                                </div>
                            </div>

                            <div class="form-row justify-content-center">
                                <div class="form-group col-sm-12">
                                    <hr/>
                                    <button type="reset" class="btn btn-outline-primary"><i
                                            class="fa fa-refresh"></i>
                                        Reset
                                    </button>
                                    <input type="hidden" name="action" id="action" value="Add">
                                    {{--                                    <input type="hidden" id="category_id">--}}
                                    <button type="submit" class="btn btn-primary btn-submit" name="action_button"
                                            id="action_button"><i class="fa fa-save"></i>
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
