SELECT cat.id as category_id, 
	   cat.name as category, 
	   c.id as county_id, 
	   c.name as county, 
	   i.id as indicator_id, 
	   i.name as indicator, 
	   ind.year,
	   ind.value
FROM indicators_detail ind ,
	 indicators i,
	 counties c,
	 categories cat
where ind.indicator_id 	= i.id and 
	  ind.county_id 	= c.id and 
	  i.categoryid 		= cat.id

# hello