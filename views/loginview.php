<?php

class vLoginView
{
  function __construct()
  {

  }

  function showLoginForm()
  {
    $htmlout ='
    <br/><br/><form method="POST" name="signupform" id="signupform" action="index.php?page=login" autocomplete="off">
    <input type="hidden" name="isposted" id="isposted" value="0"/>
    <div class="table-responsive">
      <table id="table_id" class="display table table-hover table-bordered table-striped">		
      <thead>
      <tr class="theader1">
        <th colspan="2">Login form</th>        
      </tr></thead>
      <tbody>
      <tr>
        <td>Email</td>
        <td><input type="text" id="email" name="email" value="" required/></td>   
      </tr> 
      <tr>
        <td>Password</td>
        <td><input type="password" id="password" name="password" value="" minlength="6" maxlength="40" required/></td>
      </tr>
      </tbody>     
      </table>
      </div>
      <input type="submit" class="btn-primary" id="submitbutton" value="Sign up"/>
      </form>';

      return $htmlout;
  }

  function showRegisterForm()
  {
    $htmlout ='
    <br/><br/><form method="POST" name="signupform" id="signupform" action="index.php?page=signup" autocomplete="off">
    <input type="hidden" name="isposted" id="isposted" value="0"/>
    <div class="table-responsive">
      <table id="table_id" class="display table table-hover table-bordered table-striped">		
      <thead>
      <tr class="theader1">
        <th colspan="2">Registration form</th>        
      </tr></thead>
      <tbody>
      <tr>
        <td>* First name</td>
        <td><input type="text" id="firstname" name="firstname" value="" required/></td>   
      </tr>
      <tr>
        <td>* Last name</td>
        <td><input type="text" id="lastname" name="lastname" value="" required/></td>
      </tr>
      <tr>
        <td>* Email</td>
        <td><input type="email" id="email" name="email" value="" required/></td>
      </tr>
      <tr>
        <td>* Password</td>
        <td><input type="password" id="password" name="password" value="" minlength="6" maxlength="40" required/></td>
      </tr>
      <tr>
        <td>* Confirm password</td>
        <td><input type="password" id="confirmpassword" name="confirmpassword" minlength="6" maxlength="40" value="" required/></td>
      </tr>
      </tbody>     
      </table>
      </div>
      <input type="submit" class="btn-primary" id="submitbutton" value="Sign up"/>
      </form>';

      return $htmlout;
  }
}

?>