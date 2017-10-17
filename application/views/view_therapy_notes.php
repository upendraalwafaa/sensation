<?php
$user_array      = $this->session->userdata('logged_in');
$user_id         = $user_array[0]->id;
 $db_session_ar=get_employee_arr_by_emp_id($user_id);
$user_name       = $user_array[0]->employee_name;
$user_disipline  = $user_array[0]->disipline_id;
// echo "<pre>";
// print_r($child_details);
// exit;
?>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
			<div class="row">
			 
				<div class="col-lg-12 col-xs-12 col-sm-12">
					<div class="portlet light portlet-fit bordered">
					
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-microphone font-dark hide"></i>
									<span class="caption-subject bold font-dark uppercase font-green"> Students Therapy Session Details</span>
								</div>
								<div class="clearfix"></div>
							</div>
					  
							<div class="col-lg-4 col-xs-12">
								<div class="form-group ui-widget" style="padding-top: 10px;">
									<input type="text" name="childnames" class="form-control childnames" placeholder="Search for student..."/> 
								</div>
								<div class="childs_names form-group"> </div>
							</div>
						
							<div class="clearfix"></div>
							<div class="col-lg-12 col-xs-12">
								<hr style="margin: 0 0 15px 0;"/>
							</div>
								
							<div class="col-lg-3 col-xs-12">
								<h4><b><?=(isset($child_details['information'][0]->child_name) && $child_details['information'][0]->child_name != '' ? $child_details['information'][0]->child_name : '' )?></b></h4>
							</div>
						 	
							<div class="col-lg-9 col-md-9 col-xs-9 col-sm-12">
					 			<?php if(!empty($child_details)): ?>
						 			<a class="stdtrpsebnt btn green btn-outline sbold pull-left" data-toggle="modal" href="#responsive"><i class="fa fa-trophy"></i> Set a Goal </a>
						 			<a class="stdtrpsebnt btn green btn-outline sbold pull-left" href="<?= base_url('Home/view_child_goals/'.$child_details['information'][0]->id); ?>"><i class="fa fa-eye"></i> View All Goals </a>	
						 			<?php if($db_session_ar->registration_form==0){ ?>
									<a href="<?=base_url('Home/reg_add/'.$child_details['information'][0]->id)?>" class="stdtrpsebnt btn green btn-outline sbold pull-left"><i class="fa fa-list"></i>  View Details </a>
									<?php } ?>
									<a href="<?=base_url('Home/therapy_note_lists/'.$child_details['information'][0]->id)?>" class="stdtrpsebnt btn green btn-outline sbold pull-left"><i class="fa fa-list"></i>  View Therapy Notes </a>									<a href="http://dev.granddubai.com/sensation/Home/child_details/1" class="stdtrpsebnt btn green btn-outline sbold pull-left"><i class="fa fa-list"></i>  Docs </a>
								<?php endif; ?>
							</div>
							
						  
					  <?php if(isset($child_details)) { ?>   
					  
					  <div class="col-md-12">
						<div class="row">
						
						 
						  <div class="col-md-6 profile-info">
							<div class="portlet sale-summary">
									<!-- <div class="portlet-title">
										<div class="caption sbold"> Personal Details </div>
									</div>  -->
									<div class="portlet-body">
									 <div class="table-scrollable">
								 		<table class="table table-striped table-bordered table-advance table-hover">
										  <tbody>

											<tr>
											  <td class="highlight">Gender</td>
											  <td class="hidden-xs"><?= (isset($child_details['information'][0]->gender) && $child_details['information'][0]->gender != '' ? $child_details['information'][0]->gender : ''  ) ?> </td>
											</tr>
											
											<tr>
											  <td class="highlight">Date of Birth</td>
											  <td class="hidden-xs"><?= (isset($child_details['information'][0]->date_of_birth) && $child_details['information'][0]->date_of_birth != '' ? $child_details['information'][0]->date_of_birth : '' ) ?></td>
											</tr>
											
											<tr>
											  <td class="highlight">Child’s Reg. No</td>
											  <td class="hidden-xs">C0<?= (isset($child_details['information'][0]->id) && $child_details['information'][0]->id != '' ? $child_details['information'][0]->id : '' ) ?> </td>
											</tr>                                    
											<tr>
											  <td class="highlight">Father Name</td>
											  <td class="hidden-xs"><?= (isset($child_details['parent_information'][0]->father_name) && $child_details['parent_information'][0]->father_name  != '' ? $child_details['parent_information'][0]->father_name : '' ) ?> </td>
											</tr>                                    
											<tr>
											  <td class="highlight">Contact No</td>
											  <td class="hidden-xs"><?= (isset($child_details['parent_information'][0]->father_mobile) && $child_details['parent_information'][0]->father_mobile  != '' ? $child_details['parent_information'][0]->father_mobile : '' )  ?> </td>
											</tr>    
											<tr>
											  <td class="highlight">Email Address</td>
											  <td class="hidden-xs"><?= (isset($child_details['parent_information'][0]->father_personal_email) && $child_details['parent_information'][0]->father_personal_email  != '' ? $child_details['parent_information'][0]->father_personal_email : '') ?> </td>
											</tr>                                                 
										  </tbody>
										</table>
										
									  </div>
									</div>
							</div>                                                                                       
						  </div>
						  
						  

						  <!--end col-md-8-->
						  <div class="col-md-6">
							<div class="portlet sale-summary">
							    <div class="portlet-body">
								  <div class="table-scrollable">
									<table class="table table-striped table-bordered table-advance table-hover">
									  <tbody>
										<tr>
										  <td class="highlight">Mother Name</td>
										  <td class="hidden-xs"><?= (isset($child_details['parent_information'][0]->mother_name) && $child_details['parent_information'][0]->mother_name != '' ? $child_details['parent_information'][0]->mother_name : '')  ?></td>
										</tr>
										<tr>
										  <td class="highlight">Contact No</td>
										  <td class="hidden-xs"><?= (isset($child_details['parent_information'][0]->mother_mobile) && $child_details['parent_information'][0]->mother_mobile != '' ? $child_details['parent_information'][0]->mother_mobile : '')  ?></td>
										</tr>
										<tr>
										  <td class="highlight">Email Address</td>
										  <td class="hidden-xs"><?= (isset($child_details['parent_information'][0]->mother_personal_email) && $child_details['parent_information'][0]->mother_personal_email != '' ? $child_details['parent_information'][0]->mother_personal_email : '' ) ?></td>
										</tr>
										<tr>
										  <td class="highlight">Emergency Contact No with Name</td>
										  <td class="hidden-xs"><?= (isset($child_details['information'][0]->emergency_contact_name) && $child_details['information'][0]->emergency_contact_name != '' ? $child_details['information'][0]->emergency_contact_name : ''  ) ?>,<?= (isset($child_details['information'][0]->emergency_contact_number) && $child_details['information'][0]->emergency_contact_number != '' ? $child_details['information'][0]->emergency_contact_number : '') ?> </td>
										</tr>
										<tr>
										  <td class="highlight">School Attending</td>
										  <td class="hidden-xs"><?= (isset($child_details['parent_information'][0]->school_attinding) && $child_details['parent_information'][0]->school_attinding != '' ? $child_details['parent_information'][0]->school_attinding : '' ) ?></td>
										</tr>    
										<tr>
										  <td class="highlight">School</td>
										  <td class="hidden-xs"><?= (isset($child_details['parent_information'][0]->school) && $child_details['parent_information'][0]->school != '' ? $child_details['parent_information'][0]->school : '' ) ?></td>
										</tr>  										
										<tr>
										  <td class="highlight">Staff/Therapist Name </td>
										  <td class="hidden-xs"></td>
										</tr>  
										<tr>
										  <td class="highlight">Discipline Attending </td>
										  <td class="hidden-xs"><?= (isset($child_details['parent_information'][0]->discipline_name) && $child_details['parent_information'][0]->discipline_name != '' ? $child_details['parent_information'][0]->discipline_name : '' ) ?></td>
										</tr> 
										<tr>
                                            <td class="highlight">Any known allergies, food intolerances or sensitivities. Any external triggers?</td>
                                            <td class="hidden-xs">
<?=(isset($child_details['allergies'][0]->external_triggers_desc) &&  $child_details['allergies'][0]->external_triggers_desc != '' ? $child_details['allergies'][0]->external_triggers_desc : ''); ?>
                                            </td>
                                      </tr>
                                      <tr>
                                            <td class="highlight">Any history of allergies, autoimmune or genetic disorders IN FAMILY?</td>
                                            <td class="hidden-xs">
<?=(isset($child_details['allergies'][0]->disorders_in_fm_desc) &&  $child_details['allergies'][0]->disorders_in_fm_desc != '' ? $child_details['allergies'][0]->disorders_in_fm_desc : ''); ?>                                               
                                            </td>                                          
                                      </tr>										
									  </tbody>
									</table>
								  </div>
								</div>
							</div>
						  </div>
						  <!--end col-md-4--> 
						  
						  
						  
						  
						</div>
						<!--end row-->

						
					  <div class="row">
					 
						  <!-- BEGIN EXAMPLE TABLE PORTLET-->
						  <div class="portlet light">
							<div class="portlet-title">
							  <div class="caption font-dark"> 
							  <span class="caption-subject bold uppercase"> Receipts</span> </div>
							</div>
							         <div class="portlet-body ">
                        <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                            <div class=" ">
                                <table array_index="0,1,2,3,4,5,6,7" class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
								<thead>
								  <tr>
								  
									<th> SNo </th>   
									<th> Receipt No </th> 

									<th> Created Date </th>
									<th> Services </th>
									<th> Cancelled </th>
									<th> Progress </th>
									<th> Write </th>										
									<th> Pending </th>
									<?= ($user_id == 1 || $user_id == 5 || $user_id == 17 ? '<th>Edit</th>' : '') ?>								
								  </tr>
								</thead>
								<tbody>
								<?php  $i=1; foreach ($child_details['quatation_details'] as $key => $value) : ?>
									<tr class="odd gradeX">
									<td><?=$i;?></td>
<td><a href="<?= base_url('Home/therapy_note_lists/'.$value->student_id.'/'.$value->quotation_id); ?>"><?=$value->receipt_no.'&nbsp; / &nbsp;'.$value->erp_register_no?></a></td>
									<td><?=$value->timestamp;?></td>
									<td><span class="label label-sm label-success"> <?=$value->sub_category_name;?> </span></td>
									<td class="center"> <?=$value->cancl_sess;?></td>
									<td class="center"> <?=$value->completed_ses;?>/<?=$value->tot_ses;?></td>
									<td>
										<?php 
										$qs ='';
										foreach ($child_details['q_sessions'] as $k1 => $v1) :

											if($value->quotation_id == $v1->quotation_id){
												$qs[$v1->id] = $v1->id;
											}
										endforeach;
									
											if(!empty($qs)):
											foreach ($qs as $ke => $va) : 
										?>
											<a class="btn btn-xs green" href="<?= base_url('Home/view_single_session/'.(isset($va) && $va != "" ? $va : '')); ?>"><i class="fa fa-pencil"></i></a>
										<?php 
											endforeach; 
											endif;
										?>
									</td>									
									<td>
									<div class="btn-group">                                    
										<!--/*<a href="<?= base_url('Home/view_sessions/'.$value->quotation_id); ?>" class="btn btn-xs green dropdown-toggle">View</a>*/-->
										<?php 
										$q ='';
										foreach ($child_details['therapy_notes'] as $key1 => $value1) :
											if($value->quotation_id == $value1->quotation_id){
												$q[$value1->t_id] = $value1->t_session_id;
											}
										endforeach;
											if(!empty($q)):
											foreach ($q as $key => $val) : 
										?>
											<a href="<?= base_url('Home/view_single_session/'.(isset($val) && $val != "" ? $val : '')); ?>"><u><?=(isset($val) && $val != "" ? $val : '')?></u></a>
										<?php 
											endforeach; 
											endif;
										?>
									</div>
									</td>
									<?=($user_id == 1 || $user_id == 5 || $user_id == 17 ? '<td><a href="'.base_url('Home/view_sessions/'.$value->quotation_id).'" class="btn btn-xs green dropdown-toggle">Edit</a></td>' :	 '') ?>
									</tr>
								<?php  $i++; endforeach;  ?>
								</tbody>
							  </table>
							</div>
							</div>
						  </div>
						  <!-- END EXAMPLE TABLE PORTLET--> 
				 
					  </div>
					</div>
					
					<?php } ?>
				 	
					<div class="clearfix"></div>
						</div>
				
					<div class="clearfix"></div>
				</div>
                    <!--content Area  End-->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
