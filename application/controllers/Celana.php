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
		$this->load->model('Excel_import_model');
		$this->load->library('Excel');
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
		$this->M_user->where_data($this->session->userdata('id'));
		$user = $this->M_user->get_data('tuser');
		$data_user = array('user' => $user);
		$this->load->view('addCelana', $data_user);
	}

	//Add Data
	public function AddAction()
	{
		$data_barang = array('kode' => $this->input->post('id_barang'));
		$cek = $this->M_user->cek_login('tcelana', $data_barang)->num_rows();
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

			$post = $this->M_user->updateBarang('tcelana', $id, $data);
		}else{
			$post = $this->M_user->create('tcelana', $data);
		}

		if ($post) {
			echo "<script>alert('Data Berhasil ditambah');
			window.location.href='http://localhost/distro-meup/Celana/ViewAdd';</script>";
		}else{
			echo "<script>alert('Data Gagal ditambah !');
			window.location.href='http://localhost/distro-meup/Celana/ViewAdd';</script>";
		}
	}

	//Edit Form
	public function ViewEdit($id = '')
	{
		$this->M_user->where_data($this->session->userdata('id'));
		$user = $this->M_user->get_data('tuser');

		$this->M_user->where_data($id);
		$data['isi'] = $this->M_user->get_data('tcelana');
		$data_user = array('user' => $user, 'isi' =>$data);

		$this->load->view('editCelana', $data_user);
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

		$post = $this->M_user->update('tcelana', $id, $data);


		if ($post) {
			echo "<script>alert('Data Berhasil diubah');
			window.location.href='http://localhost/distro-meup/Celana';</script>";
		}else{
			echo "<script>alert('Data Gagal diubah !');
			window.location.href='http://localhost/distro-meup/Celana/ViewEdit/$id';</script>";
		}
	}

	//Delete Data
	public function Delete( $id = '')
	{
		$post = $this->M_user->delete('tcelana', $id);

		if ($post) {
			echo "<script>alert('Data Berhasil dihapus');
			window.location.href='http://localhost/distro-meup/Celana';</script>";
		}else{
			echo "<script>alert('Data Gagal dihapus !');
			window.location.href='http://localhost/distro-meup/Celana';</script>";
		}
	}

	//Import Excel
	public function ImportExcel()
	{
		if (isset($_POST['import']) && isset($_POST['empty'])) {
			if ($_POST['empty'] == 'empty') {
				$this->db->truncate('tcelana');
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
			$sukses = $this->Excel_import_model->insert('tcelana',$data);
			if (!$sukses) {
				echo "<script>alert('Data Berhasil diimport');
				window.location = 'http://localhost/distro-meup/Celana'</script>";
			}else{
				echo "<script>alert('Data Gagal diimport !');
				window.location = 'http://localhost/distro-meup/Celana'</script>";
			}
		}
	}

	public function ExportData()
	{
		$data = array('data' => $this->M_user->get_data('tcelana'));

		$this->load->view('exportCelana', $data);
	}
}