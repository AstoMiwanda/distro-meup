<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel_import extends CI_Controller
{
	public function __construct()
	{
		date_default_timezone_set("Asia/Jakarta");
		parent::__construct();
		$this->load->model('Excel_import_model');
		$this->load->library('Excel');
	}

	function index()
	{
		$this->load->view('excel_import');
	}

	function fetch()
	{
		$data = $this->Excel_import_model->select();
		$output = '
		<h3 align="center">Total Data - '.$data->num_rows().'</h3>
		<table class="table table-striped table-bordered">
		<tr>
		<th>Nama</th>
		<th>ALamat</th>
		<th>Tanggal Lahir</th>
		</tr>
		';
		foreach($data->result() as $row)
		{
			$output .= '
			<tr>
			<td>'.$row->nama.'</td>
			<td>'.$row->alamat.'</td>
			<td>'.$row->tanggal_lahir.'</td>
			</tr>
			';
		}
		$output .= '</table>';
		echo $output;
	}

	function import()
	{
		if (isset($_POST['import']) && isset($_POST['empety'])) {
			if ($_POST['empety'] == 'empety') {
				$this->db->truncate('t_upload');
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
					$nama = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$alamat = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$tanggal = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$time = strtotime($tanggal);
					$tanggal_lahir = date('Y-m-d',$time);
					$data[] = array(
						'nama' => $nama,
						'alamat' => $alamat,
						'tanggal_lahir' => $tanggal_lahir
					);
				}
			}
			$sukses = $this->Excel_import_model->insert($data);
			if (!$sukses) {
				echo "<script>alert('Data Imported successfully');
				window.location = 'http://localhost/distro-meup/Excel_import/'</script>";
			}else{
				echo "<script>alert('Data Imported failed');
				window.location = 'http://localhost/distro-meup/Excel_import/'</script>";
			}
		} 
	}
}

?>
