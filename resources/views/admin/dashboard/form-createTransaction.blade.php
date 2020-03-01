<div id="addEditTransaction" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <form id="formTransaction">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create New Transaction</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <input hidden id="Id" name="Id">
                <div class="modal-body">
                    <div style="text-align:center">
                        <div class="row">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Recipient's Name</label>
                                <input type="text" class="form-control" id="tr_user_name" name="tr_user_name" placeholder="Example input">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Address</label>
                                <input type="number" class="form-control" id="tr_address" name="tr_address" placeholder="Another input">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">City</label>
                                <input type="text" class="form-control" id="tr_city"name='tr_city'placeholder="Another input">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Phone</label>
                                <input type="text" class="form-control" id="tr_phone" name="tr_phone" placeholder="Another input">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">mô tả</label>
                                <input type="text" class="form-control" id="productDescription" name="productDescription" placeholder="Another input">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">số lượng</label>
                                <input type="number" class="form-control" id="quantityInStock" name='quantityInStock'placeholder="Another input">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label for="formGroupExampleInput2">đơn giá</label>
                                <input type="decimal" class="form-control" id="buyPrice" name="buyPrice" placeholder="Another input">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">MSRP</label>
                                <input type="decimal" class="form-control" id="MSRP" name="MSRP" placeholder="Another input">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Hình ảnh</label>
                                <input type="text" class="form-control" id="image" name="image" placeholder="Another input">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                    <a href="javascript:;" class="btn btn-danger" onclick="product.save()">Save</a>
                </div>
            </div>
        </form>
    </div>`
