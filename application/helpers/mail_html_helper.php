<?php
/*
  Project Name : Sensation Sation
  Company Name : alwafaagroup
  Author: Upendra Kumar Prasad
  file Name : mail_html_helper.php(Helper)
  Project URI: http://demo.softwarecompany.ae/sensation/
  Description : all mail html geting the data from this file and also PDF
 */
function Get_html_for_reset_password($Arr, $password) {
    $html = '';
    $html = $html . ' <h2>&nbsp; &nbsp; &nbsp;</h2>';
    $html = $html . '<h2>&nbsp; &nbsp; &nbsp; Dear ' . $Arr[0]->employee_name . ' ,</h2>';
    $html = $html . '<h2>&nbsp; &nbsp; &nbsp; Your Account Deatils .</h2>';
    $html = $html . '<h2>&nbsp; &nbsp; &nbsp; User Name : <a href="mailto:' . $Arr[0]->email . '">' . $Arr[0]->email . '</a></h2>';
    $html = $html . '<h2>&nbsp; &nbsp; &nbsp; Password &nbsp; : ' . $password . '&nbsp;</h2>';
    $html = $html . '<p>&nbsp; &nbsp; &nbsp;</p>';
    return $html;
}

function genrate_quotation_html_mail($quotation_id = '', $electronic_link_id = '', $add_receipt = 'No') {
    $ci = load_Database();
    $data['payment_his'] = '';
    $qry = "SELECT Q.*,E.employee_name AS genrated_by,QS.staff_id,TH.employee_name AS therapy_name FROM `quotation_details` Q LEFT JOIN quotation_session_details QS ON QS.quotation_id=Q.quotation_id LEFT JOIN employee_details E ON E.id=Q.updated_by LEFT JOIN employee_details TH ON TH.id=QS.staff_id WHERE Q.quotation_id='" . $quotation_id . "'";
    $quotation_details = $ci->Database->select_qry_array($qry);
    $qde = $quotation_details[0];

    $qry2 = "SELECT QD.*,C.category_name FROM `quotation_discipline_details` QD LEFT JOIN sen_category_details C ON C.id=QD.category_id WHERE quotation_id=$quotation_id";
    $sess_Arr = $ci->Database->select_qry_array($qry2);

    $data['child_arr'] = '';
    $data['electronic_link_arr'] = '';
    if ($electronic_link_id > 0) {
        $qryelc = "SELECT * FROM `electronic_mail` WHERE id=$electronic_link_id";
        $electronic_link_arr = $ci->Database->select_qry_array($qryelc);
        $data['electronic_link_arr'] = $electronic_link_arr;
    } else {
        $child_q = "SELECT C.*,C.id AS child_id,P.* FROM `child_details` C LEFT JOIN parent_details P ON C.id=P.child_id WHERE C.id=" . $qde->student_id;
        $chils_arr = $ci->Database->select_qry_array($child_q);
        $data['child_arr'] = $chils_arr;
    }
    $main_array = array();

    $data['quotation_details'] = $quotation_details;

    for ($ses = 0; $ses < count($sess_Arr); $ses++) {
        $main_array[$ses]['quotation_descipline_details'] = $sess_Arr[$ses];
        $tp = $sess_Arr[$ses];
        $main_array[$ses]['services'] = $sess_Arr[$ses];
        $qryses = "SELECT count(QS.discipline_type_id) AS total_session,QS.*,D.description FROM `quotation_session_details` QS LEFT JOIN disipline_details D ON D.id=QS.discipline_type_id WHERE QS.`quotation_discipline_id` ='" . $tp->id . "' GROUP BY service_id";
        $grp_arr = $ci->Database->select_qry_array($qryses);
        $main_array[$ses]['descipline_details'] = $grp_arr;
    }
    $session_qry = "SELECT QS.*,Q.category_id FROM `quotation_session_details` QS LEFT JOIN quotation_discipline_details Q ON Q.id=QS.quotation_discipline_id WHERE QS.`quotation_id` =$quotation_id";
    $session_qryarr = $ci->Database->select_qry_array($session_qry);
    $data['all_details'] = $main_array;
    $data['sheduling'] = $session_qryarr;
    if ($add_receipt == 'Yes') {
        $qry_his = "SELECT * FROM `payment_history` WHERE quotation_id=$quotation_id ORDER BY id DESC LIMIT 1";
        $data['payment_his'] = $ci->Database->select_qry_array($qry_his);
    }
    $view = $ci->load->view('receipt_pdf', $data, true);
    return $view;
}

