$(document).ready(function () {
    // alert('asdfds');
    // $("#sort").on('change',function(){
    //     this.form.submit();
    // });

    $("#sort").on('change', function () {
        var fabric = get_filter_fabric(this);
        var sleeve = get_filter_sleeve(this);
        var pattern = get_filter_pattern(this);
        var fit = get_filter_fit(this);
        var occasion = get_filter_occasion(this);

        var sort = $(this).val();
        var url = $("#url").val();
        // alert(url);
        $.ajax({
            url: url,
            method: 'post',
            data: {
                sleeve: sleeve,
                fabric: fabric,
                pattern: pattern,
                fit: fit,
                occasion: occasion,
                url: url,
                sort: sort
            },
            success: function (data) {
                $('.filter_products').html(data);
            }
        });
    });



    $(".fabric").on('click', function () {
        var fabric = get_filter_fabric(this);
        var sleeve = get_filter_sleeve(this);
        var pattern = get_filter_pattern(this);
        var fit = get_filter_fit(this);
        var occasion = get_filter_occasion(this);

        // alert(filter);
        var sort = $("#sort option:selected").val();
        var url = $("#url").val();
        $.ajax({
            url: url,
            method: 'post',
            data: {
                sleeve: sleeve,
                fabric: fabric,
                pattern: pattern,
                fit: fit,
                occasion: occasion,
                url: url,
                sort: sort
            },
            success: function (data) {
                $('.filter_products').html(data);
            }
        });
    });

    $(".sleeve").on('click', function () {
        var fabric = get_filter_fabric(this);
        var sleeve = get_filter_sleeve(this);
        var pattern = get_filter_pattern(this);
        var fit = get_filter_fit(this);
        var occasion = get_filter_occasion(this);

        // alert(filter);
        var sort = $("#sort option:selected").val();
        var url = $("#url").val();
        $.ajax({
            url: url,
            method: 'post',
            data: {
                sleeve: sleeve,
                fabric: fabric,
                pattern: pattern,
                fit: fit,
                occasion: occasion,
                url: url,
                sort: sort
            },
            success: function (data) {
                $('.filter_products').html(data);
            }
        });
    });

    $(".pattern").on('click', function () {
        var fabric = get_filter_fabric(this);
        var sleeve = get_filter_sleeve(this);
        var pattern = get_filter_pattern(this);
        var fit = get_filter_fit(this);
        var occasion = get_filter_occasion(this);

        // alert(filter);
        var sort = $("#sort option:selected").val();
        var url = $("#url").val();
        $.ajax({
            url: url,
            method: 'post',
            data: {
                sleeve: sleeve,
                fabric: fabric,
                pattern: pattern,
                fit: fit,
                occasion: occasion,
                url: url,
                sort: sort
            },
            success: function (data) {
                $('.filter_products').html(data);
            }
        });
    });

    $(".fit").on('click', function () {
        var fabric = get_filter_fabric(this);
        var sleeve = get_filter_sleeve(this);
        var pattern = get_filter_pattern(this);
        var fit = get_filter_fit(this);
        var occasion = get_filter_occasion(this);

        // alert(filter);
        var sort = $("#sort option:selected").val();
        var url = $("#url").val();
        $.ajax({
            url: url,
            method: 'post',
            data: {
                sleeve: sleeve,
                fabric: fabric,
                pattern: pattern,
                fit: fit,
                occasion: occasion,
                url: url,
                sort: sort
            },
            success: function (data) {
                $('.filter_products').html(data);
            }
        });
    });

    $(".occasion").on('click', function () {
        var fabric = get_filter_fabric(this);
        var sleeve = get_filter_sleeve(this);
        var pattern = get_filter_pattern(this);
        var fit = get_filter_fit(this);
        var occasion = get_filter_occasion(this);

        // alert(filter);
        var sort = $("#sort option:selected").val();
        var url = $("#url").val();
        $.ajax({
            url: url,
            method: 'post',
            data: {
                sleeve: sleeve,
                fabric: fabric,
                pattern: pattern,
                fit: fit,
                occasion: occasion,
                url: url,
                sort: sort
            },
            success: function (data) {
                $('.filter_products').html(data);
            }
        });
    });


    function get_filter_fabric() {
        var fabric = [];
        // alert(fabric);
        $('input[name="fabric[]"]:checked').each(function () {
            fabric.push($(this).val());
        });
        return fabric;
    }

    function get_filter_sleeve() {
        var sleeve = [];
        // alert(sleeve);
        $('input[name="sleeve[]"]:checked').each(function () {
            sleeve.push($(this).val());
        });
        return sleeve;
    }

    function get_filter_pattern() {
        var pattern = [];
        // alert(pattern);
        $('input[name="pattern[]"]:checked').each(function () {
            pattern.push($(this).val());
        });
        return pattern;
    }

    function get_filter_fit() {
        var fit = [];
        // alert(fit);
        $('input[name="fit[]"]:checked').each(function () {
            fit.push($(this).val());
        });
        return fit;
    }

    function get_filter_occasion() {
        var occasion = [];
        // alert(occasion);
        $('input[name="occasion[]"]:checked').each(function () {
            occasion.push($(this).val());
        });
        return occasion;
    }

    // $("#size").change(function(){
    //     alert('adsfsdf');
    // });
    $("#size").on('change', function () {
        var route = $(this).attr('route');
        var att_id = $(this).val();
        $.ajax({
            url: route,
            method: 'post',
            data: {
                att_id: att_id
            },
            success: function (resp) {
                // alert(resp.disc_price);
                // alert(resp.attr_disc.price);
                if (resp.disc_price > 0) {
                    $("#cut_price").html('<del>$ ' + resp.attr_disc.price + '</del>');
                    $(".get_price").html('$ ' + resp.disc_price);

                } else {
                    $(".get_price").html('$ ' + resp.attr_disc.price);

                }
                // $(".get_price").html('$ ' + resp);
            },
            error: function () {
                // alert("Error");
                alert('Please select size');
            }
        });
    });


    var url = window.location.href;
    var parts = url.split("/");
    var last_parts = parts[parts.length - 1];
    var edit = parts[parts.length - 2];
// alert(edit);
    if (last_parts == 'invalid' ||last_parts == 'fail' ||last_parts == 'success' || edit == 'order-details' ||last_parts == 'orders' || last_parts == 'cart' || last_parts == 'login-register' || last_parts == 'forgot_password' || last_parts == 'my_account' || last_parts == 'checkout' || last_parts == 'add_delivery_address' || last_parts == 'edit_delivery_address' || edit == 'edit-delivery-address' || last_parts == 'thanks') {
        $("#side_bars").css("display", "none");
    }


    $(document).on('click', '.item_update', function () {
        if ($(this).hasClass('cart_quantity_down')) {
            var quantity = $(this).prev().val();
            // alert(quantity);
            if (quantity <= 1) {
                alert("Item quantity must be 1 or greater");
                return false;
            } else {
                new_qty = parseInt(quantity) - 1;
            }
        }
        if ($(this).hasClass('cart_quantity_up')) {
            var quantity = $(this).prev().prev().val();
            // alert(quantity);
            new_qty = parseInt(quantity) + 1;
        }
        // alert(new_qty);

        var cartid = $(this).data('cartid');
        // alert(cartid);
        var url = $(this).attr('url');
        // alert(url);
        $.ajax({
            url: url,
            method: 'post',
            data: {
                new_qty: new_qty,
                cartid: cartid
            },
            success: function (resp) {
                if (resp.status == false) {
                    alert(resp.message);
                }
                // alert(resp.total_cart_items);
                $(".total_cart_itm").html('<span>(' + resp.total_cart_items + ')</span>');
                $("#update_cart").html(resp.view);
            },
            error: function () {
                alert("Error");
            }
        });



    });

    // $("#delete_pr_cart").on('click',function(){
    //     alert('asdfsdf');
    // });
    $(document).on('click', '#delete_pr_cart', function () {
        // alert('asdfsd');
        var route = $(this).attr('route');
        var cartid = $(this).data('cartid');
        // alert(cartid);
        var result = confirm('You want to delete this item from cart');
        if (result) {
            $.ajax({
                url: route,
                method: 'post',
                data: {
                    cartid: cartid
                },
                success: function (resp) {
                    $(".total_cart_itm").html('<span>(' + resp.total_cart_items + ')</span>');
                    $("#update_cart").html(resp.view);
                },
                error: function () {
                    alert("Error");
                }
            });
        }
    });



    $("#signupForm").validate({

        rules: {
            // firstname: "required",
            // lastname: "required",
            name: {
                required: true,
                minlength: 2
            },
            password: {
                required: true,
                minlength: 6
            },
            mobile: {
                required: true,
                minlength: 11,
            },
            email: {
                required: true,
                email: true,
                remote: 'check_email'
            },
            topic: {
                required: "#newsletter:checked",
                minlength: 2
            },
            agree: "required"
        },
        messages: {
            firstname: "Please enter your firstname",
            lastname: "Please enter your lastname",
            name: {
                required: "Please enter your name",
                minlength: "Your username must consist of at least 2 characters"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long"
            },
            mobile: {
                required: "Please provide a phone number",
                minlength: "Your phone number must be 11 characters",
                // equalTo: "Please enter the same password as above"
            },
            email: {
                required: "Please enter a valid email address",
                remote: "The email is already exists"
            },

        }
    });


    $("#login_form").validate({

        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 6
            },
            agree: "required"
        },
        messages: {
            email: {
                required: "Please enter a valid email address",
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long"
            },

        },
        errorPlacement: function (error, element) {
            if (element.attr("name") == "agree") {
                error.appendTo("#append");
            } else {
                error.insertAfter(element);
            }
        }

    });



    // update my account 

    $("#update_account").validate({

        rules: {
            name: {
                required: true,
            },
            mobile: {
                required: true,
            },
        },
        messages: {
            name: {
                required: "Please enter your name",
            },
            mobile: {
                required: "Please enter a valid mobile number",
            },

        }

    });

    // update password

    $("#update_password").validate({

        rules: {
            current_password: {
                required: true,
                minlength: 6,
                maxlength: 20
            },
            new_password: {
                required: true,
                minlength: 6,
                maxlength: 20
            },
            confirm_password: {
                required: true,
                minlength: 6,
                maxlength: 20,
                equalTo: "#new_password"
            },
        }

    });

    // jquery form validation end


    // check current password

    $("#current_password").keyup(function () {
        var current_password = $(this).val();
        var route = $(this).attr('route');
        // alert(route);

        $.ajax({
            url: route,
            type: 'post',
            data: {
                current_password: current_password
            },
            success: function (resp) {
                // alert(resp);
                if (resp == 'false') {
                    $("#cnt_err").html("<font style='color:red'>Current Password doesnt match.</font>");
                } else {
                    $("#cnt_err").html("<font style='color:green'>Current Password is correct.</font>");
                }
            },
            error: function () {
                alert("Error");
            }

        });

    });

    //  $("#coupon_code").on('click',function(){
    //     $("#coupon_input").show();
    //  });
    $("#coupon_code").click(function () {
        if ($(this).is(":checked")) {
            $("#coupon_input").show(300);
        } else {
            $("#coupon_input").hide(200);
        }
    });

    $("#coupon_form").submit(function () {
        // alert('asdfsdaf');
        var code_input = $("#code_input").val();
        var action = $(this).attr('act');
        // alert(code_input);return false;
        var user = $(this).attr('user');
        // alert(user);return false;

        if (user == 1) {
            $.ajax({
                url: action,
                method: 'post',
                data: {
                    code_input: code_input
                },
                success: function (resp) {
                    alert(resp.message);

                    $(".total_cart_itm").html('<span>(' + resp.total_cart_items + ')</span>');
                    $("#update_cart").html(resp.view);
                    if (resp.grand_total !=null) {
                        $(".total_amount").html('$ '+resp.grand_total);
                    }
                    if (resp.coupon_amount >= 0) {
                        // alert(resp.coupon_amount);
                        $(".coupon_amount").html('$ ' + resp.coupon_amount);
                    } else {
                        $(".coupon_amount").html('$ 0');
                    }

                },
                error: function () {
                    alert("Error");
                }
            });
        } else {
            alert('Please login and try again.');
        }
        // alert(user);return false;

    });

    $(document).on('click','.delete_delivery_address',function(){
        var result = confirm("Are you sure, you want to delete?");
        if (!result) {
            return false;
        }
    });

    $("input[name=address_id]").bind('change',function(){
        var shipping_charges = $(this).attr('shipping_charges');
        var total_price = $(this).attr('total_price');
        var coupon_amount = $(this).attr('coupon_amount');
        // alert(coupon_amount);
        if (coupon_amount =="") {
            coupon_amount = 0;
        }

        $(".shipping_charges").html('$ '+shipping_charges);

        var total_amount = parseInt(total_price) + parseInt(shipping_charges) - parseInt(coupon_amount);
        $(".total_amount").html('$ '+total_amount);

    });

});
