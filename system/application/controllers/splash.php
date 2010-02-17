<?php

class Splash extends Controller {

	function Welcome()
	{
		parent::Controller();	
	}
	
	public function index() {

		$vars['categories'] = Doctrine::getTable('Category')->findAll();

		$this->load->view('splash', $vars);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */