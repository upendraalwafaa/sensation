
<?php 
    $date = date('d-m-Y'); 
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
   $child_date='';
   $parent_date='';
   $photorelease='';
   $hear_about='';
   $social='';
   $category='';
   $active='';
   
?>

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">
                
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption font-green">
							<span class="caption-subject bold uppercase">MARKETING DETAILS</span>
						</div>
					</div>
					
        			<?php 		
                    if(isset($marketing))
                    {
                        foreach($marketing as $value)
                        {
                            if($value->child_dob) {$child_date  =date("d-m-Y",$value->child_dob); }
                            if($value->parent_dob) {$parent_date  =date("d-m-Y",$value->parent_dob); }
                            if($value->photo_release){$photorelease =$photo_rs[$value->photo_release];}
                            if($value->hear_about_us){$hear_about =$hear_About_us[$value->hear_about_us];}
                            if($value->about_us_internet_socialmedia){$social =$social_media[$value->about_us_internet_socialmedia];}
                            if($value->categories_nature){$category =$categories[$value->categories_nature];}
                            if($value->active_client){$active =$active_client[$value->active_client];}
                        ?>
                         
                         <table class="col-lg-6 table-striped no-footer" style="border-right: solid 1px #DCDCDC;">
                             <tr>
                                 <td> <label >Entry Date</label></td>
                                 <td>:</td>
                                 <td><?= date("d-m-Y",$value->entry_date); ?></td>
                             </tr>
                             <tr>
                                  <td> <label >Title / First Name / Last Name</label></td>
                                  <td>:</td>
                                 <td><?= $value->fname; ?></td>
                             </tr>
                             <tr>
                                <td><label>Designation </label></td>
                                <td>:</td>
                                <td><?= $value->designation; ?></td>
                             </tr>
                             <tr>
                                    <td><label>Company Name </label></td>
                                    <td>:</td>
                                    <td><?= $value->company_name; ?></td>
                             </tr>
                             <tr>
                                    <td> <label >Tel: Mobile # </label></td>
                                    <td>:</td>
                                    <td><?= $value->tel_mobile; ?></td>
                             </tr>
                             <tr>
                                   <td> <label >Tel: Business / Home </label></td>
                                   <td>:</td>
                                   <td></td>
                             </tr>
                             <tr>
                                   <td> <label >Tel 2: Business / Home</label></td>
                                   <td>:</td>
                                   <td></td>
                             </tr>
                             <tr>
                                   <td> <label >Email: Private</label></td>
                                   <td>:</td>
                                   <td><?= $value->email_private; ?></td>
                             </tr>
                             <tr>
                                   <td> <label >Email 2: Private</label></td>
                                   <td>:</td>
                                   <td></td>
                             </tr>
                             <tr>
                                   <td> <label >Email: Business</label></td>
                                   <td>:</td>
                                   <td><?= $value->email_business; ?></td>
                             </tr>
                             <tr>
                                   <td> <label >Email 2: Business</label></td>
                                   <td>:</td>
                                   <td></td>
                             </tr>
                             <tr>
                                   <td> <label >Adress</label></td>
                                   <td>:</td>
                                   <td><?= $value->address; ?></td>
                             </tr>
                              <tr>
                                   <td> <label >City</label></td>
                                   <td>:</td>
                                   <td><?= $value->city; ?></td>
                             </tr>
                              <tr>
                                   <td> <label >Country</label></td>
                                   <td>:</td>
                                   <td><?= $value->country; ?></td>
                             </tr>
                              <tr>
                                   <td> <label >Company website</label></td>
                                   <td>:</td>
                                   <td><?= $value->address; ?></td>
                             </tr>
                             <tr>
                                   <td> <label >Company website 2</label></td>
                                   <td>:</td>
                                   <td><?= $value->company_website ; ?></td>
                             </tr>
                              <tr>
                                   <td> <label >Child Name</label></td>
                                   <td>:</td>
                                   <td><?= $value->child_name ; ?></td>
                             </tr>
                         </table>
                         <table class="col-lg-6 table-striped no-footer">
                             
                              <tr>
                                   <td> <label >Child Name 2</label></td>
                                   <td>:</td>
                                   <td><?= $value->child_name_sec ; ?></td>
                             </tr>
                              <tr>
                                   <td> <label >Child DOB</label></td>
                                   <td>:</td>
                                   <td><?=$child_date; ?></td>
                             </tr>
                              <tr>
                                   <td> <label >Parent DOB</label></td>
                                   <td>:</td>
                                   <td><?=$parent_date ; ?></td>
                             </tr>
                              <tr>
                                   <td> <label >Religion</label></td>
                                   <td>:</td>
                                   <td><?= $value->religion ; ?></td>
                             </tr>
                              <tr>
                                   <td> <label >Note </label></td>
                                   <td>:</td>
                                   <td><?= $value->note ; ?></td>
                             </tr>
                              <tr>
                                   <td> <label >News Letter  </label></td>
                                   <td>:</td>
                                   <td><?= $value->news_letter ; ?></td>
                             </tr>
                              <tr>
                                   <td> <label >Photo Release </label></td>
                                   <td>:</td>
                                   <td><?= $photorelease ; ?></td>
                             </tr>
                             <tr>
                                   <td> <label >How did you hear about us  </label></td>
                                   <td>:</td>
                                   <td><?= $hear_about ; ?></td>
                             </tr>
                             <tr>
                                   <td> <label >Please Specify the Name</label></td>
                                   <td>:</td>
                                   <td><?= $value->about_us_specify ; ?></td>
                             </tr>
                             <tr>
                                   <td> <label >Specify Internet/ social media </label></td>
                                   <td>:</td>
                                   <td><?= $social ; ?></td>
                             </tr>
                               <tr>
                                   <td> <label >Note </label></td>
                                   <td>:</td>
                                   <td><?= $value->internet_other ; ?></td>
                             </tr>
                               <tr>
                                   <td> <label >Categories for Nature of Data / Nature of Business  </label></td>
                                   <td>:</td>
                                   <td><?= $category ; ?></td>
                             </tr>
                               <tr>
                                   <td> <label >Active Client </label></td>
                                   <td>:</td>
                                   <td><?= $active ; ?></td>
                             </tr>
                              <tr>
                                   <td> <label >Speech Language Therapy </label></td>
                                   <td>:</td>
                                   <td><?= $value->internet_other ; ?></td>
                             </tr>
                              <tr>
                                   <td> <label >Note </label></td>
                                   <td>:</td>
                                   <td><?= $value->active_client_specify ; ?></td>
                             </tr>
                              <tr>
                                   <td> <label >Please Specify </label></td>
                                   <td>:</td>
                                   <td><?= $value->categories_nature_specify ; ?></td>
                             </tr>
                        </table>
                        <div class="col-md-12" style="  text-align: right;  margin-bottom: 30px;">
                        </br>
                        <a class="btn default green-stripe" href='<?= base_url("Home/edit_marketing/$value->id");?>'>Edit</a>
                        <a  class="btn default" id="marketing_back"  href="<?= base_url('Home/view_marketing');?>">Back</a>
                    </div>
                    <?php 
                        }
                    }?>
                    
                      <div class="clearfix"></div>
                            </div>
                      
                    </div>
                </div>  
            </div>
        </div>  
    </div>
 </div>  
