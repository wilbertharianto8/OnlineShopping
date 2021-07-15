<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign In</title>
    <link rel="stylesheet" href="files/login.css">
  </head>
  <body>
    <div class="topic">
      <h1>WELCOME BACK!</h1>
      <h3>We are excited to see you again!</h3>
    </div>
    <form action="login.php" method="post">
      <div class="login-box">
        <h1>Enter your credentials</h1>
        <div class="textbox">
          <i class="fa fa-user"></i>
          <input type="text" placeholder="Username" name="username" required="">
          <i class="fa fa-key"></i>
          <input type="password" placeholder="Password" name="password" required="">
        </div>
        <input type="submit" class="btn" value="Login">
        <h4>Don't have an account yet? <a href="register.php" id="signup">Sign up </a>here.</h4>
      </div>
    </form>
    <footer>© 2020 EXIMIUS ONLINE WEBSTORE. ALL RIGHTS RESERVED.</footer>
    <?php
      session_start();

      $con = mysqli_connect('localhost','root','');
      mysqli_select_db($con,'webcom');

      if(isset($_POST['username'])) { 
        $username = $_POST['username'];
        $password = $_POST['password'];
        $validate = "SELECT * FROM useraccount WHERE username = '$username'";
        $result = mysqli_query($con, $validate);
        $num = mysqli_num_rows($result);
        if($num == 1) {
          $row = mysqli_fetch_assoc($result);
          if ($password == $row["password"]) {
            header('Location: productsIndex.php'); //need to redirect to what page.
            $_SESSION['user'] = $username;

            exit();
          }
          else {
            echo "<script>alert('Wrong password. Please try again.');</script>";
          }
        }
        else {
          echo "<script>alert('Wrong username. Please try again.');</script>";
        }
      }
    ?>
  </body>
</html>