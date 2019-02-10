<!DOCTYPE html>
<html>
<head>
<title>Signup</title>
	<link rel="stylesheet" href="mybr/fontawesome-free-5.5.0-web/css/all.css">
	<link rel = "stylesheet" type = "text/css" href = "css/signin.css" />
</head>

<body>

        <div class="topnav" id="myTopnav">

        	<a href="index.php">Home</a>
        	<!--<a href=schedule.php>Schedule</a>  -->   	
        	<a href="registration.php">Registration</a> 
        	<a href="about.php">About</a>
        	<a href="signin.php">SignIn</a>

        	
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
          </a>
        </div>

    <div class="sign_form">
        <form class="s_form" action="connection.php" method="post">
            <h1 align="center" class="sign_text"><u>Sign-In</u></h1>

            <br><br>
            <div class="st_div">
                <label>User name/ Email</label><br><br>
                <input type="text" name="l_email" id="input_group" required="required"><br><br>

            </div>

            <div class="nd_div">
                <label>Password</label><br><br>
                <input type="Password" name="l_password" id="input_group" required="required"><br><br>

            </div>

            <div class="rd_div">
                <br><br>
                <button id="submit_btn" type="submit" name="login" class="btn">Submit</button>
                &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;
                <button id="submit_btn" type="submit" name="admin_login" class="btn">I am Admin</button>
            </div>
        </form>

    </div>


    <hr>
    <div class="footer">
        <br><br>
        <p align="center">Develop by @ Rocksar Sultana Smriti</p>
        <p align="center">Email : smriti.neub@gmail.com</p>
        <br><br>
    </div>



</body>
</html>

 <script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>