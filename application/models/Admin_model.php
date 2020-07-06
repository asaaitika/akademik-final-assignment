<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    public $table = "user_level";
    
	public function deleteDataLevel($id)
	{
        $this->db->where('id_level',$id);
        $this->db->delete('user_level');
    }
}
