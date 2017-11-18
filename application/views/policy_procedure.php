<?php
// $loggid = $logged_in[0]->id;
// echo "<pre>";
// print_r($view_session_details);
// exit;
?>
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
        <div class="row">
            <div class="col-md-12"> 
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="col-lg-12 col-xs-12 col-sm-12">
                    <div class="portlet light portlet-fit bordered">
                        <div class="portlet-title">
                            <div class="caption font-green">
                                <i class="icon-microphone font-dark hide"></i>
                                <span class="caption-subject bold font-dark uppercase font-green">Upload Policy Procedure</span>
                            </div>	
                            <div class="qtarea">
                                <a href="<?= base_url() . 'Home/accept_policy_procedure'; ?>">View Policy</a>
                            </div>
                        </div>						
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet-body row">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- BEGIN PORTLET-->
                                                <div class="portlet light form-fit ">
                                                    <div class="portlet-title">

                                                    </div>
                                                    <div class="portlet-body form portlet-title">
                                                        <!-- BEGIN FORM-->
                                                        <form action="<?php base_url() . 'Home/policy_procedure' ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                                                            <div class="form-body">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"> Policy Procedure Type </label>
                                                                    <div class="col-md-6">
                                                                        <div class="col-sm-4">
                                                                            <div class="md-radio has-warning">
                                                                                <input value="1" type="radio" id="centre_related" name="policy_type" checked="" class="md-radiobtn">
                                                                                <label for="centre_related">
                                                                                    <span class="inc"></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>Centre Related</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="md-radio has-warning">
                                                                                <input value="2" type="radio" id="client_related" name="policy_type" class="md-radiobtn">
                                                                                <label for="client_related">
                                                                                    <span class="inc"></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>Client Related</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="md-radio has-warning">
                                                                                <input value="3" type="radio" id="staff_related" name="policy_type" class="md-radiobtn">
                                                                                <label for="staff_related">
                                                                                    <span class="inc"></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>Staff Related</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Upload</label>
                                                                    <div class="col-md-4">
                                                                        <input class="form-control" name="file[]" type="file">
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <a  class="btn btn-info mt-repeater-add add_more_files"><i class="fa fa-plus"></i> Add New</a>
                                                                    </div>
                                                                </div>
                                                                <div id="add_more_details">

                                                                </div>
                                                                <?php if ($status == 'success') { ?>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Message</label>
                                                                        <div class="col-md-4">
                                                                            <b style="color: green;"><?= $msg ?></b>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
                                                                </a>
                                                            </div>
                                                            <div class="form-actions">
                                                                <div class="row">
                                                                    <div class="col-md-offset-3 col-md-9">
                                                                        <button type="submit" name="form_submit" class="btn blue">
                                                                            <i class="fa fa-check"></i> Submit</button>
                                                                        <button type="reset" class="btn default">Cancel</button>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
