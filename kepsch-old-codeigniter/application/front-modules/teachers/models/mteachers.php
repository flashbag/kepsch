<?php

class Mteachers extends CI_Model
{


	public function all()
	{	
		$teachers = array();

		$this->db->order_by('surname','asc');
		$rows = $this->db->get('teachers')->result();

		foreach ($rows as $row)
		{
			$id = $row->id;
			$title = $row->surname.' ';
			$href = $row->surname.' '.$row->initials;
			$title .= (!empty($row->name)) ? $row->name.' '.$row->second_name : $row->initials ;

			$teachers[$id] = array('href' => $href, 'title' => $title );
		}

		return $teachers;
	}

}

?>
