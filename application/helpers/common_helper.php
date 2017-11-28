<?php
/*
  Project Name : Sensation Sation
  Company Name : alwafaagroup
  Author: Upendra Kumar Prasad
  file Name : common_helper.php(Helper)
  Project URI: http://demo.softwarecompany.ae/sensation/
  Description : It's every files
 */

function load_Database() {
    $ci = & get_instance();
    $ci->load->model('Database');
    return $ci;
}

function delete_main_category($array) {
    $ci = load_Database();
    $update_Arr = [
        'archive' => 1,
    ];
    $cond = "id=" . $array['category_id'];
    $cond123 = "category_id=" . $array['category_id'];
    $result = $ci->Database->update($cond, $update_Arr, 'sen_category_details');
    $result = $ci->Database->update($cond123, $update_Arr, 'subcategory');
    echo '{"status":"success"}';
}

function PHPExcel() {
    $server_path = $_SERVER['DOCUMENT_ROOT'] . '/sensation/';
    require $server_path . 'application/third_party/PHPExcel-1.8/Classes/PHPExcel.php';
}

function delete_main_disipline($array) {
    $ci = load_Database();
    $update_Arr = [
        'archive' => 1,
    ];
    $cond = "id=" . $array['disipline_id'];
    $result = $ci->Database->update($cond, $update_Arr, 'disipline_details');
    echo '{"status":"success"}';
}

function delete_main_designation($array) {
    $ci = load_Database();
    $update_Arr = [
        'archive' => 1,
    ];
    $cond = "id=" . $array['designation_id'];
    $result = $ci->Database->update($cond, $update_Arr, 'designation_details');
    echo '{"status":"success"}';
}

function delete_main_subcategory($array) {
    $ci = load_Database();
    $update_Arr = [
        'archive' => 1,
    ];
    $cond = "id=" . $array['subcategory_id'];
    $result = $ci->Database->update($cond, $update_Arr, 'subcategory');
    echo '{"status":"success"}';
}

function delete_main_services($array) {
    $ci = load_Database();
    $update_Arr = [
        'archive' => 1,
    ];
    $cond = "id=" . $array['services_id'];
    $result = $ci->Database->update($cond, $update_Arr, 'service_details');
    echo '{"status":"success"}';
}

function send_mail($email_id, $subject, $messages, $file_path = '', $cc = '') {
    $ci = & get_instance();
    $ci->load->library('email');
    error_reporting(0);
    $ci->email->from('admin@sensationstation.ae', 'Sensation station');
    $ci->email->to($email_id);
    if ($cc != '') {
        $ci->email->cc($cc);
    }
    $ci->email->subject($subject);
    $ci->email->message($messages);
    if ($file_path != '') {
        $ci->email->attach($file_path);
    }
    $ci->email->send();
}

function make_pdf_and_save_by_quotation_id($quotation_id, $add_receipt = 'No') {
    $ci = & get_instance();
    $qd = get_quotation_deatils_by_quotation_id($quotation_id);
    $child_name = $qd->child_name;
    $receipt_no = $qd->receipt_no;
    $student_id = $qd->student_id;
    $child_name = preg_replace('/\s+/', '', $child_name);
    $file_name = $child_name . '_' . $receipt_no;
    $mail_html = genrate_quotation_html_mail($quotation_id, $electronic_link_id = '', $add_receipt);
    $file_path = $_SERVER['DOCUMENT_ROOT'] . '/sensation/receipt_details/' . $file_name . '.pdf';
    $electronic_link_id = '';
    $mail_body = receipt_html_body($student_id, $electronic_link_id, $quotation_id);
    if (is_file($file_path)) {
        unlink($file_path);
    }
    $ci->load->library('pdf');
    $pdf = $ci->pdf->load();
    $pdf->WriteHTML($mail_html);
    $footer_html = receipt_footer_html();
    // $pdf->SetHTMLFooter($footer_html, 'O');
    $pdf->Output($file_path);
    return $file_path;
}

function send_reset_password($Arr) {
    $ci = load_Database();
    $qry = "SELECT * FROM `employee_details` WHERE `id` = " . $Arr['emp_id'];
    $arr = $ci->Database->select_qry_array($qry);
    $random = substr(md5(rand()), 0, 7);
    $html = Get_html_for_reset_password($arr, $random);
    send_mail($arr[0]->email, 'Account Details', $html);
    $update_Arr = [];
    $update_Arr = [
        'password' => md5($random)
    ];
    $cond = "id=" . $Arr['emp_id'];
    $result = $ci->Database->update($cond, $update_Arr, 'employee_details');
    if ($result) {
        $json = '{"status":"success"}';
    } else {
        $json = '{"status":"Error"}';
    }
    echo $json;
}

function get_prev_excess_amount_by_student_id($child_id, $quotation_id = '') {
    $db = load_Database();
    $total_qtition = 0;
    $qry = "SELECT * FROM `quotation_details` WHERE student_id='$child_id' AND accept_status='Accept'";
    $quotation_tbl = $db->Database->select_qry_array($qry);
    for ($i = 0; $i < count($quotation_tbl); $i++) {
        $total_qtition = $total_qtition + $quotation_tbl[$i]->total;
    }
    $qry = "SELECT * FROM `payment_history` WHERE child_id='$child_id'";
    $histoey_tbl = $db->Database->select_qry_array($qry);
    $total_his = 0;
    for ($i = 0; $i < count($histoey_tbl); $i++) {
        $total_his = $total_his + $histoey_tbl[$i]->pay_amount;
    }
    $sub_t = $total_qtition - $total_his;
    $refund_amt = total_refund_cash_amount($quotation_tbl[0]->student_id);
    $total = $sub_t + $refund_amt;
    return $total;
}

function excess_and_due_amount_formate_details($child_id) {
    $excess_amount = get_prev_excess_amount_by_student_id($child_id);
    if ($excess_amount <= 0) {
        $msg = 'Excess : ' . substr($excess_amount, 1) . ' AED';
    } else {
        $msg = 'Due : ' . $excess_amount . ' AED';
    }
    return $msg;
}

