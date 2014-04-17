<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teachers extends MX_Controller {

	private $admin = 'admin/';
	private $verify = 'verify';

	function __construct()
	{
 		parent::__construct();
 		
 		#$this->output->enable_profiler(true);

 		$this->load->model('mteachers');
 		$this->load->library('pagination');
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
		$total = $this->mteachers->count();
		$this->config->config['uri_segment'] = 2;
		$this->config->config['base_url'] = base_url().$this->admin.$this->router->class;
		$this->config->config['total_rows'] = $total;

		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$this->pagination->initialize($this->config->config);

		$this->template	
			->set('total',$total)
			->set('pager',$this->pagination->create_links())
			->set('list',$this->mteachers->get($page,$this->config->config['per_page']))
			->build('list');	

	}

 	public function search()
	{		
		$filter = $this->input->post('filter');
		if ($filter) { $this->session->set_userdata('filter',$filter); }
			else { $filter = $this->session->userdata('filter'); }

		$total = $this->mteachers->count($filter);
		$this->config->config['uri_segment'] = 3;
		$this->config->config['base_url'] = base_url().$this->admin.$this->router->class.'/search';
		$this->config->config['total_rows'] = $total;

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->pagination->initialize($this->config->config);

		$this->template	
			->set('total',$total)
			->set('filter',$filter)
			->set('pager',$this->pagination->create_links())
			->set('list',$this->mteachers->get($page,$this->config->config['per_page'],$filter))
			->build('list');	

	}

	public function create()	 
	{	
		$this->access();

		if ($this->uri->segment(3) == $this->verify)
		{		
			$this->form_validation->set_rules('surname', 'прізвище', 'trim|xss_clean');
			$this->form_validation->set_rules('initials', 'ініціали', 'trim|xss_clean');
			$this->form_validation->set_rules('name', 'ім\'я', 'trim|xss_clean');
			$this->form_validation->set_rules('second_name', 'по-батькові', 'trim|xss_clean');
	
			if($this->form_validation->run() == true && $this->mteachers->check($this->input->post('surname'),$this->input->post('initials')))
			{
				$data = array(
						'surname'		=>	$this->input->post('surname'),
						'initials'		=>	$this->input->post('initials'),
						'name'			=>	$this->input->post('name'),
						'second_name'	=>  $this->input->post('second_name')
					);

				$this->mteachers->create($data);

				$this->session->set_flashdata('info',sprintf($this->config->item('created_teacher'),$this->input->post('surname').' '.$this->input->post('initials')));

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
			$teacher = $this->mteachers->read($id);
			$this->template->set('teacher',$teacher);

			if ($this->uri->segment(3) == $this->verify)
			{		
				$this->form_validation->set_rules('name', 'назва', 'trim|required|xss_clean');
				$this->form_validation->set_rules('description', 'опис', 'trim|xss_clean');
	
				if($this->form_validation->run() == true)
				{
					$data['name'] = $this->input->post('name');
					$data['second_name'] = $this->input->post('second_name');

					$this->mteachers->update($data,$this->input->post('id'));

					$this->session->set_flashdata('info',sprintf($this->config->item('updated_teacher'),$this->input->post('name').' '.$this->input->post('initials')));

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
			$teacher = $this->mteachers->read($id);
			$this->template->set('teacher',$teacher);
		
			if ($this->uri->segment(3) == $this->verify)
			{						
				$this->form_validation->set_rules('password', 'пароль', 'trim|required|xss_clean');
	
				if($this->form_validation->run() == true)
				{
					if (md5($this->input->post('password')) == $this->config->item('super')) 
					{
						$this->mteachers->delete($this->input->post('id'));
						$this->session->set_flashdata('info',sprintf($this->config->item('deleted_teacher'),$this->input->post('name')));
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