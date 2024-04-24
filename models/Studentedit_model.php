<?php 

class Studentedit_model extends CI_Model
{
	public function createData($data)
	{
		$query = $this->db->insert('studentcreate_master',$data);
		return $query;
	}

	public function fetchAllData($data,$tablename,$where)
	{
		$query = $this->db->select($data)
						->from($tablename)
						->where($where)
						->get();
		return $query->result_array();
	}
}