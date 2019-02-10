<!Doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">

	<link rel = "stylesheet" type = "text/css" href = "css/Add_task.css" />
	<link rel="stylesheet" href="mybr/fontawesome-free-5.5.0-web/css/all.css">

</head>


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



<div class="container contact-form1">
	

	<div class="container contact-form" height="100%">
		<h1 align="Center" >Daily task</h1>
		<hr>

		    <form id="contactform" action="connection.php" method="post"> 

		    	<div class="st_div">
		    		<p class="contact"><label for="name">Task Title</label></p> 
		    		<input type="text" id="input-group" name="task_title"  tabindex="1" required ="required"> 
				</div>

				<div class="nd_div">	
		    		<p class="contact"><label for="email">Task Date</label></p> 
		    		<input type="Date" id="input-group" name="task_date"  required ="required" > <br><br>
		    	</div>

		    	<div class="nd_div">	
		    		<p class="contact"><label for="email">Task Time</label></p> 
		    		<input type="time" id="input-group" name="task_time"  required ="required" > <br><br>

		    	</div>

		    	<div class="nd_div">	
		    		<p class="contact"><label for="email">Task Note</label></p> 
		    		<input type="text" id="input-group" name="task_note"  required ="required" > <br><br>

		    	</div>
		    	<div class="rd_div">
		           <button id="submit_btn" type="submit" name="task_add" class="btn"><b>SUBMIT</b></button>
		        </div>
		   </form> 
	</div>


	<div class="show_all_task">

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

              echo "<th>Task Title</th>";
              echo "<th>Task Description</th>";
              echo "<th>Select</th>";
              echo "<th>Edit</th>";
              echo "<th>Done</th>";

              echo "</tr>";

            $q13 =  "SELECT * FROM daily_tasks_table  WHERE reg_id = $U_id ORDER BY tasks_id DESC";

            $data1 = mysqli_query($connection, $q13);
  
            echo "<h2><b<u>My Tasks List</u></b></h2>";
            while($result5 = mysqli_fetch_assoc($data1)){

              ?>
              <form action="" method="post"> 
              <?php
              echo  "<tr align=center height=10>
                   <td><b>$result5[tasks_title]</b><br></td>
                   <td>$result5[tasks_note]<br><br>
                   <b>Task Date :</b>$result5[tasks_date]    <b>Task Time :</b>$result5[tasks_time]</td>
                   <td><input type=checkbox name=keyTodelete value=$result5[tasks_id] required=required> </td>

                   <td><input id=submit_btn type=submit name=edit_tasks value=Edit class=btn></td>

                   <td><button id=submit_btn type=submit name=delete_tasks class=btn>Done</button></td>
                 </tr>";

              ?></form>
              <?php
             }

             echo "</table>";


             if(isset($_POST['delete_tasks']))///delete task item segment
              {
                $useID = $_SESSION['r_id'];
                $keyNumber =  $_POST['keyTodelete'];

                  

                if($keyNumber != ''){

                       $q14 = "DELETE FROM daily_tasks_table WHERE tasks_id = ".$keyNumber;

                    if(mysqli_query($connection,$q14)){

                        header("refresh:0; url = Add_task.php");
                    }
                }
                 else{
                    header("refresh:0; url = Add_task.php");
                
                }
              }///delete task segment close
            


            if(isset($_POST['edit_tasks']))///edit task item segment
            {
                $useID = $_SESSION['r_id'];
                $keyNumber =  $_POST['keyTodelete'];

                  

                if($keyNumber != '' && $useID != ''){

                  $_SESSION['task_id'] = $keyNumber;

                  header("refresh:0; url = edit_task.php");
                }
                 else{
                    header("refresh:0; url = Add_task.php");
                
                }
              }
          ?> 




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
</script>
