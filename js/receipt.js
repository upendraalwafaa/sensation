$('body').on('change', '#receipt_by_name', function () {
    var value = $(this).val();
    var href = base_url + 'Home/create_receipt/' + value;
    window.location = href;
//    if (value == '') {
//        $('.alldropdown').hide(500);
//        $('.dd-list-3').empty();
//        return false;
//    }
//    var data = {status: 'search_child_name', value: value};
//    $.ajax({
//        url: base_url + "Home/common",
//        async: true,
//        type: 'POST',
//        data: data,
//        success: function (data) {
//            var json = jQuery.parseJSON(data);
//            console.log(json);
//            var html = '';
//            $('.dd-list-3').empty();
//            for (var i = 0; i < json.length; i++) {
//                var d = json[i];
//                var href = base_url + 'Home/create_receipt/' + d.id;
//                html = html + '  <a href="' + href + '" title="Child Name : ' + d.child_name + ' Parent Name : ' + d.father_name + '"> <li >' + d.child_name + ' [ ' + d.father_name + ' ]</li></a>';
//            }
//            $('.dd-list-3').append(html);
//            $('.alldropdown').show(500);
//        }
//    });
});
$('body').on('click', '.selected_checkbox', function () {
    var total_length = $('input:checkbox.selected_checkbox:checked').length;
    // var quotation_amount = $('.quotation_amount').val();
    var excess_amount = $('#excess_amount').val();
    var prev_pay = $('.alredy_paid').val();
    $('#refound_amount').val('');
    if (prev_pay == undefined) {
        prev_pay = 0;
    }
    if (total_length > 0) {
        $('#form_payment').hide(500);
        $('#form_area').show(500);
    } else {
        $('#form_area').hide(500);
        $('#form_payment').show(500);
        $('#edit_box_div').hide();
    }
    var sum = 0;
    var arr = [];
    $('input:checkbox.selected_checkbox:checked').each(function () {
        var amount = $(this).attr('amount');
        sum = parseInt(sum) + parseInt(amount);
        arr.push(amount);
    });
    if (sum > excess_amount) {
        check_refund_mode_div();
        if (excess_amount > 0) {
            var total = parseInt(sum) - parseInt(excess_amount);
        } else {
            var total = sum;
        }
        $('#refound_amount').val(total);
    } else {
        hide_refund_div();
    }
    set_edit_box_table();
});



