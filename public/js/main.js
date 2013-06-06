// require.js configuration
require.config( {      
      paths: {
            // Core Libraries
            "jquery": "vendor/jquery",
            "underscore": "vendor/lodash",
            "lightbox": "vendor/fancybox",
            "jqueryUI": "vendor/jquery-ui.min",
            "app": "libs/app",
            "bootstrap": "vendor/bootstrap"
      },
      shim: {
            "lightbox": {"deps": [ "jquery" ],"exports": "lightbox" }
            } 
} );

require([ "jquery", "app"], function( $, app ) {
	$(document).ready(function() {    
		
	});
} ); 