<!doctype html>
<html lang="en" class="{{Holmes::is_mobile() ? 'mobile' : 'desktop'}}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>PR Youth API</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	{{Asset::container('bootstrapper')->styles()}}
	{{ HTML::style('css/style.css') }}
	<?php // render custom styles for the view. ?>
	@if(isset($styles))
	@foreach($styles as $style)
	{{ HTML::style($style) }}
	@endforeach
	@endif
	<!-- modernizr -->
	{{HTML::script('js/vendor/modernizr-2.0.min.js')}}	
	<script>
	var app_base 		= '{{Config::get('application.app_base')}}';	
	var app_base_full 	= '{{Config::get('application.url')}}';	
	</script>
</head>
<body>	

	<div class="container">
	{{$content}}
	</div>

	<script src="{{Config::get('application.url')}}js/require.js" data-main="{{Config::get('application.url')}}js/main"></script>	

	<?php // render custom scripts for the view. ?>
	@if(isset($scripts))
	@foreach($scripts as $script)
	{{ HTML::script($script) }}
	@endforeach
	@endif	

</body>
</html>