<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Groups extends MX_Controller {

    public function __construct() 
    {
        parent::__construct();
		$this->load->model('mgroups');
    }

	public function index()
	{   		

		$this->template 				

			->set('groups',$this->mgroups->all())
			->build('groups');		
           
	}
        
}

?>