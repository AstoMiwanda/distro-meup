<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Celana extends CI_Controller
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
		$data['isi'] = $this->M_user->get_data('tcelana');
		$this->M_user->where_data($this->session->userdata('id'));
		$user = $this->M_user->get_data('tuser');
		$data_user = array('user' => $user, 'isi' =>$data);
		$this->load->view('celana', $data_user);
	}

	//Add Form
	public function ViewAdd()
	{
		$this->load->view('addCelana');
	}

	//Add Data
	public function AddAction()
	{
		$data = array('kode' => $this->input->post('id_barang'),
						'merk' => $this->input->POST('merk'),
						'warna' => $this->input->POST('warna'),
						'ukuran' => $this->input->POST('ukuran'),
						'stock' => $this->input->POST('stock') );
		$post = $this->M_user->create('tcelana', $data);

		if ($post) {
			redirect(base_url('Celana'));
		}else{
			imap_alerts('gagal');
		}
	}

	//Edit Form
	public function ViewEdit($id = '')
	{
		$this->M_user->where_data($id);
		$data['isi'] = $this->M_user->get_data('tcelana');

		$this->load->view('editCelana',$data);
	}

	//Edit Data
	public function EditAction()
	{
		$id = $this->input->POST('id');
		$data = array('merk' => $this->input->POST('merk'),
						'warna' => $this->input->POST('warna'),
						'ukuran' => $this->input->POST('ukuran'),
						'stock' => $this->input->POST('stock') );

		$post = $this->M_user->update('tcelana', $id, $data);


		if ($post) {
			redirect(base_url('Celana'));
		}else{
			imap_alerts('gagal');
		}
	}

	//Delete Data
	public function Delete( $id = '')
	{
		$post = $this->M_user->delete('tcelana', $id);

		if ($post) {
			redirect(base_url('Celana'));
		}else{
			imap_alerts('gagal');
		}
	}
}