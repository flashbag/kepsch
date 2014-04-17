<?php

class MEdit extends CI_Model
{
	public $table = 'records';

	public function schedule($id)
	{
		$sch = $new = array();
		
		$this->db->order_by('day','asc');
		$this->db->order_by('number','asc');
		$this->db->order_by('week','asc');
		$this->db->where('group_id',$id);

		$schs = $this->db->get($this->table)->result();

		foreach ($schs as $r) 
		{ 
			$d = $r->day; $w = $r->week;
			$a = $r->aud_id; $n = $r->number;
			$l = $r->lesson_id; $t = $r->teacher_id;

			$sch[$d][$n][$l][$w]['a'][] = $a; sort($sch[$d][$n][$l][$w]['a']);
			$sch[$d][$n][$l][$w]['t'][] = $t; sort($sch[$d][$n][$l][$w]['t']);
		}

		foreach ($sch as $d => $day) 
		{	foreach ($day as $n => $num) 
			{	foreach ($num as $l => $les)
				{	foreach ($les as $w => $wee)
					{
						$aa = $tt = array();

						$aaa = array_unique($wee['a']); $ttt = array_unique($wee['t']);

						$i=1; foreach ($aaa as $k => $a) { $aa[$i] = $a; $i++; } for ($o=$i; $o<4; $o++) { $aa[$o] = 0; }
						$i=1; foreach ($ttt as $k => $t) { $tt[$i] = $t; $i++; } for ($o=$i; $o<4; $o++) { $tt[$o] = 0; }

						$sch[$d][$n][$l][$w]['a'] = $aa; $sch[$d][$n][$l][$w]['t'] = $tt;
					}
				}
			}
		}

		foreach ($sch as $d => $day) 
		{ 	$i = 1;	
			foreach ($day as $n => $num) 
			{	foreach ($num as $l => $les) 
				{	foreach ($num as $l => $les) 
					{	
						$week = $uniq = array(); $wstr = '';
						$similar = array('keys' => array(), 'values' => array());

						foreach ($les as $el) { if (!in_array($el, $uniq)) { $uniq[] = $el; } }			

						foreach ($uniq as $uk => $uv)
						{	foreach ($les as $key => $value)
							{	if ($uv == $value) 
								{   $similar['keys'][$uk][] = $key;
									$similar['values'][$uk] = $value;
						}	}	}

						foreach ($similar['keys'] as $nn => $keys)
						{	foreach ($keys as $key) { $wstr .= $key; }				
							$week[$wstr] = $similar['values'][$nn]; $wstr = '';
						}

						ksort($week);

						foreach ($week as $w => $v)
						{
							$new[$d][$i][$n]['n'] = $n;
							$new[$d][$i][$n]['l'] = $l;
							$new[$d][$i][$n]['w'] = $w;
							$new[$d][$i][$n]['a'] = $v['a'];
							$new[$d][$i][$n]['t'] = $v['t'];
							$i++;
						}									
					}	
				}
			}
		}

		return $new;

	}




	public function exist($id)
	{
		return ($this->db->get_where('groups',array('id'=>$id))->num_rows()>0) ? true : false ;
	}

	public function can_edit($id,$username)
	{
		$moderate = $this->db->get_where('users',array('username'=>$username))->row()->moderate;
		if ($moderate == 0 || $moderate == $id) { return true; } else { return false; } 
	}

	public function info($id)
	{	
		$this->db->select('status, updated_by, updated_time');
		$this->db->where('id',$id);

		return $this->db->get('groups')->row_array();
	}


	public function set_updated($data,$id) 
	{
		$this->status = $data['status'];
		$this->updated_by = $data['updated_by'];
		$this->updated_time = $data['updated_time'];

		$query = "UPDATE groups SET status = '$this->status', updated_by = '$this->updated_by', updated_time = now() WHERE id = $id";

	 	return $this->db->query($query);
	}

	public function get_updated($id) 
	{
		$this->db->select('updated_by, updated_time');
		$this->db->where('id',$id);
		
		$query = $this->db->get('groups');
		$row = $query->row();

	 	return $row;
	}






	public function insert($data) 
	{
	 	return $this->db->insert($this->table,$data);
	}
	
	public function update($data,$id)	 
	{
		$this->db->where('id',$id);
		return $this->db->update($this->table, $data);
	}

	public function delete($data) 
	{
		$this->db->where($data);
		return $this->db->delete($this->table);
	}









	public function check($data) 
	{
		$this->db->select('id');
		$this->db->where($data); 
		$this->db->limit(1);

		$query = $this->db->get($this->table);
		$row = $query->row();

		if($query->num_rows() == 1)
			{  return $row->id; }
		else
			{ return false; }
	}

	public function unused($id) 
	{
		$this->db->select('day,week,number,aud_id,group_id,teacher_id,lesson_id');
		$this->db->where('group_id',$id);

		$query = $this->db->get($this->table);

		if($query->num_rows() > 0)
			{  return $query->result_array(); }
		else
			{ return false; }
	}









	public function auds()
	{
		$auds[] = ' - ';

		$this->db->select('id, type, name');
		$this->db->order_by('name','asc');

		$query = $this->db->get('auds');
		
	 	foreach ($query->result() as $aud) 
	 		{ $auds[$aud->id] = $aud->name; }

	 	return $auds;
	}

	public function specs()
	{
		$specs[] = ' - ';

		$this->db->select('id,code,name,description');
		$this->db->order_by('name','asc');

		$query = $this->db->get('specs');
		
	 	foreach ($query->result() as $spec) 
	 		{ $specs[$spec->id] = $spec->code; }

	 	return $specs; 
	}	


	public function teachers()
	{
		$teachers[] = ' - ';

		$this->db->select('id,surname,initials');
		$this->db->order_by('surname','asc');

		$query = $this->db->get('teachers');

	 	foreach ($query->result() as $teacher) 
	 		{ $teachers[$teacher->id] = $teacher->surname. ' '.$teacher->initials; }

	 	return $teachers;
	}

	public function lessons()
	{
		$lessons[] = ' - ';

		$this->db->select('id,name');
		$this->db->order_by('name','asc');

		$query = $this->db->get('lessons');

	 	foreach ($query->result() as $lesson)
	 		{ $lessons[$lesson->id] = $lesson->name; }

	 	return $lessons;
	}	
}
?>
