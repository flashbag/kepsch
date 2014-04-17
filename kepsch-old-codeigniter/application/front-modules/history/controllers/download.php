<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class History extends MX_Controller {

	private $verify = 'verify';

	function __construct()
	{
 		parent::__construct();
 		$this->load->helper('download');
 		$this->load->model('mdownload');
 		$this->load->library('form_validation');

 		$this->output->enable_profiler(false);
 	}


 	private function access()
 	{
		if (!$this->lib->logged() || !$this->lib->admin()) 			
		{
			$this->session->set_flashdata('info',$this->config->item('you_cant'));
			redirect($this->router->class,'refresh');
		}	
 	}

 	public function index()
	{
		$this->template 		
			->set('list',$this->mdownload->get())
			->build($this->router->class);	

	}

	public function create()	 
	{	
		$this->access();

		if ($this->uri->segment(3) == $this->verify)
		{		
			$this->form_validation->set_rules('title', 'заголовок', 'trim|required|xss_clean');
			$this->form_validation->set_rules('order', 'порядок', 'trim|required|xss_clean');
			$this->form_validation->set_rules('description', 'опис', 'trim|xss_clean');

			if($this->form_validation->run() == true)
			{
				$data = array(
						'file'			=> '',
						'image'			=> '',
						'title'			=>	$this->input->post('title'),
						'filename'		=>	$this->input->post('filename'),
						'orderr'		=>	$this->input->post('order'),
						'description'	=>  $this->input->post('description'),
						'loaded'		=>	0
					);

				if ($_FILES['image']['name'] != '') 
				{
					$data['image'] = $this->upload_img('image');
				}	

				if ($_FILES['file']['name'] != '') 
				{
					$data['file'] = $this->upload_zip('image');
				}	

				$this->mdownload->create($data);

				$this->session->set_flashdata('info',sprintf($this->config->item('created_info'),$this->input->post('name')));

	  			redirect($this->router->class, 'refresh');
			}
		} 

		$this->template->build('create');			
	}
	 

	 
	public function edit($id = null)	 
	{
		$this->access();

		if ($id != null)
		{
			$spec = $this->mdownload->read($id);
			$this->template->set('item',$spec);

			if ($this->uri->segment(3) == $this->verify)
			{		
				$this->form_validation->set_rules('title', 'заголовок', 'trim|required|xss_clean');
				$this->form_validation->set_rules('order', 'порядок', 'trim|required|xss_clean');
				$this->form_validation->set_rules('description', 'опис', 'trim|xss_clean');
	
				if($this->form_validation->run() == true)
				{
					$data = array(
						'title'			=>	$this->input->post('title'),
						'orderr'		=>	$this->input->post('order'),
						'description'	=>  $this->input->post('description'),
						'filename'		=>	$this->input->post('filename'),
					);

					$data['image'] = $this->mdownload->image($this->input->post('id'));

					if ($_FILES['image']['name'] != '') 
					{
						$filename = $this->upload_img('image');
						if ($data['image'])  { unlink('./uploads/avatars/'.$data['image']); }
						if ($filename != null) { $data['image'] = $filename; }
					}

					$data['file'] = $this->mdownload->file($this->input->post('id'));

					if ($_FILES['file']['name'] != '') 
					{
						$filename = $this->upload_zip('file');
						if ($data['file'])  { unlink('./uploads/'.$data['file']); }
						if ($filename != null) { $data['file'] = $filename; }
					}

					$this->mdownload->update($data,$this->input->post('id'));

					$this->session->set_flashdata('info',sprintf($this->config->item('edited_info'),$this->input->post('name')));

		  			redirect($this->router->class, 'refresh');
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
			$spec = $this->mdownload->read($id);
			$this->template->set('item',$spec);
		
			if ($this->uri->segment(3) == $this->verify)
			{						
				$this->form_validation->set_rules('password', 'пароль', 'trim|required|xss_clean');
	
				if($this->form_validation->run() == true)
				{
					if (md5($this->input->post('password')) == $this->config->item('super')) 
					{
						$this->mdownload->delete($this->input->post('id'));
						$this->session->set_flashdata('info',sprintf($this->config->item('deleted_info'),$this->input->post('name')));
					} else {
						$this->session->set_flashdata('info',$this->config->item('bad_super'));
					}

					redirect($this->router->class, 'refresh');	
						
				}
			} 

			$this->template->build('delete');						

		} else { redirect('admin/'.$this->router->class,'refresh'); }

	}



  	public function upload_img($field) 
 	{

        $config['upload_path'] = './uploads/download';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|JPEG';
        $config['max_size'] = '1024';
        $config['encrypt_name'] = 'TRUE';
        $config['max_width'] = '3000';
		$config['max_height'] = '3000';

        $this->load->library('upload');

        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload($field))
        {
            echo $this->upload->display_errors();
        }

        $picture = array($this->upload->data($field));

        return $picture[0]['file_name'];
    }

  	public function upload_zip($field) 
 	{

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'zip';
        $config['max_size'] = '4096';
        $config['encrypt_name'] = 'TRUE';

        $this->load->library('upload');

        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload($field))
        {
            echo $this->upload->display_errors();
        }

        $archive = array($this->upload->data($field));
        

        return $archive[0]['file_name'];
    }

    public function dothisfuckingdownload($id)
    {
    	if ($id != null) 
    	{
    		echo 'download';
    		$file = $this->mdownload->file($id);
    		
    		if ($file) 
    		{
    			$data = file_get_contents("./uploads/".$file); // Read the file's contents
				$name = $this->mdownload->filename($id);

				if (!$this->lib->logged() || !$this->lib->admin()) 			
				{
					$this->mdownload->increment($id);
				}

				force_download($name, $data);
			}

    	} else { 

    		redirect($this->router->class, 'refresh');		
    	}
		
		
	}
}

?>