var href = document.location.href;
var lastPathSegment = href.substr(href.lastIndexOf('/') + 1);
function get_calender_details(year = '', month = '', tmpdata = '') {
    if (year == '' || month == '') {
        month = new Date().getMonth() + 1;
        year = new Date().getFullYear();
    }
    var data = {year: year, month: month, status: 'get_calendar', tmpdata: tmpdata};
    $.ajax({
        type: 'POST',
        data: data,
        url: base_url + "Home/calendar_helper",
        async: true,
        success: function (data) {
            $('#calendar_details').empty();
            $('#calendar_details').append(data);
            popover_click();
        }
    });
}
function preCalendar() {
    var month = $('.month_dropdown').val();
    var year = $('.year_dropdown').val();
    var month = parseInt(month) - parseInt(1);
    if (month == 0) {
        month = 12;
        year = parseInt(year) - 1;
    }
    if (year == 2014) {
        return false;
    }
    var emp_arr = [];
    $('.seleced_emp_class').each(function () {
        emp_arr.push($(this).attr('emp_id'));
    });
    var tmpdata = get_temp_data_for_calender();
    get_calender_details(parseInt(year), parseInt(month), tmpdata);
}
function year_sel() {
    var month = $('.month_dropdown').val();
    var year = $('.year_dropdown').val();
    var emp_arr = [];
    $('.seleced_emp_class').each(function () {
        emp_arr.push($(this).attr('emp_id'));
    });
    var tmpdata = get_temp_data_for_calender();
    get_calender_details(parseInt(year), parseInt(month), tmpdata);
}
function month_sel() {
    var month = $('.month_dropdown').val();
    var year = $('.year_dropdown').val();
    var emp_arr = [];
    $('.seleced_emp_class').each(function () {
        emp_arr.push($(this).attr('emp_id'));
    });
    var tmpdata = get_temp_data_for_calender();
    get_calender_details(parseInt(year), parseInt(month), tmpdata);
}
function nextCalendar() {
    var month = $('.month_dropdown').val();
    var year = $('.year_dropdown').val();
    var a = 1;
    var month = parseInt(month) + parseInt(a);
    if (month == 13) {
        month = 1;
        year = parseInt(year) + 1;
    }
    if (year == 2026 && month == 1) {
        return false;
    }
    var emp_arr = [];
    $('.seleced_emp_class').each(function () {
        emp_arr.push($(this).attr('emp_id'));
    });
    var tmpdata = get_temp_data_for_calender();
    get_calender_details(parseInt(year), parseInt(month), tmpdata);
}
function get_temp_data_for_calender() {
    var child_arr = [];
    $('.seleced_child_class').each(function () {
        child_arr.push($(this).attr('child_id'));
    });
    if (child_arr.length == 0) {
        child_arr = '';
    }
    var disp_arr = [];
    $('.seleced_discipline_class').each(function () {
        disp_arr.push($(this).attr('discipline_id'));
    });
    if (disp_arr.length == 0) {
        disp_arr = '';
    }
    var emp_arr = [];
    $('.seleced_emp_class').each(function () {
        emp_arr.push($(this).attr('emp_id'));
    });
    if (emp_arr.length == 0) {
        emp_arr = '';
    }
    var tmpdata = {employee_id: emp_arr, child_id: child_arr, discipline: disp_arr};
    return tmpdata;
}
$('body').on('click', '#week_btn', function () {
    $('#weekly_calnder_view').show();
    $('#calendar_details').hide();
    $('#days_calnder_view').hide();
    $('#get_days_calender_by_date_view').hide();
    $('#calendar_tab').show();
});
$('body').on('click', '#month_btn', function () {
    $('#weekly_calnder_view').hide();
    $('#days_calnder_view').hide();
    $('#get_days_calender_by_date_view').hide();
    $('#calendar_details').show();
    $('#calendar_tab').hide();
});
$('body').on('click', '#today_btn', function () {
    $('#weekly_calnder_view').hide();
    $('#calendar_details').hide();
    $('#get_days_calender_by_date_view').hide();
    $('#days_calnder_view').show();
    $('#calendar_tab').show();
});
$('body').on('click', '#days_btn', function () {
    $('#weekly_calnder_view').hide();
    $('#calendar_details').hide();
    $('#days_calnder_view').hide();
    $('#get_days_calender_by_date_view').show();
    $('#calendar_tab').show();
});
// auto call function in jquery
if (lastPathSegment == 'calendar_view') {
    get_calender_details();
    view_week_calender();
    view_week_calender('today');
    view_week_calender('day');
}

function popover_click() {
    $('[data-toggle="popover"]').popover({
        trigger: 'hover',
        html: true,
        container: 'body',
        placement: 'left'
    });
}

