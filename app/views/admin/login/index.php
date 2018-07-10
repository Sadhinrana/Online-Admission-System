<?php 

$user  = new Users();
if($user->isLoggedIn()){
	$location = SITE_URL;
	header('Location: ' . $location);
	exit();
}

$admin  = new admins();
if( $admin->isLoggedIn() ){
	$location = SITE_URL;
	header('Location: ' . $location .'/admin');
	exit();
}


	if(Session::exists('error-login')){
		echo miscellaneous::errorPopup(Session::flush('error-login'),"red");
	}




?>

	
	<div  >
		<h3>Admin Login</h3>
		<form action="<?php echo SITE_URL; ?>/admin/loginProcess" id="logform" method="post" >
			<input type="text" name="name" placeholder="Username" class="validate[required] in-fl" />
			<input type="password" name="password" placeholder="Password" class="validate[required] in-fl" />
			<br/>
			<input type="hidden" name="token" value="<?php echo Token::generate(); ?>" >
			<input type="submit" name="logb" class="btn" value="Login"   style="margin-top:20px;" />
		</form>
	</div>
