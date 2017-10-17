
<?php $date = date('d-m-Y'); 

    $photo_rs       =   ['1'=>'Yes: Therapy only','2'=>'Yes: Social Media','3'=>'Maybe / prior permission required','4'=>'No'];
    
    $hear_About_us  =   ['1'=>'Referral from School / Nursery','2'=>'Referral from another Mum / Friend',
                        '3'=>'Referral from another Co./Others','4'=>'Brochure / Flyer','5'=>'Roll-up Banner / IBG',
                        '6'=>'Direct Email','7'=>'Newsletter','8'=>'Internet / Social Media','9'=>'Others'];
                        
    $social_media   =   ['1'=>'Company Website','2'=>'Google Search','3'=>'Facebook','4'=>'LinkedIn',
                        '5'=>'Twitter','6'=>'Instagram','7'=>'Afterschool.ae','8'=>'YouTube / Video','9'=>'Others'];
                    
    $categories     =   ['1'=>'Active Client','2'=>'Waitlisted Client','3'=>'Inquiry only / Potential Sales Lead','4'=>'Inactive / Discharged Client','5'=>'Others'];
    
    $active_client  =   ['1'=>'Parent Consultation (PC)','2'=>'Child Screener','3'=>'Child Assessment','4'=>'Therapy Report','5'=>'Speech Language Therapy (SLT)',
                        '6'=>'Occupational Therapy (OT)','7'=>'Early Learning & Intervention Program (EILP)','8'=>'Camps','9'=>'Group Classes:',
                        '10'=>'Workshops & Training','11'=>'Sale of item/book','12'=>'Others'];




