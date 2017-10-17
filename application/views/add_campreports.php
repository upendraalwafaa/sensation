dsdfdfsdfsdfsdfsdf
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
                                <span class="caption-subject bold uppercase"> Add New Camp&Reports</span>
                            </div>
                            <div class="pull-right">
                                <input type="search" class="form-control" id="camp_report_search_name" value="" placeholder="Enter Student Name">
                                <div class="alldropdown" style="display:none;">
                                    <div class="childs_names">
                                        <ul class="droplist dd-list dd-list-na1"></ul>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="panel panel-primary" > 
                            <div class="panel-heading" style="text-align: center;">  
                                <h3 class="panel-title"><b>Child Name : <atg id="child_name"><?= $child_details == '' ? '' : $child_details[0]->child_name ?> </atg></b></h3>  
                            </div> 
                            <div class="panel-body">
                                <div class="row qut_null">
                                    <div class="col-sm-6">
                                        <div class="col-sm-6">
                                            <label><b>Father Name : </b></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label id="father_name"><?= $parent_details == '' ? '' : $parent_details[0]->father_name ?> </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-6">
                                            <label><b>Mother's Name : </b></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label id="mother_name"> <?= $parent_details == '' ? '' : $parent_details[0]->mother_name ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row qut_null" style="margin-top: 10px;">
                                    <div class="col-sm-6">
                                        <div class="col-sm-6">
                                            <label><b>Date Of Birth : </b></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label id="date_of_birht"><?= $child_details == '' ? '' : date('d/m/Y', strtotime($child_details[0]->date_of_birth)) ?></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-6">
                                            <label><b>Gender : </b></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label id="gender"><?= $child_details == '' ? '' : $child_details[0]->gender ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row qut_null" style="margin-top: 10px;">
                                    <div class="col-sm-6">
                                        <div class="col-sm-6">
                                            <label><b>Mobile No : </b></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label id="father_mobile_no"><?= $parent_details == '' ? '' : $parent_details[0]->father_mobile ?></label>
                                        </div>
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