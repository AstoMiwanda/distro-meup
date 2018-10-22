<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies

	}

	// List all your items
	public function index()
	{
		$data['isi'] = $this->db->get('user');//membuka tabel user dan mengambil data tiap field dan ditampung di variabel isi
		$this->load->view('/formviews' , $data);//membuka form index dan memasukkan variabel data
	}

	// Add a new item
	public function add()
	{
		$this->load->view('form/tambah');
	}

	public function actionadd()
	{
		# code...
		$data = array('username' => $this->input->post('username'),
					 'password' => $this->input->post('password'),
					 'fullname' => $this->input->post('fullname'),
					 'level' => $this->input->post('level'));

		$this->db->insert('user' , $data);
		redirect('form/views','refresh');
	}
	//Update one item
	public function update(  )
	{
		$this->db->where('id',$id);
		$data['isi'] = $this->db->get('user');

		$this->load->view('form/update',$data);
	}

	//Delete one item
	public function delete()
	{
		$this->db->get('id',$id);

		$this->db->delete('user');

	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
