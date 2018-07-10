<div style="padding:20px; margin-top:20px;margin-bottom:50px; height:200px;">

<?php
	
	if(Session::exists('sure')){
		echo '<h1 style="color:red;text-shadow: 0 -1px 1px rgba(0,0,0,0.25);font-family:  Tahoma;">'.Session::flush('sure').'</h1>';
	}
	else{
		echo "<h1>THIS IS ERROR PAGE and it is under construction!</h1>";
	}
	
?>


</div>