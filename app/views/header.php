<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

    <title>Admission Test</title>

    <link rel="stylesheet" type="text/css"  href="<?php echo SITE_URL; ?>/public/css/style.css" />
    <link rel="stylesheet" type="text/css"  href="<?php echo SITE_URL; ?>/public/css/captcha.css" />
    

    <script src="<?php echo SITE_URL; ?>/public/js/jquery-1.8.2.min.js" ></script>
    
    <script type="text/javascript" src="<?php echo SITE_URL; ?>/public/js/jquery.validationEngine-en.js" charset="utf-8"></script>
    <script type="text/javascript" src="<?php echo SITE_URL; ?>/public/js/jquery.validationEngine.js" charset="utf-8"></script>
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/public/css/validationEngine.jquery.css" type="text/css"/>


	<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
	<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">

</head>
<body style="background-color: #F0F0F0">

	<div class="full_w Top"></div>

	<div class="full_w">

		<div class="h_bottom">
			<div class="center_d">
				<div class="l_div">
					<img width="120px"; height="120px";  src="<?php echo SITE_URL; ?>/public/img/logo.png" />
				</div>
					<div class="u_name" >
						<h1 >Jessore University of Science & Technology</h1>
						<h3>Undergraduate Admission Test 2015-16</h3>
					</div>


				<?php
					$admin  = new admins();
					if(!$admin->isLoggedIn()){
				?>
					<div class="log_in">
						<?php 
							$user  = new Users();
							if($user->isLoggedIn()){
						?>
							<a href="<?php echo SITE_URL; ?>/user/profile" class="medium button blue">Your Profile</a>
							<a href="<?php echo SITE_URL; ?>/login/logout" class="medium button blue">Log Out</a>
						<?php
							}
							else{
						?>
							<a href="<?php echo SITE_URL; ?>/login" class="medium button blue">Login</a>
							<a href="<?php echo SITE_URL; ?>/resister" class="medium button blue">Resister</a>
						<?php
							}
						?>
						
					</div>

				<?php
				}
				else{
				?>
					<a href="<?php echo SITE_URL; ?>/admin/logout" class="medium button blue">Log Out</a>
				<?php
				}
				?>




			</div>
		</div>

	</div>

	<div style="background:#343D45; height: 32px; " >
		<div class="center_d menu_container">
		   <ul>
		      <li><a href="<?php echo SITE_URL; ?>" class="f-c">Home</a></li>
		      <li><a href="<?php echo SITE_URL; ?>/admissionform">Apply Online</a></li>
		      <li><a href="<?php echo SITE_URL; ?>/procedure">Admission Procedure</a></li>
		      <li><a href="<?php echo SITE_URL; ?>/circular">Admission Circular</a></li>
		      <li><a href="<?php echo SITE_URL; ?>/user/profile">Admit Card</a></li>
		      <li><a href="<?php echo SITE_URL; ?>/payment">Payment</a></li>
		      <li><a href="<?php echo SITE_URL; ?>/result">Results</a></li>
		      <li><a href="<?php echo SITE_URL; ?>/notices">Notices</a></li>
		      <li><a href="<?php echo SITE_URL; ?>/contact">Contact Us</a></li>
		   </ul>
		</div>
	</div>



	<div class="center_d">
		<div id="content" style="min-height:472px;padding: 20px">

			<marquee behavior="scroll" direction="left" id="news" >News!...News!...News!...News! </marquee>