$('body').on('keyup', '#calender_search_employee', function () {
    var value = $(this).val();
    if (value == '') {
        $('.employelist_search_ul').empty();
        return false;
    }
    var data = {status: 'search_employee_and_child_name', value: value};
    $.ajax({
        type: 'POST',
        data: data,
        url: base_url + "Home/calendar_helper",
        async: true,
        success: function (data) {
            var json = jQuery.parseJSON(data);
            $('.employelist_search_ul').empty();
            var html = '';
            html = html + ' <li class="employee_list" emp_name="All" employee_id="All"  data-title="Select All">Select All Employee</li>';

            for (var i = 0; i < json.employee.length; i++) {
                var d = json.employee[i];
                html = html + ' <li color_id="' + d.color_id + '" class="employee_list" emp_name="' + d.employee_name + '" employee_id="' + d.id + '"  title="Employee : ' + d.employee_name + '">' + d.employee_name + '[EMP]</li>';
            }
            for (var i = 0; i < json.child.length; i++) {
                var d = json.child[i];
                html = html + ' <li class="child_list" child_name="' + d.child_name + '" child_id="' + d.id + '"  title="Child : ' + d.child_name + '">' + d.child_name + '[CH]</li>';
            }
            for (var i = 0; i < json.discipline.length; i++) {
                var d = json.discipline[i];
                html = html + ' <li class="discipline_list" discipline_name="' + d.disipline_name + '" discipline_id="' + d.id + '"  title="Discipline : ' + d.disipline_name + '">' + d.description + '[DIS]</li>';
            }
            $('.employelist_search_ul').append(html);
        }
    });
});
$('body').on('click', '.employee_list', function () {
    var emp_id = $(this).attr('employee_id');
    $('.employelist_search_ul').empty();
    $('#calender_seleced_emp_' + emp_id).remove();
    var emp_name = $(this).attr('emp_name');
    var color_name = $(this).attr('color_id');
    $('.seleced_child_class').remove();
    $('.seleced_discipline_class').remove();
    if (emp_name == 'All') {
        $('.seleced_emp_class').remove();
    }
    if ($('.seleced_emp_class').attr('emp_id') == 'All') {
        return false;
    }
    var btn = '<a style="background:' + color_name + '" emp_id="' + emp_id + '" id="calender_seleced_emp_' + emp_id + '"  class="topbar_name mancr1 seleced_emp_class">' + emp_name + ' <span remove_id="calender_seleced_emp_' + emp_id + '" class="fa fa-remove remove_staff_calnder"></span></a>';
    $('#selected_calender_employee').append(btn);
    $('#selected_calender_employee').show(500);
    var emp_arr = [];
    $('.seleced_emp_class').each(function () {
        emp_arr.push($(this).attr('emp_id'));
    });
    var tmpdata = {employee_id: emp_arr, child_id: '', discipline: ''};
    var month = $('.month_dropdown').val();
    var year = $('.year_dropdown').val();
    get_calender_details(year, month, tmpdata);
});
$('body').on('click', '.child_list', function () {
    var child_id = $(this).attr('child_id');
    var child_name = $(this).attr('child_name');
    $('.seleced_emp_class').remove();
    $('.seleced_discipline_class').remove();
    $('.employelist_search_ul').empty();
    var color_name = staff_id_color(child_id);
    $('#calender_seleced_child_' + child_id).remove();
    var btn = '<a style="background:' + color_name + '" child_id="' + child_id + '" id="calender_seleced_child_' + child_id + '"  class="topbar_name mancr1 seleced_child_class">' + child_name + ' [CH] <span remove_id="calender_seleced_child_' + child_id + '" class="fa fa-remove remove_child_calnder"></span></a>';
    $('#selected_calender_employee').append(btn);
    $('#selected_calender_employee').show(500);
    var child_arr = [];
    $('.seleced_child_class').each(function () {
        child_arr.push($(this).attr('child_id'));
    });
    var tmpdata = {employee_id: '', child_id: child_arr, discipline: ''};
    var month = $('.month_dropdown').val();
    var year = $('.year_dropdown').val();
    get_calender_details(year, month, tmpdata);
});
$('body').on('click', '.discipline_list', function () {
    var discipline_id = $(this).attr('discipline_id');
    var discipline_name = $(this).attr('discipline_name');
    $('.seleced_emp_class').remove();
    $('.seleced_child_class').remove();
    $('.employelist_search_ul').empty();
    var color_name = staff_id_color(discipline_id);
    $('#calender_seleced_discipline_' + discipline_id).remove();
    var btn = '<a style="background:' + color_name + '" discipline_id="' + discipline_id + '" id="calender_seleced_discipline_' + discipline_id + '"  class="topbar_name mancr1 seleced_discipline_class">' + discipline_name + ' <span remove_id="calender_seleced_discipline_' + discipline_id + '" class="fa fa-remove remove_discipline_calnder"></span></a>';
    $('#selected_calender_employee').append(btn);
    $('#selected_calender_employee').show(500);
    var discipline = [];
    $('.seleced_discipline_class').each(function () {
        discipline.push($(this).attr('discipline_id'));
    });
    var tmpdata = {employee_id: '', child_id: '', discipline: discipline};
    var month = $('.month_dropdown').val();
    var year = $('.year_dropdown').val();
    get_calender_details(year, month, tmpdata);
});
$('body').on('click', '.remove_staff_calnder', function () {
    var remove_id = $(this).attr('remove_id');
    $('#' + remove_id).remove();
    var emp_arr = [];
    $('.seleced_emp_class').each(function () {
        emp_arr.push($(this).attr('emp_id'));
    });
    var tmpdata = {employee_id: emp_arr, child_id: '', discipline: ''};
    get_calender_remove_by(tmpdata)
});
$('body').on('click', '.remove_child_calnder', function () {
    var remove_id = $(this).attr('remove_id');
    $('#' + remove_id).remove();
    var child_arr = [];
    $('.seleced_child_class').each(function () {
        child_arr.push($(this).attr('child_id'));
    });
    if (child_arr.length == 0) {
        child_arr = '';
    }
    var tmpdata = {employee_id: '', child_id: child_arr, discipline: ''};
    get_calender_remove_by(tmpdata);
});
$('body').on('click', '.remove_discipline_calnder', function () {
    var remove_id = $(this).attr('remove_id');
    $('#' + remove_id).remove();
    var disp_arr = [];
    $('.seleced_discipline_class').each(function () {
        disp_arr.push($(this).attr('discipline_id'));
    });
    if (disp_arr.length == 0) {
        disp_arr = '';
    }
    var tmpdata = {employee_id: '', child_id: '', discipline: disp_arr};
    get_calender_remove_by(tmpdata)
});
function get_calender_remove_by(tmpdata) {
    var disl = $('.seleced_discipline_class').length;
    var child = $('.seleced_child_class').length;
    var emp = $('.seleced_emp_class').length;
    if (disl > 0 || child > 0 || emp > 0) {
        $('#selected_calender_employee').show(500);
    } else {
        $('#selected_calender_employee').hide(500);
    }
    var month = $('.month_dropdown').val();
    var year = $('.year_dropdown').val();
    get_calender_details(year, month, tmpdata);
}

