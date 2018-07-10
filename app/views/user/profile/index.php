<?php


  $admin  = new admins();
  if( $admin->isLoggedIn() ){
    $location = SITE_URL;
    header('Location: ' . $location .'/admin');
    exit();
  }

	$this->user = new Users();


	echo '<h3>Your Applications:</h3>';

    	$applications = $this->user->applications();
    	if(  $applications ){
	    	$res = $applications->results();
	    	$row = $res[0];
	    	?>

	    	 <table id="review-table">
  				<tbody>
  					<tr>
  						<th>Reference ID</th>
  						<th>Unit</th>
  						<th>Payment</th>
  						<th>Admit Card</th>
  					</tr>
  					
  					<?php 
  						foreach ($res as $key) {
	    					echo '<tr><td>'. $key->id .'</td>';
	    					echo '<td>'. $key->unit .'</td>';
	    					if($key->status==='0'){
	    						echo '<td><a href="#" style="color:red;">Print Payment Form</a></td>';
	    						echo '<td>Confirm Payment</td></tr>';
	    					}
	    					else{
	    						echo '<td style="color:green;">Payment OK</td>';
	    						echo '<td><a href="#">Download</a></td></tr>';
	    					}
	    				}
  					?>
  				</tbody>
  			</table>

	 	<?php
        }
        else{
        	echo "You have Applications";
        }
