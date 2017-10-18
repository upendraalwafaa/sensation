<?php
/*
  Project Name : Sensation Sation
  Company Name : alwafaagroup
  Author: Upendra Kumar Prasad
  file Name : calendar_helper.php(Helper)
  Project URI: http://demo.softwarecompany.ae/sensation/
  Description : It's only for child and employee calender
 */

function search_employee_and_child_name($array) {
    $value = $array['value'];
    $db = load_Database();
    $qry = "SELECT * FROM `employee_details` WHERE archive=0 AND employee_name LIKE '%" . $value . "%'";
    $employee = $db->Database->select_qry_array($qry);
    $qry2 = "SELECT * FROM `child_details` WHERE archive=0 AND `child_name` LIKE '%$value%' ORDER BY `child_name` ASC LIMIT 20";
    $child_arr = $db->Database->select_qry_array($qry2);
    $qry3 = "SELECT * FROM `disipline_details` WHERE `disipline_name` LIKE '%$value%' ORDER BY `description` ASC";
    $discipline = $db->Database->select_qry_array($qry3);
    $retrn_arr = [
        'employee' => $employee,
        'child' => $child_arr,
        'discipline' => $discipline
    ];
    echo json_encode($retrn_arr);
}

function Get_quotation_details($Arr) {
    $employee_id = $Arr['employee_id'];
    $start_date = $Arr['start_date'];
    $end_date = $Arr['end_date'];
    $session_date = $Arr['session_date'];
    $div_id = $Arr['div_id'];
    ?>
    <div class="modal-header" row_id="<?= $Arr['row_id'] ?>" div_id="<?= $div_id ?>" loop_id="<?= $Arr['loop_id'] ?>">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title"><center><b><?= date('d-M-Y', strtotime($session_date)) ?></b>
            </center>
        </h4>
    </div>
    <div class="modal-body">
        <div class="form-body">
            <div id="" class="has-toolbar mobile fc fc-ltr fc-unthemed">
                <table>
                    <tbody class="fc-body">
                    <table>
                        <tbody>
                            <tr>
                                <th class="" style="width: 100px;">Date</th>
                                <?php
                                $start = strtotime('09:00');
                                $end = strtotime('19:00');
                                for ($i = $start; $i <= $end; $i = $i + 30 * 60) {
                                    ?>
                                    <th class=""><?php echo date('H:i', $i); ?></th>
                                    <?php
                                }
                                ?>
                            </tr>
                            <?php
                            $start_date = date('d-m-Y', strtotime($session_date));
                            $date1 = new DateTime($session_date);
                            $date2 = new DateTime($session_date);
                            $diff = $date2->diff($date1)->format("%a");
                            for ($i = 0; $i <= $diff; $i++) {
                                $stop_date = date('d-m-Y', strtotime('+' . $i . ' day', strtotime($start_date)));
                                ?>
                                <tr>
                                    <th class="fc-day-header fc-widget-header" style="width: 100px;"><?= $stop_date; ?></th><?php
                                    for ($i = $start; $i <= $end; $i = $i + 30 * 60) {
                                        ?>
                                        <th   time="<?= date('H:i', $i) ?>" date="<?= $stop_date ?>" style="cursor: pointer;" class="create_session"></th>
                                        <?php
                                        }
                                        ?></tr>
                                <tr>
                                    <th class="fc-day-header fc-widget-header" style="width: 100px;">--</th><?php
                                    for ($i = $start; $i <= $end; $i = $i + 30 * 60) {
                                        ?>
                                        <th class=""></th>
                                        <?php
                                    }
                                    ?>
                                </tr> <?php
                            }
                            ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    </tbody>
    </div>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
        <button type="button" class="btn green">Save changes</button>
    </div>  <?php
}

