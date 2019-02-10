<!DOCTYPE html>



<html>
<head>
<title>personal Calender</title>
    
	<link rel="stylesheet" href="mybr/fontawesome-free-5.5.0-web/css/all.css">
	<link rel = "stylesheet" type = "text/css" href = "css/registration.css" />
	
</head>
<body>

<div class="topnav" id="myTopnav">

	<a href="index.php">Home</a>
	<!--<a href="schedule.php">Schedule</a>	-->
	<a href="registration.php">Registration</a> 
	<a href="about.php">About</a>
	<a href="signin.php">SignIn</a>
	
	
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div class="bd" align="center">
    <div  class="form">

        <h2>Registration</h2>
        <form id="contactform" action="connection.php" method="post"> 

        			<p class="contact"><label for="name">Name</label></p> 
        			<input id="name" name="name" placeholder="First and last name" tabindex="1" required="required" type="text"> 
        			 
        			<p class="contact"><label for="email">Email</label></p> 
        			<input id="email" name="email" placeholder="example@domain.com" required="required" type="email"> 
                    
                    <p class="contact"><label for="username">Create a username</label></p> 
        			<input id="username" name="username" placeholder="username" required="required" tabindex="2" type="text"> 
        			 
                    <p class="contact"><label for="password">Create a password</label></p> 
        			<input type="password" id="password" name="password" required="required">
    				
                    <p class="contact"><label for="repassword">Confirm your password</label></p> 
        			<input type="password" id='repassword' name="repassword" required="required"> 

    				
                    <p class="contact"><label for="birthday">Birthday</label></p>
                    <input type="date" id="birthday" name="birthday" placeholder="1 January, 2018" required="required" style="max-width:350px"> 
                  

                    <p class="contact"><label for="username">I Am </label></p>
        			<select class="select-style gender" name="gender" style="max-width:410px">
        				<option value="Male">Male</option>
        				<option value="Female">Female</option>
        				<option value="Others">Other</option>
                    </select>
        			<br><br>
                
                <p class="contact"><label for="phone">Mobile phone</label></p> 
                <input id="phone" name="mobile" placeholder="+880..." required="required" type="number"> </br>
    			
                <input class="buttom" name="submit" id="submit" onclick="check_pass()" tabindex="5" value="Sign up" type="submit">
       </form> 
    </div> 
</div> 

 <br><br><br>
<hr>
<div class="footer">
    <br><br>
    <p align="center">Develop by @ Rocksar Sultana Smriti</p>
    <p align="center">Email : smriti.neub@gmail.com</p>
    <br><br><br>
</div>




</body>
</html>

<script type="text/javascript">
    
    function check_pass(){
        var password = document.getElementById("password").value;
        var C_password = document.getElementById("repassword").value;

        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var username = document.getElementById("username").value;
        var birthday = document.getElementById("birthday").value;
        var mobile = document.getElementById("phone").value;

        if(password != C_password){
            alert('Your password are not matched');
        }
        else if(name == ''){
            alert('Enter your full name!!');
        }
        else if(email == ''){
            alert('Your email may be wrong !!');
        }
        else if(username == ''){
            alert('Enter your User name!!');
        }
        else if(password == ''){
             alert('Fill the password!!');
        }
        else if(birthday == ''){
            alert('What is your Birthday!!');
        }
        else if(mobile == ''){
            alert('Enter your Mobile Number!!');
        }
        else{
            alert('Welcome to Calender World!');
        }

    }
    
</script>


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

