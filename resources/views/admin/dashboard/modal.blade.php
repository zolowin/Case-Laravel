{{--edit create--}}
<div id="success" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <i class="far fa-check-circle fa-8x text-success mb-3"></i>
                    <h4 class="modal-title">Done!</h4>
                </div>
                <p class="text-center" id="success_content">
                    Add category successfully</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

{{--delete--}}
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger" role="document">
        <!--Content-->
        <form method="GET">
            <div class="modal-content">
                <!--Body-->
                <div class="modal-body">
                    <div class="text-center">
                        <i class="far fa-times-circle fa-8x text-danger mb-3"></i>
                        <h4>Are you sure you want to remove this data?</h4>
                    </div>
                </div>

                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <button type="submit" id="ok_button" class="btn btn-danger">Remove</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
        <!--/.Content-->
    </div>
</div>
