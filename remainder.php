<!DOCTYPE html>
<html>
<head>
	<title>Remainder</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel = "stylesheet" type = "text/css" href = "css/remainder.css" />
	<link rel="stylesheet" href="mybr/fontawesome-free-5.5.0-web/css/all.css">
</head>

<body class="full_body">

<div class="topnav" id="myTopnav">

	<a href="home.php">Home</a>
	<a href="schedule.php">Schedule</a>	
	<a href="about1.php">About</a>
	<!--<a href="registration.php">Registration</a> 
	<a href="signin.php">SignIn</a>-->
	<a href="index.php">Logout</a>
	
	
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>


<div class="mainDiv_remainder">

	<div class="show_all_remainder">

	<?php
		session_start();

            $U_id = $_SESSION['r_id'];

              $server_name = "localhost";
              $user_name = "root";
              $server_password = "";

              $db_name = "calendar";

              error_reporting(0);//for error don't show

              $connection = mysqli_connect($server_name, $user_name, $server_password, $db_name);
             echo "<table align=center border=2 width=750  id=table_note>";
             echo "<tr height=50 >";

              echo "<th>Remainder</th>";
              echo "<th>Remainder Description</th>";
              echo "<th>Select</th>";
              echo "<th>Edit</th>";
              echo "<th>Delete It</th>";

              echo "</tr>";

            $q10 =  "SELECT * FROM remainder_table  WHERE reg_id = $U_id ORDER BY remainder_id DESC";

            $data1 = mysqli_query($connection, $q10);
  
            echo "<h2><b<u>My Remainder List</u></b></h2>";
            while($result4 = mysqli_fetch_assoc($data1)){

              ?>
              <form action="" method="post"> 
              <?php
              echo   "<tr align=center height=10>
                   <td><b>Remainder Title :</b> $result4[remainder_title]<br>
                   <b>Remainder Date :</b> $result4[remainder_date]<br> <b>Remainder Time :</b>$result4[remainder_time]</td>
                   <td>$result4[remainder_description]</td>
                   <td><input type=checkbox name=keyTodelete value=$result4[remainder_id] required=required> </td>

                   <td><input id=submit_btn type=submit name=edit_remainder_item value=Edit class=btn></td>

                   <td><button id=submit_btn type=submit name=delete_remainder class=btn>Done</button></td>
                 </tr>";

              ?></form>
              <?php
             }

             echo "</table>";


             if(isset($_POST['delete_remainder']))///delete remainder item segment
              {
                $useID = $_SESSION['r_id'];
                $keyNumber =  $_POST['keyTodelete'];

                  

                if($keyNumber != ''){

                       $q11 = "DELETE FROM remainder_table WHERE remainder_id = ".$keyNumber;

                    if(mysqli_query($connection,$q11)){

                        header("refresh:0; url = remainder.php");
                    }
                }
                 else{
                    header("refresh:0; url = remainder.php");
                
                }
              }///delete remainder segment close
            

            if(isset($_POST['edit_remainder_item'])){

                $useID = $_SESSION['r_id'];
                $keyNumber =  $_POST['keyTodelete'];

                if($keyNumber != '' && $useID != ''){

                    $_SESSION['remainder_id'] = $keyNumber;
                    header("refresh:0; url = edit_remainder.php");
                }
                else{
                    header("refresh:0; url = remainder.php");
                
                }
            }
          ?> 

	</div>



	<div class="container contact-form" height="100%">
		<h1 class="remainder_text">Remainder</h1>
	    <hr>
	  <form  class="form_remainder" action="connection.php" method="post" align="center">
	    
	    <div class="st_div">
		    <label id="title"><b>Title</b></label><br><br>
		    <input id="input-group" type="text" placeholder="Enter Title" name="remainder_title" required="required">
		</div>

	    <div class="nd_div">
		    <label id="discripsion"><b>Discripsion</b></label><br><br>
		    <input id="input-group" type="text" placeholder="Enter Discripsion" name="remainder_discription" required="required">
		</div>

		 <div class="nd_div">
		    <label id="date"><b>Date</b></label><br><br>
		    <input id="input-group" type="date" placeholder="Enter Date" name="remainder_date" required="required">
		</div>

		<div class="rd_div">
			<label id="time"><b>Time</b></label><br><br>
		    <input id="input-group" type="time" placeholder="Enter Time" name="remainder_time" required="required">
		</div>

		<div class="th_div">
	    	<button id="submit_btn" type="submit" name="remainder_button" class="btn">Submit</button>
	   	</div>
	  </form>
	</div>


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
/* scroll */
x = 0;
$(document).ready(function(){
    $("div").scroll(function(){
        $("span").text( x+= 1);
    });
});
</script>