<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends MX_Controller {

    public function __construct() 
    {
        parent::__construct();
		$this->load->model('mgroup');  

		$this->output->enable_profiler(false);
    }

	public function index($id = 0, $week = null)
	{   
		if ($id != null) {

			$w = $this->lib->week($week);

			setcookie('last', $this->router->class.'/'.$id , time()+60*60*24*30,'/');

			$this->template 

				->set('week',$w)
				->set('name',$this->mgroup->name($id))
				->set('sch',$this->mgroup->schedule($id,$w))

				->build('group');		
		}
           
	}
        
}

?>