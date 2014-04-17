<?php

class MUsers extends CI_Model
{
	private $table = 'users';

	public function get()
	{
		$CI =& get_instance();
	    $CI->load->library('lib');

	    $this->db->select('id,level,username,added,moderate');
		$this->db->order_by('level','asc');

		$query = $this->db->get($this->table);		
		$obj = $query->result();

		foreach ($obj as $el) {		

			$mid = intval($el->moderate);
			
			$group = ($mid != 0) ? array('id'=>$mid, 'name' => $CI->lib->group_name($el->moderate)) : array('id'=>0,'name'=>'');
			$needed[] = array('id' => $el->id, 'level' => $el->level, 'username' => $el->username, 'added' => $el->added, 'group' => $group);

 		}
		
	 	return $needed; 
	}	

	public function create($data) 
	{
		$this->level = $data['level'];

		$this->username = $data['username'];
		$this->password = $data['password'];
		$this->moderate = $data['moderate'];

		$query = "INSERT INTO $this->table VALUES ('','$this->level','$this->username','$this->password',now(), '$this->moderate');";

	 	return $this->db->query($query);
	}


	public function read($id)	 
	{
		$this->db->select('id, level, username, moderate');
		$this->db->from($this->table);
		$this->db->where('id',$id); 
		$this->db->limit(1);

		$query = $this->db->get();

		if($query -> num_rows() == 1)
			{ return $query->row_array(); }
		else
			{ return false; }
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