function get_calendar($array) {
    $db = & get_instance();
    $year = $array['year'];
    $month = $array['month'];
    $html = '';
    $dateYear = ($year != '') ? $year : date("Y");
    $dateMonth = ($month != '') ? $month : date("m");
    $date = $dateYear . '-' . $dateMonth . '-01';
    $currentMonthFirstDay = date("N", strtotime($date));
    $totalDaysOfMonth = days_in_month($dateMonth, $dateYear);
    // $totalDaysOfMonth =(int) cal_days_in_month(CAL_GREGORIAN, $dateMonth, $dateYear);
    $totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7) ? ($totalDaysOfMonth) : ($totalDaysOfMonth + $currentMonthFirstDay);
    $boxDisplay = ($totalDaysOfMonthDisplay <= 35) ? 35 : 42;
    $y1 = date("Y", strtotime($date . ' - 1 Month'));
    $m1 = date("m", strtotime($date . ' - 1 Month'));
    $y2 = date("Y", strtotime($date . ' + 1 Month'));
    $m2 = date("m", strtotime($date . ' + 1 Month'));
    $func1 = getAllMonths($dateMonth);
    $func2 = getYearList($dateYear);
    $session_arr = $db->session->userdata('logged_in');
    $employee_id = $session_arr[0]->id;
    $ses_emp_id = $session_arr[0]->id;
    $cond = " AND QS.staff_id IN ($employee_id)";
    $cond2 = " AND EV.staff_id IN ($employee_id)";
    $discipline_ar = '';
    $child_ar = '';
    if (isset($array['tmpdata']['employee_id'])) {
        $employee_id = $array['tmpdata']['employee_id'];
        $child_id = $array['tmpdata']['child_id'];
        $discipline = $array['tmpdata']['discipline'];
        if ($employee_id == '' && $discipline == '') {
            $child_ar = $array['tmpdata']['child_id'];
        } else if ($employee_id == '' && $child_id == '') {
            $discipline_ar = $array['tmpdata']['discipline'];
        } else {
            if (in_array('All', $employee_id)) {
                $cond = '';
                $cond2 = '';
            } else {
                $employee_id = implode(',', $employee_id);
                $cond = " AND QS.staff_id IN ($employee_id)";
                $cond2 = " AND EV.staff_id IN ($employee_id)";
            }
        }
    }
    ?>
    <div id="calender_section">
        <div class="caltopwrap">

            <div class="pull-left">
                <button onclick="get_month_calender_status()" type="button" id="month_btn" class="btn blue">
                    Month</button>
                <button onclick="get_week_days_calender_status()" type="button" id="week_btn" class="btn green">
                    Week</button>
                <button onclick="get_days_calender_status('today')" type="button" id="today_btn" class="btn purple">
                    Today</button>
                <button onclick="get_days_calender_status('day')" type="button" id="days_btn" class="btn purple">
                    Day</button>
            </div>
            <div class="calendar_filtering pull-right">
                <?php
                $html = '';
                $html = $html . '  <a href="javascript:void(0);" onclick="preCalendar(\'calendar_div\',\'' . $y1 . '\',\'' . $m1 . '\');"><i class="fa fa-long-arrow-left"></i></a>
            <select name="month_dropdown" class="month_dropdown dropdown" onchange="month_sel();">';
                $html = $html . $func1 . '</select>';
                $html = $html . '   <select name="year_dropdown" class="year_dropdown dropdown" onchange="year_sel();" >';
                $html = $html . $func2 . '</select>';
                $html = $html . '<a href="javascript:void(0);" onclick="nextCalendar(\'calendar_div\',\'' . $y2 . '\',\'' . $m2 . '\');"><i class="fa fa-long-arrow-right"></i></a>';
                echo $html;
                ?>
            </div>


        </div>
        <div id="calender_section_top">
            <ul>
                <li>Sun</li>
                <li>Mon</li>
                <li>Tue</li>
                <li>Wed</li>
                <li>Thu</li>
                <li>Fri</li>
                <li>Sat</li>
            </ul>
        </div>
        <div id="calender_section_bot">
            <ul><?php
                $dayCount = 1;
                for ($cb = 1; $cb <= $boxDisplay; $cb++) {
                    if (($cb >= $currentMonthFirstDay + 1 || $currentMonthFirstDay == 7) && $cb <= ($totalDaysOfMonthDisplay)) {
                        $currentDate = $dateYear . '-' . $dateMonth . '-' . $dayCount;
                        $qry = "SELECT QS.*,QS.id AS session_id,QD.student_id,QD.electronic_link AS electronic_link_type,E.employee_name,E.color_id,D.description,C.child_name FROM `quotation_session_details` QS LEFT JOIN quotation_details QD ON QD.quotation_id=QS.`quotation_id` LEFT JOIN employee_details E ON E.id=QS.staff_id LEFT JOIN disipline_details D ON D.id=QS.discipline_type_id LEFT JOIN child_details C ON QD.student_id=C.id WHERE QS.`session_date`='$currentDate' $cond";
                        $event_qry = "SELECT EV.*,E.employee_name,E.color_id,T.employee_name AS creted_name,T.id AS creted_id FROM `event_schedule_details` EV  LEFT JOIN employee_details E ON E.id=EV.staff_id LEFT JOIN employee_details T ON T.id=EV.created_by WHERE EV.`event_date`='$currentDate' $cond2";
                        $calender_arr = $db->Database->select_qry_array($qry);
                        $event_arr = $db->Database->select_qry_array($event_qry);
                        $day_class = '';
                        if (strtotime($currentDate) == strtotime(date("Y-m-d"))) {
                            $day_class = 'grey date_cell';
                        } else {
                            $day_class = 'date_cell date_cell';
                        }
                        $metting_id = date('Y_m_d', strtotime($currentDate));
                        ?> 
                        <li class="<?= $day_class ?> event_model_open">
                            <div  class="poptils datecnter ">
                                <span date="<?= $currentDate ?>" class="days_calender_by_date "><?= $dayCount ?>  </span>
                                <span data-toggle="modal" metting_id="<?= $metting_id ?>" class="event_model_css event_empty_textbox" href="#metting_id_<?= $metting_id ?>"></span></div> 
                            <?php
                            if ($child_ar != '') {
                                $child_id = implode(',', $child_ar);
                                $qry_child = "SELECT Q.*,P.father_name,QS.*,C.child_name,E.employee_name,D.description FROM quotation_details Q  LEFT JOIN quotation_session_details QS ON QS.quotation_id=Q.quotation_id LEFT JOIN disipline_details D ON D.id=QS.discipline_type_id LEFT JOIN child_details C ON C.id=Q.student_id LEFT JOIN employee_details E ON E.id=QS.staff_id LEFT JOIN parent_details P ON C.id=P.child_id  WHERE Q.student_id IN ($child_id) AND QS.session_date='$currentDate'";
                                $child_arr = $db->Database->select_qry_array($qry_child);
                                for ($ch = 0; $ch < count($child_arr); $ch++) {
                                    $d = $child_arr[$ch];
                                    $starttime = date('H:i', strtotime($d->start_time));
                                    $endtime = date('H:i', strtotime($d->end_time));
                                    $color_name = staff_id_color($d->student_id);
                                    $html = get_session_pop_over($d);
                                    $html_title = "<span class='title_hover'>$d->child_name [" . $d->father_name . "] </span>";
                                    ?>  <div   style="background: <?= $color_name ?>" data-toggle="popover" title="<?= $html_title ?>" data-content="<?= $html ?>" class="ent_grid mancr1 show-popover-div"><?= $starttime . '-' . $endtime ?></div><?php
                                    }
                                } else if ($discipline_ar != '') {
                                    $discipline = implode(',', $discipline_ar);
                                    $qry_discipline = "SELECT QS.*,C.child_name,Q.student_id,D.disipline_name,D.description,E.employee_name FROM `quotation_session_details` QS LEFT JOIN employee_details E ON E.id=QS.staff_id LEFT JOIN disipline_details D ON D.id=QS.discipline_type_id LEFT JOIN quotation_details Q ON Q.quotation_id=QS.quotation_id LEFT JOIN child_details C ON C.id=Q.student_id WHERE QS.discipline_type_id IN ($discipline) AND QS.session_date='$currentDate'";
                                    $discipline_db_ar = $db->Database->select_qry_array($qry_discipline);

                                    for ($dds = 0; $dds < count($discipline_db_ar); $dds++) {
                                        $d = $discipline_db_ar[$dds];
                                        $starttime = date('H:i', strtotime($d->start_time));
                                        $endtime = date('H:i', strtotime($d->end_time));
                                        $color_name = staff_id_color($d->discipline_type_id);
                                        $html = get_session_pop_over($d);
                                        $html_title = "<span class='title_hover'>$d->description</span>";
                                        ?>  <div   style="background: <?= $color_name ?>" data-toggle="popover" title="<?= $html_title ?>" data-content="<?= $html ?>" class="ent_grid mancr1 show-popover-div"><?= $starttime . '-' . $endtime ?></div><?php
                                }
                            } else {
                                get_event_every_day_html($metting_id, $currentDate, $ses_emp_id);
                                if (count($calender_arr) || count($event_arr)) {
                                    for ($ses = 0; $ses < count($calender_arr); $ses++) {
                                        if ($ses >= 5) {
                                            break;
                                        }
                                        $d = $calender_arr[$ses];
                                        $employee_nme = reformate_employee_name($d->employee_name);
                                        $child_nme = reformate_employee_name($d->child_name);
                                        $cl_title = strtoupper($employee_nme) . '-' . strtoupper($child_nme);
                                        $color_name = $d->color_id;
                                        $starttime = date('H:i', strtotime($d->start_time));
                                        $html = get_session_pop_over($d);
                                        $html_title = "<span class='title_hover'>$d->employee_name</span>";
                                        if ($starttime == '00:00' && date('H:i', strtotime($d->end_time)) == '00:00' && $d->completion_status == 1) {
                                            
                                        } else {
                                            ?>    <div  ondblclick="window.location = '<?= base_url() . 'Home/view_single_session/' . $d->session_id ?>'" style="background: <?= $color_name ?>" data-toggle="popover" title="<?= $html_title ?>" data-content="<?= $html ?>" class="ent_grid mancr1 show-popover-div"><?= $starttime . '-' . $cl_title ?></div><?php
                                        }
                                    }
                                    if (count($calender_arr) <= 5) {
                                        $print = count($calender_arr);
                                        for ($ss = 0; $ss < count($event_arr); $ss++) {
                                            $d = $event_arr[$ss];
                                            $color_name = $d->color_id;
                                            $starttime = date('H:i', strtotime($d->start_time));
                                            $endtime = date('H:i', strtotime($d->end_time));

                                            if ($print > 4) {
                                                break;
                                            }
                                            $print++;
                                            $html = get_event_pop_over($d);
                                            $html_title = "<span class='title_hover'>$d->subject</span>";
                                            ?> 
                                            <div db_id="<?= $d->id ?>" metting_id="<?= $metting_id ?>" created_id="<?= $d->creted_id ?>" date="<?= $currentDate ?>" event_id_grp="<?= $d->event_id_grp ?>" start_time="<?= $starttime ?>" end_time="<?= $endtime ?>"  style="background: <?= $color_name ?>" data-toggle="popover" title="<?= $html_title ?>" data-content="<?= $html ?>" class="ent_grid show-popover-div update_event"><?= $starttime . '-' . $endtime ?></div><?php
                                        }
                                    }
                                    if (count($calender_arr) > 5 || count($event_arr) > 5) {
                                        $model_id = date('Y_m_d', strtotime($currentDate));
                                        ?>
                                        <div class="ent_grid more"><a href="#large_<?= $model_id ?>" data-toggle="modal" >More</a> </div>
                                        <?php
                                        view_more_buttion_html_details($model_id, $currentDate, $calender_arr, $event_arr);
                                    }
                                }
                            }
                            ?>
                        </li>
                        <?php
                        $dayCount++;
                    } else {
                        ?><li><span>&nbsp;</span></li> <?php
                    }
                }
                ?></ul>
        </div>
    </div><?php
}

function reformate_employee_name($employee_name = '') {
    $sub_name = '';
    if ($employee_name != '') {
        $arr = explode(chr(1), str_replace(array(' ', ',', '-', '.'), chr(1), $employee_name));
        for ($i = 0; $i < count($arr); $i++) {
            $sub_name = $sub_name . substr($arr[$i], 0, 1);
        }
    }
    return $sub_name;
}

function staff_id_color($staff_id) {
    // staff id = color array id
    $staff_arr_color = ['#3598dc', '#32c5d2', '#318db2', '#9A12B3', '#03a9f4', '#749600', '#1abc9c', '#2ecc71',
        '#3a6f81', '#d5c295', '#8E44AD', '#C8D046', '#F4D03F', '#F7CA18', '#F3C200', '#F3C200',
        '#F2784B', '#E87E04', '#D91E18', '#EF4836', '#26C281', '#4B77BE', '#1BA39C', '#555555',
        '#67809F', '#22313F', '#3598DC', '#2C3E50', '#2F353B', '#1BA39C', '#00B500', '#805B56'
    ];
    $color_name = '';
    for ($i = 0; $i < count($staff_arr_color); $i++) {
        if ($i == $staff_id) {
            $color_name = $staff_arr_color[$i];
            break;
        }
    }
    return $color_name;
}