function get_excess_amount_by_student_id($child_id) {
    $db = load_Database();
    $total_qtition = 0;
    $qry = "SELECT * FROM `quotation_details` WHERE student_id='$child_id'";
    $quotation_tbl = $db->Database->select_qry_array($qry);
    for ($i = 0; $i < count($quotation_tbl); $i++) {
        $total_qtition = $total_qtition + $quotation_tbl[$i]->total;
    }
    $qry = "SELECT * FROM `payment_history` WHERE child_id='$child_id'";
    $histoey_tbl = $db->Database->select_qry_array($qry);
    $total_his = 0;
    for ($i = 0; $i < count($histoey_tbl); $i++) {
        $total_his = $total_his + $histoey_tbl[$i]->pay_amount;
    }
    $sub_t = $total_qtition - $total_his;
    return $sub_t;
}

function Get_sub_category_list_by_id($category_id) {
    $qry = "SELECT * FROM `subcategory` WHERE `category_id` =" . $category_id;
    $ci = load_Database();
    $html = '';
    $html = $html . '<select id="subcategory" class="form-control"><option value="">--select--</option>';
    if ($ci->Database->num_rows($qry) > 0) {
        $arr = $ci->Database->select_qry_array($qry);

        for ($i = 0; $i < count($arr); $i++) {
            $html = $html . '<option value="' . $arr[$i]->id . '">' . $arr[$i]->sub_category_name . '</option>';
        }
    }
    $html = $html . '</select>';
    echo $html;
}

function days_in_month($month, $year) {
    return date('t', mktime(0, 0, 0, $month + 1, 0, $year));
}

function getAllMonths($selected = '') {
    $options = '';
    for ($i = 1; $i <= 12; $i++) {
        $value = ($i < 01) ? '0' . $i : $i;
        $selectedOpt = ($value == $selected) ? 'selected' : '';
        $options .= '<option value="' . $value . '" ' . $selectedOpt . ' >' . date("F", mktime(0, 0, 0, $i + 1, 0, 0)) . '</option>';
    }
    return $options;
}

function getYearList($selected = '') {
    $options = '';
    for ($i = 2015; $i <= 2025; $i++) {
        $selectedOpt = ($i == $selected) ? 'selected' : '';
        $options .= '<option value="' . $i . '" ' . $selectedOpt . ' >' . $i . '</option>';
    }
    return $options;
}

function Get_student_details($Arr) {
    $db = load_Database();
    $child_id = $Arr['child_id'];
    $qry = "SELECT C.*,P.* FROM `child_details` C LEFT JOIN parent_details P ON C.id=P.child_id WHERE C.id=" . $child_id;
    if ($db->Database->num_rows($qry) > 0) {
        $arr = $db->Database->select_qry_array($qry);
        $excess_amount = get_excess_amount_by_student_id($arr[0]->child_id);
        $ar = [
            'child_details' => $arr,
            'excess_amount' => $excess_amount,
        ];
        $json = json_encode($ar);
    } else {
        $json = '0';
    }
    echo $json;
}

// new function for cotation details
function Get_category_list($Arr) {
    $db = load_Database();
    $qry_cat = "select * from sen_category_details WHERE archive=0";
    if ($db->Database->num_rows($qry_cat) > 0) {
        $Arrr = [];
        $category = $db->Database->select_qry_array($qry_cat);
        $Arrr = [
            'category_details' => $category
        ];
    } else {
        $Arrr = '0';
    }
    echo json_encode($Arrr);
}

function Get_category_list_for_ses($Arr) {
    $db = load_Database();
    $qry_cat = "select * from sen_category_details WHERE id IN(1,2,3,11) AND archive=0";
    if ($db->Database->num_rows($qry_cat) > 0) {
        $Arrr = [];
        $category = $db->Database->select_qry_array($qry_cat);
        $Arrr = [
            'category_details' => $category
        ];
    } else {
        $Arrr = '0';
    }
    echo json_encode($Arrr);
}

function Get_service_name_by_category($data) {
    $db = load_Database();
    $qry = "SELECT S.*,C.category_name FROM `subcategory` S LEFT JOIN sen_category_details C ON C.id=S.category_id  WHERE `category_id` ='" . $data['category_id'] . "'";
    $Arr_new = [];
    if ($db->Database->num_rows($qry) > 0) {
        $arr = $db->Database->select_qry_array($qry);
        $Arr_new = [
            'services' => $arr,
            'div_id' => $data['div_id']
        ];
    } else {
        $Arr_new = [
            'services' => '0',
            'div_id' => $data['div_id']
        ];
    }
    echo json_encode($Arr_new);
}

function Get_disipline_name_by_service($data) {
    $db = load_Database();
    $qry = "SELECT S.*,DI.disipline_name FROM `service_details` S LEFT JOIN disipline_details DI ON S.disipline=DI.id WHERE `sub_category_id` =" . $data['service_id'] . " AND S.archive=0 GROUP BY DI.disipline_name";
    // $qry = "SELECT * FROM `service_details` WHERE `sub_category_id` ='" . $service_id . "'";
    $Arr_new = [];
    if ($db->Database->num_rows($qry) > 0) {
        $arr = $db->Database->select_qry_array($qry);
        $Arr_new = [
            'discipline' => $arr,
            'div_id' => $data['div_id']
        ];
    } else {
        $Arr_new = [
            'discipline' => $arr,
            'div_id' => $data['div_id']
        ];
    }
    echo json_encode($Arr_new);
}