$('body').on('click', '#submit_payment', function () {
    var json = '';
    json = json + '{';
    var payable_amount = $('#payable_amount');
    var payable_amount_val = payable_amount.val()
    if (payable_amount_val == '') {
        payable_amount.css('border-color', 'red');
        payable_amount.focus();
        return false;
    } else {
        if ($.isNumeric(payable_amount_val)) {
        } else {
            payable_amount.css('border-color', 'red');
            return false;
        }
        if (payable_amount_val == 0) {
            payable_amount.css('border-color', 'red');
            return false;
        }
        payable_amount.css('border-color', '');
    }

    var discount = $('#discount').val();
    json = json + '"discount":"' + discount + '",';
    json = json + '"why_discount":"' + $('#why_discount').val() + '",';
    json = json + '"payable_amount":"' + payable_amount_val + '",';
    json = json + '"quotation_id":"' + $('#quotation_id').val() + '",';
    json = json + '"paid_by":"' + $('#paid_by').val() + '",';
    json = json + '"notes":"' + $('#notes').val() + '",';
    json = json + '"receipt_no":"' + $('#receipt_no').val() + '"';
    json = json + '}';
    console.log(json);
    var data = {status: 'save_receipt_details', json: json};
    Lobibox.confirm({
        msg: 'Are You Sure Want To Save This Receipt',
        title: 'Receipt Details',
        callback: function ($this, type) {
            if (type === 'yes') {
                $.ajax({
                    url: base_url + "Home/receipt_helper",
                    async: true,
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        var json = jQuery.parseJSON(data);
                        window.location = '';
                    }
                });
            }
        }
    });
});
$('body').on('keyup', '#discount', function () {
    var value = $(this).val();
    show_hide_discount_div(value);
});
if ($('#discount').val() > 0) {
    show_hide_discount_div($('#discount').val());
}
$('#quotation_cancel_btn').click(function () {
    var arr = [];
    var json = '';
    json = json + '{';
    var update_id = [];
    $('input:checkbox.selected_checkbox:checked').each(function () {
        var amount = $(this).attr('amount');
        arr.push(amount);
        update_id.push($(this).attr('session_tbl_id'))

    });
    var refound_amount = $('#refound_amount').val();
    if ($('#refound_amount').val() == undefined) {
        refound_amount = 0;
    }

    json = json + '"amount_ar":"' + arr + '",';
    json = json + '"session_tbl_id":"' + update_id + '",';
    json = json + '"deleted_messages":"' + $('#messages').val() + '",';
    json = json + '"quotation_id":"' + $('#quotation_id').val() + '",';
    json = json + '"refound_amount":"' + refound_amount + '",';
    json = json + '"refund_mode":"' + $('#refund_mode').val() + '",';
    json = json + '"receipt_no":"' + $('#receipt_no').val() + '"';
    json = json + '}';
    var data = {status: 'cancel_quotation_details', json: json};
    Lobibox.confirm({
        msg: 'Are You Sure Want To Cancel This Session',
        title: 'Receipt Balance Update',
        callback: function ($this, type) {
            if (type === 'yes') {
                // $('#quotation_cancel_btn').hide();
                console.log(data);
                $.ajax({
                    url: base_url + "Home/receipt_helper",
                    async: true,
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        var json = jQuery.parseJSON(data);
                        if (json.status == 'success') {
                            $('#success-message').html('Added Successfully');
                            $('.alert-success').show();
                            $('.alert-success').slideDown(500);
                            setTimeout(function () {
                                $('.alert-danger').slideUp(500);
                                window.location = '';
                            }, 2000);
                        }

                    }
                });
            }
        }
    });
});
$('body').on('change', '#input_student_name', function () {
    var value = $(this).val();
    var href = base_url + 'Home/view_child_details/' + value;
    window.location = href;
//    if (value == '') {
//        $('.dd-list-na').empty();
//        $('.alldropdown').hide(500);
//        return false;
//    }
//    var data = {status: 'search_child_name', value: value};
//    $.ajax({
//        url: base_url + "Home/common",
//        async: true,
//        type: 'POST',
//        data: data,
//        success: function (data) {
//            var json = jQuery.parseJSON(data);
//            console.log(json);
//            var html = '';
//            $('.dd-list-na').empty();
//            for (var i = 0; i < json.length; i++) {
//                var d = json[i];
//                var href = base_url + 'Home/view_child_details/' + d.id;
//                html = html + '  <a href="' + href + '" title="Child Name : ' + d.child_name + ' Parent Name : ' + d.father_name + '"> <li >' + d.child_name + ' [ ' + d.father_name + ' ]</li></a>';
//            }
//            $('.alldropdown').show(500);
//            $('.dd-list-na').append(html);
//        }
//    });
});
$('body').on('click', '.view_payment_histody', function () {
    var quotation_id = $(this).attr('quotation_id');
    if ($('#smaple_1_' + quotation_id).css('display') == 'none') {
        $('#smaple_1_' + quotation_id).show(500);
    } else {
        $('#smaple_1_' + quotation_id).hide(500);
    }
});
$('body').on('click', '.close_tbl', function () {
    var quotation_id = $(this).attr('quotation_id');
    $('#smaple_1_' + quotation_id).hide(500);
});
$('body').on('click', '.view_session_histody', function () {
    var quotation_id = $(this).attr('quotation_id');
    if ($('#session_details_' + quotation_id).css('display') == 'none') {
        $('#session_details_' + quotation_id).show(500);
    } else {
        $('#session_details_' + quotation_id).hide(500);
    }
});
$('body').on('click', '.session_histody_rmv', function () {
    var quotation_id = $(this).attr('quotation_id');
    $('#session_details_' + quotation_id).hide(500);
});
function check_refund_mode_div() {
    $('#refund_mode_div').show(500);
}
function hide_refund_div() {
    $('#refund_mode_div').hide(500);
}