function get_previous_created_event_details($array) {
    $db = & get_instance();
    $session_arr = get_session_array_value();
    $created_id = $array['created_id'];
    $date = $array['date'];
    $start_time = $array['start_time'];
    $end_time = $array['end_time'];
    $event_id_grp = $array['event_id_grp'];
    $event_qry = "SELECT E.*,EMP.employee_name FROM `event_schedule_details` E LEFT JOIN employee_details EMP ON EMP.id=E.staff_id WHERE E.event_id_grp='$event_id_grp'  AND E.staff_id!='" . $session_arr[0]->id . "'";
    $event_qry1 = "SELECT E.*,EMP.employee_name FROM `event_schedule_details` E LEFT JOIN employee_details EMP ON EMP.id=E.staff_id WHERE E.event_id_grp='$event_id_grp'  AND E.staff_id='" . $session_arr[0]->id . "'";
    $event_arr = $db->Database->select_qry_array($event_qry);
    $total_emp = $db->Database->select_qry_array("SELECT COUNT(id) AS total_emp FROM employee_details WHERE id!='" . $session_arr[0]->id . "' AND archive=0");
    $add_me = $db->Database->select_qry_array($event_qry1);
    $ar = [
        'event' => $event_arr,
        'total_emp' => $total_emp,
        'add_me' => count($add_me) > 0 ? 1 : 0
    ];
    echo json_encode($ar);
}

function get_event_pop_over($d) {
    $session_date = date('d/m/Y', strtotime($d->event_date)) . '&nbsp;&nbsp;&nbsp;&nbsp;' . date('H:i A', strtotime($d->start_time));
    $end_date = date('d/m/Y', strtotime($d->event_date)) . '&nbsp;&nbsp;&nbsp;&nbsp;' . date('H:i A', strtotime($d->end_time));
    $html = "<table class='popditltab'>
            <tr>
      <td>Therapist </td>
      <td>:</td>
      <td>$d->employee_name</td>
    </tr>
    <tr>
      <td>Location</td>
      <td>:</td>
      <td>$d->location</td>
    </tr>

    <tr>
      <td>Note </td>
      <td>: </td>
      <td>$d->notes</td>
    </tr>
    <tr>
      <td>Start</td>
      <td>:</td>
      <td> $session_date</td>
  </tr>
    <tr>
      <td>End </td>
      <td>:</td>
      <td>$end_date</td>
    </tr>
    <tr>
      <td>Created By</td>
      <td>:</td>
      <td>$d->creted_name</td>
    </tr>
  </table>";
    return $html;
}

function get_activities_pop_over($d) {
    $session_date = date('d/m/Y', strtotime($d->activities_date)) . '&nbsp;&nbsp;&nbsp;&nbsp;' . date('H:i A', strtotime($d->start_time));
    $end_date = date('d/m/Y', strtotime($d->activities_date)) . '&nbsp;&nbsp;&nbsp;&nbsp;' . date('H:i A', strtotime($d->end_time));
    $html = "<table class='popditltab'>
            <tr>
      <td>Subject </td>
      <td>:</td>
      <td>$d->subject</td>
    </tr>
    <tr>
      <td>Activities Date</td>
      <td>:</td>
      <td>$d->activities_date</td>
    </tr>

    <tr>
      <td>Note </td>
      <td>: </td>
      <td>$d->notes</td>
    </tr>
    <tr>
      <td>Start</td>
      <td>:</td>
      <td> $session_date</td>
  </tr>
    <tr>
      <td>End </td>
      <td>:</td>
      <td>$end_date</td>
    </tr>
    <tr>
      <td>Created By</td>
      <td>:</td>
      <td>$d->creted_name</td>
    </tr>
  </table>";
    return $html;
}

function get_session_pop_over($d) {
    $session_date = date('d/m/Y', strtotime($d->session_date)) . '&nbsp;&nbsp;&nbsp;&nbsp;' . date('H:i A', strtotime($d->start_time));
    $end_date = date('d/m/Y', strtotime($d->session_date)) . '&nbsp;&nbsp;&nbsp;&nbsp;' . date('H:i A', strtotime($d->end_time));
    $quotation_type = '';
    if ($d->accept_status == 'Accept') {
        $quotation_type = 'Confirmed';
    } else {
        $quotation_type = 'Not Confirmed';
    }
    $html = "<table class='popditltab'>
        <tr>
          <td>Student</td>
          <td>:</td>
          <td>$d->child_name</td>
        </tr>
        <tr>
          <td>Therapist </td>
          <td>:</td>
          <td>$d->employee_name</td>
        </tr>
        <tr>
          <td>Discipline </td>
          <td>: </td>
          <td>$d->description</td>
        </tr>
        <tr>
          <td>Start</td>
          <td>:</td>
          <td> $session_date</td>
      </tr>
        <tr>
          <td>End </td>
          <td>:</td>
          <td>$end_date</td>
        </tr>
        <tr>
          <td>Type</td>
          <td>:</td>
          <td>$quotation_type</td>
        </tr>
      </table>";
    return $html;
}

function get_event_every_day_html($metting_id = '', $currentDate = '', $ses_emp_id = '') {
    ?>  <div class="modal fade emypopupmain" id="metting_id_<?= $metting_id ?>" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><center><b metting_id="<?= $metting_id ?>" class="select_close_area">Create Events <?= date('d/m/Y', strtotime($currentDate)); ?></b></center></h4>
                </div>
                <div class="modal-body">  
                    <form role="form">
                        <div class=" ">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input id="event_subject_<?= $metting_id ?>" class="form-control spinner" type="text" placeholder="Subject"> 
                                </div>
                            </div>

                            <div class="row">
                                <div class="  col-md-6">
                                    <div class="form-group">
                                        <label>Location </label>
                                        <select id="event_location_<?= $metting_id ?>" class="form-control">
    <?= location_drop_down(); ?>
                                        </select>

                                    </div>
                                </div>

                                <div class="  col-md-6">
                                    <div class="form-group">
                                        <label>Add Other Therapy    </label><span class="pull-right"><input checked="" id="monthly_event_add_me_<?= $metting_id ?>" type="checkbox"><b>Add Me</b></span>
                                        <input type="text" meeting_id="<?= $metting_id ?>"  class="form-control event_staff_search"> 
                                        <ul id="event_staff_detals_<?= $metting_id ?>" class="event_listcls">

                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row" >
                                <div class="col-md-12 event_wraplistemply" id="event_selected_staff_<?= $metting_id ?>">

                                </div>
                            </div>

                            <div class="row">
                                <div class="  col-md-6">
                                    <div class="form-group">
                                        <label>Start Date </label>
                                        <input value="<?= $currentDate ?>" id="event_startdate_<?= $metting_id ?>" type="text" class="datepicker form-control">
                                    </div>
                                </div>
                                <div class="  col-md-6">
                                    <div class="form-group">
                                        <label>End Date </label><span class="pull-right"><input  event_id="<?= $metting_id ?>" class="event_add_all_day" type="checkbox"><b>Select Days</b></span>
                                        <input value="<?= $currentDate ?>" id="event_endate_<?= $metting_id ?>" type="text" class="datepicker form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="row" style="display: none;" id="select_all_day_div_<?= $metting_id ?>">
                                <div class="col-md-12">
                                    <label class="mt-checkbox">
                                        <input checked="" value="Sun" id="eventselect_days_name_sun_<?= $metting_id ?>" class="eventselect_days_name_<?= $metting_id ?>" type="checkbox"> Sun
                                        <span></span>
                                    </label>
                                    <label class="mt-checkbox">
                                        <input checked="" value="Mon" id="eventselect_days_name_mon_<?= $metting_id ?>" class="eventselect_days_name_<?= $metting_id ?>" type="checkbox"> Mon
                                        <span></span>
                                    </label>
                                    <label  class="mt-checkbox">
                                        <input checked="" value="Tue" id="eventselect_days_name_tue_<?= $metting_id ?>" class="eventselect_days_name_<?= $metting_id ?>" type="checkbox"> Tue
                                        <span></span>
                                    </label>
                                    <label class="mt-checkbox">
                                        <input checked="" value="Wed" id="eventselect_days_name_wed_<?= $metting_id ?>" class="eventselect_days_name_<?= $metting_id ?>" type="checkbox"> Wed
                                        <span></span>
                                    </label>
                                    <label class="mt-checkbox">
                                        <input checked="" value="Thu" id="eventselect_days_name_thu_<?= $metting_id ?>" class="eventselect_days_name_<?= $metting_id ?>" type="checkbox"> Thu
                                        <span></span>
                                    </label>
                                    <label class="mt-checkbox">
                                        <input checked="" value="Fri" id="eventselect_days_name_fri_<?= $metting_id ?>" class="eventselect_days_name_<?= $metting_id ?>" type="checkbox"> Fri
                                        <span></span>
                                    </label>
                                    <label class="mt-checkbox">
                                        <input checked="" value="Sat" id="eventselect_days_name_sat_<?= $metting_id ?>" class="eventselect_days_name_<?= $metting_id ?>" type="checkbox"> Sat
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <br>



                            <div class="row">
                                <div class="  col-md-6">
                                    <div class="form-group">
                                        <label>Start Time </label>
                                        <div class="input-group date form_datetime form_datetime bs-datetime">
                                            <select style="width: 270px;" class="form-control" id="start_time_<?= $metting_id ?>">
    <?= print_time() ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="  col-md-6">
                                    <div class="form-group">
                                        <label>End Time </label>
                                        <div class="input-group date form_datetime form_datetime bs-datetime">
                                            <select style="width: 270px;" class="form-control" id="end_time_<?= $metting_id ?>">
    <?= print_time() ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <label>Notes</label>
                                <textarea id="notes_<?= $metting_id ?>" class="form-control" rows="2"></textarea>
                            </div>
                            <div class="row " style="text-align: center;">
                                <b><span style="color: red;" class="month_message_box"></span></b>
                            </div>



                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button event_delet_id="" style="display: none;" type="button" class="btn red delete_events_monthly_single" id="delete_single_monthly_<?= $metting_id ?>">Delete Current One</button>
                    <button event_id_grp="" style="display: none;" type="button" class="btn red delete_events_monthly" id="delete_events_monthly_<?= $metting_id ?>">Delete All</button>
                    <button event_grp_id="" id="save_events_<?= $metting_id ?>" events_id="<?= $metting_id ?>" events_date="<?= $currentDate ?>"  created_by="<?= $ses_emp_id ?>"  type="button" class="btn green save_events">Save Events</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <?php
}

