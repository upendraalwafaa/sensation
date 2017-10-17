<?php
$loggid = $logged_in[0]->id;
// echo "<pre>";
// print_r($view_session_details);
// exit;
$perm = explode(',',$view_session_details[0]->t_permission_to_view);
?>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
          <div class="col-md-12"> 
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
			<div class="col-lg-12 col-xs-12 col-sm-12">
                			<div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                            <div class="caption font-green">
								<i class="icon-microphone font-dark hide"></i>
								<span class="caption-subject bold font-dark uppercase font-green">Update Therapy Note</span>
							</div>
								<div class="sescunt pull-right"><?=$ses_comp_cnt?>/<?=$sessions_count ?>
								</div>			
						</div>
						
						  <div class="portlet-body">
							<div class="row">
							  <div class="col-md-12">
								 
								  <div class="portlet-body row">
									<div class="">
									  <div class="form-body row">
										<div class="col-md-6">
										    
											<div class="col-md-6">
												<div class="form-group">
													<label>Name</label>
													<input type="text" class="form-control" id="recei_st_name" name="recei_st_name" value="<?= $view_session_details[0]->child_name; ?>" readonly placeholder="">
												</div>	
											</div>	
										   
											<div class="col-md-6">
												<div class="form-group">
													<label >Quotation No</label>
													<input type="text" class="form-control" value="<?=$view_session_details[0]->receipt_no;?>" readonly>

													<input type="hidden" class="form-control" id="recei_no" name="recei_no" value="<?= $view_session_details[0]->quotation_id; ?>">													
												</div>
											</div>
										 	
											<div class="col-md-6">	
												<div class="form-group">
													<label >Services/Courses*</label>
													<select class="form-control" id="recei_disiplines" name="recei_disiplines">
														<option><?=$view_session_details[0]->disipline_name;?></option>
														<option>General Oberservation</option>
													</select>
												</div>
											</div>
											
											<div class="col-md-6">	
												<div class="form-group">
													<label >Status</label>
													<select class="form-control" name="recei_status" id="recei_status"  > 
													  <option value="">Select Option </option>
													  <option value="1" <?=($view_session_details[0]->t_status == "1" ? "selected='selected'" : '')?>>Cancelled 100% </option>
													  <option value="2" <?=($view_session_details[0]->t_status == "2" ? "selected='selected'" : '')?>>Cancelled 50%</option>
													  <option value="3" <?=($view_session_details[0]->t_status == "3" ? "selected='selected'" : '')?>>No show</option>
													  <option value="4" <?=($view_session_details[0]->t_status == "4" ? "selected='selected'" : '')?>>Attended</option>
													  <option value="5" <?=($view_session_details[0]->t_status == "5" ? "selected='selected'" : '')?>>Cancelled by Therapist</option>
													  <option value="6" <?=($view_session_details[0]->t_status == "6" ? "selected='selected'" : '')?>>Cancelled No charge</option>
													  <option value="7" <?=($view_session_details[0]->t_status == "7" ? "selected='selected'" : '')?>>No show – SBS – 100% Chargeable</option> 
													  <option value="8" <?=($view_session_details[0]->t_status == "8" ? "selected='selected'" : '')?>>EILP Therapy Session</option>
													  <option value="9" <?=($view_session_details[0]->t_status == "9" ? "selected='selected'" : '')?>>General </option>     
													  <option value="10" <?=($view_session_details[0]->t_status == "10" ? "selected='selected'" : '')?>>Re-scheduled</option>  
													  <option value="11" <?=($view_session_details[0]->t_status == "11" ? "selected='selected'" : '')?>>Dubai Heights Academy</option>  
													</select>
												  </div>                  
										  </div>                  

										   
											<div class="col-md-4">
												<div class="form-group">
												<label >Date</label>
												<?php if($view_session_details[0]->t_status == 10){ ?>
												<input class="form-control datepicker" name="recei_session_date" id="recei_session_date" placeholder="12-07-2017" type="text" value="<?=$view_session_details[0]->t_rescheduled_date; ?>">
												<?php } else { ?>
												<input class="form-control datepicker" name="recei_session_date" id="recei_session_date" placeholder="12-07-2017" type="text" value="<?=$view_session_details[0]->session_date; ?>">
												<?php } ?>
												</div> 
											</div>
										  
											<div class="col-md-4" style="display: none;">
												<div class="form-group">
													<label>Start Time</label>
													<input type="text" name="recei_session_start_time" id="recei_session_start_time" value="<?= $view_session_details[0]->start_time; ?>" class="form-control">
											 	</div> 
										 	</div>

											<div class="col-md-4" style="display: none;">
												<div class="form-group">
													<label>End Time</label>
													<input type="text" name="recei_session_end_time" id="recei_session_end_time" value="<?= $view_session_details[0]->end_time;?>" class="form-control">                                   
												</div>
											</div>
											
											<div class="col-md-12">
												<hr/>
											</div>
											
											<div class="col-md-4">
												<div class="form-group">
													<label>Re-Schedule</label>
													<?php if($view_session_details[0]->t_status == 10){ ?>
													<input class="form-control datepicker" name="recei_rescheduled_date" type="text" value="<?=$view_session_details[0]->session_date?>" id="recei_rescheduled_date"<?=(isset($view_session_details[0]->completion_status) && $view_session_details[0]->completion_status != ''  ? 'disabled' : '' )?>>
													<?php } else { ?>
													<input class="form-control datepicker" name="recei_rescheduled_date" type="text" value="" id="recei_rescheduled_date"<?=(isset($view_session_details[0]->completion_status) && $view_session_details[0]->completion_status != 0 ? 'disabled' : '' )?>>
													<?php } ?>
											 
												  </div>
											</div>
											
											<div class="col-md-4">
												<div class="form-group">
												<label>Start Time</label>
													  <select class="form-control" name="recei_rescheduled_session_time_start"  id="recei_rescheduled_session_time_start" <?=(isset($view_session_details[0]->completion_status) && $view_session_details[0]->completion_status != 0 ? 'disabled' : '' )?>>
														<?php if($view_session_details[0]->t_status == 10){ ?>
															<?=print_time($view_session_details[0]->t_rescheduled_start_time) ?>
														<?php } else { ?>
															<option value="00:00">00:00</option>
															<?=print_time() ?>
														<?php } ?>
													  </select>
										 
												</div> 
											</div>

											<div class="col-md-4">			
												<div class="form-group">
												  <label >End Time</label>
											 	  <select class="form-control" name="recei_rescheduled_session_time_end"  id="recei_rescheduled_session_time_end" <?=(isset($view_session_details[0]->completion_status) && $view_session_details[0]->completion_status != 0 ? 'disabled' : '' )?>>
													<?php if($view_session_details[0]->t_status == 10){ ?>
														<?=print_time($view_session_details[0]->t_rescheduled_end_time) ?>
													<?php } else { ?>
														<option value="00:00">00:00</option>
														<?=print_time() ?>
													<?php } ?>
												  </select>
												  
												</div> 
											</div> 
									    </div>
										<div class="col-md-6">	
											<div class="col-md-12">	
												<div class="form-group">
													<label>View Permission </label>
													<ul class="mt-checkbox-inline chkboxfind permission_list">
														<li>
															<label class="mt-checkbox">
															<input type="checkbox" class="therapist_permission permall" name="therapist[]" value="0">
															All <span></span> 
															</label >
														</li>
															<?php  foreach ($list_of_therapist as $key => $value) {
																  $checked = '';
																  if ($view_session_details[0]->t_permission_to_view == '') {
																  	  $perm = array(5,1,$loggid);
																	  if (in_array($value->id, $perm)) {
																		  $checked = 'checked="checked"';
																		  $disabled = 'disabled';
																	  }															
																  } else {
																	  if (in_array($value->id, $perm)) {
																		  $checked = 'checked="checked"';
																	  }																  
																  }
															 ?>
														<li>
															<label class="mt-checkbox">
																<input <?=$checked?> type="checkbox" class="therapist_permission" name="therapist[]" value="<?=$value->id?>"><?=$value->employee_name?><span></span>
															</label >
														</li>
														<?php } ?> 
													</ul>
												 
												</div>
											</div>
										</div>
										
										
									<div class="col-md-12">	
										<div class="col-md-12">	
											<div class="form-group">
												<label>Therapy Note</label>
												<textarea class="form-control" rows="12"  name="recei_therapy_note" id="recei_therapy_note" ><?php /*($view_session_details[0]->t_therapy_note != '' ? $view_session_details[0]->t_therapy_note : '' )*/?></textarea>
											</div>
										</div>
										<?php if(isset($therapy_notes) && !empty($therapy_notes)): ?>
										<div class="col-md-12">	
