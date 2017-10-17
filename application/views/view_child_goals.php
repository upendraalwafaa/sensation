<?php
$user_array      = $this->session->userdata('logged_in');
$user_id         = $user_array[0]->id;
$user_name       = $user_array[0]->employee_name;
$user_disipline  = $user_array[0]->disipline_id;
?>
<div class="page-content-wrapper">
  <div class="page-content">
    <div class="row">
      <div class="col-md-12"> 
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
          <div class="portlet box green">
            <div class="portlet-title">
              <div class="caption"> <i class="fa fa-gift"></i><?=$child_details[0]->child_name?> Goals</div>

            </div>
            <div class="portlet-body" style="display: block;">
              <div class="panel-group accordion" id="accordion1">
                  <?php $i=0; foreach ($child_goals as $key => $value) { ?>
				   
						 
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"> <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion<?=$i?>" href="#collapse_<?=$i?>" aria-expanded="false"><?=$value->goal_title?></a></h4>
								</div>
								
								<div id="collapse_<?=$i?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
								  <div class="panel-body">
									<p><b>Notes:</b><br/><?=$value->goal_description?></p>
									<p><b>Created By</b> : <?=$value->employee_name?></p>
									<p><b>Created Date</b> : <?=$value->created_date?></p>
									<p><b>Goal Date</b> : <?=$value->goal_end_date?></p>
									<p><b>Goal Attachment</b> : <a href="<?=base_url().'files/images/'.$value->goal_pdf?>" target="_blank"><?=$value->goal_pdf?></a></p>									
								  </div>
								</div>
								
							</div>
			 
				 	  
                  <?php $i++; } ?>
              </div>
            </div>
          </div>

        </div>
        <!-- END ACCORDION PORTLET--> 
      </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET--> 
  </div>
</div>
</div>
<!-- END CONTENT BODY -->
</div>
<!-- responsive -->
<div id="responsive" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title ">Set A Goal<span class="session_nbr"></span></h4>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-md-12">
        <div class="portlet light bordered">
          <div class="portlet-body form">
            <form class="form-horizontal" role="form" id="edit_goal">
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
                    <input class="form-control datepicker" name="goal_date" id="session_date" placeholder="12-07-2017" type="text" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">Description</label>
                  <div class="col-md-10">
                    <textarea class="form-control" rows="3" name="goal_description"></textarea>
                    <input type="hidden" name="therapist_name" id="therapist_name"  value="">
                    <input type="hidden" name="therapist_id" id="therapist_id"  value="">
                    <input type="hidden" name="goal_id"  id="goal_id" value="">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
    <button type="button" class="btn green" id="goal_edit_submit">Save changes</button>
  </div>
</div>
