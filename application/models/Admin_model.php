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
    
    public function dataLog(){
        $res = $this->db->count_all_results('log_activity');
		return $res;
    }

    public function dataLogOrderBy(){
        $query = "SELECT *, user.name FROM log_activity JOIN user ON log_activity.user_id = user.email order by log_time desc";
        
        return $this->db->query($query)->result_array();
    }
    // END KONTEN CARD

    // BEGIN SISWA
    public function getSiswa(){
        $query = "SELECT siswa.*, kelas.kelas From siswa JOIN kelas ON siswa.kelas_id = kelas.id_kelas";
        
        return $this->db->query($query)->result_array();
    }

    public function deleteDataSiswa($id){
      $this->db->where('id',$id);
      $this->db->delete('siswa');
    }

    public function editDataSiswa($id){
        $query = "SELECT siswa.*, kelas.kelas
                    From siswa JOIN kelas
                    ON siswa.kelas_id = kelas.id_kelas
                    where kelas_id = $id
                    ";
        
        return $this->db->query($query)->result_array();
    }

    public function updateDataSiswa($id, $data){
        $this->db->where('id', $id);
        $this->db->update('siswa', $data);
    }
    // END OF SISWA
    
    // BEGIN GURU
    public function getGuru(){
        $query = "SELECT * From guru";
        
        return $this->db->query($query)->result_array();
    }

    public function deleteDataGuru($id){
        $this->db->where('id_guru', $id);
        $this->db->delete('guru'); 

    }
    public function editDataGuru($id){
        $query = "SELECT * From guru";
        
        return $this->db->query($query)->result_array();
    }

    public function updateDataGuru($id, $data){
        $this->db->where('id_guru', $id);
        $this->db->update('guru', $data);
    }
    // END OF GURU

    // BEGIN JADPEL
    public function getJadPel(){
        $query = "SELECT * From jadwal_mapel";
        
        return $this->db->query($query)->result_array();
    }

    public function delJadPel($id){
        $this->db->where('id_jadmapel', $id);
        $this->db->delete('jadwal_mapel'); 

    }
    public function updJadPel($id, $data){
        $this->db->where('id_jadmapel', $id);
        $this->db->delete('jadwal_mapel', $data);

    }
    // END OF JADPEL
}
