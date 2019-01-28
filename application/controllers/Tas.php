<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Tas extends CI_Controller
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
		$data['isi'] = $this->M_user->get_data('ttas');
		$this->M_user->where_data($this->session->userdata('id'));
		$user = $this->M_user->get_data('tuser');
		$data_user = array('user' => $user, 'isi' =>$data );
		$this->load->view('tas', $data_user);
	}

	//Add Form
	public function ViewAdd()
	{
		$this->M_user->where_data($this->session->userdata('id'));
		$user = $this->M_user->get_data('tuser');
		$data_user = array('user' => $user);

		$this->load->view('addTas', $data_user);
	}

	//Add Data
	public function AddAction()
	{
		if($this->session->userdata('status') != "login"){
			redirect(base_url('Login'));
		}
		$data = array('kode' => $this->input->post('id_barang'),
						'merk' => $this->input->POST('merk'),
						'warna' => $this->input->POST('warna'),
						'ukuran' => $this->input->POST('ukuran'),
						'stock' => $this->input->POST('stock') );
		$post = $this->M_user->create('ttas', $data);

		if ($post) {
			redirect(base_url('Tas'));
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
		$data['isi'] = $this->M_user->get_data('ttas');
		$data_user = array('user' => $user, 'isi' =>$data);

		$this->load->view('editTas', $data_user);
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

		$post = $this->M_user->update('ttas', $id, $data);


		if ($post) {
			redirect(base_url('Tas'));
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
		$post = $this->M_user->delete('ttas', $id);

		if ($post) {
			redirect(base_url('Tas'));
		}else{
			imap_alerts('gagal');
		}
	}

	//Import Excel
	public function ImportExcel()
	{
		if (isset($_POST['import']) && isset($_POST['empty'])) {
			if ($_POST['empty'] == 'empty') {
				$this->db->truncate('ttas');
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
				for($row=2; $row<$highestRow; $row++)
				{
					$kode = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$merk = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$warna = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$ukuran = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$stock = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$harga = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$data[] = array(
						'kode' => $kode,
						'merk' => $merk,
						'warna' => $warna,
						'ukuran' => $ukuran,
						'stock' => $stock,
						'harga' => $harga
					);
				}
			}
			$sukses = $this->Excel_import_model->insert('ttas',$data);
			if (!$sukses) {
				echo "<script>alert('Data Imported successfully');
				window.location = 'http://localhost/distro-meup/Tas'</script>";
			}else{
				echo "<script>alert('Data Imported failed');
				window.location = 'http://localhost/distro-meup/Tas'</script>";
			}
		}
	}

	public function ExportData()
	{
		$data = array('data' => $this->M_user->get_data('ttas'));

		$this->load->view('exportTas', $data);
	}
}