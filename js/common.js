var url_name = document.location.href;
$('#category_add').click(function () {
    var json = '';
    var json = json + '{';
    if ($('#category_name').val() == '') {
        $('#category_name').css('border-color', 'red');
        return false;
    } else {
        $('#category_name').css('border-color', '');
        json = json + '"category_name":"' + $('#category_name').val() + '",';
    }
    json = json + '"view_type":"' + $('input[name=view_type]:checked').val() + '",';
    json = json + '"category_id":"' + $('#category_id').val() + '"';
    var json = json + '}';
    $.ajax({
        url: "add_category",
        async: true,
        type: 'POST',
        data: "json=" + encodeURIComponent(json),
        success: function (data) {
            var json = jQuery.parseJSON(data);
            if (json.status == 'success') {
                $('#success-message').html('Category Added Successfully');
                $('.alert-success').show();
                $('.alert-success').slideDown(500);
                setTimeout(function () {
                    $('.alert-danger').slideUp(500);
                    window.location = base_url + 'Home/view_category';
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
});
$('body').on('click', '.main_delete_category', function () {
    var category_id = $(this).attr('category_id');
    var category_name = $(this).attr('category_name');
    var data = {status: 'delete_main_category', category_id: category_id};
    Lobibox.confirm({
        msg: 'Are you sure you want to delete this item? ',
        title: 'Note : Subcategory also get delete if you confirm',
        callback: function ($this, type) {
            if (type === 'yes') {
                $.ajax({
                    url: base_url + "Home/common",
                    async: true,
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        var json = jQuery.parseJSON(data);
                        if (json.status == 'success') {
                            window.location = '';
                        }
                    }
                });
            }
        }
    });

});
$('#disipline_add').click(function () {
    var json = '';
    var json = json + '{';
    if ($('#disipline_name').val() == '') {
        $('#disipline_name').css('border-color', 'red');
        return false;
    } else {
        $('#disipline_name').css('border-color', '');
        json = json + '"disipline_name":"' + $('#disipline_name').val() + '",';
    }
    json = json + '"description":"' + $('#description').val() + '",';
    json = json + '"disipline_id":"' + $('#disipline_id').val() + '"';
    var json = json + '}';
    $.ajax({
        url: "disipline",
        async: true,
        type: 'POST',
        data: "json=" + encodeURIComponent(json),
        success: function (data) {
            var json = jQuery.parseJSON(data);
            if (json.status == 'success') {
                $('#success-message').html('Disipline Added Successfully');
                $('.alert-success').show();
                $('.alert-success').slideDown(500);
                setTimeout(function () {
                    $('.alert-danger').slideUp(500);
                    window.location = base_url + 'Home/view_disipline';
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
});
$('body').on('click', '.main_delete_disipline', function () {
    var disipline_id = $(this).attr('disipline_id');
    var disipline_name = $(this).attr('disipline_name');
    var data = {status: 'delete_main_disipline', disipline_id: disipline_id};
    Lobibox.confirm({
        msg: 'Are You Sure Want To Delete This Disipline : ' + disipline_name,
        title: 'Delete Disipline',
        callback: function ($this, type) {
            if (type === 'yes') {
                $.ajax({
                    url: base_url + "Home/common",
                    async: true,
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        var json = jQuery.parseJSON(data);
                        if (json.status == 'success') {
                            window.location = '';
                        }
                    }
                });
            }
        }
    });

});
$('#designation_add').click(function () {
    var json = '';
    var json = json + '{';
    if ($('#designation_name').val() == '') {
        $('#designation_name').css('border-color', 'red');
        return false;
    } else {
        $('#designation_name').css('border-color', '');
        json = json + '"designation_name":"' + $('#designation_name').val() + '",';
    }
    json = json + '"description":"' + $('#description').val() + '",';
    json = json + '"designation_id":"' + $('#designation_id').val() + '"';
    var json = json + '}';
    $.ajax({
        url: "designation",
        async: true,
        type: 'POST',
        data: "json=" + encodeURIComponent(json),
        success: function (data) {
            var json = jQuery.parseJSON(data);
            if (json.status == 'success') {
                $('#success-message').html('Designation Added Successfully');
                $('.alert-success').show();
                $('.alert-success').slideDown(500);
                setTimeout(function () {
                    $('.alert-danger').slideUp(500);
                    window.location = base_url + 'Home/view_designation';
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
});
$('body').on('click', '.main_designation_disipline', function () {
    var designation_id = $(this).attr('designation_id');
    var designation_name = $(this).attr('designation_name');
    var data = {status: 'delete_main_designation', designation_id: designation_id};
    Lobibox.confirm({
        msg: 'Are You Sure Want To Delete This Designation : ' + designation_name,
        title: 'Delete Designation',
        callback: function ($this, type) {
            if (type === 'yes') {
                $.ajax({
                    url: base_url + "Home/common",
                    async: true,
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        var json = jQuery.parseJSON(data);
                        if (json.status == 'success') {
                            window.location = '';
                        }
                    }
                });
            }
        }
    });

});

$('#add_subcategory').click(function () {
    var json = '';
    var json = json + '{';
    if ($('#category').val() == '') {
        $('#category').css('border-color', 'red');
        return false;
    } else {
        $('#category').css('border-color', '');
        json = json + '"category":"' + $('#category').val() + '",';
    }
    if ($('#subcategory').val() == '') {
        $('#subcategory').css('border-color', 'red');
        return false;
    } else {
        $('#subcategory').css('border-color', '');
        json = json + '"subcategory":"' + $('#subcategory').val() + '",';
    }
    json = json + '"sub_category_id":"' + $('#sub_category_id').val() + '"';
    var json = json + '}';
    $.ajax({
        url: "add_subcategory",
        async: true,
        type: 'POST',
        data: "json=" + encodeURIComponent(json),
        success: function (data) {
            var json = jQuery.parseJSON(data);
            if (json.status == 'success') {
                $('#success-message').html('Subcategory Added Successfully');
                $('.alert-success').show();
                $('.alert-success').slideDown(500);
                setTimeout(function () {
                    $('.alert-danger').slideUp(500);
                    window.location = base_url + 'Home/view_subcategory';
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
});
$('body').on('click', '.main_delete_subcategory', function () {
    var subcategory_id = $(this).attr('subcategory_id');
    var subcategory_name = $(this).attr('subcategory_name');
    var data = {status: 'delete_main_subcategory', subcategory_id: subcategory_id};
    Lobibox.confirm({
        msg: 'Are You Sure Want To Delete This Subcategory : ' + subcategory_name,
        title: 'Delete Subcategory',
        callback: function ($this, type) {
            if (type === 'yes') {
                $.ajax({
                    url: base_url + "Home/common",
                    async: true,
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        var json = jQuery.parseJSON(data);
                        if (json.status == 'success') {
                            window.location = '';
                        }
                    }
                });
            }
        }
    });

});
$('#add_service').click(function () {
    var json = '';
    var json = json + '{';
    if ($('#services_category').val() == '') {
        $('#services_category').css('border-color', 'red');
        return false;
    } else {
        $('#services_category').css('border-color', '');
        json = json + '"services_category":"' + $('#services_category').val() + '",';
    }
    if ($('#subcategory').val() == '') {
        $('#subcategory').css('border-color', 'red');
        return false;
    } else {
        $('#subcategory').css('border-color', '');
        json = json + '"subcategory":"' + $('#subcategory').val() + '",';
    }

    json = json + '"disipline":"' + $('#disipline').val() + '",';
    json = json + '"services_time_type":"' + $('#services_time_type').val() + '",';
    json = json + '"services_time":"' + $('#services_time').val() + '",';
    json = json + '"fees":"' + $('#fees').val() + '",';
    json = json + '"services_id":"' + $('#services_id').val() + '"';
    var json = json + '}';
    $.ajax({
        url: "add_service",
        async: true,
        type: 'POST',
        data: "json=" + encodeURIComponent(json),
        success: function (data) {
            var json = jQuery.parseJSON(data);
            if (json.status == 'success') {
                $('#success-message').html('Subcategory Added Successfully');
                $('.alert-success').show();
                $('.alert-success').slideDown(500);
                setTimeout(function () {
                    $('.alert-danger').slideUp(500);
                    window.location = base_url + 'Home/view_service';
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
});
$('body').on('click', '.main_delete_services', function () {
    var services_id = $(this).attr('services_id');
    var disipline_name = $(this).attr('disipline_name');
    var sub_category_name = $(this).attr('sub_category_name');
    var category_name = $(this).attr('category_name');
    var data = {status: 'delete_main_services', services_id: services_id};
    var msg = category_name + ' - ' + sub_category_name + ' - ' + disipline_name;
    Lobibox.confirm({
        msg: 'Are You Sure Want To Delete This Services : ' + msg,
        title: 'Delete Services',
        callback: function ($this, type) {
            if (type === 'yes') {
                $.ajax({
                    url: base_url + "Home/common",
                    async: true,
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        var json = jQuery.parseJSON(data);
                        if (json.status == 'success') {
                            window.location = '';
                        }
                    }
                });
            }
        }
    });

});
$('#services_category').change(function () {
    var category_id = $(this).val();
    var data = {status: 'Get_sub_category_list_by_id', category_id: category_id};
    $.ajax({
        url: "common",
        async: true,
        type: 'POST',
        data: data,
        success: function (data) {
            $('#subcategory_details').empty();
            $('#subcategory_details').append(data)
        }
    })
});
$('#employee_add').click(function () {
    var json = '';
    var json = json + '{';
    if ($('#employee_name').val() == '') {
        $('#employee_name').focus();
        $('#employee_name').css('border-color', 'red');
        return false;
    } else {
        $('#employee_name').css('border-color', '');
        json = json + '"employee_name":"' + $('#employee_name').val() + '",';
    }

    json = json + '"profile_pic":"' + $('.uppload_admin_profile_image').attr('file_name') + '",';
    if ($('#designation_id').val() == '') {
        $('#designation_id').focus();
        $('#designation_id').css('border-color', 'red');
        return false;
    } else {
        json = json + '"designation_id":"' + $('#designation_id').val() + '",';
    }
    json = json + '"disipline_id":"' + $('#disiplin_id').val() + '",';
    if ($('#email').val() == '') {
        $('#email').focus();
        $('#email').css('border-color', 'red');
        return false;
    } else {
        $('#email').css('border-color', '');
        json = json + '"email":"' + $('#email').val() + '",';
    }
    if ($('#staff_access_previlage').val() == '') {
        $('#staff_access_previlage').focus();
        $('#staff_access_previlage').css('border-color', 'red');
        return false;
    } else {
        $('#staff_access_previlage').css('border-color', '');
        json = json + '"staff_access_previlage":"' + $('#staff_access_previlage').val() + '",';
    }
    var finance = 1;
    if ($('#finance').is(':checked')) {
        finance = 0;
    }
    json = json + '"finance":"' + finance + '",';
    var basic_client_data = 1;
    if ($('#basic_client_data').is(':checked')) {
        basic_client_data = 0;
    }
    json = json + '"basic_client_data":"' + basic_client_data + '",';
    var therapy_notes = 1;
    if ($('#therapy_notes').is(':checked')) {
        therapy_notes = 0;
    }
    json = json + '"therapy_notes":"' + therapy_notes + '",';
    var marketing = 1;
    if ($('#marketing').is(':checked')) {
        marketing = 0;
    }
    json = json + '"marketing":"' + marketing + '",';
    var registration_form = 1;
    if ($('#registration_form').is(':checked')) {
        registration_form = 0;
    }
    json = json + '"registration_form":"' + registration_form + '",';

    var quotation = 1;
    if ($('#quotation').is(':checked')) {
        quotation = 0;
    }
    json = json + '"quotation":"' + quotation + '",';

    var electronic_link = 1;
    if ($('#electronic_link').is(':checked')) {
        electronic_link = 0;
    }
    json = json + '"electronic_link":"' + electronic_link + '",';

    var receipt = 1;
    if ($('#receipt').is(':checked')) {
        receipt = 0;
    }
    json = json + '"receipt":"' + receipt + '",';
    json = json + '"archive":"' + $('input[name=account_status]:checked').val() + '",';
    json = json + '"date_of_birth":"' + $('#employee_date_of_birth').val() + '",';
    json = json + '"color_id":"' + $('#color_id').val() + '",';
    json = json + '"employee_id":"' + $('#employee_id').val() + '"';
    var json = json + '}';

    $.ajax({
        url: base_url + "Home/add_employee",
        async: true,
        type: 'POST',
        data: "json=" + encodeURIComponent(json),
        success: function (data) {
            var json = jQuery.parseJSON(data);
            if (json.status == 'success') {
                $('#success-message').html('Employee Added Successfully');
                $('.alert-success').show();
                $('.alert-success').slideDown(500);
                setTimeout(function () {
                    $('.alert-danger').slideUp(500);
                    window.location = base_url + 'Home/view_employee';
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
});





$('body').on('change', '.uppload_profile_image', function () {
    var form_name = $(this).attr('form_name');
    var fd = new FormData(document.getElementById(form_name));
    fd.append("file_id", $(this).attr('file_id'));
    fd.append("status", 'upload_user_profile');
    fd.append("id", this.id);
    fd.append("delete_img", $(this).attr('delete_image'));
    $.ajax({
        url: base_url + "Home/common",
        type: "POST",
        data: fd,
        processData: false, // tell jQuery not to process the data
        contentType: false,
        error: function (jqXHR) {
            alert('Errror')
        }
    }).done(function (data) {
        var json = jQuery.parseJSON(data);
        if (json.status == 'success') {
            window.location = base_url + 'Login/logout';
        }
    });
    return false;
});

$('body').on('click', '#update_password', function () {
    $('#message_box').html('');
    var new_password = $('#new_password');
    var cpassword = $('#cpassword');
    if (new_password.val() == '') {
        new_password.css('border-color', 'red');
        new_password.focus();
        return false;
    } else {
        new_password.css('border-color', '');
    }
    if (cpassword.val() == '') {
        cpassword.css('border-color', 'red');
        cpassword.focus();
        return false;
    } else {
        cpassword.css('border-color', '');
    }
    if (cpassword.val() == new_password.val()) {

    } else {
        $('#message_box').html('Password not matched try again');
        return false;
    }
    var json = '';
    json = json + '{';
    json = json + '"old_password":"' + $('#old_password').val() + '",';
    json = json + '"new_password":"' + new_password.val() + '",';
    json = json + '"cpassword":"' + cpassword.val() + '"';
    var json = json + '}';
    $.ajax({
        url: base_url + "Home/change_password",
        async: true,
        type: 'POST',
        data: "json=" + encodeURIComponent(json),
        success: function (data) {
            var json = jQuery.parseJSON(data);
            $('#message_box').html(json.message);
            window.location = '';

        }
    });

});
$('.therapy_history_rdm').click(function () {
    var more = $(this).attr('data-con');
    Lobibox.window({
        title: 'Note History',
        content: more
    });
});
$('body').on('click', '#send_reset_password', function () {
    var emp_id = $(this).attr('emp_id');
    var data = {emp_id: emp_id, status: 'send_reset_password'};
    Lobibox.confirm({
        msg: 'Do you want to send mail for password reset ',
        title: 'Reset Password',
        callback: function ($this, type) {
            if (type === 'yes') {
                $.ajax({
                    url: "common",
                    async: true,
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        var json = jQuery.parseJSON(data);
                        if (json.status == 'success') {
                            window.location = '';
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

$('body ').on('keydown', '.only_number', function () {
    if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9
            || event.keyCode == 27 || event.keyCode == 13
            || (event.keyCode == 65 && event.ctrlKey === true)
            || (event.keyCode >= 35 && event.keyCode <= 39)) {
        return;
    } else {
        if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
            event.preventDefault();
        }
    }
});



$('body').on('change', '.uppload_admin_profile_image', function () {
    var form_name = $(this).attr('form_name');
    var fd = new FormData(document.getElementById(form_name));
    fd.append("file_id", $(this).attr('file_id'));
    fd.append("status", 'upload_admin_profile_image');
    fd.append("id", this.id);
    fd.append("delete_img", $(this).attr('prev_image'));
    $('#image_change_msg').show(500);
    $.ajax({
        url: base_url + "Home/common",
        type: "POST",
        data: fd,
        processData: false, // tell jQuery not to process the data
        contentType: false,
        error: function (jqXHR) {
            alert('Errror')
        }
    }).done(function (data) {
        var json = jQuery.parseJSON(data);
        $('#image_change_msg').show(500);
        $('.uppload_admin_profile_image').attr('file_name', json.file_name);
    });
    return false;
});

function get_quotation_cancelled_status(status_id) {
    var messages = '';
    if (status_id == 0) {
        messages = 'Paid';
    } else if (status_id == 1) {
        messages = 'Cancelled 100%';
    } else if (status_id == 2) {
        messages = 'Cancelled 50%';
    } else if (status_id == 3) {
        messages = 'No show';
    } else if (status_id == 4) {
        messages = 'Attended ';
    } else if (status_id == 5) {
        messages = 'Cancelled by Therapist';
    } else if (status_id == 6) {
        messages = 'Cancelled No charge';
    } else if (status_id == 7) {
        messages = 'No show – SBS';
    } else if (status_id == 8) {
        messages = 'ELIP (General Observation';
    } else if (status_id == 9) {
        messages = 'General Observation ';
    } else if (status_id == 10) {
        messages = 'Reschudule';
    } else if (status_id == 11) {
        messages = 'Manual Cancelled';
    }
    return messages;
}
function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    } else {
        return false;
    }
}

function print_time(time = '') {
    var html = '';
    for (var i = 7; i <= 18; i++) {
        var h_cond = '';
        var m_cond = '';
        var m_cond1 = '';
        var m_cond2 = '';
        if (i < 10) {
            h_cond = '0' + i + ':00';
            m_cond1 = '0' + i + ':15';
            m_cond = '0' + i + ':30';
            m_cond2 = '0' + i + ':45';
        } else {
            h_cond = i + ':00';
            m_cond1 = i + ':15';
            m_cond = i + ':30';
            m_cond2 = i + ':45';
        }
        var m_select = '';
        var h_select = '';
        var m_select1 = '';
        var m_select2 = '';
        if (m_cond == time) {
            var m_select = 'selected="selected"';
        }
        if (h_cond == time) {
            var h_select = 'selected="selected"';
        }
        if (m_cond1 == time) {
            var m_select1 = 'selected="selected"';
        }
        if (m_cond2 == time) {
            var m_select2 = 'selected="selected"';
        }
        if (i != 7) {
            html = html + '<option ' + h_select + ' value="' + h_cond + '">' + h_cond + '</option>';
            if (i != 18) {
                html = html + '<option ' + m_select1 + ' value="' + m_cond1 + '">' + m_cond1 + '</option>';
            }
        }
        if (i != 18) {
            html = html + '<option ' + m_select + ' value="' + m_cond + '">' + m_cond + ' </option>';
            html = html + '<option ' + m_select2 + ' value="' + m_cond2 + '">' + m_cond2 + '</option>';
        }
    }
    return html;
}
$(function () {
    $('body').on('click', '.datepicker_dbbafter', function () {
        var d = new Date().getFullYear() + 2;
        var after_dis = {dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, maxDate: 0, yearRange: '1950:' + d};
        $(this).datepicker(after_dis).focus();
        $(this).removeClass('datepicker');
    });
});
function replace_special_char(string) {
    var temp_s = string.replace('"', ' ').replace("'", ' ').replace(/\\/g, '').replace(",", ' ').replace(/^[0-9\n]+$/);
    return temp_s;
}
function replace_special_char_textarea(string) {
    var temp_s = string.replace('"', ' ').replace("'", ' ').replace(/\\/g, '').replace(",", ' ').replace(/^[0-9\n]+$/).split(/[\n\r]/g);
    return temp_s;
}
var sensation = {
    callajax: function (url, data) {
        var msg = $.ajax({type: "POST", data: data, url: url, async: false}).responseText;
        return msg;
    }
};
function goBack() {
    window.history.back();
}