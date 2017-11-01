// Get all child names with search by therapist
$(function () {
    $('.view_his').hide();
});
$('body').on('keyup', '.childnames', function () {
    var childname = $(this).val();
    if (childname != '') {
        var data = {serachTerm: childname};
        $.ajax({
            url: base_url + "Home/search_child",
            async: true,
            type: 'POST',
            data: data,
            success: function (data) {
                var json = jQuery.parseJSON(data);
                var lists = '';
                var lists = lists + '<ul class="droplist">';

                for (var i = 0; i < json.length; i++) {
                    var child_id = json[i].id;
                    var child_name = json[i].child_name;
                    var lists = lists + '<li class="child_detail" data-childid="' + child_id + '" data-title="' + child_name + '">' + child_name + '</li>';
                }
                var lists = lists + '</ul>';
                $('.childs_names').html(lists);

            }
        })
    }
});

//$('body').on('keyup', '.child_names', function () {
//    var childname = $(this).val();
//    $('.alldropdown').hide(500);
//    if (childname != '') {
//        var data = {serachTerm: childname};
//        $.ajax({
//            url: base_url + "Home/search_child_full_details",
//            async: true,
//            type: 'POST',
//            data: data,
//            success: function (data) {
//                var json = jQuery.parseJSON(data);
//                var lists = '';
//                var lists = lists + '<ul class="droplist">';
//
//                for (var i = 0; i < json.length; i++) {
//                    var tab_n = parseInt(i) + 2;
//                    var child_id = json[i].id;
//                    var child_name = json[i].child_name;
//                    var lists = lists + '<li tabindex="' + tab_n + '" class="child_full_detail" data-childid="' + child_id + '" data-title="' + child_name + '">' + child_name + '</li>';
//                }
//                var lists = lists + '</ul>';
//                $('.childs_names').html(lists);
//                $('.alldropdown').show(500);
//
//            }
//        })
//    }
//});

$('body').on('keyup', '.child_names_thpy', function () {
    var childname = $(this).val();
    if (childname != '') {
        var data = {serachTerm: childname};
        $.ajax({
            url: base_url + "Home/therapy_note_students",
            async: true,
            type: 'POST',
            data: data,
            success: function (data) {
                var json = jQuery.parseJSON(data);
                var lists = '';
                var lists = lists + '<ul class="droplist">';
                for (var i = 0; i < json.length; i++) {
                    var child_id = json[i].id;
                    var child_name = json[i].child_name;
                    var lists = lists + '<li class="child_full_thy" data-childid="' + child_id + '" data-title="' + child_name + '">' + child_name + '</li>';
                }
                var lists = lists + '</ul>';
                $('.child_thpy').html(lists);

            }
        })
    }
});


// Get all child details 
$('body').on('click', '.child_full_thy', function () {
    var child_detail = $(this).data('childid');
    $('.child_thpy').val($(this).data('title'));
    if (child_detail != '') {
        var red_url = base_url + 'Home/therapy_note_lists/' + child_detail;
        window.location.replace(red_url);
    }
});

// Get all child details 
$('body').on('change', '#child_names', function () {
    var child_detail = $(this).val();
    if (child_detail != '') {
        var red_url = base_url + 'Home/child_details/' + child_detail;
        window.location.replace(red_url);
    }
});


