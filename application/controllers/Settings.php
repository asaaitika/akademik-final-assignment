<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct(){
		parent::__construct();

        check_logged();
        $this->load->model('Settings_model');
    }

    // BEGIN DATA MENU
    public function index(){
        $data['title'] = 'Data Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('namemenu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar-admin', $data);
            $this->load->view('templates/topbar-admin', $data);
            $this->load->view('settings/index', $data);
            $this->load->view('templates/footer-datatables');
        }
        else{
            $this->db->insert('user_menu', ['menu' => $this->input->post('namemenu')]);
            $this->session->set_flashdata('msg','Berhasil Ditambahkan');
            helper_log("add", "Menambahkan Data Menu");

            redirect('Settings');
        }
    }

    public function deleteMenu($id){
        $this->Settings_model->deleteDataMenu($id);
        $this->session->set_flashdata('msg','Berhasil Dihapus');
        helper_log("delete", "Menghapus Data Menu");
        redirect('Settings');
    }

    public function editMenu($id){
        $data = ['menu' => $this->input->post('namemenu')];

        $this->Settings_model->updateDataMenu($id, $data);
        $this->session->set_flashdata('msg','Berhasil Diubah');
        helper_log("edit", "Mengubah Data Menu");
        redirect('Settings');
    }
    // END OF DATA MENU

    // BEGIN DATA SUBMENU
    public function submenu(){
        $data['title'] = 'Data Sub Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['submenu'] = $this->Settings_model->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        // $this->form_validation->set_rules('icon', 'Icon', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar-admin', $data);
            $this->load->view('templates/topbar-admin', $data);
            $this->load->view('settings/submenu', $data);
            $this->load->view('templates/footer-datatables');
        }else{
            $active = $this->input->post('is_active');
            $simbolValues = $_POST['simbol'];
            
            if ($active == '') {
                $a = '0';
                $data = [
                            'title' => $this->input->post('title'),
                            'menu_id' => $this->input->post('menu_id'),
                            'url' => $this->input->post('url'),
                            'icon' => $simbolValues[0],
                            'is_active' => $a,
            ];
            }else{
                $data = [
                            'title' => $this->input->post('title'),
                            'menu_id' => $this->input->post('menu_id'),
                            'url' => $this->input->post('url'),
                            'icon' => $simbolValues[0],
                            'is_active' => $this->input->post('is_active'),
                 ];
            }
            // print_r($data);
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('msg','Berhasil Ditambahkan');
            helper_log("add", "Menambahkan Data Sub Menu");

            redirect('Settings/submenu');
            
        }
    }

    public function deleteSubMenu($id){
        $this->Settings_model->deleteDataSubMenu($id);
        $this->session->set_flashdata('msg','Berhasil Dihapus');
        redirect('Settings/submenu');
    }

    public function editSubMenu($id){
        $active = $this->input->post('is_active');
            if ($active == '') {
                $a = '0';
                $data = [
                            'title' => $this->input->post('title'),
                            'menu_id' => $this->input->post('menu_id'),
                            'url' => $this->input->post('url'),
                            'icon' => implode(',',$this->input->post('simbol')),
                            'is_active' => $a,
            ];
            }else{
                $data = [
                            'title' => $this->input->post('title'),
                            'menu_id' => $this->input->post('menu_id'),
                            'url' => $this->input->post('url'),
                            'icon' => implode(',',$this->input->post('simbol')),
                            'is_active' => $this->input->post('is_active'),
                    ];
            }

        $this->Settings_model->updateDataSubMenu($id, $data);
        $this->session->set_flashdata('msg','Berhasil Diubah');
        helper_log("edit", "Mengubah Data Sub Menu");

        redirect('Settings/submenu');
    }
    // END OF DATA SUBMENU

    // BEGIN DATA LEVEL
    public function level(){
        $data['title'] = 'Data Level';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_level')->result_array();
        $this->form_validation->set_rules('levelname', 'Level', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar-admin', $data);
            $this->load->view('templates/topbar-admin', $data);
            $this->load->view('settings/level/level', $data);
            $this->load->view('templates/footer-datatables');
        }
        else{
            $this->db->insert('user_level', ['level_name' => $this->input->post('levelname')]);
            $this->session->set_flashdata('msg','Berhasil Ditambahkan');
            helper_log("add", "Menambahkan Data Level");

            redirect('Settings/level');
        }
    }

    public function accessLevel($role_id){
        $data['title'] = 'Level Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_level', ['id_level' => $role_id])->row_array();
        
        $this->db->where('id_menu !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();
    
        $this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar-admin', $data);
        $this->load->view('templates/topbar-admin', $data);
        $this->load->view('settings/level/level-access', $data);
        $this->load->view('templates/footer-datatables');
    }

    public function changeAccess(){
        $role_id = $this->input->post('roleId');
        $menu_id = $this->input->post('menuId');

        $data = [
            'level_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $res = $this->db->get_where('user_access_menu', $data);

        if($res->num_rows() < 1){
            $this->db->insert('user_access_menu', $data);
        }else{
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('msg','Berhasil diubah!');
        helper_log("edit", "Mengubah Akses Level");
    }

    public function deleteLevel($id){
        $this->Settings_model->deleteDataLevel($id);
        $this->session->set_flashdata('msg','Berhasil Dihapus');
        helper_log("delete", "Menghapus Data Level");

        redirect('Settings/level');
    }

    public function editLevel($id){
        $data = ['level_name' => $this->input->post('levelname')];

        $this->Settings_model->updateDataLevel($id, $data);
        $this->session->set_flashdata('msg','Berhasil Diubah');
        helper_log("edit", "Mengubah Data Level");

        redirect('Settings/level');
    }
    // END OF DATA LEVEL

    // BEGIN DATA USER
    public function users(){
        $data['title'] = 'Data User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['users'] = $this->Settings_model->getUsers();

        $this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar-admin', $data);
        $this->load->view('templates/topbar-admin', $data);
        $this->load->view('settings/users/list-user', $data);
        $this->load->view('templates/footer-datatables');
    }

    public function deleteUsers($id){
        $this->Settings_model->deleteDataUsers($id);
        $this->session->set_flashdata('msg','Berhasil Dihapus');
        helper_log("delete", "Menghapus Data User");
        redirect('Settings/users');
    }

    public function editUsers($id){
        $data['title'] = 'Edit Data User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['level'] = $this->db->get('user_level')->result_array();
        $data['users'] = $this->Settings_model->editDataUsers($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-admin', $data);
        $this->load->view('templates/topbar-admin', $data);
        $this->load->view('settings/users/edit-user', $data);
        $this->load->view('templates/footer');
    }

    public function updateUsers($id){
        $upload_image = $_FILES['image']['name'];
        
        if($upload_image){
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/profile';
            
            $this->load->library('upload', $config);
            if($this->upload->do_upload('image')){
                $old_image = $data['user']['image'];
                
                if($old_image != 'default.png'){
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }
                
                $new_image = $this->upload->data('file_name');
                // var_dump($upload_image);
                // die;
                $this->db->set('image', $new_image);
            }else{
                echo $this->upload->display_errors();
            }
        }
        
        $data = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'level_id' => $this->input->post('level_id'),
                    'is_active' => $this->input->post('is_active'),
                    'image' => $new_image,
                ];

        $this->Settings_model->updateDataUsers($id, $data);
        $this->session->set_flashdata('msg','Berhasil Diubah');
        helper_log("edit", "Mengubah Data User");
        
        redirect('Settings/users');
    }

    public function addUsers(){
        $data['title'] = 'Add Data User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['level'] = $this->db->get('user_level')->result_array();

		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[user.email]',[
			'is_unique' => 'Alamat Email Ini Sudah Terdaftar '
			//
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[6]|matches[confirmpassword]', [
			'matches' => "Password Tidak Sama!",
			'min_length' => "Password Terlalu Pendek!",
		]);
		$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'trim|min_length[6]|matches[password]');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar-admin', $data);
            $this->load->view('templates/topbar-admin', $data);
            $this->load->view('settings/users/form-user', $data);
            $this->load->view('templates/footer');
        }else{
            $active = $this->input->post('is_active');
            $upload_image = $_FILES['image']['name'];

            if($upload_image){
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile';
                
                $this->load->library('upload', $config);
                if($this->upload->do_upload('image')){
                    $old_image = $data['user']['image'];
                    
                    $new_image = $this->upload->data('file_name');
                }else{
                    echo $this->upload->display_errors();
                }
            }
            
            if ($active == '' || $new_image == '') {
                $a = '0';
                $data = [
                            'email' => $this->input->post('email'),
                            'name' => $this->input->post('name'),
                            'image' => 'default.png',
                            'password' => $this->input->post('password'),
                            'level_id' => $this->input->post('level_id'),
                            'is_active' => $a,
                            'date_created' => time()
            ];
            }
            else if($active == '' || $new_image == ''){

            }
            else{
                $data = [
                            'email' => $this->input->post('email'),
                            'name' => $this->input->post('name'),
                            'image' => $new_image,
                            'password' => $this->input->post('password'),
                            'level_id' => $this->input->post('level_id'),
                            'is_active' => $this->input->post('is_active'),
                            'date_created' => time()
                 ];
            }
            $this->db->insert('user', $data);
            $this->session->set_flashdata('msg','Berhasil Ditambahkan');
            helper_log("add", "Menambahkan Data User");

            redirect('Settings/users');
        }
        
    }
    // END OF DATA USER
}
?>