$('body').on('keyup', '.event_staff_search', function () {
    var meeting_id = $(this).attr('meeting_id');
    var value = $(this).val();
    if (value == '') {
        $('#event_staff_detals_' + meeting_id).empty();
        return false;
    }
    var data = {status: 'search_employee_name', value: value};
    $.ajax({
        type: 'POST',
        data: data,
        url: base_url + "Home/common",
        async: true,
        success: function (data) {
            var json = jQuery.parseJSON(data);
            $('#event_staff_detals_' + meeting_id).empty();
            var html = '';
            var current_session_emp_id = $('#current_session_emp_id').val();
            html = html + ' <li event_id="' + meeting_id + '" class="event_employee_list" emp_name="All" employee_id="All"  data-title="Select All">Select All</li>';
            for (var i = 0; i < json.length; i++) {
                var d = json[i];
                if (current_session_emp_id != d.id) {
                    html = html + ' <li event_id="' + meeting_id + '" class="event_employee_list" emp_name="' + d.employee_name + '" employee_id="' + d.id + '"  data-title="' + d.employee_name + '">' + d.employee_name + '</li>';
                }
            }
            $('#event_staff_detals_' + meeting_id).append(html);
        }
    });
});
$('body').on('click', '.event_employee_list', function () {
    var emp_id = $(this).attr('employee_id');
    var event_id = $(this).attr('event_id');
    var employee_name = $(this).attr('emp_name');
    var color_name = staff_id_color(emp_id);
    if (emp_id == 'All') {
        $('.event_class_' + event_id).remove();
    }
    if ($('.event_class_' + event_id).attr('emp_id') == 'All') {
        return false;
    }
    $('#event_selected_stff_' + emp_id + event_id).remove();
    var btn = '<a style="background:' + color_name + '" emp_id="' + emp_id + '" id="event_selected_stff_' + emp_id + event_id + '"  value="' + employee_name + '" class="event_class_' + event_id + ' topbar_name mancr1 poplistemy_ents">' + employee_name + ' <span remove_id="event_selected_stff_' + emp_id + event_id + '" class="fa fa-remove remove_staff_event"></span></a>';
    $('#event_selected_staff_' + event_id).append(btn);
    $('#event_staff_detals_' + event_id).empty();
});
$('body').on('click', '.save_events', function () {
    var event_id = $(this).attr('events_id');
    var json = '';
    json = json + '{';
    var delete_id = $('#save_events_' + event_id).attr('event_grp_id')
    json = json + '"delete_id":"' + delete_id + '",';
    json = json + '"created_by":"' + $(this).attr('created_by') + '",';
    json = json + '"event_date":"' + $(this).attr('events_date') + '",';
    json = json + '"event_id_grp":"' + Math.random() + '",';
    var staff_arr = [];

    $('.event_class_' + event_id).each(function () {
        staff_arr.push($(this).attr('emp_id'));
    });
    json = json + '"staff_arr":"' + staff_arr + '",';
    var subject = $('#event_subject_' + event_id);
    if (subject.val() == '') {
        subject.focus();
        subject.css('border-color', 'red');
        return false;
    } else {
        subject.css('border-color', '');
        json = json + '"subject":"' + subject.val() + '",';
    }
    var location = $('#event_location_' + event_id);
    if (location.val() == 'Select') {
        location.focus();
        location.css('border-color', 'red');
        return false;
    } else {
        location.css('border-color', '');
        json = json + '"location":"' + location.val() + '",';
    }
    var start_time = $('#start_time_' + event_id);
    if (start_time.val() == '') {
        start_time.focus();
        start_time.css('border-color', 'red');
        return false;
    } else {
        start_time.css('border-color', '');
        json = json + '"start_time":"' + start_time.val() + '",';
    }
    var end_time = $('#end_time_' + event_id);
    if (end_time.val() == '') {
        end_time.focus();
        end_time.css('border-color', 'red');
        return false;
    } else {
        if (start_time.val() >= end_time.val()) {
            end_time.focus();
            end_time.css('border-color', 'red');
            return false;
        }
        end_time.css('border-color', '');
        json = json + '"end_time":"' + end_time.val() + '",';
    }
    var eventselect_days = [];
    $('.eventselect_days_name_' + event_id).each(function () {
        if ($(this).is(':checked')) {
            eventselect_days.push($(this).val());
        }
    });
    json = json + '"start_date":"' + $('#event_startdate_' + event_id).val() + '",';
    json = json + '"end_date":"' + $('#event_endate_' + event_id).val() + '",';
    json = json + '"eventselect_days":"' + eventselect_days + '",';
    var event_add_me;
    if ($('#monthly_event_add_me_' + event_id).is(':checked')) {
        event_add_me = 'Yes';
    } else {
        event_add_me = 'No';
    }
    json = json + '"event_add_me":"' + event_add_me + '",';
    json = json + '"notes":"' + $('#notes_' + event_id).val() + '"';
    json = json + '}';
    $(this).hide(500);
    $.ajax({
        url: base_url + "Home/save_calender_event",
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
                    window.location = '';
                }, 2000);
            } else if (json.status == 'Error') {
                $('#error-message').html('Please select the vaild date and Days');
                $('.alert-danger').show();
                $('.alert-danger').slideDown(500);
                setTimeout(function () {
                    $('.alert-danger').slideUp(500);
                }, 2000);
            } else {
                if (json.status == 'busy') {
                    var html_busy = json.message;
                    $('.month_message_box').empty();
                    $('.month_message_box').append(html_busy);
                    $('.save_events').show(500);
                }
            }

        }
    });
});
$('body').on('click', '.remove_staff_event', function () {
    var remove_id = $(this).attr('remove_id');
    $('#' + remove_id).remove();
});
function staff_id_color(staff_id) {
    // staff id = color array id
    var staff_arr_color = ['#3598dc', '#32c5d2', '#318db2', '#9A12B3', '#03a9f4', '#749600', '#1abc9c', '#2ecc71',
        '#3a6f81', '#d5c295', '#8E44AD', '#C8D046', '#F4D03F', '#F7CA18', '#F3C200', '#F3C200',
        '#F2784B', '#E87E04', '#D91E18', '#EF4836', '#26C281', '#4B77BE', '#1BA39C', '#555555',
        '#67809F', '#22313F', '#3598DC', '#2C3E50', '#2F353B', '#1BA39C', '#00B500', '#805B56'
    ];
    var color_name = '';
    for (var i = 0; i < staff_arr_color.length; i++) {
        if (i == staff_id) {
            color_name = staff_arr_color[i];
            break;
        }
    }
    return color_name;
}
$('body').on('click', '.delete_events_monthly', function () {
    var event_id_grp = $(this).attr('event_id_grp');
    var data = {status: 'month_event_delete', event_id_grp: event_id_grp};
    $.ajax({
        url: base_url + "Home/receipt_helper",
        async: true,
        type: 'POST',
        data: data,
        success: function (data) {
            window.location = '';
        }
    });
});
$('body').on('dblclick', '.update_event', function () {
    $('.modal').modal('hide');
    var created_id = $(this).attr('created_id');
    var date = $(this).attr('date');
    var start_time = $(this).attr('start_time');
    var end_time = $(this).attr('end_time');
    var event_id_grp = $(this).attr('event_id_grp');
    var metting_id = $(this).attr('metting_id');
    var db_id = $(this).attr('db_id');
    var data = {status: 'get_previous_created_event_details', created_id: created_id, date: date, start_time: start_time, end_time: end_time, event_id_grp: event_id_grp};
    $.ajax({
        url: base_url + "Home/receipt_helper",
        async: true,
        type: 'POST',
        data: data,
        success: function (data) {
            var json = jQuery.parseJSON(data);
            $('#metting_id_' + metting_id).modal('show');
            console.log(json);
            var total_emp = json.total_emp;
            var event = json.event;
            $('#event_subject_' + metting_id).val(event[0].subject);
            $('#event_location_' + metting_id + ' option[value=' + event[0].location + ']').attr('selected', 'selected');
            var time = event[0].start_time.substr(0, 5);
            var html = print_time(time);
            $('#start_time_' + metting_id).empty();
            $('#start_time_' + metting_id).append(html);

            var time = event[0].end_time.substr(0, 5);
            var html = print_time(time);
            $('#end_time_' + metting_id).empty();
            $('#end_time_' + metting_id).append(html);
            $('#notes_' + metting_id).append(event[0].notes);
            if (json.add_me > 0) {
                $('#monthly_event_add_me_' + metting_id).prop('checked', true);
            } else {
                $('#monthly_event_add_me_' + metting_id).prop('checked', false);
            }
            $('.eventselect_days_name_' + metting_id).prop('checked', false);
            $('#event_startdate_' + metting_id).val(event[0].event_date);
            if (total_emp[0].total_emp == event.length) {
                var btn = '<a style="background:" emp_id="All" id="event_selected_stff_update_all" value="All" class="event_class_' + metting_id + ' topbar_name mancr1 poplistemy_ents">All <span remove_id="event_selected_stff_update_all" class="fa fa-remove remove_staff_event"></span></a>';
                $('#event_selected_staff_' + metting_id).empty();
                $('#event_selected_staff_' + metting_id).append(btn);
                for (var i = 0; i < event.length; i++) {
                    var d = event[i];
                    var days_name = return_dayname_by_date(d.event_date);
                    $('#eventselect_days_name_' + days_name + '_' + metting_id).prop('checked', true);
                }
            } else {
                $('#event_selected_staff_' + metting_id).empty();
                for (var i = 0; i < event.length; i++) {
                    var d = event[i];
                    $('#event_endate_' + metting_id).val(d.event_date);
                    var color_name = staff_id_color(d.staff_id);
                    var days_name = return_dayname_by_date(d.event_date);
                    $('#eventselect_days_name_' + days_name + '_' + metting_id).prop('checked', true);
                    $('#event_selected_stff_' + d.staff_id + metting_id).remove();
                    var btn = '<a style="background:' + color_name + '" emp_id="' + d.staff_id + '" id="event_selected_stff_' + d.staff_id + metting_id + '"  value="' + d.employee_name + '" class="event_class_' + metting_id + ' topbar_name mancr1 poplistemy_ents">' + d.employee_name + ' <span remove_id="event_selected_stff_' + d.staff_id + metting_id + '" class="fa fa-remove remove_staff_event"></span></a>';
                    $('#event_selected_staff_' + metting_id).append(btn);
                }
            }
            $('#save_events_' + metting_id).attr('event_grp_id', event[0].event_id_grp);
            $('#delete_events_monthly_' + metting_id).attr('event_id_grp', event[0].event_id_grp)
            $('#delete_events_monthly_' + metting_id).show(500);


            $('#delete_single_monthly_' + metting_id).attr('db_id', db_id)
            $('#delete_single_monthly_' + metting_id).show(500);
        }
    });
    $('#metting_id_update').show();
});
$('body').on('click', '.event_empty_textbox', function () {
    var metting_id = $(this).attr('metting_id');

    $('#event_subject_' + metting_id).val('');
    $('#event_location_' + metting_id + ' option:first').attr('selected', 'selected');
    var html = print_time();
    $('#start_time_' + metting_id).empty();
    $('#start_time_' + metting_id).append(html);
    $('#end_time_' + metting_id).empty();
    $('#end_time_' + metting_id).append(html);
    $('#notes_' + metting_id).append('');
    $('#monthly_event_add_me_' + metting_id).prop('checked', true);
    $('.eventselect_days_name_' + metting_id).prop('checked', true);
    $('#event_selected_staff_' + metting_id).empty();
    $('#save_events_' + metting_id).attr('event_grp_id', '');
    $('#delete_events_monthly_' + metting_id).attr('event_id_grp', '');
    $('#delete_events_monthly_' + metting_id).hide(500);

    $('#delete_single_monthly_' + metting_id).attr('db_id', '')
    $('#delete_single_monthly_' + metting_id).hide(500);
})
function return_dayname_by_date(date) {
    var weekday = ["sun", "mon", "tue", "wed", "thu", "fri", "sat"];
    var a = new Date(date);
    return (weekday[a.getDay()]);
}























