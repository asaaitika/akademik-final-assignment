<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct(){
		parent::__construct();

        check_logged();
        $this->load->model('Menu_model');
    }
    public function index(){
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('namemenu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer-datatables');
        }
        else{
            $this->db->insert('user_menu', ['menu' => $this->input->post('namemenu')]);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <p>Menu Berhasil Ditambahkan</p>
                </div>');

            redirect('menu');
        }
    }

    public function deleteMenu($id){
        $this->Menu_model->deleteDataMenu($id);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <p>Menu Berhasil Dihapus</p>
                </div>');
        redirect('menu');
    }

    public function editMenu($id){
        $this->Menu_model->editDataMenu($id);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <p>Menu Berhasil Diubah</p>
                </div>');
        redirect('menu');
    }

    public function subMenu(){
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['submenu'] = $this->Menu_model->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer-datatables');
        }else{
            $active = $this->input->post('is_active');
            if ($active == '') {
                $a = '0';
                $data = [
                            'title' => $this->input->post('title'),
                            'menu_id' => $this->input->post('menu_id'),
                            'url' => $this->input->post('url'),
                            'icon' => $this->input->post('icon'),
                            'is_active' => $a,
            ];
            }else{
                $data = [
                            'title' => $this->input->post('title'),
                            'menu_id' => $this->input->post('menu_id'),
                            'url' => $this->input->post('url'),
                            'icon' => $this->input->post('icon'),
                            'is_active' => $this->input->post('is_active'),
            ];
            }
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <p>Submenu Berhasil Ditambahkan</p>
                </div>');

            redirect('menu/submenu');
        }
    }

    public function deleteSubMenu($id){
        $this->Menu_model->deleteSubDataMenu($id);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <p>Submenu Berhasil Dihapus</p>
                </div>');
        redirect('menu/submenu');
    }
}
?>