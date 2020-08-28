<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    // KONTEN CARD
    public function dataSiswa(){
        $res = $this->db->count_all_results('siswa');
		return $res;
    }
    
    public function dataGuru(){
        $res = $this->db->count_all_results('guru');
		return $res;
    }
    
    public function dataUser(){
        $res = $this->db->count_all_results('user');
		return $res;
    }
    
    // public function logActivity(){
    //     $res = $this->db->count_all_results('psb');
	// 	return $res;
    // }
    // END KONTEN CARD
}