$('body').on('click', '#close_mode', function () {
    $('#metting_id_update').hide();
});

///    view week calender  //

function get_week_days_calender_status() {
    $('#search_employee_for_month_div').hide();
    $('#selected_calender_employee').hide();
    var lgth = $('.seleced_emp_for_week_class').length;
    if (lgth > 0) {
        $('#selected_calender_employee_for_week').show();
    } else {
        $('#selected_calender_employee_for_week').hide();
    }
    $('#search_employee_for_week_div').show();
    $('#export_appointment').attr('export_type', 'Week');
    $('#calender_type').val('');
    export_btn_show('week_export');
    view_week_calender();
}
function get_month_calender_status() {
    var lgth = $('.seleced_emp_class').length;
    $('#search_employee_for_month_div').show(500);
    if (lgth > 0) {
        $('#selected_calender_employee').show();
    }
    $('#search_employee_for_week_div').hide(500);
    $('#selected_calender_employee_for_week').hide();

    $('#export_appointment').attr('export_type', $('.month_dropdown').val());
    $('#calender_type').val('');
    export_btn_show('export_appointment');
}
function get_days_calender_status(calender_type, day_date = '', find_date = '', pervnext_day = '') {
    $('#export_appointment').attr('export_type', 'Days');
    var lgth = $('.seleced_emp_for_week_class').length;
    if (lgth > 0) {
        $('#selected_calender_employee_for_week').show();
    } else {
        $('#selected_calender_employee_for_week').hide();
    }
    if (calender_type == 'day') {
        $('#weekly_calnder_view').hide();
        $('#calendar_details').hide();
        $('#days_calnder_view').hide();
        $('#get_days_calender_by_date_view').show();
        $('#calendar_tab').show();
    }
    $('#search_employee_for_month_div').hide();
    $('#selected_calender_employee').hide();
    $('#search_employee_for_week_div').show();
    export_btn_show(calender_type);
    $('#calender_type').val(calender_type);
    view_week_calender(calender_type, day_date, find_date, pervnext_day);
}

