

<style>
    <!-- 	
    .portlet.light.portlet-fit>.portlet-body {
        padding: 10px 0px 20px;
    } -->
</style>
<?php
$session_arr = $this->session->userdata('logged_in');
$db_session_ar = get_employee_arr_by_emp_id($session_arr[0]->id);
?>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">
                <div class="portlet light portlet-fit bordered">

                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-microphone font-dark hide"></i>
                            <span class="caption-subject bold font-dark uppercase font-green">Dashboard</span>
                        </div>
                    </div>

                    <div class="portlet-body maindash_box">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a href="<?= $db_session_ar->id == 17 ? base_url('Home/view_employee') : '' ?>" style="background-color:#eb4b0c" class="dashboard-stat dashboard-stat-v2 blue">
                                <div class="visual">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="<?= $total_emp[0]->total ?>"><?= $total_emp[0]->total ?></span>
                                    </div>
                                </div>
                                <div class="desc"> Total Employee </div>
                            </a>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a href="<?= $db_session_ar->id == 17 ? base_url('Home/child_details') : '' ?>" style="background-color:#337ab7;" class="dashboard-stat dashboard-stat-v2 blue">
                                <div class="visual">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="<?= $total_child[0]->total ?>"><?= $total_child[0]->total ?></span>
                                    </div>
                                </div>
                                <div class="desc"> Total Student </div>
                            </a>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a href="<?= base_url('Home/calendar_view') ?>" style="background-color:  #9A12B3  " class="dashboard-stat dashboard-stat-v2 blue">
                                <div class="visual">
                                    <i class="fa fa-book"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="<?= get_home_page_details('today_appoinment'); ?>"><?= get_home_page_details('today_appoinment') ?></span>
                                    </div>
                                </div>
                                <div class="desc">Today's Appointment</div>
                            </a>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a href="<?= $db_session_ar->registration_form == 0 ? base_url('Home/reg_view') : '' ?>" style="background-color:   #36D7B7 " class="dashboard-stat dashboard-stat-v2 blue">
                                <div class="visual">
                                    <i class="fa fa-registered"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="<?= get_home_page_details('today_registraction'); ?>"><?= get_home_page_details('today_registraction'); ?></span>
                                    </div>
                                </div>
                                <div class="desc">Today's Registration</div>

                            </a>
                        </div>


                        <div class="span-rw-home">

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a  href="<?= $db_session_ar->receipt == 0 ? base_url('Home/view_child_details') : '' ?>" style="background-color:  #0db909 " class="dashboard-stat dashboard-stat-v2 blue">
                                    <div class="visual">
                                        <i class="fa fa-registered"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="<?= get_home_page_details('today_collection'); ?>"><?= get_home_page_details('today_collection'); ?></span>
                                        </div>
                                    </div>
                                    <div class="desc">Today's Collection</div>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="<?= $db_session_ar->quotation == 0 ? base_url('Home/view_quotation') : '' ?>" style="background-color: #E43A45" class="dashboard-stat dashboard-stat-v2 blue">
                                    <div class="visual">
                                        <i class="fa fa-check-circle-o"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="<?= get_home_page_details('today_create_new_quotation') ?>"><?= get_home_page_details('today_create_new_quotation') ?></span>
                                        </div>
                                    </div>
                                    <div class="desc">Today's Quotations</div>
                                </a>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                    </div>




                    <br/>
                    <br/>
                    <div class="col-sm-12 partBdr">
                        <div class="col-sm-offset-2 col-sm-8">
                            <div class="col-sm-6">
                                <label>Receipt Status ( In Aed)</label>
                            </div>
                            <div class="col-sm-3">
                                <label>Year</label>
                            </div>
                            <div class="col-sm-3">
                                <select onchange="get_receipt_month_colloction(this.value)" class="form-control">
                                    <?php for ($y = date('Y'); $y >= 2012; $y--) { ?>
                                        <option value="<?= $y ?>"><?= $y ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-offset-2 col-sm-8">
                            <div style="width: 100%;height: 500px;" id="chartdiv"></div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="col-sm-12 partBdr">
                        <div class="col-sm-offset-2 col-sm-8">
                            <div class="col-sm-6">
                                <label>Quotation Status ( In Aed )</label>
                            </div>
                            <div class="col-sm-3">
                                <label>Year</label>
                            </div>
                            <div class="col-sm-3">
                                <select onchange="get_quotation_month_colloction(this.value)" class="form-control">
                                    <?php for ($y = date('Y'); $y >= 2012; $y--) { ?>
                                        <option value="<?= $y ?>"><?= $y ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-offset-2 col-sm-8">
                            <div style="width: 100%;height: 500px;" id="chart2"></div>
                        </div>
                    </div>










                </div>

            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>


<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
