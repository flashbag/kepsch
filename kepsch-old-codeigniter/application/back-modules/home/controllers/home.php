<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('mhome');
    }

	public function index()
	{   		

		$this->template 	
			->set('stats',$this->mhome->stat())			
			->build('home');		
           
	}
        
}

?>