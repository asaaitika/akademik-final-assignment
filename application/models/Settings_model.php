<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {
  
  // START CRUD DATA MENU
	public function deleteDataMenu($id){
    $this->db->where('id_menu', $id);
    $this->db->delete('user_menu');
  }

  public function updateDataMenu($id, $data){
    $this->db->where('id_menu', $id);
    $this->db->update('user_menu', $data);
  }
  // END CRUD DATA MENU
  
  // START CRUD DATA SUBMENU
  public function getSubMenu(){
    $query = "SELECT user_sub_menu.*, user_menu.menu
                  From user_sub_menu JOIN user_menu
                  ON user_sub_menu.menu_id = user_menu.id_menu
                ";
    
    return $this->db->query($query)->result_array();

  }

  public function deleteDataSubMenu($id){
    $this->db->where('id_sub_menu', $id);
    $this->db->delete('user_sub_menu');
  }

  public function updateDataSubMenu($id, $data){
    $this->db->where('id_sub_menu', $id);
    $this->db->update('user_sub_menu', $data);
  }
  // END CRUD DATA SUBMENU

  // START CRUD DATA LEVEL
	public function deleteDataLevel($id){
      $this->db->where('id_level', $id);
      $this->db->delete('user_level');
  }

  public function updateDataLevel($id, $data){
      $this->db->where('id_level', $id);
      $this->db->update('user_level', $data);
  }
  // END CRUD DATA LEVEL

  // START CRUD DATA USERS
  public function getUsers(){
    $query = "SELECT user.*, user_level.level_name
                  From user JOIN user_level
                  ON user.level_id = user_level.id_level
                ";
    
    return $this->db->query($query)->result_array();

  }
  

	public function deleteDataUsers($id){
      $this->db->where('id',$id);
      $this->db->delete('user');
  }

  public function updateDataUsers($id, $data){
      $this->db->where('id', $id);
      $this->db->update('user', $data);
  }
  // END CRUD DATA USERS
}
