<?php
$designation_name = '';
$designation_id = '';
$Description = '';
if ($designation_Arr != '') {
    $Description = $designation_Arr[0]->description;
    $designation_id = $designation_Arr[0]->id;
    $designation_name = $designation_Arr[0]->designation_name;
}
?>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-offset-1 col-lg-6 col-xs-12 col-sm-12">
               

				<div class="portlet light portlet-fit bordered">
						<div class="portlet-title">
							<div class="caption font-green">
								<span class="caption-subject bold uppercase"><?php if ($designation_Arr != '') { ?> Update Designation  <?php } else { ?>Add New Designation <?php } ?></span>
							</div>
							<div class="qtarea">
                            <a href="<?= base_url().'Home/view_designation'; ?>">View
                            Designation</a>
                             </div>
					    </div>
                        <input type="hidden" id="designation_id" value="<?= $designation_id ?>">
						<div class=" col-sm-12">
							<div class="portlet-body form">
								<form role="form">
									<div class="form-body">
										<div class="form-group form-md-line-input form-md-floating-label has-success">
											<input value="<?= $designation_name; ?>" type="text" class="form-control" id="designation_name">
											<label for="form_control_1">Designation Name</label>
										</div>
										
										<div class="form-group form-md-line-input form-md-floating-label has-success">
											<input value="<?= $Description; ?>" type="text" class="form-control" id="description">
											<label for="form_control_1">Description</label>
										</div>
										
										<div class="form-actions noborder">
											<button type="button" id="designation_add" class="btn green-stripe pull-right">Submit</button>
											<div class="clearfix"></div>
										</div>
										
									</div>
									
									
									
								<div class="clearfix"></div>
								</form>
								<div class="clearfix"></div>
							</div>
						</div>
						
						<div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
</div>

