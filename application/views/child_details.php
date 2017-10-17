<?php
$user_array      = $this->session->userdata('logged_in');
$user_id         = $user_array[0]->id;
$db_session_ar=get_employee_arr_by_emp_id($user_id);
$user_name       = $user_array[0]->employee_name;
$userdisipline  = $user_array[0]->disipline_id;
// echo "<pre>";
// print_r($child_details);
// exit;
if(isset($child_details['information'][0]->id) && !empty($child_details['information'][0]->id)) {
    $child_id = $child_details['information'][0]->id;
    $data = get_excess_amount_by_student_id($child_id);
}
?>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">
                <!--content Area  statrt-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <span class="caption-subject bold  uppercase font-green">Student Details</span>
                        </div>
                    </div>
                    
                    <div class="wrap_alldrop">

                            <div class="ui-widget">
                                <input type="text" name="child_names" class="form-control child_names" placeholder="Search for student..."/> 
                                <div class="alldropdown" style="display:none;">
                                    <div class="childs_names">
                                        <ul class="droplist dd-list dd-list-3"></ul>
                                    </div>
                                </div>
                            </div>
                        <div class="clearfix"></div>
                    </div>
                    
                        <div class="qtarea">
                          	<?php if($db_session_ar->quotation==0){ ?>
                            <a href="<?= base_url('Home/add_quotation'); ?>">Add Quotation</a>
                            <?php }  if($db_session_ar->receipt==0){ ?>
                            <a href="<?= base_url('/Home/create_receipt/'); ?><?=isset($child_details['information'][0]->id) && $child_details['information'][0]->id != '' ? $child_details['information'][0]->id : ''  ?>">Create Receipt</a>
                            <?php } ?>
                        </div>
                    
                            <div class="col-lg-12 col-xs-12">
                                    <hr style="margin:0 0 15px 0;"/>
                            </div>
                    
                    
                            <div class="col-lg-3 col-xs-12">
                                <h4><b><?=isset($child_details['information'][0]->child_name) && $child_details['information'][0]->child_name != '' ? $child_details['information'][0]->child_name : ''  ?></b></h4>
                            </div>
                    
                            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-12">
                            
                                    <div class="due_bnt">Due: <?=(isset($data) && $data >0 ? $data : 0)?></div>
                                    <div class="excess_bnt">Excess: <?=(isset($data) && $data<0 ? $data : 0)?></div>
                                    <div class="service_bnt">Service: 
                                    
                                    
<span>
                                                <?php
                                                if(isset($child_details['service_information']) && $child_details['service_information'] != ''){
                                                    foreach ($child_details['discipline_information'] as $key => $value) {
                                                    ?>
                                                    <span><?=$value->disipline_name?></span>
                                                    <?php
                                                    } 
                                                } else {
                                                ?>
                                                <span>Not Avaiable</span>
                                                <?php
                                                }
                                                ?>
