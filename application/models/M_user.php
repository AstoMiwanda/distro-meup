<?php

/**
* 
*/
class M_user extends CI_Model
{

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