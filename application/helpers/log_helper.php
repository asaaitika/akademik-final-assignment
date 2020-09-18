<?php
    function helper_log($tipe = "", $str = ""){
        
    $ci = get_instance();
 
    if (strtolower($tipe) == "login"){
        $log_tipe   = 0;
    }
    elseif(strtolower($tipe) == "logout")
    {
        $log_tipe   = 1;
    }
    elseif(strtolower($tipe) == "add"){
        $log_tipe   = 2;
    }
    elseif(strtolower($tipe) == "edit"){
        $log_tipe  = 3;
    }
    elseif(strtolower($tipe) == "delete"){
        $log_tipe  = 4;
    }
    elseif(strtolower($tipe) == "access"){
        $log_tipe  = 5;
    }
    elseif(strtolower($tipe) == "cetak"){
        $log_tipe  = 6;
    }
    else{
        $log_tipe  = 7;
    }
 
    $u = $ci->session->userdata('email');
    // echo $u;
    // paramter
    $param['user_id']      = $u;//$ci->session->userdata('name');
    $param['log_tipe']      = $log_tipe;
    $param['log_desc']      = $str;
 
    //load model log
    $ci->load->model('Log_Model');
 
    //save to database
    $ci->Log_Model->save_log($param);
 
}
?>