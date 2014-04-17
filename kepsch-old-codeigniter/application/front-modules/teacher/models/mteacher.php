<?php

class Mteacher extends CI_Model
{

	public function name($id)	 
	{
		$this->db->select('surname, initials');
		$query = $this->db->get_where('teachers',array('id'=>$id));

		if ($query->num_rows() > 0)
		{
   			$row = $query->row(); 
   			return $row->surname.' '.$row->initials;
   			
		} else { return $this->config->item('unknown_teacher'); }
	}


	public function schedule($id,$week)
	{
		$sch = array();

		$this->db->order_by('day','asc');
		$this->db->order_by('number','asc');
		$this->db->order_by('week','asc');
		$this->db->where('week',$week);
		$schs = $this->db->get_where('records',array('teacher_id' => $id))->result();

		foreach ($schs as $record)
		{
			$d = $record->day;
			$n = $record->number;
			$g = $record->group_id;
			$l = $record->lesson_id;
			$a = $record->aud_id;

			$sch[$d][$n]['group']['id'] = $g;
			$sch[$d][$n]['group']['name'] = $this->group($g);
			$sch[$d][$n]['lesson'] = $this->lesson($l);
			$sch[$d][$n]['auds'][$a] = $this->auditory($a);

		}

		return $sch;

	}





	private function group($id)	 
	{
		$this->db->select('spec_id, year, number');
		$query = $this->db->get_where('groups',array('id'=>$id));

		if ($query->num_rows() > 0)
		{
   			$row = $query->row(); 

   			$year = (strlen($row->year) == 1) ? '0'.$row->year : $row->year;
   			$row->number; 	$number = (strlen($row->number) == 1) ? '0'.$row->number : $row->number;

   			$this->db->select('code');
			$code = $this->db->get_where('specs',array('id'=>$row->spec_id))->row()->code;

   			return $code.'-'.$year.'-'.$number;
   			
		} else { return false; }
	}

	private function lesson($id)
	{
		return $this->db->get_where('lessons',array('id'=>$id))->row_array();
	}


	private function teacher($id)
	{
		return $this->db->get_where('teachers',array('id'=>$id))->row_array();
	}


	private function auditory($id)
	{
		$query = $this->db->get_where('auds',array('id'=>$id));

		if ($query->num_rows() > 0) 
			{ return  $query->row()->name; } 
			else { return ''; }
	}
}

?>