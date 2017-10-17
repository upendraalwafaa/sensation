<?php
/*
  Project Name : Sensation Sation
  Company Name : alwafaagroup
  Author: Upendra Kumar Prasad
  file Name : receipt_helper.php(Helper)
  Project URI: http://demo.softwarecompany.ae/sensation/
 */
function get_current_receipt_paid_amount($quotation_id) {
    $db = load_Database();
    $qry = "SELECT SUM(`pay_amount`) AS total_pay FROM `payment_history` WHERE quotation_id='$quotation_id'";
    $histoey_tbl = $db->Database->select_qry_array($qry);
    return $histoey_tbl[0]->total_pay;
}

function save_receipt_details($array) {
    $db = load_Database();
    if (isset($array['json'])) {
        $json = json_decode($_REQUEST['json'], true);
        if ($json != '') {
            $quotation_id = $json['quotation_id'];
            $receipt_no = $json['receipt_no'];
            $discount = $json['discount'];
            $payable_amount = $json['payable_amount'];
            update_quotation_discount($discount, $quotation_id);
            save_payment_history_table($quotation_id, $payable_amount, '', $json);
            send_mail_receipt_amount_paid($quotation_id);
        }
    }
}

function total_refund_cash_amount($child_id) {
    $db = load_Database();
    $qry = "SELECT SUM(`refund_amount`) AS total_pay FROM `refund_excess_amount_details` WHERE child_id='$child_id' AND refund_mode=1";
    $histoey_tbl = $db->Database->select_qry_array($qry);
    return $histoey_tbl[0]->total_pay;
}

function total_refund_cash_amount_by_quotation($quotation_id) {
    $db = load_Database();
    $qry = "SELECT SUM(`refund_amount`) AS total_pay FROM `refund_excess_amount_details` WHERE quotation_id='$quotation_id' AND refund_mode=1";
    $histoey_tbl = $db->Database->select_qry_array($qry);
    return $histoey_tbl[0]->total_pay;
}

function total_refund_excess_amount_by_quotation($quotation_id) {
    $db = load_Database();
    $qry = "SELECT SUM(`refund_amount`) AS total_pay FROM `refund_excess_amount_details` WHERE quotation_id='$quotation_id' AND refund_mode=0";
    $histoey_tbl = $db->Database->select_qry_array($qry);
    return $histoey_tbl[0]->total_pay;
}

function total_cancelled_session($quotation_id) {
    $db = load_Database();
    $total = 0;
    $qry1 = "SELECT COUNT(id) AS total FROM  quotation_deleted_details WHERE quotation_id='" . $quotation_id . "'";
    $quotation_deletd_arr = $db->Database->select_qry_array($qry1);
    return $quotation_deletd_arr[0]->total;
}

function save_payment_history_table($quotation_id, $pay_amount, $refund_status = 0, $json = '') {
    $db = load_Database();
    $qry = "SELECT * FROM  quotation_details WHERE quotation_id='" . $quotation_id . "'";
    $quotation_arr = $db->Database->select_qry_array($qry);
    $payemnt_query = "SELECT * FROM `payment_details` WHERE quotation_id='" . $quotation_id . "'";
    $payment_arr = $db->Database->select_qry_array($payemnt_query);
    $session_array = get_session_array_value();
    if (count($payment_arr) > 0) {
        $payment_id = $payment_arr[0]->id;
    } else {
        $payment_ins = [
            'quotation_id' => $quotation_arr[0]->quotation_id,
            'receipt_no' => $quotation_arr[0]->receipt_no,
            'child_id' => $quotation_arr[0]->student_id,
            'amount' => $quotation_arr[0]->sub_total,
            'discount' => $quotation_arr[0]->discount,
            'updated_by' => $session_array[0]->id,
            'update_time' => date('Y-m-d H:i:s'),
        ];
        $payment_id = $db->Database->insert('payment_details', $payment_ins);
    }
    if ($payment_id) {
        $payment_history_ins = [
            'payment_id' => $payment_id,
            'quotation_id' => $quotation_arr[0]->quotation_id,
            'receipt_no' => $quotation_arr[0]->receipt_no,
            'child_id' => $quotation_arr[0]->student_id,
            'pay_amount' => $pay_amount,
            'updated_by' => $session_array[0]->id,
            'paid_by' => $json['paid_by'],
            'notes' => $json['notes'],
            'why_discount' => $json['why_discount'],
            'update_time' => date('Y-m-d H:i:s'),
        ];
        $result = $db->Database->insert('payment_history', $payment_history_ins);
    }
    if ($result) {
        $json = '{"status":"success"}';
    } else {
        $json = '{"status":"Error"}';
    }
    echo $json;
}

function cancel_quotation_details($array) {
    $db = load_Database();
    if (isset($array['json'])) {
        $json = json_decode($_REQUEST['json'], true);
        if ($json != '') {
            $quotation_id = $json['quotation_id'];
            $receipt_no = $json['receipt_no'];
            get_previous_quotation_amount_status($quotation_id, $json);
            send_mail_cancelled_session($quotation_id);
            echo '{"status":"success"}';
        }
    }
}

