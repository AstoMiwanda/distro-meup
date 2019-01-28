<?php
class Excel_import_model extends CI_Model
{
	function select()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('t_upload');
		return $query;
	}

	function insert($table,$data)
	{
		$this->db->insert_batch($table, $data);
	}
}