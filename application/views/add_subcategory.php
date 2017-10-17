<?php
$category_id = '';
$sub_category_name = '';
$sub_category_id = '';
if (isset($sub_category_Arr[0]->category_id)) {
    $category_id = $sub_category_Arr[0]->category_id;
    $sub_category_name = $sub_category_Arr[0]->sub_category_name;
    $sub_category_id = $sub_category_Arr[0]->id;
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
                                <input type="hidden" id="sub_category_id" value="<?= $sub_category_id ?>">
                                <span class="caption-subject bold uppercase"></span></span>Add New Sub Category</span>
								</div>
								<div class="qtarea">
                            <a href="<?= base_url().'Home/view_subcategory'; ?>">View Subcategory</a>
                             </div>
                        </div>
                        <div class="portlet-body form">
                            <form role="form">
							
                                <div class="col-sm-12">
                                    <div class="form-group form-md-line-input form-md-floating-label has-success">
                                        <label for="category">Select Category</label>
                                        <select id="category" class="form-control " data-id="category_id">
                                            <option value="">--select--</option>
                                            <?php
                                            if (isset($categories)) {
                                                foreach ($categories as $category) {
                                                    if ($category->id == $category_id) {
                                                        $select = "selected='selected'";
                                                    } else {
                                                        $select = '';
                                                    }
                                                    echo '<option ' . $select . ' value="' . $category->id . '">' . $category->category_name . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group form-md-line-input form-md-floating-label has-success">
                                        <label for="subcategory">Sub Category</label>
                                        <input value="<?php echo $sub_category_name ?>" type="text" class="form-control " data-id="sub_category_name" id="subcategory">
                                    </div>
									
									<div class="form-group form-md-line-input form-md-floating-label has-success pull-right">
										<button type="button" id="add_subcategory" class="btn default green-stripe">Submit</button>
										<br/>
										<br/>
									</div>
									
									<div class="clearfix"></div>
									
                                </div>
									
                            </form>
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

