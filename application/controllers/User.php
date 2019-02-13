<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		if($this->session->userdata('status') != "login"){
			redirect(base_url('Login'));
		}
		//Load Dependencies

	}

	public function index()
	{
		if($this->session->userdata('status') != "login"){
			redirect(base_url('Login'));
		}
		$data['isi'] = $this->M_user->get_data('tuser');
		$this->M_user->where_data($this->session->userdata('id'));
		$user = $this->M_user->get_data('tuser');
		$data_user = array('user' => $user, 'isi' =>$data );
		$this->load->view('user', $data_user);
	}

	public function ViewAdd()
	{
		$this->M_user->where_data($this->session->userdata('id'));
		$user = $this->M_user->get_data('tuser');
		$data_user = array('user' => $user);

		$this->load->view('addUser', $data_user);
	}

	//Add Data
	public function AddAction()
	{
		$data_username = array('username' => $this->input->post('username'));
		$cek = $this->M_user->cek_login('tuser', $data_username)->num_rows();
		$data = array('username' => $this->input->POST('username'),
						'password' => password_hash($this->input->POST('password'), PASSWORD_DEFAULT),
						'fullname' => $this->input->POST('fullname'),
						'level' => $this->input->POST('level') );

		if($cek == 1){
			$id = $this->input->POST('username');
			$data = array('username' => $this->input->POST('username'),
						'password' => password_hash($this->input->POST('password'), PASSWORD_DEFAULT),
						'fullname' => $this->input->POST('fullname'),
						'level' => $this->input->POST('level') );

			$post = $this->M_user->updateUser('tuser', $id, $data);
		}else{
			$post = $this->M_user->create('tuser', $data);
		}

		if ($post) {
			redirect(base_url('User'));
		}else{
			imap_alerts('gagal');
		}
	}

	//Edit Form
	public function ViewEdit($id = '')
	{
		$this->M_user->where_data($this->session->userdata('id'));
		$user = $this->M_user->get_data('tuser');

		$this->M_user->where_data($id);
		$data['isi'] = $this->M_user->get_data('tuser');
		$data_user = array('user' => $user, 'isi' =>$data);

		$this->load->view('editUser', $data_user);
	}

	//Edit Data
	public function EditAction()
	{
		if($this->session->userdata('status') != "login"){
			redirect(base_url('Login'));
		}
		$id = $this->input->POST('id');
		$data = array('username' => $this->input->POST('username'),
						'password' => md5($this->input->POST('password')),
						'fullname' => $this->input->POST('fullname'),
						'level' => $this->input->POST('level') );

		$post = $this->M_user->update('tuser', $id, $data);


		if ($post) {
			redirect(base_url('User'));
		}else{
			imap_alerts('gagal');
		}
	}

	//Delete Data
	public function Delete( $id = '')
	{
		if($this->session->userdata('status') != "login"){
			redirect(base_url('Login'));
		}
		$post = $this->M_user->delete('tuser', $id);

		if ($post) {
			redirect(base_url('User'));
		}else{
			imap_alerts('gagal');
		}
	}
}