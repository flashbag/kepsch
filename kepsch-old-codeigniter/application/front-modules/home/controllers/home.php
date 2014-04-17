<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {

    public function __construct() 
    {
        parent::__construct();
    }

	public function index()
	{   
		$last = (isset($_COOKIE['last'])) ? $_COOKIE['last'] : false ; 
		
		if ($last) { redirect($last,'refresh'); }

		$this->template
			->set('last',$last)
			->build('home');		
           
	}
        
}

?>