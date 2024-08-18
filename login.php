<?php
///////////////////////////////////////////Login///////////////////////////////////////////
if (isset ($_POST["Login"]))
{

$servername = "localhost:3308"; //3308 for WAMPSERVER
$username = "root";
$password = "";
$dbname = "hcsbn";

// Create connection
$conn = @mysqli_connect($servername, $username, $password,$dbname); //@mysqli for WAMPSERVER

$email = $_POST["txtLEmail"];
$pw = $_POST["txtLpw"];

// Check connection
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
else
{
    //echo "Connected successfully";
}
      //echo "<br>";

// sql select command
$sql = "SELECT * FROM users WHERE Email = '$email' AND Password = '$pw'  "; 
$result = mysqli_query($conn, $sql);
if ($row = mysqli_fetch_array($result))
{
    header("Location:dashboard.html");
}
else
{
    $check = "<script> alert('Login Error Invalid Credentials. Check your Email and Password again');</script>";
    echo $check;
}
}



///////////////////////////////////////////Register///////////////////////////////////////////
if (isset ($_POST["Register"]))
{

$servername = "localhost:3308"; //3308 for WAMPSERVER
$username = "root";
$password = "";
$dbname = "hcsbn";

// Create connection
$conn = @mysqli_connect($servername, $username, $password,$dbname); //@mysqli for WAMPSERVER

$un = $_POST["txtRUN"];
$email = $_POST["txtREmail"];
$pw = $_POST["txtRpw"];

// Check connection
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
else
{
    //echo "Connected successfully";
}
      //echo "<br>";

// sql insert command
$sql = 'INSERT INTO users (Username,Email,Password)  VALUES ("'.$un.'", "'.$email.'","'.$pw.'")'; 
$result = mysqli_query($conn, $sql);
if (mysqli_query($conn, $sql)) {

    $check = "<script> alert('Your Resgistration has been Successful...!!!');</script>";
    echo $check;

 } else {

    $check = "<script> alert('Check your Detials...!!!');</script>";
    echo $check;
 }
}
?>



<html>
<!--Head Section-->
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
    
    <!--FavIcon-->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">

    <!--CSS-->
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/navigation.css">
    <link rel="stylesheet" href="css/loginBackground.css">
    <link rel="stylesheet" href="css/footer.css">

    <!--BootStrap-->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!--RightClickDisable-->
    <script src="js/RightClickDisable.js"></script>

</head>
<!--End of Head Section-->

<body>
<div class="heart"></div>


<!--Navigation-->
<header>
    <div class="logo">Save Hearts</div>

    <div class="titles">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>

    <nav class="nav-bar">
        <ul class="navList">
            <li> <a href="index.html" style="text-decoration: none;"> Home </a></li>
            <li> <a href="about.html" style="text-decoration: none;" > About </a></li>
            <li> <a href="services.html" style="text-decoration: none;" > Services </a></li>
            <li> <a href="contact.html" style="text-decoration: none;"> Contact </a></li>
            <li> <a href="login.php" class="active" style="text-decoration: none;"> Login </a></li>
            <!--<li> <button class ="btnLogin-popup">Login</button></li>-->
        </ul>
    </nav>
</header>

<script>
    titles = document.querySelector(".titles");
    titles.onclick = function() {
        navBar = document.querySelector(".nav-bar");
        navBar.classList.toggle("active");
    }
</script>
<!--End of Navigation-->

<!--Start of Wrapper-->
<div class="wrapper">

    <span class="icon-close">
        <ion-icon name="close"></ion-icon>
    </span>

    <!--Start of Login Form-->
    <div class="form-box login">
    
    <h2>Login</h2>
    
    <form action="login.php" method="POST">

        <!--Email Section-->
        <div class="input-box">
            <span class="icon"><ion-icon name="mail"></ion-icon></span>
            <input type="email" name="txtLEmail" required>
            <label>Email</label>
        </div>

        <!--Password Section-->
        <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            <input type="password" name="txtLpw" required>
            <label>Password</label>
        </div>

        <!--Forgot Password Option-->
        <div class="remember-forgot">
            <label><input type="checkbox">Remember me</label>
            <a href="#"> Forgot Password?</a>
        </div>

        <!--Submit Button-->
        <button type="submit" class="btns" name="Login">Login</button>

        <!--Go to Register Form-->
        <div class="login-register">
            <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
        </div>

    </form>
</div>
<!--End of Login Form-->

<!--Start of Register Form-->
<div class="form-box register">
     <h2>Registration</h2>
     <form action="login.php" method="POST">
        
<!--Username Section-->
<div class="input-box">
    <span class="icon"><ion-icon name="person"></ion-icon></span>
    <input type="text" name="txtRUN" required>
    <label>Username</label>
</div>

<!--Email Section-->
<div class="input-box">
    <span class="icon"><ion-icon name="mail"></ion-icon></span>
    <input type="email" name="txtREmail" required>
     <label>Email</label>
</div>
        
<!--Password Section-->
<div class="input-box">
    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
    <input type="password" name="txtRpw" required>
    <label>Password</label>
</div>
        
<!--Agree to terms & conditions-->
<div class="remember-forgot">
     <label><input type="checkbox">I agree to the terms & conditions</label>
</div>
        
<!--Submit Button-->
<button type="submit" class="btns" name="Register">Register</button>
        
<!--Go to Login Form-->
<div class="login-register">
    <p>Already have an account? <a href="#" class="login-link">Login</a></p>
</div>
        
</form>
</div>
<!--End of Register Form-->
</div>
<!--End of Wrapper-->
<script src="js/login.js"></script>

<!--ion icons installing-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>



<!--Footer-->
<footer>
    <div class="bs-example">
        <div class="bg d-flex justify-content-between">

            <div class="margin">
                <div>&copy;<script>document.write(new Date().getFullYear());</script> All rights reserved. by SDHC Software Solutions.</div>
            </div>
            <!-- Date and Time -->
            <div class="Date">
                <div>
                    <script>
                        document.write("Date : ");document.write(new Date().getFullYear());document.write(" - ");
                        document.write(new Date().getMonth()+1);document.write(" - ");
                        document.write(new Date().getDate());
                        document.write("    |    ");
                        document.write("Time : ");document.write(new Date().getHours());document.write(" : ");
                        document.write(new Date().getMinutes());document.write(" : ");
                        document.write(new Date().getSeconds());
                     </script>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html>