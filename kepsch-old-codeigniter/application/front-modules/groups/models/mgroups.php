<?php

class MGroups extends CI_Model
{

	public function all()
	{
		$this->db->order_by('spec_id','asc');
		$this->db->order_by('year','desc');
		$this->db->order_by('number','asc');		

		$rows = $this->db->get('groups')->result();

		foreach ($rows as $row)
		{
			$s = $row->spec_id;
			$y = (strlen($row->year) == 1) ? '0'.$row->year : $row->year;
			$n = (strlen($row->number) == 1) ? '0'.$row->number : $row->number;
		
			$groups[$this->spec($s)][$y][$n] = $this->group($s,$y,$n);
		}

		return $groups;
	}

	private function spec($id)
	{	
		$this->db->select('code');
		return $this->db->get_where('specs',array('id'=>$id))->row()->code;
	}

	private function group($s,$y,$n)
	{
		$this->db->select('id,status');
		$this->db->where('spec_id',$s);
		$this->db->where('year',$y);
		$this->db->where('number',$n);

		$row = $this->db->get('groups')->row();

		return array('id' => $row->id, 'status' => $row->status);
	}

}

?>