function Get_disipline_pannel($data) {
    $Arr_new = [];
    if ($data['disipline_id'] != '') {
        $db = load_Database();
        $disipline_Arr = explode(',', $data['disipline_id']);
        $new_Arr = [];
        for ($i = 0; $i < count($disipline_Arr); $i++) {
            $qry = "SELECT * FROM `employee_details` WHERE disipline_id LIKE '%" . $disipline_Arr[$i] . "%' AND archive=0";
            $price_q = "SELECT S.*,DI.disipline_name FROM `service_details` S LEFT JOIN disipline_details DI ON S.`disipline`=DI.id WHERE `category_id` LIKE '" . $data['category_id'] . "' AND `sub_category_id` LIKE '" . $data['subcat_id'] . "' AND `disipline` =" . $disipline_Arr[$i];
            $new_Arr[$i] = [
                'employee_details' => $db->Database->select_qry_array($qry),
                'div_id' => $data['div_id'],
                'discpline_details' => $db->Database->select_qry_array($price_q),
            ];
        }
    } else {
        $new_Arr[0] = [
            'div_id' => $data['div_id'],
            'discpline_details' => '0',
        ];
    }
    echo json_encode($new_Arr);
}

function Get_new_session_row($data) {
    $Arr_new = [];
    if ($data['disipline_id'] != '') {
        $db = load_Database();
        $disipline_Arr = explode(',', $data['disipline_id']);
        $new_Arr = [];
        for ($i = 0; $i < count($disipline_Arr); $i++) {
            $qry = "SELECT * FROM `employee_details` WHERE disipline_id LIKE '%" . $disipline_Arr[$i] . "%'";
            $price_q = "SELECT S.*,DI.disipline_name FROM `service_details` S LEFT JOIN disipline_details DI ON S.`disipline`=DI.id WHERE `category_id` LIKE '" . $data['category_id'] . "' AND `sub_category_id` LIKE '" . $data['subcat_id'] . "' AND `disipline` =" . $disipline_Arr[$i];
            $new_Arr[$i] = [
                'employee_details' => $db->Database->select_qry_array($qry),
                'div_id' => $data['div_id'],
                'discpline_details' => $db->Database->select_qry_array($price_q),
            ];
        }
    } else {
        $new_Arr[0] = [
            'employee_details' => '0',
            'div_id' => $data['div_id'],
            'discpline_details' => '0',
        ];
    }
    echo json_encode($new_Arr);
}

function upate_quotation_accept($array) {
    $db = load_Database();
    $quotation_id = $array['quotation_id'];
    if ($array['type'] == 'update') {
        $arr = [
            'accept_status' => 'Accept'
        ];
        $cond = "quotation_id=" . $quotation_id;
        $db->Database->update($cond, $arr, 'quotation_details');
        $db->Database->update($cond, $arr, 'quotation_discipline_details');
        $db->Database->update($cond, $arr, 'quotation_session_details');
    } else if ($array['type'] == 'delete') {
        $electronic_id = $array['electronic_id'];
        $qry1 = "DELETE FROM `quotation_details` WHERE quotation_id = " . $quotation_id;
        $qry2 = "DELETE FROM `quotation_discipline_details` WHERE quotation_id = " . $quotation_id;
        $qry3 = "DELETE FROM `quotation_session_details` WHERE quotation_id = " . $quotation_id;
        if ($electronic_id > 0) {
            $qry4 = "DELETE FROM `electronic_mail` WHERE id = " . $electronic_id;
            $db->Database->delete($qry4);
        }
        $db->Database->delete($qry1);
        $db->Database->delete($qry2);
        $db->Database->delete($qry3);
    }
    echo '{"status":"success"}';
}

function get_quotation_receipt_genrate_status($quotation_id) {
    $db = load_Database();
    $qry = "SELECT * FROM `payment_details` WHERE `quotation_id` =$quotation_id";
    return $db->Database->select_qry_array($qry);
}

