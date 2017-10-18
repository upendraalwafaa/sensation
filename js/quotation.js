var href = document.location.href;
var lastPathSegment = href.split('/');
$('body').on('change', '.quo_calendar_type', function () {
    var div_id = $(this).attr('div_id');
    var quo_type = $(this).val();
    if (quo_type == 'Single') {
        $('#carete_single_sec_' + div_id).show(500);
        $('#with_quo_start_date_div_' + div_id).hide(500);
        $('#with_quo_end_date_div_' + div_id).hide(500);
        $('.days_name_all_' + div_id).prop('disabled', true);

    }
    if (quo_type == 'Multiple' || quo_type == 'Year') {
        $('#carete_single_sec_' + div_id).hide(500);
        $('#with_quo_start_date_div_' + div_id).show(500);
        $('#with_quo_end_date_div_' + div_id).show(500);
        $('.days_name_all_' + div_id).prop('disabled', false);
    }
});



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
        }
        if (i != 18) {
            if (i != 7) {
                html = html + '<option ' + m_select1 + ' value="' + m_cond1 + '">' + m_cond1 + '</option>';
            }
            html = html + '<option ' + m_select + ' value="' + m_cond + '">' + m_cond + ' </option>';
            html = html + '<option ' + m_select2 + ' value="' + m_cond2 + '">' + m_cond2 + '</option>';
        }
    }
    return html;
}
$('#student_list').change(function () {
    var child_id = $(this).val();
    var data = {child_id: child_id, status: 'Get_student_details'};
    $.ajax({
        url: base_url + "Home/common",
        type: 'POST',
        async: true,
        data: data,
        success: function (data) {
            if (data != '0') {
                var json = jQuery.parseJSON(data);
                $('#child_name').text(json[0].child_name)
                $('#child_gender').text(json[0].gender)
                $('#child_father_name').text(json[0].father_name);
                var Arr = json[0].emergency_contact_number.split('~');
                $('#child_contact_number').text(Arr[0]);
            }
        }
    })
});
//   Add New Services  Start //
var services_counter = 1;
$('#add_services').click(function () {
    var data = {status: 'Get_category_list_for_ses'};
    $.ajax({
        url: base_url + "Home/common",
        async: true,
        type: 'POST',
        data: data,
        success: function (data) {
            if (data != '0') {
                var json = jQuery.parseJSON(data);
                var html = '';
                var html = html + ' <div class="sl_no" div_id="' + services_counter + '" category_name=""  id="services_id_' + services_counter + '">';
                // pannel div start //

                var remv_btn = '';
                if (services_counter != 1) {
                    remv_btn = '<span remove_id="' + services_counter + '"  style="cursor:pointer;" class="fa fa-remove pull-right remove_main_pannel"></span>';
                }
                var html = html + '  <div class="panel panel-primary">';
                var html = html + '     <div class="panel-heading">';
                var html = html + '       <h3 class="panel-title">SL No :  &nbsp;' + services_counter + remv_btn + ' </h3>';
                var html = html + '    </div>';
                var html = html + '   <div class="panel-body">';
                // row div start



                var html = html + '<div class="row qut_null">';
                var html = html + '    <div class="col-md-4"> ';
                var html = html + '         <div class="form-group form-md-line-input form-md-floating-label has-success">';
                var html = html + '            <label for="disipline_name">Category</label>';
                var html = html + '            <select id="quotation_category_' + services_counter + '" div_id="' + services_counter + '"  class="form-control quotation_category">';
                var html = html + '         <option value="">--Select--</option>';
                var cate_id = '';
                for (var k = 0; k < json.category_details.length; k++) {
                    if (k == 0) {
                        cate_id = json.category_details[k].id;
                    }
                    var html = html + '                <option value="' + json.category_details[k].id + '">' + json.category_details[k].category_name + '</option>';
                }



                var html = html + '            </select>';
                var html = html + '         </div>';
                var html = html + '    </div>';
                var html = html + '    <div class="col-md-4"> ';
                var html = html + '        <div class="form-group form-md-line-input form-md-floating-label has-success">';
                var html = html + '            <label for="service_details">Services</label>';
                var html = html + '            <div class="service_details" id="service_details_div_' + services_counter + '">';
                //  quotation_category(services_counter,cate_id);



                var html = html + '                <select id="" class="form-control service_sub_category" >';
                var html = html + '                    <option value="">--select--</option>';
                var html = html + '                </select>';
                var html = html + '            </div>';
                var html = html + '        </div>  ';
                var html = html + '    </div>';
                var html = html + '     <div class="col-md-4" id="calendar_change_' + services_counter + '">   ';
                var html = html + '         <div class="form-group form-md-line-input form-md-floating-label has-success">';
                var html = html + '            <label for="staff_name">Type</label>';
                var html = html + '            <select div_id="' + services_counter + '" id="calendar_type_' + services_counter + '" class="form-control quo_calendar_type">';
                var html = html + '               <option value="">--select--</option>';
                var html = html + '               <option value="Single">One time session</option>';
                var html = html + '                <option value="Multiple">Monthly billing</option>';
                var html = html + '                <option value="Year">Year</option>';
                var html = html + '             </select>';
                var html = html + '        </div>';
                var html = html + '    </div>';
                // staff list details old module//

                // only for class rom ,Camp,Group class,OT summenr ,Work shop and inclusion
                var html = html + '     <div class="col-md-4" >   ';
                var html = html + '         <div style="display:none;" id="partucular_div_staff_' + services_counter + '" class="form-group form-md-line-input form-md-floating-label has-success">';
                var html = html + '            <label for="staff_name">Staff List</label>';
                var html = html + '            <select id="addtitional_staff_list_' + services_counter + '" div_id="' + services_counter + '"  class="form-control">';
                var html = html + '             </select>';
                var html = html + '        </div>';
                var html = html + '    </div>';
                var html = html + '    <div style="display:none;" class="col-md-4 with_discipline_' + services_counter + '"> ';
                var html = html + '        <div class="form-group form-md-line-input form-md-floating-label has-success">';
                var html = html + '            <label for="disipline_name">Start Date</label>';
                var html = html + ' <input class="form-control form-control-inline input datepicker"  type="text" value="" name="start_date">';
                var html = html + '        </div>';
                var html = html + '     </div>';
                var html = html + '    <div style="display:none;" class="col-md-4 with_discipline_' + services_counter + '"> ';
                var html = html + '        <div class="form-group form-md-line-input form-md-floating-label has-success">';
                var html = html + '            <label for="disipline_name">End Date</label>';
                var html = html + ' <input class="form-control form-control-inline input datepicker" type="text" value="" name="start_date">';
                var html = html + '        </div>';
                var html = html + '     </div>';
                var html = html + '    </div>';
                // row div end



// start row div



                var html = html + '<div class="row qut_null without_discipline_' + services_counter + '">';
                var html = html + '       <div id="services_time_type_d_' + services_counter + '">';
                var html = html + '        </div>';
                var html = html + '    <div  class="col-md-4" id="carete_single_sec_' + services_counter + '" style="display:none;"> ';
                var html = html + '        <div class="form-group form-md-line-input form-md-floating-label has-success">';
                var html = html + '            <label for="disipline_name">Date</label>';
                var html = html + ' <input div_id="' + services_counter + '" class="form-control form-control-inline input datepicker_dsb"   type="text" value="" id="single_quo__date_' + services_counter + '" >';
                var html = html + '        </div>';
                var html = html + '     </div>';
                var html = html + '    <div  class="col-md-4" id="with_quo_start_date_div_' + services_counter + '" style="display:none"> ';
                var html = html + '        <div class="form-group form-md-line-input form-md-floating-label has-success">';
                var html = html + '            <label for="disipline_name">Start Date</label>';
                var html = html + ' <input  class="form-control form-control-inline input datepicker_dsb" type="text" value="" id="with_quo_start_date_' + services_counter + '" >';
                var html = html + '        </div>';
                var html = html + '     </div>';
                var html = html + '    <div  class="col-md-4" id="with_quo_end_date_div_' + services_counter + '" style="display:none"> ';
                var html = html + '        <div class="form-group form-md-line-input form-md-floating-label has-success">';
                var html = html + '            <label for="disipline_name">End Date</label>';
                var html = html + ' <input class="form-control form-control-inline input datepicker_dsb" type="text" value="" id="with_quo_end_date_' + services_counter + '">';
                var html = html + '        </div>';
                var html = html + '     </div>';


                var html = html + '    <div  class="col-md-4" id="additional_services_amtdiv_' + services_counter + '" style="display:none"> ';
                var html = html + '        <div class="form-group form-md-line-input form-md-floating-label has-success">';
                var html = html + '            <label for="disipline_name">Amount</label>';
                var html = html + ' <input class="form-control form-control-inline input only_number additional_ser_price setpannel_price_' + services_counter + '" value="0" type="text"  id="additional_services_amt_' + services_counter + '">';
                var html = html + '        </div>';
                var html = html + '     </div>';




                var html = html + '    <div class="col-md-4 without_discipline_' + services_counter + '" id="discipline_div_id_' + services_counter + '"> ';
                var html = html + '        <div class="form-group form-md-line-input form-md-floating-label has-success">';
                var html = html + '            <label for="disipline_name">Discipline</label>';
                var html = html + '           <div id="disipline_list_' + services_counter + '">';
                // service_sub_category(services_counter,1);
                var html = html + '            </div>';
                var html = html + '        </div>';
                var html = html + '     </div>';
                // end row div
                // close pannel main div //
                var html = html + '  </div>';
                // start manage disipline div pannel
                var html = html + '  <div id="discipline_panel_details_' + services_counter + '">';
                var html = html + '   </div>';
                // end manage div disipline pannel
                var html = html + ' </div>';
                // end pannel
                var html = html + ' </div>';
                $('#all_quotation_detail').append(html);
                services_counter++;
            }
        }
    });
});
$('body').on('change', '.quotation_category', function () {
    var div_id = $(this).attr('div_id');

    var category_id = $(this).val();
    //   $('#calendar_type_' + div_id).prop('selectedIndex', 0);
    // class room category
    if (category_id == 4 || category_id == 5 || category_id == '6' || category_id == '7' || category_id == '8' || category_id == '9' || category_id == '10') {
        $('#calendar_change_' + div_id).hide();
        $('#calendar_type_' + div_id).prop('selectedIndex', 2);
        if (category_id != 4) {
            $('#with_quo_start_date_div_' + div_id).show(500);
            $('#with_quo_end_date_div_' + div_id).show(500);
        } else {
            $('#with_quo_start_date_div_' + div_id).hide(500);
            $('#with_quo_end_date_div_' + div_id).hide(500);
        }
        $('#carete_single_sec_' + div_id).hide(500);
        $('#partucular_div_staff_' + div_id).show(500);
    } else {
        $('#calendar_change_' + div_id).show();
        $('#partucular_div_staff_' + div_id).hide(500);
    }

    var data = {status: 'Get_service_name_by_category', category_id: category_id, div_id: div_id};
    $.ajax({
        url: base_url + "Home/common",
        async: true,
        type: 'POST',
        data: data,
        success: function (data) {
            var html = '';
            var json = jQuery.parseJSON(data);
            // for pannel  div empty
            $('#discipline_panel_details_' + json.div_id).empty();
            $('#services_id_' + div_id).attr('category_name', json.services[0].category_name);
            //
            var html = html + '<select id="service_sub_category_' + json.div_id + '" div_id="' + json.div_id + '" class="form-control service_sub_category">';
            var html = html + '<option value="">--select--</option>';
            var select = '';
            if (json.services.length == 1) {
                select = 'selected="selected"';
            }
            if (data !== '0') {
                for (var k = 0; k < json.services.length; k++) {
                    var service_id = json.services[k].id;
                    var html = html + '<option ' + select + ' value="' + json.services[k].id + '">' + json.services[k].sub_category_name + '</option>';
                }
            }
            var html = html + ' </select>';
            $('#service_details_div_' + json.div_id).empty();
            $('#service_details_div_' + json.div_id).append(html);
            var category_id = $('#quotation_category_' + json.div_id).val();
            if (category_id == 4 || category_id == 5 || category_id == '6' || category_id == '7' || category_id == '8' || category_id == '9' || category_id == '10') {
                $('#discipline_div_id_' + json.div_id).hide(500);
                get_partucular_staff_list(category_id, json.div_id);
                if (category_id != 4) {
                    return false;
                } else {
                    $('#discipline_div_id_' + json.div_id).show(500);
                }
            } else {
                $('#additional_services_amtdiv_' + div_id).hide(500);
                $('#discipline_div_id_' + json.div_id).show(500);
            }
            if (json.services.length == 1) {
                service_sub_category(service_id, div_id);
            }

        }
    });
});
function get_partucular_staff_list(category_id, div_id) {
    var data = {status: 'get_partucular_staff_list', category_id: category_id, div_id: div_id};
    $.ajax({
        url: base_url + "Home/common",
        async: true,
        type: 'POST',
        data: data,
        success: function (data) {
            var json = jQuery.parseJSON(data);
            var html = '';
            $('#addtitional_staff_list_' + div_id).empty();
            html = html + '<option value="">--select--</option>';
            for (var i = 0; i < json[0].length; i++) {
                var d = json[0][i];
                html = html + '<option value="' + d.id + '">' + d.employee_name + '</option>';
            }
            $('#additional_services_amtdiv_' + div_id).show(500);
            if (json[1] > 0) {
                if (category_id != 4) {
                    $('#additional_services_amt_' + div_id).val(json[1]);
                }
                $('#additional_services_amt_' + div_id).prop("disabled", true);
            } else {
                $('#additional_services_amt_' + div_id).val('');
                $('#additional_services_amt_' + div_id).prop("disabled", false);
            }
            $('#addtitional_staff_list_' + div_id).append(html);
            Get_all_quotation_price();
        }
    });
}
function service_sub_category(service_id, div_id) {
    var data = {status: 'Get_disipline_name_by_service', service_id: service_id, div_id: div_id};
    $.ajax({
        url: base_url + "Home/common",
        async: true,
        type: 'POST',
        data: data,
        success: function (data) {
            var json = jQuery.parseJSON(data);
            console.log(json);
            var html = '';
            if (data !== '0') {
                for (var i = 0; i < json.discipline.length; i++) {
                    var class_name = 'disiplin_checked';
                    var attr = '';
                    // for report category no need there session detail so i removed the calss name disiplin_checked
                    if (json.discipline[i].category_id == 4) {
                        var panel_id = json.div_id + '_' + json.discipline[i].disipline;
                        var pannel_class = 'row_id_' + panel_id + ' pannel_details_' + json.div_id;
                        class_name = 'set_report_cat_price ' + pannel_class;
                        attr = 'pannel_id="' + panel_id + '"';
                    }
                    var html = html + ' <div class="col-sm-6">';
                    var html = html + '                <div class="md-checkbox"> ';
                    var html = html + '                    <input ' + attr + ' services_id="' + json.discipline[i].id + '" fee="' + json.discipline[i].fees + '" value="' + json.discipline[i].disipline + '" type="checkbox" id="disiplin_' + json.div_id + '_' + i + '" div_id="' + json.div_id + '" class="md-check ' + class_name + '  disiplin_checkbox_' + json.div_id + '">';
                    var html = html + '                    <label for="disiplin_' + json.div_id + '_' + i + '">     <span class="inc">' + json.discipline[i].disipline_name + '</span>';
                    var html = html + '                        <span class="check"></span>';
                    var html = html + '                        <span class="box"></span>';
                    var html = html + '                         ' + json.discipline[i].disipline_name + ' ';
                    var html = html + '                     </label>';
                    var html = html + '                </div>';
                    var html = html + '                </div>';
                }
            }
            $('#disipline_list_' + json.div_id).empty();
            $('#disipline_list_' + json.div_id).append(html)
        }
    });
}
$('body').on('click', '.set_report_cat_price', function () {
    var div_id = $(this).attr('div_id');
    var total = 0;
    $('.disiplin_checkbox_' + div_id).each(function () {
        if ($(this).is(":checked")) {
            var value = $(this).attr('fee');
            if (value == '') {
                value = '';
            }
            total = parseInt(total) + parseInt(value);
        }
    });
    $('#additional_services_amt_' + div_id).val(total);
    Get_all_quotation_price();
})
$('body').on('change', '.service_sub_category', function () {
    var div_id = $(this).attr('div_id');
    var service_id = $(this).val();
    service_sub_category(service_id, div_id);
});
function validate_type_and_date(div_id) {
    var calender = $('#calendar_type_' + div_id);
    if (calender.val() == '') {
        calender.addClass('invalid_validation')
        return 'false';
    } else {
        calender.removeClass('invalid_validation')
        calender.addClass('success_validation')
    }
    if (calender.val() == 'Single') {
        var single_sess = $('#single_quo__date_' + div_id);
        if (single_sess.val() == '') {
            single_sess.focus();
            single_sess.addClass('invalid_validation');
            return 'false';
        } else {
            single_sess.removeClass('invalid_validation');
            single_sess.addClass('success_validation')
        }
    } else {
    }
}
$('body').on('click', '.disiplin_checked', function () {
    var div_id = $(this).attr('div_id');
    var category_id = $('#quotation_category_' + div_id).val();
    var subcat_id = $('#service_sub_category_' + div_id).val();
    var flag = validate_type_and_date(div_id);
    if (flag == 'false') {
        return false;
    }
    var disiplin_id = '';
    if ($(this).is(":checked")) {
        disiplin_id = $(this).val();
    } else {
        disiplin_id = '';
    }
    $('#pannel_id_' + div_id + '_' + $(this).val()).remove();
    var data = {status: 'Get_disipline_pannel', disipline_id: disiplin_id, div_id: div_id, category_id: category_id, subcat_id: subcat_id};
    $.ajax({
        url: base_url + "Home/common",
        async: true,
        type: 'POST',
        data: data,
        success: function (data) {
            var json = jQuery.parseJSON(data);
            var html = '';
            var clndr_type = $('#calendar_type_' + json[0].div_id).val();
            var session_num_dis = '';
            if (clndr_type == 'Single') {
                session_num_dis = 'disabled';
            }
            if (json[0].discpline_details != '0') {
                for (var i = 0; i < json.length; i++) {
                    var html = '';
                    var new_discpline = json[i].discpline_details;
                    var new_emp = json[i].employee_details;
                    var panel_id = json[0].div_id + '_' + new_discpline[0].disipline;
                    var div_id = json[0].div_id;
                    var set_attr = 'div_id="' + div_id + '" panel_id="' + panel_id + '" descipline_id="' + new_discpline[0].disipline + '"';
                    var html = html + '  <div class="panel panel-primary pannel_details_' + div_id + '" pannel_id="' + panel_id + '" div_id="' + div_id + '" id="pannel_id_' + panel_id + '">';
                    var html = html + '     <div class="panel-heading">';
                    var pannel = '';
                    var days_select = '';
                    if ($('#calendar_type_' + div_id).val() == 'Single') {
                        var date = $('#single_quo__date_' + div_id).val();
                        days_select = set_days_name(date);
                    }
                    var pannel = pannel + '<div class="ot_right sub_slt new_ot"><select ' + set_attr + ' class="form-control create_new_session" id="pannel_time_' + panel_id + '"><option>--Time--</option>' + print_time() + '</select> </div>';
                    var pannel = pannel + '<div class="ot_right sub_slt new_ot">';
                    var weeky_html = Get_weekdays_dropdown(days_select, set_attr, panel_id, div_id);
                    var pannel = pannel + weeky_html;
                    var pannel = pannel + '</div>';
                    var pannel = pannel + '<div  class="ot_right sub_slt new_ot"><select ' + set_attr + ' id="pannel_staff_name_' + panel_id + '" class="create_new_session form-control">';
                    var pannel = pannel + '<option>--Staff--</option>';
                    var selected = '';
                    if (new_emp.length == 1) {
                        selected = 'selected="selected"';
                    }
                    for (var em = 0; em < new_emp.length; em++) {
                        var d = new_emp[em];
                        var pannel = pannel + '<option ' + selected + ' value="' + d.id + '">' + d.employee_name + '</option>';
                    }
                    var pannel = pannel + '</select> </div>';
                    var pannel = pannel + '<div  class="ot_right sub_slt new_ot"><select ' + set_attr + ' id="pannel_discipline_name_' + panel_id + '" class="form-control create_new_session">';
                    var pannel = pannel + '<option>--Type--</option>';
                    var selected = '';
                    if (new_discpline.length == 1) {
                        selected = 'selected="selected"';
                    }
                    for (var dm = 0; dm < new_discpline.length; dm++) {
                        var d = new_discpline[dm];
                        var option = '';
                        var value = '';
                        option = d.disipline_name + '&nbsp;' + d.services_time + '&nbsp;' + d.services_time_type;
                        var value = d.id;
                        var pannel = pannel + '<option ' + selected + ' title="Price : AED &nbsp;' + d.fees + '" value="' + value + '">' + option + '</option>';
                    }
                    var pannel = pannel + '</select> </div>';
                    var html = html + '       <h3 class="panel-title"><b>' + new_discpline[0].disipline_name + '</b> (<b id="count_totses_' + panel_id + '">0</b>) ' + pannel + '</h3>';
                    var html = html + '    </div>';
                    // start body content
                    var html = html + '   <div class="panel-body" id="body_content_' + panel_id + '"> ';
                    var html = html + ' </div>';
                    // end body content
                    var html = html + '   </div>';
                    $('#discipline_panel_details_' + json[0].div_id).append(html);
                }
            }
        }
    });
});
function Get_weekdays_dropdown(days_select, set_attr, panel_id, div_id) {
    var clndr_type = $('#calendar_type_' + div_id).val();
    var btn_dis = '';
    if (clndr_type == 'Single') {
        btn_dis = 'disabled';
    }
    var weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    var html = '';
    var html = html + '            <span class="multiselect-native-select">';
    var html = html + '               <select class="mt-multiselect btn btn-default" multiple="multiple" data-width="100%">';
    for (var dd = 0; dd < weekday.length; dd++) {
        var select = '';
        if (days_select == weekday[dd]) {
            select = 'chacked="chacked"';
        }
        var pannel = pannel + '<option>' + weekday[dd] + '</option>';
    }
    var html = html + '            </select>';
    var html = html + '           <div class="btn-group" style="width: 100%;">';
    var html = html + '             <button ' + btn_dis + '  type="button" class="multiselect dropdown-toggle mt-multiselect btn btn-default days-drop-new days_name_all_' + div_id + '" data-toggle="dropdown" title="None selected" style="width: 100%; overflow: hidden; text-overflow: ellipsis;padding:0px;">';
    var html = html + '                 <span class="multiselect-selected-text create_new_session" id="days_name_view_' + panel_id + '">--Days--</span>';
    var html = html + '            </button>';
    var html = html + '            <ul class="multiselect-container dropdown-menu">';
    for (var dd = 0; dd < weekday.length; dd++) {
        var select = '';
        if (days_select == weekday[dd]) {
            select = 'checked="checked"';
        }
        var html = html + '               <li><a tabindex="0"><label class="checkbox"><input panel_id="' + panel_id + '" class="days_name_' + panel_id + ' days_validaye" ' + set_attr + ' type="checkbox" ' + select + ' value="' + weekday[dd] + '"> ' + weekday[dd] + '</label></a></li>';
    }
    var html = html + '            </ul>';
    var html = html + '         </div>';
    var html = html + '      </span>';
    return html;
}
$('body').on('change', '.discipline_type', function () {
    var div_id = $(this).attr('div_id');
    var loop_id = $(this).attr('loop_id');
    var row_id = $(this).attr('row_id');
    var value = $(this).val();
    var price = '';
    var Arr = value.split('~')
    if (value == '') {
        price = 0;
    } else {
        price = Arr[1];
    }
    $('#session_price_' + row_id).val(price);
    Get_All_session_price();
});
$('body').on('click', '.remove_session', function () {
    var remove_id = $(this).attr('remove_id');
    Lobibox.confirm({
        msg: 'Are You Sure Want Delete This Session ?',
        title: 'Quotation Session Delete ',
        callback: function ($this, type) {
            if (type === 'yes') {
                $('#' + remove_id).remove();
                Get_all_quotation_price();
            }
        }
    });
});
$('body').on('change', '.create_new_session', function () {
    var panel_id = $(this).attr('panel_id');
    var div_id = $(this).attr('div_id');
    var descipline_id = $(this).attr('descipline_id');
    Get_same_row_session(panel_id, div_id, descipline_id);
});
$('body').on('keyup', '.add_new_session', function () {
    var panel_id = $(this).attr('panel_id');
    var div_id = $(this).attr('div_id');
    var descipline_id = $(this).attr('descipline_id');
    Get_same_row_session(panel_id, div_id, descipline_id);
});
$('body').on('click', '.days_validaye', function () {
    var panel_id = $(this).attr('panel_id');
    var div_id = $(this).attr('div_id');
    var day_nme = $(this).val();
    if ($('#calendar_type_' + div_id).val() == 'Single') {
        var c_leng = $('input.days_name_' + panel_id + ':checked').length
        if ($(this).is(":checked")) {
            if (c_leng > 1) {
                return false;
            }
        }
    }
    var dnme_subsrt = day_nme.substring(0, 3);
    var day_namehtml = '<span id="days_' + panel_id + '_' + day_nme + '" class="view_dys view_dys_' + panel_id + '">' + dnme_subsrt + '</span>';
    var total_daysn = $('.view_dys_' + panel_id).length;
    if ($(this).is(":checked")) {
        if (total_daysn == 0) {
            $('#days_name_view_' + panel_id).empty();
        }
        $('#days_name_view_' + panel_id).append(day_namehtml);
    } else {
        $('#days_' + panel_id + '_' + day_nme).remove();
        if (total_daysn == 1) {
            $('#days_name_view_' + panel_id).append('--Days--');
        }
    }

    var descipline_id = $(this).attr('descipline_id');
    Get_same_row_session(panel_id, div_id, descipline_id);
});
function Get_same_row_session(panel_id, div_id, descipline_id) {
    $('#body_content_' + panel_id).empty();
    var select_descipline = $('#pannel_discipline_name_' + panel_id).val();
    var staff_id = $('#pannel_staff_name_' + panel_id).val();
    var days_name = [];
    $('.days_name_' + panel_id).each(function () {
        if (this.checked) {
            days_name.push($(this).val());
        }
    });
    var days_name = days_name.join('~');
    var time = $('#pannel_time_' + panel_id).val();
    var calendar_type = $('#calendar_type_' + div_id);
    if (calendar_type.val() == 'Single') {
        var start_date = $('#single_quo__date_' + div_id).val();
        var end_date = $('#single_quo__date_' + div_id).val();
    } else {
        var start_date = $('#with_quo_start_date_' + div_id).val();
        var end_date = $('#with_quo_end_date_' + div_id).val();
    }
    var category_id = $('#quotation_category_' + div_id).val();
    var subcat_id = $('#service_sub_category_' + div_id).val();
    if (select_descipline != '--Type--' && staff_id != '--Staff--' && days_name != '' && time != '--Time--') {
        var data = {status: 'Get_same_row_session', descipline_id: descipline_id, panel_id: panel_id, div_id: div_id, category_id: category_id, subcat_id: subcat_id, select_descipline: select_descipline, staff_id: staff_id, days_name: days_name, time: time, start_date: start_date, end_date: end_date, calendar_type: calendar_type.val()};
        $.ajax({
            url: base_url + "Home/common",
            async: true,
            type: 'POST',
            data: data,
            success: function (data) {
                var html = '';
                html = html + ' <div class="row " > ';
                html = html + '<div class="col-md-2">  ';
                html = html + '<h5 class="quotation_headeing">Discipline Type</h5>';
                html = html + ' </div> ';
                html = html + '   <div class="col-md-2"> ';
                html = html + '<h5 class="quotation_headeing">Staff Name</h5>';
                html = html + '</div>';
                html = html + ' <div class="col-md-2"> ';
                html = html + '<h5 class="quotation_headeing">Date</h5>';
                html = html + ' </div>';
                html = html + ' <div class="col-md-4" style="">';
                html = html + '  <div class="col-sm-6">';
                html = html + '<h5 class="quotation_headeing">Start Time</h5>';
                html = html + ' </div>';
                html = html + '  <div class="col-sm-6">';
                html = html + '<h5 class="quotation_headeing">End Time</h5>';
                html = html + ' </div>';
                html = html + '  </div>';
                html = html + ' <div class="col-md-2"> ';
                html = html + '<h5 class="quotation_headeing">Price</h5>';
                html = html + '  </div> ';
                html = html + ' </div>';
                $('#body_content_' + panel_id).append(html);
                $('#body_content_' + panel_id).append(data);
                $('#count_totses_' + panel_id).text($('.row_id_' + panel_id).length)
                Get_all_quotation_price();
                error_show_tooltrip();
            }
        });
    }
}
function set_days_name(date) {
    var weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    var dateArr = date.split('-');
    var temp_d = dateArr[1] + '/' + dateArr[2] + '/' + dateArr[0];
    var d = new Date(temp_d);
    var day_name = '';
    for (var i = 0; i < weekday.length; i++) {
        if (i == d.getDay()) {
            day_name = weekday[i];
        }
    }
    return day_name;
}
function Get_all_quotation_price() {
    var total = 0;
    $('.quotation_price').each(function () {
        var temp = '';
        temp = $(this).text();
        total = total + parseInt(temp);
    });
    var additional_ser = 0;
    $('.additional_ser_price').each(function () {
        var val = 0;
        val = $(this).val();
        if (val == '') {
            val = 0;
        }
        additional_ser = additional_ser + parseInt(val);
    });
    total = parseInt(total) + parseInt(additional_ser);
    $('#sub_total').text(total);
    var discount = $('#session_discount').val();
    if (discount == '') {
        discount = 0;
    }
    var t = parseInt(total) - parseInt(discount);
    $('#total').text(t);
    return total;
}
$('body').on('keyup', '#session_discount,.additional_ser_price', function () {
    var discount = $('#session_discount').val();
    if (discount == '') {
        discount = 0;
    }
    var total_sub = Get_all_quotation_price();
    var total = parseInt(total_sub) - parseInt(discount);
    $('#total').text(total);
});
$('body').on('click', '#submit_btn', function () {
    var json = '';
    json = json + '{';
    var parent_Arr = [];
    $('.sl_no').each(function () {
        var sl_no = [];
        var div_id = $(this).attr('div_id');
        var additional = Get_services_additional_details(div_id);
        sl_no.push(additional);
        var pannel_details = Get_pannel_details_array(div_id);
        sl_no.push(pannel_details);
        parent_Arr.push(sl_no);
    });
    var child_id = $('#child_id').val();
    var electronic_link = $('#electronic_link').val();
    var child_name = $('#child_name').text();
    var temp = JSON.stringify(parent_Arr);
    json = json + '"quotation":' + temp + ',';
    json = json + '"electronic_link":"' + electronic_link + '",';

    if (electronic_link == 1) {
        json = json + '"select_parent_type":"' + $('#select_parent_type').val() + '",';
        json = json + '"electronic_name":"' + $('#electronic_name').val() + '",';
        json = json + '"electronic_email":"' + $('#electronic_email').val() + '",';
        json = json + '"electronic_phone":"' + $('#electronic_phone').val() + '",';
        json = json + '"electronic_link_id":"' + $('#electronic_link_id').val() + '",';

        json = json + '"elec_gender_male":"' + $('#elec_gender_male').val() + '",';


        json = json + '"elec_gender":"' + $('input[name=elec_gender]:checked').val() + '",';
        json = json + '"session_type":"' + $('input[name=session_type]:checked').val() + '",';
        var discpline_ar = [];
        $('.discipline_name').each(function () {
            if ($(this).is(":checked")) {
                discpline_ar.push($(this).val());
            }
        });
        json = json + '"school_name":"' + $('#school_name').val() + '",';
        json = json + '"ele_child_name":"' + $('#ele_child_name').val() + '",';
        json = json + '"ele_child_birth":"' + $('#ele_child_birth').val() + '",';
        json = json + '"discipline_id":"' + discpline_ar + '",';
        json = json + '"school_attinding":"' + $('input[name=school_attinding]:checked').val() + '",';
        json = json + '"about_sensation":"' + $('#about_sensation').val() + '",';
    }
    json = json + '"student_id":"' + child_id + '",';
    json = json + '"child_name":"' + child_name + '",';
    json = json + '"receipt_no":"' + $('#receipt_no').val() + '",';
    json = json + '"quotation_id":"' + $('#quotation_id').val() + '",';
    json = json + '"sub_total":"' + $('#sub_total').text() + '",';
    json = json + '"discount":"' + $('#session_discount').val() + '",';
    json = json + '"total":"' + $('#total').text() + '",';
    json = json + '"note":"' + $('#note').val() + '",';
    json = json + '"accept_status":"' + $('#accept_status').val() + '",';
    var mail_status = '';
    Lobibox.confirm({
        msg: 'Do You Want To Send This Quotation To Customer',
        title: 'Quotation  Details',
        callback: function ($this, type) {
            if (type === 'yes') {
                mail_status = 'Yes';
            } else {
                mail_status = 'No';
            }
            json = json + '"mail_status":"' + mail_status + '"';
            json = json + '}';
            console.log(json);
            $('#submit_btn').hide(500)
            $.ajax({
                url: base_url + "Home/add_quotation",
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
                            if (electronic_link == 1) {
                                window.location = base_url + 'Home/electronic_quotation_details';
                            } else {
                                window.location = base_url + 'Home/view_quotation';
                            }
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
    });
});
function validate_electronic_link() {
    var ele_child_name = $('#ele_child_name');
    var ele_child_birth = $('#ele_child_birth');
    var select_parent_type = $('#select_parent_type');
    var electronic_name = $('#electronic_name');
    var electronic_email = $('#electronic_email');
    var electronic_phone = $('#electronic_phone');
    var school_name = $('#school_name');
    var dropdowntoggle = $('.dropdown-toggle');
    if (ele_child_name.val() == '') {
        ele_child_name.css('border-color', 'red');
        ele_child_name.focus();
        return 'false';
    } else {
        ele_child_name.css('border-color', '');
    }
    if (ele_child_birth.val() == '') {
        ele_child_birth.css('border-color', 'red');
        ele_child_birth.focus();
        return 'false';
    } else {
        ele_child_birth.css('border-color', '');
    }
    if (select_parent_type.val() == '') {
        select_parent_type.css('border-color', 'red');
        select_parent_type.focus();
        return 'false';
    } else {
        select_parent_type.css('border-color', '');
    }
    if (electronic_name.val() == '') {
        electronic_name.css('border-color', 'red');
        electronic_name.focus();
        return 'false';
    } else {
        electronic_name.css('border-color', '');
    }
    if (electronic_email.val() == '') {
        electronic_email.css('border-color', 'red');
        electronic_email.focus();
        return 'false';
    } else {
        electronic_email.css('border-color', '');
    }
    if (electronic_phone.val() == '') {
        electronic_phone.css('border-color', 'red');
        electronic_phone.focus();
        return 'false';
    } else {
        electronic_phone.css('border-color', '');
    }
    var dsipline = '';
    $('.discipline_name').each(function () {
        if ($(this).is(":checked")) {
            dsipline = 'Yes';
        }
    });

    if (dsipline == '') {
        dropdowntoggle.css('border-color', 'red');
        dropdowntoggle.focus();
        return 'false';
    } else {
        dropdowntoggle.css('border-color', '');
    }

    if ($('[name=school_attinding]:checked').val() == undefined) {
        $('.school_attinding').css('color', 'red');
        electronic_phone.focus();
        return 'false';
    } else {
        $('.school_attinding').css('color', '');
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
    if ($('[name=elec_gender]:checked').val() == undefined) {
        $('.elec_gender').css('color', 'red');
        electronic_phone.focus();
        return 'false';
    } else {
        $('.elec_gender').css('color', '');
    }
    if ($('[name=session_type]:checked').val() == undefined) {
        $('.session_type').css('color', 'red');
        electronic_phone.focus();
        return 'false';
    } else {
        $('.session_type').css('color', '');
    }

    return 'true';
}
function Get_services_additional_details(div_id) {
    var temp = {};
    var category_id = $('#quotation_category_' + div_id).val();
    var pannel_main_tot = 0;
    $('.setpannel_price_' + div_id).each(function () {
        if (category_id == 4 || category_id == 5 || category_id == '6' || category_id == '7' || category_id == '8' || category_id == '9' || category_id == '10') {
            var value = $(this).val();
        } else {
            var value = $(this).text();
        }
        if (value == '') {
            value = 0;
        }
        pannel_main_tot = parseInt(pannel_main_tot) + parseInt(value);
    });
    temp["category_id"] = category_id;
    temp["category_name"] = $('#services_id_' + div_id).attr('category_name');
    temp["total_price"] = pannel_main_tot;
    // for only category id= 4,5,6,7  like as camp ,group ,ot session
    temp["staff_id"] = $('#addtitional_staff_list_' + div_id).val();
    temp["service_id"] = $('#service_sub_category_' + div_id).val();
    var services_type = $('#calendar_type_' + div_id);
    temp["services_type"] = services_type.val();
    if (services_type.val() == 'Single') {
        temp["start_date"] = $('#single_quo__date_' + div_id).val();
        temp["end_date"] = $('#single_quo__date_' + div_id).val();
    } else if (services_type.val() == 'Multiple') {
        temp["start_date"] = $('#with_quo_start_date_' + div_id).val();
        temp["end_date"] = $('#with_quo_end_date_' + div_id).val();
    }
    return temp;
}
function Get_pannel_details_array(div_id) {
    var pannel_details = [];
    var flag = '';
    $('.pannel_details_' + div_id).each(function () {
        var category_id = $('#quotation_category_' + div_id).val();
        var pannel_id = $(this).attr('pannel_id');
        $('#c_therapy_name').text($('#pannel_staff_name_' + pannel_id + ' option:selected').text());
        if (category_id == 4) {
            var Arr = Get_row_details_array_for_report(pannel_id);
        } else {
            var Arr = Get_row_details_array(pannel_id);
        }
        pannel_details.push(Arr);
    });
    return pannel_details;
}
function Get_row_details_array(pannel_id) {
    var temp_arr = [];
    $('.row_id_' + pannel_id).each(function () {
        var temp = {};
        var pannel_id = $(this).attr('row_id');
        var services_displine_id_Arr = $('#services_displine_id_' + pannel_id).val().split('~');
        temp["services_id"] = services_displine_id_Arr[0];
        temp["staff_id"] = $('#staff_id_' + pannel_id).val();
        temp["session_date"] = $('#session_date_' + pannel_id).val();
        temp["start_time"] = $('#start_time_' + pannel_id).val();
        temp["end_time"] = $('#end_time_' + pannel_id).val();
        temp["services_fee"] = $('#services_fee_' + pannel_id).text();
        temp["services_name"] = services_displine_id_Arr[1];
        temp["services_time"] = services_displine_id_Arr[2];
        temp["services_time_type"] = services_displine_id_Arr[3];
        temp["discipline_full_name"] = services_displine_id_Arr[4];
        temp["services_displine_id"] = services_displine_id_Arr[5];
        temp_arr.push(temp);
    });
    return temp_arr;
}
function Get_row_details_array_for_report(pannel_id) {
    var temp_arr = [];
    $('.row_id_' + pannel_id).each(function () {
        if ($(this).is(":checked")) {
            var temp = {};
            var div_id = $(this).attr('div_id');
            temp["services_id"] = $(this).attr('services_id');
            temp["staff_id"] = $('#addtitional_staff_list_' + div_id).val();
            temp["session_date"] = '0000-00-00';
            temp["start_time"] = '00:00:00';
            temp["end_time"] = '00:00:00';
            temp["services_fee"] = $(this).attr('fee');
            temp["services_name"] = '';
            temp["services_time"] = '';
            temp["services_time_type"] = '';
            temp["discipline_full_name"] = '';
            temp["services_displine_id"] = $(this).val();
            temp_arr.push(temp);
        }
    });
    return temp_arr;
}
$('body').on('keyup', '#student_name', function () {
    var search_value = $(this).val();
    if (search_value == '') {
        $('.dd-list').empty();
        return false;
    }
    var data = {status: 'get_child_list_by_char', search_value: search_value};
    $.ajax({
        url: base_url + "Home/common",
        async: true,
        type: 'POST',
        data: data,
        success: function (data) {
            var json = jQuery.parseJSON(data);
            var html = '';
            $('.dd-list').empty();
            for (var i = 0; i < json.length; i++) {
                var d = json[i];
                html = html + '     <li class="dd-item" data-id="13">';
                html = html + '           <div child_name="' + d.child_name + '" child_id="' + d.id + '" class="dd-handle dd-handle0">' + d.child_name + '</div>';
                html = html + '      </li> ';
            }
            $('.dd-list').append(html);
        }
    });
});
$('body').on('click', '.dd-handle0', function () {
    var child_id = $(this).attr('child_id');
    $('#student_name').val($(this).attr('child_name'));
    $('#child_id').val(child_id);
    $('.dd-list').empty();
    var data = {status: 'Get_student_details', child_id: child_id};
    $.ajax({
        url: base_url + "Home/common",
        async: true,
        type: 'POST',
        data: data,
        success: function (data) {
            var json = jQuery.parseJSON(data);
            var d = json.child_details[0];
            $('#excess_amount').val(json.excess_amount);
            $('#child_name').text(d.child_name);
            $('#father_name').text(d.father_name);
            $('#mother_name').text(d.mother_name);
            var arr = d.date_of_birth.split('-');
            $('#date_of_birht').text(arr[2] + '/' + arr[1] + '/' + arr[0]);
            $('#gender').text(d.gender);
            $('#father_mobile_no').text(d.father_mobile);
            var email = d.father_personal_email;
            if (email == '') {
                email = d.mother_personal_email;
            }
            $('#father_email_id').text(email);
            $('#child_details').show(500);
            set_confirm_additional_details(d);
        }
    });
});
// Confirm details  Start
$('body').on('click', '#get_confirm_popup', function () {
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
    $('#csession_details').empty();
    $('#all_session_date_list').empty();
    var electronic_link = href.split('/');
    var parent_Arr = [];
    if (electronic_link[6] == 'add_electronic' || electronic_link[6] > 0) {
        $('#c_parent_name').text($('#electronic_name').val());
        $('#c_mobile_number').text($('#electronic_phone').val());
        $('#c_email_id').text($('#electronic_email').val());
        $('#child_id').val(0);
        $('#electronic_link').val(1);
        $('#c_child_name').text($('#ele_child_name').val());
        $('#c_mobile_number').text($('#electronic_phone').val());
        var flga = validate_electronic_link();
        if (flga == 'false') {
            return false;
        }
    } else {
        if ($('#child_id').val() == '') {
            $('#student_name').css('border-color', 'red');
            $('#student_name').focus();
            return false;
        } else {
            $('#student_name').css('border-color', '');
        }
    }
    $('.sl_no').each(function () {
        var sl_no = [];
        var div_id = $(this).attr('div_id');
        var additional = Get_services_additional_details(div_id);
        sl_no.push(additional);
        var pannel_details = Get_pannel_details_array(div_id);
        sl_no.push(pannel_details);
        parent_Arr.push(sl_no);
    });
    var html = '';
    var date_html = '';
    for (var m = 0; m < parent_Arr.length; m++) {
// pnd :-  pannel  descipline details
        var addtion = parent_Arr[m][0];
        var pnd = parent_Arr[m][1];
        if (parent_Arr.length > 1) {
            html = html + '<tr>';
            var sl_sum = parseInt(m) + 1;
            html = html + ' <td colspan="4" class="session_heading1"><b>Sl No ' + sl_sum + '</b></td>';
            html = html + '  </tr>';
        }
        var category_id = addtion.category_id;
        var sub_category_id = addtion.service_id;
        var conslation_tpe = '';
        if (sub_category_id == 1) {
            conslation_tpe = 'Parent Consultation';
        }
        if (category_id == '4' || category_id == '5' || category_id == '6' || category_id == '7' || category_id == '8' || category_id == '9' || category_id == '10') {

            html = html + ' <tr>';
            html = html + '     <td  width="40.999%"  align="left" valign="top" style="border-left:1px solid #000;border-bottom:1px solid #000">' + addtion.category_name + '  </td>';
            html = html + ' <td  width="20.111%"  align="right" valign="top" style=" border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;"></td>';
            html = html + '  <td width="20%" align="right" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;"></td>';
            html = html + '  <td align="right" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;">' + addtion.total_price + ' </td>';
            html = html + '  </tr>';

        } else {
// this loop is for pannel all
            for (var sr = 0; sr < pnd.length; sr++) {
// rw  ==   its for each row
                var rw = pnd[sr];
                if (rw.length > 0) {
                    var months = ["Jan", "Feb", "Mar", "April", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"];
                    for (var r = 0; r < rw.length; r++) {
                        var tmpd = rw[r];
                        var date = new Date(tmpd.session_date);
                        date_html = date_html + date.getDate() + '&nbsp;&nbsp;' + (months[date.getMonth()]) + '&nbsp;&nbsp;' + date.getFullYear() + ',&nbsp;&nbsp;';
                        // alert((months[date.getMonth() + 1]) + '/' + date.getDate() + '/' + date.getFullYear());
                    }

                    var category_name = '';
                    if (addtion.category_id == 2) {
                        category_name = ' - ' + addtion.category_name;
                    }
                    var d = rw[0];
                    var total = parseInt(d.services_fee) * parseInt(rw.length);
                    html = html + ' <tr>';
                    html = html + '   <td  width="40.999%"  align="left" valign="top" style="border-left:1px solid #000;border-bottom:1px solid #000">' + conslation_tpe + ' ' + d.services_time + ' ' + d.services_time_type + ' ' + d.discipline_full_name + ' ' + category_name + ' </td>';
                    html = html + '   <td  width="20.111%"  align="right" valign="top" style=" border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">' + rw.length + ' </td>';
                    html = html + '  <td width="20%" align="right" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;">' + d.services_fee + ' </td>';
                    html = html + ' <td align="right" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;">' + total + '</td>';
                    html = html + '  </tr>';

                }
            }
        }
    }

    $('#c_notes').text($('#note').val());
    $('#all_session_date_list').append(date_html);
    $('#csession_details').append(html);
    $('#genrated_by').text($('#current_session_emp_id').attr('employee_name'))
    $('#c_sub_total').text($('#sub_total').text());
    var discount = $('#session_discount').val();
    if (discount == 0) {
        $('#c_discount_tr').hide(500);
    } else {
        $('#c_discount_tr').show(500);
    }
    $('#c_discount').text($('#session_discount').val());
    $('#c_excess_mount').text($('#excess_amount').val());
    $('#c_total').text($('#total').text());
    Lobibox.confirm({
        msg: 'Are You Sure Want To Generate Quotation?',
        title: 'Quotation Details',
        callback: function ($this, type) {
            if (type === 'yes') {
                $('.portlet-fit').hide()
                $('.confirm_details').show();
                $('html, body').animate({scrollTop: 10}, '50');
            }
        }
    });
});
$('body').on('click', '#previous', function () {
    Lobibox.confirm({
        msg: 'Are You Sure Want To Go Previous Page?',
        title: 'Receipt Details',
        callback: function ($this, type) {
            if (type === 'yes') {
                $('.portlet-fit').show()
                $('.confirm_details').hide();
                $('html, body').animate({scrollTop: 10}, '50');
            }
        }
    });
})
function set_confirm_additional_details(d) {
    $('#c_parent_name').text(d.father_name);
    $('#c_child_name').text(d.child_name);
    $('#c_mobile_number').text(d.father_mobile);
    $('#c_email_id').text(d.father_personal_email);
}
// COnfirm Details End
if (lastPathSegment[7] == undefined) {
    $('#add_services').click();
}





//  quotation Manage details  start  //
$('body').on('click', '.edit_quotation', function () {
    var quotation_id = $(this).attr('quotation_id');
    var receipt_no = $(this).attr('receopt_no');
    var child_name = $(this).attr('child_name');
    var electronic_id = $(this).attr('electronic_id');
    var name_html = '';
    if (electronic_id > 0) {
        name_html = 'Parent Name';
    } else {
        name_html = 'Child Name';
    }
    Lobibox.confirm({
        msg: 'Are You Sure Want To Manage Quotation No ' + receipt_no + '?',
        title: name_html + ' :- ' + child_name,
        callback: function ($this, type) {
            if (type === 'yes') {
                window.location = base_url + 'Home/add_quotation/' + electronic_id + '/' + quotation_id;
            }
        }
    });
})


//  quotation Manage details  end  //


$('body').on('click', '.quotation_accept', function () {
    var quotation_id = $(this).attr('quotation_id');
    var child_name = $(this).attr('child_name');
    var receipt_no = $(this).attr('receipt_no')
    Lobibox.confirm({
        msg: 'Are You Sure Want To Accept This Quotation ' + receipt_no + '?',
        title: child_name,
        callback: function ($this, type) {
            if (type === 'yes') {
                var data = {status: 'upate_quotation_accept', type: 'update', quotation_id: quotation_id};
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
$('body').on('click', '.delete_quotation', function () {
    var quotation_id = $(this).attr('quotation_id');
    var child_name = $(this).attr('child_name');
    var receipt_no = $(this).attr('receipt_no');
    var electronic_id = $(this).attr('electronic_id');
    var msg = '';
    if (electronic_id > 0) {
        msg = 'Parent Name';
    } else {
        msg = 'Child Name';
    }
    Lobibox.confirm({
        msg: 'Are You Sure Want Delete Quotation No ' + receipt_no + '?',
        title: msg + ' :  ' + child_name,
        callback: function ($this, type) {
            if (type === 'yes') {
                var data = {status: 'upate_quotation_accept', type: 'delete', quotation_id: quotation_id, electronic_id: electronic_id};
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


$('body').on('click', '.remove_main_pannel', function () {
    var remove_id = $(this).attr('remove_id');
    $('#services_id_' + remove_id).remove();
    Get_all_quotation_price();
});



$('body').on('change', '.avility_show_msg_chnage', function () {
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
                var title = json.employee_name + '  is busy ' + json.start_time + ' - ' + json.end_time + ' ';
                $('#tool_trip_' + div_id).attr('data-original-title', title);
                $('#tool_trip_' + div_id).show(500);
                add_removeclas_for_avlity('add', div_id);
            } else {
                $('#tool_trip_' + div_id).hide(500);
                add_removeclas_for_avlity('remove', div_id);
            }
        }
    });
});
function add_removeclas_for_avlity(type, div_id) {
    if (type == 'add') {
        var session_date = $('#session_date_' + div_id).addClass('avility_show_msg');
        var start_time = $('#start_time_' + div_id).addClass('avility_show_msg');
        var end_time = $('#end_time_' + div_id).addClass('avility_show_msg');
        var staff_id = $('#staff_id_' + div_id).addClass('avility_show_msg');
    } else {
        var session_date = $('#session_date_' + div_id).removeClass('avility_show_msg');
        var start_time = $('#start_time_' + div_id).removeClass('avility_show_msg');
        var end_time = $('#end_time_' + div_id).removeClass('avility_show_msg');
        var staff_id = $('#staff_id_' + div_id).removeClass('avility_show_msg');
    }
}
function error_show_tooltrip() {
    $('[data-toggle="tooltip"]').tooltip();
}