<?php 
if(!empty($therapy_notes['all_edited_therapy_notes'])):
    $s=0; 
    foreach ($therapy_notes['all_edited_therapy_notes'] as $key => $value) : 
        if(!empty($value->therapy_note)):
        ?>
            <div style="<?=($value->strike_note == 'Yes' ? 'text-decoration: line-through' : '' )?>">
                <div>
                    <?php echo substr("$value->therapy_note",0,200);?>
                    <br/>
                    <a href="<?=base_url('Home/single_therapy/'.$value->id)?>">Read More</a>
                </div>
                <span>Author : <?=$value->employee_name?></span><br/>
                <span>Attachment   : <a href="<?=base_url()?>files/images/<?=(isset($value->therapy_note_pdf) == '' ? '' : $value->therapy_note_pdf)?>"><?=(isset($value->therapy_note_pdf) == '' ? '' : $value->therapy_note_pdf)?></a></span><br/>
                <span>Date   : <?=$value->timestamp?></span><br/>
                <?php if($loggid == 17): ?>
                <a data-strike="<?=$value->id?>" data-stk="2" data-sessid="<?=(isset($view_session_details[0]->session_id) == '' ? '' : $view_session_details[0]->session_id)?>" class="strike_note">Strike This Note</a>
                <?php endif; ?>                
            </div>	
            <hr/>
        <?php 
        endif;
    endforeach; 
