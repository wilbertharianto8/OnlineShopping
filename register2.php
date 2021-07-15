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
        <form action="register2.php" method="post">
            <div class="login-box">
            <h1>Choose a username</h1>
            <h3>Used to sign in anytime you access Eximius Market.</h3>
            <div class="textbox">
                <i class="fa fa-user"></i>
                <input type="username" placeholder="Username" name="username" required="">
            </div>
            <input type="submit" class="btn" value="Next">
            </div>
        </form>
        <footer>© 2020 EXIMIUS ONLINE WEBSTORE. ALL RIGHTS RESERVED.</footer>
        <?php
            session_start();
            $con = mysqli_connect('localhost','root','');
            mysqli_select_db($con,'webcom');

            if(isset($_POST['username'])) { 
                $username = ($_POST['username']);
                $_SESSION['username'] = $username;
                $validate = "SELECT * FROM useraccount WHERE username = '$username'";
                $result = mysqli_query($con, $validate);
                $num = mysqli_num_rows($result);
                if($num == 1) {
                    echo "<script>alert('Username already exist!')</script>";
                } else {
                    header('Location: register3.php');
                    exit();
                }
            }   
        ?>
    </body>
</html>