function get_previous_quotation_amount_status($quotation_id, $json = '') {
    $db = load_Database();
    $session_array = get_session_array_value();
    $selected_id = $json['session_tbl_id'];
    $session_tbl_q = "SELECT * FROM `quotation_session_details` WHERE id IN ($selected_id)";
    $session_arr = $db->Database->select_qry_array($session_tbl_q);
    for ($i = 0; $i < count($session_arr); $i++) {
        $d = $session_arr[$i];
        $deleed_session_arr = [
            'session_tbl_id' => $d->id,
            'quotation_id' => $d->quotation_id,
            'quotation_discipline_id' => $d->quotation_discipline_id,
            'discipline_type_id' => $d->discipline_type_id,
            'staff_id' => $d->staff_id,
            'service_id' => $d->service_id,
            'session_date' => $d->session_date,
            'start_time' => $d->start_time,
            'end_time' => $d->end_time,
            'services_fee' => $d->services_fee,
            'deleted_by' => $d->id,
            'deleted_messages' => $json['deleted_messages']
        ];
        set_remove_session_discount_price($quotation_id, $d->services_fee, $deleed_session_arr, $json);
    }
    $qd = get_quotation_deatils_by_quotation_id($quotation_id);
    if ($json['refound_amount'] > 0) {
        $refund_exces_ar = [
            'quotation_id' => $quotation_id,
            'receipt_no' => $qd->receipt_no,
            'child_id' => $qd->student_id,
            'refund_amount' => $json['refound_amount'],
            'refund_mode' => $json['refund_mode'],
            'updated_by' => $session_array[0]->id,
            'updatetime' => date('Y-m-d H:i:s')
        ];
        $result = $db->Database->insert('refund_excess_amount_details', $refund_exces_ar);
    }
}

function get_quotation_deatils_by_quotation_id($quotation_id) {
    $db = load_Database();
    $qry = "SELECT Q.*,C.*,P.* FROM  quotation_details Q LEFT JOIN child_details C ON C.id=Q.student_id LEFT JOIN parent_details P ON  P.child_id=C.id WHERE Q.quotation_id='" . $quotation_id . "'";
    $quotation_arr = $db->Database->select_qry_array($qry);
    return $quotation_arr[0];
}

function set_remove_session_discount_price($quotation_id, $remove_amout = 0, $deleed_session_arr, $json) {
    $db = load_Database();
    $qry = "SELECT * FROM  quotation_details WHERE quotation_id='" . $quotation_id . "'";
    $quotation_arr = $db->Database->select_qry_array($qry);
    $sub_total = $quotation_arr[0]->sub_total;
    $discount = $quotation_arr[0]->discount;
    $result = $db->Database->insert('quotation_deleted_details', $deleed_session_arr);
    $del_q = "DELETE FROM `quotation_session_details` WHERE `id` = " . $deleed_session_arr['session_tbl_id'];
    $db->Database->delete($del_q);
    $temp_total = $sub_total - $remove_amout;
    $total = $temp_total - $discount;
    $quotation_update = [
        'sub_total' => $temp_total,
        'total' => $total,
        'discount' => $discount
    ];
    $cond1 = 'quotation_id=' . $quotation_id;
    $db->Database->update($cond1, $quotation_update, 'quotation_details');
}

function update_quotation_discount($discount, $quotation_id) {
    $db = load_Database();
    $qry = "SELECT * FROM  quotation_details WHERE quotation_id='" . $quotation_id . "'";
    $quotation_arr = $db->Database->select_qry_array($qry);

    $sub_total = $quotation_arr[0]->sub_total;
    $total = $sub_total - $discount;
    $quotation_update = [
        'total' => $total,
        'discount' => $discount,
    ];
    $payment_tbl_update = [
        'discount' => $discount,
        'update_time' => date('Y-m-d H:i:s'),
    ];
    $cond1 = 'quotation_id=' . $quotation_id;
    $db->Database->update($cond1, $quotation_update, 'quotation_details');
    $db->Database->update($cond1, $payment_tbl_update, 'payment_details');
}

function get_session_array_value() {
    $ci = & get_instance();
    $session_arr = $ci->session->userdata('logged_in');
    return $session_arr;
}

function get_employee_list_for_edit_session($data) {
    $db = load_Database();
    $qry = "SELECT * FROM  employee_details";
    $employee_ar = $db->Database->select_qry_array($qry);
    $data = [
        'emp' => $employee_ar
    ];
    echo json_encode($data);
}

function session_reset_details($array) {
    $main_arr = json_decode($array['main_ar'], TRUE);
    for ($i = 0; $i < count($main_arr); $i++) {
        $d = $main_arr[$i];
        $msg = check_availity_employee_status($d['staff_id'], $d['date'], $d['start_time'], $d['end_time']);
        if ($msg != '') {
            echo $msg;
            exit;
        }
    }
    $result = '';
    $db = load_Database();
    for ($i = 0; $i < count($main_arr); $i++) {
        $d = $main_arr[$i];
        $cond = 'id="' . $d['db_id'] . '"';
        $update_arr = [
            'staff_id' => $d['staff_id'],
            'session_date' => date('Y-m-d', strtotime($d['date'])),
            'start_time' => $d['start_time'],
            'end_time' => $d['end_time'],
        ];
        $result = $db->Database->update($cond, $update_arr, 'quotation_session_details');
    }
    if ($result) {
        echo '{"status":"success"}';
    } else {
        echo '{"status":"error"}';
    }
}

function make_it_child_not_attended($array) {
    $db_id = $array['db_id'];
    $db = load_Database();
    $cond = 'id="' . $array['db_id'] . '"';
    $update_arr = [
        'completion_status' => 1,
        'start_time' => '00-00',
        'end_time' => '00-00',
    ];
    $result = $db->Database->update($cond, $update_arr, 'quotation_session_details');
    if ($result >= 0) {
        echo '{"status":"success"}';
    }
}
