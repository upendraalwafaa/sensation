<?php
/*
  Project Name : Sensation Sation
  Company Name : alwafaagroup
  Author: Upendra Kumar Prasad
  file Name : Login.php(Controller)
  Project URI: http://demo.softwarecompany.ae/sensation/
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->Model('Database', '', 'TRUE');
    }

    public function index() {
        $this->load->view('login');
    }

    public function user_login() {
        $password = $_REQUEST['password'];
        $user_name = $_REQUEST['user_name'];
        $md5 = md5($password);

        $sql = "SELECT *  FROM `employee_details` WHERE `email` LIKE '" . $user_name . "' AND `password` LIKE '" . $md5 . "' AND `archive` = 0";
        if ($this->Database->num_rows($sql) > 0) {
            $loged_detail = $this->Database->select_qry_array($sql);
            $sql = "SELECT designation_name  FROM `designation_details` WHERE `id`=" . $loged_detail[0]->designation_id;
            $loged_designation = $this->Database->select_qry_array($sql);
            $loged_detail[0]->designation = $loged_designation[0]->designation_name;
            if ($loged_detail[0]->disipline_id != 'null') {
              $sql = "SELECT disipline_name  FROM `disipline_details` WHERE `id`='".$loged_detail[0]->disipline_id."'";
                $loged_disipline_name = $this->Database->select_qry_array($sql);
                $loged_detail[0]->disipline_name = $loged_disipline_name[0]->disipline_name;
            } else {
                $loged_detail[0]->disipline_name = '';
            }
            $this->session->set_userdata('logged_in', $loged_detail);
            $json = '{"status":"success"}';
        } else {
              $sql = "SELECT *  FROM `employee_details` WHERE `email` LIKE '" . $user_name . "' AND `password` LIKE '" . $md5 . "' AND `archive` = 1";
             if ($this->Database->num_rows($sql) > 0) { 
              $json = '{"status":"Error","msg":"Your account has been blocked"}';
             }else{
            $json = '{"status":"Error","msg":"Invalid User Name And Password"}';
             }
        }
        echo $json;
    }

    public function error_404() {
        $this->load->view('error_404');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('/sensation/login');
    }

}
