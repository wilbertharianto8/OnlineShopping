<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Create Account</title>
    <link rel="stylesheet" href="files/register.css">
  </head>
  <body>
    <div class="topic">
      <h1>CREATE AN <br>ACCOUNT</h1>
    </div>
    <form action="register.php" method="post">
      <div class="login-box">
        <h1>What's your email?</h1>
        <h3>Don't worry we won't tell anyone.</h3>
        <div class="textbox">
          <i class="fa fa-envelope"></i>
          <input type="email" placeholder="Email" name="email" required="">
        </div>
        <input type="submit" class="btn" value="Next">
        <h4>Already have an account? <a href="register.php" id="signup">Sign in </a>here.</h4>
      </div>
    </form>
    <footer>© 2020 EXIMIUS ONLINE WEBSTORE. ALL RIGHTS RESERVED.</footer>
    <?php
      session_start();

      $con = mysqli_connect('localhost','root','');
      mysqli_select_db($con,'webcom');

      if(isset($_POST['email'])) { 
        $email = ($_POST['email']);
        $_SESSION['email'] = $email;
        $validate = "SELECT * FROM useraccount WHERE email = '$email'";
        $result = mysqli_query($con, $validate);
        $num = mysqli_num_rows($result);
        if($num == 1) {
          echo "<script>alert('Email entered has already exist. Try another one :)')</script>";
        } else {
          header('Location: register2.php');
          exit();
        }
      }
    ?>
  </body>
</html>