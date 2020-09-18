<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct(){
		parent::__construct();

        check_logged();
        $this->load->model('Laporan_model');
        $this->load->model('Admin_model');
        $this->load->model('Master_model');
    }

    // BEGIN LAPORAN
    public function nilaisiswa(){
        $data['title'] = 'Laporan Data Nilai Per-Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['siswa'] = $this->Admin_model->getSiswa();
        $data['takad'] = $this->Master_model->getTakad();
    
        $this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar-admin', $data);
        $this->load->view('templates/topbar-admin', $data);
        $this->load->view('laporan/daftar-penilaian', $data);
        $this->load->view('templates/footer-datatables');
    }

    public function nilaimapel(){
        $data['title'] = 'Laporan Data Nilai Per-Mata Pelajaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['mapel'] = $this->Master_model->getMapel();
        $data['takad'] = $this->Master_model->getTakad();

        $this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar-admin', $data);
        $this->load->view('templates/topbar-admin', $data);
        $this->load->view('laporan/daftar-penilaian-mapel', $data);
        $this->load->view('templates/footer-datatables');
    }

    function getList(){
        $kelas_id = $this->input->post('kelas_id');
        $siswa = $this->input->post('siswa');
        $idTakad = $this->input->post('idTakad');
        $semester = $this->input->post('semester');
        $filter = array();

        if($kelas_id != '0')
            $filter['l.kelas_id'] = $kelas_id;
            $filter['h.nama_lengkap'] = $siswa;
            $filter['l.takad_id'] = $idTakad;
            $filter['l.semester'] = $semester;

            $data['penilaian'] = $this->Laporan_model->get($filter);
            
            if($this->input->is_ajax_request())
                $this->load->view('laporan/daftar-penilaian-table',$data); 
            else{
                echo 'print';
            }
    }

    function getListMapel(){
        $kelas_id = $this->input->post('kelas_id');
        $siswa = $this->input->post('mapel');
        $idTakad = $this->input->post('idTakad');
        $semester = $this->input->post('semester');
        $filter = array();

        if($kelas_id != '0')
            $filter['h.idPelanggan'] = $kelas_id;

            $filter['h.tglPesan >= "'.$dateStart.'" AND h.tglPesan <="'.$dateEnd.'"'] = null;

            $data['pesanan'] = $this->Laporan_model->get($filter);
            
            if($this->input->is_ajax_request())
                $this->load->view('laporan/daftar-penilaian-table-mapel',$data); 
            else{
                echo 'print';
                // $html=$this->load->view('laporan/daftar-penilaian-table-mapel',$data,true);
                // $mpdf = new \Mpdf\Mpdf();
                // $mpdf->WriteHTML($html);
                // $mpdf->Output();
            }
    }
    // END OF LAPORAN
}
?>