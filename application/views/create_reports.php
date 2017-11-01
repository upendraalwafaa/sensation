
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>

        <div class="row">
            <form method="post" action="<?= base_url() . 'Home/create_reports' ?>">
                <div class=" col-lg-12 col-xs-12 col-sm-12">
                    <div class="portlet light portlet-fit bordered">

                        <div class="portlet-title">
                            <div class="caption font-green">
                                <span class="caption-subject bold uppercase"></span>Create Report</span>
                            </div>
                        </div>

                        <div class="panel-group accordion" id="accordion1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="advance_filter accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1" aria-expanded="false">Advance Filter </a>
                                    </h4>
                                </div>

                                <div id="collapse_1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">

                                    <form method="post">
                                        <div class="panel-body">


                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Start Date</label>
                                                    <input id="start_date" name="start_date" type="text" class="form-control datepicker">
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>End Date</label>

                                                    <input id="end_date" name="end_date" type="text" class="form-control datepicker">
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Student Name </label>
                                                    <select id="child_id" name="child_id" class="form-control selectpicker" data-live-search="true">
                                                        <option value="">Select</option>
                                                        <?php
                                                        for ($i = 0; $i < count($child_details); $i++) {
                                                            $d = $child_details[$i];
                                                            ?><option value="<?= $d->id ?>"><?= $d->child_name ?></option><?php
                                                        }
                                                        ?>
                                                    </select>                                                  
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Staff Name</label>
                                                    <select id="staff_id" name="staff_id" data-live-search="true" class="form-control selectpicker">
                                                        <option value="">Select</option>
                                                        <?php
                                                        for ($i = 0; $i < count($employee_details); $i++) {
                                                            $d = $employee_details[$i];
                                                            ?><option value="<?= $d->id ?>"><?= $d->employee_name ?></option><?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>


                                    </form>
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




                    <div class="clearfix"></div>
                </div>

            </form>
            <div class="clearfix"></div>
            <!-- END CONTENT BODY -->	
        </div>
        <div class="clearfix"></div>
        <?php if ($view_data) { ?>

            <div class="col-sm-12">
                <div class="portlet-body div-span-main-cont">
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
                                for ($i = 0; $i < count($view_data); $i++) {
                                    $d = $view_data[$i];
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
                </div>
            </div>
        <?php } ?>
    </div>
</div>