function receipt_html_body($child_id = '', $electronic_link_id = '', $quotation_details_id = '') {
    $ci = load_Database();
    $html = '';
    if ($electronic_link_id > 0) {
        $qryelc = "SELECT * FROM `electronic_mail` WHERE id=$electronic_link_id";
        $electronic_link_arr = $ci->Database->select_qry_array($qryelc);
        $qquery = "SELECT QS.*,SB.sub_category_name  FROM `quotation_discipline_details` QS LEFT JOIN subcategory SB ON QS.category_id=SB.category_id AND SB.id=QS.sub_category_id  WHERE QS.`quotation_id`=$quotation_details_id";
        $subcat_arr = $ci->Database->select_qry_array($qquery);
        $subject = '' . $subcat_arr[0]->sub_category_name . ' - Sensation Station&nbsp;';

        $qry_quo = "SELECT QS.*,D.description,E.employee_name FROM `quotation_session_details` QS LEFT JOIN employee_details E ON E.id=QS.staff_id LEFT JOIN disipline_details D ON D.id=QS.discipline_type_id WHERE QS.`quotation_id`=$quotation_details_id";
        $quotation_arr = $ci->Database->select_qry_array($qry_quo);
        $parent_name = '';
        if ($electronic_link_arr[0]->father_name != '') {
            $parent_name = $electronic_link_arr[0]->father_name;
        } else if ($electronic_link_arr[0]->mother_name != '') {
            $parent_name = $electronic_link_arr[0]->mother_name;
        } else {
            $parent_name = $electronic_link_arr[0]->guardians_name;
        }
        $location_url = "https://www.google.ae/maps/dir/''/sensation+station+dubai+center/@25.0406666,55.0469017,12z/data=!3m1!4b1!4m8!4m7!1m0!1m5!1m1!1s0x3e5f1322cab243c1:0x47e7c3bae5fac691!2m2!1d55.116942!2d25.040683";

        $staff_desc = '';
        $mail_table = '';
        for ($des = 0; $des < count($quotation_arr); $des++) {
            $t_tmp = $quotation_arr[$des];
            $staff_desc = $staff_desc . '{' . $quotation_arr[$des]->employee_name . ', ' . $quotation_arr[$des]->description . '}, ';
        }
        $html = '';
        $html = $html . '<p>Dear Parent,</p>
<p>Warm welcome from Sensation Station!</p>
<p>Thank you for contacting our center, this email confirms that a ' . $subcat_arr[0]->sub_category_name . '&nbsp;<strong>(only parent/s need to be present)&nbsp;</strong>has been booked with&nbsp;<strong>' . $staff_desc . '&nbsp;</strong>with the details below.</p>';
        $html = $html . '<table style="height: 70px;border-color:blue;" border="1px;" width="609">
    <tbody>
    <tr>
    <td style="width: 92px; padding-left: 30px;"><strong>Date(s)</strong></td>
    <td style="width: 79px; padding-left: 30px;"><strong>Time</strong></td>
    <td style="width: 81px; padding-left: 30px;"><strong>Days</strong></td>
    <td style="width: 79px; padding-left: 30px;"><strong>Cost</strong></td>
    <td style="width: 99px; padding-left: 30px;"><strong>Services</strong></td>
    </tr>';

        for ($des = 0; $des < count($quotation_arr); $des++) {
            $t_tmp = $quotation_arr[$des];
            $html = $html . '<tr>
    <td style="width: 121px;">&nbsp;' . date('d/m/Y', strtotime($t_tmp->session_date)) . '</td>
    <td style="width: 108px;">&nbsp;' . date('H:i', strtotime($t_tmp->start_time)) . ' - ' . date('H:i', strtotime($t_tmp->end_time)) . '</td>
    <td style="width: 110px;">&nbsp;' . date('D', strtotime($t_tmp->session_date)) . '</td>
    <td style="width: 108px;">&nbsp;' . $t_tmp->services_fee . '</td>
    <td style="width: 128px;">&nbsp;' . $t_tmp->description . '</td>
    </tr>';
        }
        $html = $html . '</tbody>
    </table>';
        $html = $html . '<p>You will also be asked to provide us with a copy of the parent&rsquo;s Emirate&rsquo;s ID (copy for each parent/one parent), so please bring these documents with you on the day.</p>
<p><u>Payment options:</u>&nbsp;Cheque/Bank Transfer/Cash or Card. Please see attached invoice for billing reference.</p>
<p>Please find below links for the location map and facilities picture guide of Sensation Station for your reference.&nbsp;Valet parking is available and is chargeable after the first 30 minutes. Also behind the building you will find free Robotic Parking.</p>
<p>Kindly note, if you are unable to attend this meeting, and fail to inform us, we will re-allocate your referral to the bottom of the waiting list.</p>
<p><strong>Click here to fill online registration form</strong>&nbsp;&nbsp;&nbsp;<a href="' . base_url() . 'Customer/customer_reg/' . $electronic_link_id . '/' . $quotation_details_id . '">Click Here</a></p>
<p><strong>Click here to view location map</strong>&nbsp;&nbsp;&nbsp;<a href="' . $location_url . '">Click Here</a>&nbsp;</p>
<p><strong>Click here to&nbsp; view facilities picture guide&nbsp;</strong><a href="' . base_url() . 'files/images/sensation-Station-facilities-picture-guide.pdf">Click Here</a>&nbsp;</p>';






        $email_id = $electronic_link_arr[0]->father_email;
    } else {
        $child_q = "SELECT C.*,C.id AS child_id,P.* FROM `child_details` C LEFT JOIN parent_details P ON C.id=P.child_id WHERE C.id=" . $child_id;
        $chils_arr = $ci->Database->select_qry_array($child_q);
        $qry_quo = "SELECT QS.*,D.description,E.employee_name FROM `quotation_session_details` QS LEFT JOIN employee_details E ON E.id=QS.staff_id LEFT JOIN disipline_details D ON D.id=QS.discipline_type_id WHERE QS.`quotation_id`=$quotation_details_id";
        $quotation_arr = $ci->Database->select_qry_array($qry_quo);
        $email_id = $chils_arr[0]->father_personal_email;


        $subject = '' . $chils_arr[0]->child_name . ' quotation sensation sation&nbsp;';
        $html = '<p>Dear Parent,</p>
<p>Hope you are well. Please see attached invoice for ' . $quotation_arr[0]->description . ' session with Masnoena for the dates mentioned in the invoice.</p>
<p><strong>Payment options:</strong> Cash / Cheque / Bank Transfer / Credit Card.</p>
<p>If paying by cheque you can address it to: <span style="text-decoration: underline;"><strong>&ldquo;SENSATION STATION CENTER&rdquo;</strong></span>.</p>
<p>If it is through Bank Transfer, please find the attched document for the bank details. If you have any queries you can email or contact us for the details </p>
<p>In line with this, for OUTREACH CLIENTS, we request you to kindly seal the payment in an envelope,<br />stating the child&rsquo;s name and address to Sensation Station.</p>';
    }
    $arr = [$html, $email_id, $subject];
    return $arr;
}

