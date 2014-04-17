<?php

class MHome extends CI_Model
{
	
	public function stat()
	{
		
		$this->db->where('status','1');
		$ready = $this->db->count_all_results('groups');

		$this->db->where('level','1');
		$moders = $this->db->count_all_results('users');

		return array(

				'ready'			=> $ready,
				'moders'		=> $moders,
				'last_edited'	=> $this->last_edited(),
				'auds'			=> $this->db->count_all('auds'),
				'specs'			=> $this->db->count_all('specs'),
				'groups'		=> $this->db->count_all('groups'),
				'lessons'		=> $this->db->count_all('lessons'),				
				'teachers'		=> $this->db->count_all('teachers'),
				
			);
	}


	private function last_edited()
	{
		$CI =& get_instance();
	    $CI->load->library('lib');

	    $this->db->select('id, updated_time, updated_by');
		$this->db->where('updated_time IS NOT NULL', null, false);
		$this->db->order_by('updated_time','DESC');
		$this->db->limit(10);
	    

		$query = $this->db->get('groups');

		foreach ($query->result() as $obj) {
			
			$array[$obj->id] = array(							
										'updated_by'	=> 	$obj->updated_by,
										'updated_time' 	=>  $obj->updated_time,
											'group'		=>	$CI->lib->group_name($obj->id),
					);
		}

		return $array;
	}

}
?>