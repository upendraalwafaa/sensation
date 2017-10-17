<?php
$services_id = '';
$category_id = '';
$sub_category_id = '';
$desipline_id = '';
$services_time = '';
$services_time_type = '';
$fees = '';
if ($result_Arr != '') {
//    echo '<pre>';
//    print_r($desipline_Arr);
//    print_r($result_Arr);exit;
    $services_id = $result_Arr[0]->id;
    $category_id = $result_Arr[0]->category_id;
    $sub_category_id = $result_Arr[0]->sub_category_id;
    $desipline_id = $result_Arr[0]->disipline;
    $services_time = $result_Arr[0]->services_time;
    $services_time_type = $result_Arr[0]->services_time_type;
    $fees = $result_Arr[0]->fees;
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
                                <span class="caption-subject bold uppercase"></span></span>Add New Service</span>
                            </div>
                            <div class="qtarea">
                            <a href="<?= base_url().'Home/view_service'; ?>">View  Services</a>
                             </div>
                        </div>
                        <div class="portlet-body form">
                            <form role="form">
                                <div class=" col-sm-12">
                                    <div class="form-group form-md-line-input form-md-floating-label has-success">
                                        <input type="hidden" id="services_id" value="<?= $services_id ?>">
                                        <label for="category">Select Category</label>
                                        <select id="services_category" class="form-control ">
                                            <option value="">--select--</option>
                                            <?php
                                            if (isset($category_Arr)) {
                                                for ($i = 0; $i < count($category_Arr); $i++) {
                                                    if ($category_id == $category_Arr[$i]->id) {
                                                        $select = 'selected="selected"';
                                                    } else {
                                                        $select = '';
                                                    }
                                                    echo '<option ' . $select . ' value="' . $category_Arr[$i]->id . '">' . $category_Arr[$i]->category_name . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group form-md-line-input form-md-floating-label has-success">
                                        <label for="subcategory">Sub Category</label>

											<div id="subcategory_details">
												<!--Note :-  name is declere in common_helper function name Get_sub_category_list_by_id()-->
												<select id="subcategory" class="form-control">
													<option value="">--select--</option>
													<?php
													if (isset($subcategory_Arr)) {
														for ($i = 0; $i < count($subcategory_Arr); $i++) {

															if ($subcategory_Arr[$i]->id == $sub_category_id) {
																$select = 'selected="selected"';
															} else {
																$select = '';
															}
															echo ' <option ' . $select . ' value="' . $subcategory_Arr[$i]->id . '">' . $subcategory_Arr[$i]->sub_category_name . '</option>';
														}
													}
													?>
												</select>
											</div>
                                    </div>
									
                                    <div class="form-group form-md-line-input form-md-floating-label has-success">
                                        <label for="disipline">Disipline</label>
                                        <select id="disipline" class="form-control">
                                            <?php
                                            if (count($desipline_Arr) > 0) {
                                                 ?><option value="">--Select--</option><?php
                                                for ($i = 0; $i < count($desipline_Arr); $i++) {
                                                    $selected='';
                                                    if($desipline_id==$desipline_Arr[$i]->id){
                                                       $selected='selected="selected"'; 
                                                    }
                                                    ?><option <?= $selected ?>  value="<?= $desipline_Arr[$i]->id ?>"><?= $desipline_Arr[$i]->disipline_name ?></option><?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group form-md-line-input form-md-floating-label has-success ">
                                        <label for="hours">Minutes/Hours/Month/</label>
                                        <select id="services_time_type" class="form-control">
                                            <option>--select--</option>
                                            <option <?= $services_time_type == 'Minutes' ? 'selected="selected"' : '' ?> >Minutes</option>
                                            <option <?= $services_time_type == 'Hours' ? 'selected="selected"' : '' ?>>Hours</option>
                                            <option <?= $services_time_type == 'Months' ? 'selected="selected"' : '' ?>>Months</option>
                                            <option <?= $services_time_type == 'Year' ? 'selected="selected"' : '' ?>>Year</option>
                                        </select>
                                    </div>

                                    <div class="form-group form-md-line-input form-md-floating-label has-success ">
                                        <label for="hours">Ex : 1,2,3</label>
                                        <input value="<?= $services_time ?>" type="text" class="form-control"  id="services_time">
                                    </div>

                                    <div class="form-group form-md-line-input form-md-floating-label has-success">
                                        <label for="fees">Fees</label>
                                        <input value="<?= $fees ?>" type="text" class="form-control"  id="fees"> 
                                    </div>

									<div class="form-actions noborder pull-right">
										<button type="button" id="add_service" class="btn green-stripe">Submit</button>
									</div>
									
									
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

