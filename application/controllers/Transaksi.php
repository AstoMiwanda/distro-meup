<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Transaksi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Transaksi');
		$this->load->model('M_user');
		if($this->session->userdata('status') != "login"){
			redirect(base_url('Login'));
		}
	}

	public function index($data='')
	{
		if($this->session->userdata('status') != "login"){
			redirect(base_url('Login'));
		}

		$this->M_user->where_data($this->session->userdata('id'));
		$user = $this->M_user->get_data('tuser');
		$data_keranjang['keranjang'] = $this->M_Transaksi->get_data('tkeranjang');

		$adabarang = 0;
		$count_row = 0;

		if ($data != '') {
			$this->M_Transaksi->getId($data);
			if ($adabarang == 0) {
				$barang['input'] = $this->M_Transaksi->get_data('tbaju');
				$count_row = $barang['input']->num_rows();
				if ($count_row == 1) {
					$adabarang = 4;
				}else{$adabarang++;}
			}
			$this->M_Transaksi->getId($data);
			if ($adabarang == 1) {
				$barang['input'] = $this->M_Transaksi->get_data('tcelana');
				$count_row = $barang['input']->num_rows();
				if ($count_row >= 1) {
					$adabarang = 4;
				}else{$adabarang++;}
			}
			$this->M_Transaksi->getId($data);
			if ($adabarang == 2) {
				$barang['input'] = $this->M_Transaksi->get_data('tsepatu');
				$count_row = $barang['input']->num_rows();
				if ($count_row == 1) {
					$adabarang = 4;
				}else{$adabarang++;}
			}
			$this->M_Transaksi->getId($data);
			if ($adabarang == 3) {
				$barang['input'] = $this->M_Transaksi->get_data('ttas');
				$count_row = $barang['input']->num_rows();
				if ($count_row == 1) {
					$adabarang = 4;
				}else{$adabarang++;}
			}
		}

		if ($adabarang == 4 && $data_keranjang != '') {
			$data_transaksi = array('input' => $barang,
				'keranjang' => $data_keranjang,
				'user' => $user );
			$this->load->view('transaksi', $data_transaksi);

		}elseif ($adabarang == 4 && $data_keranjang == '') {
			$data_transaksi = array('input' => $barang, 'user' => $user);
			$this->load->view('transaksi', $data_transaksi);

		}elseif ($adabarang != 4 && $data_keranjang != '') {
			$data_transaksi = array('keranjang' => $data_keranjang, 'user' => $user);
			$this->load->view('transaksi', $data_transaksi);
		}
	}

	public function Barang($id='')
	{
		if($this->session->userdata('status') != "login"){
			redirect(base_url('Login'));
		}
		$this->M_Transaksi->getId($id);
		$data['isi'] = $this->M_Transaksi->get_data('tbaju');
		if ($data) {
			Transaksi::index($data);
		}else {
			redirect("http://localhost/distro-meup/Transaksi");
		}
	}

	public function AddKeranjang($value='')
	{
		if($this->session->userdata('status') != "login"){
			redirect(base_url('Login'));
		}
		$data = array('kode' => $this->input->post('id_barang'),
			'merk' => $this->input->post('nama_barang'),
			'harga' => $this->input->post('harga_barang'),
			'jumlah' => $this->input->post('jumlah'),
			'total' => $this->input->post('subtotal'));
		$insert = $this->M_Transaksi->insert('tkeranjang', $data);

		if($insert){
			redirect(base_url('Transaksi'));
		}else{
			confirm("Add User Gagal !!");
		}
	}

	public function Delete($kode='')
	{
		if($this->session->userdata('status') != "login"){
			redirect(base_url('Login'));
		}
		$delete = $this->M_Transaksi->delete('tkeranjang', $kode);
		if ($delete) {
			echo "<script>";
			echo "alert('Delete Sukses')";
			echo "</script>";
			redirect(base_url('Transaksi'));
		}else{
			echo "Gagal!!";
		}
	}

	public function EditView($kode='')
	{
		if($this->session->userdata('status') != "login"){
			redirect(base_url('Login'));
		}
		$kode = $this->input->POST('kode');
		$this->M_Transaksi->getId($kode);
		$data['input'] = $this->M_Transaksi->get_data('tkeranjang');
		$this->load->view('editkeranjang', $data);
	}

	public function Edit()
	{
		if($this->session->userdata('status') != "login"){
			redirect(base_url('Login'));
		}
		$kode = $this->input->POST('id_barang');
		$data = array('merk' => $this->input->POST('nama_barang'),
			'harga' => $this->input->POST('harga_barang'),
			'jumlah' => $this->input->POST('jumlah'),
			'total' => $this->input->POST('subtotal'));
		$edit = $this->M_Transaksi->update('tkeranjang', $kode, $data);
		if ($edit) {
			echo "<script>";
			echo "alert('Delete Sukses')";
			echo "</script>";
			redirect(base_url('Transaksi'));
		}else{
			echo "Gagal!!";
		}
	}

	public function AddTransaksi()
	{
		if($this->session->userdata('status') != "login"){
			redirect(base_url('Login'));
		}
		$user_id = $this->session->userdata('id');
		$total_transaksi = $this->input->POST('total_belanja');
		$bayar = $this->input->POST('bayar');
		$tanggal_transaksi = date("Y/m/d");
		$kode_nota = $this->M_Transaksi->KodeGenerate();
		$data_transaksi_master = array('user_id' => $user_id,
									'kode_nota' => $kode_nota,
									'total_transaksi' => $total_transaksi,
									'bayar' => $bayar,
									'tanggal_transaksi' => $tanggal_transaksi);
		// $this->M_Transaksi->insertTransaksi('user_id', $user_id);
		$this->M_Transaksi->copyTable('tkeranjang', 'ttransaksi', $user_id);
		$this->M_Transaksi->emptyTable('tkeranjang');
		$this->M_Transaksi->insert('ttransaksi_master', $data_transaksi_master);
		echo $total_transaksi;
		echo $bayar;
		echo $tanggal_transaksi;
		echo $kode_nota;
	}

	//Detail Transaksi
	public function DetailTransaksi()
	{
		if($this->session->userdata('status') != "login"){
			redirect(base_url('Login'));
		}

		$this->M_user->where_data($this->session->userdata('id'));
		$user = $this->M_user->get_data('tuser');
		$data = array('data' => $this->db->get('ttransaksi'),
					'user' => $user);
		$this->load->view('detailTransaksi', $data);
	}

	//Laporan Transaksi
	public function LaporanTransaksi()
	{
		if($this->session->userdata('status') != "login"){
			redirect(base_url('Login'));
		}

		$this->M_user->where_data($this->session->userdata('id'));
		$user = $this->M_user->get_data('tuser');
		$data = array('data' => $this->db->get('ttransaksi_master'),
					'user' => $user);
		$this->load->view('laporanTransaksi', $data);
	}
}