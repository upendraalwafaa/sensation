<?php
$child_id = $this->uri->segment(3);
$update_id = $this->uri->segment(4);
$sen_arr = '';
if (isset($child_details[0]->sensory_processing) && $child_details[0]->sensory_processing != '') {
    $sen_arr = $child_details[0]->sensory_processing;
    $sen_arr = explode(',', $sen_arr);
} else {
    $sen_arr = '';
}
?>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/consent_form.css">
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-offset-1 col-lg-9 col-xs-12 col-sm-12">
                <div class="portlet light portlet-fit div-span-main-cont">
                    <div class="portlet light"> 
                        <div class="portlet-title">
                            <div class="caption caption font-green">
                                <span class="caption-subject bold uppercase">THERAPY HISTORY FORM</span>
                            </div>
                        </div>

                        <div class="row  ">
                            <form role="form" id="therpay_history_form">

                                <input value="<?= (isset($child_details[0]->update_id) == '' ? '' : $child_details[0]->update_id) ?>" type="hidden" id="therapy_case_history_id" class="form-control" name="therapy_case_history_id">
                                <input value="<?= (isset($child_details[0]->CH_id) == '' ? '' : $child_details[0]->CH_id) ?>" type="hidden" id="child_id" class="form-control" name="child_id">

                                <div class="col-md-6 ">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                            <label>Child's Name</label>
                                            <input type="text" id="child_name" value="<?= (isset($child_details[0]->child_name) == '' ? '' : $child_details[0]->child_name) ?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                            <label>DOB</label>
                                            <input value="<?= (isset($child_details[0]->dob) == '' ? '' : $child_details[0]->dob) ?>" type="text" id="dob" class="form-control datepicker">
                                        </div>
                                    </div>

                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                            <label>Nursery/School</label>
                                            <input value="<?= (isset($child_details[0]->school) == '' ? '' : $child_details[0]->school) ?>" type="text" id="school" class="form-control  ">
                                        </div>
                                    </div>

                                    <div class="form-group form-md-line-input has-success">
                                        <div class="input-icon">
                                            <label>Therapist(s)</label>
                                            <input value="<?= (isset($child_details[0]->therapists) == '' ? '' : $child_details[0]->therapists) ?>" type="text" id="therapists" class="form-control">
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success">
                                        <label>Main parental concerns</label>
                                        <textarea class="form-control" id="main_parental_concerns" name="main_parental_concerns" rows="6"><?= (isset($child_details[0]->main_parental_concerns) == '' ? '' : $child_details[0]->main_parental_concerns) ?></textarea>
                                    </div>   
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success">
                                        <label>Family History of Development or Speech/Language delay</label>
                                        <textarea class="form-control" id="family_history" name="family_history" rows="5"><?= (isset($child_details[0]->family_history) == '' ? '' : $child_details[0]->family_history) ?></textarea>
                                    </div>   
                                </div>

                                <div class="col-md-12 ">
                                    <div class="form-group form-md-line-input has-success">
                                        <div class="md-checkbox has-info">

                                            <input <?= isset($child_details[0]->review_registration_form) == '' ? '' : $child_details[0]->review_registration_form == 'Yes' ? 'checked="checked"' : '' ?>  type="checkbox" id="review_registration_form" name="review_registration_form" class="md-check" value="Yes">
                                            <label for="review_registration_form">
                                                <span class="inc">Review Registration Form</span>
                                                <span class="check"></span>
                                                <span class="box review_registration_forme"></span>Review Registration Form(any other details to add)</label>

                                        </div>  
                                    </div>  
                                </div>
                                <div class="col-md-12 margin-top-10">
                                    <div class="form-group mrg_right10">
                                        <textarea class="form-control" id="review_registration_form_details" name="review_registration_form_details" rows="3"><?= (isset($child_details[0]->review_registration_form_details) == '' ? '' : $child_details[0]->review_registration_form_details) ?></textarea>
                                    </div>   
                                </div>
                                <div class="clearfix"></div>


                                <div class="col-md-12">
                                    <div class="col-sm-4">
                                        <label id="marital_staus_display">
                                            <br/>
                                            Has child’s hearing been tested?&nbsp;<span style="color:red">*</spna></label>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="form-group form-md-line-input has-success">
                                            <div class="md-radio">
                                                <input <?= isset($child_details[0]->child_hearing_tested) == '' ? '' : $child_details[0]->child_hearing_tested == 'Yes' ? 'checked="checked"' : '' ?> type="radio" value="Yes" id="child_hearing_tested_yes" name="child_hearing_tested" class="md-radiobtn">
                                                <label for="child_hearing_tested_yes">
                                                    <span class="inc">Yes</span>
                                                    <span class="check"></span>
                                                    <span class="box child_hearing_tested"></span> Yes </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-2">
                                        <div class="form-group form-md-line-input has-success">
                                            <div class="md-radio">
                                                <input <?= isset($child_details[0]->child_hearing_tested) == '' ? '' : $child_details[0]->child_hearing_tested == 'No' ? 'checked="checked"' : '' ?> type="radio" value="No" id="child_hearing_tested_no" name="child_hearing_tested" class="md-radiobtn">
                                                <label for="child_hearing_tested_no">
                                                    <span class="inc">No</span>
                                                    <span class="check"></span>
                                                    <span class="box child_hearing_tested"></span> No </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input has-success">
                                            <div class="input-icon">
                                                <div class="col-md-3">
                                                    <label>Date</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input value="<?= (isset($child_details[0]->child_hearing_tested_date) == '' ? '' : $child_details[0]->child_hearing_tested_date) ?>" type="text" id="child_hearing_tested_date" name="child_hearing_tested_date" class="form-control datepicker">
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12">
                                    <div class="col-sm-4">
                                        <div class="form-md-line-input has-success">
                                            <br>
                                            <label id="marital_staus_display">Has child’s eyesight been tested?&nbsp;<span style="color:red">*</spna></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group form-md-line-input has-success">
                                            <div class="md-radio">
                                                <input <?= isset($child_details[0]->child_eyesight_tested) == '' ? '' : $child_details[0]->child_eyesight_tested == 'Yes' ? 'checked="checked"' : '' ?>  type="radio" value="Yes" id="child_eyesight_tested_yes" name="child_eyesight_tested" class="md-radiobtn">
                                                <label for="child_eyesight_tested_yes">
                                                    <span class="inc">Yes</span>
                                                    <span class="check"></span>
                                                    <span class="box child_eyesight_tested"></span> Yes </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group form-md-line-input has-success">
                                            <div class="md-radio">
                                                <input <?= isset($child_details[0]->child_eyesight_tested) == '' ? '' : $child_details[0]->child_eyesight_tested == 'No' ? 'checked="checked"' : '' ?> type="radio" value="No" id="child_eyesight_tested_no" name="child_eyesight_tested" class="md-radiobtn">
                                                <label for="child_eyesight_tested_no">
                                                    <span class="inc">No</span>
                                                    <span class="check"></span>
                                                    <span class="box child_eyesight_tested"></span> No </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input has-success">
                                            <div class="input-icon">
                                                <div class="col-md-3">
                                                    <label>Date</label>
                                                </div>

                                                <div class="col-md-9">
                                                    <input value="<?= (isset($child_details[0]->child_eyesight_tested_date) == '' ? '' : $child_details[0]->child_eyesight_tested_date) ?>" type="text" id="child_eyesight_tested_date" name="child_eyesight_tested_date" class="form-control datepicker">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 margin-top-20">
                                    <div class="form-group mrg_right10">
                                        <label>Outcome of hearing test </label>
                                        <textarea class="form-control" id="outcome_hearing_test" name="outcome_hearing_test" rows="3"><?= (isset($child_details[0]->outcome_hearing_test) == '' ? '' : $child_details[0]->outcome_hearing_test) ?></textarea>
                                    </div> 
                                    <div class="form-group mrg_right10">
                                        <label>Outcome of eye test </label>
                                        <textarea class="form-control" id="outcome_eye_test" name="outcome_eye_test" rows="3"><?= (isset($child_details[0]->outcome_eye_test) == '' ? '' : $child_details[0]->outcome_eye_test) ?></textarea>
                                    </div>                                     
                                </div>


                                <div class="col-md-12 margin-top-20">
                                    <div class="form-group mrg_right10">
                                        <label>Summary of previous/current therapies and assessments(if applicable)</label>
                                        <textarea class="form-control" id="therapies_assessments" name="therapies_assessments" rows="3"><?= (isset($child_details[0]->therapies_assessments) == '' ? '' : $child_details[0]->therapies_assessments) ?></textarea>
                                        <br/>
                                    </div>   
                                </div>









                                <div class="col-md-12">
                                    <div class="portlet light bordered">
                                        <div class=" caption-subject bold uppercase ">
                                            <div class="portlet-title">
                                                <div class="caption font-green-sunglo">
                                                    Developmental Milestones 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="portlet-body form">
                                            <form role="form">
                                                <div class="form-body" style=" padding-top: 0;">
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                    <input type="text" name="age_in_years_months" id="age_in_years_months"  value="<?= (isset($child_details[0]->age_in_years_months) == '' ? '' : $child_details[0]->age_in_years_months) ?>" placeholder="(PLEASE STATE AGE IN YEARS & MONTHS)" class="form-control">

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="clearfix"></div>

                                                        <div class="col-sm-4">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                    <label>Sat unsupported:</label>
                                                                    <input type="text" id="sat_unsupported" name="sat_unsupported" value="<?= (isset($child_details[0]->sat_unsupported) == '' ? '' : $child_details[0]->sat_unsupported) ?>" class="form-control">
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                    <label>Crawled:</label>
                                                                    <input value="<?= (isset($child_details[0]->crawled) == '' ? '' : $child_details[0]->crawled) ?>" id="crawled" name="crawled" type="text" class="form-control">
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                    <label>How:</label>
                                                                    <input value="<?= (isset($child_details[0]->how) == '' ? '' : $child_details[0]->how) ?>" id="how" name="how" type="text" class="form-control">
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                    <label>Walked unsupported: </label>
                                                                    <input value="<?= (isset($child_details[0]->walked_unsupported) == '' ? '' : $child_details[0]->walked_unsupported) ?>" id="walked_unsupported" name="walked_unsupported" type="text" class="form-control">
                                                                  
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                    <label>Walking backwards:</label>
                                                                    <input value="<?= (isset($child_details[0]->walking_backwards) == '' ? '' : $child_details[0]->walking_backwards) ?>" id="walking_backwards" name="walking_backwards" type="text" class="form-control">
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                    <label>Jumped:</label>
                                                                    <input value="<?= (isset($child_details[0]->jumped) == '' ? '' : $child_details[0]->jumped) ?>" id="jumped" name="jumped" type="text" class="form-control">
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                    <label>Bicycle: </label>
                                                                    <input value="<?= (isset($child_details[0]->bicycle) == '' ? '' : $child_details[0]->bicycle) ?>" id="bicycle" name="bicycle"  type="text" class="form-control">
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                    <label><br/></label>
                                                                    <input value="<?= (isset($child_details[0]->independently_activities) == '' ? '' : $child_details[0]->independently_activities) ?>" id="independently_activities" name="independently_activities" type="text" placeholder="Cruised/stand independently, started running" class="form-control">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 margin-top-10">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <label>Gross Motor (walking/running/sports/ coordination etc.)</label>
                                                                <textarea class="form-control" id="gross_motor" name="gross_motor" rows="3"><?= (isset($child_details[0]->gross_motor) == '' ? '' : $child_details[0]->gross_motor) ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 margin-top-10">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <label>Fine Motor (coloring/buttons/writing etc.)</label>
                                                                <textarea class="form-control" id="fine_motor" name="fine_motor" rows="4"><?= (isset($child_details[0]->fine_motor) == '' ? '' : $child_details[0]->fine_motor) ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="col-md-6 margin-top-10">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <label>Separation issues?</label>
                                                                <textarea class="form-control" id="separation_issues" name="separation_issues" rows="5"><?= (isset($child_details[0]->separation_issues) == '' ? '' : $child_details[0]->separation_issues) ?></textarea>
                                                            </div>
                                                        </div>                  										                                     


                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="portlet light bordered">
                                        <div class=" caption-subject bold uppercase ">
                                            <div class="portlet-title">
                                                <div class="caption font-green-sunglo">
                                                    Activities of Daily Living
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="portlet-body form">
                                            <div class="form-body" style=" padding-top: 0;">
                                                <div class="row">
                                                    <div class="col-md-6 margin-top-10">
                                                        <div class="form-group form-md-line-input has-success">
                                                            <label>Feeding(independence, utensil use, utensil to mouth, gagging,picky eater etc)</label>
                                                            <textarea class="form-control" id="feeding" name="feeding" rows="3"><?= (isset($child_details[0]->feeding) == '' ? '' : $child_details[0]->feeding) ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 margin-top-10">
                                                        <div class="form-group form-md-line-input has-success">
                                                            <label>Toileting : (independence in going, undressing. cleaning self, wash hands, dressing)</label>
                                                            <textarea class="form-control" id="toileting" name="toileting" rows="3"><?= (isset($child_details[0]->toileting) == '' ? '' : $child_details[0]->toileting) ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 margin-top-10">
                                                        <div class="form-group form-md-line-input has-success">
                                                            <label>
                                                                Grooming : (independence in neatness of appearance, teeth brushing, brushing hair)</label>
                                                            <textarea class="form-control" id="grooming" name="grooming" rows="3"><?= (isset($child_details[0]->grooming) == '' ? '' : $child_details[0]->grooming) ?></textarea>
                                                        </div>
                                                    </div> 

                                                    <div class="col-md-6 margin-top-10">
                                                        <div class="form-group form-md-line-input has-success">
                                                            <label>
                                                                Dressing : (independence in dressing and undressing)</label>
                                                            <textarea class="form-control" id="dressing" name="dressing" rows="3"><?= (isset($child_details[0]->dressing) == '' ? '' : $child_details[0]->dressing) ?></textarea>
                                                        </div>
                                                    </div>                                                        
                                                    <div class="col-md-6 margin-top-10">
                                                        <div class="form-group form-md-line-input has-success">
                                                            <label>
                                                                Bathing: (independence in washing, drying self)</label>
                                                            <textarea class="form-control" id="bathing" name="bathing" rows="3"><?= (isset($child_details[0]->bathing) == '' ? '' : $child_details[0]->bathing) ?></textarea>
                                                        </div>
                                                    </div>                                                         


                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-12">
                                    <div class="portlet light bordered">
                                        <div class=" caption-subject bold uppercase ">
                                            <div class="portlet-title">
                                                <div class="caption font-green-sunglo"> Sensory Processing(Any difficulties? Tick if yes)</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <div class="form-body ">
                                                    <div class="row mrg0">
                                                        <?php
                                                        difficulties($sen_arr);
                                                        ?>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-12">
                                    <div class="portlet light bordered">
                                        <div class=" caption-subject bold uppercase ">
                                            <div class="portlet-title">Visual Perceptual Abilities</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <div class="form-body  ">
                                                <div class="row mrg0">
                                                    <label>Any difficulties matching, identifying objects/shapes/colors:</label>
                                                    <textarea class="form-control" id="any_other_difficulties" name="any_other_difficulties" rows="3"><?= (isset($child_details[0]->any_other_difficulties) == '' ? '' : $child_details[0]->any_other_difficulties) ?></textarea>
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="portlet light bordered">
                                        <div class=" caption-subject bold uppercase ">
                                            <div class="portlet-title">Attention & Listening</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">

                                            <div class="form-body ">
                                                <div class="row mrg0">
                                                    <div class="col-md-6">
                                                        <label>Presentation at Nursery/School</label>
                                                        <textarea class="form-control" id="presentation_nursery_school" name="presentation_nursery_school" rows="3"><?= (isset($child_details[0]->presentation_nursery_school) == '' ? '' : $child_details[0]->presentation_nursery_school) ?></textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Presentation at Home</label>
                                                        <textarea class="form-control" id="presentation_home" name="presentation_home" rows="3"><?= (isset($child_details[0]->presentation_home) == '' ? '' : $child_details[0]->presentation_home) ?></textarea>
                                                    </div>
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="portlet light bordered">
                                        <div class=" caption-subject bold uppercase">
                                            <div class="portlet-title">Communication</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">

                                            <div class="form-body">
                                                <div class="row  ">
                                                    <div class="input-icon">
                                                        <div class="col-md-4">Babble? (ah, ga, ba, da, mah) </div>
                                                        <div class="col-md-8">
                                                            <input value="<?= (isset($child_details[0]->babble) == '' ? '' : $child_details[0]->babble) ?>" type="text" name="babble" id="babble" class="form-control">
                                                        </div>


                                                    </div>
                                                    <div class="input-icon">
                                                        <div class="col-md-4 margin-top-10">Say first words:</div>
                                                        <div class="col-md-8">
                                                            <input value="<?= (isset($child_details[0]->say_first_words) == '' ? '' : $child_details[0]->say_first_words) ?>" type="text" name="say_first_words" id="say_first_words" class="form-control margin-top-10">
                                                        </div>


                                                    </div>
                                                    <div class="input-icon">
                                                        <div class="col-md-4 margin-top-10">Put 2 words together:</div>
                                                        <div class="col-md-8">
                                                            <input value="<?= (isset($child_details[0]->put_words_together) == '' ? '' : $child_details[0]->put_words_together) ?>" type="text" name="put_words_together" id="put_words_together" class="form-control margin-top-10">
                                                        </div>


                                                    </div>
                                                    <div class="input-icon">
                                                        <div class="col-md-4 margin-top-10">Speak in longer sentences:</div>
                                                        <div class="col-md-8">
                                                            <input value="<?= (isset($child_details[0]->speak_longer_sentences) == '' ? '' : $child_details[0]->speak_longer_sentences) ?>" type="text" name="speak_longer_sentences" id="speak_longer_sentences" class="form-control margin-top-10">
                                                        </div>
                                                    </div>

                                                    <div class="input-icon">
                                                        <div class="col-md-4 margin-top-10">Home Language:</div>
                                                        <div class="col-md-8">
                                                            <input value="<?= (isset($child_details[0]->home_language) == '' ? '' : $child_details[0]->home_language) ?>" type="text" name="home_language" id="home_language" class="form-control margin-top-10">
                                                        </div>
                                                    </div>

                                                    <div class="input-icon">
                                                        <div class="col-md-4 margin-top-10">Other Languages:</div>
                                                        <div class="col-md-8">
                                                            <input value="<?= (isset($child_details[0]->other_languages) == '' ? '' : $child_details[0]->other_languages) ?>" type="text" name="other_languages" id="other_languages" class="form-control margin-top-10">
                                                        </div>


                                                    </div>

                                                    <div class="col-md-12 margin-top-20">
                                                        <div class="form-group  ">
                                                            <label>Expressive Language (verbal/ how does the child communicate needs/expressive vocab/ scripting/ echolalia?</label>
                                                            <textarea class="form-control" id="expressive_language" name="expressive_language" rows="3"><?= (isset($child_details[0]->expressive_language) == '' ? '' : $child_details[0]->expressive_language) ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 margin-top-10">
                                                        <div class="form-group mrg_right10">
                                                            <label>Receptive Language (can child point to objects/pictures named?/ can the child identify actions?/ follow simple or complex instructions/ understand ‘why’ questions?)</label>
                                                            <textarea class="form-control" id="receptive_language" name="receptive_language" rows="3"><?= (isset($child_details[0]->receptive_language) == '' ? '' : $child_details[0]->receptive_language) ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 margin-top-10">
                                                        <div class="form-group mrg_right10">
                                                            <label>Speech/ Articulation (clarity of sounds) </label>
                                                            <textarea class="form-control" id="speech_articulation" name="speech_articulation" rows="3"><?= (isset($child_details[0]->speech_articulation) == '' ? '' : $child_details[0]->speech_articulation) ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <div class="portlet light bordered">
                                        <div class=" caption-subject bold uppercase ">
                                            <div class="portlet-title">Social Development/Pragmatic language</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">

                                            <div class="form-body">
                                                <div class="row ">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>(Playing alongside peers/eye contact/ greetings/initiating play/taking turns/sharing/bullying/ understanding and use of humour/sarcasm/ability to inference/compliments)</label>
                                                            <textarea class="form-control" id="playing_alongside" name="playing_alongside" rows="3"><?= (isset($child_details[0]->playing_alongside) == '' ? '' : $child_details[0]->playing_alongside) ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 margin-top-10">
                                                        <div class="form-group">
                                                            <label>Any behavioral issues:</label>
                                                            <textarea class="form-control" id="any_behavioral_issues"  name="any_behavioral_issues" rows="3"><?= (isset($child_details[0]->any_behavioral_issues) == '' ? '' : $child_details[0]->any_behavioral_issues) ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 margin-top-10">
                                                        <div class=" ">
                                                            <label>Any other relevant information: (Likes/dislikes/concerns from educational setting/ relationship with siblings/ is the child toiler trained/ frequent relocations etc.)</label>
                                                            <textarea class="form-control" id="any_other_relevant_information" name="any_other_relevant_information" rows="3"><?= (isset($child_details[0]->any_other_relevant_information) == '' ? '' : $child_details[0]->any_other_relevant_information) ?></textarea>
                                                        </div>
                                                    </div>

                                                </div>  
                                            </div>



                                        </div>


                                    </div>

                                    <div class="portlet light portlet-fit">
                                        <div class="portlet light"> 
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <span class="caption-subject bold uppercase"> NUTRITION</span>
                                                </div>
                                            </div>

                                            <div class="portlet-body form ">
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
                                    </div>

                                    <div class="pull-right ">

                                        <button type="button" class="btn green-stripe" id="therapy_case_history">SAVE & NEXT</button>                                    
                                    </div>
                                </div>











                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

function difficulties($sen_arr = '') {

    $arr = ['Teeth brushing', 'Unusual reaction to messy play', 'Visual', 'Nail cutting', 'Sound', 'Smell', 'Hair brushing/washing', 'Touch', 'Taste', 'Eating- textures', 'Movement', 'Balance/Vestibular', 'Eating- variety', 'Dressing', 'Toileting'];
    for ($i = 0; $i < count($arr); $i++) {
        $checked = '';
        if ($sen_arr != '') {
            if (in_array($arr[$i], $sen_arr)) {
                $checked = 'checked="checked"';
            }
        }
        ?>
        <div class="col-md-6">
            <div class="md-checkbox"> 
                <input <?= $checked ?> type="checkbox" value="<?= $arr[$i] ?>" id="vac_follow<?= $i ?>" name="sensory_processing[]" class="md-check sensory_processing">
                <label for="vac_follow<?= $i ?>">
                    <span class="inc"><?= $arr[$i] ?></span>
                    <span class="check"></span>
                    <span class="box"></span> <?= $arr[$i] ?>
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