function export_btn_show(tbl_id) {
    if (tbl_id == 'today') {
        $('#today_export_btn').show();
        $('#export_appointment').hide();
        $('#week_export_btn').hide();
        $('#day_export_btn').hide();
    }
    if (tbl_id == 'day') {
        $('#today_export_btn').hide();
        $('#export_appointment').hide();
        $('#week_export_btn').hide();
        $('#day_export_btn').show();
    }
    if (tbl_id == 'export_appointment') {
        $('#today_export_btn').hide();
        $('#export_appointment').show();
        $('#week_export_btn').hide();
        $('#day_export_btn').hide();
    }
    if (tbl_id == 'week_export') {
        $('#today_export_btn').hide();
        $('#export_appointment').hide();
        $('#week_export_btn').show();
        $('#day_export_btn').hide();
    }
}
function view_week_calender(calendey_type = '', day_date = '', find_date = '', pervnext_day = '') {
    //                                     day_date   ==    month calender Click to any date it will come to date calender
    var emp_id = $('.seleced_emp_for_week_class').attr('emp_id');
    if (emp_id == undefined) {
        emp_id = '';
    }
    if (calendey_type == '') {
        calendey_type = $('#calender_type').val();
    }
    var data = {status: 'get_week_calender', emp_id: emp_id, calendey_type: calendey_type, day_date: day_date, find_date: find_date, pervnext_day: pervnext_day};
    $.ajax({
        type: 'POST',
        data: data,
        url: base_url + "Home/calendar_helper",
        async: true,
        success: function (data) {
            if (calendey_type == 'today') {
                $('#days_calnder_view').empty();
                $('#days_calnder_view').append(data);
                popover_click();
            } else if (calendey_type == 'day') {
                $('#get_days_calender_by_date_view').empty();
                $('#get_days_calender_by_date_view').append(data);
                popover_click();
            } else {
                $('#weekly_calnder_view').empty();
                $('#weekly_calnder_view').append(data);
                popover_click();
            }
        }
    });
}

