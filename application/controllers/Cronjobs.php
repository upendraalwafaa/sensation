<?php
/*
  Project Name : Sensation Sation
  Company Name : alwafaagroup
  Author: Upendra Kumar Prasad
  file Name : Cronjobs.php(Controller)
  Project URI: http://demo.softwarecompany.ae/sensation/
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Cronjobs extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->Model('Database', '', 'TRUE');
        date_default_timezone_set('Asia/Dubai');
    }
    public function therapy_not_mail_alert(){
        $qsql = "SELECT t_id FROM therapy_note tn WHERE t_therapy_note='' AND t_status IN(1,3,4,6,7,10,11) AND tn.t_note_update_time > DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
        $mail_alert = $this->Database->select_qry_array($qsql);
        //AND tn.t_note_date_time > DATE_SUB(CURDATE(), INTERVAL 1 DAY)
        //LEFT JOIN employee_details emp ON tn.t_staff=emp.id
        $cc = array('vineesh@alwafaagroup.com', 'upendra@alwafaagroup.com');
        foreach ($mail_alert as $key => $value) {
            $sql = "SELECT C.child_name,tn.t_staff,tn.t_quotation_id,tn.t_session_id,emp.email,emp.employee_name FROM therapy_note tn LEFT JOIN employee_details emp ON tn.t_staff=emp.id LEFT JOIN child_details C ON C.id=tn.t_child_id WHERE tn.t_id=".$value->t_id;
            $notification_mail = $this->Database->select_qry_array($sql);
            $email = $notification_mail[0]->email;
            $staffname = $notification_mail[0]->employee_name;
            $qid = $notification_mail[0]->t_quotation_id;    
            $sid = $notification_mail[0]->t_session_id;
            $child_name = $notification_mail[0]->child_name;
            $email = "bibin.m@alwafaagroup.com";
            
            $html = '';
            $html = $html . ' <p>Dear '.$staffname.',</p>';
            $html = $html . ' <p>Please be note that therapy note is missing for</p>';
            $html = $html . ' <p>Quatation No: '.$qid.'</p>';     
            $html = $html . ' <p>Session No: '.$sid.'</p>';    
            $html = $html . ' <p>Student: '.$child_name.'</p>';  
            $html = $html . ' <p>Please update ASAP</p>';
            $html = $html . ' <p>&nbsp;</p>';
            $html = $html . ' <p>Regards,</p>';
            $html = $html . ' <p>Sensation Center</p>';
            $subject = 'Therapy note missing';           
            send_mail($email, $subject, $html, $file_path = '',$cc);
        }
    }
    public function birth_notification(){
        $day=date('d');
        $month=date('m');
        $qry="SELECT * FROM `employee_details` WHERE DAY(`date_of_birth`) = '$day' AND MONTH(`date_of_birth`) = '$month'";
        $notification_mail = $this->Database->select_qry_array($qry);
        for($i=0;$i<count($notification_mail);$i++){
            $d=$notification_mail[$i];
            $html= get_birth_notification_mail_html($d,'employeee');
             $subject = 'Wish you happy birthday to our team';   
             $email='bibin.m@alwafaagroup.com';
            send_mail($email, $subject, $html, $file_path = '',$cc='');
        }
        
        $qrys="SELECT C.*,P.* FROM `child_details` C LEFT JOIN parent_details P ON C.id=P.child_id  WHERE DAY(`date_of_birth`) = '$day' AND MONTH(`date_of_birth`) = '$month'";
        $notification_mails = $this->Database->select_qry_array($qrys);
        for($i=0;$i<count($notification_mails);$i++){
            $cd=$notification_mails[$i];
            $html= get_birth_notification_mail_html($cd,$cd->gender);
             $subject = 'Wish you happy birthday to our team';   
             if($cd->father_personal_email != ''){
                $email = $cd->father_personal_email; 
             } else {
                $email = $cd->mother_personal_email;
             }

            send_mail($email, $subject, $html, $file_path = '',$cc='');
        }        
        
    }
}