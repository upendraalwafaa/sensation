<?php

/*
  Project Name : Sensation Sation
  Company Name : alwafaagroup
  Author: Upendra Kumar Prasad, Bibin Mathew, Anfiya M H
  Project URI: http://demo.softwarecompany.ae/sensation/
  File Name  : Home.php
  Date : 16-08-2017
  Description: "Here Home Controller is main controller. And Inside this   controller create function and each function have diffrent        diffrent view files. And we all each function create the my sql   query and we all are loading the view with sql query data.        Example See the Home Controller Function Name (add_employee) and   the same name file in view folder add_employee.php "


 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->Model('Database', '', 'TRUE');
        $reg_form = '';
        if (isset($_REQUEST['json11'])) {
            $json = json_decode($_REQUEST['json11'], true);
            $reg_form = $json['reg_form_outside'];
        }
        if ($reg_form == 'Yes') {
            
        } else {
            is_logged_in();
        }
        date_default_timezone_set('Asia/Dubai');
        $this->load->library('calendar');
    }

    public function index() {
        $qry = "SELECT COUNT(*) as total FROM `employee_details` WHERE archive=0";
        $data['total_emp'] = $this->Database->select_qry_array($qry);
        $qry = "SELECT COUNT(*)  as total FROM `child_details` WHERE archive=0";
        $data['total_child'] = $this->Database->select_qry_array($qry);
        $this->load->view('include/header');
        $this->load->view('index', $data);
        $this->load->view('include/footer');
    }

    public function php_excel() {
        PHPExcel();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel = PHPExcel_IOFactory::load("assets/load_excel.xlsx");
        $objPHPExcel->setActiveSheetIndex(0);
        $rowCount = 2;
        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, 'Upendra ');
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, 'Kumar Prasad Load File');
        $rowCount++;
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        unlink('assets/some_excel_file.xlsx');
        $objWriter->save('assets/some_excel_file.xlsx');
        echo 'File Saved';
    }

    public function see_pdf_html($quotation_id = '', $electronic_link_id = '', $add_receipt = 'Yes') {
        $mail_html = genrate_quotation_html_mail($quotation_id, $electronic_link_id, $add_receipt);

        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->debug = true;
        $pdf->WriteHTML($mail_html);
        $footer_html = receipt_footer_html();
        // $pdf->SetHTMLFooter($footer_html, 'O');
        $pdf->Output();
    }

    public function view_pdf_quotation($quotation_id, $electronic_link_id = 'NA', $add_receipt = '') {
        $electronic_link_id = $electronic_link_id == 'NA' ? '' : $electronic_link_id;
        $mail_html = genrate_quotation_html_mail($quotation_id, $electronic_link_id, $add_receipt);
        echo $mail_html;exit;
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->debug = true;
        $pdf->WriteHTML($mail_html);
        $footer_html = receipt_footer_html();
        // $pdf->SetHTMLFooter($footer_html, 'O');
        $pdf->Output();
    }

    public function upload_file() {
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
        echo $json;
    }

    public function common() {
        $status = $_REQUEST['status'];
        switch ($status) {
            case 'Get_sub_category_list_by_id':
                Get_sub_category_list_by_id($_REQUEST['category_id']);
                break;
            case 'Get Calender':
                $year = $_REQUEST['year'];
                $month = $_REQUEST['month'];
                get_calendar($year, $month);
                break;
            default :
                $_REQUEST['status']($_REQUEST);
        }
    }

    public function receipt_helper() {
        $status = $_REQUEST['status'];
        switch ($status) {
            default :
                $_REQUEST['status']($_REQUEST);
        }
    }

    public function calendar_helper() {
        $status = $_REQUEST['status'];
        switch ($status) {
            default :
                $_REQUEST['status']($_REQUEST);
        }
    }

    public function reg_outside_helper() {
        $status = $_REQUEST['status'];
        switch ($status) {
            default :
                $_REQUEST['status']($_REQUEST);
        }
    }

    public function notification_helper() {
        $status = $_REQUEST['status'];
        switch ($status) {
            default :
                $_REQUEST['status']($_REQUEST);
        }
    }

    public function report_helper() {
        $status = $_REQUEST['status'];
        switch ($status) {
            default :
                $_REQUEST['status']($_REQUEST);
        }
    }

    public function disipline($disipline_id = '') {
        if (isset($_REQUEST['json'])) {
            $json = $_REQUEST['json'];
            $array = json_decode($json, true);
            $disipline_id = $array['disipline_id'];
            unset($array['disipline_id']);

            if ($disipline_id != '') {
                $cond = "id=" . $disipline_id;
                $result = $this->Database->update($cond, $array, 'disipline_details');
            } else {
                $result = $this->Database->insert('disipline_details', $array);
            }
            if ($result) {
                $json = '{"status":"success","last_insert_id":"' . $result . '"}';
            } else {
                $json = '{"status":"Error"}';
            }
            echo $json;
        } else {
            $data['disipline_Arr'] = '';
            if ($disipline_id != '') {
                $qry = "SELECT * FROM `disipline_details` WHERE id=" . $disipline_id;
                $data['disipline_Arr'] = $this->Database->select_qry_array($qry);
            }
            $this->load->view('include/header');
            $this->load->view('add_disipline', $data);
            $this->load->view('include/footer');
        }
    }

    public function view_disipline() {
        $qry = "SELECT * FROM `disipline_details` WHERE archive=0";
        $data['desipline_details'] = $this->Database->select_qry_array($qry);
        $this->load->view('include/header');
        $this->load->view('view_disipline', $data);
        $this->load->view('include/footer');
    }

    public function designation($designation_id = '') {
        if (isset($_REQUEST['json'])) {
            $json = $_REQUEST['json'];
            $array = json_decode($json, true);
            $designation_id = $array['designation_id'];
            unset($array['designation_id']);

            if ($designation_id != '') {
                $cond = "id=" . $designation_id;
                $result = $this->Database->update($cond, $array, 'designation_details');
            } else {
                $result = $this->Database->insert('designation_details', $array);
            }
            if ($result) {
                $json = '{"status":"success","last_insert_id":"' . $result . '"}';
            } else {
                $json = '{"status":"Error"}';
            }
            echo $json;
        } else {
            $data['designation_Arr'] = '';
            if ($designation_id != '') {
                $qry = "SELECT * FROM `designation_details` WHERE id=" . $designation_id;
                $data['designation_Arr'] = $this->Database->select_qry_array($qry);
            }
            $this->load->view('include/header');
            $this->load->view('add_designation', $data);
            $this->load->view('include/footer');
        }
    }

    public function view_designation() {
        $qry = "SELECT * FROM `designation_details` WHERE archive=0";
        $data['designation_details'] = $this->Database->select_qry_array($qry);
        $this->load->view('include/header');
        $this->load->view('view_designation', $data);
        $this->load->view('include/footer');
    }

    public function add_category($category_id = '') {

        if (isset($_REQUEST['json'])) {
            $json = $_REQUEST['json'];
            $array = json_decode($json, true);
            $category_id = $array['category_id'];
            unset($array['category_id']);

            if ($category_id != '') {
                $cond = "id=" . $category_id;
                $result = $this->Database->update($cond, $array, 'sen_category_details');
            } else {
                $result = $this->Database->insert('sen_category_details', $array);
            }
            if ($result) {
                $json = '{"status":"success","last_insert_id":"' . $result . '"}';
            } else {
                $json = '{"status":"Error"}';
            }
            echo $json;
        } else {
            $data['category_Arr'] = '';
            if ($category_id != '') {
                $qry = "SELECT * FROM `sen_category_details` WHERE id=" . $category_id;
                $data['category_Arr'] = $this->Database->select_qry_array($qry);
            }
            $this->load->view('include/header');
            $this->load->view('add_category', $data);
            $this->load->view('include/footer');
        }
    }

    public function view_category() {
        $qry = "SELECT * FROM `sen_category_details` WHERE archive=0";
        $data['category_details'] = $this->Database->select_qry_array($qry);
        $this->load->view('include/header');
        $this->load->view('view_category', $data);
        $this->load->view('include/footer');
    }

    public function add_service($services_id = '') {
        if (isset($_REQUEST['json'])) {
            $json = json_decode($_REQUEST['json'], true);
            if ($json != '') {
                $data = [];
                $data = [
                    'category_id' => $json['services_category'],
                    'sub_category_id' => $json['subcategory'],
                    'disipline' => $json['disipline'],
                    'services_time' => $json['services_time'],
                    'services_time_type' => $json['services_time_type'],
                    'fees' => $json['fees'],
                ];
                $services_id = $json['services_id'];
                if ($services_id == '') {
                    $result = $this->Database->insert('service_details', $data);
                } else {
                    $cond = "id=" . $services_id;
                    $result = $this->Database->update($cond, $data, 'service_details');
                }
                if ($result) {
                    $json = '{"status":"success","last_insert_id":"' . $result . '"}';
                } else {
                    $json = '{"status":"Error"}';
                }
            }
            echo $json;
        } else {
            $data['result_Arr'] = '';
            if ($services_id != '') {
                $qry = "SELECT C.category_name,S.sub_category_name,S.id as sub_category_id,SER.* FROM `service_details` SER LEFT JOIN sen_category_details C ON C.id=SER.`category_id` LEFT JOIN subcategory S ON S.id=SER.`sub_category_id` where SER.id=" . $services_id;
                $arr = $this->Database->select_qry_array($qry);
                $qry = "SELECT * FROM `subcategory` where category_id=" . $arr[0]->category_id;
                $sub_category_arr = $this->Database->select_qry_array($qry);
                $data['subcategory_Arr'] = $sub_category_arr;
                $data['result_Arr'] = $arr;
//                echo '<pre>';
//                print_r($sub_category_arr);
//                print_r($arr);
//                exit;
            }
            $qry = "SELECT * FROM `sen_category_details`";
            $arr1 = $this->Database->select_qry_array($qry);
            $data['category_Arr'] = $arr1;
            $data['desipline_Arr'] = $this->Database->select_qry_array("SELECT * FROM `disipline_details`");
            $this->load->view('include/header');
            $this->load->view('add_service', $data);
            $this->load->view('include/footer');
        }
    }

    public function view_service() {
        $qry = "SELECT C.category_name,S.sub_category_name,SER.*,DiSi.disipline_name FROM `service_details` SER LEFT JOIN sen_category_details C ON C.id=SER.`category_id` LEFT JOIN subcategory S ON S.id=SER.`sub_category_id` LEFT JOIN disipline_details DiSi ON DiSi.id=SER.disipline WHERE SER.archive=0";
        //  $qry = "SELECT C.category_name,S.sub_category_name,SER.* FROM `service_details` SER LEFT JOIN sen_category_details C ON C.id=SER.`category_id` LEFT JOIN subcategory S ON S.id=SER.`sub_category_id`";
        $data['result'] = $this->Database->select_qry_array($qry);
        $this->load->view('include/header');
        $this->load->view('view_service', $data);
        $this->load->view('include/footer');
    }

    public function add_subcategory($subcategory_id = '') {
        if (isset($_REQUEST['json'])) {
            $array = json_decode($_REQUEST['json'], true);
            $data = [
                'category_id' => $array['category'],
                'sub_category_name' => $array['subcategory'],
            ];
            $sub_category_id = $array['sub_category_id'];
            if ($sub_category_id == '') {
                $result = $this->db->insert('subcategory', $data);
            } else {
                $cond = "id=" . $sub_category_id;
                $result = $this->Database->update($cond, $data, 'subcategory');
            }
            if ($result) {
                $json = '{"status":"success","last_insert_id":"' . $result . '"}';
            } else {
                $json = '{"status":"Error"}';
            }
            echo $json;
        } else {
            $data['sub_category_Arr'] = '';
            if ($subcategory_id != '') {
                $qry = "SELECT sub.*,C.category_name FROM `subcategory` sub INNER JOIN sen_category_details C ON C.id=sub.category_id where sub.id=" . $subcategory_id;
                $data['sub_category_Arr'] = $this->Database->select_qry_array($qry);
            }
            $data['categories'] = $this->Database->select_qry_array('SELECT category_name,id FROM  sen_category_details WHERE archive=0');
            $this->load->view('include/header');
            $this->load->view('add_subcategory', $data);
            $this->load->view('include/footer');
        }
    }

    public function view_subcategory() {
        $qry = "SELECT sub.*,C.category_name FROM `subcategory` sub INNER JOIN sen_category_details C ON C.id=sub.category_id WHERE sub.archive=0";
        $data['result'] = $this->Database->select_qry_array($qry);
        $this->load->view('include/header');
        $this->load->view('view_subcategory', $data);
        $this->load->view('include/footer');
    }

    public function add_employee($employee_id = '') {
        if (isset($_REQUEST['json'])) {
            $json = json_decode($_REQUEST['json'], true);
            if ($json != '') {
                $data = [];
                $data = [
                    'employee_name' => $json['employee_name'],
                    'designation_id' => $json['designation_id'],
                    'disipline_id' => $json['disipline_id'],
                    'email' => $json['email'],
                    'staff_access_previlage' => $json['staff_access_previlage'],
                    'finance' => $json['finance'],
                    'basic_client_data' => $json['basic_client_data'],
                    'therapy_notes' => $json['therapy_notes'],
                    'marketing' => $json['marketing'],
                    'registration_form' => $json['registration_form'],
                    'quotation' => $json['quotation'],
                    'electronic_link' => $json['electronic_link'],
                    'receipt' => $json['receipt'],
                    'image_name' => $json['profile_pic'],
                    'archive' => $json['archive'],
                    'date_of_birth' => date('Y-m-d', strtotime($json['date_of_birth'])),
                    'color_id' => $json['color_id'],
                ];
                $employee_id = $json['employee_id'];
                if ($employee_id == '') {
                    $result = $this->Database->insert('employee_details', $data);
                } else {
                    $cond = "id=" . $employee_id;
                    $result = $this->Database->update($cond, $data, 'employee_details');
                }
                if ($result) {
                    $json = '{"status":"success","last_insert_id":"' . $result . '"}';
                } else {
                    $json = '{"status":"Error"}';
                }
                echo $json;
            }
        } else {
            $data['employee_Arr'] = '';
            if ($employee_id != '') {
                $qry = "SELECT * FROM `employee_details` WHERE id=" . $employee_id;
                $data['employee_Arr'] = $this->Database->select_qry_array($qry);
            }
            $qry = "SELECT * FROM `disipline_details` WHERE archive=0";
            $data['disipline_Arr'] = $this->Database->select_qry_array($qry);
            $qry = "SELECT * FROM `designation_details` WHERE archive=0";
            $data['designation_Arr'] = $this->Database->select_qry_array($qry);
            $this->load->view('include/header');
            $this->load->view('add_employee', $data);
            $this->load->view('include/footer');
        }
    }

    public function view_employee() {
        $sql = 'SELECT E.*,D.designation_name FROM `employee_details` E LEFT JOIN designation_details D ON E.`designation_id`=D.id';
        $Emp_arr = $this->Database->select_qry_array($sql);
        $new_Arr = array();
        for ($i = 0; $i < count($Emp_arr); $i++) {
            if ($Emp_arr[$i]->disipline_id == '') {
                $Emp_arr[$i]->disipline_id = 0;
            }
            $qry = "SELECT * FROM `disipline_details` WHERE id IN (" . $Emp_arr[$i]->disipline_id . ")";
            $desciplin = $this->Database->select_qry_array($qry);
            $new_Arr[$i]['emp_details'] = $Emp_arr[$i];
            $new_Arr[$i]['desciplin'] = $desciplin;
        }
        $data['employee_Arr'] = $new_Arr;
        $this->load->view('include/header');
        $this->load->view('view_employee', $data);
        $this->load->view('include/footer');
    }

    public function reg_add($child_id = '') {
        if (isset($_REQUEST['json11'])) {
            $json = json_decode($_REQUEST['json11'], true);
            $last_inser_id = 0;
            $date_of_birth = date('Y-m-d', strtotime($json['date_of_birth']));
            // $updated_electronic_id = $json['e_id'];
            $data = [];
            $data = [
                'child_name' => $json['child_name'],
                'date_of_birth' => $date_of_birth,
                'gender' => $json['child_gender'],
                'address' => $json['address'],
                'address' => $json['address'],
                'emergency_contact_name' => $json['emergency_contact_name'],
                'emergency_contact_number' => $json['emergency_contact_number'],
                'relationship_to_child' => $json['relationship_to_child'],
                'additional_sibling_details' => $json['additional_sibling_details'],
                'illnesses_and_complaints' => $json['illnesses_arr'],
                'other_illnesses' => $json['illnesses_other_details'],
                'baby_six_month_details' => $json['baby_first_six_month'],
                'extra_information_child' => $json['extra_information_child'],
                'session_type' => $json['session_type'],
                'discipline_id' => $json['discipline_id'],
                'school_attinding' => $json['school_attinding'],
                'school_name' => $json['school_name'],
                'form_accept_status' => $json['accept_pt_btn'],
            ];
            $child_id = $json['child_id'];
            if ($child_id == '') {
                $last_inser_id = $this->Database->insert('child_details', $data);
            } else {
                $cond = "id=" . $child_id;
                $this->Database->update($cond, $data, 'child_details');
                $last_inser_id = $child_id;
            }
            $reg_form_outside = $json['reg_form_outside'];
            $quatation_id = $json['quatation_id'];
            if ($reg_form_outside == 'Yes') {
                $arr = [
                    'accept_status' => 'Accept',
                    'electronic_link' => 0
                ];
                $qdel_ar = [
                    'accept_status' => 'Accept',
                    'student_id' => $last_inser_id,
                    'electronic_link' => 0
                ];
                $cond = "quotation_id=" . $quatation_id;
                $this->Database->update($cond, $qdel_ar, 'quotation_details');
                $this->Database->update($cond, $arr, 'quotation_discipline_details');
                $this->Database->update($cond, $arr, 'quotation_session_details');
            }
            $parent_Arr = [];
            $parent_Arr = [
                'child_id' => $last_inser_id,
                'father_name' => $json['father_name'],
                'mother_name' => $json['mother_name'],
                'father_nationality' => $json['father_nationality'],
                'mother_nationality' => $json['mother_nationality'],
                'father_occupation' => $json['father_occupation'],
                'mother_occupation' => $json['mother_occupation'],
                'father_mobile' => $json['father_mobile'],
                'mother_mobile' => $json['mother_mobile'],
                'father_work_number' => $json['father_work_number'],
                'mother_work_number' => $json['mother_work_number'],
                'father_home_number' => $json['father_home_number'],
                'mother_home_number' => $json['mother_home_number'],
                'father_personal_email' => $json['father_email'],
                'mother_personal_email' => $json['mother_email'],
                'marital_status' => $json['father_marital_status'],
                'marital_status_other' => $json['marital_status_other']
            ];

            $prenatal_history = [];
            $prenatal_history = [
                'child_id' => $last_inser_id,
                'mother_father_age' => $json['mother_father_age_deliver_time'],
                'pregnancy_history' => $json['pregnancy_history'],
                'delivery_type' => $json['delivery_type'],
                'comment' => $json['prenatal_history_comment'],
                'apgar_scores' => $json['apgar_scores'],
                'presentation_straight' => $json['presentation_straight'],
            ];

            if ($json['sibling_name'] != '') {
                $sibling_name = explode('~', $json['sibling_name']);
                $sibling_age = explode('~', $json['sibling_age']);
                $sibling_gender = explode('~', $json['sibling_gender']);
                $qry = "DELETE FROM `sibling_details` WHERE child_id='" . $last_inser_id . "'";
                $this->Database->delete($qry);
                for ($i = 0; $i < count($sibling_name); $i++) {
                    $sibling_insert_Arr = [];
                    $sibling_Arr = [
                        'child_id' => $last_inser_id,
                        'sibling_name' => $sibling_name[$i],
                        'age' => $sibling_age[$i],
                        'gender' => $sibling_gender[$i],
                    ];
                    $this->Database->insert('sibling_details', $sibling_Arr);
                }
            }
            if ($json['child_authorisation_name'] != '') {
                $authorisation_name = explode('~', $json['child_authorisation_name']);
                $authorisation_relationship = explode('~', $json['child_authorisation_relationship']);
                $authorisation_mobile = explode('~', $json['child_authorisation_mobile']);
                $authorisation_id_provided = explode('~', $json['child_authorisation_id_provided']);
                $qry = "DELETE FROM `child_authorisation_detail` WHERE child_id='" . $last_inser_id . "'";
                $this->Database->delete($qry);
                for ($i = 0; $i < count($authorisation_name); $i++) {
                    $Arr = [];
                    $Arr = [
                        'child_id' => $last_inser_id,
                        'name' => $authorisation_name[$i],
                        'relationship' => $authorisation_relationship[$i],
                        'mobile' => $authorisation_mobile[$i],
                        'id_card' => $authorisation_id_provided[$i],
                    ];
                    $this->Database->insert('child_authorisation_detail', $Arr);
                }
            }
            $temp_Arr = [];
            $temp_Arr['child_id'] = $last_inser_id;
            if ($json['diagnosis'] == 'Yes') {
                $temp_Arr['diagnosis_desc'] = $json['diagnosis_extra_details'];
            }
            $temp_Arr['diagnosis'] = $json['diagnosis'];
            if ($json['hospitalisation'] == 'Yes') {
                $temp_Arr['hospitalisation_desc'] = $json['hospitalisation_extra_details'];
            }
            $temp_Arr['hospitalisation'] = $json['hospitalisation'];
            if ($json['breastfed'] == 'Yes') {
                $temp_Arr['breastfed_desc'] = $json['breastfed_extra_details'];
            }
            $temp_Arr['breastfed'] = $json['breastfed'];
            if ($json['external_triggers'] == 'Yes') {
                $temp_Arr['external_triggers_desc'] = $json['external_triggers_extra_details'];
            }
            $temp_Arr['external_triggers'] = $json['external_triggers'];
            if ($json['disorders_in_fm'] == 'Yes') {
                $temp_Arr['disorders_in_fm_desc'] = $json['disorders_in_fm_extra_details'];
            }
            $temp_Arr['disorders_in_fm'] = $json['disorders_in_fm'];

            if ($json['child_medication_history'] == 'Yes') {
                $temp_Arr['child_medication_history_desc'] = $json['child_medication_history_extra_details'];
            }
            $temp_Arr['child_medication_history'] = $json['child_medication_history'];
            if ($json['extended_periods'] == 'Yes') {
                $temp_Arr['extended_periods_desc'] = $json['extended_periods_extra_Details'];
            }
            $temp_Arr['extended_periods'] = $json['extended_periods'];



            if ($child_id == '') {
                $this->Database->insert('medical_history', $temp_Arr);
                $this->Database->insert('parent_details', $parent_Arr);
                $this->Database->insert('prenatal_history_details', $prenatal_history);
            } else {
                $cond = "child_id=" . $child_id;
                $mad_arr = $this->Database->select_qry_array("SELECT * FROM `medical_history` WHERE $cond");
                if (count($mad_arr) > 0) {
                    $this->Database->update($cond, $temp_Arr, 'medical_history');
                } else {
                    $this->Database->insert('medical_history', $temp_Arr);
                }

                $parent_arr = $this->Database->select_qry_array("SELECT * FROM `parent_details` WHERE $cond");
                if (count($parent_arr) > 0) {
                    $this->Database->update($cond, $parent_Arr, 'parent_details');
                } else {
                    $this->Database->insert('parent_details', $parent_Arr);
                }

                $prenatal_h = $this->Database->select_qry_array("SELECT * FROM `prenatal_history_details` WHERE $cond");
                if (count($prenatal_h) > 0) {
                    $this->Database->update($cond, $prenatal_history, 'prenatal_history_details');
                } else {
                    $this->Database->insert('prenatal_history_details', $prenatal_history);
                }
            }

            if ($last_inser_id > 0) {
                $json = '{"status":"success","last_insert_id":"' . $last_inser_id . '","child_id":"' . $child_id . '"}';
            } else {
                $json = '{"status":"Error"}';
            }
            echo $json;
        } else {
            $data['parent_details'] = '';
            $data['child_details'] = '';
            $data['authorisation_detail'] = '';
            $data['medical_history'] = '';
            $data['nutrition_details'] = '';
            $data['sibling_details'] = '';
            $data['prenatal_history'] = '';
            $data['e_id'] = '';
            $deactive_date = '';
            $data['elec_details'] = '';
            $data['discipline_details'] = $this->Database->select_qry_array("SELECT * FROM `disipline_details` WHERE archive=0");
            if ($child_id != '') {
                $cond = "WHERE child_id=$child_id";
                $data['parent_details'] = $this->Database->select_qry_array("SELECT * FROM `parent_details` $cond");
                $data['child_details'] = $this->Database->select_qry_array("SELECT * FROM `child_details` WHERE id=$child_id");
                $data['authorisation_detail'] = $this->Database->select_qry_array("SELECT * FROM `child_authorisation_detail` $cond");
                $data['medical_history'] = $this->Database->select_qry_array("SELECT * FROM `medical_history` $cond");
                $data['nutrition_details'] = $this->Database->select_qry_array("SELECT * FROM `nutrition_details` $cond");
                $data['sibling_details'] = $this->Database->select_qry_array("SELECT * FROM `sibling_details` $cond");
                $data['prenatal_history'] = $this->Database->select_qry_array("SELECT * FROM `prenatal_history_details` $cond");
                $data['cancellation_form'] = $this->Database->select_qry_array("SELECT id as cancel_id FROM `cancellation_form` $cond");
            }
            $this->load->view('include/header');
            $this->load->view('reg_add', $data);
            $this->load->view('include/footer');
        }
    }

    public function reg_outsidestudent($quotation_id = '') {
        if (isset($_REQUEST['json'])) {
            $json = json_decode($_REQUEST['json'], true);
            $session_ar = get_session_array_value();
            if ($json != '') {
                $child_ins = [
                    'child_name' => $json['child_name'],
                    'date_of_birth' => date('Y-m-d', strtotime($json['child_birth'])),
                    'gender' => $json['gender'],
                    'school_attinding' => $json['school_attinding'],
                    'session_type' => $json['session_type'],
                    'discipline_id' => $json['dsipline_ar'],
                    'school_name' => $json['school_name'],
                    'enrolment_status' => 1,
                    'outside_school' => 1,
                ];
                if ($json['child_id'] > 0) {
                    $cond = "id='" . $json['child_id'] . "'";
                    $this->Database->update($cond, $child_ins, 'child_details');
                    $child_id = $json['child_id'];
                } else {
                    $child_id = $this->Database->insert('child_details', $child_ins);
                }
                $parent_key = 'father_name';
                if ($json['parent_type'] != 'Father') {
                    $parent_key = 'mother_name';
                }
                $parent_arr = [
                    'child_id' => $child_id,
                    $parent_key => $json['name'],
                    'father_personal_email' => $json['email'],
                    'father_mobile' => $json['phone'],
                ];
                if ($json['child_id'] > 0) {
                    $cond = "child_id='" . $json['child_id'] . "'";
                    $this->Database->update($cond, $parent_arr, 'parent_details');
                } else {
                    $this->Database->insert('parent_details', $parent_arr);
                }
                if ($json['receipt_no'] == '') {
                    $receipt_num = trim(date('dmy') . mt_rand(10000000, 99999999));
                } else {
                    $receipt_num = $json['receipt_no'];
                }
                $qdel_ins = [
                    'receipt_no' => $receipt_num,
                    'student_id' => $child_id,
                    'sub_total' => $json['sub_total'],
                    'discount' => $json['discount'],
                    'total' => $json['total'],
                    'note' => $json['about_sensation'],
                    'date_time' => date('Y-m-d H:i:s'),
                    'accept_status' => 'Accept',
                    'note' => $json['about_sensation'],
                    'updated_by' => $session_ar[0]->id,
                    'outside_school' => 1,
                ];
                if ($json['update_id'] > 0) {
                    $cond = "quotation_id='" . $json['update_id'] . "'";
                    $this->Database->update($cond, $qdel_ins, 'quotation_details');
                    $desc_det = "DELETE FROM `quotation_discipline_details` WHERE `quotation_id` = '" . $json['update_id'] . "'";
                    $this->Database->delete($desc_det);
                    $session_det = "DELETE FROM `quotation_session_details` WHERE `quotation_id` = '" . $json['update_id'] . "'";
                    $this->Database->delete($session_det);
                    $qdel_ins_id = $json['update_id'];
                } else {
                    $qdel_ins_id = $this->Database->insert('quotation_details', $qdel_ins);
                }
                $main_ar = $json['main_ar'];
                for ($ser = 0; $ser < count($main_ar); $ser++) {
                    $d = $main_ar[$ser];
                    $servc_ins = [
                        'quotation_id' => $qdel_ins_id,
                        'category_id' => $d['category_id'],
                        'sub_category_id' => $d['subcategory_id'],
                        'session_type' => 'Multiple',
                        'start_date' => date('Y-m-d', strtotime($d['start_date'])),
                        'end_date' => date('Y-m-d', strtotime($d['end_date'])),
                        'datetime' => date('Y-m-d H:i:s'),
                        'total_price' => $d['amount'],
                        'staff_id' => $d['staff_id'],
                        'accept_status' => 'Accept',
                        'updated_by' => $session_ar[0]->id,
                        'outside_school' => 1,
                    ];
                    $qdescipine_id = $this->Database->insert('quotation_discipline_details', $servc_ins);
                    $qses_insert = [
                        'quotation_id' => $qdel_ins_id,
                        'quotation_discipline_id' => $qdescipine_id,
                        'staff_id' => $d['staff_id'],
                        'session_date' => date('Y-m-d', strtotime($d['start_date'])),
                        'services_fee' => $d['amount'],
                        'datetime' => date('Y-m-d H:i:s'),
                        'accept_status' => 'Accept',
                        'updated_by' => $session_ar[0]->id,
                        'outside_school' => 1,
                    ];
                    $this->Database->insert('quotation_session_details', $qses_insert);
                }
                if ($child_id) {
                    $json = '{"status":"success"}';
                } else {
                    $json = '{"status":"error"}';
                }
                echo $json;
            }
        } else {
            $data['child_details'] = '';
            $data['parent_details'] = '';
            $data['quotation_details'] = '';
            $data['quotation_descipline'] = '';
            if ($quotation_id != '') {
                $quotation_details = $this->Database->select_qry_array("SELECT * FROM quotation_details WHERE quotation_id=$quotation_id");
                $data['quotation_details'] = $quotation_details;
                $student_id = $quotation_details[0]->student_id;
                $quotation_descipline = $this->Database->select_qry_array("SELECT * FROM quotation_discipline_details WHERE quotation_id=$quotation_id");
                $main_array = array();
                $array_in = implode(',', get_category_show_status_array());
                $qrycat = "SELECT * FROM `sen_category_details` WHERE id IN($array_in)";
                $main_array['category'] = $this->Database->select_qry_array($qrycat);
                $qrysubcat = "SELECT * FROM `subcategory` WHERE category_id IN($array_in) AND archive=0";
                $main_array['subcategory'] = $this->Database->select_qry_array($qrysubcat);
                $qryemp = "SELECT * FROM employee_details";
                $main_array['emp_details'] = $this->Database->select_qry_array($qryemp);
                for ($ses = 0; $ses < count($quotation_descipline); $ses++) {
                    $main_array['descipline'][$ses] = $quotation_descipline[$ses];
                }
                $data['quotation_descipline'] = $main_array;
                $data['child_details'] = $this->Database->select_qry_array("SELECT * FROM child_details WHERE id=$student_id");
                $data['parent_details'] = $this->Database->select_qry_array("SELECT * FROM parent_details WHERE child_id=$student_id");
            }
            $data['discipline_details'] = $this->Database->select_qry_array("SELECT * FROM disipline_details WHERE archive=0");
            $this->load->view('include/header');
            $this->load->view('enrollment_outside_child', $data);
            $this->load->view('include/footer');
        }
    }

    public function view_outsidestudent() {
        $qry = "SELECT Q.*,C.child_name,P.father_name FROM quotation_details Q LEFT JOIN parent_details P ON P.child_id=Q.student_id LEFT JOIN child_details C ON Q.student_id=C.id WHERE Q.outside_school=1 ORDER BY Q.timestamp DESC";
        $quotation_details = $this->Database->select_qry_array($qry);
        $main_arr = array();
        for ($i = 0; $i < count($quotation_details); $i++) {
            $p = $quotation_details[$i];
            $main_arr[$i]['quotation'] = $p;
            $quotation_id = $p->quotation_id;
            $qry2 = "SELECT SUM(pay_amount)AS total_paid FROM `payment_history` WHERE quotation_id =$quotation_id";
            $temp_pay = $this->Database->select_qry_array($qry2);
            $main_arr[$i]['total_pay'] = $temp_pay[0]->total_paid;
        }
        $data['quotation_details'] = $main_arr;
        $this->load->view('include/header');
        $this->load->view('view_outsidestudent', $data);
        $this->load->view('include/footer');
    }

    public function check($electronic_link_id = '') {
        if ($electronic_link_id != '') {
            $this->reg_add($electronic_link_id, $child_id = '');
        } else {
            $this->load->view('registration_timeout');
        }
    }

    public function reg_view() {
        $qry = "SELECT C.*,C.id as child_tbl_id,P.* FROM child_details C LEFT JOIN parent_details P ON C.id=P.child_id ORDER BY C.timestamp DESC";
        $child_details = $this->Database->select_qry_array($qry);
        $data['child_Arr'] = $child_details;

        $this->load->view('include/header');
        $this->load->view('reg_view', $data);
        $this->load->view('include/footer');
    }

    public function calendar_view() {
        $data['parent_Arr'] = '';
        $this->load->view('include/header');
        $this->load->view('calender_view', $data);
        $this->load->view('include/footer');
    }

    public function add_quotation($electronic = '', $quotation_id = '') {
        $session_arr = $this->session->userdata('logged_in');
        if (isset($_REQUEST['json'])) {
            $json = json_decode($_REQUEST['json'], true);
            if ($json != '') {
                $electronic_link = $json['electronic_link'];
                $electronic_link_id = 0;
                if ($electronic_link == 1) {
                    $send_date = date('Y-m-d H:i:s');
                    $deactivate_date = date('Y-m-d H:i:s', strtotime('+ 3 days', strtotime($send_date)));
                    $select_parent_type = $json['select_parent_type'];
                    $father_name_t = $json['electronic_name'];
                    $mother_name_t = '';
                    $guardians_name_t = '';
                    if ($select_parent_type == 'Mother') {
                        $mother_name_t = $json['electronic_name'];
                        $father_name_t = '';
                        $guardians_name_t = '';
                    }
                    if ($select_parent_type == 'Guardians') {
                        $mother_name_t = '';
                        $father_name_t = '';
                        $guardians_name_t = $json['electronic_name'];
                    }
                    $electronic_ar = [
                        'guardians_name' => $guardians_name_t,
                        'father_name' => $father_name_t,
                        'mother_name' => $mother_name_t,
                        'child_name' => $json['ele_child_name'],
                        'date_of_birth' => date('Y-m-d', strtotime($json['ele_child_birth'])),
                        'discipline_id' => $json['discipline_id'],
                        'school_attinding' => $json['school_attinding'],
                        'how_u_know' => $json['about_sensation'],
                        'father_email' => $json['electronic_email'],
                        'father_phone' => $json['electronic_phone'],
                        'gender' => $json['elec_gender'],
                        'session_type' => $json['session_type'],
                        'school_name' => $json['school_name'],
                        'send_date' => $send_date,
                        'deactivate_date' => $deactivate_date,
                    ];

                    if ($json['electronic_link_id'] == '') {
                        $electronic_link_id = $this->Database->insert('electronic_mail', $electronic_ar);
                    } else {
                        $cond12 = "id=" . $json['electronic_link_id'];
                        $electronic_ar = [
                            'guardians_name' => $guardians_name_t,
                            'father_name' => $father_name_t,
                            'mother_name' => $mother_name_t,
                            'father_email' => $json['electronic_email'],
                            'father_phone' => $json['electronic_phone'],
                            'child_name' => $json['ele_child_name'],
                            'date_of_birth' => date('Y-m-d', strtotime($json['ele_child_birth'])),
                            'discipline_id' => $json['discipline_id'],
                            'school_attinding' => $json['school_attinding'],
                            'school_name' => $json['school_name'],
                            'how_u_know' => $json['about_sensation'],
                            'gender' => $json['elec_gender'],
                            'session_type' => $json['session_type'],
                        ];
                        $this->Database->update($cond12, $electronic_ar, 'electronic_mail');
                        $electronic_link_id = $json['electronic_link_id'];
                    }
                }
                $data = [];
                $data = [
                    'receipt_no' => $json['receipt_no'],
                    'student_id' => $json['student_id'],
                    'sub_total' => $json['sub_total'],
                    'discount' => $json['discount'],
                    'total' => $json['total'],
                    'note' => $json['note'],
                    'electronic_link' => $electronic_link,
                    'electronic_link_id' => $electronic_link_id,
                    'date_time' => date('Y-m-d H:i:s'),
                    'updated_by' => $session_arr[0]->id,
                ];
                $accept = $json['accept_status'];
                if ($json['quotation_id'] == '') {
                    $quotation_details_id = $this->Database->insert('quotation_details', $data);
                } elseif ($json['quotation_id'] > 0) {
                    $cond = "quotation_id=" . $json['quotation_id'];
                    $this->Database->update($cond, $data, 'quotation_details');
                    $quotation_details_id = $json['quotation_id'];
                    $desciline = "DELETE FROM `quotation_discipline_details` WHERE `quotation_id` = $quotation_details_id";
                    $session_det = "DELETE FROM `quotation_session_details` WHERE `quotation_id` = $quotation_details_id";
                    $this->Database->delete($desciline);
                    $this->Database->delete($session_det);
                }

                /* All Value Inside This key  $json['quotation'] */
                $quotation = $json['quotation'];

                for ($i = 0; $i < count($quotation); $i++) {
                    // print_r($quotation[$i]);
                    $addtional_Arr = [];
                    $addtional_val = $quotation[$i][0];
                    $addtional_Arr = [
                        'quotation_id' => $quotation_details_id,
                        'category_id' => $addtional_val['category_id'],
                        'sub_category_id' => $addtional_val['service_id'],
                        'session_type' => $addtional_val['services_type'],
                        'start_date' => date('Y-m-d', strtotime($addtional_val['start_date'])),
                        'end_date' => date('Y-m-d', strtotime($addtional_val['end_date'])),
                        'datetime' => date('Y-m-d H:i:s'),
                        'total_price' => $addtional_val['total_price'],
                        'accept_status' => $accept,
                        'electronic_link' => $electronic_link,
                        'updated_by' => $session_arr[0]->id,
                    ];
                    $quotation_discipline_id = $this->Database->insert('quotation_discipline_details', $addtional_Arr);
                    $pannel_Ar = $quotation[$i][1];
                    $category_id = $addtional_val['category_id'];
                    if ($category_id == '5' || $category_id == '6' || $category_id == '7' || $category_id == '8' || $category_id == '9' || $category_id == '10') {
                        $strtdate = $addtional_val['start_date'];
                        $dateend = $addtional_val['end_date'];
                        $date1 = date_create($strtdate);
                        $date2 = date_create($dateend);
                        $diff = date_diff($date1, $date2);
                        $total_num_days = $diff->format("%a");
                        $prcise = ($addtional_val['total_price'] / $total_num_days) - 1;
                        for ($dd = 0; $dd <= $total_num_days; $dd++) {
                            $row_insert = [];
                            $row_insert = [
                                'quotation_id' => $quotation_details_id,
                                'quotation_discipline_id' => $quotation_discipline_id,
                                'staff_id' => $addtional_val['staff_id'],
                                'session_date' => date('Y-m-d', strtotime('+' . $dd . ' days', strtotime($strtdate))),
                                'datetime' => date('Y-m-d H:i:s'),
                                'services_fee' => $prcise,
                                'accept_status' => $accept,
                                'electronic_link' => $electronic_link,
                                'updated_by' => $session_arr[0]->id,
                            ];
                            $this->Database->insert('quotation_session_details', $row_insert);
                        }
                    } else {
                        //print_r($pannel_Ar);
                        for ($pn = 0; $pn < count($pannel_Ar); $pn++) {
                            //print_r($pannel_Ar[$pn]);
                            $row_Arr = $pannel_Ar[$pn];
                            for ($row = 0; $row < count($row_Arr); $row++) {
                                ///  print_r($row_Arr[$row]);
                                $temp = $row_Arr[$row];
                                $row_insert = [];
                                $row_insert = [
                                    'quotation_id' => $quotation_details_id,
                                    'quotation_discipline_id' => $quotation_discipline_id,
                                    'discipline_type_id' => $temp['services_displine_id'],
                                    'service_id' => $temp['services_id'],
                                    'staff_id' => $temp['staff_id'],
                                    'session_date' => date('Y-m-d', strtotime($temp['session_date'])),
                                    'start_time' => date('H:i', strtotime($temp['start_time'])),
                                    'end_time' => date('H:i', strtotime($temp['end_time'])),
                                    'services_fee' => $temp['services_fee'],
                                    'datetime' => date('Y-m-d H:i:s'),
                                    'accept_status' => $accept,
                                    'electronic_link' => $electronic_link,
                                ];
                                $this->Database->insert('quotation_session_details', $row_insert);
                            }
                        }
                    }
                }


                if ($json['mail_status'] == 'Yes') {
                    send_quotation_outside_student_registred_student($quotation_details_id, $electronic_link_id);
                }
                if ($quotation_details_id >= 0) {
                    $json = '{"status":"success","last_insert_id":"' . $quotation_details_id . '"}';
                } else {
                    $json = '{"status":"Error"}';
                }
                echo $json;
            }
        } else {
            $data['send_electronic'] = '';
            $data['electronic_mail'] = '';
            $data['child_arr'] = '';
            $data['quotation_details'] = '';
            $data['all_staff_list'] = '';
            $data['main_arr'] = '';
            $data['discipline_details'] = $this->Database->select_qry_array("SELECT * FROM disipline_details WHERE archive=0");
            $data['category_details'] = $this->Database->select_qry_array("SELECT * FROM sen_category_details");
            $data['sub_category_details'] = $this->Database->select_qry_array("SELECT * FROM subcategory");
            if ($this->uri->segment(3) == 'add_electronic' || $this->uri->segment(3) > 0) {
                $data['send_electronic'] = 'Yes';
            }

            $main_Arr = array();
            if ($quotation_id != '') {
                if ($electronic != 0) {
                    $qryelc = "SELECT * FROM `electronic_mail` WHERE id=$electronic";
                    $electronic_link_arr = $this->Database->select_qry_array($qryelc);
                    $data['electronic_mail'] = $electronic_link_arr;
                }
                $data['all_staff_list'] = $this->Database->select_qry_array('SELECT * FROM `employee_details`');
                $qry = "SELECT * FROM `quotation_details` WHERE quotation_id='" . $quotation_id . "'";
                $quotation_details = $this->Database->select_qry_array($qry);
                $data['quotation_details'] = $quotation_details;
                $data['excess_amount'] = get_excess_amount_by_student_id($quotation_details[0]->student_id);
                $qry2 = "SELECT * FROM `quotation_discipline_details` WHERE quotation_id='" . $quotation_id . "'";
                $sess_Arr = $this->Database->select_qry_array($qry2);
                $child_q = "SELECT C.*,C.id AS child_id,P.* FROM `child_details` C LEFT JOIN parent_details P ON C.id=P.child_id WHERE C.id=" . $quotation_details[0]->student_id;
                $chils_arr = $this->Database->select_qry_array($child_q);
                $data['child_arr'] = $chils_arr;
                for ($i = 0; $i < count($sess_Arr); $i++) {
                    $tmp = $sess_Arr[$i];
                    $sub_cat = $tmp->sub_category_id;
                    $cat_id = $tmp->category_id;
                    $main_Arr[$i]['additional'] = $tmp;
                    $ser_q = "SELECT S.*,DI.disipline_name FROM `service_details` S LEFT JOIN disipline_details DI ON S.disipline=DI.id WHERE `sub_category_id` =" . $sub_cat . " GROUP BY DI.disipline_name";
                    $arr = $this->Database->select_qry_array($ser_q);

                    $main_Arr[$i]['all_descipline'] = $arr;
                    $grp_se = "SELECT * FROM `quotation_session_details` WHERE `quotation_id`=$quotation_id AND quotation_discipline_id=$tmp->id GROUP BY service_id";
                    $arr = $this->Database->select_qry_array($grp_se);

                    for ($t = 0; $t < count($arr); $t++) {
                        $session_id = $arr[$t]->service_id;
                        $discpline_id = $arr[$t]->discipline_type_id;
                        $main_Arr[$i]['services_details'][$t]['services'] = $arr[$t];
                        $qry_sess = "SELECT * FROM `quotation_session_details` WHERE `quotation_discipline_id` = $tmp->id AND `service_id` = $session_id";
                        $sessArr = $this->Database->select_qry_array($qry_sess);
                        $main_Arr[$i]['services_details'][$t]['session'] = $sessArr;
                        $staffqry = "SELECT * FROM `employee_details` WHERE disipline_id LIKE '%" . $discpline_id . "%'";
                        $staff_list = $this->Database->select_qry_array($staffqry);
                        $main_Arr[$i]['services_details'][$t]['staff_list'] = $staff_list;
                        $ser_q_with_g = "SELECT S.*,DI.disipline_name,DI.description,DI.id AS disipline_id FROM `service_details` S LEFT JOIN disipline_details DI ON S.disipline=DI.id WHERE `sub_category_id` ='" . $sub_cat . "' AND disipline= $discpline_id";
                        $ser_q_with_g_arr = $this->Database->select_qry_array($ser_q_with_g);
                        $main_Arr[$i]['services_details'][$t]['discipline_details'] = $ser_q_with_g_arr;
                    }
                }
                $data['main_arr'] = $main_Arr;
            }
            $this->load->view('include/header');
            $this->load->view('add_quotation', $data);
            $this->load->view('include/footer');
        }
    }

    public function save_calender_event() {
        if (isset($_REQUEST['json'])) {
            $json = json_decode($_REQUEST['json'], true);
            $jsonecho = '';
            $session_ar = get_session_array_value();
            if ($json != '') {
                $insert_id = '';
                $staff_arr = $json['staff_arr'];
                if ($json['delete_id'] != '') {
                    $del_qry = "DELETE FROM `event_schedule_details` WHERE `event_id_grp` = '" . $json['delete_id'] . "'";
                    $this->Database->delete($del_qry);
                }
                $dStart = new DateTime($json['start_date']);
                $dEnd = new DateTime($json['end_date']);
                $diff = date_diff($dStart, $dEnd);
                $diffdate = $diff->format("%R%a");
                $eventselect_days = explode(',', $json['eventselect_days']);
                if ($json['event_add_me'] == 'Yes') {
                    for ($i = 0; $i <= ($diffdate); $i++) {
                        $date = date('Y-m-d', strtotime("+ $i day", strtotime($json['start_date'])));
                        $days_name = date('D', strtotime($date));
                        if (in_array($days_name, $eventselect_days)) {
                            check_avality_status_by_json_employee_arr([$session_ar[0]->id], $date, $json['start_time'], $json['end_time']);
                        }
                    }
                }
                if ($staff_arr == 'All') {
                    $qry = "SELECT * FROM `employee_details` WHERE id!='" . $session_ar[0]->id . "' AND archive=0";
                    $employee_ar = $this->Database->select_qry_array($qry);
                    for ($i = 0; $i <= ($diffdate); $i++) {
                        $date = date('Y-m-d', strtotime("+ $i day", strtotime($json['start_date'])));
                        $days_name = date('D', strtotime($date));
                        if (in_array($days_name, $eventselect_days)) {
                            check_avality_status_by_employee_arr($employee_ar, $date, $json['start_time'], $json['end_time']);
                        }
                    }
                    for ($dd = 0; $dd <= ($diffdate); $dd++) {
                        $date = date('Y-m-d', strtotime("+ $dd day", strtotime($json['start_date'])));
                        $days_name = date('D', strtotime($date));
                        if (in_array($days_name, $eventselect_days)) {
                            for ($i = 0; $i < count($employee_ar); $i++) {
                                $emp_id = $employee_ar[$i]->id;
                                $insert_id = insert_query_event_details($json, $emp_id, $date);
                            }
                        }
                    }
                } else {
                    $staff_ar = explode(',', $staff_arr);

                    for ($i = 0; $i <= ($diffdate); $i++) {
                        $date = date('Y-m-d', strtotime("+ $i day", strtotime($json['start_date'])));
                        $days_name = date('D', strtotime($date));
                        if (in_array($days_name, $eventselect_days)) {
                            check_avality_status_by_json_employee_arr($staff_ar, $date, $json['start_time'], $json['end_time']);
                        }
                    }
                    for ($dd = 0; $dd <= ($diffdate); $dd++) {
                        $date = date('Y-m-d', strtotime("+ $dd day", strtotime($json['start_date'])));
                        $days_name = date('D', strtotime($date));
                        if (in_array($days_name, $eventselect_days)) {
                            for ($i = 0; $i < count($staff_ar); $i++) {
                                $emp_id = $staff_ar[$i];
                                $insert_id = insert_query_event_details($json, $emp_id, $date);
                            }
                        }
                    }
                }
                if ($json['event_add_me'] == 'Yes') {
                    for ($i = 0; $i <= ($diffdate); $i++) {
                        $date = date('Y-m-d', strtotime("+ $i day", strtotime($json['start_date'])));
                        $days_name = date('D', strtotime($date));
                        if (in_array($days_name, $eventselect_days)) {
                            $insert_id = insert_query_event_details($json, $session_ar[0]->id, $date);
                        }
                    }
                }
                if ($insert_id) {
                    $jsonecho = '{"status":"success","last_insert_id":"' . $insert_id . '"}';
                } else {
                    $jsonecho = '{"status":"Error"}';
                }
                echo $jsonecho;
            }
        }
    }

    public function view_quotation($child_id = '') {
        $limit = 300;
        $hide_data = 0;
        if (isset($_REQUEST['prev']) || isset($_REQUEST['next'])) {
            $offset = $_REQUEST['offset'];
            if (isset($_REQUEST['prev'])) {
                $offset--;
            }
            if (isset($_REQUEST['next'])) {
                $offset++;
            }
            $hide_data = $limit * $offset;
        } else {
            $offset = 0;
        }
        $data['offset'] = $offset;
        $cond_q = '';
        if ($child_id != '') {
            $cond_q = "AND Q.student_id=$child_id";
        }
        $qry = "SELECT Q.*,C.child_name FROM `quotation_details` Q LEFT JOIN child_details C ON Q.student_id=C.id WHERE Q.electronic_link=0 AND  Q.camp_reports=0 AND Q.outside_school=0 $cond_q  ORDER BY Q.timestamp DESC LIMIT $hide_data, $limit";
        $data['quotation_details'] = $this->Database->select_qry_array($qry);
        $this->load->view('include/header');
        $this->load->view('view_quotation', $data);
        $this->load->view('include/footer');
    }

    public function add_campreports($quotation_id = '') {
        if (isset($_REQUEST['json'])) {
            $json = json_decode($_REQUEST['json'], true);
            $session_ar = get_session_array_value();
            if ($json != '') {
                if ($json['receipt_no'] == '') {
                    $receipt_num = trim(date('dmy') . mt_rand(10000000, 99999999));
                } else {
                    $receipt_num = $json['receipt_no'];
                }
                $qdel_ins = [
                    'receipt_no' => $receipt_num,
                    'student_id' => $json['child_id'],
                    'sub_total' => $json['sub_total'],
                    'discount' => $json['discount'],
                    'total' => $json['total'],
                    'note' => $json['about_sensation'],
                    'date_time' => date('Y-m-d H:i:s'),
                    'accept_status' => 'Accept',
                    'updated_by' => $session_ar[0]->id,
                    'camp_reports' => 1,
                ];
                if ($json['update_id'] > 0) {
                    $cond = "quotation_id='" . $json['update_id'] . "'";
                    $this->Database->update($cond, $qdel_ins, 'quotation_details');
                    $desc_det = "DELETE FROM `quotation_discipline_details` WHERE `quotation_id` = '" . $json['update_id'] . "'";
                    $this->Database->delete($desc_det);
                    $session_det = "DELETE FROM `quotation_session_details` WHERE `quotation_id` = '" . $json['update_id'] . "'";
                    $this->Database->delete($session_det);
                    $qdel_ins_id = $json['update_id'];
                } else {
                    $qdel_ins_id = $this->Database->insert('quotation_details', $qdel_ins);
                }
                $main_ar = $json['main_ar'];
                for ($ser = 0; $ser < count($main_ar); $ser++) {
                    $d = $main_ar[$ser];
                    $servc_ins = [
                        'quotation_id' => $qdel_ins_id,
                        'category_id' => $d['category_id'],
                        'sub_category_id' => $d['subcategory_id'],
                        'session_type' => 'Multiple',
                        'start_date' => date('Y-m-d', strtotime($d['start_date'])),
                        'end_date' => date('Y-m-d', strtotime($d['end_date'])),
                        'datetime' => date('Y-m-d H:i:s'),
                        'total_price' => $d['amount'],
                        'staff_id' => $d['staff_id'],
                        'accept_status' => 'Accept',
                        'updated_by' => $session_ar[0]->id,
                        'camp_reports' => 1,
                    ];
                    $qdescipine_id = $this->Database->insert('quotation_discipline_details', $servc_ins);
                    $qses_insert = [
                        'quotation_id' => $qdel_ins_id,
                        'quotation_discipline_id' => $qdescipine_id,
                        'staff_id' => $d['staff_id'],
                        'session_date' => date('Y-m-d', strtotime($d['start_date'])),
                        'services_fee' => $d['amount'],
                        'datetime' => date('Y-m-d H:i:s'),
                        'accept_status' => 'Accept',
                        'updated_by' => $session_ar[0]->id,
                        'camp_reports' => 1,
                    ];
                    $this->Database->insert('quotation_session_details', $qses_insert);
                }
                if ($qdel_ins_id) {
                    send_quotation_outside_student_registred_student($qdel_ins_id, $electronic_link_id = '');
                    $json = '{"status":"success"}';
                } else {
                    $json = '{"status":"error"}';
                }
                echo $json;
            }
        } else {
            $data['child_details'] = '';
            $data['parent_details'] = '';
            $data['quotation_details'] = '';
            $data['quotation_descipline'] = '';
            if ($quotation_id != '') {
                $quotation_details = $this->Database->select_qry_array("SELECT * FROM quotation_details WHERE quotation_id=$quotation_id");
                $data['quotation_details'] = $quotation_details;
                $student_id = $quotation_details[0]->student_id;
                $quotation_descipline = $this->Database->select_qry_array("SELECT * FROM quotation_discipline_details WHERE quotation_id=$quotation_id");
                $main_array = array();
                $array_in = implode(',', get_category_show_status_array());
                $qrycat = "SELECT * FROM `sen_category_details` WHERE id IN($array_in)";
                $main_array['category'] = $this->Database->select_qry_array($qrycat);
                $qrysubcat = "SELECT * FROM `subcategory` WHERE category_id IN($array_in) AND archive=0";
                $main_array['subcategory'] = $this->Database->select_qry_array($qrysubcat);
                $qryemp = "SELECT * FROM employee_details";
                $main_array['emp_details'] = $this->Database->select_qry_array($qryemp);
                for ($ses = 0; $ses < count($quotation_descipline); $ses++) {
                    $main_array['descipline'][$ses] = $quotation_descipline[$ses];
                }
                $data['quotation_descipline'] = $main_array;
                $data['child_details'] = $this->Database->select_qry_array("SELECT * FROM child_details WHERE id=$student_id");
                $data['parent_details'] = $this->Database->select_qry_array("SELECT * FROM parent_details WHERE child_id=$student_id");
            }
            $data['discipline_details'] = $this->Database->select_qry_array("SELECT * FROM disipline_details WHERE archive=0");
            $this->load->view('include/header');
            $this->load->view('add_campreports', $data);
            $this->load->view('include/footer');
        }
    }

    public function view_camp_reports() {
        $qry = "SELECT Q.*,C.child_name,P.father_name FROM quotation_details Q LEFT JOIN parent_details P ON P.child_id=Q.student_id LEFT JOIN child_details C ON Q.student_id=C.id WHERE Q.camp_reports=1 ORDER BY Q.timestamp DESC";
        $quotation_details = $this->Database->select_qry_array($qry);
        $main_arr = array();
        for ($i = 0; $i < count($quotation_details); $i++) {
            $p = $quotation_details[$i];
            $main_arr[$i]['quotation'] = $p;
            $quotation_id = $p->quotation_id;
            $qry2 = "SELECT SUM(pay_amount)AS total_paid FROM `payment_history` WHERE quotation_id =$quotation_id";
            $temp_pay = $this->Database->select_qry_array($qry2);
            $main_arr[$i]['total_pay'] = $temp_pay[0]->total_paid;
        }
        $data['quotation_details'] = $main_arr;
        $this->load->view('include/header');
        $this->load->view('view_camp_reports', $data);
        $this->load->view('include/footer');
    }

    public function create_receipt($child_id = 'NA', $quotation_id = '') {
        $data['receipt_details'] = '';
        $data['child_id_quotation'] = '';
        if ($child_id != 'NA') {
            $qry = "SELECT Q.*,E.employee_name,C.child_name FROM `quotation_details` Q LEFT JOIN child_details C ON C.id=Q.student_id LEFT JOIN employee_details E ON E.id=Q.`student_id` WHERE Q.accept_status='Accept' AND Q.`student_id` = $child_id ORDER BY Q.timestamp DESC";
            $quotation_detaisl = $this->Database->select_qry_array($qry);
            $main_ar = array();
            for ($i = 0; $i < count($quotation_detaisl); $i++) {
                $quotation_idtmp = $quotation_detaisl[$i]->quotation_id;
                $main_ar[$i]['quotation'] = $quotation_detaisl[$i];
                $qry1 = "SELECT SUM(`pay_amount`) AS total_pay FROM `payment_history` WHERE  quotation_id=" . $quotation_detaisl[$i]->quotation_id;
                $pay_amount = $this->Database->select_qry_array($qry1);
                $main_ar[$i]['payed_amt'] = $pay_amount[0]->total_pay;
                $main_ar[$i]['cancelled_ses'] = total_cancelled_session($quotation_idtmp);

                $main_ar[$i]['cash_refund'] = total_refund_cash_amount_by_quotation($quotation_idtmp);
                $main_ar[$i]['refund_excess_amt'] = total_refund_excess_amount_by_quotation($quotation_idtmp);
            }

            if (empty($main_ar)) {
                $child_name = '';
                $prev_excess_amount = 0;
            } else {
                $child_name = $quotation_detaisl[0]->child_name;
                $prev_excess_amount = get_prev_excess_amount_by_student_id($child_id, $quotation_idtmp);
            }
            $data['child_id_quotation'] = $main_ar;
            $data['child_name'] = $child_name;
            $data['excess_amount'] = $prev_excess_amount;
        }
        if ($quotation_id != '') {
            $qry = "SELECT QS.*,D.disipline_name,E.employee_name,C.child_name,Q.student_id,Q.receipt_no FROM `quotation_session_details` QS LEFT JOIN quotation_details Q ON Q.quotation_id=QS.quotation_id LEFT JOIN child_details C ON C.id=Q.student_id  LEFT JOIN employee_details E ON E.id=QS.staff_id LEFT JOIN disipline_details D ON D.id=QS.discipline_type_id WHERE QS.quotation_id=$quotation_id AND QS.completion_status!=11";
            $qry1 = "SELECT * FROM quotation_details WHERE quotation_id=" . $quotation_id;
            $quotation_ar = $this->Database->select_qry_array($qry1);

            $data['quotation_details'] = $quotation_ar;
            $session_details = $this->Database->select_qry_array($qry);

            if (count($session_details) == 0) {
                redirect(base_url() . 'Home/create_receipt/' . $quotation_ar[0]->student_id);
            }
            $payment_mode_q = "SELECT * FROM `payment_history` WHERE `quotation_id` = $quotation_id GROUP BY paid_by";
            $payment_mode = $this->Database->select_qry_array($payment_mode_q);
            $data['payment_mode'] = $payment_mode;
            $data['receipt_details'] = $session_details;
            $child_id = $session_details[0]->student_id;

            $data['excess_amount'] = get_prev_excess_amount_by_student_id($child_id, $quotation_id);
            $data['previous_pay'] = get_current_receipt_paid_amount($quotation_id);
        }
        ////////////////////////////     working on Refundable amount disbled if payment is greater
//        echo '<pre>';
//        print_r($data);
//        echo '<pre>';
//        exit;
        $this->load->view('include/header');
        $this->load->view('create_receipt', $data);
        $this->load->view('include/footer');
    }

    public function electronic_quotation_details() {
        $data = [];
        //$query = "SELECT E.*,Q.* FROM `electronic_mail` E LEFT JOIN quotation_details Q ON Q.electronic_link_id=E.id";
        $query = "SELECT E.*,Q.*,CD.enrolment_status FROM `electronic_mail` E LEFT JOIN quotation_details Q ON Q.electronic_link_id=E.id LEFT JOIN child_details CD ON CD.id=Q.student_id ORDER BY E.timestamp DESC";
        $data['results'] = $this->Database->select_qry_array($query);
        $this->load->view('include/header');
        $this->load->view('electronic_link_details', $data);
        $this->load->view('include/footer');
    }

    public function view_child_details($child_id = '') {
        $data['main_arr'] = '';
        if ($child_id != '') {
            $qry = "SELECT Q.*,C.child_name FROM `quotation_details` Q LEFT JOIN child_details C ON C.id=Q.student_id  WHERE Q.`accept_status` LIKE 'Accept' AND Q.student_id=$child_id ORDER BY Q.`timestamp` DESC";
            $quotation_details = $this->Database->select_qry_array($qry);

            $main_array = array();
            for ($q = 0; $q < count($quotation_details); $q++) {
                $quotation_id = $quotation_details[$q]->quotation_id;
                $qry1 = "SELECT COUNT(id) AS total_session FROM `quotation_session_details`  WHERE quotation_id=" . $quotation_id;
                $qry2 = "SELECT SUM(pay_amount)AS total_paid FROM `payment_history` WHERE quotation_id =$quotation_id";
                $qry3 = "SELECT * FROM `payment_history` WHERE quotation_id =$quotation_id";
                $qry4 = "SELECT Q.*,C.category_name,S.sub_category_name FROM `quotation_discipline_details` Q LEFT JOIN sen_category_details C ON C.id=Q.category_id LEFT JOIN subcategory S ON Q.category_id=S.category_id AND S.id=Q.sub_category_id WHERE Q.quotation_id =$quotation_id";

                $discilpine_ar = array();
                $q_discilpine_Ar = $this->Database->select_qry_array($qry4);
                for ($dd = 0; $dd < count($q_discilpine_Ar); $dd++) {
                    $discilpine_ar[$dd]['discipline_tbl'] = $q_discilpine_Ar[$dd];
                    $id = $q_discilpine_Ar[$dd]->id;
                    $qry5 = "SELECT S.*,D.disipline_name,EM.employee_name FROM `quotation_session_details` S LEFT JOIN disipline_details D ON S.discipline_type_id=D.id LEFT JOIN employee_details EM ON EM.id=S.staff_id  WHERE S.quotation_discipline_id =$id";
                    $discilpine_ar[$dd]['session'] = $this->Database->select_qry_array($qry5);
                }
                $qry6 = "SELECT R.*,E.employee_name FROM `refund_excess_amount_details` R LEFT JOIN employee_details E ON E.id=updated_by WHERE R.quotation_id =$quotation_id";
                $main_array[$q]['ses_details'] = $discilpine_ar;
                $main_array[$q]['quotation_details'] = $quotation_details[$q];
                $main_array[$q]['quotation_total_session'] = $this->Database->select_qry_array($qry1);
                $main_array[$q]['paid_total'] = $this->Database->select_qry_array($qry2);
                $main_array[$q]['payment_history'] = $this->Database->select_qry_array($qry3);
                $main_array[$q]['refund_excess_amount_details'] = $this->Database->select_qry_array($qry6);
            }
            $quotation_idtmp = '';
            if (empty($main_array)) {
                $excval = 0;
            } else {
                $excval = excess_and_due_amount_formate_details($child_id);
            }
            $data['main_arr'] = $main_array;
            $data['excess_amount'] = $excval;
        }
        $this->load->view('include/header');
        $this->load->view('view_child_details', $data);
        $this->load->view('include/footer');
    }

    public function my_profile() {
        $data['logged_in'] = $this->session->userdata('logged_in');
        $this->load->view('include/header');
        $this->load->view('my_profile', $data);
        $this->load->view('include/footer');
    }

    public function marketing_reports() {
        $data['reports_marketing'] = '';
        if (isset($_REQUEST['marketing_genrate_report'])) {
            extract($_REQUEST);
            $cond = '';
            if ($start_date != '' && $end_date != '') {
                $cond = $cond . '(DATE(timestamp) BETWEEN "' . date('Y-m-d', strtotime($start_date)) . '" AND "' . date('Y-m-d', strtotime($end_date)) . '") AND ';
            } else if ($start_date != '') {
                $cond = $cond . "DATE(timestamp) > '" . date('Y-m-d', strtotime($start_date)) . "' AND ";
            }

            if ($search_type == 'Caseloads' || $search_type == '') {
                $cond = $cond . 'archive=0 OR archive=1';
            }

            if ($search_type == 'Active') {
                $cond = $cond . 'archive=0';
            }

            if ($search_type == 'Out Reach') {
                $cond = $cond . 'session_type="' . $search_type . '" AND archive=0';
            }

            if ($search_type == 'Center') {
                $cond = $cond . 'session_type="' . $search_type . '" AND archive=0';
            }
            if ($search_type == 'Inactive') {
                $cond = $cond . 'archive=1';
            }

            if ($cond != '' || $search_type != '') {
                $cond = 'WHERE ' . $cond;
            }


            $qry = "SELECT * FROM child_details LEFT JOIN parent_details ON child_details.id=parent_details.child_id  $cond";

            $array_new = $this->Database->select_qry_array($qry);
            $data['reports_marketing'] = $array_new;
        }


        $this->load->view('include/header');
        $this->load->view('marketing_reports', $data);
        $this->load->view('include/footer');
    }

    public function create_reports() {
        $data['therapy_data'] = '';
        $data['registration_data'] = '';
        $data['form_quot_data'] = '';
        $data['quot_data'] = '';
        $data['form_data_receipt'] = '';
        $data['receipt_data'] = '';
        $data['form_data_capi'] = '';
        $data['data_capi'] = '';
        if (isset($_REQUEST['theray_genrate_report'])) {
            extract($_REQUEST);
            $cond = '';
            if ($start_date != '' && $end_date != '') {
                $cond = $cond . '(DATE(TH.timestamp) BETWEEN "' . date('Y-m-d', strtotime($start_date)) . '" AND "' . date('Y-m-d', strtotime($end_date)) . '") AND ';
            } else if ($start_date != '') {
                $cond = $cond . "DATE(TH.timestamp) > '" . date('Y-m-d', strtotime($start_date)) . "' AND ";
            }
            if ($staff_id != '') {
                $cond = $cond . 'TH.t_staff="' . $staff_id . '" AND ';
            }
            if ($child_id != '') {
                $cond = $cond . 'TH.t_child_id="' . $child_id . '" AND ';
            }
            if ($search_type != '') {
                $cond = $cond . 'TH.t_status="' . $search_type . '" AND ';
            }
            if ($cond != '') {
                $cond = 'WHERE ' . $cond;
                $cond = substr($cond, 0, -4);
            }
            if ($cond == '') {
                $cond = 'ORDER BY TH.timestamp DESC LIMIT 1000';
            }

            $qry = "SELECT TH.*,C.child_name,Q.receipt_no FROM therapy_note TH LEFT JOIN child_details C ON C.id=TH.t_child_id LEFT JOIN quotation_details Q ON Q.quotation_id=TH.t_quotation_id  $cond";

            $array_new = $this->Database->select_qry_array($qry);
            $data['therapy_data'] = $array_new;
        }
        $emp_q = "SELECT * FROM employee_details WHERE archive=0";
        $ch_q = "SELECT * FROM child_details WHERE archive=0";
        $data['employee_details'] = $this->Database->select_qry_array($emp_q);
        $data['child_details'] = $this->Database->select_qry_array($ch_q);
        $this->load->view('include/header');
        $this->load->view('report_types', $data);
        $this->load->view('include/footer');
    }

    public function report_types() {
        $ch_q = "SELECT * FROM disipline_details WHERE archive=0";
        $data['disipline_details'] = $this->Database->select_qry_array($ch_q);
        $data['therapy_data'] = '';
        $data['registration_data'] = '';
        $data['form_quot_data'] = '';
        $data['quot_data'] = '';
        $data['form_data_receipt'] = '';
        $data['receipt_data'] = '';
        $data['form_data_capi'] = '';
        $data['data_capi'] = '';
        $this->load->view('include/header');
        $this->load->view('report_types', $data);
        $this->load->view('include/footer');
    }

    public function registration_reports() {
        $data['therapy_data'] = '';
        $data['registration_data'] = '';
        $data['form_quot_data'] = '';
        $data['receipt_data'] = '';
        $data['form_data_receipt'] = '';
        $data['form_data_capi'] = '';
        $data['data_capi'] = '';
        if (isset($_REQUEST['registraction_genrate_report'])) {
            $cond = '';
            $start_date = $_REQUEST['start_date'];
            $end_date = $_REQUEST['end_date'];
            $discipline = $_REQUEST['discipline'];
            if ($start_date != '' && $end_date != '') {
                $cond = $cond . '(DATE(C.timestamp) BETWEEN "' . date('Y-m-d', strtotime($start_date)) . '" AND "' . date('Y-m-d', strtotime($end_date)) . '") AND ';
            } else if ($start_date != '') {
                $cond = $cond . "DATE(C.timestamp)
                > '" . date('Y-m-d', strtotime($start_date)) . "' AND ";
            }
            if ($discipline != '') {
                $cond = $cond . "C.discipline_id LIKE '%$discipline%' AND ";
            }
            if ($cond != '') {
                $cond = 'WHERE ' . $cond;
                $cond = substr($cond, 0, -4);
            }
            $qry = "SELECT C.*,P.* FROM `child_details` C LEFT JOIN parent_details P ON P.child_id=C.id   $cond";
            $array_new = $this->Database->select_qry_array($qry);
            $data['registration_data'] = $array_new;
        }
        $ch_q = "SELECT * FROM disipline_details WHERE archive=0";
        $data['disipline_details'] = $this->Database->select_qry_array($ch_q);
        $this->load->view('include/header');
        $this->load->view('report_types', $data);
        $this->load->view('include/footer');
    }

    public function quotation_reports() {
        $data['therapy_data'] = '';
        $data['registration_data'] = '';
        $data['form_quot_data'] = '';
        $data['quot_data'] = '';
        $data['receipt_data'] = '';
        $data['form_data_receipt'] = '';
        $data['form_data_capi'] = '';
        $data['data_capi'] = '';
        if (isset($_REQUEST['genrate_report'])) {
            $arr = get_quotation_report_array($_REQUEST);
            $data['quot_data'] = $arr['main_arr'];
            $data['total_amount'] = $arr['total_amount'];
            $data['total_quo'] = $arr['total_quo'];
            $data['form_quot_data'] = $_REQUEST;
        }
        $data['child_details'] = $this->Database->select_qry_array("SELECT * FROM child_details");
        $data['employee_details'] = $this->Database->select_qry_array("SELECT * FROM employee_details");

        $this->load->view('include/header');
        $this->load->view('report_types', $data);
        $this->load->view('include/footer');
    }

    public function capacity_reports() {
        $data['therapy_data'] = '';
        $data['registration_data'] = '';
        $data['form_quot_data'] = '';
        $data['quot_data'] = '';
        $data['receipt_data'] = '';
        $data['form_data_receipt'] = '';
        $data['form_data_capi'] = '';
        $data['data_capi'] = '';
        if (isset($_REQUEST['genrate_report'])) {
            $array = get_capacity_reports_array($_REQUEST);
            $data['data_capi'] = $array['array_new'];
            $data['form_data_capi'] = $array['form_data'];
            $data['total_h'] = $array['total_hourse'];
        }
        $data['employee_details'] = $this->Database->select_qry_array("SELECT * FROM employee_details");
        $this->load->view('include/header');
        $this->load->view('report_types', $data);
        $this->load->view('include/footer');
    }

    public function receipt_reports() {
        $data['therapy_data'] = '';
        $data['registration_data'] = '';
        $data['form_quot_data'] = '';
        $data['quot_data'] = '';
        $data['receipt_data'] = '';
        $data['form_data_receipt'] = '';
        $data['form_data_capi'] = '';
        $data['data_capi'] = '';
        if (isset($_REQUEST['genrate_report'])) {
            $array = get_receipt_reports_array($_REQUEST);
            $data['receipt_data'] = $array['array_new'];
            $data['form_data_receipt'] = $array['form_data'];
        }
        $data['child_details'] = $this->Database->select_qry_array("SELECT * FROM child_details");
        $data['employee_details'] = $this->Database->select_qry_array("SELECT * FROM employee_details");
        $this->load->view('include/header');
        $this->load->view('report_types', $data);
        $this->load->view('include/footer');
    }

    public function change_password() {
        if (isset($_REQUEST['json'])) {
            $json = json_decode($_REQUEST['json'], true);
            if ($json != '') {
                $msg = '';
                $session_ar = get_session_array_value();
                $old_password = md5($json['old_password']);

                if ($old_password == $session_ar[0]->password) {
                    $binfo = ['password' => md5($json['new_password'])];
                    $cond = "id=" . $session_ar[0]->id;
                    $result = $this->Database->update($cond, $binfo, 'employee_details');
                    $msg = '{"status":"success","message":"Password updated successfully"}';
                } else {
                    $msg = '{"status":"error","message":"Invalid old password"}';
                }
                echo $msg;
            }
        } else {
            $this->load->view('include/header');
            $this->load->view('change_password');
            $this->load->view('include/footer');
        }
    }

    public function add_therapy_note($therapy_id = '') {

        $this->load->view('include/header');
        $data['logged_in'] = $this->session->userdata('logged_in');
        $this->load->view('add_therapy_note', $data);
        $this->load->view('include/footer');
    }

    public function view_consent_form($ch_id = "") {
        $ch_id = $this->uri->segment(3);
        $up_id = $this->uri->segment(4);
        if (isset($_REQUEST['json'])) {
            $json = json_decode($_REQUEST['json'], true);
            $accept_date = date('Y-m-d', strtotime($json['accept_date']));
            $chid = $json['child_id'];
            $update_id = $json['consent_form_id'];
            $enrolment_status = $json['enrolment_status'];
            $data = [];
            $data = [
                'child_id' => $json['child_id'],
                'other_prof_work_child' => $json['pro_working_clild'],
                'school_detatails_approv' => $json['child_school'],
                'medical_prof_share' => $json['medical_pro'],
                'involved_child_care' => $json['child_involved'],
                'share_details_happ_or_not' => $json['share_details_happ_or_not'],
                'perm_photographs' => $json['perm_photographs'],
                'perm_to_use_images' => $json['perm_to_use_images'],
                'volunteers_to_observe' => $json['volunteers_to_observe'],
                'parent_name' => $json['father_name'],
                'accept' => $json['consent_accept'],
                'accept_date' => $accept_date
            ];
            if ($update_id == '') {
                $this->Database->insert('consent_form', $data);
                $json = '{"status":"success","child_id":"' . $chid . '","enrolment_status":"' . $enrolment_status . '"}';
                echo $json;
            } else {
                $cond = "id='$update_id'";
                $data = $data;
                $this->Database->update($cond, $data, 'consent_form');
                $json = '{"status":"success","child_id":"' . $chid . '","enrolment_status":"' . $enrolment_status . '"}';
                echo $json;
            }
        } else {
            if ($ch_id != '') {
                $qry = "SELECT CH.id as CH_id,CH.enrolment_status,CH.child_name,PR.father_name,CF.id as update_id,CF.* FROM `child_details` as CH LEFT JOIN parent_details as PR ON CH.id=PR.child_id LEFT JOIN consent_form as CF ON CF.child_id=CH.id WHERE CH.id=" . $ch_id;
                $data['consent_form_details'] = $this->Database->select_qry_array($qry);

                $this->load->view('include/header');
                $this->load->view('consent_form', $data);
                $this->load->view('include/footer');
            }
        }
    }

    public function cancellation_form($ch_id = "") {
        $ch_id = $this->uri->segment(3);
        $up_id = $this->uri->segment(4);
        if (isset($_REQUEST['json'])) {
            $json = json_decode($_REQUEST['json'], true);
            $accept_date = date('Y-m-d', strtotime($json['accept_date']));
            $chid = $json['child_id'];
            $update_id = $json['cancel_form_id'];
            $data = [];
            $data = [
                'child_id' => $chid,
                'parent_name' => $json['father_name'],
                'accept' => $json['cancel_accept'],
                'accept_date' => $accept_date
            ];
            if ($update_id == '') {
                $this->Database->insert('cancellation_form', $data);
                $json = '{"status":"success","child_id":"' . $chid . '"}';
                echo $json;
            } else {
                $cond = "id='$update_id'";
                $data = $data;
                $this->Database->update($cond, $data, 'cancellation_form');
                $json = '{"status":"success","child_id":"' . $chid . '"}';
                echo $json;
            }
        } else {
            if ($ch_id != '') {
                $qry = "SELECT CH.id as CH_id,CH.child_name,PR.father_name,CAF.id as update_id,CAF.* FROM `child_details` as CH LEFT JOIN parent_details as PR ON CH.id=PR.child_id LEFT JOIN cancellation_form as CAF ON CAF.child_id=CH.id WHERE CH.id=" . $ch_id;
                $data['child_details'] = $this->Database->select_qry_array($qry);

                $this->load->view('include/header');
                $this->load->view('cancellation_form', $data);
                $this->load->view('include/footer');
            }
        }
    }

    public function terms_condition_outreach($ch_id = "") {
        $ch_id = $this->uri->segment(3);
        $up_id = $this->uri->segment(4);
        if (isset($_REQUEST['json'])) {
            $json = json_decode($_REQUEST['json'], true);
            $accept_date = date('Y-m-d', strtotime($json['accept_date']));
            $chid = $json['child_id'];
            $update_id = $json['outeach_form_id'];
            $data = [];
            $data = [
                'child_id' => $chid,
                'parent_name' => $json['father_name'],
                'accept' => $json['outeach_form_accept'],
                'accept_date' => $accept_date
            ];

            if ($update_id == '') {
                $this->Database->insert('terms_condition_outreach', $data);
                $json = '{"status":"success","child_id":"' . $chid . '"}';
                echo $json;
            } else {
                $cond = "id='$update_id'";
                $data = $data;
                $this->Database->update($cond, $data, 'terms_condition_outreach');
                $json = '{"status":"success","child_id":"' . $chid . '"}';
                echo $json;
            }
        } else {

            if ($ch_id != '') {
                $qry = "SELECT CH.id as CH_id,CH.child_name,PR.father_name,TCO.id as update_id,TCO.* FROM `child_details` as CH LEFT JOIN parent_details as PR ON CH.id=PR.child_id LEFT JOIN terms_condition_outreach as TCO ON TCO.child_id=CH.id WHERE CH.id=" . $ch_id;
                $data['child_details'] = $this->Database->select_qry_array($qry);

                $this->load->view('include/header');
                $this->load->view('terms_condition_outreach', $data);
                $this->load->view('include/footer');
            }
        }
    }

    public function terms_condition_center($ch_id = "") {
        $ch_id = $this->uri->segment(3);
        $up_id = $this->uri->segment(4);
        if (isset($_REQUEST['json'])) {
            $json = json_decode($_REQUEST['json'], true);
            $accept_date = date('Y-m-d', strtotime($json['accept_date']));
            $chid = $json['child_id'];
            $update_id = $json['condition_center_form_id'];


            $data = [];
            $data = [
                'child_id' => $chid,
                'parent_name' => $json['father_name'],
                'accept' => $json['condition_center_form_accept'],
                'accept_date' => $accept_date
            ];

            if ($update_id == '') {
                $this->Database->insert('terms_condition_center_session', $data);
                $json = '{"status":"success","child_id":"' . $chid . '"}';
                echo $json;
            } else {
                $cond = "id='$update_id'";
                $data = $data;
                $this->Database->update($cond, $data, 'terms_condition_center_session');
                $json = '{"status":"success","child_id":"' . $chid . '"}';
                echo $json;
            }
        } else {

            if ($ch_id != '') {
                $qry = "SELECT CH.id as CH_id,CH.child_name,PR.father_name,TCCS.id as update_id,TCCS.* FROM `child_details` as CH LEFT JOIN parent_details as PR ON CH.id=PR.child_id LEFT JOIN terms_condition_center_session as TCCS ON TCCS.child_id=CH.id WHERE CH.id=" . $ch_id;
                $data['child_details'] = $this->Database->select_qry_array($qry);
                $this->load->view('include/header');
                $this->load->view('terms_condition_center', $data);
                $this->load->view('include/footer');
            }
        }
    }

    public function therapy_history($ch_id = "") {
        $ch_id = $this->uri->segment(3);
        $up_id = $this->uri->segment(4);
        if (isset($_REQUEST['json'])) {
            $json = json_decode($_REQUEST['json'], true);
            $chid = $json['child_id'];
            $update_id = $json['therapy_case_history_id'];
            $data = [];
            $data = [
                'child_id' => $chid,
                'date_of_birth' => $json['dob'],
                'school' => $json['school'],
                'therapists' => $json['therapists'],
                'main_parental_concerns' => $json['main_parental_concerns'],
                'family_history' => $json['family_history'],
                'review_registration_form' => $json['review_registration_form'],
                'review_registration_form_details' => $json['review_registration_form_details'],
                'child_hearing_tested' => $json['child_hearing_tested'],
                'child_hearing_tested_date' => $json['child_hearing_tested_date'],
                'child_eyesight_tested' => $json['child_eyesight_tested'],
                'child_eyesight_tested_date' => $json['child_eyesight_tested_date'],
                'outcome_hearing_test' => $json['outcome_hearing_test'],
                'outcome_eye_test' => $json['outcome_eye_test'],
                'therapies_assessments' => $json['therapies_assessments'],
                'age_in_years_months' => $json['age_in_years_months'],
                'sat_unsupported' => $json['sat_unsupported'],
                'crawled' => $json['crawled'],
                'how' => $json['how'],
                'walked_unsupported' => $json['walked_unsupported'],
                'walking_backwards' => $json['walking_backwards'],
                'jumped' => $json['jumped'],
                'bicycle' => $json['bicycle'],
                'independently_activities' => $json['independently_activities'],
                'gross_motor' => $json['gross_motor'],
                'fine_motor' => $json['fine_motor'],
                'feeding' => $json['feeding'],
                'toileting' => $json['toileting'],
                'grooming' => $json['grooming'],
                'dressing' => $json['dressing'],
                'bathing' => $json['bathing'],
                'separation_issues' => $json['separation_issues'],
                'sensory_processing' => $json['sensory_processing'],
                'any_other_difficulties' => $json['any_other_difficulties'],
                'presentation_nursery_school' => $json['presentation_nursery_school'],
                'presentation_home' => $json['presentation_home'],
                'babble' => $json['babble'],
                'say_first_words' => $json['say_first_words'],
                'put_words_together' => $json['put_words_together'],
                'speak_longer_sentences' => $json['speak_longer_sentences'],
                'home_language' => $json['home_language'],
                'other_languages' => $json['other_languages'],
                'expressive_language' => $json['expressive_language'],
                'receptive_language' => $json['receptive_language'],
                'speech_articulation' => $json['speech_articulation'],
                'playing_alongside' => $json['playing_alongside'],
                'any_behavioral_issues' => $json['any_behavioral_issues'],
                'any_other_relevant_information' => $json['any_other_relevant_information']
            ];
            /* Naturation details start */
            $nutrition_Arr = [];
            $nutrition_Arr['child_id'] = $chid;
            if ($json['gluten_free'] == 'Yes') {
                $nutrition_Arr['gluten_free_duration'] = $json['gluten_free_duration'];
            }
            $nutrition_Arr['gluten_free'] = $json['gluten_free'];

            if ($json['dairy_free'] == 'Yes') {
                $nutrition_Arr['dairy_free_duration'] = $json['dairy_free_duration'];
            }
            $nutrition_Arr['dairy_free'] = $json['dairy_free'];

            if ($json['casein_free'] == 'Yes') {
                $nutrition_Arr['casein_free_duration'] = $json['casein_free_duration'];
            }
            $nutrition_Arr['casein_free'] = $json['casein_free'];

            if ($json['soya_free'] == 'Yes') {
                $nutrition_Arr['soya_free_duration'] = $json['soya_free_duration'];
            }
            $nutrition_Arr['soya_free'] = $json['soya_free'];

            if ($json['phenol_free'] == 'Yes') {
                $nutrition_Arr['phenol_free_duration'] = $json['phenol_free_duration'];
            }
            $nutrition_Arr['phenol_free'] = $json['phenol_free'];

            if ($json['nutrition_other_specify'] == 'Yes') {
                $nutrition_Arr['other_specify_duration'] = $json['nutrition_other_specify_duration'];
            }
            $nutrition_Arr['other_specify'] = $json['nutrition_other_specify'];
            $nutrition_h_a = $this->Database->select_qry_array("SELECT * FROM `nutrition_details` WHERE child_id=$chid");
            if (count($nutrition_h_a) > 0) {
                $cond = "child_id=$chid";
                $this->Database->update($cond, $nutrition_Arr, 'nutrition_details');
            } else {
                $this->Database->insert('nutrition_details', $nutrition_Arr);
            }
            /* Naturation details end */
            if ($update_id == '') {
                $this->Database->insert('therapy_case_history_form', $data);
                $json = '{"status":"success","child_id":"' . $chid . '"}';
                echo $json;
            } else {
                $cond = "id='$update_id'";
                $data = $data;
                $this->Database->update($cond, $data, 'therapy_case_history_form');
                $json = '{"status":"success","child_id":"' . $chid . '"}';
                echo $json;
            }
        } else {
            $data['nutrition_details'] = '';
            if ($ch_id != '') {
                $qry = "SELECT CH.id as CH_id,CH.child_name,CH.date_of_birth as dob,PR.father_name,TCHF.id as update_id,TCHF.* FROM `child_details` as CH LEFT JOIN parent_details as PR ON CH.id=PR.child_id LEFT JOIN therapy_case_history_form as TCHF ON TCHF.child_id=CH.id WHERE CH.id=" . $ch_id;
                $data['child_details'] = $this->Database->select_qry_array($qry);
                $data['nutrition_details'] = $this->Database->select_qry_array("SELECT * FROM `nutrition_details` WHERE child_id=$ch_id");

                $this->load->view('include/header');
                $this->load->view('therapy_history', $data);
                $this->load->view('include/footer');
            }
        }
    }

    public function vacation_req() {
        $this->load->view('include/header');
        $this->load->view('vacation_req');
        $this->load->view('include/footer');
    }

    /*
     * Therapy Notes Section 
     * Author : Bibin
     * Starts Here
     */

    public function list_therapy_notes($id = "") {
        if (!empty($id)) {
            $data['logged_in'] = $this->session->userdata('logged_in');
            $staff_id = $data['logged_in'][0]->id;

            $qry1 = " SELECT * FROM `child_details` WHERE id =" . $id;
            $qry2 = "SELECT * FROM `parent_details` WHERE child_id =" . $id;
            $qry3 = "SELECT Q.quotation_id,Q.student_id,Q.erp_register_no,Q.receipt_no,Q.timestamp,QD.id as qd_id, QD.quotation_id as qd_id, SUBQ.sub_category_name,CAT.category_name,COUNT(QSES.id) AS tot_ses, COUNT(
                CASE WHEN 
                   QSES.completion_status = 1 
                OR QSES.completion_status = 2 
                OR QSES.completion_status = 3
                OR QSES.completion_status = 4
                OR QSES.completion_status = 5
                OR QSES.completion_status = 6
                OR QSES.completion_status = 7
                THEN 1 END) as completed_ses,
            SUM(CASE
                WHEN QSES.completion_status = 1 || QSES.completion_status = 2 || QSES.completion_status = 5 || QSES.completion_status = 6 THEN 1 ELSE 0 END) AS 'cancl_sess' FROM `quotation_details` Q LEFT JOIN quotation_discipline_details QD ON Q.quotation_id=QD.quotation_id LEFT JOIN subcategory SUBQ ON QD.category_id= SUBQ.category_id AND QD.sub_category_id=SUBQ.id LEFT JOIN sen_category_details CAT ON CAT.id=QD.category_id LEFT JOIN quotation_session_details QSES ON QSES.quotation_discipline_id=QD.id WHERE Q.accept_status='Accept' AND Q.student_id=" . $id . " GROUP BY Q.quotation_id ORDER BY Q.timestamp DESC";

            $qry4 = "SELECT THN.t_id,Q.quotation_id,THN.t_session_id FROM `therapy_note` as THN LEFT JOIN quotation_details as Q ON Q.quotation_id=THN.t_quotation_id   WHERE THN.t_therapy_note='' and THN.t_child_id=" . $id;

            $qry5 = "SELECT Q.quotation_id,QSD.id FROM `quotation_session_details` as QSD LEFT JOIN quotation_details as Q ON Q.quotation_id=QSD.quotation_id WHERE Q.student_id=" . $id . " AND QSD.staff_id=" . $staff_id . " AND (QSD.completion_status=0 OR QSD.completion_status=9 OR QSD.completion_status=8) GROUP BY Q.quotation_id";

            $qry6 = "SELECT external_triggers_desc,disorders_in_fm_desc FROM `medical_history` WHERE child_id =" . $id;

            $data['child_details']['information'] = $this->Database->select_qry_array($qry1);
            $data['child_details']['parent_information'] = $this->Database->select_qry_array($qry2);
            $data['child_details']['quatation_details'] = $this->Database->select_qry_array($qry3);
            $data['child_details']['therapy_notes'] = $this->Database->select_qry_array($qry4);
            $data['child_details']['q_sessions'] = $this->Database->select_qry_array($qry5);
            $data['child_details']['allergies'] = $this->Database->select_qry_array($qry6);
            // echo "<pre>";            
            // print_r($data['child_details']['q_sessions']);
            // exit;

            $this->load->view('include/header');
            $this->load->view('view_therapy_notes', $data);
            $this->load->view('include/footer');
        } else {
            $this->load->view('include/header');
            $this->load->view('view_therapy_notes');
            $this->load->view('include/footer');
        }
    }

    public function therapy_session_note($sid = "") {
        $session_arr = $this->session->userdata('logged_in');
        if (isset($_REQUEST['therapy'])) {

            $logged_in = $this->session->userdata('logged_in');
            $therapy = json_decode($_REQUEST['therapy'], true);
            $tnid = $therapy['session_therpay_note_id'];
            $qt_session_fee = $therapy['recei_session_fee'];
            $child = $therapy['recei_child_id'];
            $therapy['recei_therapy_note'] = $_REQUEST['note'];
            $data = [];
            $data = [
                't_child_id' => $therapy['recei_child_id'],
                't_quotation_id' => $therapy['recei_no'],
                't_session_id' => $therapy['recei_session_no'],
                't_staff' => $logged_in[0]->id,
                't_staff_name' => $logged_in[0]->employee_name,
                't_created_date' => $therapy['recei_session_date'],
                't_session_start_time' => $therapy['recei_session_start_time'],
                't_session_end_time' => $therapy['recei_session_end_time'],
                't_rescheduled_date' => $therapy['recei_rescheduled_date'],
                't_rescheduled_start_time' => $therapy['recei_rescheduled_session_time_start'],
                't_rescheduled_end_time' => $therapy['recei_rescheduled_session_time_end'],
                't_therapy_note' => $therapy['recei_therapy_note'],
                't_services' => $therapy['recei_disiplines'],
                't_status' => $therapy['recei_status'],
                't_permission_to_view' => $therapy['therapist'],
                't_note_pdf' => $therapy['therapy_note_pdf'],
            ];

            $qtno = $therapy['recei_no'];
            if ($therapy['recei_status'] == 2) {
                $refund = $qt_session_fee / 2;
            } elseif ($therapy['recei_status'] == 5) {
                $refund = $qt_session_fee;
            } elseif ($therapy['recei_status'] == 6) {
                $refund = $qt_session_fee;
            } elseif ($therapy['recei_status'] == 8) {
                $refund = $qt_session_fee;
            } elseif ($therapy['recei_status'] == 9) {
                $refund = $qt_session_fee;
            } else {
                $refund = '';
            }
            $s_d = $therapy['recei_session_no'];
            $t_status = $therapy['recei_status'];
            if ($tnid != '') {

                $tsql = "SELECT `t_therapy_note` FROM `therapy_note` WHERE t_id=" . $tnid;
                $therapy_note = $this->Database->select_qry_array($tsql);
                $t_note = $therapy_note[0]->t_therapy_note;

                if (empty($t_note)) {
                    $cond = "t_id=" . $tnid;
                    $updata = [];
                    $updata = [
                        't_therapy_note' => $therapy['recei_therapy_note'],
                        't_note_pdf' => $therapy['therapy_note_pdf'],
                        't_permission_to_view' => $therapy['therapist'],
                        't_staff' => $logged_in[0]->employee_name
                    ];
                    $result = $this->Database->update($cond, $updata, 'therapy_note');
                } else {

                    $cond = "t_id=" . $tnid;
                    $Ldata = [];
                    $Ldata = [
                        't_permission_to_view' => $therapy['therapist'],
                    ];

                    $result = $this->Database->update($cond, $Ldata, 'therapy_note');
                    $tdata = [];
                    $tdata = [
                        'therapy_id' => $tnid,
                        'therapy_note' => $therapy['recei_therapy_note'],
                        'therapy_status' => $therapy['recei_status'],
                        'edited_by' => $session_arr[0]->id,
                        'therapy_note_pdf' => $therapy['therapy_note_pdf']
                    ];
                    $result = $this->Database->insert('therapy_note_history', $tdata);
                }
                $qsdata = [];
                $qsdata = [
                    'completion_status' => $t_status
                ];
                $cond = "id=" . $s_d;
                $result = $this->Database->update($cond, $qsdata, 'quotation_session_details');
                $json = '{"status":"success","ch_id":"' . $child . '"}';
            } else {

                $insdata = [];
                $insdata = [
                    't_child_id' => $therapy['recei_child_id'],
                    't_quotation_id' => $therapy['recei_no'],
                    't_session_id' => $therapy['recei_session_no'],
                    't_staff' => $logged_in[0]->id,
                    't_staff_name' => $logged_in[0]->employee_name,
                    't_created_date' => $therapy['recei_session_date'],
                    't_session_start_time' => $therapy['recei_session_start_time'],
                    't_session_end_time' => $therapy['recei_session_end_time'],
                    't_rescheduled_date' => $therapy['recei_rescheduled_date'],
                    't_rescheduled_start_time' => $therapy['recei_rescheduled_session_time_start'],
                    't_rescheduled_end_time' => $therapy['recei_rescheduled_session_time_end'],
                    't_therapy_note' => $therapy['recei_therapy_note'],
                    't_services' => $therapy['recei_disiplines'],
                    't_status' => $therapy['recei_status'],
                    't_permission_to_view' => $therapy['therapist'],
                    't_note_pdf' => $therapy['therapy_note_pdf'],
                    't_note_update_time' => date('Y-m-d H:i:s'),
                ];


                $result = $this->Database->insert('therapy_note', $insdata);
                if ($result) {
                    $reschedule_date = $therapy['recei_rescheduled_date'];
                    $reschedule_start_time = $therapy['recei_rescheduled_session_time_start'];
                    $reschedule_end_time = $therapy['recei_rescheduled_session_time_end'];

                    if ($t_status == 10) {
                        $data = [];
                        $data = [
                            'session_date' => $reschedule_date,
                            'start_time' => $reschedule_start_time,
                            'end_time' => $reschedule_end_time,
                            'completion_status' => $t_status
                        ];
                    } elseif ($t_status == 2) {

                        $subsql = "SELECT sub_total,discount,total FROM `quotation_details` WHERE quotation_id =" . $therapy['recei_no'];
                        $data['quotation_amt_details'] = $this->Database->select_qry_array($subsql);

                        $subt = $data['quotation_amt_details'][0]->sub_total;
                        $disc = $data['quotation_amt_details'][0]->discount;
                        $total = $data['quotation_amt_details'][0]->total;
                        $sub_total = (int) $subt - $refund;
                        $total = (int) $sub_total - (int) $disc;
                        $amt = [];
                        $amt = [
                            'sub_total' => $sub_total,
                            'total' => $total,
                        ];
                        $cond = "quotation_id=" . $therapy['recei_no'];
                        $result = $this->Database->update($cond, $amt, 'quotation_details');
                        send_session_cancel_mail($qtno, $therapy['recei_child_id'], 'bibin.m@alwafaagroup.com', $logged_in[0]->id);

                        $data = [];
                        $data = [
                            'services_fee' => $refund,
                            'completion_status' => $t_status,
                            'cancelled_amount' => $refund
                        ];
                    } elseif ($t_status == 5 || $t_status == 6) {

                        $subsql = "SELECT sub_total,discount,total FROM `quotation_details` WHERE quotation_id =" . $therapy['recei_no'];
                        $data['quotation_amt_details'] = $this->Database->select_qry_array($subsql);
                        $subt = $data['quotation_amt_details'][0]->sub_total;
                        $disc = $data['quotation_amt_details'][0]->discount;
                        $total = $data['quotation_amt_details'][0]->total;

                        $sub_total = (int) $subt - $refund;
                        $total = (int) $sub_total - (int) $disc;
                        $amt = [];
                        $amt = [
                            'sub_total' => $sub_total,
                            'total' => $total,
                        ];

                        $cond = "quotation_id=" . $therapy['recei_no'];
                        $result = $this->Database->update($cond, $amt, 'quotation_details');
                        send_session_cancel_mail($qtno, $therapy['recei_child_id'], 'bibin.m@alwafaagroup.com', $logged_in[0]->id);
                        $data = [];
                        $data = [
                            'services_fee' => 0,
                            'completion_status' => $t_status,
                            'cancelled_amount' => $refund
                        ];
                    } elseif ($t_status == 9 || $t_status == 8) {
                        $data = [];
                        $data = [
                            'completion_status' => 0
                        ];
                    } else {

                        $data = [];
                        $data = [
                            'completion_status' => $t_status
                        ];
                    }
                    $cond = "id=" . $s_d;
                    $result = $this->Database->update($cond, $data, 'quotation_session_details');
                    $json = '{"status":"success","ch_id":"' . $child . '"}';
                }



                /* if ($refund != '') {
                  $sql = "SELECT Q.quotation_id,Q.receipt_no,PD.id as pay_id FROM `quotation_details` Q LEFT JOIN  `payment_details` PD ON Q.quotation_id = PD.quotation_id WHERE Q.quotation_id=" . $qtno;
                  $data['receipt_details'] = $this->Database->select_qry_array($sql);
                  if(!empty($data['receipt_details'][0]->pay_id)){
                  $pdata = [];
                  $pdata = [
                  'payment_id' => $data['receipt_details'][0]->pay_id,
                  'quotation_id' => $therapy['recei_no'],
                  'receipt_no' => $data['receipt_details'][0]->receipt_no,
                  'child_id' => $therapy['recei_child_id'],
                  'pay_amount' => $refund,
                  'update_time' => date('Y-m-d'),
                  'refund_status' => $t_status,
                  'updated_by' => $session_arr[0]->id
                  ];
                  $result = $this->Database->insert('payment_history', $pdata);
                  send_session_cancel_mail($qtno,$therapy['recei_child_id'],'bibin.m@alwafaagroup.com',$logged_in[0]->id);
                  } else {

                  $qsql = "SELECT `quotation_id`,`receipt_no`,`student_id`,`sub_total`,`discount` FROM `quotation_details`
                  WHERE quotation_id=".$qtno;
                  $data['quotation_details'] = $this->Database->select_qry_array($qsql);
                  $child = $data['quotation_details'][0]->student_id;
                  $pins = [];
                  $pins = [
                  'quotation_id'  => $data['quotation_details'][0]->quotation_id,
                  'receipt_no'    => $data['quotation_details'][0]->receipt_no,
                  'child_id'      => $data['quotation_details'][0]->student_id,
                  'amount'        => $data['quotation_details'][0]->sub_total,
                  'discount'      => $data['quotation_details'][0]->discount,
                  'updated_by'    => $session_arr[0]->id,
                  'update_time'   => date('Y-m-d')
                  ];
                  $result         = $this->Database->insert('payment_details', $pins);
                  $last_inser_id  = $this->db->insert_id();
                  if($result){
                  $phsql = "SELECT Q.quotation_id,Q.receipt_no,PD.id as pay_id FROM `quotation_details` Q LEFT JOIN  `payment_details` PD ON Q.quotation_id = PD.quotation_id WHERE Q.quotation_id=" . $qtno;
                  $data['payment_details'] = $this->Database->select_qry_array($phsql);

                  $pdata = [];
                  $pdata = [
                  'payment_id' => $data['payment_details'][0]->pay_id,
                  'quotation_id' => $therapy['recei_no'],
                  'receipt_no' => $data['payment_details'][0]->receipt_no,
                  'child_id' => $therapy['recei_child_id'],
                  'pay_amount' => $refund,
                  'update_time' => date('Y-m-d'),
                  'refund_status' => $t_status,
                  'updated_by' => $session_arr[0]->id
                  ];
                  $result = $this->Database->insert('payment_history', $pdata);
                  send_session_cancel_mail($qtno,$therapy['recei_child_id'],'bibin.m@alwafaagroup.com',$logged_in[0]->id);

                  }

                  }
                  } */
            }
            echo $json;
        }
    }

    public function view_therapy_note() {
        if (isset($_REQUEST['therapy_note_detail'])) {
            $therapy_note_detail = $_REQUEST['therapy_note_detail'];
            $sql = "SELECT * FROM `therapy_note` WHERE t_id =" . $therapy_note_detail;
            $data['therapy_note_de'] = $this->Database->select_qry_array($sql);
            $therapy_note_de = json_encode($data['therapy_note_de'], true);
            echo $therapy_note_de;
        }
    }

    public function therapy_note_students() {
        error_reporting(0);
        $searchTerm = trim($_REQUEST['serachTerm']);
        $data['childnames'] = '';
        if ($searchTerm != '') {
            $qry = "SELECT id,child_name FROM `child_details` WHERE child_name like '" . $searchTerm . "%' AND enrolment_status=1 ORDER BY child_name LIMIT 0,6 ";

            $data['childnames'] = $this->Database->select_qry_array($qry);
        }
        echo json_encode($data['childnames']);
    }

    public function therapy_note_lists($id = "", $qt_id = "") {

        if ($id != '') {
            $data['logged_in'] = $this->session->userdata('logged_in');
            $staff_id = $data['logged_in'][0]->id;
            if ($qt_id == '') {
                $qry1 = "SELECT TN.*,Q.receipt_no,EMP.employee_name,TN. t_therapy_note as latest_note,(SELECT count(TH.therapy_note) FROM therapy_note_history as TH LEFT JOIN  therapy_note as T ON TH.therapy_id=T.t_id WHERE TH.therapy_id=TN.t_id  ORDER BY TH.id DESC ) as countnotes FROM `therapy_note` as TN 
                    LEFT JOIN quotation_details as Q ON TN.t_quotation_id=Q.quotation_id 
                    LEFT JOIN employee_details as EMP ON EMP.id=TN.t_staff   
                    LEFT JOIN therapy_note_history as TNH ON TNH.therapy_id=TN.t_id                                                       
                    WHERE TN.t_child_id=" . $id . " AND TN.t_therapy_note !='' GROUP BY TN.t_id";

                /* $qry1 = "SELECT TN.*,Q.receipt_no,EMP.employee_name,(SELECT TH.therapy_note FROM therapy_note_history as TH LEFT JOIN  therapy_note as T ON TH.therapy_id=T.t_id WHERE TH.therapy_id=TN.t_id  ORDER BY TH.id DESC LIMIT 1 ) as latest_note FROM `therapy_note` as TN 
                  LEFT JOIN quotation_details as Q ON TN.t_quotation_id=Q.quotation_id
                  LEFT JOIN employee_details as EMP ON EMP.id=TN.t_staff
                  LEFT JOIN therapy_note_history as TNH ON TNH.therapy_id=TN.t_id
                  WHERE TN.t_child_id=" . $id . " AND TN.t_therapy_note !='' GROUP BY TN.t_id"; */
            } else {

                $qry1 = "SELECT TN.*,Q.receipt_no,EMP.employee_name, TN.t_therapy_note as latest_note, (SELECT count(TH.therapy_note) FROM therapy_note_history as TH LEFT JOIN  therapy_note as T ON TH.therapy_id=T.t_id WHERE TH.therapy_id=TN.t_id  ORDER BY TH.id DESC ) as countnotes FROM `therapy_note` as TN 
                    LEFT JOIN quotation_details as Q ON TN.t_quotation_id=Q.quotation_id 
                    LEFT JOIN employee_details as EMP ON EMP.id=TN.t_staff   
                    LEFT JOIN therapy_note_history as TNH ON TNH.therapy_id=TN.t_id
                    WHERE TN.t_child_id=" . $id . " AND TN.t_therapy_note !='' AND Q.quotation_id=" . $qt_id . " GROUP BY TN.t_id";
                /*
                  $qry1 = "SELECT TN.*,Q.receipt_no,EMP.employee_name,(SELECT TH.therapy_note FROM therapy_note_history as TH LEFT JOIN  therapy_note as T ON TH.therapy_id=T.t_id WHERE TH.therapy_id=TN.t_id  ORDER BY TH.id DESC LIMIT 1 ) as latest_note FROM `therapy_note` as TN
                  LEFT JOIN quotation_details as Q ON TN.t_quotation_id=Q.quotation_id
                  LEFT JOIN employee_details as EMP ON EMP.id=TN.t_staff
                  LEFT JOIN therapy_note_history as TNH ON TNH.therapy_id=TN.t_id
                  WHERE TN.t_child_id=" . $id . " AND TN.t_therapy_note !='' AND Q.quotation_id=" . $qt_id . " GROUP BY TN.t_id";
                 */
            }


            $qry2 = "SELECT child_name FROM `child_details` WHERE id=" . $id;


            $data['therapy']['information'] = $this->Database->select_qry_array($qry1);
            $data['therapy']['childdetails'] = $this->Database->select_qry_array($qry2);

            // echo "<pre>";
            // print_r($data['therapy']['information']);
            // exit;

            $this->load->view('include/header');
            $this->load->view('all_therapy_notes', $data);
            $this->load->view('include/footer');
        } else {
            $this->load->view('include/header');
            $this->load->view('all_therapy_notes');
            $this->load->view('include/footer');
        }
    }

    public function therapy_not_mail_alert() {

        $qsql = "SELECT t_id FROM therapy_note tn WHERE t_therapy_note='' AND t_status IN(1,3,4,6,7,10,11) AND tn.t_note_update_time > DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
        $mail_alert = $this->Database->select_qry_array($qsql);
        //AND tn.t_note_date_time > DATE_SUB(CURDATE(), INTERVAL 1 DAY)
        //LEFT JOIN employee_details emp ON tn.t_staff=emp.id
        foreach ($mail_alert as $key => $value) {

            $sql = "SELECT C.child_name,tn.t_staff,tn.t_quotation_id,tn.t_session_id,emp.email,emp.employee_name FROM therapy_note tn LEFT JOIN employee_details emp ON tn.t_staff=emp.id LEFT JOIN child_details C ON C.id=tn.t_child_id WHERE tn.t_id=" . $value->t_id;
            $notification_mail = $this->Database->select_qry_array($sql);
            $email = $notification_mail[0]->email;
            $staffname = $notification_mail[0]->employee_name;
            $qid = $notification_mail[0]->t_quotation_id;
            $sid = $notification_mail[0]->t_session_id;
            $child_name = $notification_mail[0]->child_name;
            $email = "bibin.m@alwafaagroup.com";
            send_therapy_notification_mail($qid, $sid, $child_name, $email, $staffname);
        }
    }

    public function additional_notes() {

        if (isset($_REQUEST['therapy_note'])) {
            $therapy_note = json_decode($_REQUEST['therapy_note'], true);
            $t_id = $therapy_note['t_id'];
            $child_id = $therapy_note['child_id'];
            $additional_notes = $therapy_note['additional_notes'];
            $data = [];
            $data = [
                'additional_notes' => $additional_notes
            ];

            $cond = "t_id=" . $t_id;
            $result = $this->Database->update($cond, $data, 'therapy_note');
            $json = '{"status":"success","ch_id":"' . $child_id . '"}';
            echo $json;
        }
    }

    public function edit_thpy_sess() {
        error_reporting(0);
        $sess_id = trim($_REQUEST['sess_id']);
        if ($sess_id != '') {
            $qry = "SELECT * FROM therapy_note WHERE t_id =" . $sess_id;
            $data['edit_therapy_note'] = $this->Database->select_qry_array($qry);
            echo json_encode($data['edit_therapy_note']);
        }
    }

    public function search_child() {
        error_reporting(0);
        $searchTerm = trim($_REQUEST['serachTerm']);
        $data['childnames'] = '';
        if ($searchTerm != '') {
            $qry = "SELECT id,child_name FROM `child_details` WHERE child_name like '" . $searchTerm . "%' AND enrolment_status=1 ORDER BY child_name LIMIT 0,6 ";
            $data['childnames'] = $this->Database->select_qry_array($qry);
        }
        echo json_encode($data['childnames']);
    }

    public function child_details($id = "") {
        if ($id != '') {
            $data['logged_in'] = $this->session->userdata('logged_in');
            $staff_id = $data['logged_in'][0]->id;
            $qry1 = " SELECT * FROM `child_details` WHERE id =" . $id;
            $qry2 = "SELECT * FROM `parent_details` WHERE child_id =" . $id;
            $qry3 = "SELECT Q.quotation_id,Q.student_id,QS.discipline_type_id,EMP.employee_name,DD.disipline_name FROM `quotation_details` Q LEFT JOIN quotation_session_details QS ON QS.quotation_id=Q.quotation_id LEFT JOIN employee_details EMP ON QS.staff_id=EMP.id LEFT JOIN disipline_details DD ON DD.id=QS.discipline_type_id WHERE Q.student_id =" . $id . " GROUP BY employee_name";
            $qry4 = "SELECT Q.quotation_id,Q.student_id,QS.discipline_type_id,EMP.employee_name,DD.disipline_name FROM `quotation_details` Q LEFT JOIN quotation_session_details QS ON QS.quotation_id=Q.quotation_id LEFT JOIN employee_details EMP ON QS.staff_id=EMP.id LEFT JOIN disipline_details DD ON DD.id=QS.discipline_type_id WHERE Q.student_id =" . $id . " GROUP BY disipline_name";
            $qry5 = "SELECT * FROM `child_doc` WHERE child_id =" . $id;
            $qry6 = "SELECT external_triggers_desc,disorders_in_fm_desc FROM `medical_history` WHERE child_id =" . $id;

            $qry7 = "SELECT Q.quotation_id,Q.student_id,Q.erp_register_no,Q.receipt_no,Q.timestamp,QD.id as qd_id, QD.quotation_id as qd_id, SUBQ.sub_category_name,CAT.category_name,COUNT(QSES.id) AS tot_ses, COUNT(CASE WHEN QSES.completion_status != 0 THEN 1 END) as completed_ses,
            SUM(CASE
                WHEN QSES.completion_status = 2 || QSES.completion_status = 5 || QSES.completion_status = 6 || QSES.completion_status = 8 || QSES.completion_status = 9  THEN 1 ELSE 0 END) AS 'cancl_sess' FROM `quotation_details` Q LEFT JOIN quotation_discipline_details QD ON Q.quotation_id=QD.quotation_id LEFT JOIN subcategory SUBQ ON QD.category_id= SUBQ.category_id AND QD.sub_category_id=SUBQ.id LEFT JOIN sen_category_details CAT ON CAT.id=QD.category_id LEFT JOIN quotation_session_details QSES ON QSES.quotation_discipline_id=QD.id WHERE Q.accept_status='Accept' AND Q.student_id=" . $id . " GROUP BY Q.quotation_id ORDER BY Q.timestamp DESC";






            $data['child_details']['information'] = $this->Database->select_qry_array($qry1);
            $data['child_details']['parent_information'] = $this->Database->select_qry_array($qry2);
            $data['child_details']['service_information'] = $this->Database->select_qry_array($qry3);
            $data['child_details']['discipline_information'] = $this->Database->select_qry_array($qry4);
            $data['child_details']['documents'] = $this->Database->select_qry_array($qry5);
            $data['child_details']['allergies'] = $this->Database->select_qry_array($qry6);
            $data['child_details']['quatation_details'] = $this->Database->select_qry_array($qry7);





            $this->load->view('include/header');
            $this->load->view('child_details', $data);
            $this->load->view('include/footer');
        } else {
            $this->load->view('include/header');
            $this->load->view('child_details');
            $this->load->view('include/footer');
        }

        //      echo '<pre>';
        //   print_r($data);
        //     echo '</pre>';
    }

    public function search_child_full_details() {
        error_reporting(0);
        $searchTerm = trim($_REQUEST['serachTerm']);
        $data['childnames'] = '';
        if ($searchTerm != '') {
            $qry = "SELECT id,child_name FROM `child_details` WHERE child_name like '" . $searchTerm . "%' AND enrolment_status=1 ORDER BY child_name LIMIT 0,6 ";

            $data['childnames'] = $this->Database->select_qry_array($qry);
        }
        echo json_encode($data['childnames']);
    }

    public function view_sessions($qt_id = "") {
        error_reporting(0);
        if ($qt_id != '') {
            $qry = "SELECT qt.quotation_id, qt_ds.start_date,qt_ds.end_date,qt_sd.services_fee,qt_sd.id, qt_sd.session_date, 
            qt_sd.discipline_type_id, qt_sd.start_time, qt_sd.end_time, qt_sd.staff_id,ds_de.disipline_name,emp_de.employee_name,tp_nt.t_status FROM `quotation_details` AS qt
            LEFT JOIN `quotation_discipline_details` AS qt_ds ON qt.quotation_id = qt_ds.quotation_id 
            LEFT JOIN `quotation_session_details` AS qt_sd ON qt.quotation_id = qt_sd.quotation_id 
            LEFT JOIN `therapy_note` AS tp_nt ON tp_nt.t_session_id = qt_sd.id             
            LEFT JOIN `disipline_details` AS ds_de ON ds_de.id = qt_sd.discipline_type_id  
            LEFT JOIN `employee_details` AS emp_de ON emp_de.id = qt_sd.staff_id   
            WHERE qt.quotation_id =" . $qt_id . " GROUP BY qt_sd.id ";

            $data['qt_session_details'] = $this->Database->select_qry_array($qry);
// echo "<pre>";
// print_r($data['qt_session_details']);
// exit;

            $this->load->view('include/header');
            $this->load->view('view_sessions', $data);
            $this->load->view('include/footer');
        }
    }

    public function view_sessions_details($qt_id = "") {
        error_reporting(0);
        if ($qt_id != '') {
            $qry = "SELECT qt.quotation_id, qt_ds.start_date,qt_ds.end_date,qt_sd.services_fee,qt_sd.id, qt_sd.session_date, 
            qt_sd.discipline_type_id, qt_sd.start_time, qt_sd.end_time, qt_sd.staff_id,ds_de.disipline_name,emp_de.employee_name,tp_nt.t_status FROM `quotation_details` AS qt
            LEFT JOIN `quotation_discipline_details` AS qt_ds ON qt.quotation_id = qt_ds.quotation_id 
            LEFT JOIN `quotation_session_details` AS qt_sd ON qt.quotation_id = qt_sd.quotation_id 
            LEFT JOIN `therapy_note` AS tp_nt ON tp_nt.t_session_id = qt_sd.id             
            LEFT JOIN `disipline_details` AS ds_de ON ds_de.id = qt_sd.discipline_type_id  
            LEFT JOIN `employee_details` AS emp_de ON emp_de.id = qt_sd.staff_id   
            WHERE qt.quotation_id =" . $qt_id;

            $data['qt_session_details'] = $this->Database->select_qry_array($qry);


            $this->load->view('include/header');
            $this->load->view('view_sessions_details', $data);
            $this->load->view('include/footer');
        }
    }

    public function view_single_session($s_session_id = "") {
        error_reporting(0);

        if ($s_session_id != '') {

            $qry = "SELECT qt.quotation_id,qt.receipt_no,qt_sd.staff_id,qt_ds.start_date,qt_ds.end_date,qt_sd.services_fee,qt_sd.id as session_id, qt_sd.session_date, 
            qt_sd.discipline_type_id, qt_sd.start_time, qt_sd.end_time, qt_sd.completion_status,ds_de.disipline_name,ch_de.child_name,
            ch_de.id as child_id,tp_n.* FROM `quotation_details` AS qt
            LEFT JOIN `quotation_discipline_details` AS qt_ds ON qt.quotation_id = qt_ds.quotation_id 
            LEFT JOIN `quotation_session_details` AS qt_sd ON qt.quotation_id = qt_sd.quotation_id 
            LEFT JOIN `disipline_details` AS ds_de ON ds_de.id = qt_sd.discipline_type_id  
            LEFT JOIN `child_details` AS ch_de ON ch_de.id = qt.student_id    
            LEFT JOIN `therapy_note` AS tp_n ON tp_n.t_session_id = qt_sd.id                                            
            WHERE qt_sd.id =" . $s_session_id;
            $view_session_details = $this->Database->select_qry_array($qry);
            $data['view_session_details'] = $this->Database->select_qry_array($qry);

            $qry1 = "SELECT TNH.id as t_id,TN.t_status,TN.t_created_date,TNH.therapy_note,TNH.timestamp,TNH.strike_note,TNH.notes_from,TNH.therapy_status as t_status,EMP.employee_name FROM `therapy_note` as TN LEFT JOIN therapy_note_history as TNH ON TN.t_id=TNH.therapy_id LEFT JOIN employee_details as EMP ON TNH.edited_by=EMP.id WHERE TN.t_session_id=" . $s_session_id . " AND TNH.therapy_note !='' ORDER BY TNH.id DESC";

            $data['therapy_notes']['all_edited_therapy_notes'] = $this->Database->select_qry_array($qry1);


            $qry2 = "SELECT TN.t_id,TN.t_therapy_note therapy_note,TN.timestamp,TN.t_status,TN.strike_note as strike_note,TN.t_created_date,TN.notes_from, EMP.employee_name  FROM `therapy_note` TN LEFT JOIN employee_details EMP ON TN.t_staff=EMP.id WHERE t_session_id =" . $s_session_id;

            $data['therapy_notes']['first_therapy_notes'] = $this->Database->select_qry_array($qry2);

            $data['therapy_notes']['all'] = array_merge($data['therapy_notes']['first_therapy_notes'], $data['therapy_notes']['all_edited_therapy_notes']);

            usort($data['therapy_notes']['all'], function($a, $b) {
                $ad = new DateTime($a->timestamp);
                $bd = new DateTime($b->timestamp);
                if ($ad == $bd) {
                    return 0;
                }
                return $ad < $bd ? 1 : -1;
            });
            // echo "<pre>";
            // print_r($data['therapy_notes']['all']);
            // exit;

            $qry3 = "SELECT quotation_id FROM quotation_session_details WHERE id=" . $s_session_id;
            $data['quotation_id'] = $this->Database->select_qry_array($qry3);
            $qid = $data['quotation_id'][0]->quotation_id;
            $qry4 = "SELECT count(id) as count FROM quotation_session_details WHERE quotation_id=" . $qid;
            $data['sessions_count'] = $this->Database->select_qry_array($qry4);
            $data['sessions_count'] = $data['sessions_count'][0]->count;
            /* current session number */
            $qry4 = "SELECT * FROM quotation_session_details WHERE quotation_id=" . $qid;
            $data['sessions_t_count'] = $this->Database->select_qry_array($qry4);
            $keys = '';
            foreach ($data['sessions_t_count'] as $key => $val) {
                if ($val->id === $s_session_id) {
                    $keys = $key;
                }
            }
            $data['ses_comp_cnt'] = $keys + 1;
            /* current session end */

            // if ($view_session_details[0]->completion_status == 0) {
            //     $qry5 = "SELECT count(id) as scount FROM quotation_session_details WHERE quotation_id=$qid AND completion_status!=0";
            //     $count_arr = $this->Database->select_qry_array($qry5);
            //     $data['ses_comp_cnt'] = $count_arr[0]->scount + 1;
            // } else {
            //     $qry6 = "SELECT COUNT(id) AS total_count FROM `quotation_session_details` WHERE `quotation_id`=$qid AND id <= $s_session_id";
            //     $count_arr = $this->Database->select_qry_array($qry6);
            //     $data['ses_comp_cnt'] = $count_arr[0]->total_count;
            // }

            $sql = "SELECT * FROM `employee_details` WHERE `disipline_id` IN (1,2,3,4,5) AND archive=0 AND therapy_notes=0";
            $data['list_of_therapist'] = $this->Database->select_qry_array($sql);
            $data['logged_in'] = $this->session->userdata('logged_in');

            $this->load->view('include/header');
            $this->load->view('view_single_session', $data);
            $this->load->view('include/footer');
        }
    }

    public function view_child_goals($ch_id = "") {
        error_reporting(0);
        if ($ch_id != '') {
            /* $sql = "SELECT gl.*,emp.employee_name FROM `goals` AS gl
              LEFT JOIN `employee_details` AS emp ON emp.id = gl.created_by
              WHERE gl.child_id=" . $ch_id . " ORDER BY gl.id"; */

            $sql = "SELECT GL.*,EMP.employee_name FROM `goals` as GL LEFT JOIN employee_details EMP ON EMP.id=GL.created_by WHERE GL.child_id=" . $ch_id . " ORDER BY GL.created_date DESC";

            $csql = "SELECT * FROM `child_details` WHERE id=" . $ch_id;
            $data['child_details'] = $this->Database->select_qry_array($csql);
            $data['child_goals'] = $this->Database->select_qry_array($sql);

            /* foreach ($data['child_goals'] as $key => $value) {

              $sql1 = "SELECT * FROM `goals_history` WHERE goal_id=" . $value->id;
              $data['view_goal_history'][] = $this->Database->select_qry_array($sql1);
              }

              foreach ($data['child_goals'] as $key => $value) {

              foreach ($data['view_goal_history'][$key] as $k => $v) {
              if ($value->id == $v->goal_id) {

              $data['data_goal_history'][$key][$k] = $v;
              $data['data_goal_history'][$key][] = $value;
              }
              }
              } */
        }
        $this->load->view('include/header');
        $this->load->view('view_child_goals', $data);
        $this->load->view('include/footer');
    }

    public function view_goals_history() {
        error_reporting(0);
        $goal_id = trim($_REQUEST['goal_id']);

        if ($goal_id != '') {
            $sql = "SELECT * FROM `goals_history` WHERE goal_id=" . $goal_id;
            $data['view_goal_history'] = $this->Database->select_qry_array($sql);
        }
        echo json_encode($data['view_goal_history']);
    }

    public function set_a_goal() {
        error_reporting(0);
        if (isset($_REQUEST['json'])) {
            $json = json_decode($_REQUEST['json'], true);
            $goal_title = $json['goal_title'];
            $goal_description = $json['goal_description'];
            $goal_date = $json['goal_date'];
            $child_id = $json['child_id'];
            $therapist_name = $json['therapist_name'];
            $therapist_id = $json['therapist_id'];
            $goadlpdf = $json['goadlpdf'];

            $array = array(
                'child_id' => $child_id,
                'goal_title' => $goal_title,
                'goal_description' => $goal_description,
                'created_by' => $therapist_id,
                'created_date' => date('Y-m-d'),
                'goal_end_date' => $goal_date,
                'goal_pdf' => $goadlpdf,
                'status' => 1
            );
            $result = $this->Database->insert('goals', $array);
            echo $json = '{"status":"success"}';
        }
    }

    public function edit_goal() {
        error_reporting(0);
        $goal_title = $_REQUEST['goal_title'];
        $goal_date = $_REQUEST['goal_date'];
        $goal_description = $_REQUEST['goal_description'];
        $child_id = $_REQUEST['child_id'];
        $therapist_name = $_REQUEST['therapist_name'];
        $therapist_id = $_REQUEST['therapist_id'];
        $goal_id = $_REQUEST['goal_id'];

        $array = array(
            'goal_id' => $goal_id,
            'goal_title' => $goal_title,
            'goal_description' => $goal_description,
            'edited_by' => $therapist_id,
            'edited_date' => date('Y-m-d'),
            'new_goal_date' => $goal_date,
        );
        $result = $this->Database->insert('goals_history', $array);
        if ($result) {
            echo "1";
        } else {
            echo "0";
        }
    }

    public function student_enrolment() {
        if ($_REQUEST['status'] == 'student_enrolment') {
            $student_id = $_REQUEST['student_id'];
            $data = [];
            $data = [
                'enrolment_status' => 1,
            ];
            $cond = "id=" . $student_id;
            $result = $this->Database->update($cond, $data, 'child_details');
            $json = '{"status":"success"}';
            echo $json;
        }
    }

    public function child_docs() {
        error_reporting(0);
        if (isset($_REQUEST['json'])) {
            $json = json_decode($_REQUEST['json'], true);
            $child_id = $json['child_id'];
            $child_doc_name = $json['child_doc_name'];
            $child_doc = $json['child_doc'];
            $data = [];
            $data = [
                'child_id' => $child_id,
                'child_doc_name' => $child_doc_name,
                'child_documents' => $child_doc
            ];

            $result = $this->Database->insert('child_doc', $data);
            if ($result) {
                $json = '{"status":"success","ch_id":"' . $child_id . '"}';
            } else {
                $json = '{"status":"error","ch_id":"' . $child_id . '"}';
            }
            echo $json;
        }
    }

    public function single_therapy($id = '', $f = '') {
        if ($f == '') {
            $sql = "SELECT *,TH.therapy_note as tnote,TH.timestamp as cdate,TH.therapy_note_pdf as pdf, emp.employee_name FROM `therapy_note_history` TH LEFT JOIN employee_details emp ON TH.edited_by=emp.id WHERE TH.id=" . $id;
            $data['view_notes'] = $this->Database->select_qry_array($sql);
        } else {
            $sql = "SELECT *, T.t_therapy_note as tnote,T.t_created_date as cdate,T.t_note_pdf as pdf,emp.employee_name FROM `therapy_note` T LEFT JOIN employee_details emp ON T.t_staff=emp.id  WHERE T.t_id=" . $id;
            $data['view_notes'] = $this->Database->select_qry_array($sql);
        }
        $this->load->view('include/header');
        $this->load->view('therapy_note_view', $data);
        $this->load->view('include/footer');
    }

    public function view_all_therapy_notes($id = '') {
        if ($id != '') {
            $sql = "SELECT T.*,T.t_therapy_note as therapy_note ,T.t_note_pdf as therapy_note_pdf,E.employee_name FROM `therapy_note` T LEFT JOIN employee_details E ON T.t_staff=E.id WHERE t_id=" . $id . " ORDER BY T.timestamp DESC";
            $data['therapy']['view_notes'] = $this->Database->select_qry_array($sql);
            $sql = "SELECT TH.*,E.employee_name,TH.timestamp as t_created_date FROM `therapy_note_history` TH LEFT JOIN employee_details E ON TH.edited_by=E.id  WHERE  therapy_id=" . $id . " ORDER BY TH.timestamp DESC";
            $data['therapy']['view_his_notes'] = $this->Database->select_qry_array($sql);
        }
        $data['therapy'] = array_merge($data['therapy']['view_notes'], $data['therapy']['view_his_notes']);


        usort($data['therapy'], function($a, $b) {
            $ad = new DateTime($a->timestamp);
            $bd = new DateTime($b->timestamp);
            if ($ad == $bd) {
                return 0;
            }
            return $ad < $bd ? 1 : -1;
        });


        // echo '<pre>';
        // print_r($data);
        //  echo '</pre>';
        $this->load->view('include/header');
        $this->load->view('view_all_therapy_notes', $data);
        $this->load->view('include/footer');
    }

    public function strike_note() {
        error_reporting(0);
        if (isset($_REQUEST['json'])) {
            $js = json_decode($_REQUEST['json'], true);
            $strike_note = $js['strike_note'];
            $strike_id = $js['strike_id'];
            $sess_id = $js['sess_id'];


            if ($strike_note == '1') {
                $dd = [];
                $dd = [
                    'strike_note' => 'Yes',
                ];
                $cond = "t_id=" . $strike_id;
                $result = $this->Database->update($cond, $dd, 'therapy_note');

                $qsdata = [];
                $qsdata = [
                    'completion_status' => 0
                ];
                $cond = "id=" . $sess_id;
                $result = $this->Database->update($cond, $qsdata, 'quotation_session_details');




                $json = '{"status":"success","message":"Successfuly striked","session":"' . $sess_id . '"}';
                echo $json;
            } else {
                $data = [];
                $data = [
                    'strike_note' => 'Yes',
                ];
                $cond = "id=" . $strike_id;
                $result = $this->Database->update($cond, $data, 'therapy_note_history');
                $json = '{"status":"success","message":"Successfuly striked","session":"' . $sess_id . '"}';
                echo $json;
            }
        }
    }

    /*
      Therapy Notes Section End
     */

    /* Policy and Procedure
     */

    public function policy_procedure() {

        if (isset($_REQUEST['therapy'])) {
            $therapy = json_decode($_REQUEST['therapy'], true);
            $pname = $therapy['pname'];
            $ppdf = $therapy['ppdf'];
            $data = [];
            $data = [
                'pname' => $pname,
                'ppdf' => $ppdf,
                'status' => 1
            ];
            $result = $this->Database->insert('policy_procedure', $data);
            $data = [];
            $data = [
                'accept' => "",
            ];
            $cond = " id !='' ";
            $result = $this->Database->update($cond, $data, 'policy_acceptance');
            if ($result) {
                send_policy_mail_to_all();
                $json = '{"status":"success"}';
                echo $json;
            }
        } else {

            $this->load->view('include/header');
            $this->load->view('policy_procedure');
            $this->load->view('include/footer');
        }
    }

    public function view_policy_procedure() {
        $sql = "SELECT * FROM `policy_procedure` WHERE status=1 ORDER BY timestamp DESC     ";
        $data['policy_procedure'] = $this->Database->select_qry_array($sql);
        $this->load->view('include/header');
        $this->load->view('view_policy_procedure', $data);
        $this->load->view('include/footer');
    }

    public function accept_policy_procedure() {
        $data['logged_in'] = $this->session->userdata('logged_in');
        $emp = $data['logged_in'][0]->id;
        if (isset($_REQUEST['accept'])) {
            $accept = json_decode($_REQUEST['accept'], true);
            $accept = $accept['accept'];

            $sql = "SELECT id FROM `policy_acceptance` WHERE employee_id=" . $emp;
            $data['accept_id'] = $this->Database->select_qry_array($sql);
            if (!empty($data['accept_id'])) {
                $accept_id = $data['accept_id'][0]->id;
            } else {
                $accept_id = '';
            }
            if ($accept_id == '') {
                $data = [];
                $data = [
                    'employee_id' => $emp,
                    'accept' => $accept,
                ];
                $result = $this->Database->insert('policy_acceptance', $data);
                $json = '{"status":"success"}';
                echo $json;
            } else {
                $data = [
                    'accept' => $accept,
                ];
                $cond = "id=" . $accept_id;
                $result = $this->Database->update($cond, $data, 'policy_acceptance');
                $json = '{"status":"success"}';
                echo $json;
            }
        } else {
            $sql = "SELECT * FROM `policy_procedure` WHERE status=1 ORDER BY timestamp DESC LIMIT 1 ";
            $data['policy'] = $this->Database->select_qry_array($sql);
            $sql = "SELECT * FROM `policy_acceptance` WHERE employee_id=" . $emp;
            $data['policy_procedure'] = $this->Database->select_qry_array($sql);
            $this->load->view('include/header');
            $this->load->view('accept_policy_procedure', $data);
            $this->load->view('include/footer');
        }
    }

    public function view_pdf() {
        $day = date('d');
        $month = date('m');
        $qry = "SELECT C.*,P.* FROM `child_details` C LEFT JOIN parent_details P ON C.id=P.child_id  WHERE DAY(`date_of_birth`) = '$day' AND MONTH(`date_of_birth`) = '$month'";
        $notification_mail = $this->Database->select_qry_array($qry);
        for ($i = 0; $i < count($notification_mail); $i++) {
            $cd = $notification_mail[$i];
            echo "<pre>";
            //echo $cd->father_personal_email;
        }

        //     $sql = "SELECT * FROM `policy_procedure` WHERE status=1 ORDER BY timestamp DESC LIMIT 1 ";
        //     $data['policy'] = $this->Database->select_qry_array($sql);
        //   $file = base_url()."files/images/".$data['policy'][0]->ppdf;
        // header("Content-Length: ".@filesize ($file) ); 
        // header("Content-type: application/pdf"); 
        // header("Content-disposition: inline; filename=".basename($file));
        // header('Expires: 0');
        // header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        // ob_clean();
        // flush();
        // readfile($file);
        //header( "Content-disposition: inline;filename=".base_url()."files/images/".$data['policy'][0]->ppdf);
        // exit;
    }

    public function view_policy_accepted_list() {
        $sql = "SELECT PA.*,EMP.employee_name FROM `policy_acceptance` PA LEFT JOIN employee_details EMP ON EMP.id=PA.employee_id";
        $data['policy_procedure_accepts'] = $this->Database->select_qry_array($sql);
        $this->load->view('include/header');
        $this->load->view('view_policy_procedure_accept', $data);
        $this->load->view('include/footer');
    }

    /* End */
    /* Marketing Form    Added by :Anfiya    29/08/17 */

    public function marketing() {
        $data['camp_category'] = $this->Database->select_data('sub_category_name', 'subcategory', 'category_id="6"');
        $this->load->view('include/header');
        $this->load->view('add_marketing', $data);
        $this->load->view('include/footer');
    }

    public function insert_marketing() {
        $values = json_decode($_REQUEST['json'], true);
        print_r($values);
        if (!empty($values['entry_date'])) {
            $values['entry_date'] = strtotime($values['entry_date']);
        }
        if (!empty($values['child_dob'])) {
            $values['child_dob'] = strtotime($values['child_dob']);
        }
        if (!empty($values['parent_dob'])) {
            $values['parent_dob'] = strtotime($values['parent_dob']);
        }
        $this->Database->insert('marketing', $values);
    }

    public function view_marketing() {

        $data['marketing'] = $this->Database->select_data('*', 'marketing');
        $this->load->view('include/header');
        $this->load->view('view_marketing', $data);
        $this->load->view('include/footer');
    }

    public function view_full_marketing() {

        $data_id = $this->uri->segment(3);
        $where = "id='$data_id'";
        $data['marketing'] = $this->Database->select_data('*', 'marketing', $where);
        $this->load->view('include/header');
        $this->load->view('view_full_marketing', $data);
        $this->load->view('include/footer');
    }

    public function edit_marketing() {
        $data_id = $this->uri->segment(3);
        $where = "id='$data_id'";
        $data['camp_category'] = $this->Database->select_data('sub_category_name', 'subcategory', 'category_id="6"');
        $data['marketing'] = $this->Database->select_data('*', 'marketing', $where);
        $this->load->view('include/header');
        $this->load->view('edit_marketing', $data);
        $this->load->view('include/footer');
    }

    public function delete_marketing() {
        $id = $_REQUEST['id'];
        $query = "DELETE FROM marketing WHERE id=" . $id;
        $result = $this->Database->delete($query);

        if ($result) {
            $this->load->view('include/header');
            $this->load->view('view_marketing', $data);
            $this->load->view('include/footer');
        }
    }

    public function update_marketing() {
        $values = json_decode($_REQUEST['json'], true);

        if (!empty($values['entry_date'])) {
            $values['entry_date'] = strtotime($values['entry_date']);
        }
        if (!empty($values['child_dob'])) {
            $values['child_dob'] = strtotime($values['child_dob']);
        }
        if (!empty($values['parent_dob'])) {
            $values['parent_dob'] = strtotime($values['parent_dob']);
        }
        if ($values['hear_about_us'] != 8) {
            $values['about_us_internet_socialmedia'] = '';
            $values['internet_other'] = '';
        }
        $hear_abt_us_specify = ['1', '2', '3', '9'];
        if (!in_array($values['hear_about_us'], $hear_abt_us_specify)) {
            $values['about_us_specify'] = '';
        }
        if ($values['about_us_internet_socialmedia'] != 9) {
            $values['internet_other'] = '';
        }
        if ($values['categories_nature'] != 1) {
            $values['camp'] = '';
            $values['active_client'] = '';
            $values['therapy_specify'] = '';
        }


        $categories = ['1', '2', '3', '5'];
        if (!in_array($values['categories_nature'], $categories)) {
            $values['categories_nature_specify'] = '';
        }

        if ($values['active_client'] != 8) {
            $values['camp'] = '';
        }
        $active_specify = ['12', '9', '10', '11'];
        if (!in_array($values['active_client'], $active_specify)) {
            $values['active_client_specify'] = '';
        }
        $id = $values['id'];
        echo $result = $this->Database->update_data($id, $values, 'marketing');
    }

}
