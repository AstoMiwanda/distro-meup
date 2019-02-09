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
		$data_barang = array('kode' => $this->input->post('id_barang'));
		$cek = $this->M_user->cek_login('tsepatu', $data_barang)->num_rows();
		$data = array('kode' => $this->input->post('id_barang'),
						'merk' => $this->input->POST('merk'),
						'warna' => $this->input->POST('warna'),
						'ukuran' => $this->input->POST('ukuran'),
						'stock' => $this->input->POST('stock') );

		if($cek == 1){
			$id = $this->input->POST('id_barang');
			$data = array('merk' => $this->input->POST('merk'),
							'warna' => $this->input->POST('warna'),
							'ukuran' => $this->input->POST('ukuran'),
							'stock' => $this->input->POST('stock') );

			$post = $this->M_user->updateBarang('tsepatu', $id, $data);
		}else{
			$post = $this->M_user->create('tsepatu', $data);
		}

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

	//Import Excel
	public function ImportExcel()
	{
		if (isset($_POST['import']) && isset($_POST['empty'])) {
			if ($_POST['empty'] == 'empty') {
				$this->db->truncate('tsepatu');
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
			$sukses = $this->Excel_import_model->insert('tsepatu',$data);
			if (!$sukses) {
				echo "<script>alert('Data Imported successfully');
				window.location = 'http://localhost/distro-meup/Sepatu'</script>";
			}else{
				echo "<script>alert('Data Imported failed');
				window.location = 'http://localhost/distro-meup/Sepatu'</script>";
			}
		}
	}

	public function ExportData()
	{
		$data = array('data' => $this->M_user->get_data('tsepatu'));

		$this->load->view('exportSepatu', $data);
	}
}