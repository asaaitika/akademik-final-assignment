<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
        parent::__construct();
        
        check_logged();
    }
    
    // BEGIN DASHBOARD USER
    public function index(){
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    // END OF DASHBOARD USER

    // BEGIN MY PROFILE
    public function myprofile(){
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/my-profile', $data);
        $this->load->view('templates/footer');
    }
    // END OF MY PROFILE

    // BEGIN PROFILE USER
    public function profile(){
        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
        // $this->form_validation->set_rules('password1', 'New Password', 'trim|min_length[6]');
        // $this->form_validation->set_rules('password2', 'Repeat Password', 'min_length[6]|matches[passsword1]');
        
        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/profile', $data);
            $this->load->view('templates/footer');
        }else{
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $upload_image = $_FILES['image']['name'];
            $currpassword = $this->input->post('password');
            $newpassword = $this->input->post('password1');
            $new2password = $this->input->post('password2');
            
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

            $pass = $data['user']['password'];

            if ($currpassword !== '') 
            {   
                if ($currpassword != $pass) {
                     $this->session->set_flashdata('psn','Wrong current password!');
                }
                else{
                    if($currpassword == $newpassword){
                        $this->session->set_flashdata('psn','New password cannot be the same as current password!');
                    }
                    else{
                        // $password_hash = password_hash($newpassword, PASSWORD_DEFAULT);
                        $this->db->set('password', $newpassword);
                        // $this->db->set('image', $new_image);
                        $this->db->set('name', $name);
                        $this->db->where('email', $email);
                        $this->db->update('user');  

                        $this->session->set_flashdata('msg','Data telah diubah');
                    } 
                }
            }
            else{
                // $this->db->set('image', $new_image);
                $this->db->set('name', $name);
                $this->db->where('email', $email);
                $this->db->update('user');

                $this->session->set_flashdata('msg','Data telah diubah');
            }

            redirect('User/profile');
        }
    }
    // END OF PROFILE USER
}
?>