$('body').on('keyup', '#calender_search_employee_for_week', function () {
    var value = $(this).val();
    if (value == '') {
        $('.employelist_search_ul_weekdays').empty();
        return false;
    }
    var data = {status: 'search_employee_and_child_name', value: value};
    $.ajax({
        type: 'POST',
        data: data,
        url: base_url + "Home/calendar_helper",
        async: true,
        success: function (data) {
            var json = jQuery.parseJSON(data);
            $('.employelist_search_ul_weekdays').empty();
            var html = '';
            for (var i = 0; i < json.employee.length; i++) {
                var d = json.employee[i];
                html = html + ' <li color_id="' + d.color_id + '" class="employee_list_for_week" emp_name="' + d.employee_name + '" employee_id="' + d.id + '"  title="Employee : ' + d.employee_name + '">' + d.employee_name + '[EMP]</li>';
            }
            $('.employelist_search_ul_weekdays').append(html);
        }
    });
});
$('body').on('click', '.employee_list_for_week', function () {
    var emp_id = $(this).attr('employee_id');
    $('.employelist_search_ul_weekdays').empty();
    var emp_name = $(this).attr('emp_name');
    var color_name = $(this).attr('color_id');
    $('#selected_calender_employee_for_week').empty();
    var btn = '<a style="background:' + color_name + '" emp_id="' + emp_id + '" class="topbar_name mancr1 seleced_emp_for_week_class">' + emp_name + '</a>';
    $('#selected_calender_employee_for_week').append(btn);
    $('#selected_calender_employee_for_week').show(500);
    view_week_calender();
});










$('body').on('click', '#export_appointment', function () {
    var emp_arr = [];
    var export_type = $('.month_dropdown').val();
    $('.seleced_emp_class').each(function () {
        emp_arr.push($(this).attr('emp_id'));
    });
    if (emp_arr == '') {
        emp_arr = '';
    }
    var data = {status: 'export_appointment', export_type: export_type, emp_arr: emp_arr};
    $.ajax({
        type: 'POST',
        data: data,
        url: base_url + "Home/calendar_helper",
        async: true,
        success: function (data) {
            $('#tbl_export').empty();
            $('#tbl_export').append(data);
            export_table('table_searchshipment');
        }
    });
});

function export_table(tbl_id) {
    var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById(tbl_id);
    var table_html = table_div.outerHTML.replace(/ /g, '%20');

    var a = document.createElement('a');
    a.href = data_type + ', ' + table_html;
    a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
    a.click();
}
//<![CDATA[
//<![CDATA[
var tableToExcel = (function () {
    var uri = 'data:application/vnd.ms-excel;base64,'
            , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
            , base64 = function (s) {
                return window.btoa(unescape(encodeURIComponent(s)))
            }
    , format = function (s, c) {
        return s.replace(/{(\w+)}/g, function (m, p) {
            return c[p];
        })
    }
    return function (table, name, file_name = '') {
        if (!table.nodeType)
            table = document.getElementById(table)
        var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
        //window.location.href = uri + base64(format(template, ctx))
        var link = document.createElement("a");
        link.download = file_name + ".xls";
        link.href = uri + base64(format(template, ctx));
        link.click();
    }
})()
//]]> 
//]]> 
// week calender add add_activity
$('body').on('click', '.add_activity', function () {
    var activity_date = $(this).attr('activity_date');
    $('#activity_date').text($(this).attr('activity_date'));
    var start_time = $(this).attr('start_time');
    $('#activity_start_time').html(print_time(start_time));
    $('#activity_end_time').html(print_time(start_time));
    $('#activty_end_date').val(activity_date);
    $('#activity_start_date').val(activity_date);
    $('#status_busy_div').hide(500);
    $('#basic_add_activity').modal('toggle');
    $("#activity_location").prop("selectedIndex", 0)
    set_update_content_activity('');
});
$('body').on('click', '#save_activites', function () {
    var subject = $('#activity_subject');
    var activity_location = $('#activity_location');
    var start_time = $('#activity_start_time').val();
    var end_time = $('#activity_end_time').val();
    var json = '';
    json = json + '{';
    if (subject.val() == '') {
        subject.focus();
        subject.css('border-color', 'red');
        return false;
    } else {
        subject.css('border-color', '');
        json = json + '"subject":"' + subject.val() + '",';
    }

    if (activity_location.val() == '') {
        activity_location.focus();
        activity_location.css('border-color', 'red');
        return false;
    } else {
        activity_location.css('border-color', '');
        json = json + '"activity_location":"' + activity_location.val() + '",';
    }

    if (start_time >= end_time) {
        $('#activity_end_time').focus();
        $('#activity_end_time').css('border-color', 'red');
        return false;
    }
    var staff_arr = [];
    $('.activity_class_update').each(function () {
        staff_arr.push($(this).attr('emp_id'));
    });
    var activity_add_me;
    if ($('#activity_add_me').is(':checked')) {
        activity_add_me = 'Yes';
    } else {
        activity_add_me = 'No';
    }

    var days_name_activty = [];
    $('.days_name_activty').each(function () {
        if ($(this).is(':checked')) {
            days_name_activty.push($(this).val());
        }
    });
    json = json + '"start_date":"' + $('#activity_start_date').val() + '",';
    json = json + '"end_date":"' + $('#activty_end_date').val() + '",';
    json = json + '"days_name_activty":"' + days_name_activty + '",';
    json = json + '"activty_id_grp":"' + Math.random() + '",';
    json = json + '"delete_id":"' + $(this).attr('activities_id_grp') + '",';
    json = json + '"staff_arr":"' + staff_arr + '",';
    json = json + '"activity_add_me":"' + activity_add_me + '",';
    json = json + '"start_time":"' + start_time + '",';
    json = json + '"end_time":"' + end_time + '",';
    json = json + '"notes":"' + $('#activity_notes').val() + '"';
    json = json + '}';
    // $('#save_activites').hide(500);
    $('#status_busy_div').hide(500);
    var data = {status: 'save_activites', json: json};
    $.ajax({
        type: 'POST',
        data: data,
        url: base_url + "Home/calendar_helper",
        async: true,
        success: function (data) {
            var json = jQuery.parseJSON(data);
            if (json.status == 'busy') {
                $('#save_activites').show(500);
                var html_busy = json.employee_name + ' is not available ( ' + json.start_time + '-' + json.end_time + ' )';
                $('#start_time_busy').html(html_busy);
                $('#status_busy_div').show(500);
            } else {
                $('#status_busy_div').hide(500);
                var calender_type = $('#calender_type').val();
                if (calender_type == '') {
                    view_week_calender();
                } else {
                    get_days_calender_status(calender_type, $('#activity_date').text());
                }
                $('#basic_add_activity').modal('hide');
                $('#status_busy_div').hide(500);
                $('#save_activites').show(500);
            }
        }
    });
});


