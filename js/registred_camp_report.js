$('body').on('keyup', '#camp_report_search_name', function () {
    var value = $(this).val();
    if (value == '') {
        $('.dd-list-na1').empty();
        $('.alldropdown').hide(500);
        return false;
    }
    var data = {status: 'search_child_name', value: value};
    $.ajax({
        url: base_url + "Home/common",
        async: false,
        data: data,
        type: 'POST',
        success: function (data) {
            var json = jQuery.parseJSON(data);
            $('.dd-list-na1').empty();
            var html = '';
            for (var i = 0; i < json.length; i++) {
                var d = json[i];
                var tmp = d.date_of_birth.split('-');
                var date_of_birth = tmp[2] + '/' + tmp[1] + '/' + tmp[0];
                var attr = 'child_id="' + d.id + '" child_name="' + d.child_name + '" father_name="' + d.father_name + '" mother_name="' + d.mother_name + '" date_of_birth="' + date_of_birth + '" gender="' + d.gender + '" father_mobile="' + d.father_mobile + '"';
                html = html + '<a ' + attr + ' class="slectt_child_camp"  title="Child Name :  ' + d.child_name + ' Parent Name :  ' + d.father_name + '"> <li> ' + d.child_name + ' [  ' + d.father_name + ' ]</li></a>';
            }
            $('.dd-list-na1').append(html);
            $('.alldropdown').show(500);
        }
    });
});

$('body').on('click', '.slectt_child_camp', function () {
    $('.dd-list-na1').empty();
    $('.alldropdown').hide(500);
    $('#child_details').show();
    $('#child_name').text($(this).attr('child_name'));
    $('#father_name').text($(this).attr('father_name'));
    $('#mother_name').text($(this).attr('mother_name'));
    $('#date_of_birht').text($(this).attr('date_of_birth'));
    $('#gender').text($(this).attr('gender'));
    $('#father_mobile_no').text($(this).attr('father_mobile'));
    $('#child_id').val($(this).attr('child_id'))
});
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
    var main_cate = {status: 'get_category_details_with_report'};
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
    json = json + '"about_sensation":"' + $('#note').val() + '",';
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
                    url: base_url + "Home/add_campreports",
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
                                window.location = base_url + 'Home/view_camp_reports';
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
    var quotation_id = $(this).attr('quotation_id');
    var child_name = $(this).attr('child_name');
    var father_name = $(this).attr('father_name');
    var data = {status: 'delete_camp_reports_student', quotation_id: quotation_id};
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






var urlar = url_name.split('/');
if (urlar[6] == undefined || urlar[6] == '') {
    $('#newservice_div').click();
}


///  function //

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
function validate_parent_details() {
    var json = '';
    var child_id = $('#child_id');
    var camp_report_search_name = $('#camp_report_search_name');
    if (child_id.val() == '') {
        camp_report_search_name.css('border-color', 'red');
        camp_report_search_name.focus();
        return 'false';
    } else {
        child_id.css('border-color', '');
    }
    return json;
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