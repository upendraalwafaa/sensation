var href = document.location.href;
var lastPathSegment = href.split('/');
$('#reg_form_submit').click(function () {
    var json = '';
    var json = json + '{';
        var reg_form_status='';
        if(lastPathSegment[5]=='customer_reg'){
            reg_form_status='Yes';
        }
      json = json + '"reg_form_outside":"'+reg_form_status+'",';
    var electronic_id=$('#electronic_id').val();
    var quatation_id=$('#quatation_id').val();
    json = json + '"electronic_id":"' + electronic_id + '",';
    json = json + '"quatation_id":"' + quatation_id + '",';  
    
    if ($('#child_name').val() == '') {
        $('#child_name').focus();
        $('#child_name').css('border-color', 'red');
        return false;
    } else {
        $('#child_name').css('border-color', '');
        json = json + '"child_name":"' + $('#child_name').val() + '",';
    }
    if($('#encrypt_id').val() != '')
    {
       json = json + '"e_id":"' + $('#encrypt_id').val() + '",';
    }
    if ($('#date_of_birth').val() == '') {
        $('#date_of_birth').focus();
        $('#date_of_birth').css('border-color', 'red');
        return false;
    } else {
        $('#date_of_birth').css('border-color', '');
        json = json + '"date_of_birth":"' + $('#date_of_birth').val() + '",';
    }
     json = json + '"school_name":"' + $('#school_name').val() + '",'; 
    if ($('input[name=child_gender]:checked').val() == undefined) {
        $('.child_gender').css('border-color', 'red');
        $('#child_name').focus();
        return false;
    } else {
        json = json + '"child_gender":"' + $('input[name=child_gender]:checked').val() + '",';
    }
    
    json = json + '"school_attinding":"' + $('input[name=school_attinding]:checked').val() + '",'; 
    json = json + '"session_type":"' + $('input[name=session_type]:checked').val() + '",'; 
      
    
    if ($('#address').val() == '') {
        $('#address').focus();
        $('#address').css('border-color', 'red');
        return false;
    } else {
        $('#address').css('border-color', '');
        json = json + '"address":"' + $('#address').val() + '",';
    }
    if ($('#father_name').val() == '') {
        $('#father_name').focus();
        $('#father_name').css('border-color', 'red');
        return false;
    } else {
        $('#father_name').css('border-color', '');
        json = json + '"father_name":"' + $('#father_name').val() + '",';
    }
    if ($('#mother_name').val() == '') {
        $('#mother_name').focus();
        $('#mother_name').css('border-color', 'red');
        return false;
    } else {
        $('#mother_name').css('border-color', '');
        json = json + '"mother_name":"' + $('#mother_name').val() + '",';
    }
    if ($('#father_nationality').val() == '') {
        $('#father_nationality').focus();
        $('#father_nationality').css('border-color', 'red');
        return false;
    } else {
        $('#father_nationality').css('border-color', '');
        json = json + '"father_nationality":"' + $('#father_nationality').val() + '",';
    }
    if ($('#mother_nationality').val() == '') {
        $('#mother_nationality').focus();
        $('#mother_nationality').css('border-color', 'red');
        return false;
    } else {
        $('#mother_nationality').css('border-color', '');
        json = json + '"mother_nationality":"' + $('#mother_nationality').val() + '",';
    }
     if ($('#father_occupation').val() == '') {
        $('#father_occupation').focus();
        $('#father_occupation').css('border-color', 'red');
        return false;
    } else {
        $('#father_occupation').css('border-color', '');
       json = json + '"father_occupation":"' + $('#father_occupation').val() + '",';
    }
    if ($('#mother_occupation').val() == '') {
        $('#mother_occupation').focus();
        $('#mother_occupation').css('border-color', 'red');
        return false;
    } else {
        $('#mother_occupation').css('border-color', '');
        json = json + '"mother_occupation":"' + $('#mother_occupation').val() + '",';
    }
 
    json = json + '"father_mobile":"' + $('#father_mobile').val() + '",';
    json = json + '"mother_mobile":"' + $('#mother_mobile').val() + '",';
    json = json + '"father_work_number":"' + $('#father_work_number').val() + '",';
    json = json + '"mother_work_number":"' + $('#mother_work_number').val() + '",';
    json = json + '"father_home_number":"' + $('#father_home_number').val() + '",';
    json = json + '"mother_home_number":"' + $('#mother_home_number').val() + '",';
    json = json + '"father_email":"' + $('#father_email').val() + '",';
    json = json + '"mother_email":"' + $('#mother_email').val() + '",';
    if ($('input[name=father_mother_marital_status]:checked').val() == undefined) {
        $('#marital_staus_display').css('color', 'red');
        $('#father_email').focus();
        return false;
    }
    if ($('input[name=father_mother_marital_status]:checked').val() == 'Other') {
        json = json + '"father_marital_status":"' + $('#other_marital_status').val() + '",';
    } else {
        json = json + '"father_marital_status":"' + $('input[name=father_mother_marital_status]:checked').val() + '",';
    }
    var emergency_contact_name = [];
    var flag='';
    $('.emergency_contact_name').each(function () {
        if($(this).val()==''){
               $(this).css('border-color','red'); 
               $(this).focus();
               flag='false';
            }else{
                 $(this).css('border-color','');  
            }
        emergency_contact_name.push($(this).val());
    });
    if(flag=='false'){
        return false;
    }
    json = json + '"emergency_contact_name":"' + emergency_contact_name.join('~') + '",';
    flag='';
    var emergency_contact_number = [];
    $('.emergency_contact_number').each(function () {
        if($(this).val()==''){
               $(this).css('border-color','red'); 
               $(this).focus();
               flag='false';
            }else{
                 $(this).css('border-color','');  
            }
        emergency_contact_number.push($(this).val());
    });
     if(flag=='false'){
        return false;
    }
    json = json + '"emergency_contact_number":"' + emergency_contact_number.join('~') + '",';

    var relationship_to_child = [];
    flag='';
    $('.relationship_to_child').each(function () {
          if($(this).val()==''){
               $(this).css('border-color','red'); 
               $(this).focus();
               flag='false';
            }else{
                 $(this).css('border-color','');  
            }
        relationship_to_child.push($(this).val());
    });
    if(flag=='false'){
        return false;
    }
    json = json + '"relationship_to_child":"' + relationship_to_child.join('~') + '",';
        var sibling_age = [];
       var tmp_val=0;
    var sibling_name = [];
    $('.sibling_name').each(function () {
         if(tmp_val==0){
            if($(this).val()==''){
            //   $(this).css('border-color','red'); 
            //   $(this).focus();
            //   flag='false';
            }else{
                 $(this).css('border-color','');  
            }
        }
        sibling_name.push($(this).val());
        tmp_val++;
    });
    //  if(flag=='false'){
    //     return false;
    // }
    json = json + '"sibling_name":"' + sibling_name.join('~') + '",';
    var sibling_age = [];
       var tmp_val=0;
    var flag='';
    $('.sibling_age').each(function () {
        //  if(tmp_val==0){
        //     if($(this).val()==''){
        //       $(this).css('border-color','red'); 
        //       $(this).focus();
        //       flag='false';
        //     }else{
        //          $(this).css('border-color','');  
        //     }
        // }
        sibling_age.push($(this).val());
        tmp_val++;
    });
    //  if(flag=='false'){
    //     return false;
    // }
    json = json + '"sibling_age":"' + sibling_age.join('~') + '",';
    var sibling_gender_arr = [];
    var tmp_val=0;
    var flag='';
    $('.sibling_gender_btn').each(function () {
        var btn_id = $(this).attr('radio_btn_id');
        if ($('input[name=sib_gender_status_' + btn_id + ']:checked').val() == undefined && tmp_val==0) {
            // $('.sibling_gender_0').css('color', 'red');
            // $('.relationship_to_child').focus();
            // flag= 'false';
        }else{
              $('.sibling_gender_0').css('color', '');
        }
        sibling_gender_arr.push($('input[name=sib_gender_status_' + btn_id + ']:checked').val());
        tmp_val++;
    });
    //   if(flag=='false'){
    //     return false;
    // }
    json = json + '"sibling_gender":"' + sibling_gender_arr.join('~') + '",';
    json = json + '"additional_sibling_details":"' + $('#additional_sibling_details').val() + '",';

    var child_authorisation_name = [];
    var tmp_val=0;
    var flag='';
    $('.child_authorisation_name').each(function () {
        if(tmp_val==0){
            if($(this).val()==''){
               $(this).css('border-color','red'); 
               $(this).focus();
               flag='false';
            }else{
                 $(this).css('border-color','');  
            }
        }
        child_authorisation_name.push($(this).val());
        tmp_val++;
    });
    if(flag=='false'){
        return false;
    }
    json = json + '"child_authorisation_name":"' + child_authorisation_name.join('~') + '",';

    var child_authorisation_relationship = [];
     var tmp_val=0;
    var flag='';
    $('.child_authorisation_relationship').each(function () {
         if(tmp_val==0){
            if($(this).val()==''){
               $(this).css('border-color','red'); 
               $(this).focus();
               flag='false';
            }else{
                 $(this).css('border-color','');  
            }
        }
        child_authorisation_relationship.push($(this).val());
         tmp_val++;
    });
     if(flag=='false'){
        return false;
    }
    json = json + '"child_authorisation_relationship":"' + child_authorisation_relationship.join('~') + '",';

    var child_authorisation_mobile = [];
    var tmp_val=0;
    var flag='';
    $('.child_authorisation_mobile').each(function () {
         if(tmp_val==0){
            if($(this).val()==''){
               $(this).css('border-color','red'); 
               $(this).focus();
               flag='false';
            }else{
                 $(this).css('border-color','');  
            }
        }
        child_authorisation_mobile.push($(this).val());
         tmp_val++;
    });
     if(flag=='false'){
        return false;
    }
    json = json + '"child_authorisation_mobile":"' + child_authorisation_mobile.join('~') + '",';
  var tmp_val=0;
    var flag='';
    var child_authorisation_id_provided = [];
    $('.child_authorisation_id_provided').each(function () {
         if(tmp_val==0){
            if($(this).val()==''){
               $(this).css('border-color','red'); 
               $(this).focus();
               flag='false';
            }else{
                 $(this).css('border-color','');  
            }
        }
        child_authorisation_id_provided.push($(this).val());
         tmp_val++;
    });
    if(flag=='false'){
        return false;
    }
    json = json + '"child_authorisation_id_provided":"' + child_authorisation_id_provided.join('~') + '",';

    if ($('input[name=diagnosis]:checked').val() == 'Yes') {
        json = json + '"diagnosis_extra_details":"' + $('#diagnosis_extra_details').val() + '",';
    }
    json = json + '"diagnosis":"' + $('input[name=diagnosis]:checked').val() + '",';
    if ($('input[name=hospitalisation]:checked').val() == 'Yes') {
        json = json + '"hospitalisation_extra_details":"' + $('#hospitalisation_extra_details').val() + '",';
    }
    json = json + '"hospitalisation":"' + $('input[name=hospitalisation]:checked').val() + '",';

    if ($('input[name=breastfed]:checked').val() == 'Yes') {
        json = json + '"breastfed_extra_details":"' + $('#breastfed_extra_details').val() + '",';
    }
    json = json + '"breastfed":"' + $('input[name=breastfed]:checked').val() + '",';

    if ($('input[name=external_triggers]:checked').val() == 'Yes') {
        json = json + '"external_triggers_extra_details":"' + $('#external_triggers_extra_details').val() + '",';
    }
    json = json + '"external_triggers":"' + $('input[name=external_triggers]:checked').val() + '",';

    if ($('input[name=disorders_in_fm]:checked').val() == 'Yes') {
        json = json + '"disorders_in_fm_extra_details":"' + $('#disorders_in_fm_extra_details').val() + '",';
    }
    json = json + '"disorders_in_fm":"' + $('input[name=disorders_in_fm]:checked').val() + '",';

    if ($('input[name=child_medication_history]:checked').val() == 'Yes') {
        json = json + '"child_medication_history_extra_details":"' + $('#child_medication_history_extra_details').val() + '",';
    }
    json = json + '"child_medication_history":"' + $('input[name=child_medication_history]:checked').val() + '",';

    if ($('input[name=extended_periods]:checked').val() == 'Yes') {
        json = json + '"extended_periods_extra_Details":"' + $('#extended_periods_extra_Details').val() + '",';
    }
    json = json + '"extended_periods":"' + $('input[name=extended_periods]:checked').val() + '",';
    var illnesses_arr = [];
    $("input[name=illnesses_and_complaints]").each(function () {
        if ($(this).is(':checked')) {
            illnesses_arr.push($(this).val());
        }
    });
    json = json + '"illnesses_arr":"' + illnesses_arr.join('~') + '",';
    json = json + '"illnesses_other_details":"' + $('#illnesses_other_details').val() + '",';
    json = json + '"mother_father_age_deliver_time":"' + $('#mother_father_age_deliver_time').val() + '",';
    json = json + '"pregnancy_history":"' + $('#pregnancy_history').val() + '",';
    json = json + '"delivery_type":"' + $('#delivery_type').val() + '",';
    json = json + '"prenatal_history_comment":"' + $('#prenatal_history_comment').val() + '",';
    json = json + '"apgar_scores":"' + $('#apgar_scores').val() + '",';
    json = json + '"presentation_straight":"' + $('#presentation_straight').val() + '",';
    var baby_first_six_month = [];
    $("input[name=baby_first_six_month]").each(function () {
        if ($(this).is(':checked')) {
            baby_first_six_month.push($(this).val());
        }
    });
     var discpline_ar = [];
        $('.discipline_name').each(function () {
            if ($(this).is(":checked")) {
                discpline_ar.push($(this).val());
            }
        });
    json = json + '"discipline_id":"' + discpline_ar + '",';
    json = json + '"baby_first_six_month":"' + baby_first_six_month.join('~') + '",';

   if ($('input[name=accept_pt_btn]:checked').val() == undefined) {
        $('.accept_pt_btn').css('color', 'red');
        $('#extra_information_child').focus();
        alert('Plese accept this form');
        return false;
    }else{
         json = json + '"accept_pt_btn":"' + $('input[name=accept_pt_btn]:checked').val() + '",';  
    }



    json = json + '"child_id":"' + $('#child_id').val() + '",';
    json = json + '"extra_information_child":"' + $('#extra_information_child').val() + '"';

    
    json = json + '}';
    console.log(json);
    $.ajax({
        url: base_url+"Home/reg_add",
        async: true,
        type: 'POST',
        data: "json11=" + encodeURIComponent(json),
        success: function (data) {

            var json = jQuery.parseJSON(data);
            if (json.status == "success") {
                            console.log(json);
                var chid = json.last_insert_id;
                $('#success-message').html('Form Added Successfully');
                $('.alert-success').show();
                $('.alert-success').slideDown(500);
                setTimeout(function () {
                    $('.alert-danger').slideUp(500);
                    if(reg_form_status==''){
                          window.location = base_url + 'Home/therapy_history/'+chid;
                    }else{
                           window.location = base_url + 'Customer/reg_success/'+electronic_id+'/'+quatation_id;
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
});

/*
* Register Customer 
*/
/* End*/
var more_sibling_counter = $('#add_more_sibiling_details').attr('start_loop');
$('#add_more_sibling').click(function () {
    var html = '';
    var html = html + ' <div class="row" id="sibling_div_' + more_sibling_counter + '">';

    var html = html + '                           <div class="col-sm-4">';
    var html = html + '                               <div class="form-group form-md-line-input has-success">';
    var html = html + '                                  <div class="input-icon">';
    var html = html + '                                    <input type="text" class="form-control sibling_name">';
    var html = html + '                                   <span class="help-block">Ex :-Rahul Kumar</span>';
    var html = html + '                            </div>';
    var html = html + '                        </div>';
    var html = html + '                   </div>';
    var html = html + '                   <div class="col-sm-3">';
    var html = html + '                       <div class="form-group form-md-line-input has-success">';
    var html = html + '                       <div class="input-icon">';
    var html = html + '                            <input type="text" class="form-control sibling_age">';
    var html = html + '                             <span class="help-block">Ex :-10</span>';
    var html = html + '                         </div>';
    var html = html + '                  </div>';
    var html = html + '                 </div>';
    var html = html + '                <div class="col-sm-4 sibling_gender_btn" radio_btn_id="' + more_sibling_counter + '">';
    var html = html + '                    <div class="col-sm-6">';
    var html = html + '                       <div class="form-group form-md-line-input has-success">';
    var html = html + '                        <div class="md-radio">';
    var html = html + '                            <input type="radio" id="sib_Male_' + more_sibling_counter + '" name="sib_gender_status_' + more_sibling_counter + '" value="Male" class="md-radiobtn">';
    var html = html + '                             <label class="sibling_gender_' + more_sibling_counter + '" for="sib_Male_' + more_sibling_counter + '">';
    var html = html + '                               <span class="inc">Male</span>';
    var html = html + '                              <span class="check"></span>';
    var html = html + '                              <span class="box"></span> Male </label>';
    var html = html + '                     </div>';
    var html = html + '                </div>';
    var html = html + '             </div>';
    var html = html + '             <div class="col-sm-6">';
    var html = html + '                 <div class="form-group form-md-line-input has-success">';
    var html = html + '               <div class="md-radio">';
    var html = html + '                     <input type="radio" id="sib_female_' + more_sibling_counter + '" name="sib_gender_status_' + more_sibling_counter + '" value="Female" class="md-radiobtn">';
    var html = html + '                     <label class="sibling_gender_' + more_sibling_counter + '" for="sib_female_' + more_sibling_counter + '">';
    var html = html + '                       <span class="inc">Female</span>';
    var html = html + '                        <span class="check"></span>';
    var html = html + '                       <span class="box"></span> Female </label>';
    var html = html + '                </div>';
    var html = html + '            </div>';
    var html = html + '          </div>';
    
    
    var html = html + '      </div>';
        var html = html + '                           <div class="col-sm-1">';
    var html = html + '                                <br>';
    var html = html + '                                <button type="button" div_id="' + more_sibling_counter + '" class="btn red btn-xs remove_sibling">Remove</button>';
    var html = html + '                           </div>';
    var html = html + '      </div>';
    $('#add_more_sibiling_details').append(html);
    more_sibling_counter++;
});
if($('.sibling_name').length ==0){
    $('#add_more_sibling').click();
}
$('body').on('click', '.remove_sibling', function () {
    var div_id = $(this).attr('div_id');
    $('#sibling_div_' + div_id).remove();
});
var child_authorisation = $('#all_child_authorisation_form_details').attr('start_loop');
$('.add_more_child_authorisation_form').click(function () {
    var html = '';
    var html = html + '    <div class="row" id="child_authorisation_form_' + child_authorisation + '">';
   
    var html = html + '                    <div class="col-sm-3">';
    var html = html + '                        <div class="form-group form-md-line-input has-success">';
    var html = html + '                          <div class="input-icon">';
    var html = html + '                              <input type="text" class="form-control child_authorisation_name">';
    var html = html + '                             <span class="help-block">Ex :-Rahul Kumar</span>';
    var html = html + '                      </div>';
    var html = html + '                </div>';
    var html = html + '          </div>';
    var html = html + '          <div class="col-sm-2">';
    var html = html + '           <div class="form-group form-md-line-input has-success">';
    var html = html + '              <div class="input-icon">';
    var html = html + '                  <input type="text" class="form-control child_authorisation_relationship">';
    var html = html + '                 <span class="help-block">Ex :- Uncle,Friend</span>';
    var html = html + '             </div>';
    var html = html + '         </div>';
    var html = html + '    </div>';
    var html = html + '   <div class="col-sm-3">';
    var html = html + '       <div class="form-group form-md-line-input has-success">';
    var html = html + '           <div class="input-icon">';
    var html = html + '               <input type="text" class="form-control child_authorisation_mobile">';
    var html = html + '              <span class="help-block">Ex :-  +97150887453</span>';
    var html = html + '          </div>';
    var html = html + '      </div>';
    var html = html + '  </div>';
    var html = html + '    <div class="col-sm-3">';
    var html = html + '         <div class="form-group form-md-line-input has-success">';
    var html = html + '           <div class="input-icon">';
    var html = html + '               <input type="text" class="form-control child_authorisation_id_provided">';
    var html = html + '              <span class="help-block">Ex :-  556466666</span>';
    var html = html + '          </div>';
    var html = html + '       </div>';
    var html = html + '    </div>';
    
     var html = html + '                            <div class="col-sm-1">';
    var html = html + '                               <br>';
    var html = html + '                        <button type="button" div_id="' + child_authorisation + '" class="btn red btn-xs remove_authorisation_form">Remove</button>';
    var html = html + '                      </div>';
    var html = html + '    </div>';
    $('#all_child_authorisation_form_details').append(html);
});
if($('.child_authorisation_name').length ==0){
    $('.add_more_child_authorisation_form').click();
}

$('body').on('click', '.remove_authorisation_form', function () {
    var div_id = $(this).attr('div_id');
    $('#child_authorisation_form_' + div_id).remove();
});

$('body').on('dblclick','.child_make_inactive',function (){
    var child_id=$(this).attr('child_id');
    var update_val=$(this).attr('update_val');
     var data={status:'update_inactive_child_status',update_val:update_val,child_id:child_id};
     $.ajax({
        url: base_url+"Home/common",
        async: true,
        type: 'POST',
        data: data,
        success: function (data) {
            console.log(data);
            var json = jQuery.parseJSON(data);
            if (json.status == "success") {
               window.location='';
            }
        }
     });
});