/*   view more buttion table appreaing here using function  */

function view_more_buttion_html_details($model_id, $currentDate, $calender_arr, $event_arr) {
    ?>
    <div class="calendar_evt_popup modal fade bs-modal-lg" id="large_<?= $model_id ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><center><b><?= date('d/m/Y', strtotime($currentDate)); ?> </b></center></h4>
                </div>
                <div class="modal-body"> 
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
    <?php if (count($calender_arr) > 0) { ?>
                                <tr>
                                    <th   scope="col">#</th>
                                    <th   scope="col">Student</th>
                                    <th   scope="col">Therapist</th>
                                    <th   scope="col">Speech</th>
                                    <th   scope="col">Start</th>
                                    <th   scope="col">End</th>
                                    <th   scope="col" colspan="2">Type</th>
                                </tr>

                                <?php
                                for ($ses = 0; $ses < count($calender_arr); $ses++) {
                                    $d = $calender_arr[$ses];
                                    $color_name = $d->color_id;
                                    $session_date = date('d/m/Y', strtotime($d->session_date)) . '&nbsp;&nbsp;&nbsp;&nbsp;' . date('H:i A', strtotime($d->start_time));
                                    $end_date = date('d/m/Y', strtotime($d->session_date)) . '&nbsp;&nbsp;&nbsp;&nbsp;' . date('H:i A', strtotime($d->end_time));
                                    $quotation_type = '';
                                    if ($d->accept_status == 'Accept') {
                                        $quotation_type = 'Confirmed';
                                    } else {
                                        $quotation_type = 'Not Confirmed';
                                    }
                                    ?>
                                    <tr>
                                        <td  ><?= $ses + 1; ?></td>
                                        <td  ><a title="Open Therapy Details" ondblclick="window.location = '<?= base_url() . 'Home/view_single_session/' . $d->session_id ?>'"><?= $d->child_name ?></a></td>
                                        <td  ><span class="mancr1" style="background: <?= $color_name ?>"><?= $d->employee_name ?></span></td>
                                        <td  ><?= $d->description ?></td>
                                        <td  ><?= $session_date ?></td>
                                        <td  > <?= $end_date ?></td>
                                        <td  colspan="2"><?= $quotation_type ?></td>

                                    </tr>
                                    <?php
                                }
                            }if (count($event_arr) > 0) {
                                ?>
                                <tr>
                                    <th   scope="col">#</th>
                                    <th   scope="col">Subject </th>
                                    <th   scope="col">Location </th>
                                    <th   scope="col">Therapist</th>
                                    <th   scope="col">Notes</th>
                                    <th   scope="col">Start Date</th>
                                    <th   scope="col">End Date</th>
                                    <th   scope="col">Created By </th>
                                </tr>
                                <?php
                                for ($kk = 0; $kk < count($event_arr); $kk++) {
                                    $d = $event_arr[$kk];
                                    $event_start_date = date('d/m/Y', strtotime($d->event_date)) . '&nbsp;&nbsp;&nbsp;&nbsp;' . date('H:i A', strtotime($d->start_time));
                                    $event_end_date = date('d/m/Y', strtotime($d->event_date)) . '&nbsp;&nbsp;&nbsp;&nbsp;' . date('H:i A', strtotime($d->end_time));
                                    $starttime = date('H:i', strtotime($d->start_time));
                                    $endtime = date('H:i', strtotime($d->end_time));
                                    ?>
                                    <tr>
                                        <td   scope="col"><?= $kk + 1; ?></td>
                                        <td   scope="col"><a created_id="<?= $d->creted_id ?>" date="<?= $d->event_date ?>" start_time="<?= $starttime ?>" end_time="<?= $endtime ?>" class="update_event"><?= $d->subject ?> </a></td>
                                        <td   scope="col"><?= $d->location ?> </td>
                                        <td   scope="col"><?= $d->employee_name ?></td>
                                        <td   scope="col"><?= $d->notes ?></td>
                                        <td   scope="col"><?= $event_start_date ?></td>
                                        <td   scope="col"><?= $event_end_date ?></td>
                                        <td   scope="col"><?= $d->creted_name ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
    <?php } ?>
                        </table>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark  green" data-dismiss="modal">Close</button>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div><?php
}

/*   view week calender   */

function get_week_calender($array) {
    $db = & get_instance();
    $session_array = get_session_array_value();
    $emp_id = $array['emp_id'];
    $calendey_type = $array['calendey_type'];
    if ($emp_id == '') {
        $emp_id = $session_array[0]->id;
    }
    ?>  <div class="col-md-12 col-sm-12">
        <div id="" class="has-toolbar mobile fc fc-ltr fc-unthemed">
            <div class="fc-toolbar">
                <div class="fc-left">
                    <?php
                    $current_date = date('d-m-Y');
                    if ($calendey_type == 'today') {
                        $export_tbl_id = 'today_export';
                        $day_loopend = 2;
                        $last_sunday = $current_date;
                        $end_date = $current_date;
                        $free_hou = get_worlking_houre_details($last_sunday, $end_date, $emp_id);
                        ?> <h2 class="headforcal">Today - <?= date('M d', strtotime($current_date)); ?> </h2>
                        <?php
                    } else if ($calendey_type == 'day') {
                        $export_tbl_id = 'day_export';
                        $day_loopend = 2;
                        if ($array['day_date'] == '' && $array['pervnext_day'] == '') {
                            $last_sunday = $current_date;
                            $end_date = $current_date;
                        } else if ($array['pervnext_day'] != '') {
                            $last_sunday = date('Y-m-d', strtotime($array['pervnext_day']));
                            $end_date = date('Y-m-d', strtotime($array['pervnext_day']));
                        } else {
                            $last_sunday = date('Y-m-d', strtotime($array['day_date']));
                            $end_date = date('Y-m-d', strtotime($array['day_date']));
                        }

                        $prev1_date = date('Y-m-d', strtotime('-1 day', strtotime($last_sunday)));
                        $next1_date = date('Y-m-d', strtotime('+1 day', strtotime($last_sunday)));
                        ?>
                        <div class="areow_wrap">
                            <span style="cursor: pointer;" start_date="<?= $prev1_date ?>"   class="fc-icon fc-icon-left-single-arrow pervnext_day"></span>
                            <span style="cursor: pointer;" start_date="<?= $next1_date ?>"  class="fc-icon fc-icon-right-single-arrow pervnext_day"></span>
                        </div>
                        <?php $free_hou = get_worlking_houre_details($last_sunday, $end_date, $emp_id); ?>
                        <h2 class="headforcal" >Day - <?= date('M d', strtotime($last_sunday)); ?> </h2>
                        <?php
                    } else {
                        $day_loopend = 8;
                        $export_tbl_id = 'week_export';
                        if ($array['find_date'] != '') {
                            $last_sunday = date('d-m-Y', strtotime($array['find_date']));
                        } else {
                            $last_sunday = date('d-m-Y', strtotime('last Sunday', strtotime($current_date)));
                        }
                        if (date('D') == 'Sun') {
                            if ($array['find_date'] != '') {
                                $last_sunday = date('d-m-Y', strtotime($array['find_date']));
                            } else {
                                $last_sunday = $current_date;
                            }
                        }
                        $end_date = date('Y-m-d', strtotime('+6 day', strtotime($last_sunday)));
                        $prev7_date = date('Y-m-d', strtotime('-7 day', strtotime($last_sunday)));
                        $last_d = date('d,Y', strtotime($end_date));
                        $end_date_nxtbtn = date('Y-m-d', strtotime('+7 day', strtotime($last_sunday)));
                        ?> 

                        <div class="areow_wrap">
                            <span start_date="<?= $prev7_date ?>"   class="fc-icon fc-icon-left-single-arrow pervnext_week"></span>
                            <span start_date="<?= $end_date_nxtbtn ?>"  class="fc-icon fc-icon-right-single-arrow pervnext_week"></span>
                        </div>
                        <?php $free_hou = get_worlking_houre_details($last_sunday, $end_date, $emp_id); ?>
                        <h2 class="headforcal">  <?= date('M d', strtotime($last_sunday)); ?>-<?= $last_d ?>   </h2>
                        <?php
                    }
                    ?>
                </div>

                <div class="fc-center"></div>
                <div class="working_hourse_cls">
                    Free Hour : <?= $free_hou ?>
                </div>
                <div class="fc-clear"></div>
            </div>
            <div class="fc-view-container" style="">
                <div class="fc-view fc-agendaWeek-view fc-agenda-view">
                    <table>
                        <tbody class="fc-body">
                            <tr>
                                <td class="fc-widget-content">
                                    <div class="fc-time-grid-container fc-scroller" style="height: 679px;">
                                        <div class="fc-time-grid">
                                            <div class="fc-slats">
                                                <table id="<?= $export_tbl_id ?>">
                                                    <tbody>
                                                        <?php
                                                        echo '<tr style="background: #9a12b3;">';
                                                        $reformate = '';
                                                        for ($dd = 0; $dd < $day_loopend; $dd++) {
                                                            if ($dd != 0) {
                                                                $reformate = date('Y-m-d', strtotime('+' . ($dd - 1) . ' day', strtotime($last_sunday)));
                                                            }
                                                            ?>

                                                        <th class="fc-widget-header time_view_cls" style="background: #9a12b3 !important;width: <?= $dd == 0 ? '43px;' : ''; ?>"><?= $dd == 0 ? '' : $reformate ?></th>
                                                        <?php
                                                    }
                                                    echo '</tr>';
                                                    $start_time = date('H:i', strtotime('06:30'));
                                                    $tmp_arr = array();
                                                    for ($i = 1; $i < 12; $i++) {
                                                        $time_oneh = date('H:i', strtotime(" + $i hour", strtotime($start_time)));
                                                        for ($hh = 0; $hh < 4; $hh++) {
                                                            $time_15 = date('H:i', strtotime('+ ' . ($hh * 15) . ' minutes', strtotime($time_oneh)));
                                                            ?>
                                                            <tr>
                                                                <?php
                                                                for ($dd = 0; $dd < $day_loopend; $dd++) {
                                                                    $tmp_time = '';
                                                                    $color = '';
                                                                    $width = "";
                                                                    $popover = '';
                                                                    $add_class = '';
                                                                    $attr = '';
                                                                    if ($dd == 0) {
                                                                        $width = "width: 43px;background: #9a12b3 !important;";
                                                                        if ($hh == 0) {
                                                                            $tmp_time = $time_15;
                                                                        }
                                                                        $add_class = $add_class . 'time_view_cls ';
                                                                    } else {
                                                                        $date_en = date('Y-m-d', strtotime('+' . ($dd - 1) . ' day', strtotime($last_sunday)));
                                                                        $return = get_session_details_weekcalender($emp_id, $date_en, $time_15, $tmp_arr);
                                                                        $color = $return[0];
                                                                        $tmp_arr = $return[1];
                                                                        $tmp_time = $return[2];
                                                                        $popover = 'data-toggle="popover" title="' . $return[4] . '" data-content="' . $return[3] . '"';
                                                                        if ($color == '') {
                                                                            $return = get_event_details_weekcalender($emp_id, $date_en, $time_15, $tmp_arr);
                                                                            $color = $return[0];
                                                                            $tmp_arr = $return[1];
                                                                            $tmp_time = $return[2];
                                                                            $popover = 'data-toggle="popover" title="' . $return[4] . '" data-content="' . $return[3] . '"';
                                                                        }
                                                                        if ($color == '') {
                                                                            $return = get_activites_details_weekcalender($emp_id, $date_en, $time_15, $tmp_arr);
                                                                            $color = $return[0];
                                                                            $tmp_arr = $return[1];
                                                                            $tmp_time = $return[2];
                                                                            $popover = 'data-toggle="popover" title="' . $return[4] . '" data-content="' . $return[3] . '"';
                                                                            if ($color != '') {
                                                                                $attr = $attr . $return[5];
                                                                                $add_class = $add_class . ' update_activity ';
                                                                            }
                                                                        }
                                                                        if ($color != '') {
                                                                            $add_class = $add_class . 'busy_row ';
                                                                        }
                                                                    }
                                                                    if ($color == '' && $dd != 0) {
                                                                        if ($session_array[0]->id == $emp_id) {
                                                                            $add_class = $add_class . 'add_activity ';
                                                                            $attr = $attr . 'activity_date="' . $date_en . '" start_time="' . $time_15 . '"';
                                                                        }
                                                                    }
                                                                    $style = "background-color:$color !important;border-color:$color ;$width";
                                                                    ?>
                                                                    <td <?= $popover . ' ' . $attr ?>  class="fc-widget-header <?= $add_class ?>" style="<?= $style ?>"> <?= $tmp_time ?> </td>
                                                            <?php } ?>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    // echo '<pre>';
                                                    // print_r($tmp_arr);
                                                    // echo '</pre>';
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
    <?php
}

function get_worlking_houre_details($start_date, $end_date, $staff_id) {
    $db = & get_instance();
    $start_date = date('Y-m-d', strtotime($start_date));
    $end_date = date('Y-m-d', strtotime($end_date));
    $array_res = $qry = "SELECT * FROM quotation_session_details WHERE staff_id=$staff_id AND session_date BETWEEN '$start_date' AND '$end_date'";
    $result = $db->Database->select_qry_array($array_res);
    $date1 = date_create($start_date);
    $date2 = date_create($end_date);
    $diff = date_diff($date1, $date2);
    $total_num_days = $diff->format("%a") + 1;
    $total_min_per_day = 0;
    for ($res = 0; $res < count($result); $res++) {
        $d = $result[$res];
        $time1 = new DateTime($d->start_time);
        $time2 = new DateTime($d->end_time);
        $interval = $time1->diff($time2);
        $hou = $interval->format('%h');
        $min = $interval->format('%i');
        $tatal_min = ($hou * 60) + $min;
        $total_min_per_day = $total_min_per_day + $tatal_min;
    }
    $selected_h = ($total_num_days * 8) * 60;
    $free_time = $selected_h - $total_min_per_day;
    return get_minutes_to_houre_for_calender($free_time);
}

function get_activites_details_weekcalender($emp_id, $date_en, $time_15, $tmp_arr) {
    $db = & get_instance();
    $color = '';
    $tmp_time = '';
    $popover = '';
    $html_title = '';
    $attr = '';
    $qry = "SELECT A.*,E.employee_name AS creted_name,EE.employee_name AS staff_name,EE.color_id FROM `activities_details` A LEFT JOIN employee_details EE ON EE.id=A.staff_id LEFT JOIN employee_details E ON E.id=A.created_by WHERE A.`staff_id` = $emp_id AND A.`activities_date` = '$date_en' AND A.`start_time` <= '$time_15' ORDER BY A.start_time DESC LIMIT 1 ";
    $session_ar = $db->Database->select_qry_array($qry);
    if (count($session_ar) > 0) {
        $endtime = date('H:i', strtotime($session_ar[0]->end_time));
        $starttime = date('H:i', strtotime($session_ar[0]->start_time));
        if ($endtime > $time_15) {
            $p = $session_ar[0];
            /*      For Diffrent color Start  
              $create_event_id = $session_ar[0]->id . '101A';
              $flag = check_array_exit_type_and_return_color($tmp_arr, $create_event_id);
              if ($flag[0] == 'false') {
              $color = get_color_code(count($tmp_arr));
              $tp = [
              'id' => $create_event_id,
              'color' => $color,
              ];
              array_push($tmp_arr, $tp);
              } else {
              $color = $flag[1];
              }
              $color = staff_id_color($emp_id);
              For Diffrent color end */
            $color = $p->color_id;
            $attr = 'db_date="' . $p->activities_date . '" db_id="' . $p->id . '" dbstart_time="' . $starttime . '" dbend_time="' . $endtime . '" activities_id_grp="' . $p->activities_id_grp . '" created_by="' . $p->created_by . '" ';
            $html_title = "<span class='title_hover'>" . $session_ar[0]->subject . "</span>";
            $popover = get_activities_pop_over($session_ar[0]);
            if ($starttime == $time_15) {

                $tmp_time = '<div  style="background: #9A12B3;text-align:left" data-toggle="popover" title=""  class="ent_grid mancr1" >' . $starttime . ' - ' . $endtime . ' - ' . $p->subject . '</div>';
            }
        }
    }
    return [$color, $tmp_arr, $tmp_time, $popover, $html_title, $attr];
}

function get_event_details_weekcalender($emp_id, $date_en, $time_15, $tmp_arr) {
    $db = & get_instance();
    $color = '';
    $tmp_time = '';
    $popover = '';
    $html_title = '';
    $qry = "SELECT EV.*,E.employee_name,E.color_id,CN.employee_name AS creted_name FROM `event_schedule_details` EV LEFT JOIN employee_details E ON E.id=EV.staff_id LEFT JOIN employee_details CN ON CN.id=EV.created_by WHERE EV.`staff_id` = $emp_id AND EV.`event_date` = '$date_en' AND EV.`start_time` <= '$time_15' ORDER BY EV.start_time DESC LIMIT 1 ";
    $session_ar = $db->Database->select_qry_array($qry);
    if (count($session_ar) > 0) {
        $endtime = date('H:i', strtotime($session_ar[0]->end_time));
        $starttime = date('H:i', strtotime($session_ar[0]->start_time));
        if ($endtime > $time_15) {
            /*      For Diffrent color Start  
              $create_event_id = $session_ar[0]->id . '909E';
              $flag = check_array_exit_type_and_return_color($tmp_arr, $create_event_id);
              if ($flag[0] == 'false') {
              $color = get_color_code(count($tmp_arr));
              $tp = [
              'id' => $create_event_id,
              'color' => $color,
              ];
              array_push($tmp_arr, $tp);
              } else {
              $color = $flag[1];
              }
              For Diffrent color End
              $color = staff_id_color($emp_id);
             */
            $color = $session_ar[0]->color_id;
            $html_title = "<span class='title_hover'>" . $session_ar[0]->subject . "</span>";
            $popover = get_event_pop_over($session_ar[0]);
            if ($starttime == $time_15) {
                $tmp_time = '<div  style="background: #9A12B3;text-align:left" data-toggle="popover" title=""  class="ent_grid mancr1" >' . $starttime . ' - ' . $endtime . ' - ' . $session_ar[0]->subject . '</div>';
            }
        }
    }
    return [$color, $tmp_arr, $tmp_time, $popover, $html_title];
}

function get_session_details_weekcalender($emp_id, $date_en, $time_15, $tmp_arr) {
    $db = & get_instance();
    $color = '';
    $tmp_time = '';
    $popover = '';
    $html_title = '';
    $qry = "SELECT QS.*,C.child_name,Q.student_id,E.employee_name,E.color_id,D.description FROM `quotation_session_details` QS LEFT JOIN disipline_details D ON D.id=QS.discipline_type_id LEFT JOIN employee_details E ON E.id=QS.staff_id LEFT JOIN quotation_details Q ON Q.quotation_id=QS.quotation_id LEFT JOIN child_details C ON C.id=Q.student_id WHERE QS.`staff_id` = $emp_id AND QS.`session_date` = '$date_en' AND QS.`start_time` <= '$time_15' ORDER BY QS.start_time DESC LIMIT 1 ";
    $session_ar = $db->Database->select_qry_array($qry);
    if (count($session_ar) > 0) {
        $p = $session_ar[0];
        $endtime = date('H:i', strtotime($session_ar[0]->end_time));
        $starttime = date('H:i', strtotime($session_ar[0]->start_time));
        if ($endtime > $time_15) {
            /*      For Diffrent color Start 
              $flag = check_array_exit_type_and_return_color($tmp_arr, $session_ar[0]->id);
              if ($flag[0] == 'false') {
              $color = get_color_code(count($tmp_arr));
              $tp = [
              'id' => $session_ar[0]->id,
              'color' => $color,
              ];
              array_push($tmp_arr, $tp);
              } else {
              $color = $flag[1];
              }
              For Diffrent color End
              $color = staff_id_color($emp_id);
             */
            $color = $p->color_id;
            $popover = get_session_pop_over($session_ar[0]);
            $html_title = "<span class='title_hover'>" . $session_ar[0]->employee_name . "</span>";
            if ($starttime == $time_15) {
                $employee_nme = reformate_employee_name($p->employee_name);
                $child_nme = reformate_employee_name($p->child_name);
                $cl_title = strtoupper($employee_nme) . '-' . strtoupper($child_nme);
                $tmp_time = '<div  style="background: #9A12B3" data-toggle="popover" title=""  class="ent_grid mancr1" >' . $starttime . '-' . $cl_title . '</div>';
            }
        }
    }
    return [$color, $tmp_arr, $tmp_time, $popover, $html_title];
}

function get_color_code($array_index) {
    $color = ['#2ecc71', '#3498db', '#9b59b6', '#f93257', '#64DDBB', '#238997', '#a1bb34', '#e04241', '#f49f22', '#36b5e0', '#e8b7d4', '#85989e', '#c77f8b', '#f99c57', '#00a65c', '#8e7861', '#5c7a22', '#407c74', '#f06352', '#0061ae', '#cc5b9d', '#415c79', '#7f9dc7', '#9457f9', '#a63800', '#468077', '#4a415b', '#525b41', '#f74b1a', '#45ac00', '#b9a499', '#6fabff', '#3e3880', '#679267', '#00245f', '#84c7b6', '#1abc9c', '#f5a023', '#8b0a40', '#e55353'];
    return $color[$array_index];
}

function check_array_exit_type_and_return_color($array, $id) {
    $flag = 'false';
    $color = '';
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i]['id'] == $id) {
            $flag = 'true';
            $color = $array[$i]['color'];
        }
    }
    return [$flag, $color];
}

