<?php

class Api_Controller extends Base_Controller {
	public $restful = true;

	public function get_index()
	{	

		// -----------------------------------------------------------------------
		// Validate if a string have any of the category keywords
		// -----------------------------------------------------------------------
		$keywords 	= array("comida", 
							"mofongo", 
							"chuleta", 
							"arroz", 
							"sushi", 
							"stew", 
							"asopao", 
							"malanga", 
							"abichuelas", 
							"hambre", 
							"hambriento",
							"comeria", 
							"comer");

		$message		= "Comeria sushi hoy...";

		$data["keywords"] 		= $keywords;
		$data["message"] 		= $message;
		$data["hasKeywords"] 	= Util::stringHasKeywords($message, $keywords);		

		// get facebook object
		$facebook 	= IoC::resolve('facebook-sdk');
		$userid 	= $facebook->getUser();

		//var_dump($userid);
		if( $userid )  {

			$data["userid"]		= $userid;
			$data["topfriends"]	= Magicbag::getFriends($facebook);

			//var_dump( $data["topfriends"] ); die;
			return  json_encode($data["topfriends"] );
		}		

	}
}