// Get all child details 
$('body').on('click', '.child_detail', function () {
    var child_detail = $(this).data('childid');
    $('.childnames').val($(this).data('title'));
    if (child_detail != '') {
        var red_url = base_url + 'Home/list_therapy_notes/' + child_detail;
        window.location.replace(red_url);
    }
});
$('body').on('click', '#goal_submit', function () {
    var json = '';
    var json = json + '{';
    if ($('#goal_title').val() == '') {
        $('#goal_title').focus();
        $('#goal_title').css('border-color', 'red');
        return false;
    } else {
        $('#goal_title').css('border-color', '');
        json = json + '"goal_title":"' + $('#goal_title').val() + '",';
    }
    if ($('#goal_date').val() == '') {
        $('#goal_date').focus();
        $('#goal_date').css('border-color', 'red');
        return false;
    } else {
        $('#goal_date').css('border-color', '');
        json = json + '"goal_date":"' + $('#goal_date').val() + '",';
    }
    if ($('#goal_description').val() == '') {
        $('#goal_description').focus();
        $('#goal_description').css('border-color', 'red');
        return false;
    } else {
        $('#goal_description').css('border-color', '');
        json = json + '"goal_description":"' + $('#goal_description').val() + '",';
    }
    json = json + '"child_id":"' + $('#child_id').val() + '",';
    json = json + '"therapist_name":"' + $('#therapist_name').val() + '",';

    json = json + '"goadlpdf":"' + $('#profile').attr('file_name') + '",';

    json = json + '"therapist_id":"' + $('#therapist_id').val() + '"';
    json = json + '}';
    console.log(json);
    $.ajax({
        url: base_url + "Home/set_a_goal",
        async: true,
        type: 'POST',
        data: "json=" + encodeURIComponent(json),
        success: function (data) {
            var json = jQuery.parseJSON(data);
            if (json.status == 'success') {
                $('.alert-success').show();
                $('#success-message').html('Goal added successfully');
                $('#add_goal').find(':input').val('');
                $('#goal_description').val('');
                setTimeout(function () {
                    $('.alert-danger').slideUp(500);
                    $('.alert-success').slideUp(500);
                    $('#responsive').modal('hide');

                }, 2000);
            } else {
                $('.alert-danger').show();
                $('#success-error').html('Try Again')
            }
        }
    })
});
$('body').on('click', '.goal_edit', function () {
    var goal_id = $(this).data('gid');
    var therapist_id = $(this).data('therapist-id');
    $('#goal_id').val(goal_id);
    $('#therapist_id').val(therapist_id);
});
$('body').on('click', '#goal_edit_submit', function () {
    var str = $("#edit_goal").serialize();
    if (str != '') {
        var data = str;
        $.ajax({
            url: base_url + "Home/edit_goal",
            async: true,
            type: 'POST',
            data: data,
            success: function (data) {
                if (data == '1') {
                    $('.alert-success').show();
                    $('#success-message').html('Updated Successfully');
                    $('#add_goal').find(':input').val('');
                    setTimeout(function () {
                        $('#responsive').modal('hide');
                    }, 2000);
                } else {
                    $('.alert-danger').show();
                    $('#success-error').html('Try Again')
                }
            }
        })
    }
});
$('.v_goal_history').one('click', function (event) {
    var g_id = $(this).data('gid');
    if (g_id != '') {
        var data = {goal_id: g_id};
        $.ajax({
            url: base_url + "Home/view_goals_history",
            async: true,
            type: 'POST',
            data: data,
            success: function (data) {
                console.log(data);
                if (data) {
                    $('.view_his').show();
                    var view_theray;
                    var therapy = jQuery.parseJSON(data);
                    var tr;
                    $.each(therapy, function (i, data) {
                        $("table.table").append("<tr class='tr_remve'><td>" + i + "</td><td>" + therapy[i].goal_title + "</td><td>" + therapy[i].goal_description + "</td><td>" + therapy[i].edited_by + "</td><td>" + therapy[i].edited_date + "</td></tr>");
                    })
                } else {
                    $('.alert-danger').show();
                    $('#success-error').html('Try Again')
                }
            }
        })
    }
});
$('body').on('click', '.accordion-toggle', function () {
    $('.tr_remve').remove();
});
$('.therapy_note_save').click(function () {

    var therapy = '';
    var therapy = therapy + '{';

    therapy = therapy + '"recei_session_fee":"' + $('#recei_session_fee').val() + '",';

    therapy = therapy + '"recei_session_fee":"' + $('#recei_session_fee').val() + '",';

    therapy = therapy + '"recei_session_fee":"' + $('#recei_session_fee').val() + '",';

    if ($('#recei_st_name').val() == '') {
        $('#recei_st_name').focus();
        $('#recei_st_name').css('border-color', 'red');
        return false;
    } else {
        $('#recei_st_name').css('border-color', '');
        therapy = therapy + '"recei_st_name":"' + $('#recei_st_name').val() + '",';
    }
    if ($('#recei_no').val() == '') {
        $('#recei_no').focus();
        $('#recei_no').css('border-color', 'red');
        return false;
    } else {
        therapy = therapy + '"recei_no":"' + $('#recei_no').val() + '",';
    }

    // if ($('#recei_disiplines').val() == '') {
    //     $('#recei_disiplines').focus();
    //     $('#recei_disiplines').css('border-color', 'red');
    //     return false;
    // } else {
    //     therapy = therapy + '"recei_disiplines":"' + $('#recei_disiplines').val() + '",';
    // }

    therapy = therapy + '"recei_disiplines":"' + $('#recei_disiplines').val() + '",';

    if ($('#recei_status').val() == '') {
        $('#recei_status').focus();
        $('#recei_status').css('border-color', 'red');
        return false;
    } else {
        $('#recei_status').css('border-color', '');
        therapy = therapy + '"recei_status":"' + $('#recei_status').val() + '",';
    }

    if ($('#recei_session_date').val() == '') {
        $('#recei_session_date').focus();
        $('#recei_session_date').css('border-color', 'red');
        return false;
    } else {
        $('#recei_session_date').css('border-color', '');
        therapy = therapy + '"recei_session_date":"' + $('#recei_session_date').val() + '",';
    }

    if ($('#recei_session_start_time').val() == '') {
        $('#recei_session_start_time').focus();
        $('#recei_session_start_time').css('border-color', 'red');
        return false;
    } else {
        $('#recei_session_start_time').css('border-color', '');
        therapy = therapy + '"recei_session_start_time":"' + $('#recei_session_start_time').val() + '",';
    }

    if ($('#recei_session_end_time').val() == '') {
        $('#recei_session_end_time').focus();
        $('#recei_session_end_time').css('border-color', 'red');
        return false;
    } else {
        $('#recei_session_end_time').css('border-color', '');
        therapy = therapy + '"recei_session_end_time":"' + $('#recei_session_end_time').val() + '",';
    }
    therapy = therapy + '"recei_child_id":"' + $('#recei_child_id').val() + '",';
    therapy = therapy + '"recei_rescheduled_date":"' + $('#recei_rescheduled_date').val() + '",';
    therapy = therapy + '"recei_rescheduled_session_time_start":"' + $('#recei_rescheduled_session_time_start').val() + '",';
    therapy = therapy + '"recei_rescheduled_session_time_end":"' + $('#recei_rescheduled_session_time_end').val() + '",';
    therapy = therapy + '"recei_therapy_note":"' + $('#recei_therapy_note').val().replace(/[^a-zA-Z ]/g, '') + '",';
    therapy = therapy + '"recei_session_no":"' + $('#recei_session_no').val() + '",';
    therapy = therapy + '"recei_therapist_name":"' + $('#recei_therapist_name').val() + '",';
    therapy = therapy + '"session_therpay_note_id":"' + $('#session_therpay_note_id').val() + '",';
    therapy = therapy + '"therapist":"' + $("input[name='therapist[]']:checked").map(function (_, el) {
        return $(el).val();
    }).get() + '",';
    therapy = therapy + '"therapy_note_pdf":"' + $('#profile').attr('file_name') + '"';
    var therapy = therapy + '}';
    console.log(therapy);
    $.ajax({
        url: base_url + "Home/therapy_session_note",
        async: true,
        type: 'POST',
        data: "therapy=" + encodeURIComponent(therapy),
        success: function (data) {
            var json = jQuery.parseJSON(data);
            if (json.status == 'success') {
                $('.therapy_note_save').hide();
                var ch_id = json.ch_id;
                $('#success-message').html('Therapy Session Note Added Successfully');
                $('.alert-success').show();
                $('.alert-success').slideDown(500);

                setTimeout(function () {
                    $('.alert-danger').slideUp(500);
                    window.location = base_url + '/Home/list_therapy_notes/' + ch_id;
                }, 2000);

            } else {
                $('.alert-danger').show();
                $('#success-error').html('Try Again')
                $('.alert-danger').slideDown(500);
            }
        }
    });
});


