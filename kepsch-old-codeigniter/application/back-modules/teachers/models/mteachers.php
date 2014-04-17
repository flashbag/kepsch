<?php

class MTeachers extends CI_Model
{
	private $table = 'teachers';

    public function count($filter = false) 
    {
    	if ($filter) 
    	{
    		$this->db->like('surname', $filter); 
    		$this->db->or_like('initials', $filter); 
    		$this->db->or_like('name', $filter); 
    		$this->db->or_like('second_name', $filter); 
    	}

        $this->db->from($this->table);

        return $this->db->count_all_results(); 
    }


	public function get($start, $limit, $filter = false)
	{		
		$this->db->order_by('surname','asc');
		$this->db->limit($limit, $start);

    	if ($filter) 
    	{
    		$this->db->like('surname', $filter); 
    		$this->db->or_like('initials', $filter); 
    		$this->db->or_like('name', $filter); 
    		$this->db->or_like('second_name', $filter); 
    	}

		$query = $this->db->get($this->table);
		
	 	return $query->result_array(); 
	}	

	public function create($data) 
	{
		return $this->db->insert($this->table,$data);
	}


	public function read($id)	 
	{
		$this->db->where('id',$id); 
		$this->db->limit(1);

		$query = $this->db-> get($this->table);

		if($query -> num_rows() == 1)
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
	}

	public function update($data,$id)	 
	{
		$this->db->where('id',$id);
		return $this->db->update($this->table, $data);
	}


	public function delete($id) 
	{
		$this->db->where('id',$id);
		return $this->db->delete($this->table);
	}
	


	function check($surname, $initials)	 
	{
		$this->db->select('id');
		$this->db->where('surname',$surname);
		$this->db->where('initials',$initials);
		$this->db->limit(1);

		$query = $this->db->get($this->table);

		if($query -> num_rows() == 1)
			{ return false; }
		else
			{ return true; }
	}
}
?>