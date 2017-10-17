<?php
/*
  Project Name : Sensation Sation
  Company Name : alwafaagroup
  Author: Upendra Kumar Prasad
  file Name : notifaction_helper.php(Helper)
  Project URI: http://demo.softwarecompany.ae/sensation/
 */
function get_notification_details($array) {
    $ci = load_Database();
    $session_ar = get_session_array();
    $staff_id = $session_ar[0]->id;
    $date = date('Y-m-d');
    $qry1 = "SELECT EV.*,E.employee_name FROM `event_schedule_details` EV LEFT JOIN employee_details E ON E.id=EV.created_by WHERE EV.event_date =   '$date' AND EV.staff_id=$staff_id";
    $notifaction_event = $ci->Database->select_qry_array($qry1);
    $qry2 = "SELECT QS.*,E.employee_name,Q.student_id,C.child_name FROM `quotation_session_details` QS LEFT JOIN quotation_details Q ON Q.quotation_id=QS.quotation_id LEFT JOIN child_details C ON C.id=Q.student_id JOIN employee_details E ON E.id=QS.staff_id WHERE QS.session_date = '$date' AND QS.staff_id=$staff_id AND QS.completion_status=0";
    $sesson_arr = $ci->Database->select_qry_array($qry2);
    $html = '';
    for ($i = 0; $i < count($sesson_arr); $i++) {
        $d = $sesson_arr[$i];
        $sess_d_time = $d->session_date . ' ' . $d->start_time;
        if ($sess_d_time > date('Y-m-d H:i:s')) {
            $timecl = '';
        } else {
            $timecl = get_time_diff($sess_d_time);
        }
        $html = $html . '<li>';
        $html = $html . '   <a href="javascript:;">';
        $html = $html . '   <span class="time">' . $timecl . '</span>';
        $html = $html . '  <span class="details"> ';
        $html = $html . '    <span class="label label-sm label-icon label-warning"> ';
        $html = $html . '       <i class="fa fa-bell-o"></i>';
        $time = date('H:i A', strtotime($d->start_time));
        $html = $html . '    </span> Session at ' . $time . ' - ' . $d->child_name . ' </span>';
        $html = $html . ' </a>';
        $html = $html . '  </li>';
    }
    for ($i = 0; $i < count($notifaction_event); $i++) {
        $d = $notifaction_event[$i];
        $html = $html . '<li>';
        $html = $html . '   <a href="javascript:;">';
        $sess_d_time = $d->event_date . ' ' . $d->start_time;
        $timecl = get_time_diff($sess_d_time);
        if ($sess_d_time > date('Y-m-d H:i:s')) {
            $timecl = '';
        } else {
            $timecl = get_time_diff($sess_d_time);
        }
        $html = $html . '   <span class="time">' . $timecl . '</span>';
        $html = $html . '  <span class="details"> ';
        $time = date('H:i A', strtotime($d->start_time));
        $html = $html . '    <span class="label label-sm label-icon label-warning"> ';
        $html = $html . '       <i class="fa fa-bell-o"></i>';
        $html = $html . '    </span> Event at ' . $time . ' With  ' . $d->employee_name . ' </span>';
        $html = $html . ' </a>';
        $html = $html . '  </li>';
    }
    $count = count($notifaction_event) + count($sesson_arr);
    $arr = [
        'html' => $html,
        'count' => $count
    ];
    echo json_encode($arr);
}

function get_session_array() {
    $ins = & get_instance();
    $session_arr = $ins->session->userdata('logged_in');
    return $session_arr;
}

function get_time_diff($starttime) {
    $date_a = new DateTime($starttime);
    $date_b = new DateTime(date('Y-m-d H:i:s'));
    $interval = date_diff($date_a, $date_b);
    $day = $interval->format('%a');
    $hour = $interval->format('%h');
    $minutes = $interval->format('%i');
    $return = '';
    if ($day > 0) {
        $return = $day . ' dys ';
    } else if ($hour > 0) {
        $return = $hour . ' hrs ';
    } else if ($minutes > 0) {
        $return = $minutes . ' mins ';
    }
    return $return;
}
