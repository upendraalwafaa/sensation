
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <form method="post" action="<?= base_url() . 'Home/quotation_reports' ?>">
            <div class="row">

                <div class=" col-lg-12 col-xs-12 col-sm-12">
                    <div class="portlet light portlet-fit bordered">
                        <div class="portlet-title">
                            <div class="caption font-green">
                                <input type="hidden" id="category_id" value="">
                                <span class="caption-subject bold font-dark uppercase font-green">
                                    Quotation Report</span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Staff Name </label>
                                <select class="form-control selectpicker" data-live-search="true" id="employee_id" name="employee_id">
                                    <option value="">select</option>
                                    <?php
                                    $emp_id = '';
                                    if ($form_data != '') {
                                        $emp_id = $form_data['employee_id'];
                                    }
                                    for ($c = 0; $c < count($employee_details); $c++) {
                                        $cd = $employee_details[$c];
                                        $select = '';
                                        if ($emp_id == $cd->id) {
                                            $select = 'selected="selected"';
                                        }
                                        ?><option <?= $select ?>  value="<?= $cd->id ?>"><?= $cd->employee_name ?></option><?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Child Name</label>
                                <select class="form-control selectpicker" data-live-search="true" id="child_id" name="child_id">
                                    <option value="">select</option>
                                    <?php
                                    $child_id = '';
                                    if ($form_data != '') {
                                        $child_id = $form_data['child_id'];
                                    }
                                    for ($ch = 0; $ch < count($child_details); $ch++) {
                                        $chd = $child_details[$ch];
                                        $select = '';
                                        if ($child_id == $chd->id) {
                                            $select = 'selected="selected"';
                                        }
                                        ?><option <?= $select ?> value="<?= $chd->id ?>"><?= $chd->child_name ?></option> <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>



                        <div class="col-sm-3">
                            <div class="form-group">
                                <label >Start Date</label>
                                <input value="<?= $form_data == '' ? '' : $form_data['start_date'] ?>" id="start_date" name="start_date" type="text" class="form-control datepicker">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label >End Date</label>
                                <input value="<?= $form_data == '' ? '' : $form_data['end_date'] ?>" id="end_date" name="end_date" type="text" class="form-control datepicker" />
                            </div>
                        </div>



                        <div class="col-sm-12">
                            <div class="form-group">
                                <button id="registraction_genrate_report" name="genrate_report" type="submit" class="btn blue pull-right">Search</button>

                                <div class="clearfix"></div>
                            </div>
                        </div>


                        <div class="clearfix"></div>
                        <?php if ($form_data != '') { ?>
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
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- END CONTENT BODY -->

        </form >
        <?php if ($view_data) { ?>
            <div class="portlet-body div-span-main-cont">
                <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                    <div class=" ">
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

                                for ($ql = 0; $ql < count($view_data); $ql++) {
                                    $det = $view_data[$ql];

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
                </div>
            </div>
        <?php } ?>
    </div>

