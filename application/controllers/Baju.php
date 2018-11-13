<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Baju extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		//Load Dependencies

	}

	public function index()
	{
		$data['isi'] = $this->M_user->get_data('tbaju');
		$this->load->view('baju', $data);
	}

	//Add Form
	public function ViewAdd()
	{
		$this->load->view('addBaju');
	}

	//Add Data
	public function AddAction()
	{
		$data = array('merk' => $this->input->POST('merk'),
						'warna' => $this->input->POST('warna'),
						'ukuran' => $this->input->POST('ukuran'),
						'stock' => $this->input->POST('stock') );
		$post = $this->M_user->create('tbaju', $data);

		if ($post) {
			redirect(base_url('Baju'));
		}else{
			imap_alerts('gagal');
		}
	}

	//Edit Form
	public function ViewEdit($id = '')
	{
		$this->M_user->where_data($id);
		$data['isi'] = $this->M_user->get_data('tbaju');

		$this->load->view('editBaju',$data);
	}

	//Edit Data
	public function EditAction()
	{
		$id = $this->input->POST('id');
		$data = array('merk' => $this->input->POST('merk'),
						'warna' => $this->input->POST('warna'),
						'ukuran' => $this->input->POST('ukuran'),
						'stock' => $this->input->POST('stock') );

		$post = $this->M_user->update('tbaju', $id, $data);


		if ($post) {
			redirect(base_url('Baju'));
		}else{
			imap_alerts('gagal');
		}
	}

	//Delete Data
	public function Delete( $id = '')
	{
		$post = $this->M_user->delete('tbaju', $id);

		if ($post) {
			redirect(base_url('Baju'));
		}else{
			imap_alerts('gagal');
		}
	}
}