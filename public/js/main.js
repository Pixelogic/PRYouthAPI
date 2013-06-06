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

require(["jquery"], function( $, app ) {
	$(document).ready(function() {    
		categories = $.ajax({
      url: 'http://www.pixelogicpr.com/PRYouthAPI/public/api/categories',
      type: 'GET',
      dataType: 'jsonp',
      data: {}
      });

    categories.done(function(result) {
      console.log('lalalala');
    });
            
	});
} ); 