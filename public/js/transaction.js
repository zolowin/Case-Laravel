var transaction = transaction || {};
transaction.drawTable = function(){
    $.ajax({
        url:'/api/admin/transactions/',
        method : 'GET',
        dataType : 'json',
        success : function(data){
            $('#tbTransaction').empty();
            $.each(data, function(index, value){
                $('#tbTransaction').append(
                    "<tr>"+
                    "<td>" + value.id + "</td>" +
                    "<td>" + value.tr_user_name + "</td>" +
                    "<td>" + value.tr_city + "</td>" +
                    "<td>" + value.tr_phone + "</td>" +
                    "<td>" + value.tr_total_price + "</td>" +
                    "<td>" + "<p class='tr_status " + value.id + "'>" + value.tr_status + "</p>" +
                        "<input  id='tr_status" + value.id +"' value='" + value.tr_status + "'/>" + "</td>" +
                    "<td>" + value.created_at + "</td>" +
                    "<td>" + value.updated_at + "</td>" +
                    "<td>" +
                    "<a href='javascript:;' onclick=transaction.getDetail(" + value.id + ")><i class='fa fa-edit'></i></a> " +
                    "<a href='javascript:;' onclick=transaction.delete(" + value.id + ")><i class='fa fa-trash'></i></a>" +
                    "</td>" +
                    "</tr>"
                );
            });
            console.log($('#tr_status1').val());
            $('#tr_status1').text('')
        }
    });
};

transaction.save = function(){
    if($('#frmAddEditUser').valid()){
        var dataObj = {};
        if($('#Id').val() == 0){
            dataObj.productName = $('#productName').val();
            dataObj.productLineId = $('#productLineId').val();
            dataObj.productScale = $('#productScale').val();
            dataObj.productVendor = $('#productVendor').val();
            dataObj.productDescription = $('#productDescription').val();
            dataObj.quantityInStock = $('#quantityInStock').val();
            dataObj.buyPrice = $('#buyPrice').val();
            dataObj.MSRP = $('#MSRP').val();
            dataObj.image = $('#image').val();
            $.ajax({
                url: '/api/admin/sanpham/',
                method: 'POST',
                data: JSON.stringify(dataObj),
                dataType: 'json',
                contentType: 'application/json',
                success: function (data) {
                    $('#addEditTransaction').modal('hide');
                    product.drawTable();
                }
            });
        }else{
            dataObj.productName = $('#productName').val();
            dataObj.productLineId = $('#productLineId').val();
            dataObj.productScale = $('#productScale').val();
            dataObj.productVendor = $('#productVendor').val();
            dataObj.productDescription = $('#productDescription').val();
            dataObj.quantityInStock = $('#quantityInStock').val();
            dataObj.buyPrice = $('#buyPrice').val();
            dataObj.MSRP = $('#MSRP').val();
            dataObj.image = $('#image').val();
            dataObj.id = $('#Id').val();
            $.ajax({
                url: '/api/admin/sanpham/' + dataObj.id,
                method: 'PUT',
                data: JSON.stringify(dataObj),
                dataType: 'json',
                contentType: 'application/json',
                success: function (data) {
                    $('#addEditTransaction').modal('hide');
                    transaction.drawTable();
                }
            });
        }
    }
};

transaction.resetForm = function () {
    $('#productName').val();
    $('#productLineId').val();
    $('#productScale').val();
    $('#productVendor').val();
    $('#productDescription').val();
    $('#quantityInStock').val();
    $('#buyPrice').val();
    $('#MSRP').val();
    $('#image').val();
    $('#Id').val(0);
    $('#addEditTransaction').find('.modal-title').text('Create New Transaction');
    $("#frmAddEditUser").validate().resetForm();
};

transaction.openAddEditUser = function(){
    transaction.resetForm();
    $('#addEditTransaction').transaction('show');
};

transaction.getDetail = function (id) {
    transaction.resetForm();
    $.ajax({
        url: '/api/admin/sanpham/' + id,
        method: 'GET',
        dataType: 'json',
        contentType: 'application/json',
        success: function (data) {
            $('#productName').val(data.productName);
            $('#productLineId').val(data.productLineId);
            $('#productScale').val(data.productScale);
            $('#productVendor').val(data.productVendor);
            $('#productDescription').val(data.productDescription);
            $('#quantityInStock').val(data.quantityInStock);
            $('#buyPrice').val(data.buyPrice);
            $('#MSRP').val(data.MSRP);
            $('#image').val(data.image);
            $('#Id').val(data.id);
            $('#addEditTransaction').find('.modal-title').text('Update Transaction');
            $('#addEditTransaction').modal('show');
        }
    });
};

transaction.delete = function (id) {
    bootbox.confirm({
        message: "  ?",
        buttons: {
            confirm: {
                label: 'Yessss',
                className: 'btn-success'
            },
            cancel: {
                label: 'No!!!',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if (result) {
                $.ajax({
                    url: '/api/admin/sanpham/' + id,
                    method: 'DELETE',
                    dataType: 'json',
                    contentType: 'application/json',
                    success: function (data) {
                        transaction.drawTable();
                    }
                });
            }
        }
    });
};

transaction.init =function () {
    transaction.drawTable();
};

$(document).ready(function () {
    transaction.init();
});
