<?php

class Edit extends MX_Controller {	

	private $verify = 'verify';

	public function __construct()
	{
 		parent::__construct();
 		$this->load->model('medit');
 		$this->load->library('form_validation');

 		$this->template
 			->set('auds',$this->medit->auds())
 			->set('specs',$this->medit->specs())
 			->set('lessons',$this->medit->lessons())
 			->set('teachers',$this->medit->teachers())
 			->set('days',$this->config->item('days'))
 			->set('weeks',$this->config->item('week'))
 			->set('status',$this->config->item('status'))
 			->set('numbers',$this->config->item('numbers'))
 			;

		$this->output->enable_profiler(false);
 	}

 	public function index($id = null)
 	{ 		
 		$id = $this->uri->segment(2);

 		if ($id == $this->verify) 
 		{
 			$id = $this->input->post('id');

 			var_dump($this->medit->can_edit($id,$this->session->userdata('username')));

 			if ($this->lib->logged() && $this->medit->can_edit($id,$this->session->userdata('username')))
 			{	

 				
 				for ($d=1; $d<=count($this->config->item('days')); $d++) 
				{
					for ($n=1; $n<=$this->config->item('pars'); $n++) 
					{
						$weeks = $auds = $tchs = $a_c = $t_c = array();					

						$week = $_POST['week'][$d][$n]; $num = $_POST['number'][$d][$n];	$l = $_POST['lesson'][$d][$n];

						$a_c[] = $_POST['aud'][$d][$n][1];	$t_c[] = $_POST['teacher'][$d][$n][1];
						$a_c[] = $_POST['aud'][$d][$n][2];	$t_c[] = $_POST['teacher'][$d][$n][2];
						$a_c[] = $_POST['aud'][$d][$n][3];	$t_c[] = $_POST['teacher'][$d][$n][3];

						foreach ($a_c as $a) { if ($a != '0' && !in_array($a, $auds)) { $auds[] = $a; } }
						foreach ($t_c as $t) { if ($t != '0' && !in_array($t, $tchs)) { $tchs[] = $t; } }
					
						for ($x=0; $x<strlen($week); $x++) { if (substr($week,$x,1) != '0') { $weeks[]=substr($week,$x,1); } } 

						if (count($auds) == 0) { $auds[] = 0; }

						

						foreach ($weeks as $w) 
						{	foreach ($auds as $a) 
							{	foreach ($tchs as $t) 
								{
									
									$data = array(
										'day'		=>	$d,
										'week'		=>	$w,
										'number'	=>	$num,
										'aud_id'	=>	$a,
										'group_id'	=>	$id,
										'lesson_id'	=>	$l,
										'teacher_id'=>	$t,
									);
											
									$check[] = $data;

									$upd_id = $this->medit->check($data);

									if (strlen($upd_id) == 0) 
									{ $this->medit->insert($data);  $author = true; } 
										else { $this->medit->update($data,$upd_id); $author = false; }	
									
								}
							}
						}
						
								
					}
				}
				

				$unused = $this->medit->unused($id);

				if ($unused) 
				{	foreach ($unused as $array) 
					{	if (!in_array($array, $check)) { $this->medit->delete($array); } }
				}

				
				$updated = $this->medit->get_updated($id); 

				$upd = array(
					'status' 		=> $this->input->post('status'),
					'updated_by'	=> (($author == true) ? $this->session->userdata('username') : $updated->updated_by),
					'updated_time'	=> (($author == true) ? '' : $updated->updated_time ),
				);

				$this->medit->set_updated($upd,$id);

				$this->session->set_flashdata('info',$this->config->item('has_been_edited'));
			
			} else { $this->session->set_flashdata('info',$this->config->item('you_cant_edit')); }

			#redirect('admin/edit/'.$id,'refresh');
			
 		} else {

 			if ($this->medit->exist($id))
 			{
 				$this->session->set_userdata('group_id',$id);
				$this->template
					->set('id',$id)
					->set('info',$this->medit->info($id))
					->set('sch',$this->medit->schedule($id))
					->set('group',$this->lib->group_name($id))
					->build('edit');

	 		} else {

 				redirect('admin/groups','refresh');

 			}
	 	}
 	}

}

?>