<?php

class MAuds extends CI_Model
{
	private $table = 'auds';

    public function count($filter = false) 
    {
    	if ($filter) 
    	{
    		$this->db->like('name', $filter); 
    	}

        $this->db->from($this->table);

        return $this->db->count_all_results(); 
    }


	public function get($start, $limit, $filter = false)
	{		
		$this->db->order_by('name','asc');
		$this->db->limit($limit, $start);

    	if ($filter) 
    	{
    		$this->db->like('name', $filter); 
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
	
}
?>