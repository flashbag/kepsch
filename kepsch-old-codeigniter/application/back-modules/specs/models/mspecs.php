<?php

class MSpecs extends CI_Model
{
	private $table = 'specs';

	public function get()
	{
		$this->db->select('id,code,name,description');
		$this->db->order_by('name','asc');

		return $this->db->get($this->table)->result_array(); 
	}	

	public function create($data) 
	{
		return $this->db->insert($this->table,$data);
	}

	public function read($id)	 
	{
		$this->db->select('id, code, name, description');
		$this->db->where('id',$id); 
		$this->db->limit(1);

		$query = $this->db->get($this->table);

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