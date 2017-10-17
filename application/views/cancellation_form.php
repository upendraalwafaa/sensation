<?php
  $child_id  = $this->uri->segment(3);
   $update_id = $this->uri->segment(4);
?>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/consent_form.css">
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">
<input value="<?=(isset($child_details[0]->update_id) == '' ? '' : $child_details[0]->update_id)?>" type="hidden" id="cancel_form_id" class="form-control" name="cancel_form_id">
<input value="<?=(isset($child_details[0]->CH_id) == '' ? '' : $child_details[0]->CH_id)?>" type="hidden" id="child_id" class="form-control" name="child_id">                
                <!--content Area  statrt-->
               
				<div class="col-lg-offset-1 col-lg-9 col-xs-12 col-sm-12">
					<div class="portlet light portlet-fit div-span-main-cont">
						<div class="portlet light">
				 
						<div class="portlet-title">
							<div class="caption font-red-sunglo">
								<span class="caption-subject bold uppercase"> CANCELLATION FORM</span>
							</div>
						</div>
								<div class="portlet-body form">
									<form role="form" id="cancellation_form">
										<div class=" ">
										
											<div class="col-md-12 row">
											   <p>
												   We at Sensation Station understand that you may need to cancel your appointment at short notice due to unforeseen circumstances. 
												   We ask that you give us as much notice as possible, as this allows us time to schedule another appointment to clients who are waiting. 
												   Our therapists’ time is valuable and we endeavor to increase efficiency wherever possible.  Please read below for more details.
												<br/>
											   </p>
											</div>
											
											<div class="col-md-12 note">
													<i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;04–2776769</br>
													<i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;info@SensationStation.ae 
											</div>
											
											<div class="col-md-12 row">
												<span class="importent_note">    
													If you are leaving a message, please clearly state the name of your child, the date and time of the appointment and the name of the therapist.
												</span>
												<br/>
												<br/>
												If you miss your appointment and have failed to notify the centre, you will be charged the full cost of the session. 
												<br/>
												<br/>
											</div>
											
											<div class="col-md-12 note">
												  <table  cellspacing="0" cellpadding="0" class="tab_listt">
													  <tr>
														<td>More than 24 hours prior notice</td>
														<td width="20" align="center" valign="middle">:</td>
														<td>no charge</td>
													  </tr>
													  <tr>
														<td>Less than 24 hours prior notice</td>
														<td align="center" valign="middle">:</td>
														<td>50%</td>
													  </tr>
													  <tr>
														<td >No Show</td>
														<td align="center" valign="middle">:</td>
														<td>    100%</td>
													  </tr>
													</table>

													
											</div>
											
											
											<div class="col-md-12">
												<ul id="list_calcellation"><b>
														<li>You may cancel or reschedule your therapy appointment <u>without charge</u> providing you have notified us at least 24 hours prior to the appointment. </li>
														<li>If the therapist is able to reschedule the appointment within 2 weeks
														(not on a day of your usual appointment slots),
														the charge will not apply - subject to therapist availability.
													</li>
													<li>
														<u>No Shows:</u> 
														As per the cancellation policy, unattended sessions with no cancellation notice, will be fully charged. 
														If this occurs for 3 consecutive sessions, the client will be 
														placed back onto the waiting list and their appointment time will be offered to another client.
														If we are unable to contact the client, we will further review and discharge from our service if necessary.
													</li>
													<li>Consecutive and persistent cancellations will be reviewed on a case by case basis.</li>
													</b>
												</ul>
											</div>
											
											<div class="col-md-12 row">
											  <p>
											   We understand this may not feel fair, especially when a child is sick or there is a last minute emergency. 
											   However after much deliberation, we felt that in order to keep the centre open and running a quality service we could not sustain such a regular loss across our clients. 
											   This allows us to be fair to children (on the waiting list) who are waiting to fill sessions and gives them the best possible chance. 
											   </p>
											  <p> may be times when appointments are cancelled by Sensation Station due to unforeseen circumstances.  
											   No fee will be charged in these cases; we will provide you with as much notice as possible and reschedule a new appointment at the earliest availability.
											   We also send our staff on regular training, this is to ensure the best quality service for your child. 
											   In addition we are required by law to give staff annual holiday as part of their contracts. 
											   In each of the above cases we will give you as much notice as possible and you will not be charged for sessions and your place will be secured.</p>
											</div>
											
											<div class="clearfix"></div>
											
											<div class="row">
											<div class="col-md-4">
												<div class="form-group form-md-line-input has-success">
													<div class="input-icon">
														<label>Child’s Full Name:</label>
														<input value="<?=$child_details[0]->child_name?>" type="text" id="child_name" class="form-control">
												  
													</div>
												</div>
											</div>
											 <div class="col-md-4">
												<div class="form-group form-md-line-input has-success">
													<div class="input-icon">
														<label>Parent/Guardian Full Name:</label>
														
														<input value="<?=(isset($child_details[0]->father_name) == '' ? '' : $child_details[0]->father_name)?>" type="text" id="father_name" class="form-control">
													</div>
												</div>
											</div>
									
											 
											  <div class="col-md-4">
												<div class="form-group form-md-line-input has-success">
													<div class="input-icon">
														<label>Date:</label>
														  <?php $curd =  date('Y-m-d'); ?>
														  <input type="text" value="<?=(isset($child_details[0]->accept_date) == '' ? $curd : $child_details[0]->accept_date)?>" name="accept_date" id="accept_date" class="datepicker form-control">                                            
													</div>
												</div>
											</div>
											
												<div class="col-md-4">
													<br/>
													<div class="md-checkbox"> 
														<input <?=isset($child_details[0]->accept) == '' ? '' : $child_details[0]->accept == 'Accept' ? 'checked="checked"' : '' ?> type="checkbox" value="Accept"  id="cancel_accept" name="cancel_accept" class="md-check">
														<label for="cancel_accept"> 
														<span class="inc">Accept</span>
														<span class="check"></span> 
														<span class="box"></span> Accept </label>
													</div>
														
													
												</div>
											</div>
										</div>
										<div class=" ">
									 
											<button type="button" class="btn green-stripe pull-right" id="cancellation_next">SAVE & NEXT</button>                                
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
                </div>  
 