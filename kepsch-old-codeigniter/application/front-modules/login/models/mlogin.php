<?php

class MLogin extends CI_Model
{
	public function login($username, $password)
	{
		$this->db->select('id, level, username, password');
		$this->db->from('users');
		$this->db->where('username',$username); 
		$this->db->where('password',md5($password)); 
		$this->db->limit(1);

		$query = $this->db->get();

		if($query -> num_rows() == 1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}

	}

}

?>