//  Edit Session Details //

function show_hide_discount_div(value) {
    if (value) {
        $('#why_discount_div').show(500);
    } else {
        $('#why_discount_div').hide(500);
    }
}
function set_edit_box_table() {
    var html = '';
    var data = {status: 'get_employee_list_for_edit_session'};
    $.ajax({
        url: base_url + "Home/receipt_helper",
        async: false,
        type: 'POST',
        data: data,
        success: function (data) {
            var json = jQuery.parseJSON(data);
            var emp = json.emp;
            var div_id = 1;

            $('input:checkbox.selected_checkbox:checked').each(function () {
                var attr = 'div_id="' + div_id + '"';
                var start_time = $(this).attr('start_time');
                var end_time = $(this).attr('end_time');
                var date = $(this).attr('date');
                var staff_id = $(this).attr('staff_id');
                var db_id = $(this).attr('session_tbl_id');
                html = html + '     <tr ' + attr + ' db_id="' + db_id + '" class="selected_edit_tr">';
                html = html + '   <td>' + div_id + '</td>';
                html = html + '   <td>';
                html = html + '       <select id="staff_id_' + div_id + '" ' + attr + ' class="form-control avility_show_receipt">';
                html = html + '          <option>--Select--</option>';
                for (var e = 0; e < emp.length; e++) {
                    var d = emp[e];
                    var select = '';
                    if (staff_id == d.id) {
                        select = 'selected="selected"';
                    }
                    html = html + ' <option ' + select + ' value=' + d.id + '>' + d.employee_name + '</option>';
                }
                html = html + '      </select>';
                html = html + '   </td>';
                html = html + '   <td><input id="session_date_' + div_id + '" ' + attr + ' type="text" value="' + date + '" class="datepicker_dsb form-control avility_show_receipt"></td>';
                html = html + '   <td>';
                html = html + '     <select id="start_time_' + div_id + '" ' + attr + ' class="form-control avility_show_receipt">';
                html = html + '<option value="">--select--</option>';
                html = html + print_time(start_time);
                html = html + '    </select>';
                html = html + '   </td>';
                html = html + '   <td>';
                html = html + '      <select id="end_time_' + div_id + '" ' + attr + ' class="form-control avility_show_receipt">';
                html = html + '<option value="">--select--</option>';
                html = html + print_time(end_time);
                html = html + '     </select>';
                html = html + '   </td>';
                html = html + '   <td >';
                html = html + '     <a ' + attr + ' db_id="' + db_id + '" class="make_it_not_attend" id="not_attent_id_' + div_id + '" title="Click here to make the staff free ">Click here</a>';
                html = html + '   </td>';
                html = html + '   <td >';
                html = html + '     <a style="display:none;" id="tooltrip_id_' + div_id + '"  data-toggle="tooltip" data-placement="top" title="Hooray!"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></a>';
                html = html + '   </td>';
                html = html + '   </tr>';
                div_id++;
            });
            $('#edit_box_tbody').empty();
            $('#edit_box_tbody').append(html);
        }
    });
}


