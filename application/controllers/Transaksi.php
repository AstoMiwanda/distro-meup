<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Transaksi extends CI_Controller
{

	function __construct()
	{
		date_default_timezone_set("Asia/Jakarta");
		parent::__construct();
		$this->load->model('M_Transaksi');
		$this->load->model('M_user');
		$this->load->model('Excel_import_model');
		$this->load->library('Excel');
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
					$adabarang = 5;
				}else{$adabarang++;}
			}
			$this->M_Transaksi->getId($data);
			if ($adabarang == 1) {
				$barang['input'] = $this->M_Transaksi->get_data('tcelana');
				$count_row = $barang['input']->num_rows();
				if ($count_row >= 1) {
					$adabarang = 5;
				}else{$adabarang++;}
			}
			$this->M_Transaksi->getId($data);
			if ($adabarang == 2) {
				$barang['input'] = $this->M_Transaksi->get_data('tsepatu');
				$count_row = $barang['input']->num_rows();
				if ($count_row == 1) {
					$adabarang = 5;
				}else{$adabarang++;}
			}
			$this->M_Transaksi->getId($data);
			if ($adabarang == 3) {
				$barang['input'] = $this->M_Transaksi->get_data('ttas');
				$count_row = $barang['input']->num_rows();
				if ($count_row == 1) {
					$adabarang = 5;
				}else{$adabarang++;}
			}
		}

		if ($adabarang == 5 && $data_keranjang != '') {
			$data_transaksi = array('input' => $barang,
				'keranjang' => $data_keranjang,
				'user' => $user );
			$this->load->view('transaksi', $data_transaksi);

		}elseif ($adabarang == 5 && $data_keranjang == '') {
			$data_transaksi = array('input' => $barang, 'user' => $user);
			$this->load->view('transaksi', $data_transaksi);

		}elseif ($adabarang != 5 && $data_keranjang != '') {
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
		$data_barang = array('kode' => $this->input->post('id_barang'));
		$cek = $this->M_user->cek_login('tkeranjang', $data_barang)->num_rows();
		$kode = $this->input->post('id_barang');
		$data = array('kode' => $kode,
			'kategori' => $this->input->post('kategori'),
			'merk' => $this->input->post('nama_barang'),
			'harga' => $this->input->post('harga_barang'),
			'jumlah' => $this->input->post('jumlah'),
			'total' => $this->input->post('subtotal'));
		if($cek == 1){
			$data = array('kode' => $kode,
			'kategori' => $this->input->post('kategori'),
			'merk' => $this->input->post('nama_barang'),
			'harga' => $this->input->post('harga_barang'),
			'jumlah' => $this->input->post('jumlah'),
			'total' => $this->input->post('subtotal'));
			$insert = $this->M_user->updateBarang('tkeranjang', $kode, $data);
		}else{
			$insert = $this->M_Transaksi->insert('tkeranjang', $data);
		}
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

	public function EditView()
	{
		$this->M_user->where_data($this->session->userdata('id'));
		$user = $this->M_user->get_data('tuser');
		$kode = $this->input->POST('kode');
		$this->db->where('kode',$kode);
		$data = array('data' => $this->M_Transaksi->get_data('tkeranjang'),
					'user' => $user);
		$this->load->view('editkeranjang', $data);
	}

	public function EditAction()
	{
		$kode = $this->input->POST('kode');
		$data = array('merk' => $this->input->POST('nama_barang'),
			'harga' => $this->input->POST('harga_barang'),
			'jumlah' => $this->input->POST('jumlah'),
			'total' => $this->input->POST('subtotal'));
		$edit = $this->M_Transaksi->update('tkeranjang', $kode, $data);
		if ($edit) {
			echo "<script>";
			echo "alert('Update Sukses')";
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
		$sukses = $this->M_Transaksi->insert('ttransaksi_master', $data_transaksi_master);
		if ($sukses) {
			redirect(base_url('Transaksi/CetakStruk/'.$kode_nota.''));
		}else{
			confirm("Add User Gagal !!");
		}
	}

	//Detail Transaksi
	public function DetailTransaksi()
	{
		if($this->session->userdata('status') != "login"){
			redirect(base_url('Login'));
		}

		$this->M_user->where_data($this->session->userdata('id'));
		$user = $this->M_user->get_data('tuser');
		foreach ($user->result() as $value_user) {
			$level_user = $value_user->level;
		}
		$data = array('data' => $this->db->get('ttransaksi'),
					'user' => $user,
					'level_user' => $level_user);
		$this->load->view('detailTransaksi', $data);
	}

	public function viewEditDetailTransaksi($id='')
	{
		if ($id != '') {
			$all_user = $this->M_user->get_data('tuser');
			$this->M_user->where_data($this->session->userdata('id'));
			$user_data = $this->M_user->get_data('tuser');
			foreach ($user_data->result() as $value_user) {
				$user_level = $value_user->level;
			}

			$this->M_Transaksi->where('id', $id);
			$data_transaksi = $this->M_Transaksi->get_data('ttransaksi');

			$data = array('user' => $user_data,
						'level' => $user_level,
						'data_transaksi' => $data_transaksi,
						'all_user' => $all_user);

			$this->load->view('editDetailTransaksi', $data);
		}else{
			// redirect(base_url('Transaksi/LaporanTransaksi'));
			echo "langka datane";
		}
	}

	//Laporan Transaksi
	public function LaporanTransaksi()
	{
		if($this->session->userdata('status') != "login"){
			redirect(base_url('Login'));
		}

		$this->M_user->where_data($this->session->userdata('id'));
		$user = $this->M_user->get_data('tuser');
		foreach ($user->result() as $value_user) {
			$level_user = $value_user->level;
		}
		$data = array('data' => $this->db->get('ttransaksi_master'),
					'user' => $user,
					'level_user' => $level_user);
		$this->load->view('laporanTransaksi', $data);
	}

	public function viewEditTransaksi($id = '')
	{
		if ($id != '') {
			$this->M_user->where_data($this->session->userdata('id'));
			$user_data = $this->M_user->get_data('tuser');
			foreach ($user_data->result() as $value_user) {
				$user_level = $value_user->level;
			}

			$this->M_Transaksi->where('transaksimaster_id', $id);
			$data_transaksi = $this->M_Transaksi->get_data('ttransaksi');

			$data = array('user' => $user_data,
				'user_level' => $user_level,
				'data_transaksi' => $data_transaksi);
			$this->load->view('editTransaksi', $data);
		}else{
			redirect(base_url('Transaksi/LaporanTransaksi'));
		}
	}

	//Cetak Struk
	public function CetakStruk($kode = '')
	{
		$data_keranjang = $this->M_Transaksi->get_data('tkeranjang');
		$total = 0;
		foreach ($data_keranjang->result() as $value) {
			$total += $value->total;
		}
		$this->M_Transaksi->where('kode_nota',$kode);
		$tunai = $this->M_Transaksi->get_data('ttransaksi_master')->result();
		$this->M_user->where_data($this->session->userdata('id'));
		$user = $this->M_user->get_data('tuser');
		$data_struk = array('data_struk' => $this->M_Transaksi->get_data('tkeranjang'),
							'total_belanja' => $total,
							'tunai' => $tunai,
							'data_user' => $user);
		$this->load->view('cetakStruk', $data_struk);
		$this->M_Transaksi->emptyTable('tkeranjang');
	}

	//Export Data
	public function ExportTransaksiMaster()
	{
		$detailTransaksi = array('detailTransaksi' => $this->M_Transaksi->get_data('ttransaksi_master'));

		$this->load->view('exportTransaksiMaster', $detailTransaksi);
	}

	public function ExportTransaksiDetail()
	{
		$detailTransaksi = array('detailTransaksi' => $this->M_Transaksi->get_data('ttransaksi'));

		$this->load->view('exportTransaksiDetail', $detailTransaksi);
	}

	public function ExportLaporanPembelian()
	{
		$detailTransaksi = array('pembelian' => $this->M_Transaksi->get_data('tpembelian'));

		$this->load->view('exportPembelian', $detailTransaksi);
	}

	//Import Excel
	public function ImportExcelPembelian()
	{
		$user_id = $this->session->userdata('id');
		if (isset($_POST['import']) && isset($_POST['empty'])) {
			if ($_POST['empty'] == 'empty') {
				$this->db->truncate('tbaju');
			}
		}
		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					$kategori = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$kode = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$jumlah = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$total = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$tanggal = date("Y/m/d");
					$data[] = array(
						'user_id' => $user_id,
						'kategori' => $kategori,
						'kode' => $kode,
						'jumlah' => $jumlah,
						'total' => $total,
						'tanggal' => $tanggal
					);
				}
			}
			$sukses = $this->Excel_import_model->insert('tpembelian',$data);
			if (!$sukses) {
				echo "<script>alert('Data Imported successfully');
				window.location = 'http://localhost/distro-meup/Transaksi/LaporanPembelian'</script>";
			}else{
				echo "<script>alert('Data Imported failed');
				window.location = 'http://localhost/distro-meup/Transaksi/LaporanPembelian'</script>";
			}
		}
	}

	/* Laporan Pembelian */
	public function LaporanPembelian()
	{
		$this->M_user->where_data($this->session->userdata('id'));
		$user = $this->M_user->get_data('tuser');
		foreach ($user->result() as $value_user) {
			$level_user = $value_user->level;
		}
		$data = array('data' => $this->db->get('tpembelian'),
					'level_user' => $level_user,
					'user' => $user);
		$this->load->view('laporanPembelian', $data);
	}

	public function ViewAddPembelian()
	{
		$data['isi'] = $this->M_user->get_data('tpembelian');
		$this->M_user->where_data($this->session->userdata('id'));
		$user = $this->M_user->get_data('tuser');
		$data_user = array('user' => $user, 'isi' =>$data);
		$this->load->view('addPembelian', $data_user);
	}

	public function AddPembelianAction($value='')
	{
		$user_id = $this->session->userdata('id');
		$data_barang = array('kode' => $this->input->post('id_barang'));
		$tanggal_pembelian = date("Y/m/d");
		$cek = $this->M_user->cek_login('tpembelian', $data_barang)->num_rows();
		$data = array('user_id' => $user_id,
						'kode' => $this->input->POST('id_barang'),
						'kategori' => $this->input->POST('kategori_barang'),
						'jumlah' => $this->input->POST('jumlah_barang'),
						'total' => $this->input->POST('total'),
						'tanggal' => $tanggal_pembelian );
		if($cek == 1){
			$id = $this->input->POST('id_barang');
			$data = array('user_id' => $user_id,
						'kode' => $this->input->POST('id_barang'),
						'kategori' => $this->input->POST('kategori_barang'),
						'jumlah' => $this->input->POST('jumlah_barang'),
						'total' => $this->input->POST('total'),
						'tanggal' => $tanggal_pembelian );

			$post = $this->M_user->updateBarang('tpembelian', $id, $data);
		}else{
			$post = $this->M_user->create('tpembelian', $data);
		}

		if ($post) {
			redirect(base_url('Transaksi/LaporanPembelian'));
		}else{
			imap_alerts('gagal');
		}
	}

	public function viewEditLaporanPembelian($id = '')
	{
		$all_user = $this->M_user->get_data('tuser');
		$this->M_user->where_data($this->session->userdata('id'));
		$user = $this->M_user->get_data('tuser');

		$this->M_user->where_data($id);
		$data['isi'] = $this->M_user->get_data('tpembelian');
		$data_user = array('user' => $user, 'isi' =>$data, 'all_user' => $all_user);

		$this->load->view('editLaporanPembelian', $data_user);
	}

	public function LaporanPembelianEditAction()
	{
		$tanggal =  date('Y-m-d', strtotime($this->input->POST('tanggal')));
		$id = $this->input->POST('id');
		$data = array('user_id' => $this->input->POST('user_id'),
						'kategori' => $this->input->POST('kategori'),
						'kode' => $this->input->POST('kode'),
						'jumlah' => $this->input->POST('jumlah'),
						'total' => $this->input->POST('total'),
						'tanggal' => $tanggal );

		$post = $this->M_user->update('tpembelian', $id, $data);


		if ($post) {
			redirect(base_url('Transaksi/LaporanPembelian'));
		}else{
			imap_alerts('gagal');
		}
	}

	public function deleteLaporanPembelian($id = '')
	{
		$post = $this->M_user->delete('tpembelian', $id);

		if ($post) {
			redirect(base_url('Transaksi/LaporanPembelian'));
		}else{
			imap_alerts('gagal');
		}
	}
}