function Get_same_row_session($array) {
    $db = load_Database();
    $start_date = $array['start_date'];
    $end_date = $array['end_date'];
    $time = $array['time'];
    $descipline_id = $array['descipline_id'];
    $select_desc_arr = explode('~', $array['select_descipline']);
    $select_descipline = $select_desc_arr[0];
    $temp_day = explode('~', $array['days_name']);
    $days_name = $temp_day[0];
    $staff_id = $array['staff_id'];
    $panel_id = $array['panel_id'];
    $div_id = $array['div_id'];
    $start = strtotime(date('Y-m-d', strtotime($start_date)));
    $end = date('Y-m-d', strtotime($end_date));

    $startDate = new DateTime($start_date);
    $endDate = new DateTime($end_date);
    $interval = $startDate->diff($endDate);
    $total_days = (int) (($interval->days) / 7);

    $start_days_name = date('l', strtotime($start_date));
    $day_inc = 0;
    $dateloop1 = date('Y-m-d', strtotime('-1 days', strtotime($array['start_date'])));
    for ($i = 0; $i <= $total_days; $i++) {
        $qry = "SELECT * FROM `employee_details` WHERE disipline_id LIKE '%" . $descipline_id . "%'";
        $price_q = "SELECT S.*,DI.disipline_name,DI.description,DI.id AS disipline_id FROM `service_details` S LEFT JOIN disipline_details DI ON S.`disipline`=DI.id WHERE `category_id` LIKE '" . $array['category_id'] . "' AND `sub_category_id` LIKE '" . $array['subcat_id'] . "' AND `disipline` =" . $descipline_id;
        $employee = $db->Database->select_qry_array($qry);
        $discipline_Arr = $db->Database->select_qry_array($price_q);
        if ($i != 0) {
            $dateloop1 = date('Y-m-d', strtotime('+7 days', strtotime($dateloop1)));
        }
        for ($dd = 0; $dd < count($temp_day); $dd++) {
            $row_id_cond = $panel_id . '_' . $i . '_' . $dd;
            $day_name = $temp_day[$dd];

            $datefor = new DateTime($dateloop1);
            $datefor->modify("next $day_name");
            $date = $datefor->format('Y-m-d');
            if ($date > $end) {
                continue;
            }
            ?>
            <div class="row session_quo_cls row_id_<?= $panel_id ?>" div_id="<?= $div_id ?>" pannel_id="<?= $panel_id ?>" row_id="<?= $row_id_cond ?>" id="row_<?= $row_id_cond ?>"> 
                <div class="col-md-2 mrg15">  
                    <!--if this drop down manual change then need to this service_id change (because its coming form services_details table and there is multiple discipline)-->
                    <select  class="form-control discipline_type edited" id="services_displine_id_<?= $row_id_cond ?>">
                        <option value="">--Select--</option>
                        <?php
                        for ($k = 0; $k < count($discipline_Arr); $k++) {
                            $select = '';

                            if ($discipline_Arr[$k]->id == $select_descipline) {
                                $select = 'selected="selected"';
                                $add_time = $discipline_Arr[$k]->services_time . ' ' . $discipline_Arr[$k]->services_time_type;
                                $end_time = date('H:i', strtotime('+' . $add_time, strtotime($time)));
                                $discipline_fee = $discipline_Arr[$k]->fees;
                            }
                            $option = '';
                            $value = '';
                            $option = $discipline_Arr[$k]->disipline_name . '&nbsp;' . $discipline_Arr[$k]->services_time . '&nbsp;' . $discipline_Arr[$k]->services_time_type;
                            $value = $discipline_Arr[$k]->id . '~' . $discipline_Arr[$k]->disipline_name . '~' . $discipline_Arr[$k]->services_time . '~' . $discipline_Arr[$k]->services_time_type . '~' . $discipline_Arr[$k]->description . '~' . $discipline_Arr[$k]->disipline_id;
                            ?>
                            <option <?= $select ?> title="Price : AED &nbsp;<?= $discipline_Arr[$k]->fees ?>" value="<?= $value ?>"><?= $option ?></option>
                        <?php } ?>
                    </select>   

                </div> 

                <?php
                $availity_status = check_availity_employee_status($staff_id, $date, $time, $end_time);
                $add_class = '';
                $title_error = '';
                $chnage_date_attr = 'div_id="' . $row_id_cond . '" ';
                if ($availity_status != '') {
                    $decode_ar = json_decode($availity_status, true);
                    $add_class = 'avility_show_msg ';
                    $title_error = $decode_ar['employee_name'] . '  is busy ' . date('H:i', strtotime($decode_ar['start_time'])) . ' - ' . date('H:i', strtotime($decode_ar['end_time']));
                }
                ?>
                <div class="col-md-2 mrg15"> 
                    <select <?= $chnage_date_attr ?> class="form-control avility_show_msg_chnage <?= $add_class ?>" id="staff_id_<?= $row_id_cond ?>"> 
                        <option value="">--Select--</option>
                        <?php
                        for ($k = 0; $k < count($employee); $k++) {
                            $select = '';
                            if ($employee[$k]->id == $staff_id) {
                                $select = 'selected="selected"';
                            }
                            ?>
                            <option <?= $select ?> value="<?= $employee[$k]->id ?>"><?= $employee[$k]->employee_name ?></option>
                        <?php } ?>
                    </select> 
                </div>

                <div class="col-md-2 mrg15"> 
                    <input <?= $chnage_date_attr ?>  id="session_date_<?= $row_id_cond ?>" class="datepicker_dsb form-control  quotation_calender avility_show_msg_chnage  <?= $add_class ?>" type="text" value="<?= $date ?>">
                </div>
                <div class="col-md-4 tabpadnone" style="">
                    <div class="col-sm-6 mrg15"> 
                        <select <?= $chnage_date_attr ?> class="form-control avility_show_msg_chnage <?= $add_class ?>" id="start_time_<?= $row_id_cond ?>"> 
                            <?= print_time($time); ?>
                        </select> 
                    </div>

                    <div class="col-sm-6 mrg15">
                        <select <?= $chnage_date_attr ?>  class="form-control avility_show_msg_chnage <?= $add_class ?>" id="end_time_<?= $row_id_cond ?>">  
                            <?= print_time($end_time); ?>
                        </select> 

                    </div>
                </div>
                <div class="col-md-2 mrg15 "> 
                    <?php
                    if ($discipline_Arr[0]->sub_category_id == 16) {
                        if ($dd == 0 && $i == 0) {
                            
                        } else {
                            $discipline_fee = 0;
                        }
                    }
                    ?>
                    <span class="quotation_price setpannel_price_<?= $div_id ?>" id="services_fee_<?= $row_id_cond ?>"><?= $discipline_fee ?></span></b>

                    <span style="display:<?= $add_class == '' ? 'none' : 'block'; ?>" id="tool_trip_<?= $row_id_cond ?>" data-toggle="tooltip" title="<?= $title_error ?>" class="fa fa-info-circle dlt btn btn-xs blue info_bntsp"> </span>

                    <span  remove_id="row_<?= $row_id_cond ?>" class="fa fa-remove remove_session dlt btn btn-xs red"> </span>
                </div> 
            </div>
            <?php
        }
    }
}

function search_employee_name($array) {
    $value = $array['value'];
    $db = load_Database();
    $qry = "SELECT * FROM `employee_details` WHERE employee_name LIKE '%" . $value . "%'";
    $employee = $db->Database->select_qry_array($qry);
    echo json_encode($employee);
}

function numWeekdays($start_ts, $end_ts, $day, $include_start_end = false) {
    $day = strtolower($day);
    $current_ts = $start_ts;
    $days = 0;
    while ($current_ts < $end_ts) {
        if (( $current_ts = strtotime('next ' . $day, $current_ts) ) < $end_ts) {
            $days++;
        }
    }
    if ($include_start_end) {
        if (strtolower(date('l', $start_ts)) == $day) {
            $days++;
        }
        if (strtolower(date('l', $end_ts)) == $day) {
            $days++;
        }
    }
    return (int) $days;
}

