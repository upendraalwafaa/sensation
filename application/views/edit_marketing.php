<?php
$photo_rs = ['1' => 'Yes: Therapy only', '2' => 'Yes: Social Media', '3' => 'Maybe / prior permission required', '4' => 'No'];

$hear_About_us = get_hear_about_us_marketing();

$social_media = ['1' => 'Company Website', '2' => 'Google Search', '3' => 'Facebook', '4' => 'LinkedIn',
    '5' => 'Twitter', '6' => 'Instagram', '7' => 'Afterschool.ae', '8' => 'YouTube / Video', '9' => 'Others'];

$categories = categories_for_marketing_module();

$active_client = ['1' => 'Parent Consultation (PC)', '2' => 'Child Screener', '3' => 'Child Assessment', '4' => 'Therapy Report', '5' => 'Speech Language Therapy (SLT)',
    '6' => 'Occupational Therapy (OT)', '7' => 'Early Learning & Intervention Program (EILP)', '8' => 'Camps', '9' => 'Group Classes:',
    '10' => 'Workshops & Training', '11' => 'Sale of item/book', '12' => 'Others'];

$child_date = '';
$parent_date = '';
$photorelease = '';
$hear_about = '';
$social = '';
$category = '';
$active = '';
$sec_email_pvt = '';
?>

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">


                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption font-green">
                            <span class="caption-subject bold uppercase">EDIT MARKETING</span>
                        </div>
                    </div>



                    <div class=" ">
                        <form role="form" id="edit_marketing_form" method="POST">
                            <?php
                            if ($marketing) {
                                foreach ($marketing as $value) {

                                    if ($value->tel_mobile_business_sec == 0) {
                                        $value->tel_mobile_business_sec = '';
                                    }
                                    if ($value->tel_mobile_business == 0) {
                                        $value->tel_mobile_business = '';
                                    }
                                    if ($value->email_private_sec) {
                                        $sec_email_pvt = $value->email_private_sec;
                                    }
                                    ?>
                                    <div class="form-body">
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>  <span class="required"> * </span>Date of Entry</label>
                                                    <input type="text" class="datepicker form-control insert" value="<?= date('d-m-Y', strtotime($value->entry_date)); ?>" id="date_entry" name="date_entry" data-id="entry_date" >                                       

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label> <span class="required"> * </span>Title / First Name / Last Name</label>
                                                    <input value="<?= $value->fname; ?>" type="text" id="name" class="form-control insert" name="fname" data-id="fname">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>Designation</label>
                                                    <input value="<?= $value->designation; ?>" type="text" id="designation" class="form-control insert" name="designation" data-id="designation">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>Company Name</label>
                                                    <input value="<?= $value->company_name; ?>" type="text" id="company_name" class="form-control insert" name="company_name" data-id="company_name">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <label>Code</label>
                                                        <div class="input-group">
                                                            <?php get_country_code_searchbox($id = '', $name = '', $redirurl = '', $class = 'insert', $attr = 'data-id="tel_mobile_code"', $db_id = $value->tel_mobile_code); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <label>  <span class="required"> * </span>Tel: Mobile #</label>
                                                        <input value="<?= $value->tel_mobile; ?>" type="text" id="mobile_no" class="form-control insert" name="mobile_no" data-id="tel_mobile">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <label>Code</label>
                                                        <div class="input-group">
                                                            <?php get_country_code_searchbox($id = '', $name = '', $redirurl = '', $class = 'insert', $attr = 'data-id="tel_mobile2_code"', $db_id = $value->tel_mobile2_code); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <label>  <span class="required"> * </span>Tel: Mobile2 #</label>
                                                        <input value="<?= $value->tel_mobile2; ?>" type="text" id="" class="form-control insert" name="mobile_no" data-id="tel_mobile2">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <label>Code</label>
                                                        <div class="input-group">
                                                            <?php get_country_code_searchbox($id = '', $name = '', $redirurl = '', $class = 'insert', $attr = 'data-id="tel_mobile_business_code"', $db_id = $value->tel_mobile_business_code); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <label>Tel: Business / Home</label>
                                                        <input type="text" class="form-control insert" name="tel_business" id="tel_business" data-id="tel_mobile_business" value="<?= $value->tel_mobile_business; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div  class="col-md-6">
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <label>Code</label>
                                                        <div class="input-group">
                                                            <?php get_country_code_searchbox($id = '', $name = '', $redirurl = '', $class = 'insert', $attr = 'data-id="tel_mobile_business_sec_code"', $db_id = $value->tel_mobile_business_sec_code); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <label>Tel 2: Business / Home</label>
                                                        <input type="text" class="form-control insert" name="" id="tel_business2" data-id="tel_mobile_business_sec" value="<?= $value->tel_mobile_business_sec; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label><span class="importent_note">*</span>Email: Private</label>
                                                    <input value="<?= $value->email_private; ?>" type="text" id="email" class="form-control lowercase insert" name="email" data-id="email_private">
                                                    <span id="error_element_email"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>Email 2: Private</label>
                                                    <input type="text" class="form-control lowercase insert" name="" id="email2" data-id="email_private_sec" value="<?= $sec_email_pvt; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>Email: Business</label>
                                                    <input value="<?= $value->email_business; ?>" type="text" id="email_business" class="form-control lowercase insert"  name="email_business" data-id="email_business">
                                                </div>
                                            </div>
                                        </div>
                                        <div  class="col-md-6">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>Email 2: Business</label>
                                                    <input type="text" class="form-control lowercase insert" name="" id="email_business2" data-id="email_business_sec" value="<?= $value->email_business_sec; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>Address: Street / Building / Area</label>
                                                    <textarea class="form-control form-control-inline input insert" id="address" name="address" data-id="address"><?= $value->address ?></textarea>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>City</label>
                                                    <input value="<?= $value->city; ?>" type="text" id="city" class="form-control insert" name="city" data-id="city">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label>Country</label>
                                                <?= get_nationality_dropdow($id = 'country', $name = 'country', $class = 'insert', $redirurl = '', $nationality_id = $value->country, $attr = 'data-id="country"'); ?>
                                                <!--<input value="<?php // echo $value->country;                ?>" type="text" id="country" class="form-control insert" name="country" data-id="country">-->
                                            </div></div>
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>Company website</label>
                                                    <input value="<?= $value->company_website; ?>" type="text" id="company_website" class="form-control insert" name="company_website" data-id="company_website">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>Company website 2</label>
                                                    <input type="text" class="form-control insert" name="" id="company_website2" data-id="company_website_sec" value="<?= $value->company_website_sec; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>Child Name</label>
                                                    <input value="<?= $value->child_name; ?>" type="text" id="child_name" class="form-control insert" name="child_name" data-id="child_name">
                                                </div>
                                            </div>
                                        </div>
                                        <div  class="col-md-6">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>Child Name 2</label>
                                                    <input type="text" class="form-control insert" name="" id="child_name2" data-id="child_name_sec" value="<?= $value->child_name_sec; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>Child’s Date of Birth</label>
                                                    <input value="<?php
                                                    if ($value->child_dob) {
                                                        echo date('Y-m-d', strtotime($value->child_dob));
                                                    }
                                                    ?>" type="text" id="child_dob" class="datepicker  form-control insert" name="child_dob" data-id="child_dob">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>Parent’s DOB</label>
                                                    <input value="<?php
                                                    if ($value->parent_dob) {
                                                        echo date('Y-m-d', strtotime($value->parent_dob));
                                                    }
                                                    ?>" type="text" id="parent_dob" class=" datepicker form-control insert" name ="parent_dob" data-id="parent_dob">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input has-success">
                                                <label>Religion:</label>
                                                <div class="md-radio-inline">
                                                    <div class="md-radio">
                                                        <input 
                                                        <?= $value->religion == '' ? '' : $value->religion == 'Christian' ? 'checked="checked"' : '' ?>
                                                            type="radio" id="christian" class="md-check religion" name="religion" value="Christian">
                                                        <label for="christian">
                                                            <span></span> 
                                                            <span class="check"></span>
                                                            <span class="box"></span>Christian </label>
                                                    </div>
                                                    <div class="md-radio">
                                                        <input 
                                                        <?= $value->religion == '' ? '' : $value->religion == 'Muslim' ? 'checked="checked"' : '' ?>
                                                            type="radio" id="muslim" class="md-check religion" name="religion"value="Muslim">
                                                        <label for="muslim">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Muslim</label>
                                                    </div>
                                                    <div class="md-radio">
                                                        <input 
                                                        <?= $value->religion == '' ? '' : $value->religion == 'Hindu' ? 'checked="checked"' : '' ?>
                                                            type="radio" id="hindu" class="md-check religion" name="religion" value="Hindu">
                                                        <label for="hindu">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Hindu </label>
                                                    </div>
                                                    <?php $religion = ['Hindu', 'Muslim', 'Christian']; ?>
                                                    <div class="md-radio">
                                                        <input 
                                                        <?php
                                                        if (!in_array($value->religion, $religion)) {
                                                            echo 'checked="checked"';
                                                        }
                                                        ?>
                                                            type="radio" id="religion_other" class="md-check religion" name="religion" value="Other">
                                                        <label for="religion_other">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Other</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6"   >
                                            <div class="form-group form-md-line-input has-success specify_religion" <?php if (!in_array($value->religion, $religion)) { ?> style="display:block" <?php } else { ?> style="display:none" <?php } ?>>
                                                <div class="input-icon">
                                                    <label>Please Specify Other Religion</label>
                                                    <input  type="text" id="specify_religion" class="form-control insert" name ="specify_religion" data-id="religion" value="<?= $value->religion; ?>">

                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>Note</label>
                                                    <textarea class="form-control form-control-inline input insert" id="note" name="note" data-id="note"><?= $value->note ?></textarea>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6" >
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>News Letter</label>
                                                    </br></br>
                                                    <div class="md-radio-inline " >
                                                        <div class="md-radio">
                                                            <input 
                                                            <?= $value->news_letter == '' ? '' : $value->news_letter == 'subscriber' ? 'checked="checked"' : '' ?>
                                                                type="radio" id="subscriber" name="newsletter" class="md-radiobtn" value="subscriber">
                                                            <label for="subscriber">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Subscriber</label>
                                                        </div>
                                                        <div class="md-radio has-success">
                                                            <input 
                                                            <?= $value->news_letter == '' ? '' : $value->news_letter == 'unsubscriber' ? 'checked="checked"' : '' ?>
                                                                type="radio" id="unsubscriber" name="newsletter" class="md-radiobtn" value="unsubscriber">
                                                            <label for="unsubscriber">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Un-subscribe </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>Photo Release</label>
                                                    <div class="form-group form-md-line-input form-md-floating-label ">
                                                        <select class="form-control edited insert" id="form_control_1" data-id="photo_release">
                                                            <option value="">Select</option>
                                                            <?php
                                                            if (isset($photo_rs)) {
                                                                foreach ($photo_rs as $key => $photo_release) {
                                                                    if ($value->photo_release == $key) {
                                                                        $select = "selected='selected'";
                                                                    } else {
                                                                        $select = '';
                                                                    }
                                                                    echo '<option ' . $select . ' value="' . $key . '">' . $photo_release . '</option>';
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>    














                                        <div class="col-md-12" style="border-top: solid 1px #bfbfbf;margin-top: 34px;">
                                            <div class="form-group form-md-line-input has-success" >
                                                <div class="input-icon">
                                                    <br>
                                                    <label>  <span class="required"> * </span>How did you hear about us?</label>
                                                    <select class="form-control insert" id="hear_about_us" name="hear_about_us" data-id="hear_about_us">
                                                        <option value="">Select</option>
                                                        <?php
                                                        if (isset($hear_About_us)) {
                                                            foreach ($hear_About_us as $key => $hear_About) {
                                                                $select = '';
                                                                if ($value->hear_about_us == $key) {
                                                                    $select = "selected='selected'";
                                                                }
                                                                echo '<option ' . $select . ' value="' . $key . '">' . $hear_About . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $name_hear_about_us = 'none';
                                        if ($value->hear_about_us == 1 || $value->hear_about_us == 2 || $value->hear_about_us == 3 || $value->hear_about_us == 9) {
                                            $name_hear_about_us = 'block';
                                        }
                                        ?>
                                        <div  id="specify_name_hear_about_us" class="col-md-6" style="min-height: 120px !important;display: <?= $name_hear_about_us ?>;">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <br>
                                                    <label>Please Specify the Name</label>

                                                    <input value="<?= $value->about_us_specify ?>" type="text"  id="referral_name" class="form-control insert" name ="referral_name" data-id="about_us_specify">
                                                </div>
                                            </div>     
                                        </div>
                                        <?php
                                        $internet_socialmedia = 'none';
                                        if ($value->hear_about_us == 8) {
                                            $internet_socialmedia = 'block';
                                        }
                                        ?>
                                        <div  id="internet_socialmedia" class="col-md-6" style="display: <?= $internet_socialmedia ?>;">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <br>
                                                    <label>Specify Internet/ social media</label>
                                                    <select class="form-control edited insert" id="internet_social_md" data-id="about_us_internet_socialmedia">
                                                        <option value="">Select</option>
                                                        <?php
                                                        if (isset($social_media)) {
                                                            $specify_other = 'none';
                                                            if ($value->about_us_internet_socialmedia == 9) {
                                                                $specify_other = 'block';
                                                            }
                                                            foreach ($social_media as $key => $social) {
                                                                $select = '';
                                                                if ($value->about_us_internet_socialmedia == $key) {
                                                                    $select = "selected='selected'";
                                                                }
                                                                echo '<option ' . $select . ' value="' . $key . '">' . $social . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div  id="specify_other_media" class="col-md-6" style="display: <?= $specify_other ?>;">
                                            <div class="form-group form-md-line-input has-success" >
                                                <div class="input-icon">
                                                    <br>
                                                    <label>Please Specify</label>
                                                    <input value="<?= $value->internet_other ?>" type="text" id="specify_other" class="form-control insert" name="specify_other" data-id="internet_other">
                                                </div>
                                            </div>
                                        </div>








                                        <div class="col-md-12" style="border-top: solid 1px #bfbfbf;margin-top: 34px;">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label> 
                                                        <br>
                                                        <span class="required"> * </span>Categories for Nature of Data / Nature of Business</label>
                                                    <select class="form-control edited insert" id="categories_nature" name="categories_nature" data-id="categories_nature">
                                                        <option value="">Select</option>
                                                        <?php
                                                        if (isset($categories)) {
                                                            foreach ($categories as $key => $category) {
                                                                $select = '';
                                                                if ($value->categories_nature == $key) {
                                                                    $select = "selected='selected'";
                                                                }
                                                                echo '<option ' . $select . ' value="' . $key . '">' . $category . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>

                                                </div>
                                            </div>
                                        </div> 
                                        <?php
                                        $active_client_dis = 'none';
                                        if ($value->categories_nature == 1) {
                                            $active_client_dis = 'block';
                                        }
                                        ?>
                                        <div id="active_client" class="col-md-6" style="display: <?= $active_client_dis ?>;">
                                            <div class="form-group form-md-line-input has-success" >
                                                <div class="input-icon">
                                                    <br>
                                                    <label>Active Client</label>
                                                    <select class="form-control edited insert" id="active_client_val" data-id="active_client">
                                                        <option value="">Select</option>
                                                        <?php
                                                        if (isset($active_client)) {
                                                            foreach ($active_client as $key => $active) {
                                                                $select = '';
                                                                if ($value->active_client == $key) {
                                                                    $select = "selected='selected'";
                                                                }
                                                                echo '<option ' . $select . ' value="' . $key . '">' . $active . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> 
                                        <?php
                                        $disp = 'none';
                                        if ($value->active_client == 8 && $value->categories_nature == 1) {
                                            $disp = 'block';
                                        }
                                        ?>
                                        <div class="col-md-6" id="camp" style="display:<?= $disp ?>;">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <br>
                                                    <label>  <span class="required"></span>Camp</label>
                                                    <select class="form-control edited insert" id="camp_select" name="camp" data-id="camp">
                                                        <option value="">Select</option>
                                                        <?php
                                                        if (isset($camp_category)) {
                                                            foreach ($camp_category as $key => $camp) {
                                                                $select = '';
                                                                if ($value->camp == $key) {
                                                                    $select = "selected='selected'";
                                                                }
                                                                echo '<option ' . $select . '  value="' . $key . '">' . $camp->sub_category_name . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> 
                                        <?php
                                        $disply = 'none';
                                        $disply222 = 'none';
                                        if ($value->active_client == 5 || $value->active_client == 6) {
                                            $disply = 'block';

                                            if ($value->therapy_specify == 'Outreach') {
                                                $disply222 = 'block';
                                            }
                                        }
                                        ?>
                                        <div id="speech_theraphy" class="col-md-6" style="display: <?= $disply ?>;">
                                            <div class="input-icon">
                                                <br>
                                                <label>Speech Language Therapy</label>
                                                <div class="md-radio-inline " >
                                                    <div class="md-radio">
                                                        <input type="radio" <?= $value->therapy_specify == 'Centre' ? 'checked=""' : '' ?>  id="speech_centre" name="speech_lang" class="md-radiobtn" value="Centre">
                                                        <label for="speech_centre">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Centre</label>
                                                    </div>
                                                    <div class="md-radio has-success">
                                                        <input type="radio" <?= $value->therapy_specify == 'Outreach' ? 'checked=""' : '' ?> id="speech_outreach" name="speech_lang" class="md-radiobtn" value="Outreach">
                                                        <label for="speech_outreach">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span>Outreach</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div  id="specify_other_active" class="col-md-6" style="display: <?= $disply222 ?>">
                                            <div class="form-group form-md-line-input has-success" >
                                                <div class="input-icon">
                                                    <label>Please Specify</label>
                                                    <br>
                                                    <input value="<?= $value->active_client_specify ?>" type="text" id="specify_other_active_txt" class="form-control insert" name="specify_other_active_txt" data-id="active_client_specify">
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $category_other_sub = 'none';
                                        if ($value->categories_nature == 2 || $value->categories_nature == 3) {
                                            $category_other_sub = 'block';
                                        }
                                        ?>
                                        <div  id="category_other_sub" class="col-md-6" style="display: <?= $category_other_sub ?>;">
                                            <div class="form-group form-md-line-input has-success" >
                                                <div class="input-icon">
                                                    <label>Please Specify</label>
                                                    </br></br>
                                                    <input value="<?= $value->categories_nature_specify ?>" type="text" id="specify_other_cate" class="form-control insert" name="specify_other_cate" data-id="categories_nature_specify">
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $displ = 'none';
                                        if ($value->categories_nature == 5) {
                                            $displ = 'block';
                                        }
                                        ?>
                                        <div class="col-md-6" id="nature_of_business_other" style="display: <?= $displ ?>;">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <?php $select = 'selected="selected"'; ?>
                                                    <label>Others (Nature of business)</label>  </br> </br>
                                                    <select class="form-control insert" id="nature_of_busines_other" data-id="nature_of_busines_other">
                                                        <option   value="">Select</option>
                                                        <option <?= $value->nature_of_busines_other == 1 ? $select : '' ?> value="1">Parents</option>
                                                        <option <?= $value->nature_of_busines_other == 2 ? $select : '' ?> value="2">School & Nursey </option>
                                                        <option <?= $value->nature_of_busines_other == 3 ? $select : '' ?> value="3">Therapy Centres & Therapists</option>
                                                        <option <?= $value->nature_of_busines_other == 4 ? $select : '' ?> value="4">Medical centre</option>
                                                        <option <?= $value->nature_of_busines_other == 5 ? $select : '' ?> value="5">Charity / Support Groups / NGO / Non-Profit</option>
                                                        <option <?= $value->nature_of_busines_other == 6 ? $select : '' ?> value="6">Family, Kids & Afterschool Activities</option>
                                                        <option <?= $value->nature_of_busines_other == 7 ? $select : '' ?> value="7">Lifestyle: Food / Nutrition / Hotels / Restaurants</option>
                                                        <option <?= $value->nature_of_busines_other == 8 ? $select : '' ?> value="8">Entertainment / Drama / Music / Sports</option>
                                                        <option <?= $value->nature_of_busines_other == 9 ? $select : '' ?> value="9">Suppliers</option>
                                                        <option <?= $value->nature_of_busines_other == 10 ? $select : '' ?> value="10">Government</option>
                                                        <option <?= $value->nature_of_busines_other == 11 ? $select : '' ?> value="11">Insurances</option>
                                                        <option <?= $value->nature_of_busines_other == 12 ? $select : '' ?> value="12">IBG offices / Seven Tides</option>
                                                        <option <?= $value->nature_of_busines_other == 13 ? $select : '' ?> value="13">Event Organisers</option>
                                                        <option <?= $value->nature_of_busines_other == 14 ? $select : '' ?> value="14">Sensation Station team</option>
                                                        <option <?= $value->nature_of_busines_other == 15 ? $select : '' ?> value="15">Others / Corporates</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="other_nature_bs_group_div" style="">
                                            <?php $disp = $value->nature_of_busines_other == 2 ? 'block' : 'none' ?>
                                            <div  id="school_nurs_div" class="col-md-6 " style="display: <?= $disp ?>">
                                                <div class="form-group form-md-line-input has-success" >
                                                    <div class="input-icon">
                                                        <label>School & Nursey</label>
                                                        <br><br>
                                                        <select data-id="school_nurs" class="form-control category_nature_other insert" id="school_nurs">
                                                            <option value="">select</option>
                                                            <option <?= $value->school_nurs == 1 ? $select : '' ?> value="1">SENCOs / Inclusion / Learning Suppor</option>
                                                            <option <?= $value->school_nurs == 2 ? $select : '' ?> value="2">Others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $disp = $value->nature_of_busines_other == 3 ? 'block' : 'none' ?>
                                            <div  id="therapy_centres_therapists_div" class="col-md-6"  style="display: <?= $disp ?>;">
                                                <div class="form-group form-md-line-input has-success" >
                                                    <div class="input-icon">
                                                        <label>Therapy Centres & Therapists</label>
                                                        <br><br>
                                                        <select data-id="therapy_centres_therapists" class="form-control category_nature_other insert" id="therapy_centres_therapists">
                                                            <option value="">select</option>
                                                            <option <?= $value->therapy_centres_therapists == 1 ? $select : '' ?> value="1">SLT</option>
                                                            <option <?= $value->therapy_centres_therapists == 2 ? $select : '' ?> value="2">OT</option>
                                                            <option <?= $value->therapy_centres_therapists == 3 ? $select : '' ?> value="3">Others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $disp = $value->nature_of_busines_other == 4 ? 'block' : 'none' ?>
                                            <div  id="medical_centre_div" class="col-md-6" style="display: <?= $disp ?>;">
                                                <div class="form-group form-md-line-input has-success" >
                                                    <div class="input-icon">
                                                        <label>Medical centre</label>
                                                        <br><br>
                                                        <select data-id="medical_centre" class="form-control category_nature_other insert" id="medical_centre">
                                                            <option value="">select</option>
                                                            <option <?= $value->medical_centre == 1 ? $select : '' ?> value="1">Paediatrics</option>
                                                            <option <?= $value->medical_centre == 2 ? $select : '' ?> value="2"v>Others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $disp = $value->nature_of_busines_other == 9 ? 'block' : 'none' ?>
                                            <div  id="suppliers_div" class="col-md-6" style="display: <?= $disp ?>;">
                                                <div class="form-group form-md-line-input has-success" >
                                                    <div class="input-icon">
                                                        <label>Suppliers</label>
                                                        <br><br>
                                                        <select data-id="suppliers_dropdown" class="form-control category_nature_other insert" id="suppliers_dropdown">
                                                            <option value="">select</option>
                                                            <option <?= $value->suppliers_dropdown == 1 ? $select : '' ?> value="1">SEN & Education</option>
                                                            <option <?= $value->suppliers_dropdown == 2 ? $select : '' ?> value="2">Others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $disp = 'none';
                                        $tb = $value->nature_of_busines_other;
                                        if ($value->school_nurs == 2 && $tb == 2) {
                                            $disp = 'block';
                                        } else if ($value->therapy_centres_therapists == 3 && $tb == 3) {
                                            $disp = 'block';
                                        } else if ($value->medical_centre == 2 && $tb == 4) {
                                            $disp = 'block';
                                        } else if ($value->suppliers_dropdown == 2 && $tb == 9) {
                                            $disp = 'block';
                                        }
                                        ?>
                                        <div  id="nature_of_buss_others_sub" class="col-md-6" style="display: <?= $disp ?>;">
                                            <div class="form-group form-md-line-input has-success" >
                                                <div class="input-icon">
                                                    <label>Please Specify</label>
                                                    </br></br>
                                                    <input value="<?= $value->nature_of_busi_others_sub ?>" type="text" id="nature_of_busi_others_sub" class="form-control insert" name="nature_of_busi_others_sub" data-id="nature_of_busi_others_sub">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" id="comment_div" style="display:<?= $value->categories_nature == 6 ? 'block' : 'none'; ?>;">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>Comment</label>
                                                    <textarea class="form-control form-control-inline input insert" id="" name="note" data-id="comment"><?= $value->comment ?></textarea>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" id="comment_div" style="border-top: solid 1px #bfbfbf;margin-top: 34px;">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>General Notes :</label>
                                                    <textarea class="form-control form-control-inline input insert"  name="note" data-id="genral_notes"><?= $value->genral_notes ?></textarea>
                                                </div>
                                            </div>
                                        </div>
























                                        <div class="form-actions">
                                            <div class="col-md-12" style="  text-align: right;  margin-bottom: 30px;">
                                                </br>
                                                <button type="submit" class="btn default green-stripe" id="update_marketing" data-id="<?= $value->id; ?>">Update</button>
                                                <a  class="btn default" id="marketing_back"  href="<?= base_url('Home/view_marketing'); ?>">Back</a>
                                            </div>

                                            <div class="clearfix"></div>
                                        </div>
                                </form>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>  
            </div>
        </div>  
    </div>
</div>  
<style>
    .error{
        color:red !important;
    }
</style>