function export_appointment($array) {
    $db = & get_instance();
    $session_array = get_session_array_value();
    $emp_arr = $array['emp_arr'];
    $emp_arr = $emp_arr == '' ? $session_array[0]->id : $emp_arr;
    $export_type = $array['export_type'];
    $selected = "E.employee_name,CN.employee_name AS created_name";
    $join = "LEFT JOIN employee_details E ON E.id=EV.staff_id LEFT JOIN employee_details CN ON CN.id=EV.created_by";
    if ($export_type > 0) {
        if ($emp_arr[0] == 'All') {
            $qry = "SELECT EV.*,$selected FROM `event_schedule_details` EV $join WHERE MONTH(EV.event_date) = $export_type";
            $qry_ses = "SELECT QS.*,Q.student_id,C.child_name,E.employee_name,D.disipline_name,EP.employee_name AS created_name FROM quotation_session_details QS LEFT JOIN employee_details EP ON EP.id=QS.updated_by LEFT JOIN disipline_details D ON D.id=QS.discipline_type_id LEFT JOIN employee_details E ON E.id=QS.staff_id LEFT JOIN quotation_details Q ON Q.quotation_id=QS.quotation_id LEFT JOIN child_details C ON C.id=Q.student_id WHERE MONTH(QS.session_date) = $export_type";
        } else {
            if (is_array($emp_arr)) {
                $emp_arr = implode(',', $emp_arr);
            }
            $qry = "SELECT EV.*,$selected FROM `event_schedule_details` EV $join WHERE MONTH(EV.event_date) = $export_type AND EV.staff_id IN ($emp_arr)";
            $qry_ses = "SELECT QS.*,Q.student_id,C.child_name,E.employee_name,D.disipline_name,EP.employee_name AS created_name FROM quotation_session_details QS LEFT JOIN employee_details EP ON EP.id=QS.updated_by LEFT JOIN disipline_details D ON D.id=QS.discipline_type_id LEFT JOIN employee_details E ON E.id=QS.staff_id LEFT JOIN quotation_details Q ON Q.quotation_id=QS.quotation_id LEFT JOIN child_details C ON C.id=Q.student_id WHERE MONTH(QS.session_date) = $export_type AND QS.staff_id IN ($emp_arr)";
        }
    }
    $event_arr = $db->Database->select_qry_array($qry);
    $session_arr = $db->Database->select_qry_array($qry_ses);
    ?><table class='table_searchshipment' id='table_searchshipment' cellpadding='0' cellspacing='0' border='0'>
        <tr>
            <th>Sl</th>
            <th>Subject</th>
            <th>Loaction</th>
            <th>Staff Name</th>
            <th>Appointment Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Notes</th>
            <th>Created By</th>
        </tr>
        <?php
        for ($i = 0; $i < count($event_arr); $i++) {
            $d = $event_arr[$i];
            ?>
            <tr>
                <td> <?= $i + 1 ?></td>
                <td> <?= $d->subject ?> </td>
                <td> <?= $d->location ?> </td>
                <td> <?= $d->employee_name ?> </td>
                <td> <?= date('d/m/Y', strtotime($d->event_date)) ?></td>';
                <td> <?= $d->start_time ?></td>
                <td> <?= $d->end_time ?> </td>
                <td> <?= $d->notes ?> </td>
                <td> <?= $d->created_name ?></td>
            </tr>';
        <?php }
        ?>
        <tr>
            <th>Sl</th>
            <th>Student Name</th>
            <th>Therapist</th>
            <th>Discipline</th>
            <th>Session Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Type</th>
            <th>Created By</th>
        </tr>
        <?php
        for ($i = 0; $i < count($session_arr); $i++) {
            $d = $session_arr[$i];
            ?>
            <tr>
                <td> <?= $i + 1 ?></td>
                <td> <?= $d->child_name ?> </td>
                <td> <?= $d->employee_name ?> </td>
                <td> <?= $d->disipline_name ?> </td>
                <td> <?= date('d/m/Y', strtotime($d->session_date)) ?></td>';
                <td> <?= $d->start_time ?></td>
                <td> <?= $d->end_time ?> </td>
                <td> <?= $d->accept_status == 'Accept' ? 'Accepted' : 'Not Accepted' ?> </td>
                <td> <?= $d->created_name ?> </td>
            </tr>
            <?php
        }
        ?></table> <?php
    exit;
}

