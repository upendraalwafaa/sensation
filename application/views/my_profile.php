<?php
//echo "<pre>";
//print_r($logged_in);
//echo $logged_in[0]->designation;
//exit;
?>

<div class="page-content-wrapper">
    <div class="page-content">

        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">


                <div class="col-lg-offset-2 col-lg-4 col-xs-12 col-sm-12">
                    <div class="portlet light portlet-fit bordered">
                        <div class="portlet-title">
                            <div class="caption font-green">
                                <input type="hidden" id="category_id" value="">
                                <span class="caption-subject bold font-dark uppercase font-green">My Profile</span>
                            </div>

                        </div>	
                        <div class="portlet-body form">
                            <div class="col-sm-12"> 
                                <div class="profile-userpic">
                                    <img src="<?= base_url() . 'files/images/' . $logged_in[0]->image_name ?>" class="img-responsive" >

                                </div>

                                <div class="form-group">
                                    <form method="post" id="profile_pic" name="profile_pic">

                                        <label for="exampleInputFile1">Upload Image </label>
                                        <input delete_image="<?= $logged_in[0]->image_name ?>" type="file" form_name="profile_pic" class="uploadbgset form-cont uppload_profile_image" file_name="" name="profile" accept="image/gif, image/jpeg, image/png" id="profile">
                                        <p class="help-block small"> 600px X 600px </p>

                                    </form>
                                </div>


                                <div class="profile-usertitle">
                                    <div class="profile-usertitle-name"> <?= $logged_in[0]->employee_name; ?> </div>
                                    <div class="profile-usertitle-job"> <?= $logged_in[0]->designation; ?> </div>
                                </div>

                                <hr/>

                                <form role="form" action="#">
                                    <div class="form-group">
                                        <label class="control-label">Name</label>
                                        <input type="text" placeholder="John" value="<?= $logged_in[0]->employee_name; ?>" class="form-control b_info_name"> 
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Disipline Name</label>
                                        <input type="text" value="<?= $logged_in[0]->disipline_name ?>" placeholder="Enter Disipline" readonly class="form-control b_info_disipline">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Designation</label>
                                        <textarea class="form-control b_info_designation" rows="3" placeholder="Designation" readonly><?= $logged_in[0]->designation; ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        <input type="text" placeholder="Enter email" value="<?= $logged_in[0]->email; ?>" class="form-control b_info_email"> 
                                    </div>

                                </form>


                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>


                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div> 

                <div class="clearfix"></div>

            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- END CONTENT BODY -->
    <div class="clearfix"></div>
</div>

