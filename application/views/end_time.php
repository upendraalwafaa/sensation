<?php
$loggid = $logged_in[0]->id;
// echo "<pre>";
// print_r($view_session_details);
// exit;


$perm = explode(',',$view_session_details[0]->t_permission_to_view);
foreach ($list_of_therapist as $key => $value) {
    $arr[] =  $value->id;
}
?>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
          <div class="col-md-12"> 
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
              <div class="portlet-title">
                <div class="caption font-dark"> <i class="icon-settings font-dark"></i> 
                <span class="caption-subject bold uppercase"> Update Therapy Note</span> </div>
              </div>
              <div class="portlet-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="portlet light">
                      <div class="portlet-body">
                        <div class="form-horizontal">
                          <div class="form-body">
                            <div class="form-group">
                              <label class="col-md-2 control-label">Name</label>
                              <div class="col-md-4">
                                <input type="text" class="form-control" id="recei_st_name" name="recei_st_name" value="<?= $view_session_details[0]->child_name; ?>" readonly placeholder="">
                               </div>
                              <label class="col-md-2 control-label">Quatation No</label>
                              <div class="col-md-4">
                                <input type="text" class="form-control" id="recei_no" name="recei_no" value="<?= $view_session_details[0]->quotation_id; ?>" readonly placeholder="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-2 control-label">Services/Courses*</label>
                              <div class="col-md-4">
                                <select class="form-control" id="recei_disiplines" name="recei_disiplines">
                                    <option><?=$view_session_details[0]->disipline_name;?></option>
                                    <option>General Oberservation</option>
                                </select>
                              </div>
                              <label class="col-md-2 control-label">Status</label>
                              <div class="col-md-4">
                              
                                <select class="form-control" name="recei_status" id="recei_status"  >                              >
                                  <option value="">Select Option </option>
                                  <option value="1" <?=($view_session_details[0]->t_status == "1" ? "selected='selected'" : '')?>>Cancelled 100% </option>
                                  <option value="2" <?=($view_session_details[0]->t_status == "2" ? "selected='selected'" : '')?>>Cancelled 50%</option>
                                  <option value="3" <?=($view_session_details[0]->t_status == "3" ? "selected='selected'" : '')?>>No show</option>
                                  <option value="4" <?=($view_session_details[0]->t_status == "4" ? "selected='selected'" : '')?>>Attended</option>
                                  <option value="5" <?=($view_session_details[0]->t_status == "5" ? "selected='selected'" : '')?>>Cancelled by Therapist</option>
                                  <option value="6" <?=($view_session_details[0]->t_status == "6" ? "selected='selected'" : '')?>>Cancelled No charge</option>
                                  <option value="7" <?=($view_session_details[0]->t_status == "7" ? "selected='selected'" : '')?>>No show – SBS – 100% Chargeable</option> 
                                  <option value="8" <?=($view_session_details[0]->t_status == "8" ? "selected='selected'" : '')?>>ELIP (General Observation) – No charge</option>
                                  <option value="9" <?=($view_session_details[0]->t_status == "9" ? "selected='selected'" : '')?>>General Observation – No Charge</option>     
                                  <option value="10" <?=($view_session_details[0]->t_status == "10" ? "selected='selected'" : '')?>>Re-scheduled</option>                                                                                                                                                                 
                                </select>
                              </div>                  

                            </div>
                            <div class="form-group">
                              <label class="col-md-2 control-label">Date</label>
                              <div class="col-md-4">
                               <?php if($view_session_details[0]->t_status == 10){ ?>
<input class="form-control datepicker" name="recei_session_date" id="recei_session_date" placeholder="12-07-2017" type="text" value="<?=$view_session_details[0]->t_rescheduled_date; ?>">
                                <?php } else { ?>
<input class="form-control datepicker" name="recei_session_date" id="recei_session_date" placeholder="12-07-2017" type="text" value="<?=$view_session_details[0]->session_date; ?>">
                                <?php } ?>
                              </div>                
                              <label class="col-md-2 control-label">Start Time</label>
                              <div class="col-md-4">
                                  <input type="text" name="recei_session_start_time" id="recei_session_start_time" value="<?= $view_session_details[0]->start_time; ?>" class="form-control">
                              </div>
                            </div> 
                           <div class="form-group">
                               <label class="col-md-2 control-label">End Time</label>
                               <div class="col-md-4">
                                     <input type="text" name="recei_session_end_time" id="recei_session_end_time" value="<?= $view_session_details[0]->end_time; ?>" class="form-control">                                   
                               </div>
                            </div>
                            
                            <div class="form-group">
                              <label class="col-md-2 control-label">Re-scheduled</label>
                              <div class="col-md-4">
                                <?php if($view_session_details[0]->t_status == 10){ ?>
                                <input class="form-control datepicker" name="recei_rescheduled_date" type="text" value="<?=$view_session_details[0]->session_date?>" id="recei_rescheduled_date"<?=(isset($view_session_details[0]->completion_status) && $view_session_details[0]->completion_status != '' ? 'disabled' : '' )?>>
                                <?php } else { ?>
                                <input class="form-control datepicker" name="recei_rescheduled_date" type="text" value="" id="recei_rescheduled_date"<?=(isset($view_session_details[0]->completion_status) && $view_session_details[0]->completion_status != '' ? 'disabled' : '' )?>>
                                <?php } ?>
                              </div>
                              <label class="col-md-2 control-label">Start Time</label>
                              <div class="col-md-4">
                              <select class="form-control" name="recei_rescheduled_session_time_start"  id="recei_rescheduled_session_time_start" <?=(isset($view_session_details[0]->completion_status) && $view_session_details[0]->completion_status != '' ? 'disabled' : '' )?>>
                                <?php if($view_session_details[0]->t_status == 10){ ?>
                                    <?=print_time($view_session_details[0]->t_rescheduled_start_time) ?>
                                <?php } else { ?>
                                    <option value="00:00">00:00</option>
                                    <?=print_time() ?>
                                <?php } ?>
                              </select>
                              </div>
                            </div> 
                            <div class="form-group">
                              <label class="col-md-2 control-label">End Time</label>
                              <div class="col-md-4">
                              <select class="form-control" name="recei_rescheduled_session_time_end"  id="recei_rescheduled_session_time_end" <?=(isset($view_session_details[0]->completion_status) && $view_session_details[0]->completion_status != '' ? 'disabled' : '' )?>>
                                <?php if($view_session_details[0]->t_status == 10){ ?>
                                    <?=print_time($view_session_details[0]->t_rescheduled_end_time) ?>
                                <?php } else { ?>
                                    <option value="00:00">00:00</option>
                                    <?=print_time() ?>
                                <?php } ?>
                              </select>
                              </div>
                            </div> 



                            <div class="form-group">
                              <label class="col-md-2 control-label">Therapy Note</label>
                              <div class="col-md-10">
                                <textarea class="form-control" rows="10"  name="recei_therapy_note" id="recei_therapy_note" >
                                  <?=(isset($view_session_details[0]->t_therapy_note) && $view_session_details[0]->t_therapy_note != '' ? $view_session_details[0]->t_therapy_note : '' )?></textarea>
                              </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile1"  class="col-md-2 control-label">Attachment</label>
                              <div class="col-md-10">                                
                                <form method="post" id="profile_pic" name="profile_pic">
                                  <input type="file" form_name="profile_pic"   class="form-cont uppload_file"  file_name="<?=(isset($view_session_details[0]->t_note_pdf) && $view_session_details[0]->t_note_pdf == '' ? '' : $view_session_details[0]->t_note_pdf)?>" name="profile" accept="image/gif, image/jpeg, image/png" id="profile">
                                </form>
                                <p class="help-block"><a href="http://localhost/sensation/files/images/<?=(isset($view_session_details[0]->t_note_pdf) == '' ? '' : $view_session_details[0]->t_note_pdf)?>"><?=(isset($view_session_details[0]->t_note_pdf) == '' ? '' : $view_session_details[0]->t_note_pdf)?></a></p>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-md-2 control-label">View Permission </label>
                              <div class="col-md-10">
                                <div class="mt-checkbox-inline chkboxfind">
                                  <label class="mt-checkbox">
                                    <input type="checkbox" class="therapist_permission" name="therapist[]" value="0">
                                    All <span></span> </label>
                                    <?php  foreach ($list_of_therapist as $key => $value) {
                                          $checked = '';
                                          if ($view_session_details[0]->t_permission_to_view != '') {
                                              if (in_array($value->id, $perm)) {
                                                  $checked = 'checked="checked"';
                                              }
                                          }
                                     ?>
                                    <label class="mt-checkbox">
                                        <input <?=$checked?> type="checkbox" class="therapist_permission" name="therapist[]" value="<?=$value->id?>"><?=$value->employee_name?><span></span>
                                    </label>
                                    <?php } ?> 
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-8"></div>
                              <div class="col-md-4 ">
                                  <div class="pull-right">
                                      <input type="hidden" id="recei_child_id" name="recei_child_id" value="<?=$view_session_details[0]->child_id;?>">
                                      <input type="hidden" id="recei_session_no" name="recei_session_no" value="<?=(isset($view_session_details[0]->session_id) == '' ? '' : $view_session_details[0]->session_id)?>">
                                      <input type="hidden" id="recei_therapist_name" name="recei_therapist_name" value="<?=$logged_in[0]->employee_name;?>">        
                                      <input type="hidden" id="recei_therapist_id" name="recei_therapist_id" value="<?=$logged_in[0]->id;?>">
                                      <input type="hidden" id="session_therpay_note_id" name="session_therpay_note_id" value="<?=(isset($view_session_details[0]->t_id) == '' ? '' : $view_session_details[0]->t_id)?>">
                                      <input type="hidden" id="recei_session_fee" name="recei_session_fee" value="<?=(isset($view_session_details[0]->services_fee) == '' ? '' : $view_session_details[0]->services_fee)?>">
                                      <button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
                                      <button type="button" class="btn green therapy_note_save" >Save changes</button>
                                  </div>
                              </div>                          
                            </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
             </div>
            </div>
          </div>
        </div>
  </div>
<!-- END CONTENT BODY -->
</div>

