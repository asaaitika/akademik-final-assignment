<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Log_Model extends CI_Model {
 
    public function save_log($param)
    {
        $sql        = $this->db->insert_string('log_activity',$param);
        // print_r($sql);
        $ex         = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }
}