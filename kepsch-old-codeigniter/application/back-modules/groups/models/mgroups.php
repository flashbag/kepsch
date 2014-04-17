<?php

class MGroups extends CI_Model
{
	private $table = 'groups';


	public function create($data) 
	{
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}

	public function delete($id) 
	{
		$this->db->where('id',$id);
		return $this->db->delete($this->table);
	}
	
	public function all()
	{
		$this->db->order_by('spec_id','asc');
		$this->db->order_by('year','desc');
		$this->db->order_by('number','asc');		

		$rows = $this->db->get($this->table)->result();

		foreach ($rows as $row)
		{
			$s = $row->spec_id;
			$y = (strlen($row->year) == 1) ? '0'.$row->year : $row->year;
			$n = (strlen($row->number) == 1) ? '0'.$row->number : $row->number;
		
			$groups[$this->spec($s)][$y][$n] = $this->group($s,$y,$n);
		}

		return $groups;
	}


	public function spec($id)
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

		$row = $this->db->get($this->table)->row();

		return array('id' => $row->id, 'status' => $row->status);
	}


	public function check($spec, $year, $number)	 
	{
		$this->db->select('spec_id');
		$this->db->where('spec_id',$spec); 
		$this->db->where('year',$year); 
		$this->db->where('number',$number); 
		$this->db->limit(1);

		$query = $this->db->get($this->table);

		if($query -> num_rows() == 1)
			{ return false; }
		else
			{ return true; }
	}

}

?>