function send_mail_receipt_amount_paid($quotation_id = '') {
    $file_path = make_pdf_and_save_by_quotation_id($quotation_id, $add_receipt = 'Yes');
    $qd = get_quotation_deatils_by_quotation_id($quotation_id);
    $body_html = ' <p>Dear  Parents</p>
    <p>Thank you for your recent payment, please find attached your receipt.&nbsp;</p>
    <!--<p>Receipt Number &nbsp; &nbsp; &nbsp;: ' . $qd->receipt_no . '</p>
    <p>Receipt Amount &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: ' . $qd->total . '</p>-->
    <p>Regards,</p>
    <p>Sensation Center</p>';
    $subject = $qd->child_name . ' Receipt – Sensation Station';
    send_mail($qd->father_personal_email, $subject, $body_html, $file_path);
}

function send_mail_cancelled_session($quotation_id = '') {
    $file_path = make_pdf_and_save_by_quotation_id($quotation_id, $add_receipt = 'Yes');
    $qd = get_quotation_deatils_by_quotation_id($quotation_id);
    $session_array = get_session_array_value();
    $body_html = ' <p>Dear ' . $qd->father_name . '</p>
    <p>Please be note that one of the session has been cancelled by &nbsp; ' . $session_array[0]->employee_name . ' For ' . $qd->child_name . '. Please find the attachement.&nbsp;</p>
    <p>Receipt Number &nbsp; &nbsp; &nbsp;: ' . $qd->receipt_no . '</p>
    <p>Receipt Amount &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: ' . $qd->total . '</p>
    <p>Regards,</p>
    <p>Sensation Center</p>';
    $subject = 'Sensation Session Cancelled Details';
    send_mail($qd->father_personal_email, $subject, $body_html, $file_path);
}

function receipt_footer_html() {
    $html = '';
    $html = $html . ' <table width="1003" align="center" cellpadding="0" cellspacing="0" dir="ltr" >';
    $html = $html . '  <tr>';
    $html = $html . '        <td align="left" valign="top" style=" font-family:"Open Sans "; padding: 8px 10px;"><h4 style="font-size:9px; color:#525252;">CANCELLATION POLICY:</h4>';
    $html = $html . '               <p style="font-size:9px; padding:0 0px 3px; margin:0px;  color:#525252;">';
    $html = $html . '                Prior notice must be given for cancellation. Please see below the the charges: <br>';

    $html = $html . '                More than 24 hours prior notice - No charge<br>';

    $html = $html . '                Less than 24 hours prior notice - 50% <br>';
    $html = $html . '                No Show - 100% <br>';
    $html = $html . '              </p>';


    $html = $html . '        </td>';
    $html = $html . '    </tr>';
    $html = $html . '    </table>';
    return $html;
}

function send_session_cancel_mail($quotation_id = '', $child_id = '', $email = '', $therapist = '') {

    $ci = load_Database();
    $quotq = "SELECT * FROM quotation_details WHERE quotation_id=" . $quotation_id;
    $quotation_details = $ci->Database->select_qry_array($quotq);

    $tp = "SELECT employee_name FROM employee_details WHERE id=" . $therapist;
    $tp_details = $ci->Database->select_qry_array($tp);

    $qry = "SELECT C.*,P.* FROM child_details C LEFT JOIN `parent_details` P ON P.child_id=C.id WHERE C.id=$child_id";

    $parent_details = $ci->Database->select_qry_array($qry);

    $html = '';
    $html = $html . ' <p>Dear All,</p>';
    $html = $html . ' <p>Please be note that a one of the session has been cancelled by ' . $tp_details[0]->employee_name . '</p>';
    $html = $html . ' <p>Receipt number &nbsp; : ' . $quotation_details[0]->receipt_no . '</p>';
    $html = $html . ' <p>&nbsp;</p>';
    $html = $html . ' <p>Regards,</p>';
    $html = $html . ' <p>Sensation Center</p>';
    $subject = 'Sensation one session has been cancelled';
    send_mail($email, $subject, $html, $file_path = '');
}

function send_therapy_notification_mail($qid = '', $sid = '', $child_name = '', $email = '', $staffname = '') {

    $html = '';
    $html = $html . ' <p>Dear ' . $staffname . ',</p>';
    $html = $html . ' <p>Please be note that therapy note missing for</p>';
    $html = $html . ' <p>Quatation No: ' . $qid . '</p>';
    $html = $html . ' <p>Session No: ' . $sid . '</p>';
    $html = $html . ' <p>Student: ' . $child_name . '</p>';
    $html = $html . ' <p>Please update ASAP</p>';
    $html = $html . ' <p>&nbsp;</p>';
    $html = $html . ' <p>Regards,</p>';
    $html = $html . ' <p>Sensation Center</p>';
    $subject = 'Therapy note missing';
    send_mail($email, $subject, $html, $file_path = '');
}

function get_birth_notification_mail_html($d, $emp) {
    if ($emp == 'employeee') {
        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Birthday Greetings</title>
        </head>
        
        <body>
        
        <table width="753" align="center" cellpadding="0" cellspacing="0" dir="ltr">
          <tr>
            <td><table width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td height="135" align="left" valign="middle" style="padding-left:35px;"><h3 style="font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#660066; ">Dear ' . $d->employee_name . ',</h3></td>
            <td width="350" height="135" align="right" valign="middle"><img style="margin-right:35px" src="http://dev.granddubai.com/sensation/images/birthday-greetings_headerlofgo.jpg" /></td>
          </tr>
         
        </table>
        </td>
          </tr>
          <tr>
            <td><img src="http://dev.granddubai.com/sensation/images/birthday-greetings.jpg" /></td>
          </tr>
        </table>
        </body>
    </html>';
    } elseif ($emp == 'Male') {

        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Birthday Greetings</title>
    </head>
    
    <body>
    
    <table width="753" align="center" cellpadding="0" cellspacing="0" dir="ltr">
      <tr>
        <td><table width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td height="135" align="left" valign="middle" style="padding-left:35px;"><h3 style="font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#660066; ">Dear ' . $d->child_name . ',</h3></td>
        <td width="350" height="135" align="right" valign="middle"><img style="margin-right:35px" src="http://dev.granddubai.com/sensation/images/birthday-greetings_headerlofgo.jpg" /></td>
      </tr>
     
    </table>
    </td>
      </tr>
      <tr>
        <td><img src="http://dev.granddubai.com/sensation/images/birthday-greetings_boys.jpg" /></td>
      </tr>
    </table> 
    
    </body>
    </html>';
    } elseif ($emp == 'Female') {
        $html = '<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Birthday Greetings</title>
    </head>
    
    <body>
    
    <table width="753" align="center" cellpadding="0" cellspacing="0" dir="ltr">
      <tr>
        <td><table width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td height="135" align="left" valign="middle" style="padding-left:35px;"><h3 style="font-family:Arial, Helvetica, sans-serif; font-size:20px; color:#660066; ">Dear ' . $d->child_name . ',</h3></td>
        <td width="350" height="135" align="right" valign="middle"><img style="margin-right:35px" src="http://dev.granddubai.com/sensation/images/birthday-greetings_headerlofgo.jpg" /></td>
      </tr>
     
    </table>
    </td>
      </tr>
      <tr>
        <td><img src="http://dev.granddubai.com/sensation/images/birthday-greetings_girls.jpg" /></td>
      </tr>
    </table> 
    
    </body>
    </html>';
    }
    return $html;
}

function send_policy_mail_to_all() {
    $ci = load_Database();
    $sendq = "SELECT email FROM employee_details";
    $send_mail = $ci->Database->select_qry_array($sendq);

    $url = base_url() . 'Home/accept_policy_procedure';
    $html = '';
    $html = $html . ' <p>Dear Team,</p>';
    $html = $html . ' <p>Please be note that, our policy procedure has been changed. So please accept using below link. Please make sure that your are logged in.</p>';
    $html = $html . ' <p>Link: ' . $url . '</p>';
    $subject = 'Policy procedure has been changed';
    foreach ($send_mail as $key => $value) {
        send_mail($value->email, $subject, $html, $file_path = '');
    }
}

function notification_policy($id = '') {
    $ci = load_Database();
    $sendq = "SELECT accept FROM policy_acceptance WHERE employee_id=" . $id;
    $send_mail = $ci->Database->select_qry_array($sendq);
    if (isset($send_mail[0]->accept) && $send_mail[0]->accept != '') {
        $procedure = $send_mail[0]->accept;
    } else {
        $procedure = '';
    }
    if ($procedure == '') {
        return 1;
    }
}
