<!DOCTYPE html>

<html>
<head>
	<title>Admin page</title>
</head>
<style type="text/css">
body {
  margin: 0px;
  font-family: Arial, Helvetica, sans-serif;
  background-color:#2E8B57;
}
.full_body{
	margin-bottom:0px;
	margin-left: 0px;
	margin-right: 0px;
	margin-top: 0px;
}
.mainDiv_remainder{
  width: 100%;
  height: 100%;
  display: flex;
}
.show_all_user{
  flex: 1;
  text-align: center;
  margin-left: 20px;
  background:rgba(0,0,0, .6);
  color:white;
  width: 800px;
  margin-top: 100px;
  margin-right: 20px;
  padding: 20px;
  box-shadow: 0px 0px 10px 3px grey;
}
.uUU_name:hover { 
  color: red;
}
hr{
   background: white;  
}
#submit_btn{
  padding: 10px;
  text-align: center;
  border-radius: 8px;
  background-color: lightblue;
}
#submit_btn:hover{
	background-color: red;
}
#submit_btn1{
  padding: 15px;
  margin-top: 100px;
  text-align: center;
  border-radius: 8px;
  font-size: 20px;
  background-color: lightblue;
}
#submit_btn1:hover{
	background-color: red;
}
.footer{
  width: 100%;
  height: 200px;
  flex: 1;
  bottom: 0px;
  right: 0px;
  left: 0px; 
}
	

</style>
<body>

<div class="mainDiv_remainder">

	<div class="show_all_user">

	<?php

		session_start();
		$us_id = $_SESSION['ad_id'];
		$admin_name = $_SESSION['ad_user_name'];

		echo "<h2 align=center style=color:white;><u>Admin Name :    ".$admin_name." </u></h2><br>";


            

              $server_name = "localhost";
              $user_name = "root";
              $server_password = "";

              $db_name = "calendar";

              error_reporting(0);//for error don't show

              $connection = mysqli_connect($server_name, $user_name, $server_password, $db_name);
              echo "<h2><b<u>All User In Calendar</u></b></h2>";
              echo "<hr>";
             echo "<table align=center border=2 style=width100%;  id=table_note>";
             echo "<tr height=50  width=100>";

              echo "<th>Registation Id</th>";
              echo "<th>Full Name</th>";
              echo "<th>User Email</th>";
              echo "<th>User Name</th>";
              echo "<th>User Birthday</th>";
              echo "<th>User Gender</th>";
              echo "<th>User Mobile</th>";

              echo "<th>Select User</th>";
              echo "<th>Remove User</th>";

              echo "</tr>";

            $q31 =  "SELECT * FROM reg_table";

            $data31 = mysqli_query($connection, $q31);
  
            
            while($result31 = mysqli_fetch_assoc($data31)){

              ?>
              <form action="" method="post"> 
              <?php
              echo   "<tr align=center height=10>
                   <td height=10>$result31[reg_id]</td>
                   <td height=10>$result31[name]</td>
                   <td height=10>$result31[user_email]</td>
                   <td height=10 class=uUU_name>$result31[user_name]</td>
                   <td height=10>$result31[user_birthday]</td>
                   <td height=10 >$result31[user_gender]</td>
                   <td height=10>$result31[user_mobile]</td>

                   <td height=10><input type=checkbox name=keyTodeleteUser value=$result31[reg_id] required=required> </td>
                   <td height=10><button id=submit_btn type=submit name=delete_user class=btn><b>Done</b></button></td>
                 </tr>";

              ?></form>
              <?php
             }

            echo "</table>";

            ?>
            
            <a href="signin.php"><button id="submit_btn1" type="submit" name="logout">Logout</button></a>


            <?php
             if(isset($_POST['delete_user']))///delete remainder item segment
              {
                
                $delete_user_id =  $_POST['keyTodeleteUser'];

                $q37 = "DELETE  FROM reg_table WHERE reg_id = ".$delete_user_id;

                if(mysqli_query($connection,$q37)){
                       
                       header("refresh:0; url = admin_home.php");
                }



              if($delete_user_id != ''){
                	$q38 = "SELECT event_id FROM add_event_table WHERE reg_id = ".$delete_user_id;

            		$data38 = mysqli_query($connection, $q38);
            		//$result38 = mysqli_fetch_assoc($data38);

            		//echo $result38[event_id];

            		while($result38 = mysqli_fetch_assoc($data38)){

            			 $q32 = "DELETE  FROM join_event WHERE event_id = ".$result38[event_id];
            			 mysqli_query($connection,$q32);
            		 }	

                    if(mysqli_query($connection,$q32)){

                    	$q33 = "DELETE  FROM add_event_table WHERE reg_id = ".$delete_user_id;

                    	if(mysqli_query($connection,$q33)){
                       		
                       		$q34 = "DELETE  FROM note_table WHERE reg_id = ".$delete_user_id;

                       		if(mysqli_query($connection,$q34)){
                       		 	
                       			$q35 = "DELETE  FROM remainder_table WHERE reg_id = ".$delete_user_id;

                       			if(mysqli_query($connection,$q35)){

                       				$q36 = "DELETE  FROM daily_tasks_table WHERE reg_id = ".$delete_user_id;

                       				if(mysqli_query($connection,$q36)){

                       					$q37 = "DELETE  FROM reg_table WHERE reg_id = ".$delete_user_id;

                       					if(mysqli_query($connection,$q37)){
                       
                       		 				header("refresh:0; url = admin_home.php");
                       		 			}

                       		 		}
                       		 	}
                       		}
                       	}
                    }
                }
                 else{
                    header("refresh:0; url = remainder.php");
                
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
	<br><br>
</div>
</body>
</html>