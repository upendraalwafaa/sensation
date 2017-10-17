var url_name = document.location.href;
var url_name = document.location.href;
var newservice_div = $('#newservice_div').attr('last_id');
$('body').on('click', '#newservice_div', function () {
    var attr = 'div_id="' + newservice_div + '" ';
    var div_id = newservice_div;
    var html = '';
    var sl = parseInt(newservice_div) + 1;
    html = html + '<div id="each_service_div_' + div_id + '" ' + attr + ' class="each_service_div">';

    html = html + '<div class="panel panel-primary">';
    html = html + ' <div class="panel-heading">';
    if (div_id != 0) {
        html = html + '<span style="cursor:pointer;" ' + attr + ' class="fa fa-remove pull-right remove_services_div"></span>';
    }
    html = html + '    <h3 class="panel-title">SL No :  &nbsp;' + sl + ' </h3>';
    html = html + '  </div>';
    html = html + '   <div class="panel-body">';
    html = html + '    <div class="row qut_null">';
    html = html + '        <div class="col-md-4">';
    html = html + '           <div class="form-group form-md-line-input has-success">';
    html = html + '              <label for="disipline_name">Category</label>';
    var main_cate = {status: 'get_category_details'};
    $.ajax({
        url: base_url + "Home/reg_outside_helper",
        data: main_cate,
        type: 'POST',
        async: false,
        success: function (data) {
            var cat_json = jQuery.parseJSON(data);
            html = html + '  <select ' + attr + ' id="category_change_' + div_id + '" class="form-control category_change">';
            html = html + '<option value="">--select--</option>';
            for (var i = 0; i < cat_json.length; i++) {
                var p = cat_json[i];
                html = html + ' <option value="' + p.id + '">' + p.category_name + '</option>';
            }
            html = html + '               </select>';
        }
    });


    html = html + '           </div>';
    html = html + '      </div>';
    html = html + '      <div class="col-md-4">';
    html = html + '          <div class="form-group form-md-line-input has-success">';
    html = html + '              <label for="service_details">Services</label>';
    html = html + '  <div id="subcategory_details_' + div_id + '">          <select class="form-control">';
    html = html + '                <option value="">--select--</option>';
    html = html + '            </select> </div>';
    html = html + '        </div>';
    html = html + '     </div>';
    html = html + '    <div class="col-md-4">';
    html = html + '        <div class="form-group form-md-line-input has-success">';
    html = html + '           <label for="service_details">Staff</label>';

    var main_cate = {status: 'get_staff_details'};
    $.ajax({
        url: base_url + "Home/reg_outside_helper",
        data: main_cate,
        type: 'POST',
        async: false,
        success: function (data) {
            var cat_json = jQuery.parseJSON(data);
            html = html + '  <select ' + attr + ' id="staff_id_' + div_id + '" class="form-control staff_id">';
            html = html + '<option value="">--select--</option>';
            for (var i = 0; i < cat_json.length; i++) {
                var p = cat_json[i];
                html = html + ' <option value="' + p.id + '">' + p.employee_name + '</option>';
            }
            html = html + '               </select>';
        }
    });
    html = html + '      </div>';
    html = html + ' </div>';
    html = html + '</div>';
    html = html + ' <div class="row qut_null">';
    html = html + '    <div class="col-md-4">';
    html = html + '        <div class="form-group form-md-line-input has-success">';
    html = html + '            <label for="disipline_name">Start date</label>';
    html = html + '           <input id="start_date_' + div_id + '" type="text" class="form-control datepicker_dsb">';
    html = html + '       </div>';
    html = html + '   </div>';
    html = html + '  <div class="col-md-4">';
    html = html + '      <div class="form-group form-md-line-input has-success">';
    html = html + '       <label for="service_details">End date</label>';
    html = html + '      <input type="text" id="end_date_' + div_id + '" class="form-control datepicker_dsb">';
    html = html + '    </div>';
    html = html + '</div>';
    html = html + '<div class="col-md-4">';
    html = html + '   <div class="form-group form-md-line-input has-success">';
    html = html + '        <label for="service_details">Amount</label>';
    html = html + '        <input type="text" id="amount_' + div_id + '" class="form-control only_number calculate_price" maxlength="5">';
    html = html + '     </div>';
    html = html + '    </div>';
    html = html + '   </div>';
    html = html + ' </div>';
    html = html + '</div>';


    html = html + '</div>'
    newservice_div++;
    $('#total_services_div').append(html);
});
$('body').on('click', '.remove_services_div', function () {
    var div_id = $(this).attr('div_id');
    $('#each_service_div_' + div_id).remove();
    calculate_all_price();
});

