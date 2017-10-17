<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">
                <?php if(($elec_status[0]->status == 0 )){  ?>
                    <div class="col-lg-offset-1 col-lg-9 portlet light bordered">
						<p>You have already submitted the information</p>
                    </div>                 
                <?php } elseif(($elec_status[0]->status == 2)) { ?>
                    <div class="col-lg-offset-1 col-lg-9 portlet light bordered">
						<p>Link has been expired. Please contact Sensation Station</p>
                    </div>                 
                <?php } else { ?>                
                    <!--content Area  statrt-->
                    <div class="col-lg-offset-1 col-lg-9 portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-green">
                                <span class="caption-subject bold uppercase"> REGISTRATION FORM</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <input type="hidden" id="electronic_id" name="electronic_id" value="<?=$el_id?>" />
                            <input type="hidden" id="quatation_id" name="quatation_id" value="<?=$qt_id?>" />
                            <form role="form">
                                <div class="form-body div-span-main-cont">
                                    <div class="row">
                                          <input value="" type="hidden" id="encrypt_id" name="encrypt_id" > 
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>Child Name</label>
                                                    <input value="" type="text" id="child_name" class="form-control">
                                                    <span class="help-block">Ex :-Rahul Kumar</span>
                                                </div>
                                            </div>
    
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>Date Of Birth</label>
                                                    <input value="" type="text" id="date_of_birth" class="form-control date-picker">
                                                    <span class="help-block">Ex :-20/05/1994</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="col-md-6">
                                                <br>
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="md-radio">
                                                        <input type="radio" id="sib_Marred" value="Male" name="child_gender" class="md-radiobtn">
                                                        <label for="sib_Marred">
                                                            <span class="inc">Male</span>
                                                            <span class="check"></span>
                                                            <span class="box child_gender"></span> Male </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <br>
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="md-radio">
                                                        <input type="radio" value="Female" id="sib_female" name="child_gender" class="md-radiobtn">
                                                        <label for="sib_female">
                                                            <span class="inc">Female</span>
                                                            <span class="check"></span>
                                                            <span class="box child_gender"></span> Female </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon address-div">
                                                    <label>Address</label>
                                                    <textarea id="address" class="form-control" rows="3" style=""></textarea>
                                                     <span class="help-block">Ex :-Thomas Nolan Kaszas 5322 Otter Ln Middleberge</span>
                                                </div>
                                            </div>
    
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>  
                    <div class="col-lg-offset-1 col-lg-9 portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <span class="caption-subject bold uppercase font-green"> PARENT/GUARDIAN INFORMATION</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form role="form">
                                <div class="form-body div-span-main-cont">
                                    <div class="medical-tab-head">
                                        <div class="col-sm-2">
                                            <span class="caption-subject bold uppercase"> </span>
                                        </div>
                                        <div class="col-sm-5 text-center">
                                            <span class="caption-subject bold uppercase"> Father</span>
                                            <div class="col-sm-2"></div>
                                        </div>
                                        <div class="col-sm-5 text-center">
                                            <span class="caption-subject bold uppercase"> Mother</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2 span-row-in">
                                            <br>
                                            <label>Name</label>
                                        </div>
                                        <div class="col-sm-5 ">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="" type="text" class="form-control" id="father_name">
                                                    <span class="help-block">Ex :-Rahul Kumar</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="" type="text" class="form-control" id="mother_name">
                                                    <span class="help-block">Ex :-Gita Devi</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2 span-row-in">
                                            <br>
                                            <label>Nationality</label>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="" type="text" class="form-control" id="father_nationality">
                                                    <span class="help-block">Ex :-UAE,India</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="" type="text" class="form-control" id="mother_nationality">
                                                    <span class="help-block">Ex :-UAE,India</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2 span-row-in">
                                            <br>
                                            <label>Occupation</label>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="" type="text" id="father_occupation" class="form-control">
                                                    <span class="help-block">Ex :- Doctor , lifeguarding</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input type="text" class="form-control" value="" id="mother_occupation">
                                                    <span class="help-block">Ex :-House Wife , Doctor</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2 span-row-in">
                                            <br>
                                            <label>Mobile Number</label>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="" type="text" class="form-control" id="father_mobile">
                                                    <span class="help-block">Ex :- +971508897435,+917009876567</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="" type="text" class="form-control" id="mother_mobile">
                                                    <span class="help-block">Ex :- +971508897435,+917009876567</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2 span-row-in">
                                            <br>
                                            <label>Work Number</label>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="" type="text" class="form-control" id="father_work_number">
                                                    <span class="help-block">Ex :- 508897435</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="" type="text" class="form-control" id="mother_work_number">
                                                    <span class="help-block">Ex :- 508897435</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2 span-row-in">
                                            <br>
                                            <label>Home Number</label>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="" type="text" id="father_home_number" class="form-control">
                                                    <span class="help-block">Ex :- 97435</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="" type="text" id="mother_home_number" class="form-control">
                                                    <span class="help-block">Ex :- 97435</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2 span-row-in">
                                            <br>
                                            <label>Personal Email</label>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="" id="father_email" type="text" class="form-control">
                                                    <span class="help-block">Ex :- jumbian@google.com</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="" id="mother_email" type="text" class="form-control">
                                                    <span class="help-block">Ex :- jumbian@google.com</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <br>
                                            <label id="marital_staus_display">Marital Status</label>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="md-radio">
                                                    <input  type="radio" value="Marred" id="Marred" name="father_mother_marital_status" class="md-radiobtn">
                                                    <label for="Marred">
                                                        <span class="inc">Married</span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> Married </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="md-radio">
                                                    <input type="radio" value="Divorced" id="Divorced" name="father_mother_marital_status" class="md-radiobtn">
                                                    <label for="Divorced">
                                                        <span class="inc">Divorced</span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> Divorced </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="md-radio">
                                                    <input type="radio" id="Other" value="Other" name="father_mother_marital_status" class="md-radiobtn">
                                                    <label for="Other">
                                                        <span class="inc">Other</span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> Other </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>Please specify</label>
                                                    <input value="" type="text" id="other_marital_status" class="form-control">
                                                    <span class="help-block">Please specify</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-offset-1 col-lg-9 portlet light bordered">
    
                        <div class="portlet-body form">
                            <form role="form">
                                <div class="form-body div-span-main-cont">
                                    <div class=" medical-tab-head">
                                        <div class="col-sm-5 text-center">
                                            <span class="caption-subject bold uppercase"> Emergency Contact Name</span>
                                            <div class="col-sm-2"></div>
                                        </div>
                                        <div class="col-sm-3 text-center">
                                            <span class="caption-subject bold uppercase"> Contact Number</span>
                                        </div>
                                        <div class="col-sm-4 text-center">
                                            <span class="caption-subject bold uppercase"> Relationship to Child</span>
                                        </div>
                                    </div>
    
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="form-group form-md-line-input has-success"><b>1</b></div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="" type="text" class="form-control emergency_contact_name">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="" type="text"  class="form-control emergency_contact_number">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="" type="text" class="form-control relationship_to_child">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="form-group form-md-line-input has-success"><b>2</b></div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input type="text" value="" class="form-control emergency_contact_name">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input type="text" value="" class="form-control emergency_contact_number">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input type="text" value="" class="form-control relationship_to_child">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="medical-tab-head">
                                        <div class="col-sm-4 text-center">
                                            <span class="caption-subject bold uppercase"> Sibling Name</span>
                                            <div class="col-sm-2"></div>
                                        </div>
                                        <div class="col-sm-3 text-center">
                                            <span class="caption-subject bold uppercase"> Age</span>
                                        </div>
                                        <div class="col-sm-5 text-center">
                                            <span class="caption-subject bold uppercase"> Gender</span>
                                        </div>
                                    </div>
                                    <?php for ($i = 0; $i < count($sibling_details); $i++) { ?>
                                        <div class="row" id="sibling_div_<?= $i ?>">
                                            
                                            <div class="col-sm-4">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <input value="<?= $sibling_details == '' ? '' : $sibling_details[$i]->sibling_name ?>" type="text" class="form-control sibling_name">
                                                        <span class="help-block">Ex :-Rahul Kumar</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <input value="<?= $sibling_details == '' ? '' : $sibling_details[$i]->age ?>" type="text" class="form-control sibling_age">
                                                        <span class="help-block">Ex :-10</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 sibling_gender_btn" radio_btn_id="0">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="md-radio">
                                                            <input <?= $sibling_details == '' ? '' : $sibling_details[$i]->gender == 'Male' ? 'checked="checked"' : '' ?>  type="radio" id="sib_Male__<?= $i ?>" value="Male" name="sib_gender_status_<?= $i ?>" class="md-radiobtn">
                                                            <label class="sibling_gender_<?= $i ?>" for="sib_Male__<?= $i ?>">
                                                                <span class="inc">Male</span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Male </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="md-radio">
                                                            <input <?= $sibling_details == '' ? '' : $sibling_details[$i]->gender == 'Female' ? 'checked="checked"' : '' ?> value="Female" type="radio" id="sib_female_<?= $i ?>" name="sib_gender_status_<?= $i ?>" class="md-radiobtn">
                                                            <label class="sibling_gender_<?= $i ?>" for="sib_female_<?= $i ?>">
                                                                <span class="inc">Female</span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Female </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <br>
                                              <?php if($i!=0){
                                      ?><button type="button" div_id="1" class="btn red btn-xs remove_sibling">Remove</button><?php
                                        } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    
                                    <div id="add_more_sibiling_details" start_loop="<?= $i ?>"></div>
                                    
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button type="button" class="btn green-meadow" id="add_more_sibling">Add More</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="clearfix margin-top-10 note-span-div">
                                            <span class="label label-success"> NOTE: </span> &nbsp; Any additional adults living in the household?e.g. extended family,driver, maid etc.? (Please list their names and relationship to the child </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="<?= $child_details == '' ? '' : $child_details[0]->additional_sibling_details ?>" type="text" class="form-control" id="additional_sibling_details">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-offset-1 col-lg-9 portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <span class="caption-subject bold uppercase font-green"> CHILD COLLECTION AUTHORISATION FORM</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="clearfix margin-top-10 note-span-div">
                                <span class="label label-success"> NOTE: </span> &nbsp; Use of this form gives authorisation for a person other than the usual person (even a parent if our staff are unfamiliar with them) to collect your child from Sensation Station, e.g. the father, a friend, or a grandparent etc. You need to provide a copy of the persons photo ID and the authorised person must produce official photo identification upon arrival. We accept Emirates ID, a passport or UAE Driving license. </div>
                        </div>
                        <div class="portlet-body form div-span-main-cont">
                            <form role="form">
                                <div class="form-body">
                                    
                                    <div class=" medical-tab-head">
                                        <div class="col-sm-2 text-center">
                                            <span class="caption-subject bold uppercase">  NAME</span>
                                            <div class="col-sm-2"></div>
                                        </div>
                                        <div class="col-sm-4 text-center">
                                            <span class="caption-subject bold uppercase"> RELATIONSHIP  </span>
                                        </div>
                                        <div class="col-sm-3 text-left">
                                            <span class="caption-subject bold uppercase"> MOBILE TEL</span>
                                        </div>
                                        <div class="col-sm-3 text-left">
                                            <span class="caption-subject bold uppercase"> ID PROVIDED</span>
                                        </div>
                                    
                                    </div>
                                    
                                    <?php
                                    for ($i = 0; $i < count($authorisation_detail); $i++) {
                                        ?>
                                     
                                    
                                        <div class="row" id="child_authorisation_form_<?= $i ?>">
                                            
                                            <div class="col-sm-3">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <input type="text" value="<?= $authorisation_detail == '' ? '' : $authorisation_detail[$i]->name ?>" class="form-control child_authorisation_name">
                                                        <span class="help-block">Ex :-Rahul Kumar</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <input value="<?= $authorisation_detail == '' ? '' : $authorisation_detail[$i]->relationship ?>" type="text" class="form-control child_authorisation_relationship">
                                                        <span class="help-block">Ex :- Uncle,Friend</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <input value="<?= $authorisation_detail == '' ? '' : $authorisation_detail[$i]->mobile ?>" type="text" class="form-control child_authorisation_mobile">
                                                        <span class="help-block">Ex :-  +97150887453</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <input value="<?= $authorisation_detail == '' ? '' : $authorisation_detail[$i]->id_card ?>" type="text" class="form-control child_authorisation_id_provided">
                                                        <span class="help-block">Ex :-  556466666</span>
                                                    </div>
                                                </div>
                                            </div>  
                                            <?php if($i!=0){ ?>
                                            <div class="col-sm-1"> 
                                                <br> 
                                                <button type="button" div_id="<?= $i ?>" class="btn red btn-xs remove_authorisation_form">Remove</button>
                                            </div>
                                            <?php } ?>
                                        </div>
                                   
                                    <?php } ?>
                                    <div id="all_child_authorisation_form_details" start_loop="<?= $i ?>"></div>
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                           <button type="button" class="btn green-meadow add_more_child_authorisation_form" div_id="<?= $i ?>" >Add More</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="clearfix margin-top-10 note-span-div">
                                            <span class="label label-success"> NOTE: </span> &nbsp; Please note: If circumstances change with regard to this authorisation, it is important to inform Sensation Station immediately.
                                        </div>
                                    </div>
    
    
                                </div>
    
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-offset-1 col-lg-9 portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <span class="caption-subject bold uppercase font-green"> BACKGROUND INFORMATION</span>
                            </div>
                        </div>
    
                        <div class="portlet-body form">
                            <form role="form">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="clearfix margin-top-10 note-span-div">
                                            <span class="label label-success"> NOTE: </span> &nbsp; Dear Parent, please kindly complete this questionnaire to provide us with some background information about your child’s medical history, birth and infancy. A case history of your child’s milestone development including language, motor, sensory and social development will be taken during the parent consultation.  </div>
                                    </div>
                                    <div class="row note-span-div">
                                        <br>
                                        Please be assured that any personal information related to family or your child’s medical and developmental history / diagnosis cannot be accessed or shared by us without a clear signed consent from Parents / Legal Guardians (a release form). 
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-offset-1 col-lg-9 portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <span class="caption-subject bold uppercase font-green"> MEDICAL   HISTORY</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form role="form">
                                <div class="form-body div-span-main-cont">
                                
                                    <div class="col-lg-12 medical-tab-head">
                                        <div class="col-sm-5">
                                            <span class="caption-subject bold uppercase"> Please tick</span>
                                            <div class="col-sm-2"></div>
                                        </div>
                                        <div class="col-sm-1">
                                            <span class="caption-subject bold uppercase"> Yes</span>
                                        </div>
                                        <div class="col-sm-1">
                                            <span class="caption-subject bold uppercase"> No</span>
                                        </div>
                                        <div class="col-sm-5">
                                            <span class="caption-subject bold uppercase"> Please provide details and dates if required</span>
                                            <div class="col-sm-2"></div>
                                        </div>  
                                    </div> 
                                
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <br>
                                            Does your child have any diagnosis?
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="md-radio">
                                                    <input  <?= $medical_history == '' ? '' : $medical_history[0]->diagnosis == 'Yes' ? 'checked="checked"' : ''; ?> type="radio" id="diagnosis_yes" name="diagnosis" value="Yes" class="md-radiobtn">
                                                    <label for="diagnosis_yes">
                                                        <span class="inc">Yes</span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>  </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="md-radio">
                                                    <input <?= $medical_history == '' ? '' : $medical_history[0]->diagnosis == 'No' ? 'checked="checked"' : ''; ?> type="radio" id="diagnosis_no" value="No" name="diagnosis" class="md-radiobtn">
                                                    <label for="diagnosis_no">
                                                        <span class="inc">No</span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>  </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="<?= $medical_history == '' ? '' : $medical_history[0]->diagnosis == 'Yes' ? $medical_history[0]->diagnosis_desc : ''; ?>" type="text" class="form-control" id="diagnosis_extra_details">
                                                    <span class="help-block">Ex :- Any Char</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <br>
                                            Has your child undergone any medical intervention/prolonged period of hospitalisation?
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="md-radio">
                                                    <input type="radio" <?= $medical_history == '' ? '' : $medical_history[0]->hospitalisation == 'Yes' ? 'checked="checked"' : ''; ?> id="hospitalisation_yes" value="Yes" name="hospitalisation" class="md-radiobtn">
                                                    <label for="hospitalisation_yes">
                                                        <span class="inc">Yes</span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>  </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="md-radio">
                                                    <input value="No" type="radio" <?= $medical_history == '' ? '' : $medical_history[0]->hospitalisation == 'No' ? 'checked="checked"' : ''; ?> id="hospitalisation_no" name="hospitalisation" class="md-radiobtn">
                                                    <label for="hospitalisation_no">
                                                        <span class="inc">No</span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>  </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input type="text" id="hospitalisation_extra_details" value="<?= $medical_history == '' ? '' : $medical_history[0]->hospitalisation == 'Yes' ? $medical_history[0]->hospitalisation_desc : ''; ?>" class="form-control">
                                                    <span class="help-block">Ex :- Any Char</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <br>
                                            Was your child breastfed? If Yes, how long?
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="md-radio">
                                                    <input <?= $medical_history == '' ? '' : $medical_history[0]->breastfed == 'Yes' ? 'checked="checked"' : ''; ?> type="radio" value="Yes" id="breastfed_yes" name="breastfed" class="md-radiobtn">
                                                    <label for="breastfed_yes">
                                                        <span class="inc">Yes</span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>  </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="md-radio">
                                                    <input <?= $medical_history == '' ? '' : $medical_history[0]->breastfed == 'No' ? 'checked="checked"' : ''; ?> type="radio" id="breastfed_no" value="No" name="breastfed" class="md-radiobtn">
                                                    <label for="breastfed_no">
                                                        <span class="inc">No</span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>  </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="<?= $medical_history == '' ? '' : $medical_history[0]->breastfed == 'Yes' ? $medical_history[0]->breastfed_desc : ''; ?>" id="breastfed_extra_details" type="text" class="form-control">
                                                    <span class="help-block">Ex :- Any Char</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <br>
                                            Any known allergies, food intolerances or sensitivities. Any external triggers?
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="md-radio">
                                                    <input <?= $medical_history == '' ? '' : $medical_history[0]->external_triggers == 'Yes' ? 'checked="checked"' : ''; ?> value="Yes" type="radio" id="external_triggers_Yes" name="external_triggers" class="md-radiobtn">
                                                    <label for="external_triggers_Yes">
                                                        <span class="inc">Yes</span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>  </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="md-radio">
                                                    <input <?= $medical_history == '' ? '' : $medical_history[0]->external_triggers == 'No' ? 'checked="checked"' : ''; ?> type="radio" value="No" id="external_triggers_no" name="external_triggers" class="md-radiobtn">
                                                    <label for="external_triggers_no">
                                                        <span class="inc">No</span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="<?= $medical_history == '' ? '' : $medical_history[0]->external_triggers == 'Yes' ? $medical_history[0]->external_triggers_desc : ''; ?>" id="external_triggers_extra_details" type="text" class="form-control">
                                                    <span class="help-block">Ex :- Any Char</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <br>
                                            Any history of allergies, autoimmune or genetic disorders IN FAMILY?
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="md-radio">
                                                    <input <?= $medical_history == '' ? '' : $medical_history[0]->disorders_in_fm == 'Yes' ? 'checked="checked"' : ''; ?> type="radio" value="Yes" id="disorders_in_fm_yes" name="disorders_in_fm" class="md-radiobtn">
                                                    <label for="disorders_in_fm_yes">
                                                        <span class="inc">Yes</span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>  </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="md-radio">
                                                    <input type="radio" <?= $medical_history == '' ? '' : $medical_history[0]->disorders_in_fm == 'No' ? 'checked="checked"' : ''; ?> value="No" id="disorders_in_fm_no" name="disorders_in_fm" class="md-radiobtn">
                                                    <label for="disorders_in_fm_no">
                                                        <span class="inc">No</span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>  </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="<?= $medical_history == '' ? '' : $medical_history[0]->disorders_in_fm == 'Yes' ? $medical_history[0]->disorders_in_fm_desc : ''; ?>" type="text" id="disorders_in_fm_extra_details" class="form-control">
                                                    <span class="help-block">Ex :- Any Char</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <br>
                                            Is your child on any medication?
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="md-radio">
                                                    <input <?= $medical_history == '' ? '' : $medical_history[0]->child_medication_history == 'Yes' ? 'checked="checked"' : ''; ?> type="radio" value="Yes" id="child_medication_history_yes" name="child_medication_history" class="md-radiobtn">
                                                    <label for="child_medication_history_yes">
                                                        <span class="inc">Yes</span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>  </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="md-radio">
                                                    <input value="No" <?= $medical_history == '' ? '' : $medical_history[0]->child_medication_history == 'No' ? 'checked="checked"' : ''; ?> type="radio" id="child_medication_history_no" name="child_medication_history" class="md-radiobtn">
                                                    <label for="child_medication_history_no">
                                                        <span class="inc">No</span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>  </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="<?= $medical_history == '' ? '' : $medical_history[0]->child_medication_history == 'Yes' ? $medical_history[0]->child_medication_history_desc : ''; ?>" type="text" id="child_medication_history_extra_details" class="form-control">
                                                    <span class="help-block">Ex :- Any Char</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <br>
                                            Has your child taken antibiotics for extended Periods of time or on a regular basis?
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="md-radio">
                                                    <input <?= $medical_history == '' ? '' : $medical_history[0]->extended_periods == 'Yes' ? 'checked="checked"' : ''; ?> value="Yes" type="radio" id="extended_periods_yes" name="extended_periods" class="md-radiobtn">
                                                    <label for="extended_periods_yes">
                                                        <span class="inc">Yes</span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>  </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="md-radio">
                                                    <input <?= $medical_history == '' ? '' : $medical_history[0]->extended_periods == 'No' ? 'checked="checked"' : ''; ?> value="No" type="radio" id="extended_periods_no" name="extended_periods" class="md-radiobtn">
                                                    <label for="extended_periods_no">
                                                        <span class="inc">No</span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>  </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="<?= $medical_history == '' ? '' : $medical_history[0]->extended_periods == 'Yes' ? $medical_history[0]->extended_periods_desc : ''; ?>" type="text" id="extended_periods_extra_Details" class="form-control">
                                                    <span class="help-block">Ex :- Any Char</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4>Have there been any frequent illnesses and complaints? (Please circle)</h4>
                                        </div>
                                    </div>
                                    <br>
                                    <?php
                                    if ($child_details != '') {
                                        $illness_Arr = explode('~', $child_details[0]->illnesses_and_complaints);
                                    }
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="md-checkbox"> 
                                                <?php
                                                $Colds = '';
                                                $Sore_Throats = '';
                                                $Ear_Infections = '';
                                                $Fevers = '';
                                                $Visual_Problems = '';
                                                $Coughs = '';
                                                $Headaches = '';
                                                $Joint_Aches = '';
                                                $Eczema = '';
                                                $Asthma = '';
                                                $Sinus_Infections = '';
                                                $Urinary_Tract = '';
                                                $illness_other_specify = '';
                                                if ($child_details != '') {
                                                    $illness_other_specify = $child_details[0]->other_illnesses;
                                                    if (in_array('Colds', $illness_Arr)) {
                                                        $Colds = 'checked="checked"';
                                                    }
    
                                                    if (in_array('Sore Throats', $illness_Arr)) {
                                                        $Sore_Throats = 'checked="checked"';
                                                    }
    
                                                    if (in_array('Ear Infections', $illness_Arr)) {
                                                        $Ear_Infections = 'checked="checked"';
                                                    }
    
                                                    if (in_array('Fevers', $illness_Arr)) {
                                                        $Fevers = 'checked="checked"';
                                                    }
    
                                                    if (in_array('Visual Problems', $illness_Arr)) {
                                                        $Visual_Problems = 'checked="checked"';
                                                    }
    
                                                    if (in_array('Sinus Infections', $illness_Arr)) {
                                                        $Sinus_Infections = 'checked="checked"';
                                                    }
    
                                                    if (in_array('Coughs', $illness_Arr)) {
                                                        $Coughs = 'checked="checked"';
                                                    }
    
                                                    if (in_array('Headaches', $illness_Arr)) {
                                                        $Headaches = 'checked="checked"';
                                                    }
    
                                                    if (in_array('Joint Aches', $illness_Arr)) {
                                                        $Joint_Aches = 'checked="checked"';
                                                    }
    
                                                    if (in_array('Asthma', $illness_Arr)) {
                                                        $Asthma = 'checked="checked"';
                                                    }
    
                                                    if (in_array('Eczema', $illness_Arr)) {
                                                        $Eczema = 'checked="checked"';
                                                    }
                                                    if (in_array('Urinary Tract Infections', $illness_Arr)) {
                                                        $Urinary_Tract = 'checked="checked"';
                                                    }
                                                }
                                                ?>
                                                <input <?= $Colds ?>  type="checkbox" value="Colds"   id="complints1" name="illnesses_and_complaints" class="md-check">
                                                <label for="complints1">
                                                    <span class="inc">Colds</span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Colds </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="md-checkbox"> 
                                                <input <?= $Sore_Throats; ?> type="checkbox" value="Sore Throats"   id="complints2" name="illnesses_and_complaints" class="md-check">
                                                <label for="complints2">
                                                    <span class="inc">Sore Throats</span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Sore Throats </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="md-checkbox"> 
                                                <input type="checkbox" <?= $Ear_Infections ?> value="Ear Infections"   id="complints3" name="illnesses_and_complaints" class="md-check">
                                                <label for="complints3">
                                                    <span class="inc">Ear Infections</span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Ear Infections </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="md-checkbox"> 
                                                <input <?= $Fevers ?> type="checkbox" value="Fevers"  id="complints4" name="illnesses_and_complaints" class="md-check">
                                                <label for="complints4">
                                                    <span class="inc">Fevers</span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Fevers
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="md-checkbox"> 
                                                <input <?= $Visual_Problems ?> type="checkbox" value="Visual Problems"   id="complints5" name="illnesses_and_complaints" class="md-check">
                                                <label for="complints5">
                                                    <span class="inc">Visual Problems</span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Visual Problems </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="md-checkbox"> 
                                                <input <?= $Sinus_Infections ?> type="checkbox" value="Sinus Infections"   id="complints6" name="illnesses_and_complaints" class="md-check">
                                                <label for="complints6">
                                                    <span class="inc">Sinus Infections</span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Sinus Infections </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="md-checkbox"> 
                                                <input <?= $Coughs ?> type="checkbox" value="Coughs"   id="complints7" name="illnesses_and_complaints" class="md-check">
                                                <label for="complints7">
                                                    <span class="inc">Coughs</span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Coughs </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="md-checkbox"> 
                                                <input <?= $Headaches ?> type="checkbox" value="Headaches"  id="complints8" name="illnesses_and_complaints" class="md-check">
                                                <label for="complints8">
                                                    <span class="inc">Headaches</span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Headaches
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="md-checkbox"> 
                                                <input <?= $Joint_Aches ?> type="checkbox" value="Joint Aches"   id="complints9" name="illnesses_and_complaints" class="md-check">
                                                <label for="complints9">
                                                    <span class="inc">Joint Aches</span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Joint Aches </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="md-checkbox"> 
                                                <input <?= $Asthma ?> type="checkbox"  value="Asthma"  id="complints10" name="illnesses_and_complaints" class="md-check">
                                                <label for="complints10">
                                                    <span class="inc">Asthma </span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Asthma  </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="md-checkbox"> 
                                                <input <?= $Eczema ?> type="checkbox" value="Eczema"  id="complints11" name="illnesses_and_complaints" class="md-check">
                                                <label for="complints11">
                                                    <span class="inc">Eczema</span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Eczema </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="md-checkbox"> 
                                                <input <?= $Urinary_Tract ?> type="checkbox" value="Urinary Tract Infections"   id="complints12" name="illnesses_and_complaints" class="md-check">
                                                <label for="complints12">
                                                    <span class="inc">Urinary Tract Infections</span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Urinary Tract Infections
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label for="">Other (Please specify)</label>
                                                    <input <?= $illness_other_specify ?> type="text" id="illnesses_other_details" class="form-control">
                                                    <span class="help-block">Ex :- Any Char</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-offset-1 col-lg-9 portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <span class="caption-subject bold uppercase font-green"> PRENATAL   HISTORY</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form role="form">
                                <div class="form-body div-span-main-cont">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>Mothers’ and Father’s age at  time of delivery?  </label>
                                                    <input value="<?= $prenatal_history == '' ? '' : $prenatal_history[0]->mother_father_age ?>" id="mother_father_age_deliver_time" type="text" class="form-control">
                                                    <span class="help-block">Ex :- 10,20</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>Pregnancy history: </label>
                                                    <input value="<?= $prenatal_history == '' ? '' : $prenatal_history[0]->pregnancy_history ?>" id="pregnancy_history" type="text" class="form-control">
                                                    <span class="help-block">Ex :- complications, illness, medication, vaccines, trauma</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>TYPE OF DELIVERY </label>
                                                    <input value="<?= $prenatal_history == '' ? '' : $prenatal_history[0]->delivery_type ?>" id="delivery_type" type="text" class="form-control">
                                                    <span class="help-block">Ex :- </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>Comment </label>
                                                    <input value="<?= $prenatal_history == '' ? '' : $prenatal_history[0]->comment ?>" id="prenatal_history_comment" type="text" class="form-control">
                                                    <span class="help-block">Ex :- </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>APGAR scores </label>
                                                    <input value="<?= $prenatal_history == '' ? '' : $prenatal_history[0]->apgar_scores ?>" id="apgar_scores" type="text" class="form-control">
                                                    <span class="help-block">Ex :- </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <label>Presentation straight after birth</label>
                                                    <input value="<?= $prenatal_history == '' ? '' : $prenatal_history[0]->presentation_straight ?>" id="presentation_straight" type="text" class="form-control">
                                                    <span class="help-block">Ex :- Jaundice / Colic / any known health issues in early weeks </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-offset-1 col-lg-9 portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <span class="caption-subject bold uppercase font-green"> BABY’S FIRST 6 MONTHS? (Please ‘<i class="fa fa-check"></i>’ if yes )</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form role="form">
                                <div class="form-body ">
                                    <?php
                                    $six_month_details = '';
                                    if ($child_details != '') {
                                        $six_month_details = explode('~', $child_details[0]->baby_six_month_details);
                                    }
                                    Get_baby_6_month_details($six_month_details);
                                    ?>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-offset-1 col-lg-9 portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <span class="caption-subject bold uppercase font-green"> NUTRITION</span>
                            </div>
                        </div>
                        <div class="portlet-body form div-span-main-cont">
                            <form role="form">
                                
                                    <div class="col-lg-12 medical-tab-head ">
                                        <div class="col-sm-5">
                                            <span class="caption-subject bold uppercase"> Dietary Programmes</span>
                                            <div class="col-sm-2"></div>
                                        </div>
                                        <div class="col-sm-1">
                                            <span class="caption-subject bold uppercase"> Yes</span>
                                        </div>
                                        <div class="col-sm-5 text-center">
                                            <span class="caption-subject bold uppercase"> DURATION</span>
                                        </div>
                                        <div class="col-sm-1 text-left">
                                            <span class="caption-subject bold uppercase"> NO</span>
                                        </div>   
                                    </div>
                                        
                                
                                <div class="form-body">
                                    
                                    <?php
                                    $nutrition_Arr = '';
                                    $other_specy_yes = '';
                                    $other_specy_no = '';
                                    $other_specy_des = '';
                                    if ($nutrition_details != '' && count($nutrition_details) > 0) {
                                        $nutrition_Arr = $nutrition_details;
                                        if ($nutrition_details[0]->other_specify == 'Yes') {
                                            $other_specy_yes = 'checked="checked"';
                                            $other_specy_no = '';
                                            $other_specy_des = $nutrition_details[0]->other_specify_duration;
                                        } else {
                                            $other_specy_yes = '';
                                            $other_specy_no = 'checked="checked"';
                                        }
                                    }
                                    Get_Nutrition_detail($nutrition_Arr);
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <br>
                                            Other? Please specify 
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group form-md-line-input has-success">
                                                <div  class="md-radio">
                                                    <input <?= $other_specy_yes ?>  type="radio" value="Yes" id="nutrition_other_specify_yes" name="nutrition_other_specify" class="md-radiobtn">
                                                    <label for="nutrition_other_specify_yes">
                                                        <span class="inc">Yes</span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>  </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="<?= $other_specy_des ?>" id="nutrition_other_specify_duration" type="text" class="form-control">
                                                    <span class="help-block">Ex :-Rahul Kumar</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="md-radio">
                                                    <input <?= $other_specy_no ?> value="No" type="radio" id="nutrition_other_specify_no" name="nutrition_other_specify" class="md-radiobtn">
                                                    <label for="nutrition_other_specify_no">
                                                        <span class="inc">No</span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>  </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-offset-1 col-lg-9 portlet light bordered">
    
                        <div class="portlet-body form">
                            <form role="form">
                                <div class="form-body">
                                    <div class="row note-span-div">
                                        <p><b>If there is anything else you would like us to know about your child, please feel free to fill in the space below.</b></p>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group form-md-line-input">
    
                                                <textarea class="form-control" id="extra_information_child" rows="3" placeholder="Enter more text"><?= $child_details == '' ? '' : $child_details[0]->extra_information_child ?></textarea>
                                                <label for="form_control_1"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p style="color: red"> <b> I certify that the information on this form is accurate and complete to the best of my knowledge.</b></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="col-sm-3">
                                            <div class="md-checkbox"> 
                                                <input type="checkbox" value="Accept" name="Accept" class="md-check" id="accept_registration" checked="checked">
                                                <label for="accept_registration">
                                                    <span class="inc">Accept</span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Accept </label>
                                            </div>
                                        </div>
                                           
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm-3">
                                          
                                                <label for="complints11">
                                                 Date :<?php echo date('d/m/Y'); ?> </label>
                                          
                                        </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-offset-1 col-lg-9 portlet light">
                        <div class="portlet-body form">
                            <form role="form">
                                <div class="form-body">
                                    <div class="row">
    
                                         <center> <button type="button" class="btn  green-stripe" id="reg_cust_form_submit">Submit</button> </center>    
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--content Area  End-->
               <?php } ?> 
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
</div>
<?php

function Get_baby_6_month_details($details = '') {
    $Arr = [
        'Settled', 'Relaxed', 'Calm', 'Happy', 'Unsettled', 'Irritable', 'Cried Often', 'Easy to feed', 'Difficult to feed',
        'Good Sleeper', 'Bad sleeper', 'Underactive', 'Over active', 'Indigestion', 'Colic', 'Reflux', 'Weight gain difficulty',
        'Bowel movement difficulty', 'Allergic reactions'
    ];
    for ($i = 0; $i < count($Arr); $i++) {
        $chack = '';
        if ($details != '') {
            if (in_array($Arr[$i], $details)) {
                $chack = 'checked="checked"';
            }
        }
        ?>
        <div class="col-sm-3">
            <div class="md-checkbox"> 
                <input <?= $chack ?> type="checkbox" value="<?= $Arr[$i] ?>" id="baby_first_six_m_yes_<?= $i ?>" name="baby_first_six_month" class="md-check">
                <label for="baby_first_six_m_yes_<?= $i ?>">
                    <span class="inc"><?= $Arr[$i] ?></span>
                    <span class="check"></span>
                    <span class="box"></span> <?= $Arr[$i] ?>
                </label>
            </div>
        </div>
        <?php
    }
}

function Get_Nutrition_detail($nutrition_Arr) {
    $New_Arr = [
        ['Gluten Free', 'gluten_free', 'gluten_free_duration'],
        ['Dairy (Casein) Free', 'dairy_free', 'dairy_free_duration'],
        ['Gluten & Casein Free', 'casein_free', 'casein_free_duration'],
        ['Gluten, Casein & Soya Free', 'soya_free', 'soya_free_duration'],
        ['Phenol Free', 'phenol_free', 'phenol_free_duration'],
    ];
//    echo '<pre>';
//    print_r($New_Arr);
//    print_r($nutrition_Arr);
//    echo '</pre>';
    for ($i = 0; $i < count($New_Arr); $i++) {
        $desc = '';
        $select_yes = '';
        $select_no = '';
        $Arr = '';
        if ($nutrition_Arr != '') {
            $Arr = checked_status($New_Arr[$i][0], $nutrition_Arr);
        }
        if (is_array($Arr)) {
            $desc = $Arr[1];
            if ($Arr[0] == 'Yes') {
                $select_yes = 'checked="chacked"';
                $select_no = '';
            } else {
                $select_yes = '';
                $select_no = 'checked="chacked"';
            }
        }
        ?>
        <div class="row">
            <div class="col-sm-5">
                <br>
                <?= $New_Arr[$i][0] ?>
            </div>
            <div class="col-sm-1">
                <div class="form-group form-md-line-input has-success">
                    <div class="md-radio">
                        <input  <?= $select_yes ?>  value="Yes" type="radio" id="<?= $New_Arr[$i][1] ?>_yes" name="<?= $New_Arr[$i][1] ?>" class="md-radiobtn">
                        <label for="<?= $New_Arr[$i][1] ?>_yes">
                            <span class="inc">Yes</span>
                            <span class="check"></span>
                            <span class="box"></span>  </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group form-md-line-input has-success">
                    <div class="input-icon">
                        <input id="<?= $New_Arr[$i][2] ?>" value="<?= $desc ?>" type="text" class="form-control">
                        <span class="help-block">Ex :-Rahul Kumar</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group form-md-line-input has-success">
                    <div class="md-radio">
                        <input <?= $select_no ?> value="No" type="radio" id="<?= $New_Arr[$i][1] ?>_no" name="<?= $New_Arr[$i][1] ?>" class="md-radiobtn">
                        <label for="<?= $New_Arr[$i][1] ?>_no">
                            <span class="inc">No</span>
                            <span class="check"></span>
                            <span class="box"></span>  </label>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

function checked_status($ne_Arr, $nutrition_Arr) {
    $select = '';
    switch ($ne_Arr) {
        case 'Gluten Free':
            if ($nutrition_Arr[0]->gluten_free == 'Yes') {
                $select = ['Yes', $nutrition_Arr[0]->gluten_free_duration];
            } else {
                $select = ['No', ''];
            }
            break;
        case 'Dairy (Casein) Free':
            if ($nutrition_Arr[0]->dairy_free == 'Yes') {
                $select = ['Yes', $nutrition_Arr[0]->dairy_free_duration];
            } else {
                $select = ['No', ''];
            }
        case 'Gluten & Casein Free':
            if ($nutrition_Arr[0]->casein_free == 'Yes') {
                $select = ['Yes', $nutrition_Arr[0]->casein_free_duration];
            } else {
                $select = ['No', ''];
            }
            break;
        case 'Phenol Free':
            if ($nutrition_Arr[0]->phenol_free == 'Yes') {
                $select = ['Yes', $nutrition_Arr[0]->phenol_free_duration];
            } else {
                $select = ['No', ''];
            }
            break;
        case 'Gluten, Casein & Soya Free':
            if ($nutrition_Arr[0]->soya_free == 'Yes') {
                $select = ['Yes', $nutrition_Arr[0]->soya_free_duration];
            } else {
                $select = ['No', ''];
            }
            break;
    }
    return $select;
}
?>