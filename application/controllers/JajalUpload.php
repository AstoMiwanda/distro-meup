<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class JajalUpload extends CI_Controller
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

	public function index()
	{
		$this->load->view('uploadExcel');
	}

	public function uploadExcel()
	{
		require_once 'excel_reader.php';
		if(isset($_POST['submit'])) {

			$target = basename($_FILES['dataAlumni']['name']);
		    move_uploaded_file($_FILES['dataAlumni']['tmp_name'], $target);
		 
			// tambahkan baris berikut untuk mencegah error is not readable
		    chmod($_FILES['dataAlumni']['name'],0777);
		    
		    $data = new Spreadsheet_Excel_Reader($_FILES['dataAlumni']['name'],false);
		    
			// menghitung jumlah baris file xls
		    $baris = $data->rowcount($sheet_index=0);
		    
		    // jika kosongkan data dicentang jalankan kode berikut
		    $drop = isset( $_POST["drop"] ) ? $_POST["drop"] : 0 ;

		    if($drop == 1) {
		    	//kosongkan tabel pegawai
		    	$truncate ="TRUNCATE TABLE t_upload";
		    	mysqli_query($truncate);
		    };

		    // import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
		    for ($i=2; $i<=$baris; $i++) {
		    	//membaca data (kolom ke-1 sd terakhir)
		    	$nama = $data->val($i, 1);
		    	$alamat = $data->val($i, 2);
		    	$tanggal = $data->val($i, 3);
		    	$tanggal_lahir = date('Y-m-d', strtotime($tanggal));
		    	$data = array('nama' => $nama,
		    	'alamat' => $alamat,
		    	'tanggal_lahir' => $tanggal_lahir);

		    	//setelah data dibaca, masukkan ke tabel pegawai sql
		    	$hasil = $this->M_Transaksi->insert('t_upload', $data);
		    }
		    
		    if(!$hasil) {
		    	// jika import gagal
		    	echo "<script>alert('Data Berhasil di Import !');
				window.location.replace('http://localhost/distro-meup/UploadExcel')</script>";
			}else{
				//jika impor berhasil
				echo "<script>alert('Data Gagal di Import !');
				window.location.replace('http://localhost/distro-meup/UploadExcel')</script>";
			}

			//hapus file xls yang udah dibaca
			unlink($_FILES['dataAlumni']['name']);
		}
	}
}