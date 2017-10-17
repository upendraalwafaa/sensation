<?php
$user_array      = $this->session->userdata('logged_in');
$user_id         = $user_array[0]->id;
$user_name       = $user_array[0]->employee_name;
$user_disipline  = $user_array[0]->disipline_id;
// echo "<pre>";
// print_r($therapy['information']);
// exit;
?>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
			<div class="col-lg-12 col-xs-12 col-sm-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet light">
								<div class="portlet-title">
									<div class="caption font-green">Therapy Note Lists </div> 
								</div> 
								
								<div class="col-lg-4 col-xs-12 row">
									<div class="ui-widget" style="padding-top: 10px;">
										<input type="text" name="child_names_thpy" class="form-control child_names_thpy" placeholder="Search for student..."/> 
									</div>
								 
									<div class="child_thpy search_listdrop"> </div>

									
									<div class="clearfix"></div>
								</div>
								
			         
						<?php if(isset($therapy) && $therapy != ''): ?>
							<div class="portlet-body">
								<div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
								<b><?=(isset($therapy['childdetails']) && $therapy['childdetails'] =='' ? '' : $therapy['childdetails'][0]->child_name )?></b>								
			                        <table class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
									    <thead>
									        <tr>
									            <th> SNo </th>			
									            <th> Date </th>		
									            <th> Service </th>				            
									            <th> Staff </th>			            		        
									            <th> Therapy Notes </th>
									            <th> Status </th>					            
									            <!--<th >Attachment </th>-->
									            <th > Notes </th>					            
									            <th >Action </th>					            
									        </tr>
									    </thead>
									    <tbody>               
										<?php
										$i=1;
										if(isset($therapy['information']) && $therapy['information'] != ''):
										  // echo "<pre>";
										  // print_r($therapy['information']);
										  // exit;
										    
										    
										foreach($therapy['information'] as $key=>$value) :
										    
										    
										//echo $value->t_permission_to_view;
										$arr = explode(',',$value->t_permission_to_view);
										//if (in_array($user_id, $arr)):
										?>
											<tr>
											    <td><?=$i?></td>
												<td class="highlight"><?=date('Y-m-d',strtotime($value->timestamp))?></td>
												<td class="hidden-xs"><?=$value->t_services?></td>										
												<td> <?=$value->employee_name?></td>
												<td style="<?=($value->strike_note == 'Yes' ? 'text-decoration: line-through' : '' )?>"><?=($value->latest_note =='' ? substr("$value->t_therapy_note",0,100) : substr("$value->latest_note",0,100) )?></td>
												<td>
							                          <?php 
							                          if($value->t_status == 1) {
							                            echo "Cancelled 100%";
							                          } elseif($value->t_status == 2) {
							                            echo "Cancelled 50%";
							                          } elseif($value->t_status == 3){
							                            echo "No show";
							                          } elseif($value->t_status == 4){
							                             echo "Attended";
							                          } elseif($value->t_status == 5){
							                            echo "Cancelled by Therapist";
							                          } elseif ($value->t_status == 6) {
							                               echo "Cancelled No charge";
							                          } elseif ($value->t_status == 7) {
							                            echo "No show – SBS";
							                          } elseif ($value->t_status == 8) {
							                            echo "ELIP (General Observation)";
							                          } elseif ($value->t_status == 9) {
							                            echo "General Observation";
							                          } elseif($value->t_status == 10){
							                              echo "Re-Schedule";
							                          }
							                          ?>													
												</td>
												<!--/*<td><a href="<?=base_url()?>files/images/<?=$value->t_note_pdf?>" target="_blank"><?=$value->t_note_pdf?></td>/*-->
												<td><?=($value->additional_notes =='' ? $value->additional_notes : $value->additional_notes )?></td>								
												<td>
													<a href="<?= base_url('Home/view_all_therapy_notes/'.$value->t_id); ?>" title="History"><i class="fa fa-history"></i></a>&nbsp;
													<a data-thrpid="<?=$value->t_id?>" data-child_id="<?=$value->t_child_id?>"  data-target="#ajax" data-toggle="modal" title="Add Notes" class="notes_on"><i class="fa fa-pencil"></i></a>								
												</td>									
											</tr>							            

										<?php 
										$i++;
										//endif;

										endforeach;
										?>
								    	</tbody>
								</table>
										<div class="clearfix"></div>
								</div>
									<div class="clearfix"></div>
							</div>						
					<?php endif; ?>
					
					<div class="clearfix"></div>
                </div>	
					<div class="clearfix"></div>
				<?php endif; ?>
				
				<br/>
				<br/>
				</div>
				<div class="clearfix"></div>
  		</div>
			<div class="clearfix"></div>
	</div>
</div><div class="clearfix"></div>
</div>

<div id="ajax" class="modal fade" tabindex="-1" aria-hidden="true" >
	<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h4 class="modal-title ">Update Notes<span class="session_nbr"></span></h4>
		  </div>
		  <div class="modal-body">
			<div class="row">
			  <div class="col-md-12">
				 
				  <div class="portlet-body form">
					<form class="form-horizontal" role="form" id="add_goal">
					  <div class="form-body">
						<div class="form-group">
						  <label class="col-md-2 control-label">Notes :</label>
						  <div class="col-md-10">
							<textarea class="form-control" rows="3" name="therapy_addition_notes" id="therapy_addition_notes"></textarea>
							<input type="hidden" id="note_t_id" name="therapy_id" value="">     
							<input type="hidden" id="child_id" name="child_id" value="">   							               
						  </div>
						</div>
					  </div>
					</form>
				  </div>
			 
			  </div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
			<button type="button" class="btn green" id="additional_notes_submit">Save changes</button>
		  </div>
		</div>
	</div>
</div>