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
<input value="<?=(isset($child_details[0]->update_id) == '' ? '' : $child_details[0]->update_id)?>" type="hidden" id="outeach_form_id" class="form-control" name="outeach_form_id">
<input value="<?=(isset($child_details[0]->CH_id) == '' ? '' : $child_details[0]->CH_id)?>" type="hidden" id="child_id" class="form-control" name="child_id"> 
        <!--content Area  statrt-->
                  
				<div class="col-lg-offset-1 col-lg-9 col-xs-12 col-sm-12">
					<div class="portlet light portlet-fit div-span-main-cont">
						<div class="portlet light">
				 
            <div class="portlet-title">
                <div class="caption caption font-green">
                    <span class="caption-subject bold uppercase"> Terms and Conditions: Outreach Sessions</span>
                </div>
            </div>
            <div class="portlet-body form">
                <form role="form" id="">
                    <div class="form-body row">
                    
                        <div class="col-md-12">
                           <p>
                               Please kindly note the terms and conditions in place to ensure Sensation Station operates with boundaries for the interests of all our families. 
                           </p>
                        </div>
                      
                        <div class="col-md-12 row ">
                            <ol id="orderd_list">    
                                <li class="col-md-12 "><u><b> Payment Policy Options</b></u><br/>
                                   <ul class="col-md-12 ">
                                       <li>Sessions are booked in per calendar month and paid for in advance on or before the first of every month, OR  </li><br/>
                                       <li>Sessions booked in a block of 4 or 8 from the date of commencing therapy and paid in advance.</li><br/>
                                       <li>Payment guarantees the session slot</li><br/>
                                   </ul><br/>
                                   <ul class="col-md-12 "><u><b> Via child’s school bag:</b></u>
                                        <li>
                                           If you choose to send your payment in your child’s school bag for the therapist to collect; you do so at your own risk.
                                           If the payment is missing at point of collection
                                        </li><br/>
                                   </ul>
                                   <ul class="col-md-12 "><u><b>Payment type:</b></u>
                                        <li>
                                          Cash/Cheque/Credit or Debit Card/Bank Transfer
                                        </li><br/>
                                   </ul>
                                </li><br><br/><br/>
                                <li class="col-md-12 "><u><b> Written Reports </b></u>
                                    <ul class="col-md-12 ">
                                       <li>Written reports are only provided after completing the Report Request Form. With notice to the therapist one month would be required for completion of the report.
                                       However, whenever possible, we will endeavor to complete reports before this time. </li><br/>
                                       <li>Report (optional) following therapy will be chargeable.</li><br/>
                                       <li>Report as part of a formal assessment charge is included in the assessment.</li><br/>
                                       <li>Once a child has been discharged (by therapist/parent) a report request can only be put in up to 3 months. 
                                       After this time, reassessment will be need to be done to obtain a report. </li><br/>
                                   </ul><br> 
                                </li><br><br/><br/>
                                  <li class="col-md-12 "><u><b>Feedback</b></u>
                                    <ul class="col-md-12 ">
                                       <li>Feedback after each session will be provided in writing via the communication book. 
                                       It is the parents responsibility to ensure the communication book is in the child’s school bag on the days of their sessions</li><br/>
                                       <li>A complimentary 30 minute feedback session at the end of every academic term is offered to all parents and will be arranged by the therapists.  
                                       It is strongly recommended that parents attend.</li><br/>
                                       <li>To support the therapist in being able to accommodate sessions and changes to the timetable the therapist may have to change the session time in reflection of timetable clashes. 
                                       This would be communicated with the families in advance.</li><br/>
                                   </ul><br> 
                                </li><br/><br/>
                                 <li class="col-md-12 "><u><b>Vacation Notice</b></u>
                                    <ul class="col-md-12 ">
                                       <li>To support us in being able to schedule our appointments we are asking families to submit vacation notice to the centre, two     
                                            weeks in advance of their holiday. Parents are required to notify the centre via emailing the Administration team noting the 
                                            dates the child will be away.  
                                        </li>
                                   </ul>
                                </li><br/><br/> 
                                 <li class="col-md-12 "><u><b>Discharge</b></u>
                                    <ul class="col-md-12 ">
                                       <li>If parents wish to terminate services against the therapist’s advice, two weeks’ notice must be given, 
                                           otherwise parents will be liable for 2 weeks of sessions.  
                                        </li>
                                   </ul><br> 
                                </li>
                            </ol>
							
							
                            <div class="col-md-12   importent_note"><br/> Management has the rights to change the Terms and Conditions whenever required. </div>

                        </div>
                  
						
                      
						
                        <div class="col-md-4">
                            <div class="form-group form-md-line-input has-success">
                                <div class="input-icon">
                                    <label>Child’s Full Name:</label>
                                   
                                    <input value="<?=(isset($child_details[0]->child_name) == '' ? '' : $child_details[0]->child_name)?>" type="text" id="child_name" class="form-control">
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
						
						
						  <div class="col-md-12">
						  <br/>
							I agree to the terms and condition towards registering my child in Sensation Station. 
						</div>
						
						      <div class="col-md-4"><br/>
                          <div class="md-checkbox"> 
								<input <?=isset($child_details[0]->accept) == '' ? '' : $child_details[0]->accept == 'Accept' ? 'checked="checked"' : '' ?> type="checkbox" value="Accept"  id="outeach_form_accept" name="outeach_form_accept" class="md-check">
                                <label for="outeach_form_accept"> 
                                <span class="inc">Accept</span>
                                <span class="check"></span> 
                                <span class="box"></span> Accept </label>
                            </div>
							
                        </div>
						
					   
                    </div>
                    <div class="" >
                
                        <button type="button" class="btn green-stripe  pull-right" id="terms_condition_outreach">SAVE & NEXT</button>                        
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
    
           

