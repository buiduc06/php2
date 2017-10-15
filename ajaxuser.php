<?php

         
require_once 'models/User.php';
	$mail=$_GET['q'];
	$checkuser=User::where(['email',"$mail"]);


if ($checkuser = null) {
	echo '<div class="form-group has-error has-feedback">
    <label class="col-sm-2 control-label" for="inputError">
    Input with error and icon</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputError">
      <span class="glyphicon glyphicon-remove form-control-feedback"></span>
    </div>
  </div>';
}else{
        
                 echo '<div class="form-group" id="txtHint">
	      <label class="control-label col-sm-2">Email</label>
	      <div class="col-sm-10">
	        <input type="email" class="form-control" id="email" name="email" required>
	      </div>
	    </div>
';
       }     

?>