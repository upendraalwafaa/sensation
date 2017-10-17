<?php
/*
  Project Name : Sensation Sation
  Company Name : alwafaagroup
  Author: Upendra Kumar Prasad
  file Name : report_helper.php(Helper)
  Project URI: http://demo.softwarecompany.ae/sensation/
 */
function get_quotation_report_array($data) {
    extract($data);
    $db = load_Database();
    $cond = '';
    if ($start_date != '' && $end_date != '') {
        $cond = $cond . '(Q.timestamp BETWEEN "' . date('Y-m-d', strtotime($start_date)) . '" AND "' . date('Y-m-d', strtotime($end_date)) . '") AND ';
    } else if ($start_date != '') {
        $cond = $cond . "Q.timestamp > '" . date('Y-m-d', strtotime($start_date)) . "' AND ";
    }
    if ($child_id != '') {
        $cond = $cond . "Q.student_id LIKE '$child_id' AND ";
    }
    $cond_staff = '';
    if ($employee_id != '') {
        $cond_staff = $cond_staff . "AND E.id LIKE '$employee_id' ";
    }
    if ($cond != '') {
        $cond = 'WHERE ' . $cond;
        $cond = substr($cond, 0, -4);
    }
    $qry = "SELECT Q.*,C.child_name,P.father_name FROM quotation_details Q LEFT JOIN child_details C ON C.id=Q.student_id LEFT JOIN parent_details P ON P.child_id=Q.student_id  $cond ORDER BY Q.quotation_id DESC";
    $array_new = $db->Database->select_qry_array($qry);

    $main_arr = array();
    $total_amount = 0;
    $total_quo = 0;
    for ($i = 0; $i < count($array_new); $i++) {
        $in = $array_new[$i];
        $total_amount = $total_amount + $in->total;
        $main_arr[$i]['quotation_details'] = $in;
        $qd_qry = "SELECT QD.*,C.category_name,SC.sub_category_name FROM `quotation_discipline_details` QD  LEFT JOIN subcategory SC ON SC.id=QD.sub_category_id LEFT JOIN sen_category_details C ON C.id=QD.category_id  WHERE QD.`quotation_id` = '" . $in->quotation_id . "' GROUP BY QD.id";
        $qd_arr = $db->Database->select_qry_array($qd_qry);

        for ($qd = 0; $qd < count($qd_arr); $qd++) {
            $descipd = $qd_arr[$qd];
            $main_arr[$i]['quotation_descipline'][$qd] = $descipd;
            $ses_q = "SELECT QS.*,SR.services_time,SR.services_time_type,D.description,E.employee_name FROM `quotation_session_details` QS LEFT JOIN employee_details E ON E.id=QS.staff_id LEFT JOIN disipline_details D ON D.id=QS.discipline_type_id LEFT JOIN service_details SR ON QS.service_id=SR.id WHERE QS.`quotation_discipline_id` = '" . $descipd->id . "' $cond_staff GROUP BY QS.quotation_discipline_id";
            $ses_arr = $db->Database->select_qry_array($ses_q);
            $main_arr[$i]['quotation_sessaion'][$qd] = $ses_arr;
        }
        $total_quo++;
    }
    $temp = ['main_arr' => $main_arr, 'total_amount' => $total_amount, 'total_quo' => $total_quo];
    return $temp;
}

function get_receipt_reports_array($data) {
    extract($data);
    $db = load_Database();
    $cond = '';
    if ($start_date != '' && $end_date != '') {
        $cond = $cond . '(PH.timestamp BETWEEN "' . date('Y-m-d', strtotime($start_date)) . '" AND "' . date('Y-m-d', strtotime($end_date)) . '") AND ';
    } else if ($start_date != '') {
        $cond = $cond . "PH.timestamp > '" . date('Y-m-d', strtotime($start_date)) . "' AND ";
    }
    if ($child_id != '') {
        $cond = $cond . "PH.child_id LIKE '$child_id' AND ";
    }
    $cond_staff = '';
    if ($employee_id != '') {
        $cond_staff = $cond_staff . "AND PH.updated_by LIKE '$employee_id' ";
    }
    if ($cond != '') {
        $cond = 'WHERE ' . $cond;
        $cond = substr($cond, 0, -4);
    }
    $qry = "SELECT PH.*,P.id,Q.total,Q.discount,C.child_name,PRNT.father_name,E.employee_name AS updated_name FROM `payment_history` PH LEFT JOIN employee_details E ON E.id=PH.updated_by LEFT JOIN child_details C ON C.id=PH.child_id LEFT JOIN parent_details PRNT ON PRNT.child_id=PH.child_id LEFT JOIN quotation_details Q ON Q.quotation_id=PH.quotation_id LEFT JOIN payment_details P ON P.id=PH.payment_id $cond ORDER BY PH.`id` DESC";
    $array_new = $db->Database->select_qry_array($qry);
    $arr = ['array_new' => $array_new, 'form_data' => $data];
    return $arr;
}

