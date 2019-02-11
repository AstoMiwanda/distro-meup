<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Chart extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Transaksi');
		$this->load->model('M_user');
		$this->load->model('Excel_import_model');
		$this->load->library('Excel');
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
		// $data['isi'] = $this->M_user->get_data('tsepatu');
		$this->M_user->where_data($this->session->userdata('id'));
		$user = $this->M_user->get_data('tuser');

		$where_baju = array('kategori' => 1);
		$where_celana = array('kategori' => 2);
		$where_sepatu = array('kategori' => 3);
		$where_tas = array('kategori' => 4);

		foreach ($this->M_user->cek_login('ttransaksi', $where_baju)->result() as $value_baju) {
			$num_baju = $value_baju->jumlah;
		}
		foreach ($this->M_user->cek_login('ttransaksi', $where_celana)->result() as $value_celana) {
			$num_celana = $value_celana->jumlah;
		}
		foreach ($this->M_user->cek_login('ttransaksi', $where_sepatu)->result() as $value_sepatu) {
			$num_sepatu = $value_sepatu->jumlah;
		}
		foreach ($this->M_user->cek_login('ttransaksi', $where_tas)->result() as $value_tas) {
			$num_tas = $value_tas->jumlah;
		}

		$data_pie = array('num_baju' => $num_baju,
		'num_celana' => $num_celana,
		'num_sepatu' => $num_sepatu,
		'num_tas' => $num_tas );

		//Pembelian
		$now_year = date('Y');
		for ($i=1; $i <= 12 ; $i++) { 
			if ($i<10) {
				$query = "SELECT `total` FROM `tpembelian` WHERE `tanggal` LIKE '$now_year-0$i-%'";
			}else{
				$query = "SELECT `total` FROM `tpembelian` WHERE `tanggal` LIKE '$now_year-$i-%'";
			}
        	$data_pembelian[$i] = $this->db->query($query);
		}

		//Januari
		$pembelian_januari = 0;
		foreach ($data_pembelian[1]->result() as $value) {
			$pembelian_januari += $value->total;
		}
		//Februari
		$pembelian_februari = 0;
		foreach ($data_pembelian[2]->result() as $value) {
			$pembelian_februari += $value->total;
		}
		//Maret
		$pembelian_maret = 0;
		foreach ($data_pembelian[3]->result() as $value) {
			$pembelian_maret += $value->total;
		}
		//April
		$pembelian_april = 0;
		foreach ($data_pembelian[4]->result() as $value) {
			$pembelian_april += $value->total;
		}
		//Mei
		$pembelian_mei = 0;
		foreach ($data_pembelian[5]->result() as $value) {
			$pembelian_mei += $value->total;
		}
		//Juni
		$pembelian_juni = 0;
		foreach ($data_pembelian[6]->result() as $value) {
			$pembelian_juni += $value->total;
		}
		//Juli
		$pembelian_juli = 0;
		foreach ($data_pembelian[7]->result() as $value) {
			$pembelian_juli += $value->total;
		}
		//Agustus
		$pembelian_agustus = 0;
		foreach ($data_pembelian[8]->result() as $value) {
			$pembelian_agustus += $value->total;
		}
		//September
		$pembelian_semptember = 0;
		foreach ($data_pembelian[9]->result() as $value) {
			$pembelian_semptember += $value->total;
		}
		//Oktober
		$pembelian_oktober = 0;
		foreach ($data_pembelian[10]->result() as $value) {
			$pembelian_oktober += $value->total;
		}
		//November
		$pembelian_november = 0;
		foreach ($data_pembelian[11]->result() as $value) {
			$pembelian_november += $value->total;
		}
		//Desember
		$pembelian_desember = 0;
		foreach ($data_pembelian[12]->result() as $value) {
			$pembelian_desember += $value->total;
		}

		$pembelian = array('January' => $pembelian_januari,
			'February' => $pembelian_februari,
			'March' => $pembelian_maret,
			'April' => $pembelian_april,
			'May' => $pembelian_mei,
			'June' => $pembelian_juni,
			'July' => $pembelian_juni,
			'August' => $pembelian_agustus,
			'September' => $pembelian_semptember,
			'October' => $pembelian_oktober,
			'November' => $pembelian_november,
			'December' => $pembelian_desember );

		//Penjualan
		for ($i=1; $i <= 12 ; $i++) { 
			if ($i<10) {
				$query = "SELECT `total_transaksi` FROM `ttransaksi_master` WHERE `tanggal_transaksi` LIKE '%-0$i-%'";
			}else{
				$query = "SELECT `total_transaksi` FROM `ttransaksi_master` WHERE `tanggal_transaksi` LIKE '%-$i-%'";
			}
        	$data_penjualan[$i] = $this->db->query($query);
		}

		//Januari
		$penjualan_januari = 0;
		foreach ($data_penjualan[1]->result() as $value) {
			$penjualan_januari += $value->total_transaksi;
		}
		//Februari
		$penjualan_februari = 0;
		foreach ($data_penjualan[2]->result() as $value) {
			$penjualan_februari += $value->total_transaksi;
		}
		//Maret
		$penjualan_maret = 0;
		foreach ($data_penjualan[3]->result() as $value) {
			$penjualan_maret += $value->total_transaksi;
		}
		//April
		$penjualan_april = 0;
		foreach ($data_penjualan[4]->result() as $value) {
			$penjualan_april += $value->total_transaksi;
		}
		//Mei
		$penjualan_mei = 0;
		foreach ($data_penjualan[5]->result() as $value) {
			$penjualan_mei += $value->total_transaksi;
		}
		//Juni
		$penjualan_juni = 0;
		foreach ($data_penjualan[6]->result() as $value) {
			$penjualan_juni += $value->total_transaksi;
		}
		//Juli
		$penjualan_juli = 0;
		foreach ($data_penjualan[7]->result() as $value) {
			$penjualan_juli += $value->total_transaksi;
		}
		//Agustus
		$penjualan_agustus = 0;
		foreach ($data_penjualan[8]->result() as $value) {
			$penjualan_agustus += $value->total_transaksi;
		}
		//September
		$penjualan_semptember = 0;
		foreach ($data_penjualan[9]->result() as $value) {
			$penjualan_semptember += $value->total_transaksi;
		}
		//Oktober
		$penjualan_oktober = 0;
		foreach ($data_penjualan[10]->result() as $value) {
			$penjualan_oktober += $value->total_transaksi;
		}
		//November
		$penjualan_november = 0;
		foreach ($data_penjualan[11]->result() as $value) {
			$penjualan_november += $value->total_transaksi;
		}
		//Desember
		$penjualan_desember = 0;
		foreach ($data_penjualan[12]->result() as $value) {
			$penjualan_desember += $value->total_transaksi;
		}

		$penjualan = array('January' => $penjualan_januari,
			'February' => $penjualan_februari,
			'March' => $penjualan_maret,
			'April' => $penjualan_april,
			'May' => $penjualan_mei,
			'June' => $penjualan_juni,
			'July' => $penjualan_juni,
			'August' => $penjualan_agustus,
			'September' => $penjualan_semptember,
			'October' => $penjualan_oktober,
			'November' => $penjualan_november,
			'December' => $penjualan_desember );

		$data_line = array('penjualan' => $penjualan, 'pembelian' => $pembelian );

		$data_user = array('user' => $user, 'data_pie' => $data_pie, 'data_line' => $data_line);
		$this->load->view('chart', $data_user);
	}
}