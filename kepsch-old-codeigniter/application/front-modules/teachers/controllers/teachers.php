<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class teachers extends MX_Controller {

    public function __construct() 
    {
        parent::__construct();
		$this->load->model('mteachers');
    }

	public function index()
	{   		

		$this->template 				

			->set('teachers',$this->mteachers->all())
			->build('teachers');		
           
	}
        
}

?>