<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class=" col-lg-12 col-xs-12 col-sm-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet light">
                        <div class="portlet-title">
                            <input type="hidden" value="<?= $quotation_details == '' ? '' : $quotation_details[0]->quotation_id ?>" id="update_id">
                            <input type="hidden" value="<?= $quotation_details == '' ? '' : $quotation_details[0]->student_id ?>" id="child_id">
                            <input type="hidden" value="<?= $quotation_details == '' ? '' : $quotation_details[0]->receipt_no ?>" id="receipt_no">
                            <div class="caption font-green">
                                <span class="caption-subject bold uppercase"> Outside student instead of Add</span>
                            </div>
                            <div class="qtarea">
                                <a href="<?= base_url() ?>Home/view_outsidestudent">View Student</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel panel-primary" id="child_details">
                            <div class="panel-heading" style="text-align: center;">
                                <h3 class="panel-title"><b>Personal Details</b></h3>
                            </div>
                            <div class="panel-body">
                                <div class="row qut_null">
                                    <div class="col-sm-6">
                                        <div class="col-sm-6">
                                            <label><b>Name Of Child&nbsp;<span style="color:red;">*</span> : </b></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input id="child_name" value="<?= $child_details == '' ? '' : $child_details[0]->child_name ?>" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-6">
                                            <label><b>Date Of Birth&nbsp;<span style="color:red;">*</span> : </b></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text"  id="child_birth" value="<?= $child_details == '' ? '' : $child_details[0]->date_of_birth ?>" class="form-control datepicker">
                                        </div>
                                    </div>
                                </div>
                                <div class="row qut_null" style="margin-top: 10px;">
                                    <div class="col-sm-6">
                                        <div class="col-sm-6">
                                            <?php
                                            $selected_f = '';
                                            $selected_m = '';
                                            $mother_fathe_name_val = '';
                                            if ($parent_details != '') {
                                                $selected_f = 'selected="selected"';
                                                $mother_fathe_name_val = $parent_details[0]->father_name;
                                                if ($parent_details[0]->father_name == '') {
                                                    $selected_m = 'selected="selected"';
                                                    $mother_fathe_name_val = $parent_details[0]->mother_name;
                                                }
                                            }
                                            ?>
                                            <select class="form-control" id="parent_type">
                                                <option  value="">Select Parent </option>
                                                <option <?= $selected_f ?> value="Father">Father</option>
                                                <option <?= $selected_m ?> value="Mother">Mother</option>
                                            </select>

                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" id="parent_name" value="<?= $mother_fathe_name_val ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-6">
                                            <label><b>Email&nbsp;<span style="color:red;">*</span> : </b></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="email" id="email" value="<?= $parent_details == '' ? '' : $parent_details[0]->father_personal_email ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row qut_null" style="margin-top: 10px;">
                                    <div class="col-sm-6">
                                        <div class="col-sm-6">
                                            <label><b>Phone&nbsp;<span style="color:red;">*</span> : </b></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" id="phone" value="<?= $parent_details == '' ? '' : $parent_details[0]->father_mobile ?>" maxlength="15" class="form-control only_number">
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
                                                    $pre_discpline = [];
                                                    if ($child_details != '') {
                                                        $pre_discpline = explode(',', $child_details[0]->discipline_id);
                                                    }
                                                    for ($i = 0; $i < count($discipline_details); $i++) {
                                                        $p = $discipline_details[$i];
                                                        ?>
                                                        <option value="<?= $p->id ?>"><?= $p->disipline_name ?></option> 
                                                    <?php } ?>
                                                </select>
                                                <div class="btn-group" style="width: 100%;">
                                                    <button type="button" class="multiselect dropdown-toggle mt-multiselect btn btn-info" data-toggle="dropdown" title="None selected" aria-expanded="false" style="width: 100%; overflow: hidden; text-overflow: ellipsis;">
                                                        <span class="multiselect-selected-text">Select Multiple Discipline&nbsp;<span style="color:red;">*</span></span>
                                                        <b class="caret"></b>
                                                    </button>
                                                    <ul class="multiselect-container dropdown-menu">
                                                        <?php
                                                        for ($i = 0; $i < count($discipline_details); $i++) {
                                                            $p = $discipline_details[$i];
                                                            $chacked = '';
                                                            if (in_array($p->id, $pre_discpline)) {
                                                                $chacked = 'checked';
                                                            }
                                                            ?>
                                                            <li>
                                                                <a tabindex="0">
                                                                    <label class="checkbox">
                                                                        <input <?= $chacked ?> type="checkbox" class="discipline_name" value="<?= $p->id ?>"> <?= $p->disipline_name ?></label>
                                                                </a>
                                                            </li>
                                                        <?php } ?>
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
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="md-radio">
                                                        <input <?= $child_details == '' ? '' : $child_details[0]->session_type == 'Out Reach' ? 'checked' : '' ?> type="radio" value="Out Reach" id="enr_session_outreach" name="session_type" class="md-radiobtn">
                                                        <label class="session_type" for="enr_session_outreach">
                                                            <span class="inc"><small>Out Reach</small></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Out Reach </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="md-radio">
                                                        <input type="radio" <?= $child_details == '' ? '' : $child_details[0]->session_type == 'Center' ? 'checked' : '' ?> value="Center" id="enr_session_center" name="session_type" class="md-radiobtn">
                                                        <label class="session_type" for="enr_session_center">
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
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="md-radio">
                                                        <input <?= $child_details == '' ? '' : $child_details[0]->gender == 'Male' ? 'checked' : '' ?> type="radio" value="Male" id="en_gender_male" name="gender" class="md-radiobtn">
                                                        <label class="elec_gender" for="en_gender_male">
                                                            <span class="inc">Male</span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Male </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="md-radio">
                                                        <input type="radio" <?= $child_details == '' ? '' : $child_details[0]->gender == 'Female' ? 'checked' : '' ?> value="Female" id="en_gender_female" name="gender" class="md-radiobtn">
                                                        <label class="elec_gender" for="en_gender_female">
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
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="md-radio">
                                                        <input <?= $child_details == '' ? '' : $child_details[0]->school_attinding == 'Yes' ? 'checked' : '' ?> type="radio" value="Yes" id="enr_school_attinding_yes" name="school_attinding" class="md-radiobtn">
                                                        <label class="school_attinding" for="enr_school_attinding_yes">
                                                            <span class="inc">Yes</span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Yes </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="md-radio">
                                                        <input type="radio" <?= $child_details == '' ? '' : $child_details[0]->school_attinding == 'No' ? 'checked' : '' ?> value="No" id="enr_school_attinding_no" name="school_attinding" class="md-radiobtn">
                                                        <label class="school_attinding"  for="enr_school_attinding_no">
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
                                            <label><b>School Name&nbsp;<span style="">*</span> : </b></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text"  id="school_name" value="<?= $child_details == '' ? '' : $child_details[0]->school_name ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row qut_null" style="margin-top: 10px;">
                                    <div class="col-md-12">
                                        <textarea id="about_sensation" class="form-control autosizeme" rows="6" placeholder="How did they hear about Sensation Station..." data-autosize-on="true" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 80px;"><?= $quotation_details == '' ? '' : $quotation_details[0]->note ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div id="total_services_div">



                                <?php
                                $ses = 0;
                              
                                if ($quotation_descipline != '') {
                            $qdespline = $quotation_descipline['descipline'];
                            $category = $quotation_descipline['category'];
                            $subcategory = $quotation_descipline['subcategory'];
                         $emp_details = $quotation_descipline['emp_details'];
                                    for ($ses = 0; $ses < count($qdespline); $ses++) {
                                        $md = $qdespline[$ses];
                                        $attr = 'div_id="' . $ses . '" ';
                                        $div_id = $ses;
                                        $sl = $ses + 1;
                                        ?>
                                        <div id="each_service_div_<?= $div_id ?>"  <?= $attr ?> class="each_service_div">

                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <?php if ($div_id != 0) {
                                                        ?> <span style="cursor:pointer;" <?= $attr ?> class="fa fa-remove pull-right remove_services_div"></span>
                                                    <?php } ?>
                                                    <h3 class="panel-title">SL No :  &nbsp; <?= $sl ?> </h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row qut_null">
                                                        <div class="col-md-4">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <label for="disipline_name">Category</label>

                                                                <select <?= $attr ?> id="category_change_<?= $div_id ?>" class="form-control category_change">
                                                                    <option value="">--select--</option>
                                                                    <?php
                                                                    for ($cat = 0; $cat < count($category); $cat++) {
                                                                        $d = $category[$cat];
                                                                        $selected = '';
                                                                        if ($md->category_id == $d->id) {
                                                                            $selected = 'selected="selected"';
                                                                        }
                                                                        ?> <option <?= $selected ?> value="<?= $d->id ?>"><?= $d->category_name ?></option> <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <label for="service_details">Services</label>
                                                                <div id="subcategory_details_<?= $div_id ?>">
                                                                <select class="form-control" id="subcategory_change_<?= $div_id ?>">
                                                                    <option value="">--select--</option>
                                                                    <?php
                                                                    for ($scat = 0; $scat < count($subcategory); $scat++) {
                                                                        $d = $subcategory[$scat];
                                                                        $selected = '';
                                                                        if ($md->category_id == $d->category_id) {
                                                                            if ($d->id == $md->sub_category_id) {
                                                                                $selected = 'selected="selected"';
                                                                            }
                                                                            ?> <option <?= $selected ?> value="<?= $d->id ?>"><?= $d->sub_category_name ?></option> <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <label for="service_details">Staff</label>
                                                                <select <?= $attr ?> id="staff_id_<?= $div_id ?>" class="form-control staff_id">
                                                                    <option value="">--select--</option>
                                                                    <?php
                                                                    for ($emp = 0; $emp < count($emp_details); $emp++) {
                                                                        $d = $emp_details[$emp];
                                                                        $selected = '';
                                                                        if ($md->staff_id == $d->id) {
                                                                            $selected = 'selected="selected"';
                                                                        }
                                                                        ?> <option <?= $selected ?> value="<?= $d->id ?>"><?= $d->employee_name ?></option><?php }
                                                                    ?>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row qut_null">
                                                        <div class="col-md-4">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <label for="disipline_name">Start date</label>
                                                                <input id="start_date_<?= $div_id ?>" value="<?= $md->start_date ?>" type="text" class="form-control datepicker_dsb">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <label for="service_details">End date</label>
                                                                <input type="text" id="end_date_<?= $div_id ?>" value="<?= $md->end_date ?>" class="form-control datepicker_dsb">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <label for="service_details">Amount</label>
                                                                <?php
                                                                $disabled = '';
                                                                if ($md->category_id == 5) {
                                                                    $disabled = 'disabled';
                                                                }
                                                                ?>
                                                                <input <?= $disabled ?> type="text" value="<?= $md->total_price ?>" id="amount_<?= $div_id ?>" class="form-control only_number calculate_price" maxlength="5">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <?php
                                    }
                                }
                                ?>












                            </div>

                            <div class = "row pull-right">
                                <div class = "col-md-3">
                                    <a class = "btn green" last_id="<?= $ses ?>" id="newservice_div">Add Services
                                        <i class = "fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class = "portlet light form-fit bordered total-div">
                                <div class = "row col-sm-offset-8">
                                    <div class = " col-sm-6">
                                        <label class = "caption-subject  bold uppercase">Sub Total</label>
                                    </div>
                                    <div class = "col-sm-6">
                                        <label class = "caption-subject  bold uppercase">AED&nbsp;
                                            <span id = "sub_total"><?= $quotation_details == '' ? 0 : $quotation_details[0]->sub_total ?></span></label>
                                    </div>
                                </div>
                                <div class = "row col-sm-offset-8">
                                    <div class = " col-sm-6">
                                        <label class = "caption-subject  bold uppercase">Deduction</label>
                                    </div>
                                    <div class = "col-sm-6">
                                        <input value="<?= $quotation_details == '' ? 0 : $quotation_details[0]->discount ?>" type = "text" class = "form-control" id = "session_discount">
                                    </div>
                                </div>
                                <div class = "row col-sm-offset-8">
                                    <div class = " col-sm-6">
                                        <label class = "caption-subject  bold uppercase">Total</label>
                                    </div>
                                    <div class = "col-sm-6">
                                        <label class = "caption-subject  bold uppercase">AED&nbsp;
                                            <span id = "total"><?= $quotation_details == '' ? 0 : $quotation_details[0]->total ?></span></label>
                                    </div>
                                </div>
                            </div>
                            <div class = "row">
                                <div class = "col-md-12">
                                    <div class = "form-group form-md-line-input form-md-floating-label has-success">

                                        <label for = "child_name">Note</label>

                                        <textarea class = "form-control form-control-inline input" id = "note"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class = "row">
                                <div class = "col-sm-12">
                                    <div class = "form-actions noborder" id = "quotation_btn">
                                        <button type = "button" id = "save_enroll" class = "pull-right btn  mt-ladda-btn ladda-button mt-progress-demo green-stripe " data-style = "expand-right">
                                            <span class = "ladda-label">Submit</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!--END CONTENT BODY -->
</div>