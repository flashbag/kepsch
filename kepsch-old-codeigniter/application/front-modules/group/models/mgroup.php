<?php

class MGroup extends CI_Model
{

	public function name($id)	 
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

   			return $code.'-<small>'.$year.'</small>-<small>'.$number.'</small>';
   			
		} else { return $this->config->item('unknown_group'); }
	}


	public function schedule($id,$week)
	{
		$sch = array();

		$this->db->order_by('day','asc');
		$this->db->order_by('number','asc');
		$this->db->order_by('week','asc');
		$this->db->where('week',$week);
		$schs = $this->db->get_where('records',array('group_id' => $id))->result();

		foreach ($schs as $record)
		{
			$d = $record->day;
			$n = $record->number;
			$t = $record->teacher_id;
			$l = $record->lesson_id;
			$a = $record->aud_id;

			$sch[$d][$n]['lesson'] = $this->lesson($l);
			$sch[$d][$n]['teachers'][$t] = $this->teacher($t);
			$sch[$d][$n]['auds'][$a] = $this->auditory($a);

		}

		return $sch;

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