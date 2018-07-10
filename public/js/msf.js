jQuery(document).ready(function(){


		$("#application-form" ).submit(function( e ) {
			  	e.preventDefault();

			  	$val = jQuery("#application-form").validationEngine('validate');
			  	if( $val == false ){
			  		return 0;
			  	}

			  	

			  	$("#var-btn").css("display", "block");
			  	$("#var-btn").removeClass('v-btn');
				$("#var-btn").addClass('v-btn-loading');
				$("#var-btn").attr('value','Varifying..');


				$.ajax({
					url: 'http://localhost/justas/captcha',
	            	type: 'post',
	           		dataType : "json",
	           		timeout: 1000,
	           		data: $('#application-form').serialize(),
					success: function(response) { 

						$("#var-btn").removeClass('v-btn-loading');
						$("#var-btn").addClass('v-btn');
						$("#var-btn").attr('value',"I'm not a robot");
						
					   	if(response){
					    		$("#recaptcha_widget").html('<div id="var-div"><img src="http://localhost/justas/public/img/ok.png" alt="You are not a robot!" width="40" height="40" ><h4>Varified! You\'re not a robot!</h4></div>');
					    	    $("#application-form").off("submit");
    							$("#application-form").submit();

					    }
					    else{
					    	$("#var-btn").css("background", "red");
					    	$("#var-btn").attr('value',"Wrong");
					    	Recaptcha.reload();
					    	//$("#var-btn").hide(8000);
					    	$("#var-btn").delay(3000).fadeOut();
					    }
					 },
					 error: function(objAJAXRequest, strError) {
						$("#var-btn").css("display", "none");
					  	alert(strError);
					}
				});

			});



		$(document).on('click','.pop-close',function(){
		    $(this).parent().remove();
		});


			$(document).on('click','.eligible-btn',function(){


				if(  !jQuery("#application-form").validationEngine('validate') ){
					$("#application-form").bind("jqv.field.result", function(event, field, errorFound, prompText){ console.log(errorFound) });
					return false;
				}
				
			

				$.ajax({
					url: 'http://localhost/justas/admissionform/checkEligibility',
	            	type: 'post',
	           		dataType : "json",
	           		async:false,
	           		timeout: 1000,
	           		data: $('#application-form').serialize(),
					success: function(ok) { 
						if(ok==false){
							window.location.replace('http://localhost/justas/admissionform');
						}
						else{	
							$(".eligible-btn").parent().parent().next().fadeIn('slow');
							$(".eligible-btn").parent().parent().css({'display':'none'});
							$('.active').next().addClass('active');
						}
		
					 },
					 error: function(objAJAXRequest, strError) {
					 		alert(strError);
					}
				});


			});

			$(document).on('click','.con-b',function(){

				if(  !jQuery("#application-form").validationEngine('validate') ){
					
					return false;
				}



				$.ajax({
					url: 'http://localhost/justas/admissionform/review',
	            	type: 'post',
	           		dataType : "json",
	           		async:false,
	           		timeout: 1000,
	           		data: $('#application-form').serialize(),
					success: function(response) { 

						$('.con-b').parent().parent().next().fadeIn('slow');
						$('.con-b').parent().parent().css({'display':'none'});
						$('.active').next().addClass('active');


					 },
					 error: function(objAJAXRequest, strError) {
					 	alert(strError);
					}
				});

										


			});


		
			$(document).on('click', '.prev-btn', function(){  
				$(this).parent().parent().prev().fadeIn('slow');
				$(this).parent().parent().css({'display':'none'});
				$('.active:last').removeClass('active');
			});

			
			jQuery("#application-form").validationEngine();
			$("#application-form").bind("jqv.field.result", function(event, field, errorFound, prompText){ console.log(errorFound) })
		});


			$(function(){
				$( "#Datepicker" ).datepicker({
			
               		changeMonth:false,
               		changeYear:true,
               		dateFormat: 'yy-mm-dd'

				});
			});



		
		var RecaptchaOptions = {
			lang : 'en',
			theme : 'custom',
    		custom_theme_widget: 'recaptcha_widget'
		};