
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
        <form action="register3.php" method="post">
            <div class="login-box">
            <h1>Choose a password</h1>
            <h3>Make sure it's a good one.</h3>
            <div class="textbox">
                <i class="fa fa-key"></i>
                <input type="password" placeholder="Password" name="password" id="pw" required="">
                <h3>Can you say it again?</h3>
                <i class="fa fa-key"></i>
                <input type="password" placeholder="Re-enter Password" name="password2" id="pw2" onkeyup="compare()" required="">
            </div>
            <p id="status"></p>
            <input type="submit" class="btn" id="button" value="Next">
            </div>
        </form>
        <footer>© 2020 EXIMIUS ONLINE WEBSTORE. ALL RIGHTS RESERVED.</footer>
        <script>
            function compare() {
                var a = document.getElementById("pw").value;
                var b = document.getElementById("pw2").value;
                if(a == b) {
                    var x = document.getElementById("status").innerHTML = "Password Match";
                    document.getElementById("button").disabled = false;
                }   else {
                    document.getElementById("status").innerHTML = "Password Doesn't Match";
                    document.getElementById("button").disabled = true;
                }
            }
        </script>
        <?php
            session_start();
            $con = mysqli_connect('localhost','root','');
            mysqli_select_db($con,'webcom');
            
            if(isset($_POST['password'])) { 
                $email = $_SESSION['email'];
                $username = $_SESSION['username'];
                $password = ($_POST['password']);

                $reg = "INSERT INTO useraccount(email, username, password) VALUES ('$email', '$username', '$password')";
                mysqli_query($con, $reg);
                header('Location: productsIndex.php');

            }   
            ?>
    </body>
</html>