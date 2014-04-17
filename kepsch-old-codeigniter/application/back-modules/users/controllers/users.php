<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MX_Controller {

	private $verify = 'verify';

	function __construct()
	{
 		parent::__construct();
 		$this->load->model('musers');
 		$this->load->library('form_validation');

 		$this->template->set('specs',$this->lib->specs());
 		$this->template->set('nums',$this->config->item('nums'));
 		$this->template->set('years',$this->config->item('years'));
 		$this->template->set('types',$this->config->item('users_types')); 		
 	}


 	private function access()
 	{
		if (!$this->lib->logged() || !$this->lib->admin()) 			
		{
			$this->session->set_flashdata('info',$this->config->item('you_cant'));
			redirect('admin/users','refresh');
		}	
 	}


 	public function index()
	{
		$this->template 				
			->set('list',$this->musers->get())
			->build('users');	

	}

	public function create()	 
	{	
		$this->access();

		if ($this->uri->segment(3) == $this->verify)
		{		
			$this->form_validation->set_rules('level', 'тип', 'trim|required|xss_clean');
			$this->form_validation->set_rules('username', 'логін', 'trim|required|xss_clean|is_unique[users.username]');
			$this->form_validation->set_rules('password', 'пароль', 'trim|required|xss_clean');
	
			if($this->form_validation->run() == true)
			{
				$y = $this->input->post('year');
				$n = $this->input->post('number');
				$s = $this->input->post('spec_id');

				$moderate = ($this->input->post('level') == 1) ? $this->lib->group_id($s,$y,$n) : 0; 

				$data = array(
						'moderate'	=>	$moderate,
						'level'		=>	$this->input->post('level'),
						'username'	=>	$this->input->post('username'),
						'password'	=>	md5($this->input->post('password'))
				);

				$this->session->set_flashdata('info',sprintf($this->config->item('created_user'),$this->input->post('username')));

				$this->musers->create($data);
	  			redirect('admin/users', 'refresh');
			}
		} 

		$this->template->build('create');			
	}
	 

	 
	public function edit($id = null)	 
	{
		$this->access();

		if ($id != null)
		{
			$user = $this->musers->read($id);
			$group = $this->lib->group_name($user['moderate']);

			$this->template->set('user',$user);
			$this->template->set('group',$group);

			if ($this->uri->segment(3) == $this->verify)
			{		
				$this->form_validation->set_rules('level', 'тип', 'trim|required|xss_clean');
	
				if($this->form_validation->run() == true)
				{
					$y = $this->input->post('year');
					$n = $this->input->post('number');
					$s = $this->input->post('spec_id');

					$data['level'] = $this->input->post('level');						
					$data['moderate'] = ($this->input->post('level') == 1) ? $this->lib->group_id($s,$y,$n) : 0; 

					$this->session->set_flashdata('info',sprintf($this->config->item('updated_user'),$this->input->post('username')));

					$this->musers->update($data,$this->input->post('id'));

		  			redirect('admin/users', 'refresh');
				}
			} 

			$this->template->build('edit');						

		} else { redirect('admin/users','refresh'); }

	}



	public function delete($id = null)	 
	{
		$this->access();

		if ($id != null)
		{
			$user = $this->musers->read($id);
			$group = $this->lib->group_name($user['moderate']);

			$this->template->set('user',$user);
			$this->template->set('group',$group);

			if ($this->uri->segment(3) == $this->verify)
			{		
				$this->form_validation->set_rules('password', 'пароль', 'trim|required|xss_clean');
	
				if($this->form_validation->run() == true)
				{
					if (md5($this->input->post('password')) == $this->config->item('super')) 
					{
						$this->musers->delete($this->input->post('id'));
						$this->session->set_flashdata('info',sprintf($this->config->item('deleted_user'),$this->input->post('username')));
					} else {
						$this->session->set_flashdata('info',$this->config->item('bad_super'));
					}

					redirect('admin/users', 'refresh');	
						
				}
			} 

			$this->template->build('delete');						

		} else { redirect('admin/users','refresh'); }

	}


}

?>