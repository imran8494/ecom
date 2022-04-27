$(document).ready(function () {
    // check admin current password is match or not
    $('#current_password').keyup(function () {
        var current_password = $('#current_password').val();
        var route = $(this).attr('route');
        // alert(route);
        $.ajax({
            type: 'post',
            url: route,
            data: { current_password: current_password },
            success: function (resp) {
                // alert(resp);
                if (resp == "false") {
                    $("#chkcurrent_password").html("<font color=red>Current password is incorrect!</font>")
                } else if (resp == "true") {
                    $("#chkcurrent_password").html("<font color=green>Current password is correct!")
                }
            }, error: function () {
                alert("Error");
            }
        });
    });

    // update section status

    $(".updateSectionStatus").click(function () {
        var section_status = $(this).text();
        var section_id = $(this).attr("section_id");
        var target = $(this).data('target');
        $.ajax({
            type: 'post',
            url: target,
            data: { section_id: section_id, section_status: section_status },
            success: function (resp) {

                if (resp['status'] == 1) {
                    $("#section_" + section_id).html("<a class='updateSectionStatus' href='javascript:void(0)'>Active</a>");
                } else if (resp['status'] == 0) {
                    $("#section_" + section_id).html("<a class='updateSectionStatus' href='javascript:void(0)'>Inactive</a>");
                }

            }, error: function () {
                alert("Error");
            }
        });
    });
    //update category status

    $(".updateCategoriestatus").click(function () {
        var category_status = $(this).text();
        var category_id = $(this).attr("category_id");
        var target = $(this).data('target');
        $.ajax({
            type: 'post',
            url: target,
            data: { category_id: category_id, category_status: category_status },
            success: function (resp) {

                if (resp['status'] == 1) {
                    $("#category_" + category_id).html("<a class='updateCategoriestatus' href='javascript:void(0)'>Active</a>");
                } else if (resp['status'] == 0) {
                    $("#category_" + category_id).html("<a class='updateCategoriestatus' href='javascript:void(0)'>Inactive</a>");
                }

            }, error: function () {
                alert("Error");
            }
        });
    });

    //update category status

    $(".updateproductstatus").click(function () {
        var product_status = $(this).text();
        var product_id = $(this).attr("product_id");
        var target = $(this).data('target');
        $.ajax({
            type: 'post',
            url: target,
            data: { product_id: product_id, product_status: product_status },
            success: function (resp) {

                if (resp['status'] == 1) {
                    $("#product_" + product_id).html("<a class='updateproductstatus' href='javascript:void(0)'>Active</a>");
                } else if (resp['status'] == 0) {
                    $("#product_" + product_id).html("<a class='updateproductstatus' href='javascript:void(0)'>Inactive</a>");
                }

            }, error: function () {
                alert("Error");
            }
        });
    });


        //update category status

        $(".updateattributetatus").click(function () {
            var attribute_status = $(this).text();
            var attribute_id = $(this).attr("attribute_id");
            // alert(attribute_status);
            var target = $(this).data('target');
            $.ajax({
                type: 'post',
                url: target,
                data: { attribute_id: attribute_id, attribute_status: attribute_status },
                success: function (resp) {
    
                    if (resp['status'] == 1) {
                        $("#attribute_" + attribute_id).html("<a class='updateattributetatus' href='javascript:void(0)'>Active</a>");
                    } else if (resp['status'] == 0) {
                        $("#attribute_" + attribute_id).html("<a class='updateattributetatus' href='javascript:void(0)'>Inactive</a>");
                    }
    
                }, error: function () {
                    alert("Error");
                }
            });
        });

        //update product image status

        $(".updateimagetatus").click(function () {
            var images_status = $(this).text();
            var images_id = $(this).attr("images_id");
            // alert(images_status);
            var target = $(this).data('target');
            $.ajax({
                type: 'post',
                url: target,
                data: { images_id: images_id, images_status: images_status },
                success: function (resp) {
    
                    if (resp['status'] == 1) {
                        $("#images_" + images_id).html("<a class='updateimagestatus' href='javascript:void(0)'>Active</a>");
                    } else if (resp['status'] == 0) {
                        $("#images_" + images_id).html("<a class='updateimagestatus' href='javascript:void(0)'>Inactive</a>");
                    }
    
                }, error: function () {
                    alert("Error");
                }
            });
        });


        
        //update product image status

        $(".updatebrandstatus").click(function () {
            var brand_status = $(this).text();
            var brand_id = $(this).attr("brand_id");
            var target = $(this).data('target');
            $.ajax({
                type: 'post',
                url: target,
                data: { brand_id: brand_id, brand_status: brand_status },
                success: function (resp) {
    
                    if (resp['status'] == 1) {
                        $("#brand_" + brand_id).html("<a class='updatebrandstatus' href='javascript:void(0)'>Active</a>");
                    } else if (resp['status'] == 0) {
                        $("#brand_" + brand_id).html("<a class='updatebrandstatus' href='javascript:void(0)'>Inactive</a>");
                    }
    
                }, error: function () {
                    alert("Error");
                }
            });
        });


    // append category level
    $("#section_id").change(function () {
        var section_id = $(this).val();
        var target = $(this).data('target');
        $.ajax({
            type: 'post',
            url: target,
            data: { section_id: section_id },
            success: function (resp) {
                $("#appendCategoriesLevel").html(resp);
            }, error: function () {
                alert("Error");
            }
        });
    });

    // confirm delete functionality 
    // $(".confirmDelete").click(function(){
    //     var name = $(this).attr("name");
    //     if (confirm("Are you sure to delete this "+name+"?")) {
    //         return true;
    //     }
    //     return false;
    // });

    // confirm delete using sweet alert 2

    $(".confirmDelete").click(function () {
        // var record = $(this).attr("record");
        // var recordid = $(this).attr("recordid");
        var target = $(this).data('target');
        // alert(target);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                window.location.href = target;
            }
        });
    });

    // ajax form submit
    $('#form_data').submit(function (e) {
        e.preventDefault();
        var action = $(this).attr('action'); //wrap this in jQuery
        var formData = new FormData(this);
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        $('#send_form').html('Sending..');
        $.ajax({
            type: 'post',
            url: action,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success_msg) {
                    toastr.success(response.success_msg, response.title);
                    $('#send_form').html('Save');
                    $('form').trigger('reset');
                } else {
                    toastr.error(response.error_msg, response.title);
                    $('#send_form').html('Save');
                }

            },
            error: function () {
                toastr.error('Something went wrong', 'Error Alert');
            }
        });


    });


    // onclick show


    var i = 0;
    $("#add_more").click(function () {
        ++i;
        $("#dynamicTable").append('<tr><td><input type="text" name="size[]" placeholder="Size" class="form-control" /></td><td><input type="text" name="sku[]" placeholder="SKU" class="form-control" /></td><td><input type="text" name="price[]" placeholder="Price" class="form-control" /></td><td><input type="text" name="stock[]" placeholder="Stock" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">-</button></td></tr>');

    });


    $(document).on('click', '.remove-tr', function () {

        $(this).parents('tr').remove();

    });


    // $(document).on('click','.updatecouponstatus',function(){
    //     var route = $(this).attr('route');
    //     var status =$(this).children("i").attr('status');
    //     var data_id = $(this).attr('data_id');
    //     $.ajax({
    //         url:route,
    //         method:'post',
    //         data:{data_id:data_id,status:status},
    //         success:function(resp){
    //             if (resp.status ==1) {
    //                 $("#coupons_"+data_id).html('<i class="fas fa-toggle-on"></i>');
    //             }else{
    //                 $("#coupons_"+data_id).html('<i class="fas fa-toggle-off"></i>');
    //             }
    //         },error:function(){
    //             alert("Error");
    //         }
    //     });
    // });

    // $("#coupon_code").hide();

    $("#manual").on('click',function(){
        $("#coupon_code").show();
    });
    $("#automatic").on('click',function(){
        $("#coupon_code").hide();
    });


    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id'); 
         var route = $(this).attr('route');
        $.ajax({
            type: "post",
            dataType: "json",
            url: route,
            data: {'status': status, 'user_id': user_id},
            success: function(data){
              console.log(data.success)
            }
        });
    });
    
    $("#courier_name").hide();
    $("#tracking_number").hide();

    $("#order_status").on('change',function(){
        // alert($(this).val());
        if ($(this).val()=="Shipped") {
            $("#courier_name").show();
            $("#tracking_number").show();
        }else{
            $("#courier_name").hide();
            $("#tracking_number").hide();
        }
    });

// sidebar active

$(function () {
    var url = window.location;
    // for single sidebar menu
    $('ul.nav-sidebar a').filter(function () {
        return this.href == url;
    }).addClass('active');

    // for sidebar menu and treeview
    $('ul.nav-treeview a').filter(function () {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview")
        .css({'display': 'block'})
        .addClass('menu-open').prev('a')
        .addClass('active');
});


// sidebar active

});