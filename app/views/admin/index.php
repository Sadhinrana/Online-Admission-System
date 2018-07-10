<?php 

$admin  = new admins();
if( !$admin->isLoggedIn() ){
	$location = SITE_URL;
	header('Location: ' . $location .'/admin/login');
	exit();
}


?>


  <script type="text/javascript">

    jQuery(document).ready(function(){
    	$(".pu").click(function(){
		    $("#payment-confirm-div").toggle(100); 
		});

		$(".nu").click(function(){
		    $("#news-update-div").toggle(100); 
		});		



		$(".pbutton").click(function(){

		    var refid = $(".pid").val();

		    if( refid ==='' ){
		    	return 0;
		    }

				$.ajax({
					url: 'http://localhost/justas/admin/paymentupdate',
	            	type: 'post',
	           		dataType : "json",
	           		timeout: 1000,
	           		data: {'id':refid},
					success: function(response) { 

                    
                        $('.update_status').html('<h4>' + response + '</h4>');
                        
                        $('.pid').val('');
                        $('.spid').val('');

					 },
					 error: function(objAJAXRequest, strError) {
					  	alert(strError);
					}
				});

		});

    })


  </script>

<div class="update_status"></div>

<input type="button" name="" value="Payment Update" class="pu" />
<div id="payment-confirm-div"  style="display:none;" >

	<input type="text" name="" value="" placeholder="Refrence id" class="spid" />
	<input type="button" name="" value="search"  />		
	<br/>
	<input type="text" name="" value="" placeholder="Refrence id" class="pid" />
	<input type="button" name="" value="update" class="pbutton" />
</div>

<br/>

<input type="button" name="" value="News Update" class="nu" />
<div id="news-update-div"  style="display:none;" >
	<input type="text" name="" value="" class="news_input" />
    <input type="button" name="" value="update" class="news_input_button" />
</div>