$('body').on('click', '.view_therapy', function () {
    var tn_id = $(this).data('tid');
    if (tn_id != '') {
        var data = tn_id;
        var data = {therapy_note_detail: tn_id};
        $.ajax({
            url: base_url + "Home/view_therapy_note",
            async: true,
            type: 'POST',
            data: data,
            success: function (data) {

                if (data) {
                    var therapydata = '';
                    var therapy = jQuery.parseJSON(data);
                    therapydata = therapy[0].t_staff_name + ':' + therapy[0].t_created_date;
                    var info = therapy[0].t_therapy_note;
                    var pdf = therapy[0].t_note_pdf;
                    $('.therapy_b_info').text(therapydata);
                    $('.t_data').text(info);
                    $("a.t_npdf").attr("href", base_url + "files/images/" + pdf);
                } else {
                    $('.alert-danger').show();
                    $('#success-error').html('Try Again')
                }
            }
        })
    }
});
$('body').on('click', '.notes_on', function () {
    var tpid = $(this).data('thrpid');
    var tchild_id = $(this).data('child_id');
    $('#note_t_id').val(tpid);
    $('#child_id').val(tchild_id);

});
$('body').on('click', '#additional_notes_submit', function () {
    var t_id = $('#note_t_id').val();
    var notes_tp = $('#therapy_addition_notes').val();

    var therapy_note = '';
    var therapy_note = therapy_note + '{';
    therapy_note = therapy_note + '"t_id":"' + $('#note_t_id').val() + '",';
    therapy_note = therapy_note + '"child_id":"' + $('#child_id').val() + '",';

    if ($('#therapy_addition_notes').val() == '') {
        $('#therapy_addition_notes').focus();
        $('#therapy_addition_notes').css('border-color', 'red');
        return false;
    } else {
        $('#therapy_addition_notes').css('border-color', '');
        therapy_note = therapy_note + '"additional_notes":"' + $('#therapy_addition_notes').val().replace(/[^a-z0-9\s]/gi, '') + '"';
    }

    var therapy_note = therapy_note + '}';
    if (t_id != '') {
        $.ajax({
            url: base_url + "Home/additional_notes",
            async: true,
            type: 'POST',
            data: "therapy_note=" + encodeURIComponent(therapy_note),
            success: function (data) {
                var json = jQuery.parseJSON(data);
                if (json.status == 'success') {
                    var ch_id = json.ch_id;
                    $('#success-message').html('Therapy additional note added successfully');
                    $('.alert-success').show();
                    $('.alert-success').slideDown(500);
                    setTimeout(function () {
                        $('.alert-danger').slideUp(500);
                        window.location = base_url + 'Home/therapy_note_lists/' + ch_id;
                    }, 2000);

                } else {
                    $('.alert-danger').show();
                    $('#success-error').html('Try Again')
                    $('.alert-danger').slideDown(500);
                }
            }
        })
    }
});
function goBack() {
    window.history.back();
}

