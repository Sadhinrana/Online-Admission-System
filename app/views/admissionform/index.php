<?php 



$user  = new Users();
if(!$user->isLoggedIn()){
  Session::flush('signin-first','You need to log in to apply');
	header('Location: ' . SITE_URL . '/login');
	exit();
}

  if(Session::exists('not-eligible')){
    echo miscellaneous::errorPopup(Session::flush('not-eligible'),"red");
  }

?>

  <script type="text/javascript" src="<?php echo SITE_URL; ?>/public/js/msf.js" charset="utf-8"></script>



  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Step 1<br/>Check Eligibility</li>
    <li>Step 2<br/>Personal Detail</li>
    <li>Step 3<br/>Confirm</li>
  </ul>

  
<form action="<?php echo SITE_URL; ?>/admissionform/run" method ="post" id="application-form" class="con-form" >


    <!--FIELDSET-->
    <fieldset id="first">

      <div style="margin-bottom:20px;">
        <h4>Select Unit</h4>
        <select name="unit" class="validate[required]" >
          <option value="" >Select One</option>
          <option value="A"  >A</option>
          <option value="B"selected >B</option>
          <option value="C" >C</option>
          <option value="D" >D</option>
        </select> 
      </div>

      <h5>Secondary School Certificate (SSC)</h5>

      <div class="roll">
        <h4>Roll</h4>
        <input type="text" value="222" name="ssc_roll"  class="validate[required,custom[integer]]" />
      </div>   

      <div class="registration">
        <h4>Resistration</h4>
        <input type="text" value="22" name="ssc_res"  class="validate[required,custom[integer]]" />
      </div>     

       <div class="session">
        <h4>Session</h4>
        <input type="text" value="22" name="ssc_session"  class="validate[required]" />
      </div>         

      <div class="passing year">
        <h4>Passing Year</h4>
        <input type="text" value="222" name="ssc_py"  class="validate[required,custom[integer]]" />
      </div>     

      <div class="board">
        <h4>Board</h4>
        <select name="ssc_board" class="validate[required]" >
          <option value="" >Select One</option>
          <option value="barisal" selected>Barisal</option>
          <option value="chittagong">Chittagong</option>
          <option value="comilla">Comilla</option>
            <option value="dhaka">Dhaka</option>
          <option value="dinajpur">Dinajpur</option>
          <option value="jessore">Jessore</option>
            <option value="rajshahi">Rajshahi</option>
            <option value="sylhet">Sylhet</option>
            <option value="madrasah">Madrasah</option>
          <option value="tec">Technical</option>
          <option value="dibs">DIBS(Dhaka)</option>
        </select> 
      </div>      

      <div class="group">
        <h4>Group</h4>
        <select name="ssc_group" class="validate[required]">
          <option value="" >Select</option>
          <option value="Science" selected>Science</option>
          <option value="Arts">Arts</option>
          <option value="Commerce">Commerce</option>
        </select>
      </div>      

      <div class="gpa">
        <h4>GPA</h4>
        <input type="text" value="1515" name="ssc_gpa"  class="validate[required,custom[number]]" />
      </div>      



      <h5 style="margin-top:40px;">Higher Secondary School Certificate (HSC)</h5>

      <div>
        <h4>Roll</h4>
        <input type="text" value="2551" name="hsc_roll"  class="validate[required,custom[integer]]" />
      </div>     

      <div>
        <h4>Resistration</h4>
        <input type="text" value="262" name="hsc_res"  class="validate[required,custom[integer]]" />
      </div>     

       <div>
        <h4>Session</h4>
        <input type="text" value="151" name="hsc_session"  class="validate[required]" />
      </div>     

      <div>
        <h4>Passing Year</h4>
        <input type="text" value="151" name="hsc_py"  class="validate[required,custom[integer]]" />
      </div>  

      <div>
        <h4>Board</h4>
        <select name="hsc_board" class="validate[required]" >
          <option value="" >Select One</option>
          <option value="barisal" selected>Barisal</option>
          <option value="chittagong">Chittagong</option>
          <option value="comilla">Comilla</option>
          <option value="dhaka">Dhaka</option>
          <option value="dinajpur">Dinajpur</option>
          <option value="jessore">Jessore</option>
          <option value="rajshahi">Rajshahi</option>
          <option value="sylhet">Sylhet</option>
          <option value="madrasah">Madrasah</option>
          <option value="tec">Technical</option>
          <option value="dibs">DIBS(Dhaka)</option>
        </select> 
      </div>      

      <div>
        <h4>Group</h4>
        <select name="hsc_group" class="validate[required]">
          <option value="" selected>Select</option>
          <option value="Science" selected>Science</option>
          <option value="Arts">Arts</option>
          <option value="Commerce">Commerce</option>
        </select>
      </div>      

      <div>
        <h4>GPA</h4>
        <input type="text" value="151" name="hsc_gpa"  class="validate[required,custom[number]]" />
      </div> 
 

      <div class="btn-dv">
            <input type="button" class="btn eligible-btn" value="Next" />
      </div>
    </fieldset>

    <!--FIELDSET-->
    <fieldset>
     

      <div>
        <h4>Applicant's Name</h4>
        <input type="text" value="knki"  class="validate[required]" name="name" />
      </div>      

      <div>
        <h4>Father's Name</h4>
        <input type="text" value="adad"  class="validate[required]" name="father_name" />
      </div>      

      <div>
        <h4>Mother's Name</h4>
        <input type="text" value="dada"  class="validate[required]" name="mother_name" />
      </div>      

      <div>
        <h4>Gender</h4>
        <select name="gender" class="validate[required]"> 
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
      </div>      

      <div>
        <h4>Date of Birth</h4>
        <input type="text" value="2014-07-16" name="dob" class="validate[required,custom[date]]" id="Datepicker" /> 
      </div>      

      <div>
        <h4>Nationality</h4>
        <select name="nationality" class="validate[required]" >
          <option value="Bangladeshi">Bangladeshi</option>
        </select>
      </div>      

      <div>
        <h4>Present Adress</h4>
        <textarea rows="5" value="" name="pre_adress" class="validate[required] " >Xxa</textarea> 
      </div> 

      <div>
        <h4>Permanent Adress</h4>
        <textarea rows="5" value=""  name="per_adress" class="validate[required]" >ax</textarea>
      </div>      

      <div>
        <h4>Contact Number</h4>
        <input type="text" value="2626" name="contact"  class="validate[required,custom[phone]]" />
      </div>      

      <div>
        <h4>Upload Photo(240x240)</h4>
        <!--<input type="file" value="515" name="photo" onchange="readURL(this);" class="validate[required]" >-->
      </div>      


       <div class="btn-dv">
        <input type="button" class="btn prev-btn" value="Prev" />
            <input type="button" class="btn con-b" value="Next" />
        </div>
    </fieldset>   

    <fieldset id="review-field" class="info" >
      






    </fieldset>


  <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
  
</form>