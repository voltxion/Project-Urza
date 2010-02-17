<?php

class Main extends Controller {

	function Main()
	{
		parent::Controller();	
	}
	
	public function index() {

		$vars['categories'] = Doctrine::getTable('Category')->findAll();
                $this->template->set('categories', $vars['categories']);
		$this->template->view('main');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */