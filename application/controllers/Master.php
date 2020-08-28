<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function __construct(){
        parent::__construct();
        
        check_logged();
        $this->load->model('Admin_model');
    }

    // BEGIN DASHBOARD ADMIN
    public function index(){
        $data['title'] = 'Dashboard';

        $a = $this->Admin_model->dataSiswa();
		$b = $this->Admin_model->dataGuru();
		$c = $this->Admin_model->dataUser();
        // $d=$this->Admin_model->logActivity();

        $data['data_siswa'] = $a;
        $data['data_guru'] = $b;
        $data['data_user'] = $c;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar-admin', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
    // END OF DASHBOARD ADMIN

}
?>