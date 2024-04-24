<?php 

class Openingedit_model extends CI_Model
{
	public function createData($data)
	{
		$query = $this->db->insert('postal_recive',$data);
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

	public function fetchSingleData($data,$tablename,$where)
	{
		$query = $this->db->select($data)
						->from($tablename)
						->where($where)
						->get();
		return $query->row_array();
	}

	public function fetchDataById($id) {
		$query = $this->db->get_where('postal_recive', array('id' => $id));
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	

	public function update_record($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('postal_recive', $data);
	 }
	 
	 function update_student($data, $id)
	 {
		 $this->db->where('id', $id);
		 $this->db->update('postal_recive', $data);
		 return true;
	 }

    public function get_student_by_id($id) {
        $this->db->select('*');
        $this->db->from('postal_recive');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

	
	public function deleteData($tablename,$where)
	{
		$query = $this->db->delete($tablename,$where);
		return $query;
	}


	public function insertDynamicData($tablename, $data)
	{
		$query = $this->db->insert($tablename, $data);
		return $query;
	}


//it moves record from postal_recive table to studentverify_master
	public function moveToVerify($id) {
		// Get the record from the unverify table
		$this->db->select('id, label_name, Comp_name, pub_date, pub_edate, email, link, department,degree,master');
		$query = $this->db->get_where('postal_recive', array('id' => $id));
		
		if ($query->num_rows() == 1) {
			$record = $query->row_array();
			
			// Remove the record from the unverify table
			$this->db->delete('postal_recive', array('id' => $id));
			
			// Insert the record into the verify file table
			return $this->db->insert('Openingverify_master', $record);
		} else {
			return false;
		}
	}

	public function moveTodeactive($id) {
		// Get the record from the unverify table
		$this->db->select('id, label_name, Comp_name, pub_date, pub_edate, email, link, department,degree,master');
		$query = $this->db->get_where('Openingverify_master', array('id' => $id));
		
		if ($query->num_rows() == 1) {
			$record = $query->row_array();
			
			// Remove the record from the unverify table
			$this->db->delete('Openingverify_master', array('id' => $id));
			
			// Insert the record into the verify file table
			return $this->db->insert('Openingdeactive_master', $record);
		} else {
			return false;
		}
	}

	
	
	
}