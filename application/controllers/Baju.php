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
		if($this->session->userdata('status') != "login"){
			redirect(base_url('Login'));
		}
		//Load Dependencies

	}

	public function index()
	{
		$data['isi'] = $this->M_user->get_data('tbaju');
		$this->M_user->where_data($this->session->userdata('id'));
		$user = $this->M_user->get_data('tuser');
		$data_user = array('user' => $user, 'isi' =>$data);
		$this->load->view('baju', $data_user);

		/*
		if(isset($_GET['per_laman'])) {
			$per_laman = array($_GET['per_laman']);
		}else {
			$per_laman = 1;
		}

		$laman_sekarang = 1;
		if(isset($_GET['laman'])) {
			$laman_sekarang = $_GET['laman'];
			$laman_sekarang = ($laman_sekarang > 1) ? $laman_sekarang : 1;
		}
		$con = mysqli_connect("localhost","root","","distro");
		if (mysqli_connect_errno()) {
			echo "Koneksi Gagal!!";
		}
		$query = "SELECT * FROM `tbaju`";
		$result = mysqli_query($con, $query) or die(mysql_error());
		$total_data = mysqli_num_rows($result);
		$total_laman = ceil($total_data / $per_laman);
		$awal = ($laman_sekarang - 1) * $per_laman;
		$data_limit = $this->M_user->get_limit('tbaju', $awal, $per_laman);
		$this->M_user->CreatePagging('baju', $data_limit, $total_laman, $laman_sekarang);
		*/
	}

	//Add Form
	public function ViewAdd()
	{
		$this->load->view('addBaju');
	}

	//Add Data
	public function AddAction()
	{
		$data = array('kode' => $this->input->post('id_barang'),
						'merk' => $this->input->POST('merk'),
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