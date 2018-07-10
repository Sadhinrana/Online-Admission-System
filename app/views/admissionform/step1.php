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

  <script type="text/javascript">

    /*jQuery(document).ready(function(){

      $("#step1Form").validationEngine();
      $("#step1Form").bind("jqv.field.result", function(event, field, errorFound, prompText){ console.log(errorFound) });

    });*/


  </script>


<form action="<?php echo SITE_URL; ?>/admissionform/step2" method="POST" id="step1Form" >


	<div style="margin-bottom:20px;">
        <h3>Select Unit</h3>
        <select name="unit" class="validate[required]" style = "width : 130px; padding : 5px" >
          <option value="" >Select One</option>
          <option value="A"  >A</option>
          <option value="B" >B</option>
          <option value="C" >C</option>
          <option value="D" >D</option>
          <option value="E" >E</option>
          <option value="F" >F</option>
        </select> 
      </div>

      <h3>Secondary School Certificate (SSC)</h3>

    
    <table class="res_table">
        <thead>
            <td>Roll</td>
            <td>Res</td>
            <td>Session</td>
            <td>Passing Year</td>
            <td>Board</td>
            <td>Group</td>
            <td>GPA</td>
        </thead>
        <tbody>
            <tr>
                <td>        <input type="text" value="<?php echo $ssc_roll; ?>" name="ssc_roll"  class="validate[required,custom[integer]]" />
                </td>
                <td>        <input type="text" value="<?php echo $ssc_res; ?>" name="ssc_res"  class="validate[required,custom[integer]]" /></td>
                <td>        <input type="text" value="<?php echo $ssc_session; ?>" name="ssc_session"  class="validate[required]" /></td>
                <td>        <input type="text" value="<?php echo $ssc_py; ?>" name="ssc_py"  class="validate[required,custom[integer]]" /> </td>
                <td>         <select name="ssc_board" class="validate[required]" >
          <option value="">Select One</option>
          <option value="barisal">Barisal</option>
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
        </select>       </td>
                <td>        <select name="ssc_group" class="validate[required]">
          <option value="" >Select</option>
          <option value="Science" selected>Science</option>
          <option value="Arts">Arts</option>
          <option value="Commerce">Commerce</option>
        </select>      </td>
                <td>        <input type="text" value="<?php echo $ssc_gpa; ?>" name="ssc_gpa"  class="validate[required,custom[number]]" />       </td>
                
            </tr>
        </tbody>
    </table> 
    
    
    <h3 style="margin-top:40px;">Higher Secondary School Certificate (HSC)</h3>
    
    
    <table class="res_table">
        <thead>
            <td>Roll</td>
            <td>Res</td>
            <td>Session</td>
            <td>Passing Year</td>
            <td>Board</td>
            <td>Group</td>
            <td>GPA</td>
        </thead>
        <tbody>
            <tr>
                <td><input type="text" value="<?php echo $hsc_roll; ?>" name="hsc_roll"  class="validate[required,custom[integer]]" /></td>
                <td>        <input type="text" value="<?php echo $hsc_res; ?>" name="hsc_res"  class="validate[required,custom[integer]]" />
</td>
                <td>        <input type="text" value="<?php echo $hsc_session; ?>" name="hsc_session"  class="validate[required]" />
</td>
                <td>        <input type="text" value="<?php echo $hsc_py; ?>" name="hsc_py"  class="validate[required,custom[integer]]" />
</td>
                <td><select name="hsc_board" class="validate[required]" >
          <option value="">Select One</option>
          <option value="barisal">Barisal</option>
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
        </select></td>
                <td><select name="hsc_group" class="validate[required]">
          <option value="" selected>Select</option>
          <option value="Science" selected>Science</option>
          <option value="Arts">Arts</option>
          <option value="Commerce">Commerce</option>
        </select></td>
                <td>        <input type="text" value="<?php echo $hsc_gpa; ?>" name="hsc_gpa"  class="validate[required,custom[number]]" />
</td>
                
                
            </tr>
        </tbody>
    </table>
    

       
	<div class="btn-dv">
	     <input type="submit" class="btn con-b" value="Next" />
	</div>

</form>