function print_time($time = '') {
    $html = '';
    for ($i = 7; $i <= 18; $i++) {
        $h_cond = '';
        $m_cond = '';
        $m_cond1 = '';
        $m_cond2 = '';
        if ($i < 10) {
            $h_cond = '0' . $i . ':00';
            $m_cond1 = '0' . $i . ':15';
            $m_cond = '0' . $i . ':30';
            $m_cond2 = '0' . $i . ':45';
        } else {
            $h_cond = $i . ':00';
            $m_cond1 = $i . ':15';
            $m_cond = $i . ':30';
            $m_cond2 = $i . ':45';
        }
        $m_select = '';
        $h_select = '';
        $m_select1 = '';
        $select2 = '';
        if ($m_cond == $time) {
            $m_select = 'selected="selected"';
        }
        if ($h_cond == $time) {
            $h_select = 'selected="selected"';
        }
        if ($m_cond1 == $time) {
            $m_select1 = 'selected="selected"';
        }
        if ($m_cond2 == $time) {
            $select2 = 'selected="selected"';
        }
        if ($i != 7) {
            $html = $html . '<option ' . $h_select . ' value="' . $h_cond . '">' . $h_cond . '</option>';
            if ($i != 18) {
                $html = $html . '<option ' . $m_select1 . ' value="' . $m_cond1 . '">' . $m_cond1 . '</option>';
            }
        }
        if ($i != 18) {
            $html = $html . '<option ' . $m_select . ' value="' . $m_cond . '">' . $m_cond . ' </option>';
            $html = $html . '<option ' . $select2 . ' value="' . $m_cond2 . '">' . $m_cond2 . '</option>';
        }
    }
    return $html;
}

function get_child_list_by_char($Arr) {
    $value = $Arr['search_value'];
    $db = load_Database();
    $qry = "SELECT * FROM `child_details` WHERE `child_name` LIKE '%" . $value . "%' AND enrolment_status=1";
    $new_Arr = $db->Database->select_qry_array($qry);
    echo json_encode($new_Arr);
}

function addMinutesToTime($time, $plusMinutes) {
    $time = DateTime::createFromFormat('g:i:s', $time);
    $time->add(new DateInterval('PT' . ( (integer) $plusMinutes ) . 'M'));
    $newTime = $time->format('g:i:s');
    return $newTime;
}

function get_partucular_staff_list($array) {
    $db = load_Database();
    $category_id = $array['category_id'];
    $cond = '';
    $price = 0;
    if ($category_id == 5) {
        $cond = "WHERE `disipline_id` LIKE '%$category_id%'";
    }
    $qry_price = "SELECT * FROM `service_details` WHERE `category_id` LIKE '$category_id'";
    $Arr = $db->Database->select_qry_array($qry_price);
    if (count($Arr) > 0) {
        $price = $Arr[0]->fees;
    }
    $qry = "SELECT * FROM `employee_details` $cond  ORDER BY `employee_name` ASC";
    $arrr = $db->Database->select_qry_array($qry);
    $ar_new = [$arrr, $price];
    echo json_encode($ar_new);
}

function search_child_name($array) {
    $value = $array['value'];
    $db = load_Database();
    $qry = "SELECT C.*,P.father_name,P.mother_name,P.father_mobile,P.father_personal_email,P.mother_personal_email FROM `child_details` C LEFT JOIN parent_details P ON P.child_id=C.id WHERE C.`child_name` LIKE '%" . $value . "%' AND C.archive=0";
    $new_Arr = $db->Database->select_qry_array($qry);
    echo json_encode($new_Arr);
}

function update_inactive_child_status($array) {
    $db = load_Database();
    $child_id = $array['child_id'];
    $update_val = $array['update_val'];
    $note_inactive = $_REQUEST['note_inactive'];
    $update = ['archive' => $update_val, 'note_inactive' => $note_inactive];
    $cond = "id=" . $child_id;
    $result = $db->Database->update($cond, $update, 'child_details');
    if ($result > 0) {
        echo '{"status":"success"}';
    } else {
        echo '{"status":"Error"}';
    }
}

function file_upload_by_file_array($array) {
    $six_digit = mt_rand(100000, 999999);
    $destination = $_SERVER['DOCUMENT_ROOT'] . '/sensation/files/images/' . $six_digit . '_' . $_FILES['profile']['name'];
    $json = '';
    $delete_path = $_SERVER['DOCUMENT_ROOT'] . '/sensation/files/images/' . $delete_file_name = $_REQUEST['delete_img'];
    if (is_file($delete_path)) {
        unlink($delete_path);
    }
    if (move_uploaded_file($_FILES['profile']['tmp_name'], $destination)) {
        $json = '{"status":"success","file_name":"' . $six_digit . '_' . $_FILES['profile']['name'] . '","id":"' . $_REQUEST['id'] . '"}';
    } else {
        $json = '{"status":"error","file_name":""}';
    }
    return $json;
}

function upload_therpay_note_pdf($array) {
    $return = file_upload_by_file_array($array);
    echo $return;
}

function upload_user_profile($array) {
    $return = file_upload_by_file_array($array);
    $json = json_decode($return, TRUE);
    $msg = '';
    if ($json['status'] == 'success') {
        $db = load_Database();
        $sesion_arr = get_session_array_value();
        $update = ['image_name' => $json['file_name']];
        $cond = "id=" . $sesion_arr[0]->id;
        $result = $db->Database->update($cond, $update, 'employee_details');
        if ($result) {
            $msg = '{"status":"success"}';
        } else {
            $msg = '{"status":"error"}';
        }
    }
    echo $msg;
}

function upload_admin_profile_image($array) {
    $return = file_upload_by_file_array($array);
    echo $return;
}

function chnage_date_and_time_quotation_details($array) {
    $date = $array['session_date'];
    $start_time = $array['start_time'];
    $end_time = $array['end_time'];
    $staff_id = $array['staff_id'];
    $availity_status = check_availity_employee_status($staff_id, $date, $start_time, $end_time);
    if ($availity_status != '') {
        $json = $availity_status;
    } else {
        $json = '{"status":"available"}';
    }
    echo $json;
}

