<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/consent_form.css">
<div class="page-content-wrapper">
<div class="page-content">
  <div class="clearfix"></div>
  <div class="row"> 
    
    <!--content Area  statrt-->
    <div class="col-lg-offset-1 col-lg-9 col-xs-12 col-sm-12">
      <div class="portlet light portlet-fit div-span-main-cont">
        <div class="portlet light">
			  <div class="portlet-title">
				<div class="caption caption font-green"> 
					<span class="caption-subject bold uppercase"> Terms and Conditions: Center Sessions</span> </div>
			  </div>
		  
		  
          <div class="portlet-body form row terms_condition_center">
            <form role="form" id="consent_form">
              <input value="<?=(isset($child_details[0]->update_id) == '' ? '' : $child_details[0]->update_id)?>" type="hidden" id="condition_center_form_id" class="form-control" name="condition_center_form_id">
              <input value="<?=(isset($child_details[0]->CH_id) == '' ? '' : $child_details[0]->CH_id)?>" type="hidden" id="child_id" class="form-control" name="child_id">
              
              <div class="form-body">
                <div class="col-md-12">
                  <p> Please kindly note the terms and conditions in place to ensure Sensation Station operates with boundaries for the interests of all our families. </p>
                </div>
                <div class=" ">
                  <ol id="orderd_list lnht22">
                    <li class="col-md-12 "><u><b>Payment policy options</b></u>
                      <ul class="col-md-12 ">
                        <li>Sessions are booked in per calendar month and paid for in advance on or before the first of every month, OR </li>
                        <li>Sessions booked in a block of 4 or 8 from the date of commencing therapy and paid in advance.</li>
                      </ul>
                      <br>
                      <ul class="col-md-12 ">
                        <u><b>Payment type:</b></u>
                        <li> Payment guarantees the session slot </li>
                        <li> Cash/Cheque/Credit or Debit Card/Bank TransferPayment guarantees the session slot </li>
                      </ul>
                    </li>
                    <li class="col-md-12 "><u><b>Observation of sessions</b></u>
                      <ul class="col-md-12 ">
                        <li>Parents are welcome to observe their child’s 1:1 therapy session where appropriate (this will be to the therapist’s discretion).</li>
                        <li>In order to maintain confidentiality, observations of sessions will NOT be possible if their child’s therapy is taking place in a shared space (e.g. sensory gym) when other children are present. </li>
                      </ul>
                    </li>
                    <li class="col-md-12 "><u><b>Feedback</b></u>
                      <ul class="col-md-12 ">
                        <li>Within the 60 minute session, 5 minutes will be allocated to feedback to the parent. </li>
                      </ul>
                    </li>
                    <li class="col-md-12 "><u><b>Written Reports</b></u>
                      <ul class="col-md-12 ">
                        <li>Written reports are only provided after completing the Report Request Form. With notice to the therapist one month would be required for completion of the report.  However, whenever possible, we will endeavor to complete reports before this time. </li>
                        <li>Report (optional) following therapy will be chargeable.</li>
                        <li>Report as part of a formal assessment charge is included in the assessment.</li>
                        <li>Once a child has been discharged (by therapist/parent) a report request can only be put in up to 3 months. After this time, reassessment will be need to be done to obtain a report.</li>
                      </ul>
                      <br>
                    </li>
                    <li class="col-md-12 "><u><b>Vacation Notice</b></u>
                      <ul class="col-md-12 ">
                        <li>To support us in being able to schedule our appointments we are asking families to submit vacation notice to the centre, two weeks in advance of their holiday. Parents are required to notify the centre via emailing the Administration team noting the dates the child will be away. </li>
                      </ul>
                      <br>
                    </li>
                    <li class="col-md-12 "><u><b>Discharge</b></u>
                      <ul class="col-md-12 ">
                        <li>If parents wish to terminate services against therapist’s advice, two weeks’ notice must be given, otherwise parents will be liable for 2 weeks of sessions.</li>
                      </ul>
                      <br>
                    </li>
                    <li class="col-md-12 "><u><b>Clothing/ Socks Policy</b></u>
                      <ul class="col-md-12 ">
                        <li>In order to maintain sufficient levels of hygiene at our centre and subsequent protection for your children, Sensation Station has a “Socks Policy” in place.</li>
                        <li>The “shoes off and socks on “policy applies to all specified rooms (Fun Junction/Wonder World) and to both children and adults.</li>
                        <li>The child and adult must wear socks when entering these rooms, and where advised, anti-slip socks will be necessary. Socks can be purchased from the reception, in line with stock availability.</li>
                      </ul>
                      <br>
                    </li>
                    <li class="col-md-12 "><u><b>Late pick - up Policy</b></u>
                      <ul class="col-md-12 ">
                        <li>To ensure a timely service for each child attending sessions Sensation Station has a policy in place concerning late pick-up. Sensation Station staff are not able to attend to or stay with children if a parent is late to pick their child up. The therapist is obliged to attend their next session on time. Consequently, consecutive late pick up will be charged because of the inconvenience and disruption caused to the centre and other clients. In the event of late collection the centre will contact the family’s Emergency Contact person, as noted on the child’s registration form.</li>
                        <li>Late pick-u charge :  10 minutes or more - AED 250/-</li>
                      </ul>
                      <br>
                    </li>
					
					<div class="clearfix"></div>
                  </ol>
                </div>
				
				
				
           
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
                      <input value="<?=$child_details[0]->father_name?>" type="text" id="father_name" class="form-control">
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
			 
			      <div class="col-md-12 "><br/>
					<p class="red">
						<u>“All therapy rooms are monitored by CCTV cameras for Child Protection.”</u> 
						Management has the rights to change the Terms and Conditions as required. 
					</p>
					<p class="margin-top-10">I agree to the terms and condition towards registering my child in Sensation Station.</p>
				</div>
				
				      <div class="col-md-4">
                  <div class=" md-checkbox">
                    <input <?=isset($child_details[0]->accept) == '' ? '' : $child_details[0]->accept == 'Accept' ? 'checked="checked"' : '' ?> type="checkbox" value="Accept"  id="condition_center_form_accept" name="condition_center_form_accept" class="md-check">
                    <label for="condition_center_form_accept"> <span class="inc">Accept</span> <span class="check"></span> <span class="box"></span> Accept </label>
                  </div>
                </div>
				
					<div>  
						<button type="button" class="btn btn green-stripe pull-right " id="terms_condition_center">SAVE & NEXT</button>
					</div>
					
				<div class="clearfix"></div>
			 	
              </div>
              
            </form>
          </div>
		  	   <div class="clearfix"></div>
        </div>
			   <div class="clearfix"></div>
      </div>
	   <div class="clearfix"></div>
    </div>
	 <div class="clearfix"></div>
  </div>
  
  <div class="clearfix"></div>
  
</div>
</div>



