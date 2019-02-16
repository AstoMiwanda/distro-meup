<?php

/**
 * 
 */
class M_Transaksi extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Database');
	}

	public function insert($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function insertTransaksi($data)
	{
		return $this->db->insert('ttransaksi', $data);
	}

	public function get_data($table)
	{
		return $this->db->get($table);
	}

	public function getId($value='')
	{
		return $this->db->where('kode',$value);
	}

	public function where($where, $value)
	{
		return $this->db->where($where, $value);
	}

	public function delete($table, $id)
	{
		$this->db->where('kode',$id);
		return $this->db->delete($table);
	}

	public function update($table, $id, $data)
	{
		$this->db->get($table);
		$this->db->where('kode', $id);
		return $this->db->update($table, $data);
	}

	public function FunctionName($value='')
	{
		$this->db->insert_batch('quotation', $data);
	}

	public function get_dataId($id='', $table='', $kode='')
	{
		$data = self::query("SELECT * FROM $table WHERE `kode` = $kode");
		return $data;
	}

	public function copyTable($tableFrom='', $tableTo='', $user_id='')
	{
		$q = $this->db->get($tableFrom)->result(); // get first table
	    foreach($q as $r) { // loop over results
	    	if ($user_id != '') {
	    		$this->db->set('user_id', $user_id); // set user_id
	    	}
	        $this->db->insert($tableTo, $r); // insert each row to another table	        
	    }
	}

	public function emptyTable($table='')
	{
		$this->db->empty_table($table);
	}

	public function KodeGenerate() { 
	    $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
	    srand((double)microtime()*1000000);
	    $i = 0;
	    $pass = '' ;
	    while ($i <= 12) {
	    	$num = rand() % 33;
	        $tmp = substr($chars, $num, 1);
	        $pass = $pass . $tmp;
	        $i++;
	    }
	    return $pass;
	}

	public function penguranganStock()
	{
		$data_keranjang = self::get_data('tkeranjang');
		foreach ($data_keranjang as $value) {
			echo $value;
		}

		// $this->db->where('id', $post['identifier']);
		// $this->db->set('votes', 'votes+1', FALSE);
		// $this->db->update('users');

		// $data_keranjang['keranjang'] = $this->M_Transaksi->get_data('tkeranjang');

		// $adabarang = 0;
		// $count_row = 0;

		// if ($data != '') {
		// 	$this->M_Transaksi->getId($data);
		// 	if ($adabarang == 0) {
		// 		$barang['input'] = $this->M_Transaksi->get_data('tbaju');
		// 		$count_row = $barang['input']->num_rows();
		// 		if ($count_row == 1) {
		// 			$adabarang = 4;
		// 		}else{$adabarang++;}
		// 	}
		// 	$this->M_Transaksi->getId($data);
		// 	if ($adabarang == 1) {
		// 		$barang['input'] = $this->M_Transaksi->get_data('tcelana');
		// 		$count_row = $barang['input']->num_rows();
		// 		if ($count_row >= 1) {
		// 			$adabarang = 4;
		// 		}else{$adabarang++;}
		// 	}
		// 	$this->M_Transaksi->getId($data);
		// 	if ($adabarang == 2) {
		// 		$barang['input'] = $this->M_Transaksi->get_data('tsepatu');
		// 		$count_row = $barang['input']->num_rows();
		// 		if ($count_row == 1) {
		// 			$adabarang = 4;
		// 		}else{$adabarang++;}
		// 	}
		// 	$this->M_Transaksi->getId($data);
		// 	if ($adabarang == 3) {
		// 		$barang['input'] = $this->M_Transaksi->get_data('ttas');
		// 		$count_row = $barang['input']->num_rows();
		// 		if ($count_row == 1) {
		// 			$adabarang = 4;
		// 		}else{$adabarang++;}
		// 	}
		// }
	}
}