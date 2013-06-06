<?php

class Api_Controller extends Controller {
	public $restful = true;


	public function get_categories() {
		$cats = DB::query('select id, name as category from categories order by name desc');

		return Response::json($cats);
	}

	public function get_counties() {
		$cats = DB::query('select id, name as county from counties order by name desc');

		return Response::json($cats);
	}

	// URL: http://localhost/pryouthapi/public/api/indicatorsList
	public function get_indicatorsList() {

		$sql = "SELECT 
					   i.id, 
					   i.name as indicator,
					   cat.id as category_id, 
					   cat.name as category,

					   format,
					   base
				FROM 
					 indicators i,
					 categories cat
				where i.categoryid 		= cat.id" ;

		$cats = DB::query($sql);

		return Response::json($cats);
	}

	// URL: http://localhost/pryouthapi/public/api/indicatorsByCounty?id=1
	public function get_indicatorsByCountyId() {
		$county_id 		= Input::get("id", 0);

		$sql = "SELECT cat.id as category_id, 
					   cat.name as category, 
					   c.id as county_id, 
					   c.name as county, 
					   i.id as indicator_id, 
					   i.name as indicator, 
					   ind.year,
					   ind.value,
					   format,
					   base
				FROM indicators_detail ind ,
					 indicators i,
					 counties c,
					 categories cat
				where ind.indicator_id 	= i.id and 
					  ind.county_id 	= c.id and 
					  i.categoryid 		= cat.id and 
					  c.id 				= $county_id" ;


		$cats = DB::query($sql);

		return Response::json($cats);
	}

	// URL: http://localhost/pryouthapi/public/api/indicatorsByCategoryName?category=Salud
	public function get_indicatorsByCategoryName() {
		$category 		= Input::get("category", "");

		$sql = "SELECT cat.id as category_id, 
					   cat.name as category, 
					   c.id as county_id, 
					   c.name as county, 
					   i.id as indicator_id, 
					   i.name as indicator, 
					   ind.year,
					   ind.value,
					   format,
					   base
				FROM indicators_detail ind ,
					 indicators i,
					 counties c,
					 categories cat
				where ind.indicator_id 	= i.id and 
					  ind.county_id 	= c.id and 
					  i.categoryid 		= cat.id and 
					  cat.name 			= '$category'";

		$cats = DB::query($sql);

		return Response::json($cats);
	}	

	// URL: http://localhost/pryouthapi/public/api/indicatorsByCategoryAndCounty?category=1&county=1
	public function get_indicatorsByCategoryAndCounty() {
		$category_id 	= Input::get("category", 0);
		$county_id 		= Input::get("county", 0);

		$sql = "SELECT cat.id as category_id, 
					   cat.name as category, 
					   c.id as county_id, 
					   c.name as county, 
					   i.id as indicator_id, 
					   i.name as indicator, 
					   ind.year,
					   ind.value,
					   format,
					   base
				FROM indicators_detail ind ,
					 indicators i,
					 counties c,
					 categories cat
				where ind.indicator_id 	= i.id and 
					  ind.county_id 	= c.id and 
					  i.categoryid 		= cat.id and 
					  cat.id 			= $category_id and 
					  c.id 				= $county_id";

		$cats = DB::query($sql);

		return Response::json($cats);
	}	

	// URL: http://localhost/pryouthapi/public/api/indicatorsByCategoryId?id=1
	public function get_indicatorsByCategoryId() {
		$category_id 		= Input::get("id", 0);

		$sql = "SELECT cat.id as category_id, 
					   cat.name as category, 
					   c.id as county_id, 
					   c.name as county, 
					   i.id as indicator_id, 
					   i.name as indicator, 
					   ind.year,
					   ind.value,
					   format,
					   base
				FROM indicators_detail ind ,
					 indicators i,
					 counties c,
					 categories cat
				where ind.indicator_id 	= i.id and 
					  ind.county_id 	= c.id and 
					  i.categoryid 		= cat.id and 
					  cat.id 			= $category_id";


		$cats = DB::query($sql);

		return Response::json($cats);
	}	

	// URL: http://localhost/pryouthapi/public/api/indicatorsByCountyName?county=Adjuntas
	public function get_indicatorsByCountyName() {
		$county 		= Input::get("county", "");

		$sql = "SELECT cat.id as category_id, 
					   cat.name as category, 
					   c.id as county_id, 
					   c.name as county, 
					   i.id as indicator_id, 
					   i.name as indicator, 
					   ind.year,
					   ind.value,
					   format,
					   base
				FROM indicators_detail ind ,
					 indicators i,
					 counties c,
					 categories cat
				where ind.indicator_id 	= i.id and 
					  ind.county_id 	= c.id and 
					  i.categoryid 		= cat.id and 
					  c.name 			= '$county'";

		$cats = DB::query($sql);

		return Response::json($cats);
	}		

	// URL: http://localhost/pryouthapi/public/api/indicators?id=1
	public function get_indicators() {
		$indicator_id 	= Input::get("id", 0);

		$sql = "SELECT cat.id as category_id, 
					   cat.name as category, 
					   c.id as county_id, 
					   c.name as county, 
					   i.id as indicator_id, 
					   i.name as indicator, 
					   ind.year,
					   ind.value,
					   format,
					   base
				FROM indicators_detail ind ,
					 indicators i,
					 counties c,
					 categories cat
				where ind.indicator_id 	= i.id and 
					  ind.county_id 	= c.id and 
					  i.categoryid 		= cat.id and 
					  ind.indicator_id = $indicator_id";


		$cats = DB::query($sql);

		return Response::json($cats);
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
