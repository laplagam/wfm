<?php

class LoginClass
{
  var $pdo;
  var $errormessage='';
  var $errorcount=0;

  function __construct(PdoConnection $pdo)
  {
    $this->pdo = $pdo;
  }

  function registerUser()
  {
    if(isset($_POST['firstname']))
    {
      $firstname = $_POST['firstname'];
    }
    else
    {
      $this->errormessage .= 'First name is missing. <br/>';
      $this->errorcount++;
    }
    if(isset($_POST['lastname']))
    {
      $lastname = $_POST['lastname'];
    }
    else
    {
      $this->errormessage .= 'Last name is missing. <br/>';
      $this->errorcount++;
    }

    if(isset($_POST['email']))
    {
      $email = $_POST['email'];
    }
    else
    {
      $this->errormessage .= 'Email is missing. <br/>';
      $this->errorcount++;
    }
    if(isset($_POST['password']))
    {
      $password = $_POST['password'];
    }
    else
    {
      $password = '';
      $this->errormessage .= 'Password is missing. <br/>';
      $this->errorcount++;
    }
    if(isset($_POST['confirmpassword']))
    {
      $confirmpassword = $_POST['confirmpassword'];
    }
    else
    {
      $confirmpassword = '';
      $this->errormessage .= 'Confirm password is missing. <br/>';
      $this->errorcount++;
    }

    if(isset($_POST['confirmpassword']) && isset($_POST['password']) && $_POST['password'] == $_POST['confirmpassword'])
    {
      if(strlen($_POST['confirmpassword'])<6)
      {
        $this->errormessage .= 'Password is below the minimum 6 characters required. <br/>';
        $this->errorcount++;
      }
    }
    else
    {
      $this->errormessage .= 'Passwords not matching each other. <br/>';
      $this->errorcount++;
    }
    
    if($this->errorcount<1)
    {
      $dbh = $this->pdo->getPdoCon();
      $query = 'INSERT INTO tbluser(firstname, lastname, email, pass) VALUES (:firstname,:lastname,:email,:pass)';
      $stmt = $dbh->prepare($query);

      $password = password_hash($password, PASSWORD_DEFAULT);

      $stmt->bindParam(':firstname',$firstname,PDO::PARAM_STR);
      $stmt->bindParam(':lastname',$lastname,PDO::PARAM_STR);
      $stmt->bindParam(':email',$email,PDO::PARAM_STR);
      $stmt->bindParam(':pass',$password,PDO::PARAM_STR);

      $result = $stmt->execute();

      if($result == false)
      {
        $this->errormessage .= 'Failed to create user. Insert failed. <br/>';
        $this->errorcount++;
        return 0;
      }
      else
      {
        return 1;
      }
    }
    else
    {
      return 0;
    }

  }

  function checkLogin()
  {
    if(isset($_POST['email']) && isset($_POST['password']))
    {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $dbh = $this->pdo->getPdoCon();

      $query = 'SELECT id, firstname, lastname, email, pass FROM tbluser WHERE email=:email ';
      $stmt = $dbh->prepare($query);
      $stmt->bindParam(':email',$email,PDO::PARAM_STR);
      $stmt->execute();

      $result = $stmt->fetch();

      //var_dump($result);

      if(password_verify($password,$result['pass']))
      {
        return 1;
        $_SESSION['login'] = true;
        $_SESSION['userid'] = $result['id'];        
      }
      else
      {
        return 0;
      }
    } 
  }

  function createSignUpJavascriptCode()
  {
    $htmlout = '
    <script type="text/javascript">
    function submitForm()
    {
      document.getElementById("isposted").value = 1;
      document.getElementById("signupform").submit();
    }
    </script>
    <script type="text/javascript">
        $(function () {
            $("#submitbutton").click(function () {
                var password = $("#password").val();
                var confirmPassword = $("#confirmpassword").val();
                if (password != confirmPassword) {
                    alert("Passwords do not match.");
                    return false;
                }
                return true;
            });
        });
    </script>
    ';
    return $htmlout;
  }
}
?>