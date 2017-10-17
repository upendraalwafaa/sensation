/*
 * Consent form  
 */
$('#consent_next').click(function () {
    var json = '';
    var json = json + '{';
    json = json + '"child_id":"' + $('#child_id').val() + '",';
    json = json + '"consent_form_id":"' + $('#consent_form_id').val() + '",';
    json = json + '"enrolment_status":"' + $('#enrolment_status').val() + '",';
    if ($('#child_name').val() == '') {
        $('#child_name').focus();
        $('#child_name').css('border-color', 'red');
        return false;
    } else {
        $('#child_name').css('border-color', '');
        json = json + '"child_name":"' + $('#child_name').val() + '",';
    }

    if ($('input[name=pro_working_clild]:checked').val() == undefined) {
        $('#pro_working_clild_yese').focus();
        $('.pro_working_clild').css('border', '2px solid red');

        return false;
    }
    if ($('input[name=pro_working_clild]:checked').val() == 'Yes') {
        json = json + '"pro_working_clild":"' + $('#pro_working_clild_yes').val() + '",';
        $('.pro_working_clild').css('border', '');
    }
    if ($('input[name=pro_working_clild]:checked').val() == 'No') {
        json = json + '"pro_working_clild":"' + $('#pro_working_clild_no').val() + '",';
        $('.pro_working_clild').css('border', '');
    }

    if ($('input[name=child_school]:checked').val() == undefined) {
        $('.child_school').focus();
        $('.child_school').css('border', '2px solid red');

        return false;
    }
    if ($('input[name=child_school]:checked').val() == 'Yes') {
        json = json + '"child_school":"' + $('#child_school_yes').val() + '",';
        $('.child_school').css('border', '');
    }
    if ($('input[name=child_school]:checked').val() == 'No') {
        json = json + '"child_school":"' + $('#child_school_no').val() + '",';
        $('.child_school').css('border', '');
    }

    if ($('input[name=medical_pro]:checked').val() == undefined) {
        $('.medical_pro').css('border', '2px solid red');
        $('.medical_pro').focus();
        return false;
    }
    if ($('input[name=medical_pro]:checked').val() == 'Yes') {
        json = json + '"medical_pro":"' + $('#medical_pro_yes').val() + '",';
        $('.medical_pro').css('border', '');
    }
    if ($('input[name=medical_pro]:checked').val() == 'No') {
        json = json + '"medical_pro":"' + $('#medical_pro_no').val() + '",';
        $('.medical_pro').css('border', '');
    }

    if ($('#child_involved').val() == '') {
        $('#child_involved').focus();
        $('#child_involved').css('border-color', 'red');
        return false;
    } else {
        $('#child_involved').css('border-color', '');
        json = json + '"child_involved":"' + $('#child_involved').val() + '",';
    }


    if ($('#share_details_happ_or_not').val() == '') {
        $('#share_details_happ_or_not').focus();
        $('#share_details_happ_or_not').css('border-color', 'red');
        return false;
    } else {
        $('#share_details_happ_or_not').css('border-color', '');
        json = json + '"share_details_happ_or_not":"' + $('#share_details_happ_or_not').val() + '",';
    }

    if ($('input[name=perm_photographs]:checked').val() == undefined) {
        $('.perm_photogrphs').css('border', '2px solid red');
        $('.perm_photographs').focus();
        return false;
    }
    if ($('input[name=perm_photographs]:checked').val() == 'Yes') {
        json = json + '"perm_photographs":"' + $('#perm_photogrphs_yes').val() + '",';
        $('.perm_photogrphs').css('border', '');
    }
    if ($('input[name=perm_photographs]:checked').val() == 'No') {
        json = json + '"perm_photographs":"' + $('#perm_photogrphs_no').val() + '",';
        $('.perm_photogrphs').css('border', '');
    }

    if ($('input[name=perm_to_use_images]:checked').val() == undefined) {
        $('.perm_use_image').css('border', '2px solid red');
        $('.perm_to_use_images').focus();
        return false;
    }
    if ($('input[name=perm_to_use_images]:checked').val() == 'Yes') {
        json = json + '"perm_to_use_images":"' + $('#perm_use_image_yes').val() + '",';
        $('.perm_use_image').css('border', '');
    }
    if ($('input[name=perm_to_use_images]:checked').val() == 'No') {
        json = json + '"perm_to_use_images":"' + $('#perm_use_image_no').val() + '",';
        $('.perm_use_image').css('border', '');
    }

    if ($('input[name=volunteers_to_observe]:checked').val() == undefined) {
        $('.volunteers').css('border', '2px solid red');
        $('.volunteers_to_observe').focus();
        return false;
    }
    if ($('input[name=volunteers_to_observe]:checked').val() == 'Yes') {
        json = json + '"volunteers_to_observe":"' + $('#volunteers_yes').val() + '",';
        $('.volunteers').css('border', '');
    }
    if ($('input[name=volunteers_to_observe]:checked').val() == 'No') {
        json = json + '"volunteers_to_observe":"' + $('#volunteers_no').val() + '",';
        $('.volunteers').css('border', '');
    }

    if ($('#accept_date').val() == '') {
        $('#accept_date').focus();
        $('#accept_date').css('border-color', 'red');
        return false;
    } else {
        $('#accept_date').css('border-color', '');
        json = json + '"accept_date":"' + $('#accept_date').val() + '",';
    }

    if ($('#father_name').val() == '') {
        $('#father_name').focus();
        $('#father_name').css('border-color', 'red');
        return false;
    } else {
        $('#father_name').css('border-color', '');
        json = json + '"father_name":"' + $('#father_name').val() + '",';
    }
    if ($('#consent_accept').val() == '') {
        $('#consent_accept').focus();
        $('#consent_accept').css('border-color', 'red');
        return false;
    } else {
        $('#consent_accept').css('border-color', '');
        json = json + '"consent_accept":"' + $('#consent_accept').val() + '"';
    }
    json = json + '}';
    console.log(json);
    $.ajax({
        url: base_url + "Home/view_consent_form/",
        async: true,
        type: 'POST',
        data: "json=" + encodeURIComponent(json),
        success: function (data) {
            console.log(data);
            var json = jQuery.parseJSON(data);
            if (json.status == 'success') {
                var chid = json.child_id;
                $('#success-message').html('Data Updated Successfully');
                $('.alert-success').show();
                $('.alert-success').slideDown(500);
                $('.alert-danger').slideUp(500);
                var msg = '';
                var status = '';
                var student_id = chid;
                var enrolment_status = json.enrolment_status;
                if (enrolment_status == 0) {
                    $('.alert-success').slideUp(1000);
                    $('#enrolment_id').modal('show');
                    $('.save_enrol_yes').click(function () {
                        var stud_id = $(this).data('student_id');
                        var enrol = $(this).data('enrol');
                        if (enrol == "Yes") {
                            var data = {status: 'student_enrolment', student_id: stud_id};
                            $.ajax({
                                url: base_url + "Home/student_enrolment",
                                async: true,
                                type: 'POST',
                                data: data,
                                success: function (data) {
                                    var json = jQuery.parseJSON(data);
                                    if (json.status == 'success') {
                                        $('.alert-success').show();
                                        $('.alert-success').slideDown(500);
                                        $('#success-message').html('Data Updated Successfully');
                                        setTimeout(function () {
                                            window.location = base_url + 'Home/reg_view';
                                        }, 2000);
                                    }
                                }
                            });
                        }
                    });
                    $('.save_enrol_no').click(function () {
                        var enrol = $(this).data('enrol');
                        if (enrol == "No") {
                            $('#enrolment_id').modal('hide');
                        }
                    });
                } else {
                    setTimeout(function () {
                        window.location = base_url + 'Home/electronic_quotation_details';
                    }, 1500);
                }


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
/* Consent Form End*/
/*
 * cancellation form  
 */
$('#cancellation_next').click(function () {
    var json = '';
    var json = json + '{';
    json = json + '"child_id":"' + $('#child_id').val() + '",';
    json = json + '"cancel_form_id":"' + $('#cancel_form_id').val() + '",';
    if ($('#child_name').val() == '') {
        $('#child_name').focus();
        $('#child_name').css('border-color', 'red');
        return false;
    } else {
        $('#child_name').css('border-color', '');
        json = json + '"child_name":"' + $('#child_name').val() + '",';
    }
    if ($('#father_name').val() == '') {
        $('#father_name').focus();
        $('#father_name').css('border-color', 'red');
        return false;
    } else {
        $('#father_name').css('border-color', '');
        json = json + '"father_name":"' + $('#father_name').val() + '",';
    }
    if ($('#accept_date').val() == '') {
        $('#accept_date').focus();
        $('#accept_date').css('border-color', 'red');
        return false;
    } else {
        $('#accept_date').css('border-color', '');
        json = json + '"accept_date":"' + $('#accept_date').val() + '",';
    }
    if ($('#cancel_accept').val() == '') {
        $('#cancel_accept').focus();
        $('#cancel_accept').css('border-color', 'red');
        return false;
    } else {
        $('#cancel_accept').css('border-color', '');
        json = json + '"cancel_accept":"' + $('#cancel_accept').val() + '"';
    }
    json = json + '}';
    console.log(json);
    $.ajax({
        url: base_url + "Home/cancellation_form",
        async: true,
        type: 'POST',
        data: "json=" + encodeURIComponent(json),
        success: function (data) {
            console.log(data);
            var json = jQuery.parseJSON(data);
            if (json.status == 'success') {
                var chid = json.child_id;
                $('#success-message').html('Data Updated Successfully');
                $('.alert-success').show();
                $('.alert-success').slideDown(500);
                setTimeout(function () {
                    $('.alert-danger').slideUp(500);
                    window.location = base_url + 'Home/view_consent_form/' + chid;
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
/* Consent Form End */
/* 
 *Terms and condition outreach
 */
$('#terms_condition_outreach').click(function () {
    var json = '';
    var json = json + '{';
    json = json + '"child_id":"' + $('#child_id').val() + '",';
    json = json + '"outeach_form_id":"' + $('#outeach_form_id').val() + '",';
    if ($('#child_name').val() == '') {
        $('#child_name').focus();
        $('#child_name').css('border-color', 'red');
        return false;
    } else {
        $('#child_name').css('border-color', '');
        json = json + '"child_name":"' + $('#child_name').val() + '",';
    }
    if ($('#father_name').val() == '') {
        $('#father_name').focus();
        $('#father_name').css('border-color', 'red');
        return false;
    } else {
        $('#father_name').css('border-color', '');
        json = json + '"father_name":"' + $('#father_name').val() + '",';
    }
    if ($('#accept_date').val() == '') {
        $('#accept_date').focus();
        $('#accept_date').css('border-color', 'red');
        return false;
    } else {
        $('#accept_date').css('border-color', '');
        json = json + '"accept_date":"' + $('#accept_date').val() + '",';
    }
    if ($('#outeach_form_accept').val() == '') {
        $('#outeach_form_accept').focus();
        $('#outeach_form_accept').css('border-color', 'red');
        return false;
    } else {
        $('#outeach_form_accept').css('border-color', '');
        json = json + '"outeach_form_accept":"' + $('#outeach_form_accept').val() + '"';
    }
    json = json + '}';
    console.log(json);
    $.ajax({
        url: base_url + "Home/terms_condition_outreach/",
        async: true,
        type: 'POST',
        data: "json=" + encodeURIComponent(json),
        success: function (data) {
            //console.log(data);
            var json = jQuery.parseJSON(data);
            if (json.status == 'success') {
                var chid = json.child_id;
                $('#success-message').html('Data Updated Successfully');
                $('.alert-success').show();
                $('.alert-success').slideDown(500);
                setTimeout(function () {
                    $('.alert-danger').slideUp(500);
                    window.location = base_url + 'Home/view_consent_form/' + chid;
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
/* outreach Form End*/
/* 
 *Terms and condition center
 */
$('#terms_condition_center').click(function () {
    var json = '';
    var json = json + '{';
    json = json + '"child_id":"' + $('#child_id').val() + '",';
    json = json + '"condition_center_form_id":"' + $('#condition_center_form_id').val() + '",';
    json = json + '"enrolment_status":"' + $('#enrolment_status').val() + '",';
    if ($('#child_name').val() == '') {
        $('#child_name').focus();
        $('#child_name').css('border-color', 'red');
        return false;
    } else {
        $('#child_name').css('border-color', '');
        json = json + '"child_name":"' + $('#child_name').val() + '",';
    }
    if ($('#father_name').val() == '') {
        $('#father_name').focus();
        $('#father_name').css('border-color', 'red');
        return false;
    } else {
        $('#father_name').css('border-color', '');
        json = json + '"father_name":"' + $('#father_name').val() + '",';
    }
    if ($('#accept_date').val() == '') {
        $('#accept_date').focus();
        $('#accept_date').css('border-color', 'red');
        return false;
    } else {
        $('#accept_date').css('border-color', '');
        json = json + '"accept_date":"' + $('#accept_date').val() + '",';
    }
    if ($('#condition_center_form_accept').val() == '') {
        $('#condition_center_form_accept').focus();
        $('#condition_center_form_accept').css('border-color', 'red');
        return false;
    } else {
        $('#condition_center_form_accept').css('border-color', '');
        json = json + '"condition_center_form_accept":"' + $('#condition_center_form_accept').val() + '"';
    }
    json = json + '}';
    console.log(json);
    $.ajax({
        url: base_url + "Home/terms_condition_center/",
        async: true,
        type: 'POST',
        data: "json=" + encodeURIComponent(json),
        success: function (data) {
            console.log(data);
            var json = jQuery.parseJSON(data);

            if (json.status == 'success') {
                var chid = json.child_id;
                $('#success-message').html('Data Updated Successfully');
                $('.alert-success').show();
                $('.alert-success').slideDown(500);
                setTimeout(function () {
                    $('.alert-danger').slideUp(500);
                    window.location = base_url + 'Home/cancellation_form/' + chid;
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
/* Consent Form End*/
/* 
 *Therapy History
 */
$('#therapy_case_history').click(function () {
    var json = '';
    var json = json + '{';
    json = json + '"child_id":"' + $('#child_id').val() + '",';
    json = json + '"therapy_case_history_id":"' + $('#therapy_case_history_id').val() + '",';
    if ($('#dob').val() == '') {
        $('#dob').focus();
        $('#dob').css('border-color', 'red');
        return false;
    } else {
        $('#dob').css('border-color', '');
        json = json + '"dob":"' + $('#dob').val() + '",';
    }

    // if ($('#school').val() == '') {
    //     $('#school').focus();
    //     $('#school').css('border-color', 'red');
    //     return false;
    // } else {
    //     $('#school').css('border-color', '');
        json = json + '"school":"' + $('#school').val() + '",';
    //}

    // if ($('#therapists').val() == '') {
    //     $('#therapists').focus();
    //     $('#therapists').css('border-color', 'red');
    //     return false;
    // } else {
    //     $('#therapists').css('border-color', '');

    // }
    json = json + '"therapists":"' + $('#therapists').val() + '",';

    // if ($('#main_parental_concerns').val() == '') {
    //     $('#main_parental_concerns').focus();
    //     $('#main_parental_concerns').css('border-color', 'red');
    //     return false;
    // } else {
        //$('#main_parental_concerns').css('border-color', '');
        json = json + '"main_parental_concerns":"' + $('#main_parental_concerns').val() + '",';
   // }

    // if ($('#family_history').val() == '') {
    //     $('#family_history').focus();
    //     $('#family_history').css('border-color', 'red');
    //     return false;
    // } else {
    //$('#father_name').css('border-color', '');
    json = json + '"family_history":"' + $('#family_history').val() + '",';
    //} 

    // if ($('input[name=review_registration_form]:checked').val() == undefined) {
    //     $('.review_registration_forme').css('border-color', 'red');
    //     $('#review_registration_form').focus();
    //     return false;
    // }
    //if ($('input[name=review_registration_form]:checked').val() == 'Yes') {
        json = json + '"review_registration_form":"' + $('#review_registration_form').val() + '",';
    //}
    // if ($('input[name=perm_photographs]:checked').val() == '') {
    //     json = json + '"review_registration_form":"' + $('#review_registration_form').val() + '",';
    // }

    // if ($('#review_registration_form_details').val() == '') {
    //     $('#review_registration_form_details').focus();
    //     $('#review_registration_form_details').css('border-color', 'red');
    //     return false;
    // } else {
        //$('#review_registration_form_details').css('border-color', '');
        json = json + '"review_registration_form_details":"' + $('#review_registration_form_details').val() + '",';
    //}


    if ($('input[name=child_hearing_tested]:checked').val() == undefined) {
        $('#child_hearing_tested').focus();
        $('.child_hearing_tested').css('border', '2px solid red');
        return false;
    }
    if ($('input[name=child_hearing_tested]:checked').val() == 'Yes') {
        json = json + '"child_hearing_tested":"' + $('#child_hearing_tested_yes').val() + '",';
        $('.child_hearing_tested').css('border', '2px solid #27a4b0');

        if ($('#child_hearing_tested_date').val() == '') {
            $('#child_hearing_tested_date').focus();
            $('#child_hearing_tested_date').css('border-color', 'red');
            return false;
        } else {
            $('#child_hearing_tested_date').css('border-color', '');

        }
    }
    json = json + '"child_hearing_tested_date":"' + $('#child_hearing_tested_date').val() + '",';
    if ($('input[name=child_hearing_tested]:checked').val() == 'No') {
        json = json + '"child_hearing_tested":"' + $('#child_hearing_tested_no').val() + '",';
        $('#child_hearing_tested_date').css('border-color', '');
    }

    if ($('input[name=child_eyesight_tested]:checked').val() == undefined) {
        $('.child_eyesight_tested').css('border', '2px solid red');

        $('#child_eyesight_tested').focus();
        return false;
    }
    if ($('input[name=child_eyesight_tested]:checked').val() == 'Yes') {
        json = json + '"child_eyesight_tested":"' + $('#child_eyesight_tested_yes').val() + '",';
        $('.child_eyesight_tested').css('border', '2px solid #27a4b0');
        if ($('#child_eyesight_tested_date').val() == '') {
            $('#child_eyesight_tested_date').focus();
            $('#child_eyesight_tested_date').css('border-color', 'red');
            return false;
        } else {
            $('#child_eyesight_tested_date').css('border-color', '');

        }
    }
    json = json + '"child_eyesight_tested_date":"' + $('#child_eyesight_tested_date').val() + '",';
    if ($('input[name=child_eyesight_tested]:checked').val() == 'No') {
        json = json + '"child_eyesight_tested":"' + $('#child_eyesight_tested_no').val() + '",';
        $('#child_eyesight_tested_date').css('border-color', '');
        json = json + '"child_eyesight_tested_date":"' + $('#child_eyesight_tested_date').val() + '",';
    }

    json = json + '"outcome_hearing_test":"' + $('#outcome_hearing_test').val() + '",';
    json = json + '"outcome_eye_test":"' + $('#outcome_eye_test').val() + '",';
    // if ($('#therapies_assessments').val() == '') {
    //     $('#therapies_assessments').focus();
    //     $('#therapies_assessments').css('border-color', 'red');
    //     return false;
    // } else {
    //$('#therapies_assessments').css('border-color', '');
    json = json + '"therapies_assessments":"' + $('#therapies_assessments').val() + '",';
    // } 

    // if ($('#age_in_years_months').val() == '') {
    //     $('#age_in_years_months').focus();
    //     $('#age_in_years_months').css('border-color', 'red');
    //     return false;
    // } else {
    //     $('#age_in_years_months').css('border-color', '');
        json = json + '"age_in_years_months":"' + $('#age_in_years_months').val() + '",';
   // }

    // if ($('#sat_unsupported').val() == '') {
    //     $('#sat_unsupported').focus();
    //     $('#sat_unsupported').css('border-color', 'red');
    //     return false;
    // } else {
        //$('#sat_unsupported').css('border-color', '');
        json = json + '"sat_unsupported":"' + $('#sat_unsupported').val() + '",';
    //}

    // if ($('#crawled').val() == '') {
    //     $('#crawled').focus();
    //     $('#crawled').css('border-color', 'red');
    //     return false;
    // } else {
    //     $('#crawled').css('border-color', '');
        json = json + '"crawled":"' + $('#crawled').val() + '",';
    //}

    // if ($('#how').val() == '') {
    //     $('#how').focus();
    //     $('#how').css('border-color', 'red');
    //     return false;
    // } else {
    //     $('#how').css('border-color', '');
        json = json + '"how":"' + $('#how').val() + '",';
    //}

    // if ($('#walked_unsupported').val() == '') {
    //     $('#walked_unsupported').focus();
    //     $('#walked_unsupported').css('border-color', 'red');
    //     return false;
    // } else {
    //     $('#walked_unsupported').css('border-color', '');
        json = json + '"walked_unsupported":"' + $('#walked_unsupported').val() + '",';
    //}

    // if ($('#walking_backwards').val() == '') {
    //     $('#walking_backwards').focus();
    //     $('#walking_backwards').css('border-color', 'red');
    //     return false;
    // } else {
    //     $('#walking_backwards').css('border-color', '');
        json = json + '"walking_backwards":"' + $('#walking_backwards').val() + '",';
    //}

    // if ($('#jumped').val() == '') {
    //     $('#jumped').focus();
    //     $('#jumped').css('border-color', 'red');
    //     return false;
    // } else {
        //$('#jumped').css('border-color', '');
        json = json + '"jumped":"' + $('#jumped').val() + '",';
    //}

    // if ($('#bicycle').val() == '') {
    //     $('#bicycle').focus();
    //     $('#bicycle').css('border-color', 'red');
    //     return false;
    // } else {
    //     $('#bicycle').css('border-color', '');
        json = json + '"bicycle":"' + $('#bicycle').val() + '",';
    //}

    // if ($('#independently_activities').val() == '') {
    //     $('#independently_activities').focus();
    //     $('#independently_activities').css('border-color', 'red');
    //     return false;
    // } else {
    //     $('#independently_activities').css('border-color', '');
        json = json + '"independently_activities":"' + $('#independently_activities').val() + '",';
    //}

    // if ($('#gross_motor').val() == '') {
    //     $('#gross_motor').focus();
    //     $('#gross_motor').css('border-color', 'red');
    //     return false;
    // } else {
    //     $('#gross_motor').css('border-color', '');
    json = json + '"gross_motor":"' + $('#gross_motor').val() + '",';
    //}

    // if ($('#fine_motor').val() == '') {
    //     $('#fine_motor').focus();
    //     $('#fine_motor').css('border-color', 'red');
    //     return false;
    // } else {
    //     $('#fine_motor').css('border-color', '');
    json = json + '"fine_motor":"' + $('#fine_motor').val() + '",';
    //}

    // if ($('#feeding').val() == '') {
    //     $('#feeding').focus();
    //     $('#feeding').css('border-color', 'red');
    //     return false;
    // } else {
    //     $('#feeding').css('border-color', '');
        json = json + '"feeding":"' + $('#feeding').val() + '",';
    //}

    json = json + '"toileting":"' + $('#toileting').val() + '",';
    json = json + '"grooming":"' + $('#grooming').val() + '",';
    json = json + '"dressing":"' + $('#dressing').val() + '",';
    json = json + '"bathing":"' + $('#bathing').val() + '",';

    // if ($('#separation_issues').val() == '') {
    //     $('#separation_issues').focus();
    //     $('#separation_issues').css('border-color', 'red');
    //     return false;
    // } else {
    //     $('#separation_issues').css('border-color', '');
        json = json + '"separation_issues":"' + $('#separation_issues').val() + '",';
   // }

    var checked = []
    $("input[name='sensory_processing[]']:checked").each(function ()
    {
        checked.push($(this).val());
    });
    json = json + '"sensory_processing":"' + checked + '",';



    // if ($('#any_other_difficulties').val() == '') {
    //     $('#any_other_difficulties').focus();
    //     $('#any_other_difficulties').css('border-color', 'red');
    //     return false;
    // } else {
    //     $('#any_other_difficulties').css('border-color', '');
        json = json + '"any_other_difficulties":"' + $('#any_other_difficulties').val() + '",';
    //}

    // if ($('#presentation_nursery_school').val() == '') {
    //     $('#presentation_nursery_school').focus();
    //     $('#presentation_nursery_school').css('border-color', 'red');
    //     return false;
    // } else {
        //$('#presentation_nursery_school').css('border-color', '');
        json = json + '"presentation_nursery_school":"' + $('#presentation_nursery_school').val() + '",';
   // }

    // if ($('#presentation_home').val() == '') {
    //     $('#presentation_home').focus();
    //     $('#presentation_home').css('border-color', 'red');
    //     return false;
    // } else {
        $('#presentation_home').css('border-color', '');
        json = json + '"presentation_home":"' + $('#presentation_home').val() + '",';
    //}

    // if ($('#babble').val() == '') {
    //     $('#babble').focus();
    //     $('#babble').css('border-color', 'red');
    //     return false;
    // } else {
       // $('#babble').css('border-color', '');
        json = json + '"babble":"' + $('#babble').val() + '",';
    //}

    // if ($('#say_first_words').val() == '') {
    //     $('#say_first_words').focus();
    //     $('#say_first_words').css('border-color', 'red');
    //     return false;
    // } else {
    //     $('#say_first_words').css('border-color', '');
        json = json + '"say_first_words":"' + $('#say_first_words').val() + '",';
    //}

    // if ($('#put_words_together').val() == '') {
    //     $('#put_words_together').focus();
    //     $('#put_words_together').css('border-color', 'red');
    //     return false;
    // } else {
    //     $('#put_words_together').css('border-color', '');
        json = json + '"put_words_together":"' + $('#put_words_together').val() + '",';
    //}

    // if ($('#speak_longer_sentences').val() == '') {
    //     $('#speak_longer_sentences').focus();
    //     $('#speak_longer_sentences').css('border-color', 'red');
    //     return false;
    // } else {
    //     $('#speak_longer_sentences').css('border-color', '');
        json = json + '"speak_longer_sentences":"' + $('#speak_longer_sentences').val() + '",';
    //}

    // if ($('#home_language').val() == '') {
    //     $('#home_language').focus();
    //     $('#home_language').css('border-color', 'red');
    //     return false;
    // } else {
    //     $('#home_language').css('border-color', '');
        json = json + '"home_language":"' + $('#home_language').val() + '",';
    //}

    // if ($('#other_languages').val() == '') {
    //     $('#other_languages').focus();
    //     $('#other_languages').css('border-color', 'red');
    //     return false;
    // } else {
    //     $('#other_languages').css('border-color', '');
        json = json + '"other_languages":"' + $('#other_languages').val() + '",';
    //}

    // if ($('#expressive_language').val() == '') {
    //     $('#expressive_language').focus();
    //     $('#expressive_language').css('border-color', 'red');
    //     return false;
    // } else {
    //     $('#expressive_language').css('border-color', '');
        json = json + '"expressive_language":"' + $('#expressive_language').val() + '",';
    //}

    // if ($('#receptive_language').val() == '') {
    //     $('#receptive_language').focus();
    //     $('#receptive_language').css('border-color', 'red');
    //     return false;
    // } else {
    //     $('#receptive_language').css('border-color', '');
        json = json + '"receptive_language":"' + $('#receptive_language').val() + '",';
    //}

    // if ($('#speech_articulation').val() == '') {
    //     $('#speech_articulation').focus();
    //     $('#speech_articulation').css('border-color', 'red');
    //     return false;
    // } else {
    //     $('#speech_articulation').css('border-color', '');
        json = json + '"speech_articulation":"' + $('#speech_articulation').val() + '",';
    //}

    // if ($('#playing_alongside').val() == '') {
    //     $('#playing_alongside').focus();
    //     $('#playing_alongside').css('border-color', 'red');
    //     return false;
    // } else {
    //     $('#playing_alongside').css('border-color', '');
        json = json + '"playing_alongside":"' + $('#playing_alongside').val() + '",';
    //}

    // if ($('#any_behavioral_issues').val() == '') {
    //     $('#any_behavioral_issues').focus();
    //     $('#any_behavioral_issues').css('border-color', 'red');
    //     return false;
    // } else {
    //     $('#any_behavioral_issues').css('border-color', '');
        json = json + '"any_behavioral_issues":"' + $('#any_behavioral_issues').val() + '",';
    //}

    // Naturation details get value start
    if ($('input[name=gluten_free]:checked').val() == 'Yes') {
        json = json + '"gluten_free_duration":"' + $('#gluten_free_duration').val() + '",';
    }
    json = json + '"gluten_free":"' + $('input[name=gluten_free]:checked').val() + '",';

    if ($('input[name=dairy_free]:checked').val() == 'Yes') {
        json = json + '"dairy_free_duration":"' + $('#dairy_free_duration').val() + '",';
    }
    json = json + '"dairy_free":"' + $('input[name=dairy_free]:checked').val() + '",';

    if ($('input[name=casein_free]:checked').val() == 'Yes') {
        json = json + '"casein_free_duration":"' + $('#casein_free_duration').val() + '",';
    }
    json = json + '"casein_free":"' + $('input[name=casein_free]:checked').val() + '",';

    if ($('input[name=soya_free]:checked').val() == 'Yes') {
        json = json + '"soya_free_duration":"' + $('#soya_free_duration').val() + '",';
    }
    json = json + '"soya_free":"' + $('input[name=soya_free]:checked').val() + '",';

    if ($('input[name=phenol_free]:checked').val() == 'Yes') {
        json = json + '"phenol_free_duration":"' + $('#phenol_free_duration').val() + '",';
    }
    json = json + '"phenol_free":"' + $('input[name=phenol_free]:checked').val() + '",';
    if ($('input[name=nutrition_other_specify]:checked').val() == 'Yes') {
        json = json + '"nutrition_other_specify_duration":"' + $('#nutrition_other_specify_duration').val() + '",';
    }
    json = json + '"nutrition_other_specify":"' + $('input[name=nutrition_other_specify]:checked').val() + '",';
    // Naturation details get value end

    // if ($('#any_other_relevant_information').val() == '') {
    //     $('#any_other_relevant_information').focus();
    //     $('#any_other_relevant_information').css('border-color', 'red');
    //     return false;
    // } else {
    //     $('#any_behavioral_issues').css('border-color', '');
        json = json + '"any_other_relevant_information":"' + $('#any_other_relevant_information').val() + '"';
    //}

    json = json + '}';
    console.log(json);
    $.ajax({
        url: base_url + "Home/therapy_history/",
        async: true,
        type: 'POST',
        data: "json=" + encodeURIComponent(json),
        success: function (data) {
            console.log(data);
            var json = jQuery.parseJSON(data);
            if (json.status == 'success') {
                var chid = json.child_id;
                $('#success-message').html('Data Updated Successfully');
                $('.alert-success').show();
                $('.alert-success').slideDown(500);
                setTimeout(function () {
                    $('.alert-danger').slideUp(500);
                    window.location = base_url + 'Home/terms_condition_center/' + chid;
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
/*Therapy History End*/

$('body').on('focus', '.datepicker', function () {

    $("#datepicker").datepicker();

});

/*child document upload
 */
$('.upload_child_docs').click(function () {
    var json = '';
    var json = json + '{';
    json = json + '"child_id":"' + $('#child_id').val() + '",';
    json = json + '"child_doc":"' + $('#profile').attr('file_name') + '",';
    if ($('#child_doc_name').val() == '') {
        $('#child_doc_name').focus();
        $('#child_doc_name').css('border-color', 'red');
        return false;
    } else {
        $('#child_doc_name').css('border-color', '');
        json = json + '"child_doc_name":"' + $('#child_doc_name').val() + '"';
    }
    json = json + '}';
    console.log(json);
    $.ajax({
        url: base_url + "Home/child_docs/",
        async: true,
        type: 'POST',
        data: "json=" + encodeURIComponent(json),
        success: function (data) {
            console.log(data);
            var json = jQuery.parseJSON(data);

            if (json.status == 'success') {
                var chid = json.ch_id;
                $('#success-message').html('Data addded Successfully');
                $('.alert-success').show();
                $('.alert-success').slideDown(500);
                setTimeout(function () {
                    $('.alert-danger').slideUp(500);
                    window.location = base_url + 'Home/child_details/' + chid;
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
/* Consent Form End*/

