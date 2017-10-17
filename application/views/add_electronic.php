<?php $date = date('d-m-y') ;?>

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-offset-1 col-lg-10 col-xs-12 col-sm-12 col-lg-offset-1">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-green">
                                <span class="caption-subject bold uppercase"></span></span>Add New Electronic</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form role="form" id='quotation_form'>
                                <div class="form-body">


                                    <div class="row">
                                        <div class="col-md-6"> 
                                            <div class="form-group form-md-line-input form-md-floating-label has-success">
                                                <label for="name">Name</label>
                                                <input value="" type="text" class="form-control" id="name">
                                            </div>
                                        </div>
                                        <div class="col-md-6"> 
                                            <div class="form-group form-md-line-input form-md-floating-label has-success">
                                                <label for="email">Email</label>
                                                <input value="" type="text" class="form-control" id="email">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6"> 
                                            <div class="form-group form-md-line-input form-md-floating-label has-success">
                                                <label for="phone">Phone</label>
                                                <input value="" type="text" class="form-control" id="phone">
                                            </div>
                                        </div>
                                        <div class="col-md-6"> 

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-9"> 


                                        </div>
                                        <div class="col-md-3"> 
                                            <a  class="btn green" id="show_quotation">Add Quotation
                                                <i class="fa fa-plus"></i>
                                            </a>

                                            <a  class="btn green" id="hide_quotation" style="display:none;">Add Quotation
                                                <i class="fa fa-minus"></i>
                                            </a>

                                        </div>


                                    </div>
                                    <!--quotation-->
                                    <div id="display_quotation" style="display:none;">
                                     <div class="row">
                                        <div class="col-md-6"> 
                                            <div class="form-group form-md-line-input form-md-floating-label has-success">
                                                <label for="disipline_name">Category</label>

                                                <select id="quotation_category" class="form-control insert" data-id="cat_name">
                                                    <option value="">--select--</option>
                                                    <?php
                                                    if (isset($category_name)) {

                                                        foreach ($category_name as $category_name) {
                                                            echo "<option value=" . $category_name->id . ">" . $category_name->category_name . "</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>


                                            </div>
                                        </div>
                                        <div class="col-md-6"> 
                                            <div class="form-group form-md-line-input form-md-floating-label has-success">
                                                <label for="service_details">Services</label>

                                                <div id="service_details">
                                                    <select id="service_sub_category" class="form-control insert" data-id="service_name">
                                                        <option value="">--select--</option>
                                                    </select>
                                                </div>


                                            </div>  
                                        </div>
                                    </div>

                                        <div class="row">
                                        <div class="col-md-6"> 
                                            <div class="form-group form-md-line-input form-md-floating-label has-success">
                                                <label for="disipline_name">Disipline</label>
                                                <div id="disipline_details">
                                                    <select id="disipline_name" class="form-control insert" data-id="disipline_name">
                                                        <option value="">--select--</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6"> 
                                            <div class="form-group form-md-line-input form-md-floating-label has-success">
                                                <label for="staff_name">Staff Name</label>
                                                <div id="staff_details">
                                                    <select id="staff_name" class="form-control insert" data-id="staff_name">
                                                        <option value="">--select--</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                        
                                        <div class="row">
                                        <div class="col-md-6">    
                                            <div class="form-group form-md-line-input form-md-floating-label has-success">
                                                <label for="staff_name">Type</label>
                                                <select id="calendar_type" class="form-control insert" data-id="calendar_type">
                                                    <option value="">--select--</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Multiple">Multiple</option>
                                                    <option value="Year">Year</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-6">    
                                            <br><br>
                                            <!--<div>Service Time:&nbsp;<span id="staff_time"></span></div>-->
                                            <!--<div>Service Time Type:&nbsp;<span id="staff_hr"></span></div>-->
                                            <div>
                                                <a href="javascript:;" class="btn green"> Service Fees:&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;AED :&nbsp;&nbsp;  <span id="staff_fees">0</span></a>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="row" id="single_cal" style="display:none;">
                                        <div class="col-md-6"> 
                                            <div class="form-group form-md-line-input form-md-floating-label has-success" >
                                                <label for="child_name">Date</label>
                                                <input class="form-control form-control-inline input datepicker" id="single_date" type="text" value="" name='start_date'>
                                            </div>

                                        </div>

                                    </div>

                                       <div class="row" id="multiple_cal" style="display:none;">
                                        <div class="col-md-6"> 
                                            <div class="form-group form-md-line-input form-md-floating-label has-success" >
                                                <label for="child_name">Start Date</label>
                                                <input class="form-control form-control-inline input datepicker" id="start_multiple_date" type="text" value="" name='start_date'>
                                            </div>

                                        </div>
                                        <div class="col-md-6"> 
                                            <div class="form-group form-md-line-input form-md-floating-label has-success">
                                                <label for="child_name">End Date</label>
                                                <input class="form-control form-control-inline input datepicker" id="end_multiple_date" type="text" value="">
                                            </div>
                                        </div>
                                    </div>

                                        <div class="row" id="year_cal" style="display:none;">
                                        <div class="col-md-6"> 
                                            <div class="form-group form-md-line-input form-md-floating-label has-success" >
                                                <label for="child_name">Start Date</label>
                                                <input class="form-control form-control-inline input datepicker" id="start_year_date" type="text" value="" name='start_date'>
                                            </div>

                                        </div>
                                        <div class="col-md-6"> 
                                            <div class="form-group form-md-line-input form-md-floating-label has-success">
                                                <label for="child_name">End Date</label>
                                                <input class="form-control form-control-inline input datepicker" id="end_year_date" type="text" value="">
                                            </div>
                                        </div>
                                    </div>
                                      <div class="row">
                                        <div class="col-md-6"> 
                                            <div class="form-group form-md-line-input form-md-floating-label has-success" >
                                                <label for="child_name">Number Of Session</label>
                                                <input class="form-control form-control-inline input" id="number_session"  type="text" value="">
                                            </div>
                                        </div>
                                    </div>
                                        
                                        <div id="session_details">

                                    </div>
                                        
                                        <div class="row">
                                        <div class="col-sm-6">

                                            <div class="form-actions noborder" id="" >
                                                <button type="button"  id="" class="btn purple mt-ladda-btn ladda-button mt-progress-demo" data-style="expand-right">
                                                    <span class="ladda-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Submit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                    <span class="ladda-spinner"></span><span class="ladda-spinner"></span></button>

                                            </div>
                                        </div>
                                    </div>
                                        
                                    </div>
                                    <!-- quotation end-->
                                    <div class="row">
                                        <div class="col-md-9"> 


                                        </div>
                                        <div class="col-md-3"> 
                                            <div class="form-actions noborder" id="quotation_btn">
                                                <button type="button" id="send_electronic_link" class="btn blue">Submit</button>
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
    <!-- END CONTENT BODY -->
</div>
</div>

