<style>
    .fc-widget-header{
        background: #fff !important;
        cursor: pointer;
    }
</style>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="row">

            <div class="col-lg-12 col-xs-12 col-sm-12">
                <div id="tbl_export" style="display:none;"></div>  
                <input type="hidden" id="calender_type" value="">
                <button type="button" id="export_appointment"  class="btn green btn-sm">Export <i class="fa fa-external-link"></i> </button>
                <button type="button" style="display: none;" id="week_export_btn"  onclick="tableToExcel('week_export', '', 'week_calender')" class="btn green btn-sm">Export<i class="fa fa-external-link"></i> </button>
                <button type="button" style="display: none;" id="today_export_btn"   onclick="tableToExcel('today_export', '', 'today_export')" class="btn green btn-sm">Export<i class="fa fa-external-link"></i> </button>
                <button type="button" style="display: none;" id="day_export_btn"   onclick="tableToExcel('day_export', '', 'day_export')" class="btn green btn-sm">Export<i class="fa fa-external-link"></i> </button>

                <!--content Area  statrt-->
                <div class="employer_search_wrap" id="search_employee_for_month_div"> 
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" id="calender_search_employee" placeholder="Search for Employee And Child..."> 
                    </div>
                    <div class="childs_names form-group">
                        <ul class="employelist droplist employelist_search_ul">
                        </ul>
                    </div>
                </div>

                <div class="employer_search_wrap" id="search_employee_for_week_div" style="display: none;"> 
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" id="calender_search_employee_for_week" placeholder="Search for Employee"> 
                    </div>
                    <div class="childs_names form-group">
                        <ul class="employelist droplist employelist_search_ul_weekdays">

                        </ul>
                    </div>
                </div>

                <div class="topemployerlist pull-left" id="selected_calender_employee" style="display:none;">

                    <div class="clearfix"></div>
                </div>

                <div class="topemployerlist pull-left" id="selected_calender_employee_for_week" style="display: none;">

                </div>

                <div class="col-lg-12 col-lg-9 portlet light bordered tabsitemainwrap">
                    <div class="row caltopwrap">
                        <div class="pull-left  " id="calendar_tab" style="display: none;">
                            <button onclick="get_month_calender_status()" type="button" id="month_btn" class="btn blue">
                                Month</button>   
                            <button onclick="get_week_days_calender_status()" type="button" id="week_btn"  class="btn green">
                                Week</button> 
                            <button onclick="get_days_calender_status('today')" type="button" id="today_btn" class="btn purple">
                                Today</button>
                            <button onclick="get_days_calender_status('day')" type="button" id="days_btn" class="btn purple">
                                Day</button>
                        </div>
                    </div>

                    <div class="portlet-body form">
                        <form role="form">

                            <div class="row" id="calendar_details">
                                <!--auto load calendar using helper common_helper.php    -->
                            </div>
                            <div class="row" id="weekly_calnder_view" style="display: none">
                                <!--auto load calendar days using helper calender_helper.php    -->
                            </div>
                            <div class="row" id="days_calnder_view" style="display: none">
                                <!--auto load calendar days using helper calender_helper.php    -->
                            </div>
                            <div class="row" id="get_days_calender_by_date_view" style="display: none">
                                <!--auto load calendar days using helper calender_helper.php    -->
                            </div>

                    </div>
                    </form>
                </div>
            </div>

            <!--content Area  End-->

        </div>
    </div>
</div>
<!-- END CONTENT BODY -->
</div>
</div>



<div class="modal fade" id="basic_add_activity" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><center><b>Add Activity  <date  id="activity_date"></date></b></center></h4>
            </div>

            <div class="modal-body">  
                <form role="form">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Subject</label>
                            <input id="activity_subject" class="form-control spinner" type="text" placeholder="Subject"> 
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <label>Location</label>
                            <select id="activity_location" class="form-control">
                                <option value="">select</option>
                                <?= location_drop_down(); ?>
                            </select> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Start Date </label>
                                <input value="" type="text" class="form-control manage_zindex datepicker" id="activity_start_date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>End Date </label> <span class="pull-right"><input   class="activty_add_all_day" type="checkbox"><b>Select Days</b></span>
                                <input type="text" class="form-control manage_zindex datepicker" id="activty_end_date">

                            </div>
                        </div>
                    </div>
                    <div class="row" style="display: none;" id="select_all_day_div_activty">
                        <div class="col-md-12">
                            <label class="mt-checkbox">
                                <input checked="" value="Sun" id="days_name_sun_activty" class="days_name_activty" type="checkbox"> Sun
                                <span></span>
                            </label>
                            <label class="mt-checkbox">
                                <input checked="" value="Mon" id="days_name_mon_activty" class="days_name_activty" type="checkbox"> Mon
                                <span></span>
                            </label>
                            <label  class="mt-checkbox">
                                <input checked="" value="Tue" id="days_name_tue_activty" class="days_name_activty" type="checkbox"> Tue
                                <span></span>
                            </label>
                            <label class="mt-checkbox">
                                <input checked="" value="Wed" id="days_name_wed_activty" class="days_name_activty" type="checkbox"> Wed
                                <span></span>
                            </label>
                            <label class="mt-checkbox">
                                <input checked="" value="Thu" id="days_name_thu_activty" class="days_name_activty" type="checkbox"> Thu
                                <span></span>
                            </label>
                            <label class="mt-checkbox">
                                <input checked="" value="Fri" id="days_name_fri_activty" class="days_name_activty" type="checkbox"> Fri
                                <span></span>
                            </label>
                            <label class="mt-checkbox">
                                <input checked="" value="Sat" id="days_name_sat_activty" class="days_name_activty" type="checkbox"> Sat
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Start Time </label>
                                <select   class="form-control" id="activity_start_time">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>End Time </label>
                                <select  class="form-control" id="activity_end_time">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="  col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12">Add Other Therapist  <span class="pull-right"><input checked=""  id="activity_add_me" type="checkbox">Add Me</span></label>
                                <input type="text" placeholder="Search For Other Therapist"  class="form-control" id="activity_staff_search"> 
                                <ul id="activity_staff_detals" class="event_listcls">

                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <div class="form-group" id="activity_selected_staff_update">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Notes</label>
                        <textarea id="activity_notes" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="form-group" id="status_busy_div" style="display: none;text-align: center;">
                        <label style="color:red;" id="start_time_busy"></label>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button style="display: none;" id="delet_current_one" db_id="" type="button" class="btn red">Delete Current One</button>
                <button style="display: none;" id="delet_activites" activities_id_grp="" type="button" class="btn red">Delete All</button>
                <button id="save_activites" activities_id_grp=""  type="button" class="btn green">Save Activity</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