function check_avality_status_by_employee_arr($employee_arr, $date, $start_time, $end_time) {
    for ($i = 0; $i < count($employee_arr); $i++) {
        $staff_id = $employee_arr[$i]->id;
        $availity_status = check_availity_employee_status($staff_id, $date, $start_time, $end_time);
        if ($availity_status != '') {
            echo $availity_status;
            exit;
        }
    }
}

function check_avality_status_by_json_employee_arr($employee_arr, $date, $start_time, $end_time) {
    for ($i = 0; $i < count($employee_arr); $i++) {
        $staff_id = $employee_arr[$i];
        $availity_status = check_availity_employee_status($staff_id, $date, $start_time, $end_time);
        if ($availity_status != '') {
            echo $availity_status;
            exit;
        }
    }
}

function get_receipt_month_colloction($array) {
    $db = load_Database();
    $year = $array['year'];
    if ($year == '') {
        $year = date('Y');
    }
    if ($year == date('Y')) {
        $month_loop = date("m");
    } else {
        $month_loop = 12;
    }
    $new_ar = array();
    for ($i = 1; $i <= $month_loop; $i++) {
        $qry = "SELECT SUM(pay_amount) AS total FROM `payment_history` WHERE MONTH(`timestamp`)=$i AND  YEAR(`timestamp`)=$year";
        $month_name = getMonthString($i);
        $new_arr = $db->Database->select_qry_array($qry);
        $temp['month_name'] = $month_name;
        if ($new_arr[0]->total == '') {
            $new_arr[0]->total = 0;
        }
        $temp['total'] = $new_arr[0]->total;
        array_push($new_ar, $temp);
    }
    echo json_encode($new_ar);
}

function accept_polycy_procudure($array) {
    $session_arr = get_session_array_value();
    $db = load_Database();
    $data = $array['data'];
    for ($i = 0; $i < count($data); $i++) {
        $insert = [];
        $insert = [
            'staff_id' => $session_arr[0]->id,
            'policy_id' => $data[$i],
            'accept_status' => 1
        ];
        $result = $db->Database->insert('policy_acceptance', $insert);
    }
    if ($result) {
        echo '{"status":"success"}';
    }
}

function delete_polycy_procudure($array) {
    $db = load_Database();
    $policy_id = $array['policy_id'];
    $qry1 = "DELETE FROM `policy_procedure` WHERE `id` = $policy_id";
    $qry2 = "DELETE FROM `policy_acceptance` WHERE `policy_id` = $policy_id";
    $db->Database->delete($qry1);
    $db->Database->delete($qry2);
    echo '{"status":"success"}';
}

function get_accept_status_by_staf_id($staff_id = '', $policy_id = '') {
    $db = load_Database();
    $qry = "SELECT * FROM `policy_acceptance` WHERE `staff_id` = '$staff_id' AND policy_id=$policy_id";
    $new_arr = $db->Database->select_qry_array($qry);
    if (count($new_arr) > 0) {
        return $new_arr[0]->accept_status;
    }
}

function get_quotation_month_colloction($array) {
    $db = load_Database();
    $year = $array['year'];
    if ($year == '') {
        $year = date('Y');
    }
    if ($year == date('Y')) {
        $month_loop = date("m");
    } else {
        $month_loop = 12;
    }
    $new_ar = array();
    for ($i = 1; $i <= $month_loop; $i++) {
        $qry = "SELECT SUM(total) AS total FROM `quotation_details` WHERE MONTH(`timestamp`)=$i AND  YEAR(`timestamp`)=$year";
        $month_name = getMonthString($i);
        $new_arr = $db->Database->select_qry_array($qry);
        $temp['month_name'] = $month_name;
        if ($new_arr[0]->total == '') {
            $new_arr[0]->total = 0;
        }
        $temp['total'] = $new_arr[0]->total;
        array_push($new_ar, $temp);
    }
    echo json_encode($new_ar);
}

function get_header_policy_accept_status() {
    $db = load_Database();
    $session_arr = get_session_array_value();
    $qry1 = "SELECT id FROM  policy_acceptance  WHERE staff_id='" . $session_arr[0]->id . "'";
    $accept_arr = $db->Database->select_qry_array($qry1);
    $count_acpt = count($accept_arr);
    $qry2 = "SELECT id FROM policy_procedure";
    $array2 = $db->Database->select_qry_array($qry2);
    $total_polycy = count($array2);
    $total = $total_polycy - $count_acpt;
    return $total;
}

function send_mail_for_upload_policy() {
    $db = load_Database();
    $qry = "SELECT * FROM employee_details WHERE archive=0 AND id!=17";
    $employee_arr = $db->Database->select_qry_array($qry);
    $messages = '<p>Dear All,</p>
    <p>Please be noted, Sensation Station Policy and Procedure has been updated. Requesting everyone to read and accept the same.</p>
    <p>&nbsp;</p>
    <p>Regards,</p>
    <p>Sensation Station</p>';
    $subject = 'Privacy policy has been updated';
    $email_id = '';

    for ($i = 0; $i < count($employee_arr); $i++) {
        $id = trim($employee_arr[$i]->email);
        $email_id = $email_id . ',' . $id;
    }
    $email_id = substr($email_id, 1);
    $cc = get_admin_email_id();
    send_mail($email_id, $subject, $messages, $file_path = '', $cc);
}