function save_activites($array) {
    $session_array = get_session_array_value();
    $db = & get_instance();
    if (isset($array['json'])) {
        $json = json_decode($array['json'], true);
        if ($json != '') {
            $dStart = new DateTime($json['start_date']);
            $dEnd = new DateTime($json['end_date']);
            $diff = date_diff($dStart, $dEnd);
            $diffdate = $diff->format("%R%a");
            $eventselect_days = explode(',', $json['days_name_activty']);

            $msg = '';
            $start_time = $json['start_time'];
            $end_time = $json['end_time'];
            $end_time = date('H:i', strtotime('- 1 minutes', strtotime($end_time)));

            if ($json['delete_id'] != '') {
                $del_q = "DELETE FROM `activities_details` WHERE `activities_id_grp` = '" . $json['delete_id'] . "'";
                $db->Database->delete($del_q);
            }

            if ($json['staff_arr'] != '') {
                if ($json['staff_arr'] == 'All') {
                    $qry = "SELECT * FROM employee_details WHERE archive=0 AND id!=" . $session_array[0]->id;
                } else {
                    $employee_id = $json['staff_arr'];
                    $qry = "SELECT * FROM employee_details WHERE id IN ($employee_id)";
                }
                $emp_arr = $db->Database->select_qry_array($qry);
                for ($i = 0; $i < count($emp_arr); $i++) {
                    for ($dd = 0; $dd <= ($diffdate); $dd++) {
                        $date = date('Y-m-d', strtotime("+ $dd day", strtotime($json['start_date'])));
                        $days_name = date('D', strtotime($date));
                        if (in_array($days_name, $eventselect_days)) {
                            $emp_id = $emp_arr[$i]->id;
                            $msg = check_availity_employee_status($emp_id, $date, $start_time, $end_time);
                            if ($msg != '') {
                                echo $msg;
                                exit;
                            }
                        }
                    }
                }
            }
            if ($json['activity_add_me'] != 'No') {
                for ($dd = 0; $dd <= ($diffdate); $dd++) {
                    $date = date('Y-m-d', strtotime("+ $dd day", strtotime($json['start_date'])));
                    $days_name = date('D', strtotime($date));
                    if (in_array($days_name, $eventselect_days)) {
                        $msg = check_availity_employee_status($session_array[0]->id, $date, $start_time, $end_time);
                        if ($msg != '') {
                            echo $msg;
                            exit;
                        }
                    }
                }
            }
            /*   for   upside validate and downd side inser  */
            if ($json['staff_arr'] != '') {
                if ($json['staff_arr'] == 'All') {
                    $qry = "SELECT * FROM employee_details WHERE id!=" . $session_array[0]->id;
                } else {
                    $employee_id = $json['staff_arr'];
                    $qry = "SELECT * FROM employee_details WHERE id IN ($employee_id)";
                }
                $emp_arr = $db->Database->select_qry_array($qry);
                for ($dd = 0; $dd <= ($diffdate); $dd++) {
                    $date = date('Y-m-d', strtotime("+ $dd day", strtotime($json['start_date'])));
                    $days_name = date('D', strtotime($date));
                    if (in_array($days_name, $eventselect_days)) {
                        for ($i = 0; $i < count($emp_arr); $i++) {
                            $emp_id = $emp_arr[$i]->id;
                            $result = insert_activites_details($emp_id, $json, $date);
                        }
                    }
                }
            }
            if ($json['activity_add_me'] != 'No') {
                for ($dd = 0; $dd <= ($diffdate); $dd++) {
                    $date = date('Y-m-d', strtotime("+ $dd day", strtotime($json['start_date'])));
                    $days_name = date('D', strtotime($date));
                    if (in_array($days_name, $eventselect_days)) {
                        $result = insert_activites_details($session_array[0]->id, $json, $date);
                    }
                }
            }
            if ($result) {
                $msg = '{"status":"succes"}';
                echo $msg;
            }
        }
    }
}

