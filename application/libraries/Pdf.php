<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pdf {

    function pdf() {
        $CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }

    function load($param = NULL) {
        $server_path = $_SERVER['DOCUMENT_ROOT'] . '/sensation/';
        include_once $server_path . 'application/third_party/PDF/mpdf.php';
        if ($params == NULL) {
            $param = '"en-GB-x","A4","","",10,10,10,10,6,3';
        }
        return new mPDF($param);
    }

}