$('body').on('change', '.category_change', function () {
    var div_id = $(this).attr('div_id');
    var category_id = $(this).val();
    get_subcategory_details(div_id, category_id);
});

$('body').on('click', '#save_enroll', function () {
    var json = '';
    json = json + '{';
    var flag = validate_parent_details();
    if (flag == 'false') {
        return false;
    } else {
        json = json + flag;
    }
    var main_ar = [];
    $('.each_service_div').each(function () {
        var div_id = $(this).attr('div_id');
        var temp = get_services_details_by_div_id(div_id);
        main_ar.push(temp)
    });
    json = json + '"main_ar":' + JSON.stringify(main_ar) + ',';
    json = json + '"sub_total":"' + $('#sub_total').text() + '",';
    json = json + '"discount":"' + $('#session_discount').val() + '",';
    json = json + '"update_id":"' + $('#update_id').val() + '",';
    json = json + '"child_id":"' + $('#child_id').val() + '",';
    json = json + '"receipt_no":"' + $('#receipt_no').val() + '",';
    json = json + '"total":"' + $('#total').text() + '"';
    json = json + '}';
    console.log(json);
    Lobibox.confirm({
        msg: 'Are You Sure Want To Submit',
        title: 'Out Side Student Registracion Details',
        callback: function ($this, type) {
            if (type === 'yes') {
                $.ajax({
                    url: base_url + "Home/reg_outsidestudent",
                    async: true,
                    type: 'POST',
                    data: "json=" + encodeURIComponent(json),
                    success: function (data) {
                        var json = jQuery.parseJSON(data);
                        if (json.status == 'success') {
                            $('#success-message').html('Added Successfully');
                            $('.alert-success').show();
                            $('.alert-success').slideDown(500);
                            setTimeout(function () {
                                $('.alert-danger').slideUp(500);
                                window.location = base_url + 'Home/view_outsidestudent';
                            }, 2000);
                        } else {
                            $('.alert-danger').show();
                            $('#success-error').html('Try Again')
                            $('.alert-danger').slideDown(500);
                            setTimeout(function () {
                                $('.alert-danger').slideUp(500);
                            }, 2000);
                        }
                    }
                });
            }
        }
    });

});
$('body').on('keyup', '.calculate_price, #session_discount', function () {
    calculate_all_price();
});
$('body').on('click', '.delete_outside_student', function () {
    var child_id = $(this).attr('child_id');
    var quotation_id = $(this).attr('quotation_id');
    var child_name = $(this).attr('child_name');
    var father_name = $(this).attr('father_name');
    var data = {status: 'delete_outside_student', quotation_id: quotation_id, child_id: child_id};
    Lobibox.confirm({
        msg: 'Are You Sure Want To Delete Parent Name : ' + father_name,
        title: 'Delete Child Name  : ' + child_name,
        callback: function ($this, type) {
            if (type === 'yes') {
                $.ajax({
                    url: base_url + "Home/reg_outside_helper",
                    async: true,
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        window.location = '';
                    }
                });
            }
        }
    });
});






// function decleration   //
function calculate_all_price() {
    var sub_total = 0;
    $('.calculate_price').each(function () {
        var temp = '';
        temp = $(this).val();
        if (temp == '') {
            temp = 0;
        }
        sub_total = sub_total + parseInt(temp);
    });
    $('#sub_total').text(sub_total);
    var discount = $('#session_discount').val();
    if (discount == '') {
        discount = 0;
    }
    var total = parseInt(sub_total) - parseInt(discount);
    $('#total').text(total)
}

