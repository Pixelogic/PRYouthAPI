<?php

class Base_Controller extends Controller {
	
	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */

	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

    public function __construct(){

        parent::__construct();

    }
    public function load_scripts($script_names){
		foreach ($script_names as &$value) {
			if ((strpos($value, '/') !== FALSE)){
				$value = 'js/'.$value.'.js';
			} else {
		    	$value = 'js/'.$value.$this->device.'.js';
			}
		}

    	return $script_names;
    }
}