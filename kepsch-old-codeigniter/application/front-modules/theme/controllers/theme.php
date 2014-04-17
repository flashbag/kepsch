<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Theme extends MX_Controller {

    public function __construct() 
    {
        parent::__construct();
    }

	public function index()
	{   
        $active = ($this->session->userdata('theme')) ? $this->session->userdata('theme') : 'black' ;

        $themes = array(
            array('black','green','pink'),
            array('red','marine','yellow'),
        );

		$this->template
            ->set('active',$active)
            ->set('themes',$themes)
            ->build($this->router->class);	
	}
        
    public function set($theme = null)
    {
    	if ($theme != null ) 
    	{ 
            setcookie('theme', $theme, time()+60*60*24*30);
    	}

    	redirect($this->router->class,'refresh');
    }
}

?>