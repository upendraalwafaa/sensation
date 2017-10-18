<?php
$date = date('d-m-y');
?>
<style>
    #exampleModal{
        width: 41%;
        background: none;
        box-shadow: none;
        border: none;
    }

    .qut_null{
        width: 100%;
    }
    .invalid_validation{
        border: red solid 1px !important;
    }
    .modal.fade.in {
        width: auto !important;
        top: -3%;
    }
    .c_popcss{
        font-family:'Open Sans';
        font-size:14px;  
        color:#525252;
        padding: 8px 10px; 
        border: 1px solid #e4e4e4;
    }
    .session_heading{
        font-family: 'Open Sans';
        font-size: 14px;
        color: #ffffff;
        padding: 8px 10px;
        border: 1px solid #e4e4e4;
        background: #ccc;
        font-weight: bold;
    }
    .session_heading1{
        font-family: 'Open Sans';
        font-size: 14px;
        color: #525252;
        padding: 8px 8px;
        border: 1px solid #e4e4e4;
    }
    .date_details{
        margin-left: 1px;
        float: left;
        margin-bottom: 1px;
        width: 109px;
        text-align: center;
        padding: 5px;
        font-size: 13px;
        background: #cccccc!important;
        color: #525252;
    }
    .paiddiv_class{
        position:absolute;
        width:  200px;
        height:  200px;
        left: 0;
        right: 0;
        margin: 0 auto;
        color: #fff;
        bottom: 40%;
    }
    .image_classes{
        position:absolute;
        width: 200px;
        height:  200px;
    }
</style>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <input type="hidden" id="all_quotaion_first_id" services_id="">
            <input type="hidden" id="electronic_link" value="<?= $quotation_details == '' ? '' : $quotation_details[0]->electronic_link ?>">
            <?php if ($send_electronic == '') { ?>
                <input type="hidden" id="child_id" value="<?= $child_arr == '' ? '' : $child_arr[0]->child_id ?>">
                <?php
            } else {
                $electronic_link_id = '';
                if ($electronic_mail > 0) {
                    $electronic_link_id = $this->uri->segment(3);
                }
                ?><input type="hidden" id="electronic_link_id" value="<?= $electronic_link_id ?>"> <?php
            }
            ?>
            <input type="hidden" id="accept_status" value="<?= $quotation_details == '' ? '' : $quotation_details[0]->accept_status ?>">
            <input type="hidden" id="quotation_id" value="<?= $quotation_details == '' ? '' : $quotation_details[0]->quotation_id ?>">
            <?php
            if ($main_arr != '') {
                $receipt_num = $quotation_details[0]->receipt_no;
            } else {
                $receipt_num = trim(date('dmy') . mt_rand(10000000, 99999999));
            }
            ?>
            <input type="hidden" id="receipt_no" value="<?= $receipt_num; ?>">
            <div class=" col-lg-12 col-xs-12 col-sm-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption font-green"> 
                                <span class="caption-subject bold uppercase"> <?php
                                    if ($main_arr != '') {
                                        echo 'Update ';
                                    } else {
                                        echo 'Add New';
                                    }
                                    ?> Quotation</span>
                            </div>
                            <?php
                            if ($send_electronic == '') {
                                ?>
                                <div class="pull-right">
                                    <input type="search" class="form-control" id="student_name" value="<?= $child_arr == '' ? '' : $child_arr[0]->child_name ?>" placeholder="Enter Student Name">

                                    <div class="search_list_drops" class="dd" id="nestable_list_2">
                                        <ol class="dd-list"></ol>
                                    </div>


                                </div>
                                <div class="qtarea">
                                    <a href="<?= base_url() . 'Home/view_quotation'; ?>">View  Quotation</a>
                                </div>
                            <?php }if ($send_electronic == 'Yes') {
                                ?>	<div class="qtarea">
                                    <a href="<?= base_url() . 'Home/electronic_quotation_details'; ?>">View Electronic</a>
                                </div><?php }
                            ?>


                            <div class="clearfix"></div>  
                        </div>
                        <?php
                        if ($send_electronic == '') {
                            if ($main_arr == '') {
                                $block = 'none';
                            } else {
                                $block = 'block';
                            }
//                            echo '<pre>';
//                            print_r($child_arr);
//                            echo '</pre>';
                            ?>
                            <div class="panel panel-primary" style="display: <?= $block ?>;" id="child_details"> 
                                <div class="panel-heading" style="text-align: center;">  
                                    <h3 class="panel-title"><b id="child_name"><?= $child_arr == '' ? '' : $child_arr[0]->child_name ?></b></h3>  
                                </div> 
                                <div class="panel-body">
                                    <div class="row qut_null" >
                                        <div class="col-sm-6">
                                            <div class="col-sm-6">
                                                <label><b>Father Name : </b></label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label id="father_name"><?= $child_arr == '' ? '' : $child_arr[0]->father_name ?></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm-6">
                                                <label><b>Mother's Name : </b></label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label id="mother_name"><?= $child_arr == '' ? '' : $child_arr[0]->mother_name ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row qut_null" style="margin-top: 10px;">
                                        <div class="col-sm-6">
                                            <div class="col-sm-6">
                                                <label><b>Date Of Birth : </b></label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label id="date_of_birht"><?= $child_arr == '' ? '' : date('d/m/Y', strtotime($child_arr[0]->date_of_birth)) ?></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm-6">
                                                <label><b>Gender : </b></label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label id="gender"><?= $child_arr == '' ? '' : $child_arr[0]->gender ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row qut_null" style="margin-top: 10px;">
                                        <div class="col-sm-6">
                                            <div class="col-sm-6">
                                                <label><b>Mobile No : </b></label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label id="father_mobile_no"><?= $child_arr == '' ? '' : $child_arr[0]->father_mobile ?></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm-6">
                                                <label><b>Email Id : </b></label>
                                            </div>
                                            <div class="col-sm-6">
                                                <label id="father_email_id"><?= $child_arr == '' ? '' : $child_arr[0]->father_mobile ?></label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php
                        } else if ($send_electronic == 'Yes') {
                            ?>
                            <div class="panel panel-primary"  id="child_details"> 
                                <div class="panel-heading" style="text-align: center;">  
                                    <h3 class="panel-title"><b >Send Electronic Link</b></h3>  
                                </div> 
                                <div class="panel-body">
                                    <div class="row qut_null" >
                                        <div class="col-sm-6">
                                            <div class="col-sm-6">
                                                <label><b>Name Of Child&nbsp;<span style="color:red;">*</span> : </b></label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input id="ele_child_name" value="<?= $electronic_mail == '' ? '' : $electronic_mail[0]->child_name ?>" type="email"  class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm-6">
                                                <label><b>Date Of Birth&nbsp;<span style="color:red;">*</span> : </b></label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" id="ele_child_birth" value="<?= $electronic_mail == '' ? '' : $electronic_mail[0]->date_of_birth ?>"  class="form-control datepicker">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row qut_null" style="margin-top: 10px;">
                                        <div class="col-sm-6">
                                            <div class="col-sm-6">
                                                <?php
                                                $father_type = '';
                                                $mother_trpe = '';
                                                $guardians_type = '';
                                                if ($electronic_mail != '') {
                                                    $father_type = 'selected="selected"';
                                                    $mother_trpe = 'selected="selected"';
                                                    $guardians_type = 'selected="selected"';
                                                    $parent_val = $electronic_mail[0]->father_name;
                                                    if ($electronic_mail[0]->mother_name != '') {
                                                        $mother_trpe = 'selected="selected"';
                                                        $father_type = '';
                                                        $guardians_type = '';
                                                        $parent_val = $electronic_mail[0]->mother_name;
                                                    }
                                                    if ($electronic_mail[0]->guardians_name != '') {
                                                        $mother_trpe = '';
                                                        $father_type = '';
                                                        $guardians_type = 'selected="selected"';
                                                        $parent_val = $electronic_mail[0]->guardians_name;
                                                    }
                                                }
                                                ?>
                                                <select class="form-control" id="select_parent_type">
                                                    <option  value="">Select Parent &nbsp;<span style="color:red;">*</span></option>
                                                    <option <?= $father_type ?> value="Father">Father</option>
                                                    <option <?= $mother_trpe ?> value="Mother">Mother</option>
                                                    <option <?= $guardians_type ?> value="Guardians">Guardians</option>
                                                </select>

                                            </div>
                                            <div class="col-sm-6">

                                                <input type="text" id="electronic_name" value="<?= $electronic_mail == '' ? '' : $parent_val ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm-6">
                                                <label><b>Email&nbsp;<span style="color:red;">*</span> : </b></label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="email" id="electronic_email" value="<?= $electronic_mail == '' ? '' : $electronic_mail[0]->father_email ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row qut_null" style="margin-top: 10px;">
                                        <div class="col-sm-6">
                                            <div class="col-sm-6">
                                                <label><b>Phone&nbsp;<span style="color:red;">*</span> : </b></label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" id="electronic_phone" value="<?= $electronic_mail == '' ? '' : $electronic_mail[0]->father_phone ?>" maxlength="15" class="form-control only_number">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm-6">
                                                <label><b>Discipline&nbsp;<span style="color:red;">*</span>  : </b></label>
                                            </div>
                                            <div class="col-sm-6">
                                                <span class="multiselect-native-select">
                                                    <select class="mt-multiselect btn btn-info" multiple="multiple" data-width="100%">
                                                        <?php
                                                        for ($ds = 0; $ds < count($discipline_details); $ds++) {
                                                            $dsd = $discipline_details[$ds];
                                                            ?><option value="<?= $dsd->id ?>"><?= $dsd->disipline_name ?></option> <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <div class="btn-group" style="width: 100%;">
                                                        <button type="button" class="multiselect dropdown-toggle mt-multiselect btn btn-info" data-toggle="dropdown" title="None selected" aria-expanded="false" style="width: 100%; overflow: hidden; text-overflow: ellipsis;">
                                                            <span class="multiselect-selected-text">Select Multiple Discipline&nbsp;<span style="color:red;">*</span></span>
                                                            <b class="caret"></b>
                                                        </button>
                                                        <ul class="multiselect-container dropdown-menu">
                                                            <?php
                                                            $discipline_ar = [];
                                                            if ($electronic_mail != '') {
                                                                $discipline_ar = explode(',', $electronic_mail[0]->discipline_id);
                                                            }

                                                            for ($ds = 0; $ds < count($discipline_details); $ds++) {
                                                                $dsd = $discipline_details[$ds];
                                                                $checked = '';
                                                                if (in_array($dsd->id, $discipline_ar)) {
                                                                    $checked = 'checked="checked"';
                                                                }
                                                                ?>   <li><a tabindex="0"><label class="checkbox"><input <?= $checked ?> type="checkbox" class="discipline_name" value="<?= $dsd->id ?>"> <?= $dsd->disipline_name ?></label></a></li> <?php
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row qut_null" style="margin-top: 10px;">
                                        <div class="col-sm-6">
                                            <div class="col-sm-6">
                                                <br>
                                                <label><b>Session Type&nbsp;<span style="color:red;">*</span> : </b></label>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="col-sm-6">
                                                    <?php $checked = 'checked=""'; ?>
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="md-radio">
                                                            <input <?= $electronic_mail == '' ? '' : $electronic_mail[0]->session_type == 'Out Reach' ? $checked : '' ?> type="radio" value="Out Reach"   id="session_outreach" name="session_type" class="md-radiobtn">
                                                            <label class="session_type" for="session_outreach">
                                                                <span class="inc"><small>Out Reach</small></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Out Reach </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="md-radio">
                                                            <input <?= $electronic_mail == '' ? '' : $electronic_mail[0]->session_type == 'Center' ? $checked : '' ?> type="radio" value="Center"   id="session_center" name="session_type" class="md-radiobtn">
                                                            <label class="session_type" for="session_center">
                                                                <span class="inc">Center</span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Center </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm-6">
                                                <br>
                                                <label><b>Gender&nbsp;<span style="color:red;">*</span> : </b></label>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="col-sm-6">
                                                    <?php $checked = 'checked=""'; ?>
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="md-radio">
                                                            <input <?= $electronic_mail == '' ? '' : $electronic_mail[0]->gender == 'Male' ? $checked : '' ?>  type="radio" value="Male" id="elec_gender_male" name="elec_gender" class="md-radiobtn">
                                                            <label class="elec_gender" for="elec_gender_male">
                                                                <span class="inc">Male</span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Male </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="md-radio">
                                                            <input <?= $electronic_mail == '' ? '' : $electronic_mail[0]->gender == 'Female' ? $checked : '' ?> type="radio" value="Female" id="elec_gender_female" name="elec_gender" class="md-radiobtn">
                                                            <label class="elec_gender" for="elec_gender_female">
                                                                <span class="inc">Female</span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Female </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>                                        
                                    </div>

                                    <div class="row qut_null" style="margin-top: 10px;">
                                        <div class="col-sm-6">
                                            <div class="col-sm-6">
                                                <br>
                                                <label><b>School Attending&nbsp;<span style="color:red;">*</span> : </b></label>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="col-sm-6">
                                                    <?php $checked = 'checked=""'; ?>
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="md-radio">
                                                            <input <?= $electronic_mail == '' ? '' : $electronic_mail[0]->school_attinding == 'Yes' ? $checked : '' ?>  type="radio" value="Yes" id="school_attinding_yes" name="school_attinding" class="md-radiobtn">
                                                            <label class="school_attinding" for="school_attinding_yes">
                                                                <span class="inc">Yes</span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Yes </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="md-radio">
                                                            <input <?= $electronic_mail == '' ? '' : $electronic_mail[0]->school_attinding == 'No' ? $checked : '' ?> type="radio" value="No" id="school_attinding_no" name="school_attinding" class="md-radiobtn">
                                                            <label class="school_attinding" for="school_attinding_no">
                                                                <span class="inc">No</span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> No </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <br>
                                        <div class="col-sm-6">
                                            <div class="col-sm-6">
                                                <label><b>School Name&nbsp;<span>*</span> : </b></label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" id="school_name" value="<?= $electronic_mail == '' ? '' : $electronic_mail[0]->school_name ?>"  class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row qut_null" style="margin-top: 10px;">
                                        <div class="col-md-12">
                                            <textarea id="about_sensation" class="form-control autosizeme" rows="6" placeholder="How did they hear about Sensation Station..." data-autosize-on="true" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 80px;"><?= $electronic_mail == '' ? '' : $electronic_mail[0]->how_u_know ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="portlet-body form">


                            <div id="all_quotation_detail">
                                <?php
                                $addition_hide = [4, 5, 6, 7, 8, 9, 10];
//                                echo '<pre>';
//                                print_r($main_arr);
//                                echo '</pre>';
                                if ($main_arr != '') {
                                    for ($sd = 0; $sd < count($main_arr); $sd++) {
                                        $div_id = $sd;
                                        // $pl=    total services loop

                                        $pl = '';
                                        $adt = $main_arr[$sd]['additional'];
                                        if (!empty($main_arr[$sd]['services_details'])) {
                                            $pl = $main_arr[$sd]['services_details'];
                                        }
                                        $category_id = $adt->category_id;
                                        $all_descipline = $main_arr[$sd]['all_descipline'];
                                        ?>

                                        <div class="sl_no" div_id="<?= $div_id ?>" id="services_id_<?= $div_id ?>">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">SL No :  &nbsp;<?= $sd + 1 ?></h3>
                                                </div>

                                                <div class="panel-body">
                                                    <div class="row qut_null">
                                                        <div class="col-md-4">
                                                            <div class="form-group form-md-line-input form-md-floating-label has-success">
                                                                <label for="disipline_name">Category</label>              
                                                                <select id="quotation_category_<?= $div_id ?>" div_id="<?= $div_id ?>" class="form-control quotation_category edited">
                                                                    <option value="">--Select--</option>
                                                                    <?php
                                                                    for ($k = 0; $k < count($category_details); $k++) {
                                                                        $td = $category_details[$k];
                                                                        $select = '';
                                                                        if ($adt->category_id == $td->id) {
                                                                            $select = 'selected="selected"';
                                                                        }
                                                                        ?>  <option  <?= $select ?> value="<?= $category_details[$k]->id ?>"><?= $category_details[$k]->category_name ?></option><?php
                                                                    }
                                                                    ?>
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-md-line-input form-md-floating-label has-success">
                                                                <label for="service_details">Services</label>            
                                                                <div class="service_details" id="service_details_div_<?= $div_id ?>">
                                                                    <select id="service_sub_category_<?= $div_id ?>" div_id="<?= $div_id ?>" class="form-control service_sub_category">
                                                                        <option value="">--select--</option>
                                                                        <?php
                                                                        for ($k = 0; $k < count($sub_category_details); $k++) {
                                                                            $td = $sub_category_details[$k];
                                                                            if ($adt->category_id == $td->category_id) {
                                                                                $select = '';
                                                                                if ($adt->sub_category_id == $td->id) {
                                                                                    $select = 'selected="selected"';
                                                                                }
                                                                                ?>
                                                                                <option <?= $select ?> value="<?= $td->id ?>"><?= $td->sub_category_name ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        $advance_block_type = '';
                                                        $advance_block_staff = '';
                                                        if (in_array($category_id, $addition_hide)) {
                                                            $advance_block_type = 'none';
                                                            $advance_block_staff = 'block';
                                                        } else {
                                                            $advance_block_staff = 'none';
                                                        }
                                                        ?>
                                                        <div class="col-md-4" style="display: <?= $advance_block_type ?>" id="calendar_change_<?= $div_id ?>">
                                                            <div class="form-group form-md-line-input form-md-floating-label has-success">
                                                                <label for="staff_name">Type</label>            
                                                                <select div_id="<?= $div_id ?>" id="calendar_type_<?= $div_id ?>" class="form-control quo_calendar_type edited success_validation">
                                                                    <option  value="">--select--</option>
                                                                    <option <?= $adt->session_type == 'Single' ? 'selected="selected"' : '' ?>  value="Single">One time session</option>
                                                                    <option <?= $adt->session_type == 'Multiple' ? 'selected="selected"' : '' ?>  value="Multiple">Monthly billing</option>
                                                                    <option <?= $adt->session_type == 'Year' ? 'selected="selected"' : '' ?> value="Year">Year</option>
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-4" style="display: <?= $advance_block_staff ?>;" id="partucular_div_staff_<?= $div_id ?>">
                                                            <div  class="form-group form-md-line-input form-md-floating-label has-success">
                                                                <label for="staff_name">Staff List</label> 
                                                                <?php ?>
                                                                <select id="addtitional_staff_list_<?= $div_id ?>" div_id="<?= $div_id ?>" class="form-control">
                                                                    <option value="">--select--</option>
                                                                    <?php
                                                                    $staff_idtt = '';
                                                                    if ($all_staff_list != '') {
                                                                        $staff_id = '';
                                                                        $staff_idtt = $pl[0]['session'][0]->staff_id;
                                                                    }
                                                                    for ($all_s = 0; $all_s < count($all_staff_list); $all_s++) {
                                                                        $alsd = $all_staff_list[$all_s];
                                                                        $slect = '';
                                                                        if ($alsd->id == $staff_idtt) {
                                                                            $slect = 'selected="selected"';
                                                                        }
                                                                        ?>   <option <?= $slect ?> value="<?= $alsd->id ?>"><?= $alsd->employee_name ?></option><?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>  
                                                        </div>



                                                    </div>
                                                    <?php
                                                    $single_d = 'none';
                                                    $multiple = 'none';
                                                    if ($adt->session_type == 'Single') {
                                                        $single_d = '';
                                                    } else if ($adt->session_type == 'Multiple') {
                                                        $multiple = '';
                                                    }
                                                    if ($category_id == 4) {
                                                        $single_d = 'none';
                                                        $multiple = 'none';
                                                    }
                                                    ?>
                                                    <div class="row qut_null without_discipline_<?= $div_id ?>" style="">
                                                        <div id="services_time_type_d_<?= $div_id ?>">        </div>
                                                        <div class="col-md-4" id="carete_single_sec_<?= $div_id ?>" style="display: <?= $single_d ?>;">
                                                            <div class="form-group form-md-line-input form-md-floating-label has-success">  
                                                                <label for="disipline_name">Date</label> 
                                                                <input div_id="<?= $div_id ?>" class="form-control form-control-inline input datepicker" type="text" value="<?= $adt->start_date ?>" id="single_quo__date_<?= $div_id ?>">  
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4" id="with_quo_start_date_div_<?= $div_id ?>" style="display: <?= $multiple ?>">
                                                            <div class="form-group form-md-line-input form-md-floating-label has-success">    
                                                                <label for="disipline_name">Start Date</label> 
                                                                <input class="form-control form-control-inline input datepicker" type="text" value="<?= $adt->start_date ?>" id="with_quo_start_date_<?= $div_id ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4" id="with_quo_end_date_div_<?= $div_id ?>" style="display: <?= $multiple ?>">
                                                            <div class="form-group form-md-line-input form-md-floating-label has-success">
                                                                <label for="disipline_name">End Date</label> 
                                                                <input class="form-control form-control-inline input datepicker" type="text" value="<?= $adt->end_date ?>" id="with_quo_end_date_<?= $div_id ?>"> 
                                                            </div>
                                                        </div>
                                                        <?php
                                                        $additonoal_disp = 'none';

                                                        if ($category_id == 4 || $category_id == '5' || $category_id == '6' || $category_id == '7' || $category_id == '8' || $category_id == '9' || $category_id == '10') {
                                                            $additonoal_disp = 'block';
                                                            $disbled_adition = '';
                                                            if ($category_id == 5) {
                                                                $disbled_adition = 'disabled';
                                                            }
                                                            ?>
                                                            <div  class="col-md-4" id="additional_services_amtdiv_<?= $div_id ?>" style="display:<?= $additonoal_disp ?>"> 
                                                                <div class="form-group form-md-line-input form-md-floating-label has-success">
                                                                    <label for="disipline_name">Amount</label>
                                                                    <input <?= $disbled_adition ?> class="form-control form-control-inline input only_number additional_ser_price setpannel_price_<?= $div_id ?>" value="<?= $adt->total_price ?>" type="text"  id="additional_services_amt_<?= $div_id ?>">
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>

                                                        <?php
                                                        if (!in_array($category_id, $addition_hide) || $category_id == 4) {
                                                            if (!empty($pl)) {
                                                                ?>
                                                                <div class="col-md-4 without_discipline_<?= $div_id ?>" style="">
                                                                    <div class="form-group form-md-line-input form-md-floating-label has-success">
                                                                        <label for="disipline_name">Discipline</label>           
                                                                        <div id="disipline_list_<?= $div_id ?>">
                                                                            <?php
                                                                            for ($ser = 0; $ser < count($all_descipline); $ser++) {
                                                                                $tmp = $all_descipline[$ser];
                                                                                $chacked = '';
                                                                                $attr = '';
                                                                                $class_name = 'disiplin_checked';
                                                                                if ($category_id == 4) {
                                                                                    $panel_tmp_id = $div_id . '_' . $tmp->disipline;
                                                                                    $pannel_class = 'row_id_' . $panel_tmp_id . ' pannel_details_' . $div_id;

                                                                                    $class_name = 'set_report_cat_price ' . $pannel_class;
                                                                                    $attr = 'pannel_id="' . $panel_tmp_id . '"';
                                                                                }

                                                                                for ($serv = 0; $serv < count($pl); $serv++) {
                                                                                    $tmpp = $pl[$serv]['services'];
                                                                                    if ($tmpp->discipline_type_id == $tmp->disipline) {
                                                                                        $chacked = 'checked="checked"';
                                                                                    }
                                                                                }
                                                                                ?>
                                                                                <div class="col-sm-6"> 
                                                                                    <div class="md-checkbox">  
                                                                                        <input services_id="<?= $tmp->id ?>" fee="<?= $tmp->fees ?>"  <?= $chacked ?>  <?= $attr ?> value="<?= $tmp->disipline ?>" type="checkbox" id="disiplin_<?= $div_id . '_' . $ser ?>" div_id="<?= $div_id ?>" class="md-check <?= $class_name ?> disiplin_checkbox_<?= $div_id ?>">  
                                                                                        <label for="disiplin_<?= $div_id . '_' . $ser ?>">  
                                                                                            <span class="inc"><?= $tmp->disipline_name ?></span>    
                                                                                            <span class="check"></span>    
                                                                                            <span class="box"></span>     
                                                                                            <?= $tmp->disipline_name ?>                  
                                                                                        </label>            
                                                                                    </div>           
                                                                                </div>
                                                                            <?php } ?>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                    <?php
                                                    if (!in_array($category_id, $addition_hide)) {
                                                        if (!empty($pl)) {
                                                            ?>
                                                            <div id="discipline_panel_details_<?= $div_id ?>">
                                                                <?php
                                                                for ($ser = 0; $ser < count($pl); $ser++) {
                                                                    $tmp = $pl[$ser]['services'];
                                                                    $ses = $pl[$ser]['session'];

                                                                    $dipline_arr = $pl[$ser]['discipline_details'];
                                                                    $staff_list = $pl[$ser]['staff_list'];
                                                                    $panel_id = $div_id . '_' . $tmp->discipline_type_id;
                                                                    $set_attr = "div_id='$div_id' panel_id='$panel_id' descipline_id='$tmp->discipline_type_id'";
                                                                    if (count($ses) > 0) {
                                                                        ?>
                                                                        <div class="panel panel-primary pannel_details_<?= $div_id ?>" pannel_id="<?= $panel_id ?>" div_id="<?= $div_id ?>" id="pannel_id_<?= $panel_id ?>">
                                                                            <div class="panel-heading">
                                                                                <h3 class="panel-title">
                                                                                    <?php echo $dipline_arr[0]->disipline_name ?>
                                                                                    <div class="ot_right sub_slt new_ot">
                                                                                        <?php
                                                                                        $time = date('H:i', strtotime($ses[0]->start_time));
                                                                                        ?>
                                                                                        <select <?= $set_attr ?> class="form-control create_new_session" id="pannel_time_<?= $panel_id ?>">
                                                                                            <option>--Time--</option>
                                                                                            <?= print_time($time); ?>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="ot_right sub_slt new_ot">
                                                                                        <span class="multiselect-native-select">
                                                                                            <select class="mt-multiselect btn btn-default" multiple="multiple" data-width="100%">            </select>           
                                                                                            <div class="btn-group" style="width: 100%;">
                                                                                                <button type="button" class="multiselect dropdown-toggle mt-multiselect btn btn-default days-drop-new" data-toggle="dropdown" title="None selected" style="width: 100%; overflow: hidden; text-overflow: ellipsis;" aria-expanded="false">   
                                                                                                    <span class="multiselect-selected-text create_new_session">--Days--</span>   
                                                                                                </button>            
                                                                                                <ul class="multiselect-container dropdown-menu">
                                                                                                    <?php Get_weekdays_dropdown($ses, $set_attr, $panel_id); ?>


                                                                                                </ul>
                                                                                            </div>
                                                                                        </span>
                                                                                    </div>
                                                                                    <div class="ot_right sub_slt new_ot">
                                                                                        <select <?= $set_attr ?>  id="pannel_staff_name_<?= $panel_id ?>" class="create_new_session form-control">
                                                                                            <option>--Staff--</option>
                                                                                            <?php
                                                                                            for ($staff = 0; $staff < count($staff_list); $staff++) {
                                                                                                $select = '';

                                                                                                $tdm = $staff_list[$staff];

                                                                                                if ($ses[0]->staff_id == $tdm->id) {
                                                                                                    $select = 'selected="selected"';
                                                                                                }
                                                                                                ?><option <?= $select ?>  value="<?= $tdm->id ?>"><?= $tdm->employee_name ?></option><?php
                                                                                            }
                                                                                            ?>

                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="ot_right sub_slt new_ot">
                                                                                        <select <?= $set_attr ?> id="pannel_discipline_name_<?= $panel_id ?>" class="form-control create_new_session">
                                                                                            <option>--Type--</option>
                                                                                            <?php
                                                                                            for ($di = 0; $di < count($dipline_arr); $di++) {
                                                                                                $select = '';
                                                                                                $tdd = $dipline_arr[$di];
                                                                                                if ($ses[0]->service_id == $tdd->id) {
                                                                                                    $select = 'selected="selected"';
                                                                                                }
                                                                                                $title = 'Price : AED &nbsp; ' . $tdd->fees;
                                                                                                $option = $tdd->disipline_name . '&nbsp;' . $tdd->services_time . '&nbsp;' . $tdd->services_time_type;
                                                                                                $value = $tdd->id . '~' . $tdd->disipline_name . '~' . $tdd->services_time . '~' . $tdd->services_time_type . '~' . $tdd->description . '~' . $tdd->disipline_id;
                                                                                                ?> <option <?= $select ?>  title="<?= $title ?>" value="<?= $value ?>"><?= $option ?></option><?php
                                                                                            }
                                                                                            ?>

                                                                                        </select>
                                                                                    </div>
                                                                                </h3>
                                                                            </div>
                                                                            <div class="panel-body" id="body_content_<?= $panel_id ?>">
                                                                                <div class="row ">
                                                                                    <div class="col-md-2">
                                                                                        <h5 class="quotation_headeing">Discipline Type</h5>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <h5 class="quotation_headeing">Staff Name</h5>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <h5 class="quotation_headeing">Date</h5>
                                                                                    </div>
                                                                                    <div class="col-md-4" style="">
                                                                                        <div class="col-sm-6">
                                                                                            <h5 class="quotation_headeing">Start Time</h5>
                                                                                        </div>
                                                                                        <div class="col-sm-6">
                                                                                            <h5 class="quotation_headeing">End Time</h5>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <h5 class="quotation_headeing">Price</h5>
                                                                                    </div>
                                                                                </div>
                                                                                <?php
                                                                                for ($se = 0; $se < count($ses); $se++) {
                                                                                    $row_id_cond = $panel_id . '_' . $se . '_' . '0';
                                                                                    $tmp_de = $ses[$se];
                                                                                    ?>
                                                                                    <div class="row session_quo_cls row_id_<?= $panel_id ?>" div_id="<?= $div_id ?>" pannel_id="<?= $panel_id ?>" row_id="<?= $row_id_cond ?>" id="row_<?= $row_id_cond ?>">
                                                                                        <div class="col-md-2">
                                                                                            <!--if this drop down manual change then need to this service_id change (because its coming form services_details table and there is multiple discipline)-->
                                                                                            <select class="form-control discipline_type edited" id="services_displine_id_<?= $row_id_cond ?>">
                                                                                                <option value="">--Select--</option>
                                                                                                <?php
                                                                                                for ($di = 0; $di < count($dipline_arr); $di++) {
                                                                                                    $select = '';
                                                                                                    $tdd = $dipline_arr[$di];
                                                                                                    if ($tmp_de->service_id == $tdd->id) {
                                                                                                        $select = 'selected="selected"';
                                                                                                    }
                                                                                                    $title = 'Price : AED &nbsp; ' . $tdd->fees;
                                                                                                    $option = $tdd->disipline_name . '&nbsp;' . $tdd->services_time . '&nbsp;' . $tdd->services_time_type;
                                                                                                    $value = $tdd->id . '~' . $tdd->disipline_name . '~' . $tdd->services_time . '~' . $tdd->services_time_type . '~' . $tdd->description . '~' . $tdd->disipline_id;
                                                                                                    ?> <option <?= $select ?>  title="<?= $title ?>" value="<?= $value ?>"><?= $option ?></option><?php
                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <select class="form-control" id="staff_id_<?= $row_id_cond ?>">
                                                                                                <option value="">--Select--</option>
                                                                                                <?php
                                                                                                for ($staff = 0; $staff < count($staff_list); $staff++) {
                                                                                                    $select = '';
                                                                                                    $tdm = $staff_list[$staff];
                                                                                                    if ($tmp_de->staff_id == $tdm->id) {
                                                                                                        $select = 'selected="selected"';
                                                                                                    }
                                                                                                    ?><option <?= $select ?>  value="<?= $tdm->id ?>"><?= $tdm->employee_name ?></option><?php
                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-2"> 
                                                                                            <input id="session_date_<?= $row_id_cond ?>" class="datepicker form-control form-control-inline input quotation_calender  edited" type="text" value="<?= $tmp_de->session_date ?>">
                                                                                        </div>
                                                                                        <div class="col-md-4" style="">
                                                                                            <div class="col-sm-6">
                                                                                                <select class="form-control edited" id="start_time_<?= $row_id_cond ?>">
                                                                                                    <?php
                                                                                                    $rowtime = date('H:i', strtotime($tmp_de->start_time));
                                                                                                    echo print_time($rowtime);
                                                                                                    ?>

                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="col-sm-6">
                                                                                                <select class="form-control edited" id="end_time_<?= $row_id_cond ?>">

                                                                                                    <?php
                                                                                                    $rowtime = date('H:i', strtotime($tmp_de->end_time));
                                                                                                    echo print_time($rowtime);
                                                                                                    ?>

                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <h5><b><span class="quotation_price setpannel_price_<?= $div_id ?>" id="services_fee_<?= $row_id_cond ?>"><?= $tmp_de->services_fee ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                                    <span   remove_id="row_<?= $row_id_cond ?>" class="fa fa-remove remove_session btn btn-xs red">
                                                                                                    </span></b>
                                                                                            </h5>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php } ?>

                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    <?php ?>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                    }
                                }
                                ?>
                            </div>

                            <div class="row pull-right">
                                <div class="col-md-3"> 
                                    <a class="btn green" id="add_services">Add Services
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <br><br>
                            <div class="portlet light form-fit bordered total-div">
                                <div class="row col-sm-offset-8">
                                    <div class=" col-sm-6">
                                        <label class="caption-subject  bold uppercase">Sub Total</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="caption-subject  bold uppercase">AED&nbsp;<span id="sub_total"><?= $quotation_details == '' ? 0 : $quotation_details[0]->sub_total ?></span></label>
                                    </div>
                                </div>
                                <div class="row col-sm-offset-8">
                                    <div class=" col-sm-6">
                                        <label class="caption-subject  bold uppercase">Deduction</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input value="<?= $quotation_details == '' ? 0 : $quotation_details[0]->discount ?>" type="text" class="form-control" id="session_discount">
                                    </div>
                                </div>
                                <div class="row col-sm-offset-8">
                                    <div class=" col-sm-6">
                                        <label class="caption-subject  bold uppercase">Total</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="caption-subject  bold uppercase">AED&nbsp;<span id="total"><?= $quotation_details == '' ? 0 : $quotation_details[0]->total ?></span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"> 
                                    <div class="form-group form-md-line-input form-md-floating-label has-success" >

                                        <label for="child_name">Note</label>

                                        <textarea class="form-control form-control-inline input" id="note"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-actions noborder" id="quotation_btn" >
                                        <button type="button"  id="get_confirm_popup" class="pull-right btn  mt-ladda-btn ladda-button mt-progress-demo green-stripe " data-style="expand-right">
                                            <span class="ladda-label">Submit</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="confirm_details" style="display: none;">
            <table cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td>

                    </td>
                    <td style="text-align:right">

                    </td>
                </tr>
            </table>
            <table  width="100%" style="  margin-top:10px;font-size:13px;">
                <tr>
                    <td style="text-align:center">
                        <img src="<?= base_url() ?>/files/images/logo-big.png" style="margin-top:10px;"> 
                        <br />
                        <span style="font-family:Arial, Helvetica, sans-serif; font-size:20px; text-align:center; padding:15px 0px 0px; margin:0 auto;"><strong>QUOTATION</strong></span></td>
                </tr>
            </table>
            <table width="100%" border="0" align="left" cellpadding="3" cellspacing="0" dir="ltr" style="font-size:11px;margin-top:15px;padding:3px">
                <tr>
                    <td width="40%" rowspan="9" align="left" valign="top" style="border-top:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000"> Sensation Station<br>
                        Ibn Batutta Gate, Office Building<br>
                        Ground Floor, No. G-03 and G-05<br>
                        PO Box 29264<br>
                        Dubai, UAE<br>
                        T: +9714 – 2776769<br>
                        <a href="mailto:info@sensationstation.ae" style="color:#000; text-decoration:none;" >info@sensationstation.ae</a> <br>
                        <a href="http://www.sensationstation.ae" style="color:#000; text-decoration:none;" >www.sensationstation.ae</a></td>
                    <td width="30%" align="left" valign="top" bgcolor="#f2f2f2" style="border-top:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Quotation No : </td>
                    <td width="30%" align="left" valign="top" style="border-top:1px solid #000; border-bottom:1px solid #000;border-right:1px solid #000;"><?= $receipt_num ?> </td>
                </tr>
                <tr>
                    <td align="left" valign="top" bgcolor="#f2f2f2" style="border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Quotation Date:</td>
                    <td align="left" valign="top" style=" border-bottom:1px solid #000;border-right:1px solid #000;"><?= date('d-m-Y') ?></td>
                </tr>
                <tr>
                    <td align="left" valign="top" bgcolor="#f2f2f2" style="border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Child Name: </td>
                    <td align="left" valign="top" style=" border-bottom:1px solid #000;border-right:1px solid #000;" id="c_child_name"></td>
                </tr>
                <tr>
                    <td align="left" valign="top" bgcolor="#f2f2f2" style="border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Parent Name: </td>
                    <td align="left" valign="top" style=" border-bottom:1px solid #000;border-right:1px solid #000;" id="c_parent_name"></td>
                </tr>

                <tr>
                    <td align="left" valign="top" bgcolor="#f2f2f2" style="border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Phone: </td>
                    <td align="left" valign="top" style=" border-bottom:1px solid #000;border-right:1px solid #000;" id="c_mobile_number"></td>
                </tr>
                <tr>
                    <td align="left" valign="top" bgcolor="#f2f2f2" style="border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Email: </td>
                    <td align="left" valign="top" style=" border-bottom:1px solid #000;border-right:1px solid #000;"><a href="mailto:naomi.diria@jumeirah.com" style="color:#000; text-decoration:none;" id="c_email_id"></a></td>
                </tr>
                 <tr>
                    <td align="left" valign="top" bgcolor="#f2f2f2" style="border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Therapy Name: </td>
                    <td align="left" valign="top" style=" border-bottom:1px solid #000;border-right:1px solid #000;" id="c_therapy_name"></td>
                </tr>
                <tr>
                    <td align="left" valign="top" bgcolor="#f2f2f2" style="border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">Genrated By : </td>
                    <td align="left" valign="top" style=" border-bottom:1px solid #000;border-right:1px solid #000;" id="genrated_by"></td>
                </tr>
            </table>

            <table width="100%" border="0" align="left" cellpadding="3" cellspacing="0" dir="ltr" style="font-size:11px;margin-top:15px;padding:3px">
                <tr>
                    <th width="40.9%"   align="center" valign="middle" bgcolor="#f2f2f2" style="border-top:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000">Description of Service</th>
                    <th width="20%" align="center" valign="middle" bgcolor="#f2f2f2" style="border-top:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;"> No of Sessions</th>
                    <th width="20%" align="center" valign="middle" bgcolor="#f2f2f2" style="border-top:1px solid #000; border-bottom:1px solid #000;border-right:1px solid #000;">Cost per <br />
                        Session in AED </th>
                    <th width="20%" align="center" valign="middle" bgcolor="#f2f2f2" style="border-top:1px solid #000; border-bottom:1px solid #000;border-right:1px solid #000;"> Sub-Total / <br />
                        Amount in AED </th>
                </tr>
            </table>    
            <table id="csession_details" width="100%" border="0" align="left" cellpadding="3" cellspacing="0" dir="ltr" style="font-size:11px;margin-top:15px;padding:3px;     margin-top: 0;">
        <!--                <tr class="dasdasdasda">
                            <td  width="40.999%"  align="left" valign="top" style="border-left:1px solid #000;border-bottom:1px solid #000">Category Name</td>
                            <td  width="20.111%"  align="right" valign="top" style=" border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;"></td>
                            <td width="20%" align="right" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;"></td>
                            <td align="right" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;">Total Price</td>
                        </tr>-->

            </table>

            <table width="100%" border="0" align="left" cellpadding="3" cellspacing="0" dir="ltr" style="font-size:11px;margin-top:15px;padding:3px;     margin-top: 0;">
                <tr>
                    <td  width="40.999%"  align="left" valign="top" style=" border-left:1px solid #000;border-bottom:1px solid #000">&nbsp;</td>
                    <td width="20.111%"  align="left" valign="top" style=" border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;</td>
                    <td width="20%" align="left" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;</td>
                    <td  align="left" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;</td>
                </tr>
                <tr>
                    <td   align="left" valign="top" style=" border-left:1px solid #000;border-bottom:1px solid #000">&nbsp;</td>
                    <td align="left" valign="top" style=" border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;</td>
                    <td align="left" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;</td>
                    <td align="left" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;</td>
                </tr>

                <tr>
                    <td   align="left" valign="top" style=" border-left:1px solid #000;border-bottom:1px solid #000">&nbsp;</td>
                    <td align="left" valign="top" style=" border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;</td>
                    <td align="left" valign="top" style=" border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;</td>
                    <td align="left" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;</td>
                </tr>
                <tr>
                    <td   align="left" valign="top" style=" border-left:1px solid #000;border-bottom:1px solid #000">&nbsp;</td>
                    <td align="left" valign="top" style=" border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;</td>
                    <td align="left" valign="top" style=" border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;</td>
                    <td align="left" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;">&nbsp;</td>
                </tr>
                <tr>
                    <td rowspan="4"   align="left" valign="top" style=" border-left:1px solid #000;border-bottom:1px solid #000">Note: <div id="c_notes"></div> </td>
                    <td colspan="2" align="right" valign="top" bgcolor="#f2f2f2" style=" border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;"><strong>Sub-Total in AED</strong></td>
                    <td align="right" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;" id="c_sub_total"> </td>
                </tr>
                <tr id="c_discount_tr">
                    <td colspan="2" align="right" valign="top" bgcolor="#f2f2f2" style=" border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;"><strong> &nbsp; Discount in AED</strong></td>
                    <td align="right" valign="top" style="  border-bottom:1px solid #000;border-right:1px solid #000;" id="c_discount"> </td>
                </tr>
                <tr>
                    <td colspan="2" align="right" valign="top" bgcolor="#f2f2f2" style=" border-left:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;"><strong>TOTAL</strong></td>
                    <td align="right" valign="top" style=" border-bottom:1px solid #000;border-right:1px solid #000;"><strong id="c_total"> </strong></td>
                </tr>
            </table>


            <table width="100%" border="0" align="left" cellpadding="3" cellspacing="0" dir="ltr" style="font-size:11px;margin-top:15px; padding:3px">
                <tr>
                    <th align="left" valign="middle" bgcolor="#f2f2f2" style=" border-left:1px solid #000;border-right:1px solid #000; border-top:1px solid #000;" >Schedule </th>
                </tr>
                <tr>
                    <td align="left" valign="middle" style="border:1px solid #000;" id="all_session_date_list">
                        <?php
                        // echo date('d M', strtotime('12-10-2013')) . '&nbsp; 12:00 - 13:00 ,&nbsp;&nbsp;  ';
                        ?>

                    </td>
                </tr>
            </table>


            <table width="100%" border="0" align="left" cellpadding="3" cellspacing="0" dir="ltr" style="font-size:11px;margin-top:15px; padding:3px">
                <tr>
                    <th colspan="4" align="center" valign="middle" bgcolor="#f2f2f2"
                        style="
                        border-top:1px solid #000;
                        border-right:1px solid #000;
                        border-bottom:1px solid #000;
                        border-left:1px solid #000;" >Payment Options</th>
                </tr>
                <tr>
                    <td width="15%" align="left" valign="top" bgcolor="#f2f2f2" style="
                        border-left:1px solid #000;

                        border-bottom:1px solid #000; 
                        " >Cash</td>
                    <td colspan="2" align="left" valign="top" style="    border-left:1px solid #000;

                        border-bottom:1px solid #000;" >Payable to the  Reception at Sensation Station</td>
                    <td width="25%" rowspan="8" align="left" valign="top" style="    border-left:1px solid #000;
                        border-right:1px solid #000; 
                        border-bottom:1px solid #000; ">

                        <strong style="color:#F00;" >CANCELLATION POLICY:</strong><br />
                        Prior notice must be given for cancellation. Please see below the charges:
                        <ul>
                            <li>More than 24 hours prior notice    no charge</li>
                            <li>Less than 24 hours prior notice    50%</li>
                            <li>No Show 100%</li>
                        </ul>
                    </td>

                </tr>
                <tr>
                    <td align="left" valign="top" bgcolor="#f2f2f2" style="    border-left:1px solid #000;

                        border-bottom:1px solid #000;" >Cheque</td>
                    <td colspan="2" align="left" valign="top"  style="    border-left:1px solid #000;

                        border-bottom:1px solid #000;" >Issued in the name  of: <strong><em>Sensation Station Center</em></strong></td>
                </tr>
                <tr>
                    <td align="left" valign="top" bgcolor="#f2f2f2" style="    border-left:1px solid #000;

                        border-bottom:1px solid #000;" >Credit / Debit Card</td>
                    <td colspan="2" align="left" valign="top" style="    border-left:1px solid #000;

                        border-bottom:1px solid #000;">Payable to the  Reception at Sensation Station.</td>
                </tr>
                <tr>
                    <td rowspan="5" align="left" valign="top" bgcolor="#f2f2f2" style="    border-left:1px solid #000;

                        border-bottom:1px solid #000;" >Bank Transfer</td>
                    <td width="10%" align="left" valign="top" bgcolor="#f2f2f2" style="    border-left:1px solid #000;

                        border-bottom:1px solid #000;">A/C Name</td>
                    <td width="50%"   align="left" valign="top"  style="    border-left:1px solid #000;

                        border-bottom:1px solid #000;"><strong><em>Sensation Station Center</em></strong></td>
                </tr>
                <tr>
                    <td align="left" valign="top" bgcolor="#f2f2f2" style="    border-left:1px solid #000;

                        border-bottom:1px solid #000;">A/C No.</td>
                    <td align="left" valign="top"  style="    border-left:1px solid #000;

                        border-bottom:1px solid #000;">00110552660012</td>
                </tr>
                <tr>
                    <td align="left" valign="top" bgcolor="#f2f2f2"  style="    border-left:1px solid #000;

                        border-bottom:1px solid #000;">IBAN</td>
                    <td align="left" valign="top"  style="    border-left:1px solid #000;

                        border-bottom:1px solid #000;">AE970520000110552660012</td>
                </tr>
                <tr>
                    <td align="left" valign="top" bgcolor="#f2f2f2"  style="    border-left:1px solid #000;

                        border-bottom:1px solid #000;">SWIFT</td>
                    <td align="left" valign="top"  style="    border-left:1px solid #000;

                        border-bottom:1px solid #000;">NISLAEAD</td>
                </tr>
                <tr>
                    <td align="left" valign="top" bgcolor="#f2f2f2"  style="    border-left:1px solid #000;

                        border-bottom:1px solid #000;" >Address</td>
                    <td align="left" valign="top"  style="    border-left:1px solid #000;

                        border-bottom:1px solid #000;">Noor Bank, Zayed Rd, Dubai, UAE</td>
                </tr>
            </table>


            <h3 style="font-size:16px; text-align:center; font-family:Arial, Helvetica, sans-serif; color:#000; padding:5px 0; font-style:italic; "> 
                “One Child At A Time”</h3> 
            <div class="row" style="text-align: center;margin-top: 10px;">
                <button type="button" id="previous" class="btn  mt-ladda-btn ladda-button mt-progress-demo green-stripe " data-style="expand-right">Previous</button>
                <button type="button" id="submit_btn" class="btn  mt-ladda-btn ladda-button mt-progress-demo green-stripe " data-style="expand-right">Submit</button>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
</div>
<div  id="quotation_time_details" class="modal fade" tabindex="-1" data-width="1100px">
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
</div>
<?php

function Get_weekdays_dropdown($days_select, $set_attr, $panel_id) {
    $weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    for ($i = 0; $i < count($weekday); $i++) {
        $checked = '';
        for ($k = 0; $k < count($days_select); $k++) {
            $tp = $days_select[$k];
            $ses_dte = $tp->session_date;
            $dayname = date('l', strtotime($ses_dte));
            if ($dayname == $weekday[$i]) {
                $checked = 'checked="checked"';
            }
        }
        ?>

        <li>
            <a tabindex="0">
                <label class="checkbox">
                    <input <?= $checked ?> panel_id="<?= $panel_id ?>" class="days_name_<?= $panel_id ?> days_validaye" <?= $set_attr ?> type="checkbox" value="<?= $weekday[$i] ?>">
                    <?= $weekday[$i] ?></label>
            </a>
        </li>
        <?php
    }
}
?>