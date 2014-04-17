<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 	function __construct()
 	{
		parent::__construct();
		$this->output->enable_profiler(false);

		$this->load->library('form_validation');
	}


  	public function index()
	{
		$this->template->build('login');			
  	}


	public function verify()
	{
		
		$this->form_validation->set_rules('username', 'логін', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'пароль', 'trim|required|xss_clean|callback_check_database');
	
		if($this->form_validation->run() == FALSE)
		{
			$this->template ->build('login');
		}
		else
		{
			$this->session->set_flashdata('info','Ти успішно залогінилося');
	  		redirect('admin/home','refresh');
		}
  	}


  	public function logout()
  	{
  		$this->session->sess_destroy();
  		redirect('');
  	}


   	public function check_database($password)
	{		
		$this->load->model('mlogin');
		
		$username = $this->input->post('username');
		$row = $this->mlogin->login($username, $password);

		if($row)
		{
			$sess_array = array( 
								 'user_id' => $row->id,
								 'level' => $row->level,
								 'username' => $row->username,
							   );

			$this->session->set_userdata($sess_array);
			return true;
		}
		else
		{
			$this->form_validation->set_message('check_database', 'неправильний логін або пароль');
			return false;
		}
	}
}

?>