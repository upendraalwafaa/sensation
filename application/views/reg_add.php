<?php
$child_id = '';
$date_birth = '';
if ($child_details != '') {
    $child_id = $child_details[0]->id;
    $date_birth = date('m/d/Y', strtotime($child_details[0]->date_of_birth));
}
$electronic_id = $this->uri->segment(3);
$quotation_id = $this->uri->segment(4);
if (isset($cancellation_form[0]->cancel_id) && $cancellation_form[0]->cancel_id != '') {
    $cl_id = $cancellation_form[0]->cancel_id;
} else {
    $cl_id = '';
}

if ($elec_details != '') {
    $date_birthe = date('m/d/Y', strtotime($elec_details[0]->date_of_birth));
} else {
    $date_birthe = '';
}
// echo "<pre>";
//echo $elec_details[0]->father_mobile;
// exit;
?>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption font-green">
                            <span class="caption-subject bold uppercase"> REGISTRATION FORM</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="portlet-body form">
                        <input type="hidden" id="child_id" value="<?= $child_id ?>">
                        <input type="hidden" id="electronic_id" value="<?= $electronic_id ?>">
                        <input type="hidden" id="quatation_id" value="<?= $quotation_id ?>">
                        <form role="form">
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input has-success">
                                    <div class="input-icon">
                                        <label>Child Name&nbsp;<span style="color:red
                                                                     ">*</span></label>
                                        <input value="<?= $child_details == '' ? '' : $child_details[0]->child_name ?><?= $elec_details == '' ? '' : $elec_details[0]->child_name ?>" type="text" id="child_name" class="form-control">
                                        <span class="help-block">Ex :-Rahul Kumar</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group form-md-line-input has-success">
                                    <div class="input-icon">
                                        <label>Date Of Birth&nbsp;<span style="color:red
                                                                        ">*</span></label>
                                        <input value="<?= $date_birth ?><?= $date_birthe ?>" type="text" id="date_of_birth" class="form-control date-picker datepicker">
                                        <span class="help-block">Ex :-20/05/1994</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input has-success">
                                        <label>Gnder&nbsp;<span style="color:red
                                                                ">*</span></label>
                                        <div class="md-radio">
                                            <input  <?= $elec_details == '' ? '' : $elec_details[0]->gender == 'Male' ? 'checked="checked"' : '' ?>  <?= $child_details == '' ? '' : $child_details[0]->gender == 'Male' ? 'checked="checked"' : '' ?>  type="radio" id="sib_Marred" value="Male" name="child_gender" class="md-radiobtn">
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
                                        <div class="md-radio" style="margin-top:5px;">
                                            <input <?= $elec_details == '' ? '' : $elec_details[0]->gender == 'Female' ? 'checked="checked"' : '' ?><?= $child_details == '' ? '' : $child_details[0]->gender == 'Female' ? 'checked="checked"' : '' ?> type="radio" value="Female" id="sib_female" name="child_gender" class="md-radiobtn">
                                            <label for="sib_female">
                                                <span class="inc">Female</span>
                                                <span class="check"></span>
                                                <span class="box child_gender"></span> Female </label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="form-group form-md-line-input has-success">
                                    <div class="input-icon address-div">
                                        <label>Address&nbsp;<span style="color:red
                                                                  ">*</span></label>
                                        <textarea id="address" class="form-control" rows="3" style=""><?= $child_details == '' ? '' : $child_details[0]->address ?></textarea>
                                        <span class="help-block">Ex :-Thomas Nolan Kaszas 5322 Otter Ln Middleberge</span>
                                    </div>
                                </div>


                                <br/>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="col-sm-6">
                                        <br>
                                        <label><b>School Attending&nbsp;<span style="color:red
                                                                              ">*</span> : </b></label>
                                    </div>

                                    <div class="col-sm-3 ">
                                        <?php $checked = 'checked=""'; ?>
                                        <div class="form-group form-md-line-input has-success">
                                            <div class="md-radio">
                                                <input <?= $elec_details == '' ? '' : $elec_details[0]->school_attinding == 'Yes' ? $checked : '' ?><?= $child_details == '' ? '' : $child_details[0]->school_attinding == 'Yes' ? $checked : '' ?>  type="radio" value="Yes" id="school_attinding_yes" name="school_attinding" class="md-radiobtn">
                                                <label for="school_attinding_yes">
                                                    <span class="inc">Yes</span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Yes </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 ">
                                        <div class="form-group form-md-line-input has-success">
                                            <div class="md-radio">
                                                <input <?= $elec_details == '' ? '' : $elec_details[0]->school_attinding == 'No' ? $checked : '' ?><?= $child_details == '' ? '' : $child_details[0]->school_attinding == 'No' ? $checked : '' ?> type="radio" value="No" id="school_attinding_no" name="school_attinding" class="md-radiobtn">
                                                <label for="school_attinding_no">
                                                    <span class="inc">No</span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> No </label>
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                                <div class="col-sm-6">
                                    <div class="col-sm-6">
                                        <br>
                                        <label><b>School Name&nbsp;<span>*</span> : </b></label>
                                    </div>

                                    <br/>
                                    <div class="col-sm-6 ">
                                        <input value="<?= $child_details == '' ? '' : $child_details[0]->school_name ?><?= $elec_details == '' ? '' : $elec_details[0]->school_name ?>" type="text" id="school_name" class="form-control">
                                    </div>
                                </div>

                            </div>



                            <div class="row">

                                <div class="col-sm-6"  style=" margin-top: 18px;">
                                    <div class="col-sm-6">
                                        <label><b>Discipline&nbsp;<span style="color:red
                                                                        ">*</span>  : </b></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <span class="multiselect-native-select">
                                            <select class="mt-multiselect btn btn-info" multiple="multiple" data-width="100%">
                                                <?php
                                                for ($ds = 0; $ds < count($discipline_details); $ds++) {
                                                    $dsd = $discipline_details[$ds];
                                                    ?><option value="<?= $dsd->id ?>"><?= $dsd->disipline_name ?></option> <?php
                                                }
                                                ?>
                                            </select>
                                            <div class="btn-group" style="width: 100%;">
                                                <button type="button" class="multiselect dropdown-toggle mt-multiselect btn btn-info" data-toggle="dropdown" title="None selected" aria-expanded="false" style="width: 100%; overflow: hidden; text-overflow: ellipsis;">
                                                    <span class="multiselect-selected-text">Select Multiple Discipline</span>
                                                    <b class="caret"></b>
                                                </button>
                                                <ul class="multiselect-container dropdown-menu">
                                                    <?php
                                                    $discipline_ar = [];
                                                    if ($elec_details != '') {
                                                        $discipline_ar = explode(',', $elec_details[0]->discipline_id);
                                                    }

                                                    if ($child_details != '') {
                                                        $discipline_ar = explode(',', $child_details[0]->discipline_id);
                                                    }

                                                    for ($ds = 0; $ds < count($discipline_details); $ds++) {
                                                        $dsd = $discipline_details[$ds];
                                                        $checked = '';
                                                        if (in_array($dsd->id, $discipline_ar)) {
                                                            $checked = 'checked="checked"';
                                                        }
                                                        ?>   <li><a tabindex="0"><label class="checkbox"><input <?= $checked ?> type="checkbox" class="discipline_name" value="<?= $dsd->id ?>"> <?= $dsd->disipline_name ?></label></a></li> <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="col-sm-6">
                                        <br>
                                        <label><b>Session Type&nbsp;<span style="color:red
                                                                          ">*</span> :  </b></label>
                                    </div>
                                    <div class="col-sm-3">
                                        <?php $checked = 'checked=""'; ?>
                                        <div class="form-group form-md-line-input has-success">
                                            <div class="md-radio"> 
                                                <input <?= $elec_details == '' ? '' : $elec_details[0]->session_type == 'Out Reach' ? $checked : '' ?><?= $child_details == '' ? '' : $child_details[0]->session_type == 'Out Reach' ? $checked : '' ?> type="radio" value="Out Reach"   id="session_outreach" name="session_type" class="md-radiobtn">
                                                <label for="session_outreach">
                                                    <span class="inc">Out Reach</span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Out Reach </label>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group form-md-line-input has-success">
                                            <div class="md-radio"> 
                                                <input  <?= $elec_details == '' ? '' : $elec_details[0]->session_type == 'Center' ? $checked : '' ?><?= $child_details == '' ? '' : $child_details[0]->session_type == 'Center' ? $checked : '' ?> type="radio" value="Center"   id="session_center" name="session_type" class="md-radiobtn">
                                                <label for="session_center">
                                                    <span class="inc">Center</span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> Center </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                                                

                            <div class="clearfix"></div>
                        </form>

                        <!-- S PARENT/GUARDIAN INFORMATION S -->
                        <div class="portlet light portlet-fit">
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption ">
                                        <span class="caption-subject bold uppercase"> PARENT/GUARDIAN INFORMATION</span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form role="form">
                                        <div class=" ">
                                            <div class="medical-tab-head">
                                                <div class="col-lg-2 col-xs-0 col-sm-0">
                                                    <span class="caption-subject bold uppercase"> </span>
                                                </div>
                                                <div class="col-lg-5 col-xs-5 col-sm-5 text-center">
                                                    <span class="caption-subject bold uppercase"> Father</span>
                                                    <div class="col-sm-2"></div>
                                                </div>
                                                <div class="col-lg-5 col-xs-5 col-sm-5 text-center">
                                                    <span class="caption-subject bold uppercase"> Mother</span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-2 col-xs-2 col-sm-2">
                                                    <br>
                                                    <label>Name&nbsp;<span style="color:red
                                                                           ">*</span></label>
                                                </div>

                                                <div class="col-lg-5 col-xs-5 col-sm-5">
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="input-icon">
                                                            <input value="<?= $elec_details == '' ? '' : $elec_details[0]->father_name ?><?= $parent_details == '' ? '' : $parent_details[0]->father_name ?>" type="text" class="form-control" id="father_name">
                                                            <span class="help-block">Ex :-Rahul Kumar</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-5 col-xs-5 col-sm-5">
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="input-icon">
                                                            <input value="<?= $elec_details == '' ? '' : $elec_details[0]->mother_name ?><?= $parent_details == '' ? '' : $parent_details[0]->mother_name ?>" type="text" class="form-control" id="mother_name">
                                                            <span class="help-block">Ex :-Gita Devi</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-2 col-xs-2 col-sm-2 span-row-in">
                                                    <br>
                                                    <label>Nationality&nbsp;<span style="color:red
                                                                                  ">*</span></label>
                                                </div>
                                                <div class="col-lg-5 col-xs-5 col-sm-5">
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="input-icon">
                                                            <input value="<?= $parent_details == '' ? '' : $parent_details[0]->father_nationality ?>" type="text" class="form-control" id="father_nationality">
                                                            <span class="help-block">Ex :-UAE,India</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-xs-5 col-sm-5">
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="input-icon">
                                                            <input value="<?= $parent_details == '' ? '' : $parent_details[0]->mother_nationality ?>" type="text" class="form-control" id="mother_nationality">
                                                            <span class="help-block">Ex :-UAE,India</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-lg-2 col-xs-2 col-sm-2 span-row-in">
                                                    <br>
                                                    <label>Occupation&nbsp;<span style="color:red
                                                                                 ">*</span></label>
                                                </div>
                                                <div class="col-lg-5 col-xs-5 col-sm-5">
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="input-icon">
                                                            <input value="<?= $parent_details == '' ? '' : $parent_details[0]->father_occupation ?>" type="text" id="father_occupation" class="form-control">
                                                            <span class="help-block">Ex :- Doctor , lifeguarding</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-xs-5 col-sm-5">
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="input-icon">
                                                            <input type="text" class="form-control" value="<?= $parent_details == '' ? '' : $parent_details[0]->mother_occupation ?>" id="mother_occupation">
                                                            <span class="help-block">Ex :-House Wife , Doctor</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-xs-2 col-sm-2 span-row-in">
                                                    <br>
                                                    <label>Mobile Number&nbsp;<span style="color:red
                                                                                    ">*</span></label>
                                                </div>
                                                <div class="col-lg-5 col-xs-5 col-sm-5">
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="input-icon">
                                                            <input value="<?= $parent_details == '' ? '' : $parent_details[0]->father_mobile ?><?= $elec_details == '' ? '' : $elec_details[0]->father_name != '' ? $elec_details[0]->father_phone : '' ?>" type="text" class="form-control" id="father_mobile">
                                                            <span class="help-block">Ex :- +971508897435,+917009876567</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-xs-5 col-sm-5">
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="input-icon">
                                                            <input value="<?= $parent_details == '' ? '' : $parent_details[0]->mother_mobile ?><?= $elec_details == '' ? '' : $elec_details[0]->mother_name != '' ? $elec_details[0]->father_phone : '' ?>" type="text" class="form-control" id="mother_mobile">
                                                            <span class="help-block">Ex :- +971508897435,+917009876567</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-xs-2 col-sm-2 span-row-in">
                                                    <br>
                                                    <label>Work Number</label>
                                                </div>
                                                <div class="col-lg-5 col-xs-5 col-sm-5">
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="input-icon">
                                                            <input value="<?= $parent_details == '' ? '' : $parent_details[0]->father_work_number ?>" type="text" class="form-control" id="father_work_number">
                                                            <span class="help-block">Ex :- 508897435</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-xs-5 col-sm-5">
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="input-icon">
                                                            <input value="<?= $parent_details == '' ? '' : $parent_details[0]->mother_work_number ?>" type="text" class="form-control" id="mother_work_number">
                                                            <span class="help-block">Ex :- 508897435</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-xs-2 col-sm-2 span-row-in">
                                                    <br>
                                                    <label>Home Number</label>
                                                </div>
                                                <div class="col-lg-5 col-xs-5 col-sm-5">
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="input-icon">
                                                            <input value="<?= $parent_details == '' ? '' : $parent_details[0]->father_home_number ?>" type="text" id="father_home_number" class="form-control">
                                                            <span class="help-block">Ex :- 97435</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-xs-5 col-sm-5">
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="input-icon">
                                                            <input value="<?= $parent_details == '' ? '' : $parent_details[0]->mother_home_number ?>" type="text" id="mother_home_number" class="form-control">
                                                            <span class="help-block">Ex :- 97435</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-xs-2 col-sm-2 span-row-in">
                                                    <br>
                                                    <label>Personal Email&nbsp;<span style="color:red
                                                                                     ">*</span></label>
                                                </div>
                                                <div class="col-lg-5 col-xs-5 col-sm-5">
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="input-icon">
                                                            <input value="<?= $elec_details == '' ? '' : $elec_details[0]->father_email ?><?= $parent_details == '' ? '' : $parent_details[0]->father_personal_email ?>" id="father_email" type="text" class="form-control">
                                                            <span class="help-block">Ex :- jumbian@google.com</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-xs-5 col-sm-5">
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="input-icon">
                                                            <input value="<?= $parent_details == '' ? '' : $parent_details[0]->mother_personal_email ?>" id="mother_email" type="text" class="form-control">
                                                            <span class="help-block">Ex :- jumbian@google.com</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-lg-2 col-xs-3 col-sm-2">
                                                    <br>
                                                    <label id="marital_staus_display">Marital Status&nbsp;<span style="color:red
                                                                                                                ">*</span></label>
                                                </div>

                                                <div class="col-lg-2 col-xs-3 col-sm-2">
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="md-radio">
                                                            <input  <?= $parent_details == '' ? '' : $parent_details[0]->marital_status == 'Marred' ? 'checked="checked"' : '' ?> type="radio" value="Marred" id="Marred" name="father_mother_marital_status" class="md-radiobtn">
                                                            <label for="Marred">
                                                                <span class="inc">Married</span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Married </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2 col-xs-3 col-sm-2">
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="md-radio">
                                                            <input <?= $parent_details == '' ? '' : $parent_details[0]->marital_status == 'Divorced' ? 'checked="checked"' : '' ?> type="radio" value="Divorced" id="Divorced" name="father_mother_marital_status" class="md-radiobtn">
                                                            <label for="Divorced">
                                                                <span class="inc">Divorced</span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Divorced </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2 col-xs-3 col-sm-2">
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="md-radio">
                                                            <input <?= $parent_details == '' ? '' : $parent_details[0]->marital_status == 'Other' ? 'checked="checked"' : '' ?> type="radio" id="Other" value="Other" name="father_mother_marital_status" class="md-radiobtn">
                                                            <label for="Other">
                                                                <span class="inc">Other</span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Other </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>

                                                <div class="col-lg-2 col-xs-2 col-sm-2 span-row-in">
                                                    <br>
                                                    <label>Please specify</label>
                                                </div>

                                                <div class="col-lg-5 col-xs-10 col-sm-5">
                                                    <div class="form-group form-md-line-input has-success">
                                                        <div class="input-icon">

                                                            <input value="<?= $parent_details == '' ? '' : $parent_details[0]->marital_status ?>" type="text" id="other_marital_status" class="form-control">
                                                            <span class="help-block">Please specify</span>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>



                        </div>

                        <!-- E PARENT/GUARDIAN INFORMATION E -->

                        <!-- 3 S -->
                        <div class="col-xs-12">
                            <form role="form">
                                <div class="form-body"> 
                                    <div class=" medical-tab-head">

                                        <div class="col-lg-4 col-xs-4 col-sm-4 xdfv text-center">
                                            <span class="caption-subject bold uppercase"> Emergency Contact Name&nbsp;<span style="color:red
                                                                                                                            ">*</span></span>
                                            <div class="col-sm-2"></div>
                                        </div>

                                        <div class="col-lg-4 col-xs-4 col-sm-4 text-center">
                                            <span class="caption-subject bold uppercase"> Contact Number&nbsp;<span style="color:red
                                                                                                                    ">*</span></span>
                                        </div>

                                        <div class="col-lg-4 col-xs-4 col-sm-4 text-center">
                                            <span class="caption-subject bold uppercase"> Relationship to Child&nbsp;<span style="color:red
                                                                                                                           ">*</span></span>
                                        </div>

                                    </div>
                                    <?php
                                    $emergency_contact_name_Arr = '';
                                    $emergency_contact_number_Arr = '';
                                    $child_relation_Arr = '';
                                    if ($child_details != '') {
                                        $emergency_contact_name_Arr = explode('~', $child_details[0]->emergency_contact_name);
                                        $emergency_contact_number_Arr = explode('~', $child_details[0]->emergency_contact_number);
                                        $child_relation_Arr = explode('~', $child_details[0]->relationship_to_child);
                                    }
                                    ?>
                                    <div class="row">
                                        <div class="col-lg-1 col-xs-12 col-sm-12">
                                            <div class="form-group form-md-line-input has-success"><b>1</b></div>
                                        </div>
                                        <div class="col-lg-3 col-xs-4 col-sm-4">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="<?= $child_details == '' ? '' : isset($emergency_contact_name_Arr[0]) ? $emergency_contact_name_Arr[0] : '' ?>" type="text" class="form-control emergency_contact_name">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xs-4 col-sm-4">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="<?= $child_details == '' ? '' : isset($emergency_contact_number_Arr[0]) ? $emergency_contact_number_Arr[0] : '' ?>" type="text"  class="form-control emergency_contact_number">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xs-4 col-sm-4">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input value="<?= $child_details == '' ? '' : isset($child_relation_Arr[0]) ? $child_relation_Arr[0] : '' ?>" type="text" class="form-control relationship_to_child">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-lg-1 col-xs-12 col-sm-12">
                                            <div class="form-group form-md-line-input has-success"><b>2</b></div>
                                        </div>

                                        <div class="col-lg-3 col-xs-4 col-sm-4">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">

                                                    <input type="text" value="<?= $child_details == '' ? '' : isset($emergency_contact_name_Arr[1]) ? $emergency_contact_name_Arr[1] : '' ?>" class="form-control emergency_contact_name">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-xs-4 col-sm-4">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input type="text" value="<?= $child_details == '' ? '' : isset($emergency_contact_number_Arr[1]) ? $emergency_contact_number_Arr[1] : '' ?>" class="form-control emergency_contact_number">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-xs-4 col-sm-4">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <input type="text" value="<?= $child_details == '' ? '' : isset($child_relation_Arr[1]) ? $child_relation_Arr[1] : '' ?>" class="form-control relationship_to_child">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <br/> 
                                        </div>
                                    </div>

                                    <div class="medical-tab-head">
                                        <div class="col-lg-4 col-xs-4 col-sm-4 text-center">
                                            <span class="caption-subject bold uppercase"> Sibling Name&nbsp;<span style="color:red
                                                                                                                  ">*</span></span>
                                            <div class="col-sm-2"></div>
                                        </div>
                                        <div class="col-lg-4 col-xs-4 col-sm-4 text-center">
                                            <span class="caption-subject bold uppercase"> Age&nbsp;<span style="color:red
                                                                                                         ">*</span></span>
                                        </div>
                                        <div class="col-lg-4 col-xs-4 col-sm-4 text-center">
                                            <span class="caption-subject bold uppercase"> Gender&nbsp;<span style="color:red
                                                                                                            ">*</span></span>
                                        </div>
                                    </div>
                                    <?php
                                    if ($child_details == '') {
                                        $sibling_details = [];
                                    }
                                    for ($i = 0; $i < count($sibling_details); $i++) {
                                        if (!isset($sibling_details[$i]->sibling_name)) {
                                            $sibling_details[$i]->sibling_name = '';
                                        }
                                        if (!isset($sibling_details[$i]->age)) {
                                            $sibling_details[$i]->age = '';
                                        }
                                        if (!isset($sibling_details[$i]->gender)) {
                                            $sibling_details[$i]->gender = '';
                                        }
                                        ?>
                                        <div class="row" id="sibling_div_<?= $i ?>">
                                            <div class="col-lg-4 col-xs-4 col-sm-4">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <input value="<?= $sibling_details == '' ? '' : $sibling_details[$i]->sibling_name ?>" type="text" class="form-control sibling_name">
                                                        <span class="help-block">Ex :-Rahul Kumar</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-xs-4 col-sm-4">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <input value="<?= $sibling_details == '' ? '' : $sibling_details[$i]->age ?>" type="text" class="form-control sibling_age">
                                                        <span class="help-block">Ex :-10</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-xs-4 col-sm-4 sibling_gender_btn" radio_btn_id="0">
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
                                            <div class="col-lg-1 col-xs-1 col-sm-1">
                                                <br>
                                                <?php if ($i != 0) {
                                                    ?><button type="button" div_id="1" class="btn red btn-xs remove_sibling">Remove</button><?php }
                                                ?>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <div id="add_more_sibiling_details" start_loop="<?= $i ?>"></div>

                                    <div class="row">
                                        <div class="col-md-12 text-right ridsa1">
                                            <button type="button" class="btn green-meadow" id="add_more_sibling">Add More</button>
                                        </div>
                                    </div>

                                    <div class="clearfix margin-top-10 note-span-div">
                                        Any additional adults living in the household?e.g. extended family,driver, maid etc.? (Please list their names and relationship to the child

                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">

                                                    <textarea   class="form-control" rows="2" id="additional_sibling_details" ><?= $child_details == '' ? '' : $child_details[0]->additional_sibling_details ?></textarea>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- 3 E -->

                        <!-- 4 S -->
                        <div class="portlet light portlet-fit">
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption  ">
                                        <span class="caption-subject bold uppercase "> CHILD COLLECTION AUTHORISATION FORM</span>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="clearfix   note-span-div">Use of this form gives authorisation for a person other than the usual person (even a parent if our staff are unfamiliar with them) to collect your child from Sensation Station, e.g. the father, a friend, or a grandparent etc. You need to provide a copy of the persons photo ID and the authorised person must produce official photo identification upon arrival. We accept Emirates ID, a passport or UAE Driving license. 
                                    </div>
                                </div>


                                <div class="portlet-body form">
                                    <form role="form">
                                        <div class="form-body">

                                            <div class=" medical-tab-head">
                                                <div class="col-sm-2 text-center">
                                                    <span class="caption-subject bold uppercase">  NAME&nbsp;<span style="color:red">*</spna></span>
                                                        <div class="col-sm-2"></div>
                                                </div>
                                                <div class="col-sm-4 text-center">
                                                    <span class="caption-subject bold uppercase"> RELATIONSHIP&nbsp;<span style="color:red">*</spna>  </span>
                                                </div>
                                                <div class="col-sm-3 text-left">
                                                    <span class="caption-subject bold uppercase"> MOBILE TEL&nbsp;<span style="color:red">*</spna></span>
                                                </div>
                                                <div class="col-sm-3 text-left">
                                                    <span class="caption-subject bold uppercase"> ID PROVIDED&nbsp;<span style="color:red">*</spna></span>
                                                </div>

                                            </div>

                                            <?php
                                            if ($child_details == '') {
                                                $authorisation_detail = [];
                                            }

                                            for ($i = 0; $i < count($authorisation_detail); $i++) {
                                                if (empty($authorisation_detail[$i]->name)) {
                                                    $authorisation_detail[$i]->name = '';
                                                }
                                                if (empty($authorisation_detail[$i]->relationship)) {
                                                    $authorisation_detail[$i]->relationship = '';
                                                }
                                                if (empty($authorisation_detail[$i]->mobile)) {
                                                    $authorisation_detail[$i]->mobile = '';
                                                }
                                                if (empty($authorisation_detail[$i]->id_card)) {
                                                    $authorisation_detail[$i]->id_card = '';
                                                }
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
                                                    <?php if ($i != 0) { ?>
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

                                            <div class="clearfix margin-top-10 note-span-div">Please note: If circumstances change with regard to this authorisation, it is important to inform Sensation Station immediately.
                                            </div>

                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- 4 E -->


                        <!-- 5 S -->
                        <div class="portlet light portlet-fit">
                            <div class="portlet light"> 

                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold uppercase">BACKGROUND INFORMATION</span>
                                    </div>
                                </div>

                                <div class="portlet-body">
                                    <form role="form">
                                        <div class="form-body">
                                            <div class="clearfix note-span-div">Dear Parent, please kindly complete this questionnaire to provide us with some background information about your child’s medical history, birth and infancy. A case history of your child’s milestone development including language, motor, sensory and social development will be taken during the parent consultation. 
                                            </div>
                                            <div class="note-span-div">
                                                Please be assured that any personal information related to family or your child’s medical and developmental history / diagnosis cannot be accessed or shared by us without a clear signed consent from Parents / Legal Guardians (a release form). 
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <!-- 5 E -->

                        <!-- 6 S -->

                        <div class="portlet light">  
                            <div class="portlet-title">
                                <div class="caption">
                                    <span class="caption-subject bold uppercase"> MEDICAL   HISTORY</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <form role="form">
                                    <div class=" ">

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
                                                        <?php
//echo $medical_history[0]->diagnosis."kkkk";
                                                        ?>
                                                        <input  <?= isset($medical_history[0]->diagnosis) && $medical_history[0]->diagnosis == 'Yes' ? 'checked="checked"' : ''; ?> type="radio" id="diagnosis_yes" name="diagnosis" value="Yes" class="md-radiobtn">
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
                                                        <input <?= isset($medical_history[0]->diagnosis) && $medical_history[0]->diagnosis == 'No' ? 'checked="checked"' : ''; ?> type="radio" id="diagnosis_no" value="No" name="diagnosis" class="md-radiobtn">
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
                                                        <input value="<?= isset($medical_history[0]->diagnosis) && $medical_history[0]->diagnosis == 'Yes' ? $medical_history[0]->diagnosis_desc : ''; ?>" type="text" class="form-control" id="diagnosis_extra_details">
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
                                                        <input type="radio" <?= isset($medical_history[0]->hospitalisation) && $medical_history[0]->hospitalisation == 'Yes' ? 'checked="checked"' : ''; ?> id="hospitalisation_yes" value="Yes" name="hospitalisation" class="md-radiobtn">
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
                                                        <input value="No" type="radio" <?= isset($medical_history[0]->hospitalisation) && $medical_history[0]->hospitalisation == 'No' ? 'checked="checked"' : ''; ?> id="hospitalisation_no" name="hospitalisation" class="md-radiobtn">
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
                                                        <input type="text" id="hospitalisation_extra_details" value="<?= isset($medical_history[0]->hospitalisation) && $medical_history[0]->hospitalisation == 'Yes' ? $medical_history[0]->hospitalisation_desc : ''; ?>" class="form-control">
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
                                                        <input <?= isset($medical_history[0]->breastfed) && $medical_history[0]->breastfed == 'Yes' ? 'checked="checked"' : ''; ?> type="radio" value="Yes" id="breastfed_yes" name="breastfed" class="md-radiobtn">
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
                                                        <input <?= isset($medical_history[0]->breastfed) && $medical_history[0]->breastfed == 'No' ? 'checked="checked"' : ''; ?> type="radio" id="breastfed_no" value="No" name="breastfed" class="md-radiobtn">
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
                                                        <input value="<?= isset($medical_history[0]->breastfed) && $medical_history[0]->breastfed == 'Yes' ? $medical_history[0]->breastfed_desc : ''; ?>" id="breastfed_extra_details" type="text" class="form-control">
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
                                                        <input <?= isset($medical_history[0]->external_triggers) && $medical_history[0]->external_triggers == 'Yes' ? 'checked="checked"' : ''; ?> value="Yes" type="radio" id="external_triggers_Yes" name="external_triggers" class="md-radiobtn">
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
                                                        <input <?= isset($medical_history[0]->external_triggers) && $medical_history[0]->external_triggers == 'No' ? 'checked="checked"' : ''; ?> type="radio" value="No" id="external_triggers_no" name="external_triggers" class="md-radiobtn">
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
                                                        <input value="<?= isset($medical_history[0]->external_triggers) && $medical_history[0]->external_triggers == 'Yes' ? $medical_history[0]->external_triggers_desc : ''; ?>" id="external_triggers_extra_details" type="text" class="form-control">
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
                                                        <input <?= isset($medical_history[0]->disorders_in_fm) && $medical_history[0]->disorders_in_fm == 'Yes' ? 'checked="checked"' : ''; ?> type="radio" value="Yes" id="disorders_in_fm_yes" name="disorders_in_fm" class="md-radiobtn">
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
                                                        <input type="radio" <?= isset($medical_history[0]->disorders_in_fm) && $medical_history[0]->disorders_in_fm == 'No' ? 'checked="checked"' : ''; ?> value="No" id="disorders_in_fm_no" name="disorders_in_fm" class="md-radiobtn">
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
                                                        <input value="<?= isset($medical_history[0]->disorders_in_fm) && $medical_history[0]->disorders_in_fm == 'Yes' ? $medical_history[0]->disorders_in_fm_desc : ''; ?>" type="text" id="disorders_in_fm_extra_details" class="form-control">
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
                                                        <input <?= isset($medical_history[0]->child_medication_history) && $medical_history[0]->child_medication_history == 'Yes' ? 'checked="checked"' : ''; ?> type="radio" value="Yes" id="child_medication_history_yes" name="child_medication_history" class="md-radiobtn">
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
                                                        <input value="No" <?= isset($medical_history[0]->child_medication_history) && $medical_history[0]->child_medication_history == 'No' ? 'checked="checked"' : ''; ?> type="radio" id="child_medication_history_no" name="child_medication_history" class="md-radiobtn">
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
                                                        <input value="<?= isset($medical_history[0]->child_medication_history) && $medical_history[0]->child_medication_history == 'Yes' ? $medical_history[0]->child_medication_history_desc : ''; ?>" type="text" id="child_medication_history_extra_details" class="form-control">
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
                                                        <input <?= isset($medical_history[0]->extended_periods) && $medical_history[0]->extended_periods == 'Yes' ? 'checked="checked"' : ''; ?> value="Yes" type="radio" id="extended_periods_yes" name="extended_periods" class="md-radiobtn">
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
                                                        <input <?= isset($medical_history[0]->extended_periods) && $medical_history[0]->extended_periods == 'No' ? 'checked="checked"' : ''; ?> value="No" type="radio" id="extended_periods_no" name="extended_periods" class="md-radiobtn">
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
                                                        <input value="<?= isset($medical_history[0]->extended_periods) && $medical_history[0]->extended_periods == 'Yes' ? $medical_history[0]->extended_periods_desc : ''; ?>" type="text" id="extended_periods_extra_Details" class="form-control">
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
                                                        <input value="<?= $illness_other_specify ?>" type="text" id="illnesses_other_details" class="form-control">
                                                        <span class="help-block">Ex :- Any Char</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <!-- 6 E -->




                        <!-- 8 S -->

                        <div class="portlet light">  
                            <div class="portlet-title">
                                <div class="caption">
                                    <span class="caption-subject bold uppercase "> PRENATAL   HISTORY</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <form role="form">
                                    <div class=" ">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <label>Mothers’ and Father’s age at  time of delivery?  </label>

                                                        <input value="<?= $child_details == '' ? '' : isset($prenatal_history[0]->mother_father_age) ? $prenatal_history[0]->mother_father_age : '' ?>" id="mother_father_age_deliver_time" type="text" class="form-control">
                                                        <span class="help-block">Ex :- 10,20</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <label>Pregnancy history: </label>

                                                        <input value="<?= $child_details == '' ? '' : isset($prenatal_history[0]->pregnancy_history) ? $prenatal_history[0]->pregnancy_history : '' ?>"   id="pregnancy_history" type="text" class="form-control">
                                                        <span class="help-block">Ex :- complications, illness, medication, vaccines, trauma</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <label>TYPE OF DELIVERY </label>

                                                        <input value="<?= $child_details == '' ? '' : isset($prenatal_history[0]->delivery_type) ? $prenatal_history[0]->delivery_type : '' ?>"      id="delivery_type" type="text" class="form-control">
                                                        <span class="help-block">Ex :- </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <label>Comment </label>

                                                        <input value="<?= $child_details == '' ? '' : isset($prenatal_history[0]->comment) ? $prenatal_history[0]->comment : '' ?>"  id="prenatal_history_comment" type="text" class="form-control">
                                                        <span class="help-block">Ex :- </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <label>APGAR scores </label>

                                                        <input   value="<?= $child_details == '' ? '' : isset($prenatal_history[0]->apgar_scores) ? $prenatal_history[0]->apgar_scores : '' ?>"      id="apgar_scores" type="text" class="form-control">
                                                        <span class="help-block">Ex :- </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">

                                                        <label>Presentation straight after birth</label>
                                                        <input  value="<?= $child_details == '' ? '' : isset($prenatal_history[0]->presentation_straight) ? $prenatal_history[0]->presentation_straight : '' ?>"       id="presentation_straight" type="text" class="form-control">
                                                        <span class="help-block">Ex :- Jaundice / Colic / any known health issues in early weeks </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- 8 E -->


                        <!-- 9 S -->

                        <div class="portlet light portlet-fit ">

                            <div class="portlet light"> 
                                <div class="portlet-title">
                                    <div class="caption  ">
                                        <span class="caption-subject bold uppercase "> BABY’S FIRST 6 MONTHS? (Please ‘<i class="fa fa-check"></i>’ if yes )</span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form role="form">
                                        <div class="form-body ">
                                            <?php
                                            $six_month_details = '';
                                            $form_accept_type = '';
                                            if ($child_details != '') {
                                                if ($child_details[0]->form_accept_status == 1) {
                                                    $form_accept_type = 'checked';
                                                } $six_month_details = explode('~', $child_details[0]->baby_six_month_details);
                                            }
                                            Get_baby_6_month_details($six_month_details);
                                            ?>
                                        </div>
                                    </form>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- 9 E -->

                        <!-- 10 S -->



                        <!-- 10 E -->

                        <!-- 11 S -->
                        <div class="portlet light portlet-fit" >
                            <div class="portlet light" style="padding-bottom:0px;">  

                                <div class="portlet-body form">
                                    <form role="form">
                                        <div class="form-body">
                                            <div class="  note-span-div">
                                                <p><b>If there is anything else you would like us to know about your child, please feel free to fill in the space below.</b></p>
                                            </div>

                                            <div class="form-group finput-icon">
                                                <textarea class="form-control" id="extra_information_child" rows="3" placeholder="Enter more text"><?= isset($child_details[0]->extra_information_child) && $child_details[0]->extra_information_child != '' ? $child_details[0]->extra_information_child : '' ?></textarea>
                                            </div>

                                            <div class=" ">
                                                <p style="color: red"> <b> I certify that the information on this form is accurate and complete to the best of my knowledge.</b></p>
                                            </div>


                                            <div class="">
                                                <label for="complints11">
                                                    Date :<?php echo date('d/m/Y'); ?> </label>
                                            </div>

                                            <div class="">
                                                <br/>
                                                <div class="md-checkbox"> 
                                                    <input type="checkbox" <?= $form_accept_type ?> id="accept_pt_btn" value="1"  name="accept_pt_btn" class="md-check">
                                                    <label for="accept_pt_btn" class="accept_pt_btn">
                                                        <span class="inc">Accept</span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> Accept </label>
                                                </div>
                                            </div>

                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                </div>
                                </form>
                            </div>

                        </div>

                        <!-- 11 E -->

                        <div class="form-group col-sm-12">
                            <button type="button" class="btn  green-stripe  pull-right" id="reg_form_submit">SAVE & NEXT</button>
                            <br/>
                            <br/>
                        </div>

                        <div class="clearfix"></div>				

                    </div>


                    <div class="clearfix"></div>
                </div>

            </div>
        </div>  
    </div>  




</div>


<div class="clearfix"></div>	
</div>
<!--content Area  End-->

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

