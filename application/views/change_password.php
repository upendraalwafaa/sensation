<?php
// echo '<pre>';
// print_r($quotation_details);
// echo '</pre>';
?>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">
                <!--content Area  statrt-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase">Students Receipt Details</span>
                        </div>
                    </div>
                </div>
            </div>
            <!--content Area  End-->
        </div>
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">
                <!--content Area  statrt-->
                <div class="portlet-body form" id="form_payment">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light form-fit bordered">
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form class="form-horizontal form-bordered">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Old Password</label>
                                                <div class="col-md-4">
                                                    <input  id="old_password"  class="form-control" type="password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">New Password</label>
                                                <div class="col-md-4">
                                                    <input  id="new_password"  class="form-control" type="password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Confirm Password</label>
                                                <div class="col-md-4">
                                                    <input  class="form-control" id="cpassword" type="password">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-3"></label>
                                                <div class="col-md-4">
                                                    <label  id="message_box"></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button id="update_password" type="button" class="btn blue">
                                                        <i class="fa fa-check"></i> Submit</button>
                                                    <button onclick="window.location = base_url + 'Home/';" type="button" class="btn default">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--content Area  End-->

            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>




</div>