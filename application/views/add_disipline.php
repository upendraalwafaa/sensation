<?php
$disipline_name = '';
$disipline_id = '';
$Description = '';
if ($disipline_Arr != '') {
    $Description = $disipline_Arr[0]->description;
    $disipline_id = $disipline_Arr[0]->id;
    $disipline_name = $disipline_Arr[0]->disipline_name;
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
                                 <input type="hidden" id="disipline_id" value="<?= $disipline_id ?>">
                                 <span class="caption-subject bold uppercase"><?php if ($disipline_Arr != '') { ?> Update Disipline  <?php } else { ?>Add New Disipline <?php } ?></span>
                            </div>
                            <div class="qtarea">
                            <a href="<?= base_url().'Home/view_disipline'; ?>">View Discipline</a>
                             </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="portlet-body form">
                                
                                <form role="form">
                          
                                        <div class="form-group form-md-line-input form-md-floating-label has-success">
                                            <input value="<?= $disipline_name; ?>" type="text" class="form-control" id="disipline_name">
                                            <label for="form_control_1">Disipline Name</label>
                                        </div>
                                     
                                        <div class="form-group form-md-line-input form-md-floating-label has-success">
                                            <input value="<?= $Description; ?>" type="text" class="form-control" id="description">
                                            <label for="form_control_1">Description</label>
                                            	  <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="form-actions noborder">
										<div class="form-group"><br/>
											<button type="button" id="disipline_add" class="btn green-stripe pull-right">Submit</button>
										  <div class="clearfix"></div>
										  </div>
									
                                    </div>
                                </form>
                                <div class="clearfix"></div>
                            </div>
                        <div class="clearfix"></div>
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

