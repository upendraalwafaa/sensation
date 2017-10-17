<?php
/*
  Project Name : Sensation Sation
  Company Name : alwafaagroup
  Author: Upendra Kumar Prasad
  file Name : enroll_outside_helper.php(Helper)
  Project URI: http://demo.softwarecompany.ae/sensation/
  Description : It's only for out side child registraction
 */
function get_category_show_status_array() {
    $return_ar = [5, 6, 7, 8, 9, 10];
    return $return_ar;
}

function get_category_details($array) {
    $db = load_Database();
    $array_in = implode(',', get_category_show_status_array());
    $qry = "SELECT * FROM `sen_category_details` WHERE id IN($array_in)";
    $cat_array = $db->Database->select_qry_array($qry);
    echo json_encode($cat_array);
}

function get_sub_category_details($array) {
    $category_id = $array['category_id'];
    $db = load_Database();
    $qry = "SELECT S.*,SER.fees FROM `subcategory` S LEFT JOIN service_details SER ON S.id=SER.category_id WHERE S.category_id=$category_id  GROUP BY S.id ";
    $cat_array = $db->Database->select_qry_array($qry);
    echo json_encode($cat_array);
}

function get_staff_details($array) {
    $db = load_Database();
    $qry = "SELECT * FROM `employee_details`";
    $cat_array = $db->Database->select_qry_array($qry);
    echo json_encode($cat_array);
}

function delete_outside_student($json) {
    $db = load_Database();
    $session_det = "DELETE FROM `quotation_details` WHERE `quotation_id` = '" . $json['quotation_id'] . "'";
    $db->Database->delete($session_det);
    $desc_det = "DELETE FROM `quotation_discipline_details` WHERE `quotation_id` = '" . $json['quotation_id'] . "'";
    $db->Database->delete($desc_det);
    $session_det = "DELETE FROM `quotation_session_details` WHERE `quotation_id` = '" . $json['quotation_id'] . "'";
    $db->Database->delete($session_det);
    $session_det = "DELETE FROM `child_details` WHERE `id` = '" . $json['child_id'] . "'";
    $db->Database->delete($session_det);
    $session_det = "DELETE FROM `parent_details` WHERE `child_id` = '" . $json['child_id'] . "'";
    $db->Database->delete($session_det);
}

function delete_camp_reports_student($json) {
    $db = load_Database();
    $session_det = "DELETE FROM `quotation_details` WHERE `quotation_id` = '" . $json['quotation_id'] . "'";
    $db->Database->delete($session_det);
    $desc_det = "DELETE FROM `quotation_discipline_details` WHERE `quotation_id` = '" . $json['quotation_id'] . "'";
    $db->Database->delete($desc_det);
    $session_det = "DELETE FROM `quotation_session_details` WHERE `quotation_id` = '" . $json['quotation_id'] . "'";
    $db->Database->delete($session_det);
}

function get_category_details_with_report($array) {
    $db = load_Database();
    $array_in = implode(',', get_category_show_status_array());
    $qry = "SELECT * FROM `sen_category_details` WHERE id IN($array_in,4)";
    $cat_array = $db->Database->select_qry_array($qry);
    echo json_encode($cat_array);
}