</div>
                                                
                                
                                <div class="clearfix"></div>
                            </div>
                        
                
                    
                
                  <?php if(isset($child_details)) { ?>                    
                  <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6 profile-info">
                          <div class="portlet sale-summary">
                                    <!-- <div class="portlet-title">
                                    <div class="caption font-red sbold"> Personal Details </div>
                                </div>  -->
                                
                              <div class="portlet-body">
                                <div class=" ">
                                  <table class="table table-striped table-bordered table-advance table-hover">
                                    <tbody>
                                       
                                      <tr>
                                        <td class="highlight">Parent / Guardian</td>
                                        
                                        <td class="hidden-xs"><?= (isset($child_details['information'][0]->relationship_to_child) && $child_details['information'][0]->relationship_to_child != '' ? $child_details['information'][0]->relationship_to_child : '')  ?></td>
                                      </tr>
                                      <tr>
                                        <td class="highlight">Gender</td>
                                        
                                        <td class="hidden-xs"><?= (isset($child_details['information'][0]->gender) && $child_details['information'][0]->gender != '' ? $child_details['information'][0]->gender : '')  ?></td>
                                      </tr>
                                      <tr>
                                        <td class="highlight">Date of Birth</td>
                                       
                                        <td class="hidden-xs"><?= (isset($child_details['information'][0]->date_of_birth) && $child_details['information'][0]->date_of_birth != '' ? $child_details['information'][0]->date_of_birth : '')  ?> </td>
                                      </tr>
                                      <tr>
                                        <td class="highlight">School</td>
                                      
                                        <td class="hidden-xs"><?= (isset($child_details['information'][0]->child_name) && $child_details['information'][0]->child_name != '' ? $child_details['information'][0]->child_name : '')  ?>    </td>
                                      </tr>    
                                      <tr>
                                        <td class="highlight">Year</td>
                                         
                                        <td class="hidden-xs"><?= (isset($child_details['information'][0]->child_name) && $child_details['information'][0]->child_name != '' ? $child_details['information'][0]->child_name : '')  ?>  </td>
                                      </tr>  
                                      <tr>
                                        <td class="highlight">Therapist Attended</td>
                                        
                                            <td class="hidden-xs">
                                                <?php 
                                                foreach ($child_details['service_information'] as $key => $value) {
                                                ?>
                                                    <span><?=$value->employee_name?>,</span>
                                               <?php
                                                } 
                                                ?>
                                            </td>
  
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
                        <!--end col-md-8-->
                        <div class="col-md-6">
                          <div class="portlet sale-summary">
                                <!--<div class="portlet-title">
                                  <div class="caption font-red sbold"> Parents Details </div>
                                  <div class="tools"> <a class="reload" href="javascript:;" data-original-title="" title=""> </a> </div>
                                </div>  -->  
                            
                              <div class="portlet-body">
                                <div class=" ">
                                  <table class="table table-striped table-bordered table-advance table-hover">
                                    <tbody>
                                      <tr>
                                        <td class="highlight">Father</td>

                                        <td class="hidden-xs"><?= (isset($child_details['parent_information'][0]->father_name) && $child_details['parent_information'][0]->father_name != '' ? $child_details['parent_information'][0]->father_name : '')  ?></td>
                                      </tr>
                                      <tr>
                                        <td class="highlight">Phone</td>
                                                                               
                                        <td class="hidden-xs"><?= (isset($child_details['parent_information'][0]->father_mobile) && $child_details['parent_information'][0]->father_mobile != '' ? $child_details['parent_information'][0]->father_mobile : '')  ?> </td>
                                      </tr>
                                      <tr>
                                        <td class="highlight">Email</td>

                                        <td class="hidden-xs"><?= (isset($child_details['parent_information'][0]->father_personal_email) && $child_details['parent_information'][0]->father_personal_email != '' ? $child_details['parent_information'][0]->father_personal_email : '')  ?></td>
                                      </tr>
                                      <tr>
                                        <td class="highlight">Mother</td>
                                        
                                        <td class="hidden-xs"><?= (isset($child_details['parent_information'][0]->mother_name) && $child_details['parent_information'][0]->mother_name != '' ? $child_details['parent_information'][0]->mother_name : '')  ?></td>
                                      </tr>
                                      <tr>
                                        <td class="highlight">Phone</td>
                                        
                                        <td class="hidden-xs"><?= (isset($child_details['parent_information'][0]->mother_mobile) && $child_details['parent_information'][0]->mother_mobile != '' ? $child_details['parent_information'][0]->mother_mobile : '')  ?></td>
                                      </tr>    
                                      <tr>
                                        <td class="highlight">Email</td>
                                       
                                        <td class="hidden-xs"><?= (isset($child_details['parent_information'][0]->mother_personal_email) && $child_details['parent_information'][0]->mother_personal_email != '' ? $child_details['parent_information'][0]->mother_personal_email : '')  ?> </td>
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
                  </div>
                  <?php } ?>
                   <div class="col-md-12  pull-right form-group">
                    <a href="<?= base_url() . 'Home/reg_add/' . (isset($child_details) && $child_details != '' ? $child_details['information'][0]->id : ''); ?>" class="btn btn-success pull-right">Student Details</a>
                  </div>
                  <div class="clearfix"></div>
                  <hr>
                  <?php if(isset($child_details['information'][0]->id) && $child_details['information'][0]->id  != ''): ?> 
                  <div class="col-md-12  pull-right form-group">
                    <div class="col-md-6  pull-left form-group">
                          <h4>Additional Documents</h4>
    					<div class="form-group">
    					        <label >Document Name</label>
    			                <input type="text" name="child_doc_name" id="child_doc_name" class="form-control" value="" /> 													
    					</div>                        
    					<div class="form-group">
    					  <label >Attachment</label>													
                                <form method="post" id="profile_pic" name="profile_pic">
                                    <input type="file" form_name="profile_pic"   class="form-cont uppload_file"  file_name="" name="profile" accept="image/gif, image/jpeg, image/png" id="profile">
                                </form>
    					</div>  
                        <div class="form-group">
                            <input type="hidden" id="child_id" name="child_id" value="<?=isset($child_id)&& $child_id != '' ? $child_id : ''?>" />
                            <button type="button" class="btn green-stripe upload_child_docs" >Save </button>
                        </div> 
                    </div>
                    <div class="col-md-6  pull-left form-group">
                        <h4> Documents List</h4>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Document Name </th>
                                            <th> Document </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if(!empty($child_details['documents'])):
                                        $i=1;
                                        foreach ($child_details['documents'] as $key => $value) { ?>
                                        <tr>
                                            <td><?=$i?> </td>
                                            <td> <?=$value->child_doc_name?> </td>
                                            <td><a href="<?=base_url()?>files/images/<?=$value->child_documents?>" target="_blank"><?=$value->child_documents?></a> </td>
                                        </tr>
                                        <?php $i++; } 
                                        endif;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>                        
                    </div>
                  </div>
                  <?php endif; ?>    
                  <div class="clearfix"></div>
                  </div>
                </div>

                    </div>
                  </div>

                    <!--content Area  End-->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
</div>


