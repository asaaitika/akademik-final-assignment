<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->library('form_validation');
	}

	// BEGIN LOGIN
	public function index() {
		if ($this->session->userdata('email')) {
			redirect('Admin');
		}

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run() == false){
			$data['title'] = 'Login | Akademik Al-Aqsha';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		}
		else{
			$this->_login();
		}
	}

	private function _login(){
		$email = $this->input->post('email');
		$pw = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		
		$pass = $user['password'];
		// var_dump($pass); die;

		if($user){
			if($user['is_active'] == 1){
				// if(password_verify($pw, $user['password'])){
				if($pw == $pass){
					$data = [
						'email' => $user['email'],
						'level_id' => $user['level_id'],
						'is_active' => $user['is_active']
				];
					$this->session->set_userdata($data);
					if($user['level_id'] == 1){
						redirect('Admin');
					}else{
						redirect('User');
					}
					
				}else{
					$this->session->set_flashdata('msg', 'Password yang anda masukkan salah');
					redirect('Auth');
				}

			}else{
				$this->session->set_flashdata('msg', 'Alamat email belum aktif');
					redirect('Auth');
			}
		}else{
			$this->session->set_flashdata('msg', 'Alamat email yang anda masukkan belum terdaftar');
			redirect('Auth');
		}
	}
	// END OF LOGIN

	// BEGIN REGISTRATION
	// public function register() {
	// 	if ($this->session->userdata('email')) {
	// 		redirect('user');
	// 	}

	// 	$this->form_validation->set_rules('fullname', 'Name', 'required|trim');
	// 	$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
	// 		'is_unique' => 'Alamat Email Ini Sudah Terdaftar '
	// 		//
	// 	]);
	// 	$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[confirmpassword]', [
	// 		'matches' => "Password Tidak Sama!",
	// 		'min_length' => "Password Terlalu Pendek!",
	// 	]);
	// 	$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required|trim|min_length[6]|matches[password]');


	// 	if($this->form_validation->run() == false){
	// 		// $data = array(
	// 		// 	'title' => "Register"
	// 		// );
	// 		// $this->load->view('auth/register', $data);
	// 		$data['title'] = 'Registration | Akademik Al-Aqsha';
	// 		$this->load->view('templates/auth_header', $data);
	// 		$this->load->view('auth/register');
	// 		$this->load->view('templates/auth_footer');
			
	// 	}
	// 	else {
	// 		// echo 'yeah';
	// 		$data = [
	// 			'name' => htmlspecialchars($this->input->post('fullname', true)),
	// 			'email' => htmlspecialchars($this->input->post('email', true)),
	// 			'image' => 'default.png',
	// 			'password' => $this->input->post('password'),
	// 			// 'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
	// 			'level_id' => 2,
	// 			'is_active' => 1,
	// 			'date_created' => time()
	// 	];

	// 	$this->db->insert('user', $data);
	// 	$this->session->set_flashdata('message', 
	// 	'<div class="alert alert-success" role="alert">
	// 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	// 			<span aria-hidden="true">&times;</span>
	// 		</button>
	// 		<h4 class="alert-heading"><i class="far fa-lightbulb"></i>&nbsp;Berhasil!</h4>
	// 		<p>Akun anda sudah dibuat, Silahkan login</p>
	// 	</div>');
	// 	redirect('auth');
	// 	}
	// }
	// END OF REGISTRATION

	// BEGIN BLOCKED PAGE
	public function blocked(){
        $this->load->view('auth/blocked');
	}
	// END OF BLOCKED PAGE

	// BEGIN LOGOUT
	public function logout(){
        $this->session->unset_userdata('email');
		$this->session->unset_userdata('level_id');
		redirect('Auth');
	}
	// END OF LOGOUT

}
?>