function get_services_details_by_div_id(div_id) {
    var temp = {};
    temp["category_id"] = $('#category_change_' + div_id).val();
    temp["subcategory_id"] = $('#subcategory_change_' + div_id).val();
    temp["staff_id"] = $('#staff_id_' + div_id).val();
    temp["start_date"] = $('#start_date_' + div_id).val();
    temp["end_date"] = $('#end_date_' + div_id).val();
    temp["amount"] = $('#amount_' + div_id).val();
    return temp;
}
function get_subcategory_details(div_id, category_id) {
    var main_cate = {status: 'get_sub_category_details', category_id: category_id};
    $.ajax({
        url: base_url + "Home/reg_outside_helper",
        data: main_cate,
        type: 'POST',
        async: false,
        success: function (data) {
            var html = '';
            var cat_json = jQuery.parseJSON(data);
            html = html + '  <select div_id="' + div_id + '" id="subcategory_change_' + div_id + '" class="form-control subcategory_change">';
            html = html + '<option value="">--select--</option>';
            var select = '';
            if (cat_json.length == 1) {
                select = 'selected="selected"';
            }
            if (category_id == 5) {
                $("#amount_" + div_id).val(cat_json[0].fees);
                $("#amount_" + div_id).prop("disabled", true);
            } else {
                $("#amount_" + div_id).prop("disabled", false);
                $("#amount_" + div_id).val('')
            }
            for (var i = 0; i < cat_json.length; i++) {
                var p = cat_json[i];
                html = html + ' <option ' + select + ' value="' + p.id + '">' + p.sub_category_name + '</option>';
            }
            html = html + '               </select>';
            $('#subcategory_details_' + div_id).empty();
            $('#subcategory_details_' + div_id).append(html);
            calculate_all_price();
        }
    });
}
function validate_parent_details() {
    var ele_child_name = $('#child_name');
    var ele_child_birth = $('#child_birth');
    var select_parent_type = $('#parent_type');
    var name = $('#parent_name');
    var email = $('#email');
    var phone = $('#phone');
    var school_name = $('#school_name');
    var dropdowntoggle = $('.dropdown-toggle');
    var json = '';
    if (ele_child_name.val() == '') {
        ele_child_name.css('border-color', 'red');
        ele_child_name.focus();
        return 'false';
    } else {
        ele_child_name.css('border-color', '');
        json = json + '"child_name":"' + ele_child_name.val() + '",';
    }
    if (ele_child_birth.val() == '') {
        ele_child_birth.css('border-color', 'red');
        ele_child_birth.focus();
        return 'false';
    } else {
        ele_child_birth.css('border-color', '');
        json = json + '"child_birth":"' + ele_child_birth.val() + '",';
    }
    if (select_parent_type.val() == '') {
        select_parent_type.css('border-color', 'red');
        select_parent_type.focus();
        return 'false';
    } else {
        select_parent_type.css('border-color', '');
        json = json + '"parent_type":"' + select_parent_type.val() + '",';
    }
    if (name.val() == '') {
        name.css('border-color', 'red');
        name.focus();
        return 'false';
    } else {
        name.css('border-color', '');
        json = json + '"name":"' + name.val() + '",';
    }
    if (email.val() == '') {
        email.css('border-color', 'red');
        email.focus();
        return 'false';
    } else {
        email.css('border-color', '');
        json = json + '"email":"' + email.val() + '",';
    }
    if (phone.val() == '') {
        phone.css('border-color', 'red');
        phone.focus();
        return 'false';
    } else {
        phone.css('border-color', '');
        json = json + '"phone":"' + phone.val() + '",';
    }
    var dsipline = '';
    var dsipline_ar = [];
    $('.discipline_name').each(function () {
        if ($(this).is(":checked")) {
            dsipline = 'Yes';
            dsipline_ar.push($(this).val());
        }
    });

    if (dsipline == '') {
        dropdowntoggle.css('border-color', 'red');
        dropdowntoggle.focus();
        return 'false';
    } else {
        dropdowntoggle.css('border-color', '');
        json = json + '"dsipline_ar":"' + dsipline_ar + '",';
    }

    if ($('[name=school_attinding]:checked').val() == undefined) {
        $('.school_attinding').css('color', 'red');
        phone.focus();
        return 'false';
    } else {
        $('.school_attinding').css('color', '');
        json = json + '"school_attinding":"' + $('[name=school_attinding]:checked').val() + '",';
        json = json + '"school_name":"' + school_name.val() + '",';
        if ($('[name=school_attinding]:checked').val() == 'Yes') {
            if (school_name.val() == '') {
                school_name.css('border-color', 'red');
                school_name.focus();
                return 'false';
            } else {
                school_name.css('border-color', '');
            }
        }
    }
    if ($('[name=gender]:checked').val() == undefined) {
        $('.elec_gender').css('color', 'red');
        phone.focus();
        return 'false';
    } else {
        $('.elec_gender').css('color', '');
        json = json + '"gender":"' + $('[name=gender]:checked').val() + '",';
    }
    if ($('[name=session_type]:checked').val() == undefined) {
        $('.session_type').css('color', 'red');
        phone.focus();
        return 'false';
    } else {
        $('.session_type').css('color', '');
        json = json + '"session_type":"' + $('[name=session_type]:checked').val() + '",';
    }
    json = json + '"about_sensation":"' + $('#about_sensation').val() + '",';
    return json;
}
var urlar = url_name.split('/');
if (urlar[6] == undefined || urlar[6] == '') {
    $('#newservice_div').click();
}