$('body').on('click', '.permall', function () {
    $(this).removeClass('permall');
    $(this).addClass('permdel');
    $(':checkbox').prop("checked", true);
});
$('body').on('click', '.permdel', function () {
    $(this).removeClass('permdel');
    $(this).addClass('permall');
    $(':checkbox').prop("checked", false);
});
$('#procedure_add').click(function () {
    var therapy = '';
    var therapy = therapy + '{';
    if ($('#pname').val() == '') {
        $('#pname').focus();
        $('#pname').css('border-color', 'red');
        return false;
    } else {
        $('#pname').css('border-color', '');
        therapy = therapy + '"pname":"' + $('#pname').val() + '",';
    }
    therapy = therapy + '"ppdf":"' + $('#profile').attr('file_name') + '"';
    var therapy = therapy + '}';
    console.log(therapy);
    $.ajax({
        url: base_url + "Home/policy_procedure",
        async: true,
        type: 'POST',
        data: "therapy=" + encodeURIComponent(therapy),
        success: function (data) {
            var json = jQuery.parseJSON(data);
            if (json.status == 'success') {
                $('#success-message').html('Policy procedure added successfully');
                $('.alert-success').show();
                $('.alert-success').slideDown(500);
                $('#procedure_add').hide();
                setTimeout(function () {
                    $('.alert-danger').slideUp(500);
                    window.location = base_url + '/Home/view_policy_procedure';
                }, 2000);

            } else {
                $('.alert-danger').show();
                $('#success-error').html('Try Again')
                $('.alert-danger').slideDown(500);
            }
        }
    });
});
$('#procedure_accept').click(function () {
    if ($(this).prop("checked") == true) {
        $(this).val("Yes");
    } else if ($(this).prop("checked") == false) {
        $(this).val("No");
    }
});
$('body').on('click', '#procedure_accept_save', function () {
    var accept = '';
    var accept = accept + '{';
    if ($('#procedure_accept').val() == '' || $('#procedure_accept').val() == 'No') {
        $('#procedure_accept').focus();
        $('.box').css('border-color', 'red');
        return false;
    } else {
        $('#procedure_accept').css('border-color', '');
        accept = accept + '"accept":"' + $('#procedure_accept').val() + '"';
    }
    var accept = accept + '}';
    console.log(accept);
    $.ajax({
        url: base_url + "Home/accept_policy_procedure",
        async: true,
        type: 'POST',
        data: "accept=" + encodeURIComponent(accept),
        success: function (data) {
            var json = jQuery.parseJSON(data);
            if (json.status == 'success') {
                $('#success-message').html('Sensation Station policy procedure accepted successfully');
                $('.alert-success').show();
                $('.alert-success').slideDown(500);
                $('#procedure_add').hide();
                setTimeout(function () {
                    $('.alert-danger').slideUp(500);
                    window.location = base_url + 'Home';
                }, 2000);

            } else {
                $('.alert-danger').show();
                $('#success-error').html('Try Again')
                $('.alert-danger').slideDown(500);
            }
        }
    });
});

