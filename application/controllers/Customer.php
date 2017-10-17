<?php
/*
  Project Name : Sensation Sation
  Company Name : alwafaagroup
  Author: Upendra Kumar Prasad
  file Name : Customer.php(Controller)
  Project URI: http://demo.softwarecompany.ae/sensation/
  Description : It's related to customer registraction
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->Model('Database', '', 'TRUE');
        date_default_timezone_set('Asia/Dubai');
    }
    public function customer_reg($eid= '' ,$qt_id = '') {
        if($eid== '' || $qt_id == ''){
            $data['message']='Somthing Eroor Contact to Admin';
            $this->load->view('include/f_header');
            $this->load->view('registration_success',$data);
            $this->load->view('include/f_footer');  
        }else { 
            $qry="SELECT * FROM `quotation_details` WHERE `quotation_id` = $qt_id";
            $arr=  $this->Database->select_qry_array($qry);
            if(!empty($arr)){
                if($arr[0]->student_id==0){
                    $qry2="SELECT * FROM `electronic_mail` WHERE id=".$eid;
                    $elearr= $this->Database->select_qry_array($qry2);
                    $data['elec_details'] =  $elearr;
                    $data['discipline_details'] = $this->Database->select_qry_array("SELECT * FROM `disipline_details`");
                    $send_time=$elearr[0]->send_date;
                    $deactivate_date=$elearr[0]->deactivate_date;
                    if(date('Y-m-d H:i:s') > $send_time && date('Y-m-d H:i:s') < $deactivate_date){
                        $data['parent_details'] = '';
                        $data['child_details'] = '';
                        $data['authorisation_detail'] = '';
                        $data['medical_history'] = '';
                        $data['nutrition_details'] = '';
                        $data['sibling_details'] = '';
                        $data['prenatal_history'] = '';
                        $this->load->view('include/f_header');
                        $this->load->view('reg_add', $data);
                        $this->load->view('include/f_footer');   
                   }
                }else{
                  $data['message']='you time has expired. contact to admin';
                  $this->load->view('include/f_header');
                  $this->load->view('registration_success',$data);
                  $this->load->view('include/f_footer');  
                }
            }else{
                $data['message']='you have already filled this form';
                $this->load->view('include/f_header');
                $this->load->view('registration_success',$data);
                $this->load->view('include/f_footer');  
            }
        }
        //registration.php delete
    } 
    
    public function reg_success($electronic_id='',$quotation_id=''){
            if($electronic_id!=''){
                $cond='id='.$electronic_id;
                $apdate = date('Y-m-d H:i:s');
                $arr=[
                    'status'=>0,
                    'approved_date'=> $apdate
                    ];
                 $this->Database->update($cond, $arr, 'electronic_mail');
            }
            $data['message']='Thanks, your registration form has been successfully submitted';
            $this->load->view('include/f_header');
            $this->load->view('registration_success',$data);
            $this->load->view('include/f_footer');  
    } 
    
       public function view_employee($emp_id = '') {
        $cond='';
        if($emp_id!=''){
            $cond="id=$emp_id AND";
        }
        $emp_q = "SELECT * FROM employee_details WHERE $cond archive=0";
        $emparray = $this->Database->select_qry_array($emp_q);
        echo json_encode($emparray);
    } 
    
}