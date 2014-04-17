<?php

class MDownload extends CI_Model
{
	private $table = 'download';



	public function get()
	{
		$this->db->order_by('orderr','asc');

		return $this->db->get($this->table)->result_array(); 
	}	

	public function create($data) 
	{
		return $this->db->insert($this->table,$data);
	}

	public function read($id)	 
	{
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
	
	public function image($id)
	{
		$this->db->select('image');
		return $this->db->get_where($this->table, array('id' => $id))->row()->image;
	}	


	public function file($id)
	{
		$this->db->select('file');
		return $this->db->get_where($this->table, array('id' => $id))->row()->file;
	}	

	public function filename($id)
	{
		$this->db->select('filename');
		return $this->db->get_where($this->table, array('id' => $id))->row()->filename;
	}	



	public function increment($id)
	{
		$this->db->where('id', $id);
		$this->db->set('loaded', "loaded+1", FALSE);
		$this->db->update($this->table);
	}
}
?>