endif; 
?>
<?php 
if(!empty($therapy_notes['first_therapy_notes'])):	
$i=1;									
    foreach ($therapy_notes['first_therapy_notes'] as $key => $value) :
        if(!empty($value->t_therapy_note)):
        ?>
            <div style="<?=($value->strike_note == 'Yes' ? 'text-decoration: line-through' : '' )?>">
                <div>
                <?php
                echo substr("$value->t_therapy_note",0,200);
                ?> 
                <br/>
                <a href="<?=base_url('Home/single_therapy/'.$value->t_id.'/F')?>">Read More</a>
                </div>
                <span>Author : <?=$value->t_staff_name?></span><br/>
                <p class="help-block">
                <a href="<?=base_url()?>files/images/<?=(isset($view_session_details[0]->t_note_pdf) == '' ? '' : $view_session_details[0]->t_note_pdf)?>"><?=(isset($view_session_details[0]->t_note_pdf) == '' ? '' : $view_session_details[0]->t_note_pdf)?></a>
                </p>												
                <span>Date   : <?=$value->t_created_date?></span><br/>
                <?php if($loggid == 17): ?>
                <a data-strike="<?=$value->t_id?>" data-stk="1" data-sessid="<?=(isset($view_session_details[0]->session_id) == '' ? '' : $view_session_details[0]->session_id)?>" class="strike_note">Strike This Note</a>  
                <?php endif; ?>                 
            </div>	
            <hr/>
        <?php 
        endif;
    endforeach; 
endif; 
?>										
										</div>
										<?php endif; ?>
										<div class="col-md-12">	
											<div class="form-group">
											  <label >Attachment</label>													
												<form method="post" id="profile_pic" name="profile_pic">
												  <input type="file" form_name="profile_pic"   class="form-cont uppload_file"  file_name="" name="profile" accept=".pdf,.doc" id="profile">
												</form>
												
												   
											</div>
										</div>
									</div>	
									
									<div class="col-md-12">
										<div class="col-md-12">
											<hr/>
										</div>
									</div>

								    <div class="col-md-12">
										<div class="form-group">
										  <div class="col-md-12 ">
											  <div class="pull-right">
												  <input type="hidden" id="recei_child_id" name="recei_child_id" value="<?=$view_session_details[0]->child_id;?>">
												  <input type="hidden" id="recei_session_no" name="recei_session_no" value="<?=(isset($view_session_details[0]->session_id) == '' ? '' : $view_session_details[0]->session_id)?>">
												  <input type="hidden" id="recei_therapist_name" name="recei_therapist_name" value="<?=$logged_in[0]->employee_name;?>">        
												  <input type="hidden" id="recei_therapist_id" name="recei_therapist_id" value="<?=$logged_in[0]->id;?>">
												  <input type="hidden" id="session_therpay_note_id" name="session_therpay_note_id" value="<?=(isset($view_session_details[0]->t_id) == '' ? '' : $view_session_details[0]->t_id)?>">
												  <input type="hidden" id="recei_session_fee" name="recei_session_fee" value="<?=(isset($view_session_details[0]->services_fee) == '' ? '' : $view_session_details[0]->services_fee)?>">

												<?php if($view_session_details[0]->staff_id == $loggid || $loggid == 5 || $loggid == 1): ?>
												<button type="button" class="btn green-stripe therapy_note_save" >Save </button>
												<?php endif; ?>
												  <button type="button" onclick="goBack()" class="btn btn-outline dark">Close</button>
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
  </div>
<!-- END CONTENT BODY -->
</div>