function get_capacity_reports_array($data) {
    extract($data);
    $db = load_Database();
    $main_ar = array();
    $grad_minutes = 0;
    $qry = "SELECT QS.service_id,SV.services_time,SV.services_time_type,D.description,C.category_name FROM `quotation_session_details` QS LEFT JOIN disipline_details D ON D.id=QS.discipline_type_id LEFT JOIN service_details SV ON SV.id=QS.service_id LEFT JOIN sen_category_details C ON C.id=SV.category_id WHERE QS.staff_id=$employee_id GROUP BY service_id";
    $discipline_grp = $db->Database->select_qry_array($qry);
    $main_arr = array();
    $total_min_per_day = 0;
    for ($i = 0; $i < count($discipline_grp); $i++) {
        $gd = $discipline_grp[$i];
        $main_arr['group'][$i] = $gd;
        $qry = "SELECT * FROM `quotation_session_details` WHERE `staff_id` = $employee_id AND `service_id` = '" . $gd->service_id . "' AND session_date BETWEEN '$start_date' AND '$end_date'";
        $sessin_arr = $db->Database->select_qry_array($qry);
        $aatent = 0;
        $cancel_100 = 0;
        $cancel_50 = 0;
        for ($ses = 0; $ses < count($sessin_arr); $ses++) {
            $d = $sessin_arr[$ses];
            if ($d->completion_status == 4) {
                $aatent++;
            } else if ($d->completion_status == 2) {
                $cancel_50++;
            } else if ($d->completion_status == 1) {
                $cancel_100++;
            }

            $time1 = new DateTime($d->start_time);
            $time2 = new DateTime($d->end_time);
            $interval = $time1->diff($time2);
            $hou = $interval->format('%h');
            $min = $interval->format('%i');
            $tatal_min = ($hou * 60) + $min;
            //echo $d->start_time.'-'.$d->end_time.'-'.$d->id.'<br>';
            $total_min_per_day = $total_min_per_day + $tatal_min;
        }
        $main_arr['status'][$i] = ['aatent' => $aatent, 'cancel_100' => $cancel_100, 'cancel_50' => $cancel_50];
    }
    $total_hourse = get_minutes_to_houre($total_min_per_day);
    $arr = ['array_new' => $main_arr, 'form_data' => $data, 'total_hourse' => $total_hourse];
    return $arr;
}

function get_minutes_to_houre($minutes) {
    $zero = new DateTime('@0');
    $offset = new DateTime('@' . $minutes * 60);
    $diff = $zero->diff($offset);
    $ful_h_d = $diff->format('%h Hours %i Minutes');
    return $ful_h_d;
}

function get_therapy_status($status_id) {
    $json = '{"Cancelled 100%":"1","Cancelled 50%":"2","No show":"3","Attended ":"4","Cancelled by Therapist":"5","Cancelled No charge":"6","No show – SBS":"7","ELIP (General Observation)":"8","General Observation ":"9","Reschedule":"10","Cancelled By Manual":"11"}';
    $msg = '';
    if ($status_id == 1) {
        $msg = 'Cancelled 100%';
    } else if ($status_id == 2) {
        $msg = 'Cancelled 50%';
    } else if ($status_id == 3) {
        $msg = 'No show';
    } else if ($status_id == 4) {
        $msg = 'Attended';
    } else if ($status_id == 5) {
        $msg = 'Cancelled by Therapist';
    } else if ($status_id == 6) {
        $msg = 'Cancelled No charge';
    } else if ($status_id == 7) {
        $msg = 'No show – SBS';
    } else if ($status_id == 8) {
        $msg = 'ELIP (General Observation)';
    } else if ($status_id == 9) {
        $msg = 'General Observation';
    } else if ($status_id == 10) {
        $msg = 'Reschedule';
    } else if ($status_id == 11) {
        $msg = 'Cancelled By Manual';
    }
    return $msg;
}
function get_minutes_to_houre_for_calender($minutes) {
    $hours = floor($minutes / 60) . ':' . ($minutes - floor($minutes / 60) * 60);
    $ar = explode(':', $hours);
    return $ar[0] . ' Hours ' . $ar[1] . ' Minutes';
}
function get_paid_amount_formare($paid_id) {
    $msg = '';
    if ($paid_id == 0) {
        $msg = 'Cash';
    } else if ($paid_id == 1) {
        $msg = 'Cheque';
    } else if ($paid_id == 2) {
        $msg = 'Card';
    } else if ($paid_id == 4) {
        $msg = 'Bank Transfer';
    }
    return $msg;
}
