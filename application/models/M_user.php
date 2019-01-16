<?php

/**
* 
*/
class M_user extends M_Database
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Database');
		//Load Dependencies

	}

	public function CreatePagging($viewName, $data = '', $total_laman = '', $laman_sekarang = ''){
		$this->load->view($viewName);
	}

	public function get_limit($table, $limitStart, $limitCount, $desc = '') {
		if ($desc != '') {
			$data = self::query("SELECT * FROM $table ORDER BY $desc DESC LIMIT $limitStart,$limitCount");
		}else {
			$data = self::query("SELECT * FROM $table LIMIT $limitStart,$limitCount");
		}
		return $data;
	}

	public function get_data($table)
	{
		return $this->db->get($table);
	}

	public function where_data($id)
	{
		$this->db->where('id',$id);
	}
	
	public function cek_login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function delete($table, $id)
	{
		$this->db->where('id',$id);

		return $this->db->delete($table);
	}

	public function update($table, $id, $data)
	{
		$this->db->get($table);
		$this->db->where('id', $id);
		return $this->db->update($table, $data);
	}

	public function create($table, $data)
	{
		return $this->db->insert($table, $data);
	}
}

?>