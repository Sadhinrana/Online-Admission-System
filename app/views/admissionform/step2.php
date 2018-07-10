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


?>

  <script type="text/javascript">

   /* jQuery(document).ready(function(){

      $("#step2Form").validationEngine();
      $("#step2Form").bind("jqv.field.result", function(event, field, errorFound, prompText){ console.log(errorFound) });

    });*/

    var RecaptchaOptions = {
      lang : 'en',
      theme : 'custom',
        custom_theme_widget: 'recaptcha_widget'
    };


  </script>


<form action="<?php echo SITE_URL; ?>/admissionform/run" method="POST" id="step2Form" >

    <table class="step2_table">
        <tbody>
            <tr>
                <th>Applicant's Name : </th>
                <td><input type="text" value="<?php echo $admission_name; ?>"  class="validate[required]" name="name" /></td>
            </tr>            
            <tr>
                <th>Father's Name : </th>
                <td><input type="text" value="<?php echo $admission_father_name; ?>"  class="validate[required]" name="father_name" /></td>
            </tr>            <tr>
                <th>Mother's Name : </th>
                <td><input type="text" value="<?php echo $admission_mother_name; ?>"  class="validate[required]" name="mother_name" /></td>
            </tr>            <tr>
                <th>Gender : </th>
                <td><select name="gender" class="validate[required]">
            <option value="">Select One</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select></td>
            </tr>            <tr>
                <th>Date of Birth : </th>
                <td><input type="text" value="<?php echo $admission_name; ?>" name="dob" class="validate[required,custom[date]]" id="Datepicker" /></td>
            </tr>            <tr>
                <th>Nationality : </th>
                <td><select name="nationality" class="validate[required]" >
          <option value="Bangladeshi">Bangladeshi</option>
        </select></td>
            </tr>            <tr>
                <th>Present Adress : </th>
                <td><textarea rows="5" value="<?php echo $admission_preadress; ?>" name="pre_adress" class="validate[required] " >Xxa</textarea></td>
            </tr>            <tr>
                <th>Permanent Adress : </th>
                <td><textarea rows="5" value="<?php echo $admission_peradress; ?>"  name="per_adress" class="validate[required]" >ax</textarea></td>
            </tr>            <tr>
                <th>Contact Number : </th>
                <td><input type="text" value="<?php echo $admission_contact; ?>" name="contact"  class="validate[required,custom[phone]]" /></td>
            </tr>
        </tbody>
    </table>  



      <!-- CAptcha -->
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
	     <input onclick="window.location='<?php echo SITE_URL; ?>/admissionform/step1' " type="button" class="btn prev-btn" value="Prev" />
	     <input type="submit" class="btn con-b" value="Submit" />
	</div>

</form>