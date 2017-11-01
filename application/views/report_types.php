<style>
    .has-warning .md-radio label, .has-warning.md-radio label {
        color: #327ad5;
    }
    .has-warning .md-radio label>.box, .has-warning.md-radio label>.box {
        border-color: #327ad5;
    }
    .has-warning .md-radio label>.check, .has-warning.md-radio label>.check {
        background: #327ad5;
    }
</style>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class=" col-lg-12 col-xs-12 col-sm-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption font-green">
                            <span class="caption-subject bold uppercase"></span>Create Report</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="md-radio-inline">
                                <div class="col-sm-3">
                                    <div class="md-radio has-warning">
                                        <input <?= $therapy_data == '' ? '' : 'checked'; ?>  value="therapy_reports" type="radio" id="therapy_reports" name="reports" class="md-radiobtn">
                                        <label for="therapy_reports">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span>Therapy Reports</label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="md-radio has-warning">
                                        <input <?= $registration_data == '' ? '' : 'checked' ?> type="radio" value="registration_reports" id="registration_reports" name="reports" class="md-radiobtn">
                                        <label for="registration_reports">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Registration Reports</label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="md-radio has-warning">
                                        <input value="quotation_reports" <?= $quot_data == '' ? '' : 'checked' ?> type="radio" id="quotation_reports" name="reports" class="md-radiobtn">
                                        <label for="quotation_reports">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Quotation Reports </label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="md-radio has-warning">
                                        <input value="receipt_reports" <?= $receipt_data == '' ? '' : 'checked' ?> type="radio" id="receipt_reports" name="reports" class="md-radiobtn">
                                        <label for="receipt_reports">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Receipt Reports </label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="md-radio has-warning">
                                        <input <?= $data_capi == '' ? '' : 'checked' ?> value="capacity_reports" type="radio" id="capacity_reports" name="reports" class="md-radiobtn">
                                        <label for="capacity_reports">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Capacity Reports </label>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <hr>

                    <!--Tharapy report start-->
                    <form method="post" action="<?= base_url() . 'Home/create_reports' ?>">  
                        <div id="tharapy_report_div" style="display: <?= $therapy_data == '' ? 'none' : 'block'; ?>;">

                            <div class="panel-group accordion" id="accordion1">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="advance_filter accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1" aria-expanded="false">Advance Filter </a>
                                        </h4>
                                    </div>

                                    <div id="collapse_1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">


                                        <div class="panel-body">


                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Start Date</label>
                                                    <input  name="start_date" type="text" class="form-control datepicker">
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>End Date</label>

                                                    <input  name="end_date" type="text" class="form-control datepicker">
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Student Name </label>
                                                    <?= get_dropdown_child_searchbox($id = '', $name = 'child_id'); ?>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Staff Name</label>
                                                    <?= get_dropdown_employee_searchbox($id = 'staff_id', $name = 'staff_id', $redirurl = '', $class = '', $employee_id = ''); ?>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>

                            </div>



                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Select Type</label>
                                    <select class="form-control" name="search_type" id="search_type">
                                        <option value="">All</option>

                                        <option value="1">Cancelled 100% </option>
                                        <option value="2">Cancelled 50%</option>
                                        <option value="3">No show</option>
                                        <option value="4">Attended</option>
                                        <option value="5">Cancelled by Therapist</option>
                                        <option value="6">Cancelled No charge</option>
                                        <option value="7">No show – SBS – 100% Chargeable</option> 
                                        <option value="8">ELIP (General Observation) – No charge</option>
                                        <option value="9">General Observation – No Charge</option>     
                                        <option value="10">Re-scheduled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label style="width: 100%;">&nbsp; </label>
                                    <input type="submit" name="theray_genrate_report" class="btn blue" value="Search" />
                                    <div class="clearfix"></div>
                                </div>
                            </div>


                            <?php if ($therapy_data) { ?>
                                <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                                    <table class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                                        <thead>
                                            <tr>
                                                <th>Quotation No</th>
                                                <th>Child Name</th>
                                                <th>Staff Name</th>
                                                <th>Created Date</th>
                                                <th>Start/End Time</th>
                                                <th>Therapy Notes Details</th>
                                                <th>Services Details</th>
                                                <th>Status</th>
                                                <th>Rescheduled Date</th>
                                                <th>Rescheduled Start/End Time</th>
                                                <th>Additional Notes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for ($i = 0; $i < count($therapy_data); $i++) {
                                                $d = $therapy_data[$i];
                                                $rescheduled_date = date('d/m/y', strtotime($d->t_rescheduled_date));
                                                $rescheduled_time = date('H:i', strtotime($d->t_rescheduled_start_time)) . ' / ' . date('H:i', strtotime($d->t_rescheduled_end_time))
                                                ?>
                                                <tr>
                                                    <td><?= $d->receipt_no ?></td>
                                                    <td><?= $d->child_name ?></td>
                                                    <td><?= $d->t_staff_name ?></td>
                                                    <td><?= date('d/m/y', strtotime($d->t_created_date)) ?></td>
                                                    <td><?= date('H:i', strtotime($d->t_session_start_time)) . ' / ' . date('H:i', strtotime($d->t_session_end_time)) ?></td>

                                                    <td><?php echo substr($d->t_therapy_note, 0, 30); ?><a full_history="<?= $d->t_therapy_note ?>" class="therapy_report_read_more"> Read more</a></td>
                                                    <td><?= $d->t_services ?></td>
                                                    <td><?= get_therapy_status($d->t_status); ?></td>
                                                    <td><?= $rescheduled_date != '00/00/0000' ? $rescheduled_date : ''; ?></td>
                                                    <td><?= $rescheduled_date != '00/00/0000' ? $rescheduled_time : ''; ?></td>
                                                    <td><?= $d->additional_notes ?></td>
                                                </tr><?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } ?>
                        </div>
                    </form>
                    <!--Tharapy report end-->

                    <!--registration_reports start-->
                    <form method="post" action="<?= base_url() . 'Home/registration_reports' ?>">
                        <div id="registration_reports_div" style="display: <?= $registration_data == '' ? 'none' : 'block'; ?>">
                            <div class="row">
                                <div class="col-lg-12 col-xs-12 col-sm-12">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Start Date</label>
                                            <input  name="start_date" type="text" class="form-control datepicker">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>End Date</label>
                                            <input  name="end_date" type="text" class="form-control datepicker">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Discipline</label>
                                            <?= get_dropdown_disipline_searchbox($id = '', $name = 'discipline', $redirurl = '', $class = '', $disipline_id = ''); ?>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="pull-right">
                                                <button id="registraction_genrate_report" name="registraction_genrate_report" type="submit" class="btn blue">Search</button>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <?php if ($registration_data != '') { ?>
                                        <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                                            <table class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                                                <thead>
                                                    <tr>
                                                        <th>Sl</th>
                                                        <th>Created Date</th>
                                                        <th>Name</th>
                                                        <th>Gender</th>
                                                        <th>DOB</th>
                                                        <th>Father Name</th>
                                                        <th>Father Number</th>
                                                        <th>Father Email</th>
                                                        <th>Mother Name</th>
                                                        <th>Mother Number</th>
                                                        <th>Mother Email</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    for ($i = 0; $i < count($registration_data); $i++) {
                                                        $d = $registration_data[$i];
                                                        ?>
                                                        <tr>
                                                            <td><?= $i + 1; ?></td>
                                                            <td><?= date('d/m/Y', strtotime($d->timestamp)) ?></td>
                                                            <td><?= $d->child_name ?></td>
                                                            <td><?= $d->gender ?></td>
                                                            <td><?= date('d/m/Y', strtotime($d->date_of_birth)) ?></td>
                                                            <td><?= $d->father_name ?></td>
                                                            <td><?= $d->father_mobile ?></td>  
                                                            <td><?= $d->father_personal_email ?></td> 
                                                            <td><?= $d->mother_name ?></td>
                                                            <td><?= $d->mother_mobile ?></td>  
                                                            <td><?= $d->mother_personal_email ?></td> 
                                                        </tr>
                                                    <?php }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    </form>
                    <!--registration_reports End-->

                    <!--Quotation start -->
                    <div id="quotation_reports_div" style="display: <?= $quot_data == '' ? 'none' : 'block'; ?>">
                        <form method="post" action="<?= base_url() . 'Home/quotation_reports' ?>">
                            <div class="row">

                                <div class=" col-lg-12 col-xs-12 col-sm-12">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Staff Name </label>
                                            <?= get_dropdown_employee_searchbox($id = 'employee_id', $name = 'employee_id', $redirurl = '', $class = '', $employee_id = ''); ?>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Child Name</label>
                                            <?= get_dropdown_child_searchbox($id = '', $name = 'child_id'); ?>
                                        </div>
                                    </div>



                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label >Start Date</label>
                                            <input value="<?= $form_quot_data == '' ? '' : $form_quot_data['start_date'] ?>"  name="start_date" type="text" class="form-control datepicker">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label >End Date</label>
                                            <input value="<?= $form_quot_data == '' ? '' : $form_quot_data['end_date'] ?>"  name="end_date" type="text" class="form-control datepicker" />
                                        </div>
                                    </div>



                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button id="registraction_genrate_report" name="genrate_report" type="submit" class="btn blue pull-right">Search</button>

                                            <div class="clearfix"></div>
                                        </div>
                                    </div>


                                    <div class="clearfix"></div>
                                    <?php if ($quot_data != '') { ?>
                                        <div class="total_amount">
                                            <table cellspacing="0" cellpadding="0" style="float:right;">
                                                <tr>
                                                    <td><label class="bold  font-green">Total Amount </label></td>
                                                    <td>:</td>
                                                    <td><label class="caption-subject  bold  font-green"><?= $total_amount ?> AED</label></td>
                                                </tr>
                                                <tr>
                                                    <td><label class="caption-subject  bold  font-green">Total Quote  </label></td>
                                                    <td>:</td>
                                                    <td><label class="caption-subject  bold  font-green"><?= $total_quo ?></label></td>
                                                </tr>
                                            </table>

                                            <div class="clearfix"></div>
                                        </div>
                                        <?php
                                    }
                                    if ($quot_data != '') {
                                        ?>
                                        <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                                            <table class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                                                <thead>
                                                    <tr>
                                                        <th>Sl</th>
                                                        <th>Quotation No</th>
                                                        <th>Child Name</th>
                                                        <th>Parent Name</th>
                                                        <th>Staff Name</th>
                                                        <th>Category Name</th>
                                                        <th>Sub Category Name</th>
                                                        <th>Discipline</th>
                                                        <th>Service Time</th>
                                                        <th>Date</th>
                                                        <th>Total</th>
                                                        <th>Discount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $ml = 0;

                                                    for ($ql = 0; $ql < count($quot_data); $ql++) {
                                                        $det = $quot_data[$ql];

                                                        $q = $det['quotation_details'];
                                                        $qd = $det['quotation_descipline'];
                                                        $qs = $det['quotation_sessaion'];

                                                        for ($qdl = 0; $qdl < count($qd); $qdl++) {
                                                            $tempd = $qd[$qdl];
                                                            $tempss = $qs[$qdl];
                                                            if (count($tempss)) {
                                                                ?><tr>
                                                                    <td><?= $ml + 1; ?></td>
                                                                    <td><?= $q->receipt_no ?></td>
                                                                    <td><?= $q->child_name ?></td>
                                                                    <td><?= $q->father_name ?></td>
                                                                    <td><?= $tempss[0]->employee_name ?></td>
                                                                    <td><?= $tempd->category_name ?></td>
                                                                    <td><?= $tempd->sub_category_name ?></td>
                                                                    <td><?= $tempss[0]->description ?></td>
                                                                    <td><?= $tempss[0]->services_time . ' ' . $tempss[0]->services_time_type ?></td>
                                                                    <td><?= date('d/m/Y', strtotime($q->timestamp)) ?></td>
                                                                    <td><?= $q->total ?></td>
                                                                    <td><?= $q->discount ?></td>
                                                                </tr>
                                                                <?php
                                                                $ml++;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </form>
                    </div>
                    <!--Quotation End -->

                    <!--Receipt start -->
                    <form method="post" action="<?= base_url() . 'Home/receipt_reports' ?>">
                        <div id="receipt_reports_div" style="display: <?= $receipt_data == '' ? 'none' : 'block'; ?>">
                            <div class="row">
                                <div class=" col-lg-12 col-xs-12 col-sm-12">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label >Created By </label>
                                            <?= get_dropdown_employee_searchbox($id = 'employee_id', $name = 'employee_id', $redirurl = '', $class = '', $employee_id = ''); ?>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label >Child Name</label>
                                            <?= get_dropdown_child_searchbox($id = '', $name = 'child_id'); ?>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label >Start Date</label>
                                            <input value="<?= $form_data_receipt == '' ? '' : $form_data_receipt['start_date'] ?>"  name="start_date" type="text" class="form-control datepicker">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label >End Date</label>
                                            <input value="<?= $form_data_receipt == '' ? '' : $form_data_receipt['end_date'] ?>"  name="end_date" type="text" class="form-control datepicker">
                                        </div>
                                    </div>



                                    <div class="col-sm-12">
                                        <div class="form-group  pull-right">
                                            <button id="registraction_genrate_report" name="genrate_report" type="submit" class="btn blue">Search</button>
                                        </div>
                                    </div>

                                    <?php if ($receipt_data != '') { ?>
                                        <div class="clearfix"></div>
                                        <div class="total_amount">
                                            <table cellspacing="0" cellpadding="0" style="float:right;">
                                                <tr>
                                                    <td> <label class="caption-subject  bold uppercase">Total Collection</label></td>
                                                    <td>:</td>
                                                    <td><label class="caption-subject  bold uppercase">
                                                            <colloction id="collection_div"></colloction>&nbsp;AED&nbsp;</label>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="clearfix"></div>
                                        </div>
                                    <?php } ?>


                                    <?php if ($receipt_data) { ?>
                                        <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                                            <table class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                                                <thead>
                                                    <tr>
                                                        <th>Sl</th>
                                                        <th>Receipt No</th>
                                                        <th>Child Name</th>
                                                        <th>Father Name</th>
                                                        <th>Paid Amount</th>
                                                        <th>Paid By</th>
                                                        <th>Notes</th>
                                                        <th>Created By</th>
                                                        <th>Quotation Amount</th>
                                                        <th>Discount</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $total_col = 0;
                                                    for ($ql = 0; $ql < count($receipt_data); $ql++) {
                                                        $d = $receipt_data[$ql];
                                                        $total_col = $total_col + $d->pay_amount;
                                                        ?>
                                                        <tr>
                                                            <td><?= $ql + 1; ?></td>
                                                            <td><?= $d->receipt_no ?></td>
                                                            <td><?= $d->child_name ?></td>
                                                            <td><?= $d->father_name ?></td>
                                                            <td><?= $d->pay_amount ?></td>
                                                            <td><?= get_paid_amount_formare($d->paid_by) ?></td>
                                                            <td><?= $d->notes ?></td>
                                                            <td><?= $d->updated_name ?></td>
                                                            <td><?= $d->total ?></td>
                                                            <td><?= $d->discount ?></td>
                                                            <td><?= date('d/m/Y', strtotime($d->timestamp)) ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>


                                        <input type="hidden" id="total_collection" value="<?= $total_col ?>"> 
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </form>
                    <!--Receipt End -->

                    <!--capacity report End -->

                    <form method="post" action="<?= base_url() . 'Home/capacity_reports' ?>">
                        <div id="capacity_reports_div" style="display: <?= $data_capi == '' ? 'none' : 'block'; ?>">
                            <div class="row">
                                <div class=" col-lg-12 col-xs-12 col-sm-12">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label >Staff Name </label>
                                            <?= get_dropdown_employee_searchbox($id = 'employee_id', $name = 'employee_id', $redirurl = '', $class = '', $employee_id = ''); ?>
                                        </div>

                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label >Start Date</label>
                                            <input value="<?= $form_data_capi == '' ? '' : $form_data_capi['start_date'] ?>"  required="" name=	"start_date" type="text" class="form-control datepicker_dbbafter">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label >End Date</label>
                                            <input value="<?= $form_data_capi == '' ? '' : $form_data_capi['end_date'] ?>"  name="end_date" required="" type="text" class="form-control datepicker_dbbafter">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group pull-right">
                                            <button id="registraction_genrate_report" name="genrate_report" type="submit" class="btn blue">Search</button>
                                        </div>
                                    </div>
                                    <?php if ($data_capi != '') {
                                        ?>
                                        <div class="col-sm-12 total_amount">
                                            <table cellspacing="0" cellpadding="0" style="float:right;">
                                                <tr>
                                                    <td><label class="caption-subject  bold uppercase">Total Hours</label></td>
                                                    <td>:</td>
                                                    <td><label class="caption-subject  bold uppercase"><?= $total_h ?></label></td>
                                                </tr>
                                            </table>
                                        </div>

                                        <?php
                                    }

                                    if ($data_capi) {
                                        ?>
                                        <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                                            <table class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                                                <thead>
                                                    <tr>
                                                        <th>Sl</th>
                                                        <th>Category</th>
                                                        <th>Services</th>
                                                        <th>Attended</th>
                                                        <th>Cancelled 100%</th>
                                                        <th>Cancelled 50%</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $group = $data_capi['group'];
                                                    $status = $data_capi['status'];
                                                    for ($ql = 0; $ql < count($group); $ql++) {
                                                        $d = $group[$ql];
                                                        $st = $status[$ql];
                                                        ?>
                                                        <tr>
                                                            <td><?= $ql + 1; ?></td>
                                                            <td><?= $d->category_name ?></td>
                                                            <td><?= $d->services_time . ' ' . $d->services_time_type . ' ' . $d->description ?></td>
                                                            <td><?= $st['aatent'] ?></td>
                                                            <td><?= $st['cancel_100'] ?></td>
                                                            <td><?= $st['cancel_50'] ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php } ?>
                                </div>


                                <!-- END CONTENT BODY -->
                            </div>
                        </div>
                    </form>

                    <!--capacity report End -->



                    <div class="clearfix"></div>

                </div>
                <div class="clearfix"></div>
                <!-- END CONTENT BODY -->	
            </div>
            <div class="clearfix"></div>

        </div>
    </div>

