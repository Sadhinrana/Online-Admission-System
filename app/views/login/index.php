<?php 

$admin  = new admins();
if( $admin->isLoggedIn() ){
	$location = SITE_URL;
	header('Location: ' . $location .'/admin');
	exit();
}

$user  = new Users();
if($user->isLoggedIn()){
	$location = SITE_URL;
	header('Location: ' . $location);
	exit();
}
else{

	if(Session::exists('resSuccess')){
		echo miscellaneous::errorPopup(Session::flush('resSuccess'),"green");
	}
	else if(Session::exists('error-login')){
		echo miscellaneous::errorPopup(Session::flush('error-login'),"red");
	}
	else if(Session::exists('signin-first')){
		echo miscellaneous::errorPopup(Session::flush('signin-first'),"red");
	}

?>

	

	<script type="text/javascript">
		$(document).on('click','.pop-close',function(){
		    $(this).parent().remove();
		});
	
		jQuery(document).ready(function(){
			jQuery("#logform").validationEngine();
			$("#logform").bind("jqv.field.result", function(event, field, errorFound, prompText){ console.log(errorFound) })
		});
	</script>


	<div id="fs" >
		<h3>Sign In</h3>
		<form action="<?php echo SITE_URL; ?>/login/run" id="logform" method="post" >
			<input type="text" name="log-id" placeholder="User ID" class="validate[required] in-fl" />
			<input type="password" name="log-password" placeholder="Password" class="validate[required] in-fl" />

				<input type="checkbox" name="remember"  /><label> Remember me</label>
				<span><a href="<?php echo SITE_URL; ?>/recoverpassword" >Forgot your password?</a></span>

			<br/>
			<input type="hidden" name="token" value="<?php echo Token::generate(); ?>" >
			<input type="submit" name="log-b" class="btn" value="Login"   style="margin-top:20px;" />
		</form>
	</div>


<?php
}
?>