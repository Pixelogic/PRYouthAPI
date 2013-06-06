	// $('.p .btn-retos, .c .btn-retos').click(function(event){
	// 	event.preventDefault();
	// 	// do nothing...
	// });	

	$('#btnInviteFriends').click(function() {
		friendSelectorSettings = {	method: 'apprequests',
									message: 'Tienes un máximo 25 personas por invitacion.', 
									exclude_ids: getExcludedFriends(), 
									title: 'Tráete a tus panas',
									max_recipients: 25,
									display: 'popup'
								  };

		FB.ui(  friendSelectorSettings  , function(response) {
			if(response) {

					if(response.to) {
						imgURL = app_base_full + "/img/social/RetosPromoPost4.jpg";
						to = response.to;
						$('.in-proc').fadeIn();
						FB.api('/me/photos', 'post', {
						    message:'¿Quién se apunta?' + " www.retoscuervo.com?ref=" + $('#uid').val(), 
						    url:imgURL
						}, function(response){
						    if (!response || response.error) {
						       
						    }else{							    	
						      //tags friends     
						      	var postId = response.id;							      	
								$.each(to, function(k, v) {
								
									
							      FB.api(postId+'/tags?to='+v, 'post', function(response){
							         if (!response || response.error) {
							            //console.log(response);
							         }
							      });

								});	

								// save user referrals
								referrals = JSON.stringify(to);

								$.ajax({
									'type': "get",										
									'data': { referrals: referrals},
									'url': app_base + '/api/saveReferrals' + '?signed_request=' + signed_request,
									'success': function (data) {        
										$('.in-proc').fadeOut();
										challenge = parent.document.getElementById('challange-'+$('#challenge_id').val());						
										$('#action-wrapper').fadeOut(300, function() {
											//$(challenge).attr('class','status c');
											$(challenge).find('.btn-retos').unbind('click');							
											$('.confirmation-message').fadeIn(300);
										});																				
									}
								});	

						    }
						});
				}		
			}						
		});	// end of FB.ui({method: 'apprequests')
	});