$('body').on('click', '.make_it_not_attend', function () {
    var db_id = $(this).attr('db_id');
    var div_id = $(this).attr('div_id');
    var data = {status: 'make_it_child_not_attended', db_id: db_id};
    Lobibox.confirm({
        msg: 'Do You Want To Make It Not Attended And Free Staff',
        title: 'Child And Staff Details',
        callback: function ($this, type) {
            if (type === 'yes') {
                $.ajax({
                    url: base_url + "Home/receipt_helper",
                    async: true,
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        $('#start_time_' + div_id).empty();
                        $('#end_time_' + div_id).empty();
                        var html = '<option value="00:00">00:00 </option>'
                        $('#start_time_' + div_id).append(html);
                        $('#end_time_' + div_id).append(html);
                    }
                });
            }
        }
    });
});
$('body').on('click', '#edit_session_details', function () {
    if ($('#edit_box_div').css('display') == 'none') {
        $('#edit_box_div').show(500);
    } else {
        $('#edit_box_div').hide(500);
    }
});
$('body').on('change', '.avility_show_receipt', function () {
    var div_id = $(this).attr('div_id');
    var session_date = $('#session_date_' + div_id).val();
    var start_time = $('#start_time_' + div_id).val();
    var end_time = $('#end_time_' + div_id).val();
    var staff_id = $('#staff_id_' + div_id).val();
    var data = {status: 'chnage_date_and_time_quotation_details', session_date: session_date, start_time: start_time, end_time: end_time, staff_id: staff_id};
    $.ajax({
        url: base_url + "Home/common",
        async: true,
        type: 'POST',
        data: data,
        success: function (data) {
            var json = jQuery.parseJSON(data);
            if (json.status == 'busy') {
                $('#tooltrip_id_' + div_id).attr('title', json.message);
                $('#tooltrip_id_' + div_id).show(500);
                add_removeclas_for_avlity('add', div_id);
                error_show_tooltrip();
            } else {
                $('#tooltrip_id_' + div_id).hide(500);
                add_removeclas_for_avlity('remove', div_id);
            }
        }
    });
});
$('body').on('click', '#submit_edit_session', function () {
    var erroe_length = $('.avility_show_msg').length;
    if (erroe_length > 0) {
        $('#error-message').html('Please select the vaild date and time');
        $('.alert-danger').show();
        $('.alert-danger').slideDown(500);
        setTimeout(function () {
            $('.alert-danger').slideUp(500);
        }, 2000);
        return false;
    }
    var main_ar = [];
    var flag = '';
    $('.selected_edit_tr').each(function () {
        var div_id = $(this).attr('div_id');
        var start_time = $('#start_time_' + div_id).val();
        var end_time = $('#end_time_' + div_id).val();
        if (start_time >= end_time) {
            flag = 'false';
            return false;
        }
        var temp = {};
        temp['staff_id'] = $('#staff_id_' + div_id).val();
        temp['date'] = $('#session_date_' + div_id).val();
        temp['db_id'] = $(this).attr('db_id');
        temp['start_time'] = start_time;
        temp['end_time'] = end_time;
        main_ar.push(temp);
    });
    if (flag == 'false') {
        alert('Plase select a valid time');
        return false;
    }
    console.log(main_ar);
    var data = {status: 'session_reset_details', main_ar: JSON.stringify(main_ar)};
    Lobibox.confirm({
        msg: 'Are you sure want to reset this session',
        title: 'Session Reset Details',
        callback: function ($this, type) {
            if (type === 'yes') {
                $.ajax({
                    url: base_url + "Home/receipt_helper",
                    async: true,
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        var json = jQuery.parseJSON(data);
                        if (json.status == 'success') {
                            $('#success-message').html('Added Successfully');
                            $('.alert-success').show();
                            $('.alert-success').slideDown(500);
                            setTimeout(function () {
                                $('.alert-danger').slideUp(500);
                                window.location = '';
                            }, 2000);
                        } else if (json.status == 'busy') {
                            $('#error-message').html(json.message);
                            $('.alert-danger').show();
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
function add_removeclas_for_avlity(type, div_id) {
    if (type == 'add') {
        $('#session_date_' + div_id).addClass('avility_show_msg');
        $('#start_time_' + div_id).addClass('avility_show_msg');
        $('#end_time_' + div_id).addClass('avility_show_msg');
        $('#staff_id_' + div_id).addClass('avility_show_msg');
    } else {
        $('#session_date_' + div_id).removeClass('avility_show_msg');
        $('#start_time_' + div_id).removeClass('avility_show_msg');
        $('#end_time_' + div_id).removeClass('avility_show_msg');
        $('#staff_id_' + div_id).removeClass('avility_show_msg');
    }
}
function error_show_tooltrip() {
    $('[data-toggle="tooltip"]').tooltip();
}