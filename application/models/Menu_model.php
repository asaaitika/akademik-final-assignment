<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {
    public $table = "user_menu";
    
	public function deleteDataMenu($id)
	{
    $this->db->where('id_menu',$id);
    $this->db->delete('user_menu');
  }
  
  public function getSubMenu()
  {
    $query = "SELECT user_sub_menu.*, user_menu.menu
                  From user_sub_menu JOIN user_menu
                  ON user_sub_menu.menu_id = user_menu.id_menu
                ";
    
    return $this->db->query($query)->result_array();

  }

  public function deleteSubDataMenu($id){
    $this->db->where('id_sub_menu',$id);
    $this->db->delete('user_sub_menu');
  }
}
