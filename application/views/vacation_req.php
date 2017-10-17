<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/css/consent_form.css">
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">

                <!--content Area  statrt-->
                <div class="col-lg-offset-1 col-lg-10 portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <span class="caption-subject bold uppercase">END OF SERVICE / VACATION REQUEST FORM</span>
                        </div>
                    </div>
                    <div class="portlet-body form">

                        <div class="form-body">

                            <div class="col-md-6">
                                <div class="form-group form-md-line-input has-success">
                                    <div class="input-icon">
                                        <label>Name of the Client</label>
                                        <input value="" type="text" id="child_name" class="form-control height25">
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-md-line-input has-success">
                                    <div class="input-icon">
                                        <label>Date</label>
                                        <input value="" type="text" id="child_name" class="form-control height25">
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-12">
                                <p>Dear Parents,</p>
                                <p class="margin-top-10">As you wish to take a break/cancel from the service you received from Sensation Station. Please help us by filling the questions and reading the information below,</p>
                            </div>
                            <div class="col-md-12">
                                <ol id="orderd_list"> 
                                    <li class="col-md-12"><b>I want to Cancel the sessions</b>
                                        <ul class="col-md-12">
                                            <div class="col-md-6">

                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="md-radio">
                                                        <input type="radio" id="sib_Marred" value="Male" name="child_gender" class="md-radiobtn">
                                                        <label for="sib_Marred">
                                                            <span class="inc">Temporarily</span>
                                                            <span class="check"></span>
                                                            <span class="box child_gender"></span> Temporarily </label>
                                                    </div>
                                                    <div class="md-radio">
                                                        <input type="radio" value="Female" id="sib_female" name="child_gender" class="md-radiobtn">
                                                        <label for="sib_female">
                                                            <span class="inc">Permanently</span>
                                                            <span class="check"></span>
                                                            <span class="box child_gender"></span> Permanently </label>
                                                    </div>
                                                </div>



                                            </div>
                                        </ul><br> 
                                    </li>

                                    <li class="col-md-12"><b>For the following</b>
                                        <ul class="col-md-12">
                                            <div class="form-group form-md-line-input has-success">
                                                <?php
                                                followings();
                                                ?>

                                            </div>
                                        </ul><br> 
                                    </li>

                                    <li class="col-md-12"><b>State the details bellow</b>
                                        <ul class="col-md-12">

                                            <div class="col-md-9">     
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <div class="col-md-5">
                                                            <label>I wish to stop services for</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <input value="" type="text" id="child_name" class="form-control height25">Weeks/Days
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-md-9">     
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <div class="col-md-3">
                                                            <label>Dates from</label> 
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input value="" type="text" id="child_name" class="form-control height25">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label>to</label> 
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input value="" type="text" id="child_name" class="form-control height25">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="md-checkbox has-info">
                                                    <input type="checkbox" id="checkbox16" class="md-check">
                                                    <label for="checkbox16">
                                                        <span class="inc">Vacation</span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>Vacation</label>
                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                                <div class="md-checkbox has-info">
                                                    <input type="checkbox" id="checkbox17" class="md-check">
                                                    <label for="checkbox17">
                                                        <span class="inc">other</span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>Others.Please specify</label>


                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <input value="" type="text" id="child_name" class="form-control height25">
                                            </div>



                                        </ul> 
                                    </li>
                                    <li class="col-md-12"><b>We would appreciate your feedback bellow</b>
                                        <ul class="col-md-12">
                                            <div class="form-group form-md-line-input has-success">
                                                <?php
                                                perfeedback();
                                                ?>

                                            </div>
                                        </ul><br> 
                                    </li>
                                </ol>

                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12 margin-top-10">
                                <div class="col-md-3">
                                    <p>Any further comments:</p>
                                </div>
                                <div class="col-md-7">
                                    <div class="input-icon">
                                        <input value="" type="text" id="child_name" class="form-control height25">
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p>I understand that I am required to give TWO WEEKS notice of cancellation to allow Sensation Station Centre to allocate the sessions to clients on the waiting list as promptly as possible. </p>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-md-line-input has-success">
                                    <div class="input-icon">
                                        <label>Parent/Guardian Full Name:</label>
                                        <input value="" type="text" id="child_name" class="form-control">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-md-line-input has-success">
                                    <div class="input-icon">
                                        <label>Parent/Guardian Signature:</label>
                                        <input value="" type="text" id="child_name" class="form-control">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 drdr margin-top-10">
                                <div class="col-md-6 brdright">
                                    <p><b>For office use only</b></p>
                                    <p class="fn12">This Cancellation Discharge Form has been read and signed by</p>
                                    <div class="input-icon">
                                        <div class="col-md-9">
                                         <input value="" type="text" id="child_name" class="form-control">
                                        </div>
                                        <div class="col-md-2">[Name]</div>

                                    </div>
                                    <div class="input-icon">
                                        <div class="col-md-9">
                                         <input value="" type="text" id="child_name" class="form-control margin-top-10">
                                        </div>
                                        <div class="col-md-2 margin-top-10">[Designation]</div>

                                    </div>
                                    <div class="input-icon">
                                        <div class="col-md-9">
                                         <input value="" type="text" id="child_name" class="form-control margin-top-10 margbt10">
                                        </div>
                                        <div class="col-md-2 margin-top-10 margbt10">[Signature]</div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p><b>Follow up from staff</b></p> 
                                </div>
                            </div>
                            <div class="col-md-offset-10 col-md-2">
                                </br>
                                <button type="button" class="btn btn-primary" id="consent_next">NEXT</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    function followings($details = '') {

        $arr = ['Speech and Language Therapy', 'Occupational Therapy', 'Recreation Therapy', 'Early Intervention Programme', 'Therapy Base Learning Programme'];
        for ($i = 0; $i < count($arr); $i++) {
            $chack = '';
            ?>
            <div class="col-sm-12">
                <div class="md-checkbox"> 
                    <input <?= $chack ?> type="checkbox" value="<?= $arr[$i] ?>" id="vac_follow<?= $i ?>" name="baby_first_six_month" class="md-check">
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

    function perfeedback() {

        $arr_feed = ['Cost', 'Centre location', 'Parking facilities', 'Relocation of family', 'Dissatisfied with the service', 'Dissatisfied with session timings'
            , 'Dissatisfied with therapist', 'Dissatisfied with course content', 'Other? Please specify'];

        for ($j = 0; $j < count($arr_feed); $j++) {
            $chack_fd = '';
            ?>
            <div class="col-sm-12">
                <div class="col-md-5">
                    <div class="md-checkbox"> 
                        <input <?= $chack_fd ?> type="checkbox" value="<?= $arr_feed[$j] ?>" id="vac_feed<?= $j ?>" name="baby_first_six_month" class="md-check">
                        <label for="vac_feed<?= $j ?>">
                            <span class="inc"><?= $arr_feed[$j] ?></span>
                            <span class="check"></span>
                            <span class="box"></span> <?= $arr_feed[$j] ?>
                        </label>
                    </div>
                </div>

                <?php
                if ($arr_feed[$j] == 'Other? Please specify') {
                    ?>
                    <div class="col-md-5">
                        <div class="input-icon">
                            <input value="" type="text" id="child_name" class="form-control height25">
                        </div> 
                    </div>
                <?php }
                ?>
            </div>

            <?php
        }
    }
    ?>