</div>
<!-- responsive -->
 

<div id="responsive" class="modal fade" tabindex="-1"  >
	<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h4 class="modal-title ">Set A Goal<span class="session_nbr"></span></h4>
		  </div>
		  <div class="modal-body">
			<div class="row">
			  <div class="col-md-12">
				 
				  <div class="portlet-body form">
					<div class="form-horizontal" role="form" id="add_goal">
					  <div class="form-body">
						<div class="form-group">
						  <label class="col-md-2 control-label">Title</label>
						  <div class="col-md-10">
							<input type="text" name="goal_title" id="goal_title" class="form-control" value="" placeholder="Enter goal title">
						   </div>
						</div>
						<div class="form-group">
						  <label class="col-md-2 control-label">Date</label>
						  <div class="col-md-10">
							<input class="form-control datepicker" name="goal_date" id="goal_date" placeholder="Enter goal date" type="text" value="">
						  </div>                
						</div>    
						<div class="form-group">
						  <label class="col-md-2 control-label">Description</label>
						  <div class="col-md-10">
							<textarea class="form-control" rows="3" id="goal_description" name="goal_description"></textarea>
							<input type="hidden" id="child_id" name="child_id" value="<?=$child_details['information'][0]->id?>">    
							<input type="hidden" id="therapist_name" name="therapist_name" value="<?=$user_name?>">
							<input type="hidden" id="therapist_id" name="therapist_id" value="<?=$user_id?>">                    
						  </div>
						</div>
						<div class="form-group">
						    <label class="col-md-2 control-label">Attachment</label>
                            <div class="col-md-10">
                                <form method="post" id="profile_pic" name="profile_pic">
                                    <input type="file" form_name="profile_pic"   class="form-cont uppload_file"  file_name="" name="profile" accept="image/gif, image/jpeg, image/png" id="profile">
                                </form>
                                
                            </div>
						</div>						
					  </div>
					</div>
				  </div>
			 
			  </div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
			<button type="button" class="btn green" id="goal_submit">Save changes</button>
		  </div>
		</div>
	</div>
</div>
