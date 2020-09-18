<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
        parent::__construct();
        
        check_logged();
        $this->load->model('Admin_model');
        $this->load->model('Master_model');
    }

    // BEGIN DASHBOARD ADMIN
    public function index(){
        $data['title'] = 'Dashboard';

        $a = $this->Admin_model->dataSiswa();
		$b = $this->Admin_model->dataGuru();
		$c = $this->Admin_model->dataUser();
        $d = $this->Admin_model->dataLog();
        $e = $this->Admin_model->dataLogOrderBy();

        $data['data_siswa'] = $a;
        $data['data_guru'] = $b;
        $data['data_user'] = $c;
        $data['data_log'] = $d;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['log'] = $e;

        $this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar-admin', $data);
        $this->load->view('templates/topbar-admin', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer-datatables');
    }
    // END OF DASHBOARD ADMIN

    // BEGIN PROFILE ADMIN
    public function profile(){
        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
        // $this->form_validation->set_rules('password1', 'New Password', 'trim|min_length[6]');
        // $this->form_validation->set_rules('password2', 'Repeat Password', 'min_length[6]|matches[passsword1]');
        
        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar-admin', $data);
            $this->load->view('templates/topbar-admin', $data);
            $this->load->view('admin/profile', $data);
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

                        
                        $this->session->set_flashdata('msg','Data telah Diubah');
                    } 
                }
            }
            else{
                // $this->db->set('image', $new_image);
                $this->db->set('name', $name);
                $this->db->where('email', $email);
                $this->db->update('user');
                
                $this->session->set_flashdata('msg','Data telah Diubah');
            }
            
            redirect('Admin/profile');
        }
    }
    // END OF PROFILE ADMIN

    // BEGIN DATA SISWA
    public function siswa(){
        $data['title'] = 'Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['siswa'] = $this->Admin_model->getSiswa();

        $this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar-admin', $data);
        $this->load->view('templates/topbar-admin', $data);
        $this->load->view('Admin/siswa/list-siswa', $data);
        $this->load->view('templates/footer-datatables');
    }

    public function deleteSiswa($id){
        $this->Admin_model->deleteDataSubMenu($id);
        $this->session->set_flashdata('msg','Berhasil Dihapus');
        helper_log("delete", "Menghapus Data Siswa");

        redirect('Admin/siswa');
    }

    public function addSiswa(){
        $data['title'] = 'Add Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kelas'] = $this->db->get('kelas')->result_array();

        $this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nisn', 'NISN', 'required');
        $this->form_validation->set_rules('nis', 'NIS', 'required');
        $this->form_validation->set_rules('tempat', 'Tempat', 'required');
        $this->form_validation->set_rules('tanggallahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jeniskelamin', 'Jenis', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nohp', 'No Hp', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar-admin', $data);
            $this->load->view('templates/topbar-admin', $data);
            $this->load->view('admin/siswa/form-siswa', $data);
            $this->load->view('templates/footer');
        }else{
            $data = [
                'nama_lengkap' => $this->input->post('namalengkap'),
                'nisn' => $this->input->post('nisn'),
                'nis' => $this->input->post('nis'),
                'tempat_lahir' => $this->input->post('tempat'),
                'tanggal_lahir' => $this->input->post('tanggallahir'),
                'jenis_kelamin' => $this->input->post('jeniskelamin'),
                'agama' => $this->input->post('agama'),
                'alamat' => $this->input->post('alamat'),
                'no_tlp' => $this->input->post('nohp'),
                'kelas_id' => $this->input->post('kelas'),
            ];
        
            $this->db->insert('user', $data);
            $this->session->set_flashdata('msg','Berhasil Ditambahkan');
            helper_log("add", "Menambahkan Data Siswa");

            redirect('Admin/siswa');
        } 
    }
    // END OF DATA SISWA

    // BEGIN DATA GURU
    public function guru(){
        $data['title'] = 'Data Guru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['guru'] = $this->Admin_model->getGuru();

        $this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar-admin', $data);
        $this->load->view('templates/topbar-admin', $data);
        $this->load->view('Admin/guru/list-guru', $data);
        $this->load->view('templates/footer-datatables');

    }

    public function deleteGuru($id){
        $this->Admin_model->deleteDataSubMenu($id);
        $this->session->set_flashdata('msg','Berhasil Dihapus');
        helper_log("delete", "Menghapus Data Guru");

        redirect('Admin/guru');
    }

    public function addGuru(){
        $data['title'] = 'Add Data Guru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('tempat', 'Tempat', 'required');
        $this->form_validation->set_rules('tanggallahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jeniskelamin', 'Jenis', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nohp', 'No Hp', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar-admin', $data);
            $this->load->view('templates/topbar-admin', $data);
            $this->load->view('admin/guru/form-guru', $data);
            $this->load->view('templates/footer');
        }else{
            $data = [
                'nama_lengkap' => $this->input->post('namalengkap'),
                'nip' => $this->input->post('nip'),
                'tempat_lahir' => $this->input->post('tempat'),
                'tanggal_lahir' => $this->input->post('tanggallahir'),
                'jenis_kelamin' => $this->input->post('jeniskelamin'),
                'agama' => $this->input->post('agama'),
                'alamat' => $this->input->post('alamat'),
                'no_tlp' => $this->input->post('nohp'),
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('msg','Berhasil Ditambahkan');
            helper_log("add", "Menambahkan Data Siswa");

            redirect('Admin/guru');
        }
    } 
    // END OF DATA GURU

    // BEGIN JADWAL PELAJARAN
    public function jadwalmapel(){
        $data['title'] = 'Jadwal Pelajaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kelas'] = $this->Master_model->getKelas();

        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('guru', 'Guru Pengampu', 'required');
        $this->form_validation->set_rules('hari', 'Hari', 'required');
        $this->form_validation->set_rules('jam', 'Jam', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar-admin', $data);
            $this->load->view('templates/topbar-admin', $data);
            $this->load->view('admin/jadpel/daftar-jadpel', $data);
            $this->load->view('templates/footer-datatables');
        }else{
            $data = [
                    'kelas_id' => $this->input->post('kelas'),
                    'hari' => $this->input->post('hari'),
                    'mapel_id' => $this->input->post('mapel'),
                    'jam' => implode(',',$this->input->post('jam')),
                    'guru_id' => $this->input->post('guru'),
            ];
            $this->db->insert('jadwal_mapel', $data);
            $this->session->set_flashdata('msg','Berhasil Ditambahkan');
            helper_log("add", "Menambahkan Jadwal Pelajaran");

            redirect('Admin/jadwalmapel');
        }
    }

    public function deleteJadPel($id){
        $this->Admin_model->delJadPel($id);
        $this->session->set_flashdata('msg','Berhasil Dihapus');
        helper_log("delete", "Menghapus Jadwal Pelajaran");

        redirect('Admin/jadwalmapel');
    }

    public function editJadPel($id){
        $data = [
                    'kelas_id' => $this->input->post('kelas'),
                    'hari' => $this->input->post('hari'),
                    'mapel_id' => $this->input->post('mapel'),
                    'jam' => implode(',',$this->input->post('jam')),
                    'guru_id' => $this->input->post('guru'),
        ];

        $this->Admin_model->updJadPel($id, $data);
        $this->session->set_flashdata('msg','Berhasil Diubah');
        helper_log("edit", "Mengubah Jadwal Pelajaran");

        redirect('Admin/jadwalmapel');
    }
    // END OF JADWAL PELAJARAN
}
?>