$('body').on('keyup', '#activity_staff_search', function () {
    var value = $(this).val();
    if (value == '') {
        $('#activity_staff_detals').empty();
        return false;
    }
    var data = {status: 'search_employee_name', value: value};
    $.ajax({
        type: 'POST',
        data: data,
        url: base_url + "Home/common",
        async: true,
        success: function (data) {
            var json = jQuery.parseJSON(data);
            $('#activity_staff_detals').empty();
            var html = '';
            html = html + ' <li  class="activity_employee_list_update" emp_name="All" employee_id="All"  data-title="Select All">Select All</li>';
            for (var i = 0; i < json.length; i++) {
                var current_session_emp_id = $('#current_session_emp_id').val();
                var d = json[i];
                if (current_session_emp_id != d.id) {
                    html = html + ' <li  class="activity_employee_list_update" emp_name="' + d.employee_name + '" employee_id="' + d.id + '"  data-title="' + d.employee_name + '">' + d.employee_name + '</li>';
                }
            }
            $('#activity_staff_detals').append(html);
        }
    });
});
$('body').on('click', '.activity_employee_list_update', function () {
    var emp_id = $(this).attr('employee_id');
    var employee_name = $(this).attr('emp_name');
    var color_name = staff_id_color(emp_id);
    if (emp_id == 'All') {
        $('.activity_class_update').remove();
    }
    if ($('.activity_class_update').attr('emp_id') == 'All') {
        return false;
    }
    $('#activity_selected_stff_update_' + emp_id).remove();
    var btn = '<a style="background:' + color_name + '" emp_id="' + emp_id + '" id="activity_selected_stff_update_' + emp_id + '"  value="' + employee_name + '" class="activity_class_update topbar_name mancr1 poplistemy_ents">' + employee_name + ' <span remove_id="activity_selected_stff_update_' + emp_id + '" class="fa fa-remove remove_staff_event"></span></a>';
    $('#activity_selected_staff_update').append(btn);
    $('#activity_staff_detals').empty();
});


// update activites....

$('body').on('dblclick', '.update_activity', function () {
    var db_id = $(this).attr('db_id');
    var created_by = $(this).attr('created_by');
    var db_date = $(this).attr('db_date');
    var dbstart_time = $(this).attr('dbstart_time');
    var dbend_time = $(this).attr('dbend_time');
    var activities_id_grp = $(this).attr('activities_id_grp');

    $('#activity_date').text(db_date);
    $('#activity_start_time').html(print_time(dbstart_time));
    $('#activity_end_time').html(print_time(dbend_time));
    $('#status_busy_div').hide(500);
    $('#activity_add_me').prop('checked', false);
    $('#basic_add_activity').modal('toggle');
    var data = {status: 'get_save_activity_details', created_by: created_by, activities_id_grp: activities_id_grp};
    $.ajax({
        type: 'POST',
        data: data,
        url: base_url + "Home/calendar_helper",
        async: true,
        success: function (data) {
            var json = jQuery.parseJSON(data);
            var emp = json.selected_emp;
            $('#delet_current_one').attr('db_id', db_id);
            set_update_content_activity(emp);
            var current_session_emp_id = $('#current_session_emp_id').val();
            $('#activity_selected_staff_update').empty();
            for (var i = 0; i < emp.length; i++) {
                var d = emp[i];
                if (parseInt(current_session_emp_id) == parseInt(d.staff_id)) {
                    $('#activity_add_me').prop('checked', true);
                } else {
                    var emp_id = d.staff_id;
                    var employee_name = d.employee_name;
                    var color_name = staff_id_color(emp_id);
                    $('#activity_selected_stff_update_' + emp_id).remove();
                    var btn = '<a style="background:' + color_name + '" emp_id="' + emp_id + '" id="activity_selected_stff_update_' + emp_id + '"  value="' + employee_name + '" class="activity_class_update topbar_name mancr1 poplistemy_ents">' + employee_name + ' <span remove_id="activity_selected_stff_update_' + emp_id + '" class="fa fa-remove remove_staff_event"></span></a>';
                    $('#activity_selected_staff_update').append(btn);
                }
            }
        }
    });
});
$('body').on('click', '#delet_activites', function () {
    var activities_id_grp = $(this).attr('activities_id_grp');
    var data = {status: 'delete_activity_details', activities_id_grp: activities_id_grp};
    $.ajax({
        type: 'POST',
        data: data,
        url: base_url + "Home/calendar_helper",
        async: true,
        success: function (data) {
            view_week_calender();
            $('#basic_add_activity').modal('hide');
        }
    });
});
$('body').on('click', '.delete_events_monthly_single', function () {
    var activities_id_grp = $(this).attr('activities_id_grp');
    var data = {status: 'delete_event_details_by_db_id', db_id: $(this).attr('db_id')};
    $.ajax({
        type: 'POST',
        data: data,
        url: base_url + "Home/calendar_helper",
        async: true,
        success: function (data) {
            window.location = '';
        }
    });
});

