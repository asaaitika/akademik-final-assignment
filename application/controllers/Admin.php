<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
        parent::__construct();
        
        check_logged();
        $this->load->model('Admin_model');
    }

    public function index(){
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function level(){
        $data['title'] = 'Level';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_level')->result_array();
        $this->form_validation->set_rules('levelname', 'Level', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/level', $data);
            $this->load->view('templates/footer-datatables');
        }
        else{
            $this->db->insert('user_level', ['level_name' => $this->input->post('levelname')]);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <p>Level Berhasil Ditambahkan</p>
                </div>');

            redirect('admin/level');
        }
        }

        public function accessLevel($role_id){
        $data['title'] = 'Level Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_level', ['id_level' => $role_id])->row_array();
        
        // $this->db->where('menu !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();
        
        
        $this->form_validation->set_rules('levelname', 'Level', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/level-access', $data);
            $this->load->view('templates/footer-datatables');
        }
        else{
            $this->db->insert('user_level', ['level_name' => $this->input->post('levelname')]);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <p>Level Berhasil Ditambahkan</p>
                </div>');

            redirect('admin/level');
        }
        }

        public function deleteLevel($id){
        $this->Admin_model->deleteDataLevel($id);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <p>Level Berhasil Dihapus</p>
                </div>');
        redirect('admin/level');
        }

}
?>