<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Lib {

	public function title()
	{
		$string = 'Розклад пар КЕПу';

		return $string;
	}

	
	public function week($w) 
	{
		if ($w == null || ($w < 0 || $w > 4) ) 
		{ 
			$today = mktime(0, 0, 0, date('n'),date('j'),2013);
			$start = mktime(0, 0, 0, 4, 13, 2013);
			$week=(($today-$start)/604800)%4+1;
			
		} else { $week = $w; }

		
		return $week;
	}

    public function logged()
    {
        $CI =& get_instance();
        $CI->load->library('session');
        return ($CI->session->userdata('level') != null) ? true : false;
    }


    public function admin()
    {
        $CI =& get_instance();
        $CI->load->library('session');
        return ($CI->session->userdata('level') == '0') ? true : false;
    }


    public function moder($id)
    {
        $CI =& get_instance();
        $CI->load->database();
      
        $CI->db->select('id');
        $CI->db->where('moderate',$id);

        return ($CI->db->get('users')->num_rows()>0) ? true : false;
    }


	public function specs()
	{
		$CI =& get_instance();
		$CI->load->database();

		$CI->db->select('id,code,name,description');
		$CI->db->from('specs');
		$CI->db->order_by('name','asc');

		$query = $CI->db->get();
		
		$specs[] = ' - ';

	 	foreach ($query->result() as $spec) {
	 		$specs[$spec->id] = $spec->code;
	 	}

	 	return $specs; 
	}	


	public function group_name($id)	 
	{		
		$CI =& get_instance();
		$CI->load->database();

		if ($id == '' || $id == '0') { return false; }

		else {

			$CI->db->select('spec_id, year, number');
   			$row = $CI->db->get_where('groups',array('id'=>$id))->row(); 

   			$year = (strlen($row->year) == 1) ? '0'.$row->year : $row->year;
   			$number = (strlen($row->number) == 1) ? '0'.$row->number : $row->number;

   			$CI->db->select('code');
			$code = $CI->db->get_where('specs',array('id'=>$row->spec_id))->row()->code;

			return $code.'-'.$year.'-'.$number;

		}

	
	}


	public function group_id($spec_id, $year, $number)	 
	{
		$CI =& get_instance();
		$CI->load->database();

		$CI->db->select('id');
		$CI->db->where('spec_id',$spec_id); 
		$CI->db->where('year',$year); 
		$CI->db->where('number',$number); 

		$query = $CI->db-> get('groups');
		$row = $query->row();

		if ($query->num_rows() > 0) 
			{ return $row->id; } 
		else { return false; }
	}
}

?>