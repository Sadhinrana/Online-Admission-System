<?php 

$user  = new Users();
if(!$user->isLoggedIn()){
  Session::flush('signin-first','You need to log in to apply');
  header('Location: ' . SITE_URL . '/login');
  exit();
}

  if(Session::exists('invalid-captcha')){
    echo miscellaneous::errorPopup(Session::flush('invalid-captcha'),"red");
  }

  $_SESSION['prev-page'] = '3';


?>


<script type="text/javascript">


	   /* jQuery(document).ready(function(){

	      $("#step3Form").validationEngine();
	      $("#step3Form").bind("jqv.field.result", function(event, field, errorFound, prompText){ console.log(errorFound) });

	    });*/

		
		var RecaptchaOptions = {
			lang : 'en',
			theme : 'custom',
    		custom_theme_widget: 'recaptcha_widget'
		};

</script>


<form action="<?php echo SITE_URL; ?>/admissionform/run" method="POST" id="step3Form" >

  			<table id="review-table">
  				<h4>Application For:</h4>

  				<tbody>
  					<tr>
  						<th>Unit</th>
  						<td>  <input type="text" value="<?php echo $admission_unit; ?>" name="final_unit" /> </td>
  					</tr>
  				</tbody>
  			</table>

  			<table id="review-table">
  				<h4>Personal Information:</h4>

  				<tbody>
	  				<tr><th>Applicant's Name</th><td> <input type="text" value="<?php echo $admission_name; ?>" name="final_name" /> </td></tr>
	  				<tr><th>Father's Name</th><td> <input type="text" value="<?php echo $admission_father_name; ?>" name="final_fathername" /> </td></tr>
	  				<tr><th>Mother's Name</th><td> <input type="text" value="<?php echo $admission_mother_name; ?>" name="final_mothername" /> </td></tr>
	  				<tr><th>Sex</th><td> <input type="text" value="<?php echo $admission_gender; ?>" name="final_gender" /> </td></tr>
	  				<tr><th>Date of Birth(yyyy-mm-dd)</th><td> <input type="text" value="<?php echo $admission_dob; ?>" name="final_dob" /> </td></tr>
	  				<tr><th>Present Adress</th><td> <input type="text" value="<?php echo $admission_preadress; ?>" name="final_pre" /> </td></tr>
	  				<tr><th>Permanent Adress</th><td> <input type="text" value="<?php echo $admission_peradress; ?>" name="final_per" /> </td></tr>
	  				<tr><th>Contact Number</th><td> <input type="text" value="<?php echo $admission_contact; ?>" name="final_contact" /> </td></tr>
  				</tbody>
  			</table>

  			<table id="ac-table">
  				<h4>Academic Information:</h4>

  				<tbody>
  					<tr>
  						<th>Exam</th>
  						<th>Roll No</th>
  						<th>Resitraion No</th>
  						<th>Passing Year</th>
  						<th>Session</th>
  						<th>GPA</th>
  						<th>Board</th>
  					</tr>

	  				<tr>
		  				<td>S.S.C</td>
		  				<td> <input type="text" value="<?php echo $ssc_roll; ?>" name="final_sscroll" /> </td>
		  				<td> <input type="text" value="<?php echo $ssc_res; ?>" name="final_sscres" /> </td>
		  				<td> <input type="text" value="<?php echo $ssc_py; ?>" name="final_sscpa" /> </td>
		  				<td> <input type="text" value="<?php echo $ssc_session; ?>" name="final_sscsession" /> </td>
		  				<td> <input type="text" value="<?php echo $ssc_gpa; ?>" name="final_sscgpa" /> </td>
		  				<td> <input type="text" value="<?php echo $ssc_board; ?>" name="final_sscboard" /> </td>
	  				</tr>

	  				<tr>
		  				<td>H.S.C</td>
		  				<td> <input type="text" value="<?php echo $hsc_roll; ?>" name="final_hscroll" /> </td>
		  				<td> <input type="text" value="<?php echo $hsc_res; ?>" name="final_hscres" /></td>
		  				<td> <input type="text" value="<?php echo $hsc_py; ?>" name="final_hscpa" /> </td>
		  				<td> <input type="text" value="<?php echo $hsc_session; ?>" name="final_hscsession" /> </td>
		  				<td> <input type="text" value="<?php echo $hsc_gpa; ?>" name="final_hscgpa" /> </td>
		  				<td> <input type="text" value="<?php echo $hsc_board; ?>" name="final_hscboard" /> </td>
	  				</tr>
          		</tbody>
          	</table>


          		<div style="width:100%;overflow:hidden;margin-top:20px;">
				<!-- Google Recaptcha -->
					<div id="recaptcha_widget" style="display:none">
						<div id="recaptcha_image"></div>
						<input type="text" id="recaptcha_response_field" name="recaptcha_response_field" placeholder="type the words above" class="validate[required]" data-prompt-position="bottomRight:0,12" /><br/>
						<input type="button" value="" class="v-btn" id="var-btn" style="cursor:default;display:none;" />
						<a  title="Get a new challenge" href="javascript:Recaptcha.reload()"><img style="background:#0988CB;border-radius:3px;" src="<?php echo SITE_URL; ?>/public/img/reload.png" alt="Get a new challenge"></a>
						<a  href="javascript:Recaptcha.showhelp()"><img style="background:#0988CB;border-radius:3px;" src="<?php echo SITE_URL; ?>/public/img/help.png" alt="Get a new challenge"></a>
						<img src="http://www.google.com/recaptcha/api/img/clean/logo.png" id="recaptcha_logo" alt="" style="height:36px; width:71px; margin-left:50px;" />
					</div>

					 <script type="text/javascript"
					    src="http://www.google.com/recaptcha/api/challenge?k=6LeMXwoTAAAAAA0gW3cRzwrtlLT1tQmaCAkVynG5">
					 </script>
					 <noscript>
					   <iframe src="http://www.google.com/recaptcha/api/noscript?k=6LeMXwoTAAAAAA0gW3cRzwrtlLT1tQmaCAkVynG5"height="300" width="500" frameborder="0"></iframe><br>
					   <textarea name="recaptcha_challenge_field" rows="3" cols="40">
					   </textarea>
					   <input type="hidden" name="recaptcha_response_field"value="manual_challenge">
					 </noscript>
				<!--   ***********       -->
				</div>

		<input type="hidden" name="token" value="<?php echo Token::generate(); ?>" >

		<div class="btn-dv">
		     <input onclick="window.location='<?php echo SITE_URL; ?>/admissionform/step2' " type="button" class="btn prev-btn" value="Prev" />
		     <input type="submit" class="btn con-b" value="Submit" />
		</div>


</form>