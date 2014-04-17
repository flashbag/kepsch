<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Specs extends MX_Controller {

	private $verify = 'verify';

	function __construct()
	{
 		parent::__construct();
 		$this->load->model('mspecs');
 		$this->load->library('form_validation');
 	}


 	private function access()
 	{
		if (!$this->lib->logged() || !$this->lib->admin()) 			
		{
			$this->session->set_flashdata('info',$this->config->item('you_cant'));
			redirect('admin/'.$this->router->class,'refresh');
		}	
 	}

 	public function index()
	{
		$this->template 		
			->set('list',$this->mspecs->get())
			->build('specs');	

	}

	public function create()	 
	{	
		$this->access();

		if ($this->uri->segment(3) == $this->verify)
		{		
			$this->form_validation->set_rules('code', 'код', 'trim|required|xss_clean|is_unique[specs.code]');
			$this->form_validation->set_rules('name', 'назва', 'trim|required|xss_clean');
			$this->form_validation->set_rules('description', 'опис', 'trim|xss_clean');
	
			if($this->form_validation->run() == true)
			{
				$data = array(
						'code'			=>	$this->input->post('code'),
						'name'			=>	$this->input->post('name'),
						'description'	=>  $this->input->post('description')
					);

				$this->mspecs->create($data);

				$this->session->set_flashdata('info',sprintf($this->config->item('created_spec'),$this->input->post('name')));

	  			redirect('admin/'.$this->router->class, 'refresh');
			}
		} 

		$this->template->build('create');			
	}
	 

	 
	public function edit($id = null)	 
	{
		$this->access();

		if ($id != null)
		{
			$spec = $this->mspecs->read($id);
			$this->template->set('spec',$spec);

			if ($this->uri->segment(3) == $this->verify)
			{		
				$this->form_validation->set_rules('name', 'назва', 'trim|required|xss_clean');
				$this->form_validation->set_rules('description', 'опис', 'trim|xss_clean');
	
				if($this->form_validation->run() == true)
				{
					$data['name'] = $this->input->post('name');
					$data['description'] = $this->input->post('description');

					$this->mspecs->update($data,$this->input->post('id'));

					$this->session->set_flashdata('info',sprintf($this->config->item('updated_spec'),$this->input->post('name')));

		  			redirect('admin/'.$this->router->class, 'refresh');
				}
			} 

			$this->template->build('edit');						

		} else { redirect('admin/'.$this->router->class,'refresh'); }

	}



	public function delete($id = null)	 
	{
		$this->access();

		if ($id != null)
		{
			$spec = $this->mspecs->read($id);
			$this->template->set('spec',$spec);
		
			if ($this->uri->segment(3) == $this->verify)
			{						
				$this->form_validation->set_rules('password', 'пароль', 'trim|required|xss_clean');
	
				if($this->form_validation->run() == true)
				{
					if (md5($this->input->post('password')) == $this->config->item('super')) 
					{
						$this->mspecs->delete($this->input->post('id'));
						$this->session->set_flashdata('info',sprintf($this->config->item('deleted_spec'),$this->input->post('name')));
					} else {
						$this->session->set_flashdata('info',$this->config->item('bad_super'));
					}

					redirect('admin/'.$this->router->class, 'refresh');	
						
				}
			} 

			$this->template->build('delete');						

		} else { redirect('admin/'.$this->router->class,'refresh'); }

	}


}

?>