function get_home_page_details($status = '') {
    $value = '';
    $db = load_Database();
    $session_ar = get_session_array_value();
    $today = date('Y-m-d');
    switch ($status) {
        case 'today_collection':
            $qry = "SELECT SUM(pay_amount) AS total FROM `payment_history` WHERE DATE(timestamp)='$today'";
            $new_arr = $db->Database->select_qry_array($qry);
            $value = $new_arr[0]->total == '' ? 0 : $new_arr[0]->total;
            break;
        case 'today_create_new_quotation':
            $qry = "SELECT SUM(total) AS total FROM `quotation_details` WHERE DATE(timestamp)='$today'";
            $new_arr = $db->Database->select_qry_array($qry);
            $value = $new_arr[0]->total == '' ? 0 : $new_arr[0]->total;
            break;
        case 'today_registraction':
            $qry = "SELECT COUNT(id) AS total FROM `child_details` WHERE DATE(timestamp)='$today'";
            $new_arr = $db->Database->select_qry_array($qry);
            $value = $new_arr[0]->total;
            break;
        case 'today_appoinment':
            $qry = "SELECT * FROM `event_schedule_details` WHERE event_date='$today' AND staff_id='" . $session_ar[0]->id . "' GROUP BY `event_id_grp`";
            $new_arr = $db->Database->select_qry_array($qry);
            $value = count($new_arr);
            break;
        case 'total_no_outreach':
            $qry = "SELECT * FROM `child_details` WHERE session_type='Out Reach' AND archive=0";
            $new_arr = $db->Database->select_qry_array($qry);
            $value = count($new_arr);
            break;
        case 'total_no_centre':
            $qry = "SELECT * FROM `child_details` WHERE session_type='Center' AND archive=0";
            $new_arr = $db->Database->select_qry_array($qry);
            $value = count($new_arr);
            break;
        case 'total_no_inactive':
            $qry = "SELECT * FROM `child_details` WHERE archive=1";
            $new_arr = $db->Database->select_qry_array($qry);
            $value = count($new_arr);
            break;
    }
    return $value;
}

function get_employee_arr_by_emp_id($emp_id) {
    $db = load_Database();
    $qry = "SELECT * FROM `employee_details` WHERE id = '" . $emp_id . "'";
    $employee = $db->Database->select_qry_array($qry);
    return $employee[0];
}

function getMonthString($m) {
    if ($m == 1) {
        return "Jan";
    } else if ($m == 2) {
        return "Feb";
    } else if ($m == 3) {
        return "Mar";
    } else if ($m == 4) {
        return "Apr";
    } else if ($m == 5) {
        return "May";
    } else if ($m == 6) {
        return "Jun";
    } else if ($m == 7) {
        return "Jul";
    } else if ($m == 8) {
        return "Aug";
    } else if ($m == 9) {
        return "Sep";
    } else if ($m == 10) {
        return "Oct";
    } else if ($m == 11) {
        return "Nov";
    } else if ($m == 12) {
        return "Dec";
    }
}

function get_dropdown_child_searchbox($id = '', $name = '', $redirurl = '', $class = '') {
    $db = load_Database();
    $qry = "SELECT C.*,P.*,C.id AS child_tbl_id FROM child_details C LEFT JOIN parent_details P ON P.child_id=C.id WHERE C.archive=0 AND C.enrolment_status=1 ORDER BY C.child_name";
    $child_details_all = $db->Database->select_qry_array($qry);
    ?>
    <select <?= $id != '' ? "id=$id" : '' ?> <?= $name != '' ? "name=$name" : '' ?> <?= $redirurl != '' ? "onchange=window.location=(base_url+'" . $redirurl . "/'+this.value)" : '' ?>  class="selectpicker form-control <?= $class ?>" data-live-search="true">
        <option value="">searching for child..</option>
        <?php
        for ($cch = 0; $cch < count($child_details_all); $cch++) {
            $d = $child_details_all[$cch];
            $parent_name = $d->father_name;
            if ($parent_name == '') {
                $parent_name = $d->mother_name;
            }
            ?><option value="<?= $d->child_tbl_id ?>"><?= $d->child_name . ' [ ' . $parent_name . ' ]' ?></option><?php
        }
        ?>
    </select>
    <?php
}

function get_dropdown_employee_searchbox($id = '', $name = '', $redirurl = '', $class = '', $employee_id = '') {
    $db = load_Database();
    $qry = "SELECT * FROM employee_details WHERE archive=0";
    $employee_details_all = $db->Database->select_qry_array($qry);
    ?>
    <select <?= $id != '' ? "id=$id" : '' ?> <?= $name != '' ? "name=$name" : '' ?> <?= $redirurl != '' ? "onchange=window.location=(base_url+'" . $redirurl . "/'+this.value)" : '' ?>  class="selectpicker form-control <?= $class ?>" data-live-search="true">
        <option value="">searching for Employee..</option>
        <?php
        for ($cch = 0; $cch < count($employee_details_all); $cch++) {
            $d = $employee_details_all[$cch];
            $employee_name = $d->employee_name;
            ?><option value="<?= $d->id ?>"><?= $employee_name ?></option><?php
        }
        ?>
    </select>
    <?php
}

function get_country_code_searchbox($id = '', $name = '', $redirurl = '', $class = '', $attr = '', $db_id = '') {
    $db = load_Database();
    $qry = "SELECT * FROM countries WHERE dial_code!='' AND dial_code!=0 ORDER BY dial_code ASC";
    $array_details_all = $db->Database->select_qry_array($qry);
    ?>
    <select <?= $attr ?> <?= $id != '' ? "id=$id" : '' ?> <?= $name != '' ? "name=$name" : '' ?> <?= $redirurl != '' ? "onchange=window.location=(base_url+'" . $redirurl . "/'+this.value)" : '' ?>  class=" form-control <?= $class ?>">
        <option value="">searching for country code..</option>
        <?php
        for ($cch = 0; $cch < count($array_details_all); $cch++) {
            $d = $array_details_all[$cch];
            $disipline_name = $d->dial_code;
            $selected = '';
            if ($db_id == $d->id) {
                $selected = 'selected="selected"';
            }
            ?><option <?= $selected ?> title="<?= $d->country_name ?>" value="<?= $d->id ?>">+<?= $disipline_name ?></option><?php
        }
        ?>
    </select>
    <?php
}

