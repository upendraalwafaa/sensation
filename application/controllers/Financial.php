<?php
/*
  Project Name : Sensation Sation
  Company Name : alwafaagroup
  Author: Upendra Kumar Prasad
  file Name : Financial.php(Controller)
  Project URI: http://demo.softwarecompany.ae/sensation/
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Financial extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->Model('Database', '', 'TRUE');
        date_default_timezone_set('Asia/Dubai');
    }

    public function index() {
        $this->load->view('include/header');
        $this->load->view('finance');
        $this->load->view('include/footer');
    }

    public function accounts() {
        $cur_date =  date('Y-m-d H:i:s');
        $sql = "SELECT C.id as acc_code,C.last_sync_date, P.id as p_code,P.father_name as accountName,C.sync_status FROM `child_details` C LEFT JOIN parent_details P ON C.id=P.child_id WHERE C.sync_status='N' OR C.sync_status='E' OR C.sync_status='D'";
        $accounts = $this->Database->select_qry_array($sql);
        // echo "<pre>";
        // print_r($accounts);
        // exit;
        foreach ($accounts as $key => $value) {                 
             $data['Accounts'][] = [
                 'AccountCode'    => $value->acc_code,
                 'AccountName'    => $value->accountName,
                 'ParentCode'     => 'C'.$value->p_code,
                 'AccCategory'    => 10,
                 'DMLType'        => $value->sync_status,
                          
             ];

        }

        if(!empty($data)) {
            $json = json_encode($data);
            echo $json;
            // foreach ($accounts as $key => $value) {                 
            //     $cond = "id=" . $value->acc_code;
            //     $udata = [
            //         'last_sync_date' => date('Y-m-d H:i:s'),
            //         'sync_status' => ''
            //     ];
            //     $result = $this->Database->update($cond, $udata, 'child_details'); 
            // } 
        } else {
            echo "No data available for sync";
        }
        exit;
        $this->load->view('include/header');
        $this->load->view('finance');
        $this->load->view('include/footer');
    }

    public function invoices() {

        $sql = "SELECT * FROM payment_history WHERE sync_status='N'";
        $invoices = $this->Database->select_qry_array($sql);

        $data = [];
        foreach ($invoices as $key => $value) {
            
            $data['invoices'][] = [
                'VoucherNo'     => $value->id,
                'VoucherDate'   => $value->update_time,
                'AccountCode'   => 'C'.$value->child_id,
                'Description'   => 12,
                'IncomeAc'      => 'N',
                'Amount'        => $value->pay_amount,
                'BranchID'      => 1,             
                'DMLType'       => $value->sync_status,
                'IncomeAcName'  => 'Therapy'           
            ];  
        }


        if(!empty($data)) {
            $json = json_encode($data);
            echo $json;
            // foreach ($invoices as $key => $value) {                 
            //     $cond = "id=" . $value->id;
            //     $udata = [
            //         'last_sync_date' => date('Y-m-d H:i:s'),
            //         'sync_status' => ''
            //     ];
            //     $result = $this->Database->update($cond, $udata, 'payment_history'); 
            // } 
        } else {
            echo "No data available for sync";
        }



        exit;
    }

}