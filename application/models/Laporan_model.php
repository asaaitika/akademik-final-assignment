<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

	function get($where=array()){
		$this->db->select('h.*, i.nama_lengkap, i.nis, j.kelas, k.mata_pelajaran, k.kkm, l.*')
				->from('nilai detail h')
                ->join('siswa i','i.nisn = h.siswa_id')
                ->join('kelas j','j.id_kelas = l.kelas_id')
                ->join('mapel k','k.id_mapel = l.mapel_id')
				->join('nilai_header l','l.nilai_id=h.nilai_id');
			if(count($where)> 0)
			$this->db->where($where);

			$this->db->group_by('h.siswa_id');

			$res = $this->db->get();

			echo $this->db->last_query();
			return $res->result();
    }
    
    function getM($where=array()){
		$this->db->select('h.*, p.namaPelanggan, sum(i.qty * i.hargaSatuan) as TotalSatuan')
				->from('nilai_header h')
                ->join('siswa i','p.pelangganId = h.idPelanggan')
                ->join('kelas j','p.pelangganId = h.idPelanggan')
                ->join('mapel k','p.pelangganId = h.idPelanggan')
				->join('nilai_detail l','l.nilai_id=h.nilai_id');
			if(count($where)> 0)
			$this->db->where($where);

			$this->db->group_by('l.siswa_id');

			$res = $this->db->get();

			echo $this->db->last_query();
			return $res->result();
	}

}
