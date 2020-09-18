<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian_model extends CI_Model {

	function get($where=array()){
		
		$this->db->select('h.*, p.namaPelanggan, sum(i.qty * i.hargaSatuan) as TotalSatuan')
				->from('pesanan h')
				->join('pelanggan p','p.pelangganId = h.idPelanggan')
				->join('pesanandetail i','i.idPesanan=h.idPesanan');
			if(count($where)> 0)
			$this->db->where($where);

			$this->db->group_by('h.idPesanan');

			$res = $this->db->get();

			echo $this->db->last_query();
			return $res->result();
	}

}
