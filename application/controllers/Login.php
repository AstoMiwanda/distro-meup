<?php

/**
 * 
 */
class Login extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		//Load Dependencies

	}

	public function index(){
		if($this->session->userdata('status') == "login"){
			redirect(base_url('Baju'));
		}
		$this->load->view('login');
	}

	public function loginAction(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$where = array('username' => $username, 'password' => $password);
		$cek = $this->M_user->cek_login('tuser', $where)->num_rows();
		$data = $this->M_user->cek_login('tuser', $where);
		if($cek == 1){
			foreach ($data->result() as $value) {
				$data_session = array('id' => $value->id, 'status' => "login");
				$this->session->set_userdata($data_session);
			}
			header("Location: http://localhost/distro-meup/Baju");
		}else{
			echo "<script>alert('There are no fields to generate a report');
			window.location.href='http://localhost/distro-meup/Login';</script>";
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Login'));
	}
}