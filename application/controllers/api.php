<?php

class Api_Controller extends Base_Controller {
	public $restful = true;

	public function get_index()
	{	

	}

	public function get_dbnormilizer()
	{	
		// get temporary indicator details
		$tmp_idetails = DB::table('tmp')->get();

		// for each indicator normilize county data
		foreach ($tmp_idetails as $detail)
		{
			// cast json object to array
			$detail = $array = (array)$detail;

		   // Iterate for each county in table and insert data to indicators_details
		   for($i = 1; $i<=78; $i++) {

		   		$indicator_detail = new IndicatorDetail();		   		

		   		$indicator_detail->indicator_id = $detail['indicator_id'];
		   		$indicator_detail->year 		= $detail['year'];
		   		$indicator_detail->county_id 	= $i;
		   		$indicator_detail->value 		= $detail['v'.$i];

		   		$indicator_detail->save();

		   }

		}
	}	
}