function check_availity_employee_status($emp_id, $date, $start_time, $end_time) {
    $start_time = date('H:i', strtotime('+ 1 minutes', strtotime($start_time)));
    $end_time = date('H:i', strtotime('- 1 minutes', strtotime($end_time)));
    $msg = '';
    $db = & get_instance();
    $qry = "SELECT QS.*,E.employee_name FROM `quotation_session_details` QS LEFT JOIN employee_details E ON E.id=QS.staff_id WHERE (TIME_TO_SEC('$start_time') BETWEEN TIME_TO_SEC(QS.start_time) AND TIME_TO_SEC(QS.end_time) OR TIME_TO_SEC('$end_time') BETWEEN TIME_TO_SEC(QS.start_time) AND TIME_TO_SEC(QS.end_time) OR start_time BETWEEN '$start_time' AND '$end_time') AND QS.staff_id='$emp_id' AND QS.session_date='$date'";
    $arr = $db->Database->select_qry_array($qry);
    if (count($arr) > 0) {
        $messages = $arr[0]->employee_name . ' is busy for session';
        $msg = '{"status":"busy","start_time":"' . $arr[0]->start_time . '","end_time":"' . $arr[0]->end_time . '","employee_name":"' . $arr[0]->employee_name . '","message":"' . $messages . '"}';
    } else {
        $qry = "SELECT EV.*,E.employee_name FROM `event_schedule_details` EV LEFT JOIN employee_details E ON E.id=EV.staff_id WHERE (TIME_TO_SEC('$start_time') BETWEEN TIME_TO_SEC(EV.start_time) AND TIME_TO_SEC(EV.end_time) OR TIME_TO_SEC('$end_time') BETWEEN TIME_TO_SEC(EV.start_time) AND TIME_TO_SEC(EV.end_time) OR EV.start_time BETWEEN '$start_time' AND '$end_time') AND EV.staff_id='$emp_id' AND EV.event_date='$date'";
        $arr = $db->Database->select_qry_array($qry);
        if (count($arr) > 0) {
            $messages = $arr[0]->employee_name . ' is busy (subject: ' . $arr[0]->subject . ') Date : ' . $arr[0]->event_date . ', ' . $arr[0]->start_time . ' - ' . $arr[0]->end_time;
            $msg = '{"status":"busy","start_time":"' . $arr[0]->start_time . '","end_time":"' . $arr[0]->end_time . '","employee_name":"' . $arr[0]->employee_name . '","message":"' . $messages . ' "}';
        } else {
            $qry = "SELECT AV.*,E.employee_name FROM `activities_details` AV LEFT JOIN employee_details E ON E.id=AV.staff_id WHERE (TIME_TO_SEC('$start_time') BETWEEN TIME_TO_SEC(AV.start_time) AND TIME_TO_SEC(AV.end_time) OR TIME_TO_SEC('$end_time') BETWEEN TIME_TO_SEC(AV.start_time) AND TIME_TO_SEC(AV.end_time) OR AV.start_time BETWEEN '$start_time' AND '$end_time') AND AV.staff_id='$emp_id' AND AV.activities_date='$date'";
            $arr = $db->Database->select_qry_array($qry);
            if (count($arr) > 0) {
                $messages = $arr[0]->employee_name . ' is already created the activities for (subject: ' . $arr[0]->subject . ') Date : ' . $arr[0]->activities_date . ', ' . $arr[0]->start_time . ' - ' . $arr[0]->end_time;
                $msg = '{"status":"busy","start_time":"' . $arr[0]->start_time . '","end_time":"' . $arr[0]->end_time . '","employee_name":"' . $arr[0]->employee_name . '","message":"' . $messages . '"}';
            }
        }
    }
    return $msg;
}

function insert_activites_details($emp_id, $json, $date) {
    $db = & get_instance();
    $session_array = get_session_array_value();
    $inser_ar = [
        'subject' => $json['subject'],
        'activities_date' => date('Y-m-d', strtotime($date)),
        'start_time' => $json['start_time'],
        'end_time' => $json['end_time'],
        'notes' => $json['notes'],
        'staff_id' => $emp_id,
        'activities_id_grp' => $json['activty_id_grp'],
        'location' => $json['activity_location'],
        'created_by' => $session_array[0]->id,
    ];
    //print_r($inser_ar);
    $result = $db->Database->insert('activities_details', $inser_ar);
    return $result;
}

function get_save_activity_details($array) {
    $db = & get_instance();
    $qry = "SELECT A.*,E.employee_name FROM `activities_details` A LEFT JOIN employee_details E ON E.id=A.staff_id WHERE A.`activities_id_grp` = '" . $array['activities_id_grp'] . "'";
    $arr = $db->Database->select_qry_array($qry);
    $asos = ['selected_emp' => $arr];
    echo json_encode($asos);
}

function delete_activity_details($json) {
    $db = & get_instance();
    $del_q = "DELETE FROM `activities_details` WHERE `activities_id_grp` = '" . $json['activities_id_grp'] . "'";
    $db->Database->delete($del_q);
}

function delete_event_details_by_db_id($json) {
    $db = & get_instance();
    $del_q = "DELETE FROM `event_schedule_details` WHERE `id` = '" . $json['db_id'] . "'";
    $db->Database->delete($del_q);
}

function delete_activites_details_by_db_id($json) {
    $db = & get_instance();
    $del_q = "DELETE FROM `activities_details` WHERE `id` = '" . $json['db_id'] . "'";
    $db->Database->delete($del_q);
}

function validate_month_calender($staff_arr, $json) {
    $db = & get_instance();
    $msg = '';
    $date = $json['event_date'];
    $start_time = $json['start_time'];
    $end_time = $json['end_time'];
    if ($staff_arr == 'All') {
        $qry = "SELECT * FROM `employee_details`";
        $employee_ar = $db->Database->select_qry_array($qry);
        for ($i = 0; $i < count($employee_ar); $i++) {
            $emp_id = $employee_ar[$i]->id;
            $msg = check_availity_employee_status($emp_id, $date, $start_time, $end_time);
            if ($msg != '') {
                echo $msg;
                exit;
            }
        }
    } else {
        $staff_ar = explode(',', $staff_arr);
        for ($i = 0; $i < count($staff_ar); $i++) {
            $emp_id = $staff_ar[$i];
            $msg = check_availity_employee_status($emp_id, $date, $start_time, $end_time);
            if ($msg != '') {
                echo $msg;
                exit;
            }
        }
    }
}

function location_drop_down($location_id = '') {
    $location_ar = [['id' => 1, 'name' => 'Lunch'], ['id' => 2, 'name' => 'Admin'], ['id' => 3, 'name' => 'Prep'],
        ['id' => 4, 'name' => 'External Meeting'], ['id' => 5, 'name' => 'Internal Meeting'], ['id' => 6, 'name' => 'Team Meeting'],
        ['id' => 7, 'name' => 'Therapy Meeting'], ['id' => 8, 'name' => 'DBS'], ['id' => 9, 'name' => 'Regent'], ['id' => 10, 'name' => 'BON Media city'],
        ['id' => 11, 'name' => 'BON JBR'], ['id' => 12, 'name' => 'Dubai Heights Academy'], ['id' => 13, 'name' => 'DIA'], ['id' => 14, 'name' => 'World World 1'],
        ['id' => 15, 'name' => 'World World 2'], ['id' => 16, 'name' => 'World World 3'], ['id' => 17, 'name' => 'Busy Bodies'], ['id' => 19, 'name' => 'Fun Junction'],
        ['id' => 20, 'name' => 'Move & Groove'], ['id' => 21, 'name' => 'Creation Station'], ['id' => 22, 'name' => 'Wonder World'], ['id' => 23, 'name' => 'G-05'], ['id' => 24, 'name' => 'Other'],
    ];
    $option = '';
    $option = $option . '<option >Select</option>';
    for ($i = 0; $i < count($location_ar); $i++) {
        $select = '';
        if ($location_id == $location_ar[$i]['id']) {
            $select = 'selected="selected"';
        }
        $option = $option . '<option ' . $select . ' value="' . $location_ar[$i]['id'] . '">' . $location_ar[$i]['name'] . '</option>';
    }
    return $option;
}

function insert_query_event_details($json, $emp_id, $date) {
    $db = & get_instance();
    $inser_ar = [];
    $inser_ar = [
        'subject' => $json['subject'],
        'location' => $json['location'],
        'staff_id' => $emp_id,
        'event_date' => $date,
        'start_time' => $json['start_time'],
        'end_time' => $json['end_time'],
        'notes' => $json['notes'],
        'created_by' => $json['created_by'],
        'event_id_grp' => $json['event_id_grp'],
    ];

    $result = $db->Database->insert('event_schedule_details', $inser_ar);
    return $result;
}

function month_event_delete($array) {
    $db = & get_instance();
    $del_qry = "DELETE FROM `event_schedule_details` WHERE `event_id_grp` = '" . $array['event_id_grp'] . "' ";
    $db->Database->delete($del_qry);
}
