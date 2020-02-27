<div class="card" id="transaction_main">
    <div class="card-header">
        <strong>New Orders</strong>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="transaction-table">
            <thead class="thead-dark text-center">
            <tr>
                <th>Id</th>
                <th>User's Name</th>
                <th>Recipient's Name</th>
                <th>City</th>
                <th>Phone</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Note</th>
                <th>Order Date</th>
                <th>Action</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<!-- /.card -->


<div class="modal fade" id="edit-transaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Transactions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="form-transaction" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-12">
                                    <label><strong>Recipient's Name</strong> <small class="text-danger">*</small></label>
                                    <input type="text" id="tr_user_name" name="tr_user_name" class="form-control">
                                    <input type="hidden" id="id" name="id" value="">
                                </div>
                                <div class="form-group col-md-12">
                                    <label><strong>Address</strong> <small class="text-danger">*</small></label>
                                    <input type="text" id="tr_address" name="tr_address" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                    <label><strong>City</strong> <small class="text-danger">*</small></label>
                                    <input type="text" id="tr_city" name="tr_city" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                    <label><strong>Phone</strong> <small class="text-danger">*</small></label>
                                    <input type="text" id="tr_phone" name="tr_phone" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                    <label><strong>Status</strong> <small class="text-danger">*</small></label>
                                    <select class="form-control" name="tr_status" id="tr_status">
                                        <option value="0">Shipping</option>
                                        <option value="1">Canceled</option>
                                        <option value="2">Shipped</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label><strong>Note</strong> <small class="text-danger">*</small></label>
                                    <input type="text" id="tr_note" name="tr_note" class="form-control">
                                </div>
                            </div>

                            <div class="form-row justify-content-center">
                                <div class="form-group col-sm-12">
                                    <hr/>
                                    <button type="reset" class="btn btn-outline-primary"><i
                                            class="fa fa-refresh"></i>
                                        Reset
                                    </button>
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


