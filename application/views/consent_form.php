<?php
  $child_id  = $this->uri->segment(3);
  $update_id = $this->uri->segment(4);
?>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/consent_form.css">
<div class="page-content-wrapper">
<div class="page-content">
<div class="clearfix"></div>
	<div class="row">
	
	
	
<div class="col-lg-offset-1 col-lg-9 col-xs-12 col-sm-12">
	<div class="portlet light portlet-fit div-span-main-cont">
		<div class="portlet light"> 
			
		 	
		<div class="portlet-title">
		  <div class="caption font-green"> <span class="caption-subject bold uppercase"> CONSENT FORM</span> </div>
		</div>
				<div class="form ">
								<form role="form" id="consent_form">
								  <div class="row ">

								  <input value="<?=(isset($consent_form_details[0]->update_id) == '' ? '' : $consent_form_details[0]->update_id)?>" type="hidden" id="consent_form_id" class="form-control" name="consent_form_id">
								  <input value="<?=(isset($consent_form_details[0]->CH_id) == '' ? '' : $consent_form_details[0]->CH_id)?>" type="hidden" id="child_id" class="form-control" name="child_id">
								  <input value="<?=(isset($consent_form_details[0]->enrolment_status) == '' ? '' : $consent_form_details[0]->enrolment_status)?>" type="hidden" id="enrolment_status" class="form-control" name="enrolment_status">
								  <div class="col-md-12">
									<div class="form-group form-md-line-input has-success">
									  <div class="input-icon">
										<label>Name of child:</label>

										<input value="<?=(isset($consent_form_details[0]->child_name) == '' ? '' : $consent_form_details[0]->child_name)?>" type="text" id="child_name" class="form-control" name="child_name">
									  </div>
									</div>
								  </div>
								  
								  <div class="col-md-12">
									<div class="portlet-title">
									  <div class="caption font-red-sunglo"> </br>
										</br>
										<span class="caption-subject bold uppercase">CONSENT FOR SHARING INFORMATION WITH RELEVANT EDUCATION OR MEDICAL CONTACTS:</span> </div>
									</br>
									</div>
										<p class="note"> NOTE:<br/>
											Sharing and exchanging information regarding your child within the Sensation Station team will ensure provision of the best standard of treatment.  
											Information will only be shared when it is appropriate to do so.
										</p>
										
								  </div>
								  
								  
								  
								  
								  
													<div class="col-md-12">
														<div class="form-group form-md-line-input has-success">
												  
																<table class="consent_tb view_consent_form_table">
																			<tr  >
																			  <th>I consent for the sharing/exchange of information with (past, current & future)</th>
																			  <th>YES</th>
																			  <th>NO</th>
																			</tr>
																			<tr>
																			  <td> Professionals of other centres who are working with my child (including obtaining relevant reports) 
																				as per names and contact details provided by myself. </td>
																			  <td>
																			  
																				<div class="md-radio" id="pro_working_clild_yese">
																				  
																				  <input <?=isset($consent_form_details[0]->other_prof_work_child) == '' ? '' : $consent_form_details[0]->other_prof_work_child == 'Yes' ? 'checked="checked"' : '' ?> type="radio"  id="pro_working_clild_yes" value="Yes" name="pro_working_clild" class="md-radiobtn pro_working_clild ">
																				  <label for="pro_working_clild_yes"> <span class="inc">Yes</span> <span class="check"></span> <span class="box pro_working_clild"></span> </label>
																				</div>
																			 
																			
																			  </td>
																			  
																			  <td>
																				<div class="md-radio">
																				  <input <?=isset($consent_form_details[0]->other_prof_work_child) == '' ? '' : $consent_form_details[0]->other_prof_work_child == 'No' ? 'checked="checked"' : '' ?>   type="radio"  id="pro_working_clild_no" value="No" name="pro_working_clild" class="md-radiobtn pro_working_clild "  >
																				  <label for="pro_working_clild_no"> <span class="inc">No</span> <span class="check"></span> <span class="box pro_working_clild"></span> </label>
																				</div>
																		 
																			
																			  </td>
																			
																			  </tr>
																			
																			<tr>
																			  <td> My child’s School/Nursery (e.g. Teacher, SENCO, Inclusion and/or Learning Support) as per names and contact details provided by myself. </br>
																				<span class="importent_note">* Mandatory if sessions are held in school/nursery</span></td>
																			  <td>
																				<div class="md-radio">
																				  <input <?=isset($consent_form_details[0]->school_detatails_approv) == '' ? '' : $consent_form_details[0]->school_detatails_approv == 'Yes' ? 'checked="checked"' : '' ?>  type="radio"  id="child_school_yes" value="Yes" name="child_school" class="md-radiobtn child_school">
																				  <label for="child_school_yes"> <span class="inc">Yes</span> <span class="check"></span> <span class="box child_school"></span> </label>
																				</div>
																			  </td>
																			
																			
																			<td>
																				<div class="md-radio">
																				  <input  <?=isset($consent_form_details[0]->school_detatails_approv) == '' ? '' : $consent_form_details[0]->school_detatails_approv == 'No' ? 'checked="checked"' : '' ?>  type="radio"  id="child_school_no" value="No" name="child_school" class="md-radiobtn child_school">
																				  <label for="child_school_no"> <span class="inc">No</span> <span class="check"></span> <span class="box child_school"></span> </label>
																				</div>
																			</td>
																
																  </tr>
																
																<tr>
																  <td> Medical Professionals (e.g. Primary Doctor, Pediatrician) as per names and contact details provided by myself. </td>
																  <td>
																  
																	<div class="md-radio">
																	  <input <?=isset($consent_form_details[0]->medical_prof_share) == '' ? '' : $consent_form_details[0]->medical_prof_share == 'Yes' ? 'checked="checked"' : '' ?>  type="radio"  id="medical_pro_yes" value="Yes" name="medical_pro" class="md-radiobtn medical_pro">
																	  <label for="medical_pro_yes"> <span class="inc">Yes</span> <span class="check"></span> <span class="box medical_pro"></span> </label>
																	</div>
														 
																
																  </td>
																
																
																  <td>
																	<div class="md-radio">
																	  <input <?=isset($consent_form_details[0]->medical_prof_share) == '' ? '' : $consent_form_details[0]->medical_prof_share == 'No' ? 'checked="checked"' : '' ?>  type="radio"  id="medical_pro_no" value="No" name="medical_pro" class="md-radiobtn medical_pro" >
																	  <label for="medical_pro_no"> <span class="inc">No</span> <span class="check"></span> <span class="box medical_pro"></span> </label>
																	</div>
																  </td>
																
																  </tr>
																
															  </table>
									 
										  </div>
									  </div>
					  
										  
									  
									  <div class="col-md-12">
										<div class="form-group form-md-line-input has-success">
										  <div class="input-icon"> 
											<label>As per the above the following people involved with my child are:</label>
											<input value="<?=(isset($consent_form_details[0]->involved_child_care) == '' ? '' : $consent_form_details[0]->involved_child_care)?>" type="text" name="child_involved" id="child_involved" class="form-control">
										  </div>
										</div>
									  </div>
									  
									  
									  
									  <div class="clearfix"></div>
									  <div class="col-md-12">
										<div class="form-group form-md-line-input has-success ">
										  <div class="input-icon">  
											<label>Please state if there is anyone else involved with your child, not mentioned above,
											  and state if you are happy or not happy for us to share information: </label>
											<input name="share_details_happ_or_not" type="text" id="share_details_happ_or_not" class="form-control" value="<?=(isset($consent_form_details[0]->share_details_happ_or_not) == '' ? '' : $consent_form_details[0]->share_details_happ_or_not)?> ">
										  </div>
										</div>
									  </div>
				  
				  
				  
				  <div class="col-md-12">
						<div class="portlet-title">
						  <div class="caption font-red-sunglo"> </br>
								<p><span class="caption-subject bold uppercase">PERMISSION TO USE PHOTOGRAPHS AND/OR VIDEO RECORDINGS (Please tick box)
								<br/></span> </p>
						</div>
						
						<p class="note"> NOTE:</br>
							This section is to indicate parental consent for SENSATION STATION to take photographs of me and / or my child / children whilst 
							at the centre or during recreational activities within the centre for the following purposes noted below: 
						</p>
						  
					  </div>
				  </div>
				  
				  
				  
							  
							  <div class="col-md-12">
							   
									<div class="form-group form-md-line-input has-success">
										  <table class="consent_tb view_consent_form_table">
											<tr>
											  <th>Indication of consent </th>
											  <th>YES</th>
											  <th>NO</th>
											</tr>
											
											<tr>
											  <td> Permission to take photographs for my child's personal communication file and progress report by Clinical staff </td>
											  <td><div class="md-radio">
												   
												  <input <?=isset($consent_form_details[0]->perm_photographs) == '' ? '' : $consent_form_details[0]->perm_photographs == 'Yes' ? 'checked="checked"' : '' ?> type="radio"  id="perm_photogrphs_yes" value="Yes" name="perm_photographs" class="md-radiobtn ">
												  <label for="perm_photogrphs_yes"> <span class="inc">Yes</span> <span class="check"></span> <span class="box perm_photogrphs"></span> </label>
												</div>
											 
											
											  </td>
											
											
											  <td><div class="md-radio">
												  <input <?=isset($consent_form_details[0]->perm_photographs) == '' ? '' : $consent_form_details[0]->perm_photographs == 'No' ? 'checked="checked"' : '' ?> type="radio"  id="perm_photogrphs_no" value="No" name="perm_photographs" class="md-radiobtn">
												  <label for="perm_photogrphs_no"> <span class="inc">No</span> <span class="check"></span> <span class="box perm_photogrphs"></span> </label>
												</div></td>
											</tr>
											
											<tr>
												  <td> Permission to use images for marketing purposes which may include Sensation Station website, 
													newsletters, corporate video blogs and other social media posts. </td>
												  <td><div class="md-radio">
													  <input <?=isset($consent_form_details[0]->perm_to_use_images) == '' ? '' : $consent_form_details[0]->perm_to_use_images == 'Yes' ? 'checked="checked"' : '' ?> type="radio" id="perm_use_image_yes" value="Yes" name="perm_to_use_images" class="md-radiobtn perm_to_use_images">
													  <label for="perm_use_image_yes"> <span class="inc">Yes</span> <span class="check"></span> <span class="box perm_use_image"></span> </label>
													</div>
												  </td>
												  <td><div class="md-radio">
													  <input <?=isset($consent_form_details[0]->perm_to_use_images) == '' ? '' : $consent_form_details[0]->perm_to_use_images == 'No' ? 'checked="checked"' : '' ?> type="radio"  id="perm_use_image_no" value="No" name="perm_to_use_images" class="md-radiobtn perm_to_use_images">
													  <label for="perm_use_image_no"> <span class="inc">No</span> <span class="check"></span> <span class="box perm_use_image"></span> </label>
													</div>
													</td>
											  </tr>
											  
											</table>
									</div>
							  
							  
							  
							  </div>
							  
							  
							  <div class="col-md-12">
								<div class="portlet-title">
								  <div class="caption font-red-sunglo">  
								<p>  <span class="caption-subject bold uppercase">VOLUNTEERS:</span> </p></div>
								</div>
								<p class="note"> NOTE:</br>
								  Sensation Station aim to give learning and development opportunities for interns, therapy/teaching students 
								  and often enroll these individuals as volunteers from time to time. </p>
							  </div>
							  
				  
				  <div class="col-md-12">
				  <div class="form-group form-md-line-input has-success">
						  <table class="consent_tb view_consent_form_table">
							<tr>
							  <th>Indication of consent </th>
							  <th>YES</th>
							  <th>NO</th>
							</tr>
							<tr>
							  <td> I consent for approved volunteers to observe my child under supervision of therapist </td>
							  <td><div class="md-radio">
								  
								  <input <?=isset($consent_form_details[0]->volunteers_to_observe) == '' ? '' : $consent_form_details[0]->volunteers_to_observe == 'Yes' ? 'checked="checked"' : '' ?> type="radio"  id="volunteers_yes" value="Yes" name="volunteers_to_observe" class="md-radiobtn volunteers_to_observe">
								  <label for="volunteers_yes"> <span class="inc">Yes</span> <span class="check"></span> <span class="box volunteers"></span> </label>
								</div>
							  
							
							  </td>
							
							
							  <td>
							  <div class="md-radio">
								  <input <?=isset($consent_form_details[0]->volunteers_to_observe) == '' ? '' : $consent_form_details[0]->volunteers_to_observe == 'No' ? 'checked="checked"' : '' ?> type="radio"  id="volunteers_no" value="No" name="volunteers_to_observe" class="md-radiobtn volunteers_to_observe">
								  <label for="volunteers_no"> <span class="inc">No</span> <span class="check"></span> <span class="box volunteers"></span> </label>
								</div>
							
							  </td>
							
							  </tr>
							
						  </table>
			 	  
				  </div>
				  </div>
				  
			   
				  <div class="col-md-12">
					<div class="portlet-title">
					  <div class="caption font-red-sunglo"> </br>
						<span class="caption-subject bold uppercase">PLEASE ACKNOWLEDGE THAT YOU HAVE READ AND FULLY UNDERSTOOD 
						THE ABOVE INFORMATION BY PRINTING YOUR NAME AND SIGNING BELOW.</span> </div>
					</div>
				  </div>
				  
				   
				 
					<div class="col-md-4">
					  <div class="form-group form-md-line-input has-success">
						<div class="input-icon">
						  <label>Date:</label>
						  <?php $curd =  date('Y-m-d'); ?>
						  <input type="text" value="<?=(isset($consent_form_details[0]->accept_date) == '' ? $curd : $consent_form_details[0]->accept_date)?>" name="accept_date" id="accept_date" class="datepicker form-control">
						</div>
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="form-group form-md-line-input has-success">
						<div class="input-icon">
						  <label>Father Name:</label>
						  <input value="<?=(isset($consent_form_details[0]->father_name) == '' ? '' : $consent_form_details[0]->father_name)?>" type="text" name="father_name" id="father_name" class="form-control">
						</div>
					  </div>
					</div>
					<div class="clearfix"></div>
					
					<div class="col-md-4"><br/>
					  <div class=" md-checkbox">
						<input <?=isset($consent_form_details[0]->accept) == '' ? '' : $consent_form_details[0]->accept == 'Accept' ? 'checked="checked"' : '' ?> type="checkbox" value="Accept"  id="consent_accept" name="consent_accept" class="md-check">
						<label for="consent_accept"> <span class="inc">Accept</span> <span class="check"></span> <span class="box"></span> Accept </label>
					  </div>
					</div>
					
						<div class="col-md-12">  
							<span class="importent_note">*You may withdraw your consent for any of the above at any time; please inform us in writing.</span> 
						</div>
						
					 
					  
					  <div class="col-md-12  "> 
						<button type="button" class="btn green-stripe pull-right " id="consent_next">SAVE & NEXT</button>
					  </div>
				  
				  
				</form>
			</div>
			<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
			</div>
			</div>
			</div>
			</div>
			</div>
			
			<div class="modal fade emypopupmain" id="enrolment_id" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Student Enrolment</h4>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class=" ">
            <div class="form-group">
              <h4>Thanks, your form has been successfully submitted</h4>
            </div>
            <div class="clearfix"></div>
          </div>
        </form>
      </div>
      <div class="modal-footer"> <a events_date="" data-student_id="<?=(isset($consent_form_details[0]->CH_id) == '' ? '' : $consent_form_details[0]->CH_id)?>" data-enrol="Yes"  class="btn green save_enrol_yes">Yes</a> <a events_date="" data-student_id="<?=(isset($consent_form_details[0]->CH_id) == '' ? '' : $consent_form_details[0]->CH_id)?>" data-enrol="No" class="btn green save_enrol_no">No</a> </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>