function get_dropdown_disipline_searchbox($id = '', $name = '', $redirurl = '', $class = '', $disipline_id = '') {
    $db = load_Database();
    $qry = "SELECT * FROM disipline_details WHERE archive=0";
    $disipline_details_all = $db->Database->select_qry_array($qry);
    ?>
    <select <?= $id != '' ? "id=$id" : '' ?> <?= $name != '' ? "name=$name" : '' ?> <?= $redirurl != '' ? "onchange=window.location=(base_url+'" . $redirurl . "/'+this.value)" : '' ?>  class="selectpicker form-control <?= $class ?>" data-live-search="true">
        <option value="">searching for disipline..</option>
        <?php
        for ($cch = 0; $cch < count($disipline_details_all); $cch++) {
            $d = $disipline_details_all[$cch];
            $disipline_name = $d->disipline_name;
            ?><option title="<?= $d->description ?>" value="<?= $d->id ?>"><?= $disipline_name ?></option><?php
        }
        ?>
    </select>
    <?php
}

function get_nationality_dropdow($id = '', $name = '', $class = '', $redirurl = '', $nationality_id = '', $attr = '') {
    $db = load_Database();
    $qry = "SELECT * FROM countries ORDER BY country_name";
    $array = $db->Database->select_qry_array($qry);
    ?>
    <select <?= $attr ?> <?= $id != '' ? "id=$id" : '' ?> <?= $name != '' ? "name=$name" : '' ?> <?= $redirurl != '' ? "onchange=window.location=(base_url+'" . $redirurl . "/'+this.value)" : '' ?>  class="selectpicker form-control <?= $class ?>" data-live-search="true">
        <option value="">searching for country..</option>
        <?php
        for ($cch = 0; $cch < count($array); $cch++) {
            $select = '';
            $d = $array[$cch];
            if ($nationality_id == $d->id) {
                $select = 'selected="selected"';
            }
            $country_name = $d->country_name;
            ?><option <?= $select ?> title="<?= $country_name ?>" value="<?= $d->id ?>"><?= $country_name ?></option><?php
        }
        ?>
    </select> <?php
}

function send_quotation_outside_student_registred_student($quotation_details_id = '', $electronic_link_id = '') {
    $db = load_Database();
    $ci = & get_instance();
    $qry = "SELECT Q.*,C.child_name FROM quotation_details Q LEFT JOIN child_details C ON C.id=Q.student_id WHERE Q.quotation_id=$quotation_details_id";
    $array_qty = $db->Database->select_qry_array($qry);
    $child_name = preg_replace('/\s+/', '', $array_qty[0]->child_name);
    $file_name = $child_name . '_' . $array_qty[0]->receipt_no;
    $mail_html = genrate_quotation_html_mail($quotation_details_id, $electronic_link_id);
    $file_path = $_SERVER['DOCUMENT_ROOT'] . '/sensation/receipt_details/' . $file_name . '.pdf';
    $mail_body = receipt_html_body($array_qty[0]->student_id, $electronic_link_id, $quotation_details_id);
    if (is_file($file_path)) {
        unlink($file_path);
    }
    $ci->load->library('pdf');
    $pdf = $ci->pdf->load();
    $pdf->WriteHTML($mail_html);
    $footer_html = receipt_footer_html();
    // $pdf->SetHTMLFooter($footer_html, 'O');
    $pdf->Output($file_path);
    $admin_emial = get_admin_email_id();
    send_mail($mail_body[1], $mail_body[2], $mail_body[0], $file_path, $admin_emial);
}

function view_marketing_filtter($array) {
    extract($array);
    $cond = '';
    if ($from_date != '' && $to_date != '') {
        $cond = $cond . '(DATE(M.entry_date) BETWEEN "' . date('Y-m-d', strtotime($from_date)) . '" AND "' . date('Y-m-d', strtotime($to_date)) . '") AND ';
    } else if ($to_date != '') {
        $cond = $cond . "DATE(M.entry_date) > '" . date('Y-m-d', strtotime($from_date)) . "' AND ";
    }
    if ($designation != '') {
        $cond = $cond . "M.`designation` LIKE '%$designation%' AND ";
    }
    if ($country != '') {
        $cond = $cond . 'M.country="' . $country . '" AND ';
    }
    if ($religion != '') {
        $cond = $cond . 'M.religion="' . $religion . '" AND ';
    }
    if ($here_about_us != '') {
        $cond = $cond . 'M.hear_about_us="' . $here_about_us . '" AND ';
    }
    if ($nature_of_business != '') {
        $cond = $cond . 'M.categories_nature="' . $nature_of_business . '" AND ';
    }
    if ($city != '') {
        $cond = $cond . "M.`city` LIKE '%$city%' AND ";
    }
    if ($cond != '') {
        $cond = 'WHERE ' . $cond;
        $cond = substr($cond, 0, -4);
    }
    if ($cond == '') {
        $cond = 'ORDER BY M.entry_date DESC LIMIT 1000';
    }
    return $cond;
}

function get_hear_about_us_marketing() {
    $hear_About_us = ['1' => 'Referral from School / Nursery', '2' => 'Referral from another Mum / Friend',
        '3' => 'Referral from another Co./Others', '4' => 'Brochure / Flyer', '5' => 'Roll-up Banner / IBG',
        '6' => 'Direct Email', '7' => 'Newsletter', '8' => 'Internet / Social Media', '9' => 'Others'];
    return $hear_About_us;
}

function categories_for_marketing_module() {
    $categories = ['1' => 'Active Client', '2' => 'Waitlisted Client', '3' => 'Inquiry only / Potential Sales Lead', '4' => 'Inactive / Discharged Client', '5' => 'Others', '6' => 'Comment'];
    return $categories;
}

function get_admin_email_id() {
    $admin_email = 'sensationstation123@gmail.com';
    return $admin_email;
}
?>