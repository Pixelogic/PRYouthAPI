<?php

class Home_Controller extends Base_Controller {
	public $restful = true;
	public $layout = "layouts.default";

	public function get_index()
	{
		//$this->layout->scripts = $this->load_scripts(array('home'));

		$this->layout->content = View::make("home.index");	
	}
	
}