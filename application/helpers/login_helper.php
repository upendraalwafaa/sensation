<?php
/*
  Project Name : Sensation Sation
  Company Name : alwafaagroup
  Author: Upendra Kumar Prasad
  file Name : login_helper.php(Helper)
  Project URI: http://demo.softwarecompany.ae/sensation/
  Description : It's validate the session managment details 
 */
function is_logged_in() {
    $CI = & get_instance();
    $user = $CI->session->userdata('logged_in');
    if (!isset($user)) {
        redirect('/sensation/login');
    }
}
