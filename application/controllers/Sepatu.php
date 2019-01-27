<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Sepatu extends CI_Controller
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
		$data['isi'] = $this->M_user->get_data('tsepatu');
		$this->M_user->where_data($this->session->userdata('id'));
		$user = $this->M_user->get_data('tuser');
		$data_user = array('user' => $user, 'isi' =>$data);
		$this->load->view('sepatu', $data_user);
	}

	//Add Form
	public function ViewAdd()
	{
		$this->M_user->where_data($this->session->userdata('id'));
		$user = $this->M_user->get_data('tuser');
		$data_user = array('user' => $user);

		$this->load->view('addSepatu', $data_user);
	}

	//Add Data
	public function AddAction()
	{
		if($this->session->userdata('status') != "login"){
			redirect(base_url('Login'));
		}
		$data = array('kode' => $this->input->post('id_barang'),
						'merk' => $this->input->POST('merk'),
						'warna' => $this->input->POST('warna'),
						'ukuran' => $this->input->POST('ukuran'),
						'stock' => $this->input->POST('stock') );
		$post = $this->M_user->create('tsepatu', $data);

		if ($post) {
			redirect(base_url('Sepatu'));
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
		$data['isi'] = $this->M_user->get_data('tsepatu');
		$data_user = array('user' => $user, 'isi' =>$data);

		$this->load->view('editSepatu', $data_user);
	}

	//Edit Data
	public function EditAction()
	{
		if($this->session->userdata('status') != "login"){
			redirect(base_url('Login'));
		}
		$id = $this->input->POST('id');
		$data = array('merk' => $this->input->POST('merk'),
						'warna' => $this->input->POST('warna'),
						'ukuran' => $this->input->POST('ukuran'),
						'stock' => $this->input->POST('stock') );

		$post = $this->M_user->update('tsepatu', $id, $data);


		if ($post) {
			redirect(base_url('Sepatu'));
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
		$post = $this->M_user->delete('tsepatu', $id);

		if ($post) {
			redirect(base_url('Sepatu'));
		}else{
			imap_alerts('gagal');
		}
	}
}