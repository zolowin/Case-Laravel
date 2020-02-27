member.delete = function(id){
    bootbox.confirm({
        title: "Remove member?",
        message: "Do you want to remove this member.",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> No'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Yes'
            }
        },
        callback: function (result) {
            if(result){
                $.ajax({
                    url : "http://localhost:3000/members/" + id,
                    method : "DELETE",
                    dataType : "json",
                    contentType : 'application/json',
                    success : function(data){
                        member.drawTable();
                    }
                });
            }
        }
    });
};
