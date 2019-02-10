<!Doctype html>
<html >
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<link rel = "stylesheet" type = "text/css" href = "css/schedule.css" />
	<link rel="stylesheet" href="mybr/fontawesome-free-5.5.0-web/css/all.css">

<body>

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


<div class="bd">
	<h1 align="center">Event List</h1>
	<div id="showItem" class="container" style="max-width:100%" >
		
		<div id="viewIT" style="background-color: #2E8B57; border:1px solid black; max-width:100%; height:600px; overflow:scroll;">
		
			<?php
		session_start();

            $U_id = $_SESSION['r_id'];

              $server_name = "localhost";
              $user_name = "root";
              $server_password = "";

              $db_name = "calendar";

              error_reporting(0);//for error don't show

              $connection = mysqli_connect($server_name, $user_name, $server_password, $db_name);
             echo "<div>";
             

            $q15 =  "SELECT * FROM add_event_table  ORDER BY event_id DESC";

            $data1 = mysqli_query($connection, $q15);
  
            
            while($result5 = mysqli_fetch_assoc($data1)){

              ?>
              <form action="connection.php" method="post"> 
              <?php
              echo  "<div align=center>
              			<h2 align=center><u class=underline1>$result5[event_title]</u></h2>
              			<p align=center>$result5[event_description]</p>
              			<table align=cente >
              				<tr align=center>
              					<th align=left><b>Event Date : </b>$result5[start_date]</th>
              					<th align=left><b>&nbsp;&nbsp;Event Time : </b>$result5[event_time]</th>
              				</tr>
              				<tr align=center>
              					<td align=left><b>Event End Date : </b>$result5[ending_date]</td>
              					<td align=left><b>&nbsp;&nbsp;Event Loaction : </b>$result5[location]</td>
              				</tr>
              			</table>
              			<br>
                   Want to Join &nbsp &nbsp<input align=center type=checkbox name=keyTo value=$result5[event_id] required=required>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                   <button  id=submit_btn type=submit name=join class=btn>Done</button>
                 <br><br>
                 <hr>";

             echo "</div>";
              ?></form>
              <?php
             }

             echo "</div>";


           
          ?> 
		</div>

		<div align="right" id="butIT"  class="btn-group">
      <form method="post" style="height: 600px;">
		  <button name="add_note">Add Note 
      <?php if(isset($_POST['add_note']))
            {
                header("refresh:0; url = Add_note.php");
            }
      ?></button>
		  <button name="add_event">Add Event
      <?php if(isset($_POST['add_event']))
            {
                header("refresh:0; url = add_event.php");
            }
      ?>
      </button>
		  <button name="remainder">Remainder
      <?php if(isset($_POST['remainder']))
            {
                header("refresh:0; url = remainder.php");
            }
      ?></button>
		  <button name="daily_task">Daily Task
      <?php if(isset($_POST['daily_task']))
            {
                header("refresh:0; url = Add_task.php");
            }
      ?></button>

      </form>
		</div>
	</div>
</div>

<hr>
<div class="footer">
	<br><br>
	<p align="center">Develop by @ Rocksar Sultana Smriti</p>
	<p align="center">Email : smriti.neub@gmail.com</p>
	<br><br><br>
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