?>

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">

                
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                            <div class="caption font-green">
								<span class="caption-subject bold uppercase">MARKETING FORM</span>
							</div>
						</div>
					
					
            
                    <div class=" ">
                        <form role="form" id="marketing_form" >
                            <div class="form-body">
                                  <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                            <label>  <span class="required"> * </span>Date of Entry</label>
                                            <input type="text" class="form-control insert" value="<?php echo $date;?>" id="date_entry" name="date_entry" data-id="entry_date" disabled>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                            <label> <span class="required"> * </span>Title / First Name / Last Name</label>
                                            <input value="" type="text" id="name" class="form-control insert" name="fname" data-id="fname">
                                          
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                            <label>Designation</label>
                                            <input value="" type="text" id="designation" class="form-control insert" name="designation" data-id="designation">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                            <label>Company Name</label>
                                            <input value="" type="text" id="company_name" class="form-control insert" name="company_name" data-id="company_name">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                            <label>  <span class="required"> * </span>Tel: Mobile #</label>
                                            <input value="" type="text" id="mobile_no" class="form-control insert" name="mobile_no" data-id="tel_mobile">
                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                        <label>Tel: Business / Home</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control insert" name="tel_business" id="tel_business" data-id="tel_mobile_business">
                                            <span class="input-group-btn add_another" data-id="add_tel_business">
                                                <button class="btn green" type="button">
                                                    <i class="fa fa-plus-square has-success " aria-hidden="true" ></i>
                                                </button>
                                            </span>
                                           
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="additional_tel_business" class="col-md-6">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                        <label>Tel 2: Business / Home</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control insert" name="" id="tel_business2" data-id="tel_mobile_business_sec">
                                            <span class="input-group-btn remove_additional_field" data-id="additional_tel_business">
                                                <button class="btn green" type="button">
                                                   <i class="fa fa-minus-square " aria-hidden="true"  ></i>
                                                </button>
                                            </span>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                               <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                            <label><span class="importent_note">*</span>Email: Private</label>
                                            <div class="input-group">
                                                <input value="" type="text" id="email" class="form-control insert" name="email" data-id="email_private">
                                                <span class="input-group-btn add_another" data-id="add_email_private">
                                                    <button class="btn green" type="button">
                                                        <i class="fa fa-plus-square has-success " aria-hidden="true" ></i>
                                                    </button>
                                                </span>
                                            </div>
                                             <span id="error_element_email"></span>
                                        </div>
                                    </div>
                                </div>
                                <div id="additional_email_private" class="col-md-6">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                        <label>Email 2: Private</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control insert" name="" id="email2" data-id="email_business">
                                            <span class="input-group-btn remove_additional_field" data-id="additional_email_private">
                                                <button class="btn green" type="button">
                                                   <i class="fa fa-minus-square " aria-hidden="true"  ></i>
                                                </button>
                                            </span>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                            <label>Email: Business</label>
                                            <div class="input-group">
                                                <input value="" type="text" id="email_business" class="form-control insert" name="email_business" data-id="">
                                                <span class="input-group-btn add_another" data-id="add_email_business">
                                                    <button class="btn green" type="button">
                                                        <i class="fa fa-plus-square has-success " aria-hidden="true" ></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="additional_email_business" class="col-md-6">
                                     <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                        <label>Email 2: Business</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control insert" name="" id="email_business2" data-id="email_business_sec">
                                            <span class="input-group-btn remove_additional_field" data-id="additional_email_business">
                                                <button class="btn green" type="button">
                                                   <i class="fa fa-minus-square " aria-hidden="true"  ></i>
                                                </button>
                                            </span>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                            <label>Address: Street / Building / Area</label>
                                            <textarea class="form-control form-control-inline input insert" id="address" name="address" data-id="address"></textarea>
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                            <label>City</label>
                                            <input value="" type="text" id="city" class="form-control insert" name="city" data-id="city">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                            <label>Country</label>
                                           <input value="" type="text" id="country" class="form-control insert" name="country" data-id="country">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                           <label>Company website</label>
                                            <div class="input-group">
                                                <input value="" type="text" id="company_website" class="form-control insert" name="company_website" data-id="company_website">
                                                <span class="input-group-btn add_another" data-id="add_company_website">
                                                    <button class="btn green" type="button">
                                                        <i class="fa fa-plus-square has-success " aria-hidden="true" ></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="additional_company_website" class="col-md-6">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                        <label>Company website 2</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control insert" name="" id="company_website2" data-id="company_website_sec">
                                            <span class="input-group-btn remove_additional_field" data-id="additional_company_website">
                                                <button class="btn green" type="button">
                                                   <i class="fa fa-minus-square " aria-hidden="true"  ></i>
                                                </button>
                                            </span>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                           <label>Child Name</label>
                                            <div class="input-group">
                                               <input value="" type="text" id="child_name" class="form-control insert" name="child_name" data-id="child_name">
                                                <span class="input-group-btn add_another" data-id="add_child_name">
                                                    <button class="btn green" type="button">
                                                        <i class="fa fa-plus-square has-success " aria-hidden="true" ></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="additional_child_name" class="col-md-6">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                        <label>Child Name 2</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control insert" name="" id="child_name2" data-id="child_name_sec">
                                            <span class="input-group-btn remove_additional_field" data-id="additional_child_name">
                                                <button class="btn green" type="button">
                                                   <i class="fa fa-minus-square " aria-hidden="true"  ></i>
                                                </button>
                                            </span>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                            <label>Child’s Date of Birth</label>
                                             <input value="" type="text" id="child_dob" class="datepicker  form-control insert" name="child_dob" data-id="child_dob">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                            <label>Parent’s DOB</label>
                                             <input value="" type="text" id="parent_dob" class=" datepicker form-control insert" name ="parent_dob" data-id="parent_dob">
                                      
                                        </div>
                                    </div>
                                </div>
                                  
                                 <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success">
                                    <label>Religion:</label>
                                    <div class="md-radio-inline">
                                        <div class="md-radio">
                                            <input type="radio" id="christian" class="md-check religion" name="religion" value="Christian">
                                            <label for="christian">
                                                 <span></span> 
                                                <span class="check"></span>
                                                <span class="box"></span>Christian </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="muslim" class="md-check religion" name="religion"value="Muslim">
                                            <label for="muslim">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Muslim</label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="hindu" class="md-check religion" name="religion" value="Hindu">
                                            <label for="hindu">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Hindu </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="religion_other" class="md-check religion" name="religion" value="Other">
                                            <label for="religion_other">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Other</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success specify_religion">
                                        <div class="input-icon">
                                            <label>Please Specify the Name</label>
                                            <input  type="text" id="specify_religion" class="form-control insert" name ="specify_religion" data-id="religion">
                                      
                                        </div>
                                    </div>
                            </div>
                             <div class="col-md-12">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                            <label>Note</label>
                                            <textarea class="form-control form-control-inline input insert" id="note" name="note" data-id="note"></textarea>
                                      
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
                                                <input type="radio" id="subscriber" name="newsletter" class="md-radiobtn" value="subscriber">
                                                <label for="subscriber">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Subscriber</label>
                                            </div>
                                            <div class="md-radio has-success">
                                                <input type="radio" id="unsubscriber" name="newsletter" class="md-radiobtn" value="unsubscriber">
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
                                                if (isset($photo_rs)){
                                                        foreach ($photo_rs as $key=>$photo_release){
                                                            echo '<option ' . $select . ' value="' . $key . '">' . $photo_release . '</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                  
                                    </div>
                                </div>
                            </div>    
                             <div class="col-md-6" >
                                <div class="form-group form-md-line-input has-success">
                                    <div class="input-icon">
                                         <label>  <span class="required"> * </span>How did you hear about us?</label>
                                        <div class="form-group form-md-line-input form-md-floating-label ">
                                            <select class="form-control insert" id="hear_about_us" name="hear_about_us" data-id="hear_about_us">
                                                <option value="">Select</option>
                                                 <?php
                                                if (isset($hear_About_us)){
                                                        foreach ($hear_About_us as $key=>$hear_About){
                                                            echo '<option ' . $select . ' value="' . $key . '">' . $hear_About . '</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <div  id="specify_name_hear_about_us" class="col-md-6">
                                <div class="form-group form-md-line-input has-success">
                                    <div class="input-icon">
                                        <label>Please Specify the Name</label>
                                        </br></br>
                                        <input value="" type="text"  id="referral_name" class="form-control insert" name ="referral_name" data-id="about_us_specify">
                                    </div>
                                </div>     
                            </div>
                            <div  id="internet_socialmedia" class="col-md-6" >
                                <div class="form-group form-md-line-input has-success">
                                    <div class="input-icon">
                                          <label>Specify Internet/ social media</label>
                                        <div class="form-group form-md-line-input form-md-floating-label ">
                                            <select class="form-control edited insert" id="internet_social_md" data-id="about_us_internet_socialmedia">
                                                <option value="">Select</option>
                                                 <?php
                                                    if (isset($social_media)){
                                                        foreach ($social_media as $key=>$social){
                                                            echo '<option ' . $select . ' value="' . $key . '">' . $social . '</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                  
                                    </div>
                                </div>
                            </div>
                            <div  id="specify_other_media" class="col-md-6"  >
                                 <div class="form-group form-md-line-input has-success" >
                                    <div class="input-icon">
                                        <label>Please Specify</label>
                                        </br></br>
                                         <input value="" type="text" id="specify_other" class="form-control insert" name="specify_other" data-id="internet_other">
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="form-group form-md-line-input has-success">
                                    <div class="input-icon">
                                          <label>  <span class="required"> * </span>Categories for Nature of Data / Nature of Business</label>
                                        <div class="form-group form-md-line-input form-md-floating-label ">
                                            <select class="form-control edited insert" id="categories_nature" name="categories_nature" data-id="categories_nature">
                                                <option value="">Select</option>
                                                <?php
                                                if (isset($categories)){
                                                        foreach ($categories as $key=>$category){
                                                            echo '<option ' . $select . ' value="' . $key . '">' . $category . '</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                              <div id="active_client" class="col-md-12">
                                <div class="form-group form-md-line-input has-success" style="dispaly:none">
                                    <div class="input-icon">
                                          <label>Active Client</label>
                                        <div class="form-group form-md-line-input form-md-floating-label ">
                                            <select class="form-control edited insert" id="active_client_val" data-id="active_client">
                                                <option value="">Select</option>
                                                <?php
                                                if (isset($active_client)){
                                                        foreach ($active_client as $key=>$active){
                                                            echo '<option ' . $select . ' value="' . $key . '">' . $active . '</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                             <div id="speech_theraphy" class="col-md-6" >
                                <div class="form-group form-md-line-input has-success">
                                    <div class="input-icon">
                                        <label>Speech Language Therapy</label>
                                        </br></br>
                                            <div class="md-radio-inline " >
                                            <div class="md-radio">
                                                <input type="radio" id="speech_centre" name="speech_lang" class="md-radiobtn" value="Centre">
                                                <label for="speech_centre">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Centre</label>
                                            </div>
                                            <div class="md-radio has-success">
                                                <input type="radio" id="speech_outreach" name="speech_lang" class="md-radiobtn" value="Outreach">
                                                <label for="speech_outreach">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>Outreach</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div  id="specify_other_active" class="col-md-6"  >
                                 <div class="form-group form-md-line-input has-success" >
                                    <div class="input-icon">
                                        <label>Please Specify</label>
                                        </br></br>
                                         <input value="" type="text" id="specify_other_active_txt" class="form-control insert" name="specify_other_active_txt" data-id="active_client_specify">
                                    </div>
                                </div>
                            </div>
                            <div  id="category_other_sub" class="col-md-6"  >
                                 <div class="form-group form-md-line-input has-success" >
                                    <div class="input-icon">
                                        <label>Please Specify</label>
                                        </br></br>
                                         <input value="" type="text" id="specify_other_cate" class="form-control insert" name="specify_other_cate" data-id="categories_nature_specify">
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                 
                                    <div class="col-md-12" style="  text-align: right;  margin-bottom: 30px;">
      
                                        </br>
                                        <button type="submit" class="btn default green-stripe">Save</button>
                                        <button type="button" class="btn default">Cancel</button>
                                    </div>
                            
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>  
            </div>
        </div>  
    </div>
 </div>  
<style>
.error
{
    color:red !important;
}


    </style>
</style>