$('body').on('click', '#delet_current_one', function () {
    var data = {status: 'delete_activites_details_by_db_id', db_id: $(this).attr('db_id')};
    $.ajax({
        type: 'POST',
        data: data,
        url: base_url + "Home/calendar_helper",
        async: true,
        success: function (data) {
            view_week_calender();
            $('#basic_add_activity').modal('hide');
        }
    });
});

function set_update_content_activity(update_type_json) {
    if (update_type_json == '') {
        $('#activity_add_me').prop('checked', true);
        $('#activity_subject').val('');
        $('#activity_notes').val('');

        $('#delet_activites').hide(500);
        $('#delet_current_one').hide(500);
        $('#delet_current_one').attr('db_id', '');
        $('#activity_selected_staff_update').empty();
        $('#save_activites').attr('activities_id_grp', '');
        $('.days_name_activty').prop('checked', true);
    } else {
        var d = update_type_json;
        $('#activity_subject').val(d[0].subject);
        $('#activity_notes').val(d[0].notes);
        $('#activity_start_date').val(d[0].activities_date);
        $('#delet_activites').show(500);
        $('#delet_current_one').show(500);
        $('.days_name_activty').prop('checked', false);
        $('#save_activites').attr('activities_id_grp', d[0].activities_id_grp);
        $('#delet_activites').attr('activities_id_grp', d[0].activities_id_grp);
        $('#activity_location option[value="' + d[0].location + '"]').attr("selected", "selected");
        for (var i = 0; i < d.length; i++) {
            var tmp = d[i];
            $('#activty_end_date').val(tmp.activities_date);
            var day_name = return_dayname_by_date(tmp.activities_date);
            $('#days_name_' + day_name + '_activty').prop('checked', true);
        }
    }
}
$('body').on('mouseup', '.select_close_area', function () {
    var value = getSelectedText();
    if (value != '') {
        var metting_id = $(this).attr('metting_id');
        $('#metting_id_' + metting_id).modal('hide')
    }
})
$('body').on('click', '.days_calender_by_date', function () {
    var date = $(this).attr('date');
    get_days_calender_status('day', date);
});
$('body').on('click', '.pervnext_week', function () {
    var find_date = $(this).attr('start_date');
    view_week_calender('', '', find_date);
});
$('body').on('click', '.pervnext_day', function () {
    var pervnext_day = $(this).attr('start_date');
    get_days_calender_status('day', '', '', pervnext_day);
});

$('body').on('click', '.event_add_all_day', function () {
    var event_id = $(this).attr('event_id');
    if ($(this).is(':checked')) {
        $('#select_all_day_div_' + event_id).show(500);
    } else {
        $('#select_all_day_div_' + event_id).hide(500);
    }
});
$('body').on('click', '.activty_add_all_day', function () {
    if ($(this).is(':checked')) {
        $('#select_all_day_div_activty').show(500);
    } else {
        $('#select_all_day_div_activty').hide(500);
    }
});

function set_defaulat_employee_btn_for_month() {
    var emp_id = $('#current_session_emp_id').val();
    var emp_name = $('#current_session_emp_id').attr('employee_name');
    var color_id = $('#current_session_emp_id').attr('color_id');
    var html = '';
    html = html + '<a style="background:' + color_id + '" emp_id="' + emp_id + '" id="calender_seleced_emp_' + emp_id + '" class="topbar_name mancr1 seleced_emp_class">' + emp_name + ' <span remove_id="calender_seleced_emp_' + emp_id + '" class="fa fa-remove remove_staff_calnder"></span></a>';
    $('#selected_calender_employee').append(html);
    $('#selected_calender_employee').show();
}
function set_defaulat_employee_btn_for_week() {
    var emp_id = $('#current_session_emp_id').val();
    var emp_name = $('#current_session_emp_id').attr('employee_name');
    var color_id = $('#current_session_emp_id').attr('color_id');
    var html = '';
    html = html + '<a style="background:' + color_id + '" emp_id="' + emp_id + '" class="topbar_name mancr1 seleced_emp_for_week_class">' + emp_name + '</a>';
    $('#selected_calender_employee_for_week').append(html);
}

set_defaulat_employee_btn_for_week();
set_defaulat_employee_btn_for_month();
function getSelectedText() {
    if (window.getSelection) {
        return window.getSelection().toString();
    } else if (document.selection) {
        return document.selection.createRange().text;
    }
    return '';
}

