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
                    <!--Tharapy report start-->
                    <form method="post" action="<?= base_url() . 'Home/marketing_reports' ?>">  
                        <div id="tharapy_report_div">

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

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Select Type</label>
                                    <select data-live-search="true" class="form-control selectpicker selectpicker" name="search_type" id="search_type">
                                        <option value="">Select One</option>                                        
                                        <option value="Caseloads">Caseloads</option>
                                        <option value="Active">Active clients</option>
                                        <option value="Out Reach">Outreach</option>  
                                        <option value="Center">Centre-based</option>
                                        <option value="Inactive">Discharges</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                               
                                    <label>Select Type</label>
                                    <?= get_dropdown_disipline_searchbox($id='', $name='disipline_name', $redirurl='', $class='', $disipline_id=''); ?>
                               
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label style="width: 100%;">&nbsp; </label>
                                    <input type="submit" name="marketing_genrate_report" class="btn blue" value="Search" />
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <?php if ($reports_marketing) { ?>
                                <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                                    <table class="table dataTable_class table-striped table-hover table-bordered dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                                        <thead>
                                            <tr>
                                                <th>Sl No</th>
                                                <th>Child Name</th>
                                                <th>Parent Email</th>
                                                <th>Created Date</th>
                                                <th>Session_type</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $n = 1;
                                            for ($i = 0; $i < count($reports_marketing); $i++) {
                                                $d = $reports_marketing[$i];
                                                ?>
                                                <tr>
                                                    <td><?= $n ?></td>
                                                    <td><?= $d->child_name ?></td>
                                                    <td><?= ($d->father_personal_email != '' ? $d->father_personal_email : $d->mother_personal_email ) ?></td>          
                                                    <td><?= date('d/m/y', strtotime($d->timestamp)) ?></td>
                                                    <td><?= $d->session_type ?></td>
                                                    <td><?= ($d->archive == 0 ? 'Active' : 'Inactive') ?></td>
                                                </tr><?php
                                                $n++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } ?>
                        </div>
                    </form>
                    <!--Tharapy report end-->

                    <div class="clearfix"></div>

                </div>
                <div class="clearfix"></div>
                <!-- END CONTENT BODY -->	
            </div>
            <div class="clearfix"></div>

        </div>
    </div>