$('body').on('change', '.uppload_file', function () {
    var form_name = $(this).attr('form_name');
    var fd = new FormData(document.getElementById(form_name));
    fd.append("file_id", $(this).attr('file_id'));
    fd.append("status", 'upload_therpay_note_pdf');
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
            $('#profile').attr('file_name', json.file_name);
        }
    });
    return false;
});

$('body').on('click', '.strike_note', function () {
    var strike = $(this).data('strike');
    var stk = $(this).data('stk');
    var sess_id = $(this).data('sessid');


    var json = '';
    var json = json + '{';
    json = json + '"strike_id":"' + strike + '",';
    json = json + '"sess_id":"' + sess_id + '",';
    json = json + '"strike_note":"' + stk + '"';
    var json = json + '}';
    console.log(json);
    $.ajax({
        url: base_url + "Home/strike_note",
        async: true,
        type: 'POST',
        data: "json=" + encodeURIComponent(json),
        success: function (data) {
            var json = jQuery.parseJSON(data);
            if (json.status == 'success') {
                $('#success-message').html(json.message);
                $('.alert-success').show();
                $('.alert-success').slideDown(500);
                $('#procedure_add').hide();

                setTimeout(function () {
                    $('.alert-danger').slideUp(500);
                    window.location = base_url + 'Home/view_single_session/' + json.session;
                }, 2000);

            } else {
                $('.alert-danger').show();
                $('#success-error').html('Try Again')
                $('.alert-danger').slideDown(500);
            }
        }
    });
});
