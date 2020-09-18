<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

	public function __construct(){
		parent::__construct();

        check_logged();
        $this->load->model('Penilaian_model');
        $this->load->model('Master_model');
        $this->load->model('Admin_model');
    }

    // BEGIN PENILAIAN
    public function index(){
        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['mapel'] = $this->Master_model->getMapel();
        $data['siswa'] = $this->Admin_model->getSiswa();
        $data['takad'] = $this->Master_model->getTakad();

        $this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar-admin', $data);
        $this->load->view('templates/topbar-admin', $data);
        $this->load->view('penilaian/form-penilaian', $data);
        $this->load->view('templates/footer-datatables');
    }
 
}
?>