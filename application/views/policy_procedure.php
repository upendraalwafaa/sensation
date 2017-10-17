<?php
// $loggid = $logged_in[0]->id;
// echo "<pre>";
// print_r($view_session_details);
// exit;
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
								<span class="caption-subject bold font-dark uppercase font-green">Upload Policy Procedure</span>
							</div>	
								<div class="qtarea">
                            <a href="<?= base_url().'Home/view_policy_procedure'; ?>">View Policy</a>
                              <a href="<?= base_url().'Home/view_policy_accepted_list'; ?>">Accepted Policy</a>
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
															<input type="text" class="form-control" id="pname" name="pname" value="" placeholder="">
														</div>	
													</div>	                  
											    </div>
												<div class="col-md-12">	
													<div class="col-md-12">	
														<div class="form-group">
														  <label >Attachment</label>
															<form method="post" id="profile_pic" name="profile_pic">
															  <input type="file" form_name="profile_pic"   class="form-cont uppload_file"  file_name="" name="profile" accept="image/gif, image/jpeg, image/png" id="profile">
															</form>	
														</div>
													</div>
												</div>
												<div class="col-md-12">	
													<div class="col-md-12">													
														<div class="form-actions noborder form-group  form-md-line-input pull-left" style="padding-top: 0;">
														<button type="button" id="procedure_add" class="btn green-stripe">Submit</button>
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
