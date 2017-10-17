<?php
$employee_id = '';
$employee_name = '';
$designation_id = '';
$disipline_id = [];
$email = '';
$finance = '';
$basic_client = '';
$tharapy = '';
$marketing = '';
$image_name = '';
$registration_form = '';
$quotation = '';
$electronic_link = '';
$receipt = '';
if ($employee_Arr != '') {
    $employee_id = $employee_Arr[0]->id;
    $employee_name = $employee_Arr[0]->employee_name;
    $designation_id = $employee_Arr[0]->designation_id;
    $disipline_id = $employee_Arr[0]->disipline_id;
    $email = $employee_Arr[0]->email;
    $finance = $employee_Arr[0]->finance;
    $basic_client = $employee_Arr[0]->basic_client_data;
    $tharapy = $employee_Arr[0]->therapy_notes;
    $marketing = $employee_Arr[0]->marketing;
    $image_name = $employee_Arr[0]->image_name;
    $registration_form = $employee_Arr[0]->registration_form;
    $quotation = $employee_Arr[0]->quotation;
    $electronic_link = $employee_Arr[0]->electronic_link;
    $receipt = $employee_Arr[0]->receipt;
}
?>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-offset-1 col-lg-6 col-xs-12">

                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption font-green">
                            <span class="caption-subject bold uppercase"><?php if ($employee_Arr != '') { ?> Update Employee  <?php } else { ?>Add New Employee <?php } ?></span>
                        </div>
                        <div class="qtarea">
                            <a href="<?= base_url() . 'Home/view_employee'; ?>">View  Employee</a>
                        </div>
                    </div>

                    <input type="hidden" id="employee_id" value="<?= $employee_id ?>">

                    <div class="portlet-body form ">
                        <div class="col-sm-12">
                            <div class="form-group form-md-line-input form-md-floating-label has-success">
                                <input value="<?= $employee_name ?>" type="text" class="form-control" id="employee_name">
                                <label for="form_control_1">Employee Name</label>
                            </div>
                            <div class="form-group form-md-line-input form-md-floating-label has-success">
                                <input value="<?= $employee_Arr == '' ? '' : $employee_Arr[0]->date_of_birth ?>" type="text" class="form-control datepicker" id="employee_date_of_birth">
                                <label for="form_control_1">Date Of Birth</label>
                            </div>
                            <div class="form-group form-md-line-input form-md-floating-label has-success">
                                <label for="disiplin_id" style="width:100%">Disipline Name</label>
                                <select id="disiplin_id"  style="width:100%" multiple>
                                    <?php
                                    if (count($disipline_Arr) > 0) {
                                        for ($i = 0; $i < count($disipline_Arr); $i++) {
                                            $select = '';
                                            if (!empty($disipline_id)) {
                                                $Arr = explode(',', $disipline_id);
                                                if (in_array($disipline_Arr[$i]->id, $Arr)) {
                                                    // if ($disipline_Arr[$i]->id == $disipline_id) {
                                                    $select = 'selected="selected"';
                                                }
                                            }
                                            ?><option <?= $select ?> value="<?= $disipline_Arr[$i]->id ?>"><?= $disipline_Arr[$i]->disipline_name; ?></option><?php
                                        }
                                    }
                                    ?>
                                </select>
                                <span class="small"><i>Press Ctrl For Multiple Selection</i></span>
                            </div>

                            <div class="form-group form-md-line-input form-md-floating-label has-success">
                                <label for="designation_id">Designation</label>
                                <select id="designation_id" class="form-control">
                                    <option value="">--Select--</option>
                                    <?php
                                    if (count($designation_Arr) > 0) {
                                        for ($i = 0; $i < count($designation_Arr); $i++) {
                                            $select = '';
                                            if ($designation_Arr[$i]->id == $designation_id) {
                                                $select = 'selected="selected"';
                                            }
                                            ?><option  <?= $select ?> value="<?= $designation_Arr[$i]->id ?>"><?= $designation_Arr[$i]->designation_name ?></option><?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group form-md-line-input form-md-floating-label has-success">
                                <label for="form_control_1">Work Email</label>
                                <input value="<?= $email ?>" type="text" class="form-control" id="email">
                            </div>

                            <div class="form-group form-md-line-input form-md-floating-label has-success">
                                <label for="form_control_1">Calendar  Color</label>
                                <input  type="color"  value="<?= $employee_Arr == '' ? '' : $employee_Arr[0]->color_id ?>" id="color_id" class="form-control">
                            </div>


                            <div class="form-group form-md-line-input form-md-floating-label has-success">
                                <label for="exampleInputFile1">Profile Picture</label>
                                <form method="post" id="profile_pic" name="profile_pic">
                                    <input prev_image="<?= $image_name ?>" type="file" form_name="profile_pic"   class="form-cont uppload_admin_profile_image"  file_name="" name="profile" accept="image/gif, image/jpeg, image/png" id="profile">
                                </form>
                                <small id="image_change_msg" style="color:red;display:none;"><b>They need to logout and again login after saving</b></small>
                                <p class="help-block"> </p>
                            </div>

                            <div class="form-group form-md-line-input form-md-floating-label has-success">
                                <label for="exampleInputFile1">Account Status</label>
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input has-success">
                                            <div class="md-radio">
                                                <input <?= $employee_Arr == '' ? '' : $employee_Arr[0]->archive == 0 ? 'checked' : ''; ?> type="radio" id="active" value="0" name="account_status" class="md-radiobtn">
                                                <label for="active">
                                                    <span class="inc">Active</span>
                                                    <span class="check"></span>
                                                    <span class="box child_gender"></span> Active </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input has-success">
                                            <div class="md-radio">
                                                <input <?= $employee_Arr == '' ? '' : $employee_Arr[0]->archive == 1 ? 'checked' : ''; ?>  type="radio" value="1" id="inactive" name="account_status" class="md-radiobtn">
                                                <label for="inactive">
                                                    <span class="inc">Inactive</span>
                                                    <span class="check"></span>
                                                    <span class="box child_gender"></span> Inactive </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-md-checkboxes form-md-line-input">
                                <label>Admin</label>
                                <div class="md-checkbox-inline">
                                    <div class="col-sm-6">
                                        <div class="md-checkbox"> 
                                            <input type="checkbox" <?= $finance == '0' ? 'checked' : ''; ?>  id="finance" class="md-check">
                                            <label for="finance">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Finance </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="md-checkbox">
                                            <input <?= $basic_client == '0' ? 'checked' : ''; ?> type="checkbox" id="basic_client_data" class="md-check">
                                            <label for="basic_client_data">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Basic Client Data</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-md-checkboxes form-md-line-input">
                                <label></label>
                                <div class="md-checkbox-inline">
                                    <div class="col-sm-6">
                                        <div class="md-checkbox">
                                            <input <?= $tharapy == '0' ? 'checked' : ''; ?> type="checkbox" id="therapy_notes" class="md-check">
                                            <label for="therapy_notes">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Therapy Notes </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="md-checkbox">
                                            <input <?= $marketing == '0' ? 'checked' : ''; ?> type="checkbox" id="marketing" class="md-check">
                                            <label for="marketing">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Marketing</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-md-checkboxes form-md-line-input">
                                <label></label>
                                <div class="md-checkbox-inline">
                                    <div class="col-sm-6">
                                        <div class="md-checkbox">
                                            <input <?= $registration_form == '0' ? 'checked' : ''; ?> type="checkbox" id="registration_form" class="md-check">
                                            <label for="registration_form">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Registration Form </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="md-checkbox">
                                            <input <?= $quotation == '0' ? 'checked' : ''; ?> type="checkbox" id="quotation" class="md-check">
                                            <label for="quotation">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Quotation</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-md-checkboxes form-md-line-input">
                                <label></label>
                                <div class="md-checkbox-inline">
                                    <div class="col-sm-6">
                                        <div class="md-checkbox">
                                            <input <?= $electronic_link == '0' ? 'checked' : ''; ?> type="checkbox" id="electronic_link" class="md-check">
                                            <label for="electronic_link">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Electronic Link </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="md-checkbox">
                                            <input <?= $receipt == '0' ? 'checked' : ''; ?> type="checkbox" id="receipt" class="md-check">
                                            <label for="receipt">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Receipt</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <hr/>
                            <div class="form-actions noborder form-group  form-md-line-input pull-right" style="padding-top: 0;">
                                <button type="button" id="employee_add" class="btn green-stripe">Submit</button>
                            </div>

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

