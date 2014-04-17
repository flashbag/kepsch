<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Groups extends MX_Controller {

	private $admin = 'admin/';
	private $verify = 'verify';

    public function __construct() 
    {
        parent::__construct();
		$this->load->model('mgroups');
		$this->load->library('form_validation'); 

 		$this->template->set('specs',$this->lib->specs());
 		$this->template->set('nums',$this->config->item('nums'));
 		$this->template->set('years',$this->config->item('years'));
    }

	public function index()
	{   		
		$this->template 				
			->set('groups',$this->mgroups->all())
			->build('groups');		
	}
        
	private function access()
 	{
		if (!$this->lib->logged() || !$this->lib->admin()) 			
		{
			$this->session->set_flashdata('info',$this->config->item('you_cant'));
			redirect('admin/'.$this->router->class,'refresh');
		}	
 	}

	public function create()	 
	{	
		$this->access();

		if ($this->uri->segment(3) == $this->verify)
		{		
			$this->form_validation->set_rules('spec', 'спеціальність', 'trim|required|xss_clean');
			$this->form_validation->set_rules('year', 'рік вступу', 'trim|required|xss_clean');
			$this->form_validation->set_rules('number', 'номер', 'trim|required|xss_clean'); 
	
			if($this->form_validation->run() == true && $this->mgroups->check($this->input->post('spec'),$this->input->post('year'),$this->input->post('number')))
			{
				$data = array(
						'spec_id'		=>	$this->input->post('spec'),
						'year'			=>	$this->input->post('year'),
						'number'		=>	$this->input->post('number')
					);

				$id = $this->mgroups->create($data);
				$this->session->set_flashdata('info',sprintf($this->config->item('created_group'),$this->lib->group_name($id)));

			} else {

				$this->session->set_flashdata('info',$this->config->item('group_exist'));
	  			
			}

			redirect('admin/'.$this->router->class, 'refresh');
		} 

		$this->template->build('create');			
	}


	public function delete($id = null)	 
	{
		$this->access();

		if ($id != null)
		{
			if ($this->uri->segment(3) == $this->verify)
			{						
				$this->form_validation->set_rules('password', 'пароль', 'trim|required|xss_clean');
	
				if($this->form_validation->run() == true)
				{
					if (md5($this->input->post('password')) == $this->config->item('super')) 
					{
						$this->mgroups->delete($this->input->post('id'));
						$this->session->set_flashdata('info',sprintf($this->config->item('deleted_group'),$this->input->post('name')));
					} else {
						$this->session->set_flashdata('info',$this->config->item('bad_super'));
					}

					redirect('admin/'.$this->router->class, 'refresh');	
				}
			} 

			$this->template
				->set('id',$id)
				->set('name',$this->lib->group_name($id))
				->build('delete');						

		} else { redirect('admin/'.$this->router->class,'refresh'); }
	}

}

?>