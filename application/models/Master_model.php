<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_model extends CI_Model {

    // START CRUD DATA MATA PELAJARAN
    public function getMapel(){
        $query = "SELECT mapel.*, guru.nama_lengkap
                    From mapel JOIN guru
                    ON mapel.guru_id = guru.id_guru
                    ";
        
        return $this->db->query($query)->result_array();
    }

    public function delMapel($id){
        $this->db->where('id_mapel', $id);
        $this->db->delete('mapel');
    }

    public function updMapel($id, $data){
        $this->db->where('id_mapel', $id);
        $this->db->update('mapel', $data);
    }
    // END CRUD DATA MATA PELAJARAN

    // START CRUD DATA TAHUN AKADEMIK
    public function getTakad(){
        $query = "SELECT * From tahun_akademik";
        
        return $this->db->query($query)->result_array();
    }

    public function delTakad($id){
        $this->db->where('id_takad', $id);
        $this->db->delete('tahun_akademik');
    }

    public function updTakad($id, $data){
        $this->db->where('id_takad', $id);
        $this->db->update('tahun_akademik', $data);
    }
    // END CRUD DATA TAHUN AKADEMIK

    // START CRUD DATA KELAS
    public function getKelas(){
        $query = "SELECT * From kelas";
        
        return $this->db->query($query)->result_array();
    }

    public function delKelas($id){
        $this->db->where('id_kelas', $id);
        $this->db->delete('kelas');
    }

    public function updKelas($id, $data){
        $this->db->where('id_kelas', $id);
        $this->db->update('kelas', $data);
    }
    // END CRUD DATA KELAS

    // START CRUD DATA PREDIKAT NILAI
    public function getPreNil(){
        $query = "SELECT * From predikat_nil";
        
        return $this->db->query($query)->result_array();
    }

    public function delPreNil($id){
        $this->db->where('id_predikat', $id);
        $this->db->delete('predikat_nil');
    }

    public function updPreNil($id, $data){
        $this->db->where('id_predikat', $id);
        $this->db->update('predikat_nil', $data);
    }
    // END CRUD DATA PREDIKAT NILAI

}

?>