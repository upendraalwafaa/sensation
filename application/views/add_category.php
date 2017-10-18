<?php
$category_name = '';
$category_id='';
if ($category_Arr != '') {
    $category_id = $category_Arr[0]->id;
    $category_name = $category_Arr[0]->category_name;
}
?>
<upndra>bdkasbd</upndra>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-offset-1 col-lg-6 col-xs-12 col-sm-12">
			
			<div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                            <div class="caption font-green">
                                <input type="hidden" id="category_id" value="<?= $category_id ?>">
                                <span class="caption-subject bold font-dark uppercase font-green"><?php if ($category_Arr != '') { ?> Update Category  <?php } else { ?>Add New Category <?php } ?></span>
                            </div>
                           <div class="qtarea">
                               <a href="<?= base_url().'Home/view_category' ?>">View Category</a>
                                </div>
        					</div>	
                        <div class="portlet-body form">
							<div class="col-sm-12"> 
								<form role="form">
										<div class="form-group form-md-line-input form-md-floating-label has-success">
											<input value="<?= $category_name; ?>" type="text" class="form-control" id="category_name">
											<label for="form_control_1">Category Name </label>
											
										</div>
							   
										<div class="form-actions noborder pull-right">
											<button type="button" id="category_add" class="btn default green-stripe">Submit</button>
										</div>
								</form>
								
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

