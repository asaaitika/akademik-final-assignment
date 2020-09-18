<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function __construct(){
        parent::__construct();
        
        check_logged();
        $this->load->model('Master_model');
    }

    // BEGIN DATA MATA PELAJARAN
    public function mapel(){
        $data['title'] = 'Data Mata Pelajaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['mapel'] = $this->Master_model->getMapel();
        $data['guru'] = $this->db->get('guru')->result_array();

        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('guru_id', 'Pengajar', 'required');
        $this->form_validation->set_rules('kkm', 'KKM', 'required');
        $this->form_validation->set_rules('jp', 'Jam Pelajaran', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar-admin', $data);
            $this->load->view('templates/topbar-admin', $data);
            $this->load->view('master-data/mapel', $data);
            $this->load->view('templates/footer-datatables');
        }else{
            
            $data = [
                        'mata_pelajaran' => $this->input->post('mapel'),
                        'guru_id' => $this->input->post('guru_id'),
                        'kkm' => $this->input->post('kkm'),
                        'jam_pelajaran' => $this->input->post('jp'),
                ];  

            $this->db->insert('mapel', $data);
            $this->session->set_flashdata('msg','Berhasil Ditambahkan');
            helper_log("add", "Menambahkan Data Mata Pelajaran");

            redirect('Master/mapel');
        }
    }

    public function deleteMapel($id){
        $this->Master_model->delMapel($id);
        $this->session->set_flashdata('msg','Berhasil Dihapus');
        helper_log("delete", "Menghapus Data Mata Pelajaran");
        
        redirect('Master/mapel');
    }

    public function editMapel($id){
        $data = [
                'mata_pelajaran' => $this->input->post('mapel'),
                'guru_id' => $this->input->post('guru_id'),
                'kkm' => $this->input->post('kkm'),
                'jam_pelajaran' => $this->input->post('jp'),
        ];
        $this->Master_model->updMapel($id, $data);
        $this->session->set_flashdata('msg','Berhasil Diubah');
        helper_log("edit", "Mengubah Data Mata Pelajaran");

        redirect('Master/mapel');
    }
    // END OF DATA MATA PELAJARAN

    // BEGIN DATA TAHUN AKADEMIK
    public function tahunakademik(){
        $data['title'] = 'Data Tahun Akademik';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['takad'] = $this->Master_model->getTakad();

        $this->form_validation->set_rules('takad', 'Title', 'required');
        $this->form_validation->set_rules('semester', 'Menu', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar-admin', $data);
            $this->load->view('templates/topbar-admin', $data);
            $this->load->view('master-data/thn-akd', $data);
            $this->load->view('templates/footer-datatables');
        }else{
                $data = [
                            'tahun_akademik' => $this->input->post('takad'),
                            'semester' => $this->input->post('semester'),
                            'mulai_takad' => $this->input->post('mulai_takad'),
                            'akhir_takad' => $this->input->post('akhir_takad'),
                            'is_active' => $this->input->post('is_active'),
                 ];

            $this->db->insert('tahun_akademik', $data);
            $this->session->set_flashdata('msg','Berhasil Ditambahkan');
            helper_log("add", "Menambahkan Data Tahun Akademik");
            redirect('Master/tahunakademik');
        }
    }

    public function deleteTakad($id){
        $this->Master_model->delTakad($id);
        $this->session->set_flashdata('msg','Berhasil Dihapus');
        helper_log("delete", "Mengubah Data Tahun Akademik");
        redirect('Master/tahunakademik');
    }

    public function editTakad($id){
        $data = [
                    'tahun_akademik' => $this->input->post('takad'),
                    'semester' => $this->input->post('semester'),
                    'mulai_takad' => $this->input->post('mulai_takad'),
                    'akhir_takad' => $this->input->post('akhir_takad'),
                    'is_active' => $this->input->post('is_active'),
            ];


        $this->Master_model->updTakad($id, $data);
        $this->session->set_flashdata('msg','Berhasil Diubah');
        helper_log("edit", "Mengubah Data Tahun Akademik");

        redirect('Master/tahunakademik');
    }
    // END OF DATA TAHUN AKADEMIK

    // BEGIN DATA KELAS
    public function kelas(){
        $data['title'] = 'Data Kelas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kelas'] = $this->Master_model->getKelas();

        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('tingkat', 'Tingkat', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar-admin', $data);
            $this->load->view('templates/topbar-admin', $data);
            $this->load->view('master-data/kelas', $data);
            $this->load->view('templates/footer-datatables');
        }else{
            $data = [
                        'kelas' => $this->input->post('kelas'),
                        'tingkat' => $this->input->post('tingkat'),
                ];
            $this->db->insert('kelas', $data);
            $this->session->set_flashdata('msg','Berhasil Ditambahkan');
            helper_log("add", "Menambahkan Data Kelas");

            redirect('Master/kelas');
        }
    }

    public function deleteKelas($id){
        $this->Master_model->delKelas($id);
        $this->session->set_flashdata('msg','Berhasil Dihapus');
        helper_log("delete", "Menghapus Data Kelas");
        redirect('Master/kelas');
    }

    public function editKelas($id){
            $data = [
                        'kelas' => $this->input->post('kelas'),
                        'tingkat' => $this->input->post('tingkat'),
            ];
            
        $this->Master_model->updKelas($id, $data);
        $this->session->set_flashdata('msg','Berhasil Diubah');
        helper_log("edit", "Mengubah Data Kelas");

        redirect('Master/kelas');
    }
    // END OF DATA KELAS

    // BEGIN DATA PREDIKAT NILAI
    public function predikatnilai(){
        $data['title'] = 'Data Predikat Nilai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['prenil'] = $this->Master_model->getPreNil();

        $this->form_validation->set_rules('predikat', 'Predikat', 'required');
        $this->form_validation->set_rules('nil_awal', 'Nilai Awal', 'required');
        $this->form_validation->set_rules('nil_awal', 'Nilai Akhir', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar-admin', $data);
            $this->load->view('templates/topbar-admin', $data);
            $this->load->view('master-data/predikat-nil', $data);
            $this->load->view('templates/footer-datatables');
        }else{
            $nil1 = $this->input->post('nil_awal');
            $nil2 = $this->input->post('nil_akhir');
            $ket = $nil1 . ' < X < ' . $nil2;
                $data = [
                    'predikat' => $this->input->post('predikat'),
                    'nil_awal' => $this->input->post('nil_awal'),
                    'nil_akhir' => $this->input->post('nil_akhir'),
                    'keterangan' => $ket,            
                ];

            $this->db->insert('predikat_nil', $data);
            $this->session->set_flashdata('msg','Berhasil Ditambahkan');
            helper_log("add", "Menambahkan Data Predikat Nilai");

            redirect('Master/predikatnilai');
        }
    }

    public function deletePreNil($id){
        $this->Master_model->delPreNil($id);
        $this->session->set_flashdata('msg','Berhasil Dihapus');
        helper_log("delete", "Mengubah Data Predikat Nilai");
        redirect('Master/predikatnilai');
    }

    public function editPreNil($id){
        $nil1 = $this->input->post('nil_awal');
        $nil2 = $this->input->post('nil_akhir');
        $ket = $nil1 . ' < X < ' . $nil2;
        $data = [
                    'predikat' => $this->input->post('predikat'),
                    'nil_awal' => $this->input->post('nil_awal'),
                    'nil_akhir' => $this->input->post('nil_akhir'),
                    'keterangan' => $ket,
            ];

        $this->Master_model->updPreNil($id, $data);
        $this->session->set_flashdata('msg','Berhasil Diubah');
        helper_log("edit", "Mengubah Data Predikat Nilai");

        redirect('Master/predikatnilai');
    }
    // END OF DATA PREDIKAT NILAI
}
?>