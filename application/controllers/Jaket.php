<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Jaket extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
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
		$data['isi'] = $this->M_user->get_data('tjaket');
		$this->M_user->where_data($this->session->userdata('id'));
		$user = $this->M_user->get_data('tuser');
		$data_user = array('user' => $user, 'isi' =>$data);
		$this->load->view('jaket', $data_user);
	}

	//Add Form
	public function ViewAdd()
	{
		$data['isi'] = $this->M_user->get_data('tjaket');
		$this->M_user->where_data($this->session->userdata('id'));
		$user = $this->M_user->get_data('tuser');
		$data_user = array('user' => $user, 'isi' =>$data);
		$this->load->view('addJaket', $data_user);
	}

	//Add Data
	public function AddAction()
	{
		$data_barang = array('kode' => $this->input->post('id_barang'));
		$cek = $this->M_user->cek_login('tjaket', $data_barang)->num_rows();
		$data = array('kode' => $this->input->post('id_barang'),
						'merk' => $this->input->POST('merk'),
						'warna' => $this->input->POST('warna'),
						'ukuran' => $this->input->POST('ukuran'),
						'stock' => $this->input->POST('stock'),
						'harga' => $this->input->POST('harga'),
						'kategori_id' => $this->input->POST('kategori') );
		if($cek == 1){
			$id = $this->input->POST('id_barang');
			$data = array('merk' => $this->input->POST('merk'),
						'warna' => $this->input->POST('warna'),
						'ukuran' => $this->input->POST('ukuran'),
						'stock' => $this->input->POST('stock'),
						'harga' => $this->input->POST('harga'),
						'kategori_id' => $this->input->POST('kategori') );

			$post = $this->M_user->updateBarang('tjaket', $id, $data);
		}else{
			$post = $this->M_user->create('tjaket', $data);
		}

		if ($post) {
			echo "<script>alert('Data Berhasil ditambahkan');
			window.location.href='http://localhost/distro-meup/Jaket';</script>";
		}else{
			echo "<script>alert('Data Gagal ditambahkan !');
			window.location.href='http://localhost/distro-meup/Jaket/ViewAdd';</script>";
		}
	}

	//Edit Form
	public function ViewEdit($id = '')
	{
		$this->M_user->where_data($this->session->userdata('id'));
		$user = $this->M_user->get_data('tuser');

		$this->M_user->where_data($id);
		$data['isi'] = $this->M_user->get_data('tjaket');
		$data_user = array('user' => $user, 'isi' =>$data);

		$this->load->view('editJaket', $data_user);
	}

	//Edit Data
	public function EditAction()
	{
		$id = $this->input->POST('id');
		$data = array('merk' => $this->input->POST('merk'),
						'warna' => $this->input->POST('warna'),
						'ukuran' => $this->input->POST('ukuran'),
						'stock' => $this->input->POST('stock'),
						'harga' => $this->input->POST('harga'),
						'kategori_id' => $this->input->POST('kategori') );

		$post = $this->M_user->update('tjaket', $id, $data);


		if ($post) {
			echo "<script>alert('Data Berhasil diubah');
			window.location.href='http://localhost/distro-meup/Jaket';</script>";
		}else{
			echo "<script>alert('Data Gagal diubah !');
			window.location.href='http://localhost/distro-meup/Jaket/ViewEdit/$id';</script>";
		}
	}

	//Delete Data
	public function Delete( $id = '')
	{
		$post = $this->M_user->delete('tjaket', $id);

		if ($post) {
			echo "<script>alert('Data Berhasil dihapus');
			window.location.href='http://localhost/distro-meup/Jaket';</script>";
		}else{
			echo "<script>alert('Data Gagal dihapus !');
			window.location.href='http://localhost/distro-meup/Jaket';</script>";
		}
	}

	//Import Excel
	public function ImportExcel()
	{
		if (isset($_POST['import']) && isset($_POST['empty'])) {
			if ($_POST['empty'] == 'empty') {
				$this->db->truncate('tjaket');
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
					$kode = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$merk = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$warna = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$ukuran = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$stock = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$harga = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$kategori_id = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$data[] = array(
						'kode' => $kode,
						'merk' => $merk,
						'warna' => $warna,
						'ukuran' => $ukuran,
						'stock' => $stock,
						'harga' => $harga,
						'kategori_id' => $kategori_id
					);
				}
			}
			$sukses = $this->Excel_import_model->insert('tjaket',$data);
			if (!$sukses) {
				echo "<script>alert('Data Berhasil diimport');
				window.location = 'http://localhost/distro-meup/Jaket'</script>";
			}else{
				echo "<script>alert('Data Gagal diimport !');
				window.location = 'http://localhost/distro-meup/Jaket'</script>";
			}
		}
	}

	public function ExportJaket()
	{
		$data = array('data' => $this->M_user->get_data('tjaket'));

		$this->load->view('exportJaket', $data);
	}
}