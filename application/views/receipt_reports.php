
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <form method="post" action="<?= base_url() . 'Home/receipt_reports' ?>">


            <div class="row">
                <div class="portlet light portlet-fit bordered">

                    <div class="portlet-title">
                        <div class="caption font-green">
                            <span class="caption-subject bold font-dark uppercase font-green">
                                Receipt Report</span>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label >Created By </label>
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
                            <label >Child Name</label>
                            <select data-live-search="true" class="form-control selectpicker" id="child_id" name="child_id">
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
                            <input value="<?= $form_data == '' ? '' : $form_data['end_date'] ?>" id="end_date" name="end_date" type="text" class="form-control datepicker">
                        </div>
                    </div>



                    <div class="col-sm-12">
                        <div class="form-group  pull-right">
                            <button id="registraction_genrate_report" name="genrate_report" type="submit" class="btn blue">Search</button>
                        </div>
                    </div>

                    <?php if ($form_data != '') { ?>
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
                </div>

                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>


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
                                for ($ql = 0; $ql < count($view_data); $ql++) {
                                    $d = $view_data[$ql];
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
                </div>
            </div>

            <input type="hidden" id="total_collection" value="<?= $total_col ?>"> 
        <?php } ?>
    </div>
</div>


