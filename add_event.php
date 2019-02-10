<!Doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
	<link rel = "stylesheet" type = "text/css" href = "css/add_event.css" />
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


<div class="main_div_event">

    <div class="container contact-form" height="100%">
      <h1>Add Event</h1>
      <hr>
      <form class="event_add" action="connection.php" method="post">
        
        <div class="st_div">
                <label>Event Title</label><br><br>
                <input type="text" name="event_title" id="input_group" required="required">

        </div>
        <br>
        <div class="st_div">
                <label>Start Date</label><br><br>
                <input type="date" name="event_date" id="input_group" required="required">

        </div>
        <br>
        <div class="st_div">
                <label>End Date</label><br><br>
                <input type="date" name="end_date" id="input_group" required="required">

        </div>
        <br>
        <div class="st_div">
                <label>Event Time</label><br><br>
                <input type="Time" name="event_time" id="input_group" required="required">

        </div>
        <br>
        <div class="st_div">
                <label>Event Location</label><br><br>
                <input type="text" name="event_lacation" id="input_group" required="required">

        </div>
        <br>
        <div class="nd_div">
                <label>Event Description</label><br><br>
                <textarea name="e_description" id="input_group1"  cols="50" rows="5" wrap="soft"></textarea>
                
        </div><br><br>
        <div class="rd_div">
                <br><br>
                <button id="submit_btn" type="submit" name="event_ADD" class="btn">Submit</button>

        </div>
      </form>
      
    </div>

    <div class="show_all_event">

      <h2><b><u>My Event List</u></b></h2>
      <div class="my_event_list" style="overflow:scroll;">
       <?php ///my created event start///////////
              
            session_start();

            $U_id = $_SESSION['r_id'];

              $server_name = "localhost";
              $user_name = "root";
              $server_password = "";

              $db_name = "calendar";

              error_reporting(0);//for error don't show

              $connection = mysqli_connect($server_name, $user_name, $server_password, $db_name);
             echo "<table align=center border=2 width=950  id=table_note style=overflow:scroll;>";
             echo "<tr height=50 >";

              echo "<th>Event</th>";
              echo "<th>Event Description</th>";
              echo "<th>Select</th>";
              echo "<th>Edit</th>";
              echo "<th>Delete</th>";

              echo "</tr>";

            $q7 =  "SELECT * FROM add_event_table WHERE reg_id = $U_id ORDER BY event_id DESC";

            $data2 = mysqli_query($connection, $q7);
  
            
            while($result3 = mysqli_fetch_assoc($data2)){

              ?>
              <form action="" method="post"> 
              <?php
              echo  "<tr align=center height=10>
                   <td><b>Event Name :</b> $result3[event_title]<br>
                   <b>Event Date :</b> $result3[start_date] <b>Event Time :</b>$result3[event_time]
                   <br><b>End Date :</b>$result3[ending_date] <b>Event Location :</b>$result3[location]</td>
                   <td>$result3[event_description]</td>
                   <td><input type=checkbox name=keyTodelete value=$result3[event_id] required=required> </td>

                   <td><input id=submit_btn type=submit name=event_edit class=btn value=Edit></td>

                   <td><button id=submit_btn type=submit name=delete_event class=btn>Done</button></td>
                 </tr>";

              ?></form>
              <?php
             }

             echo "</table>";///my created event close///////////


            if(isset($_POST['delete_event']))///delete event item segment
            {
                $useID = $_SESSION['r_id'];
                $keyNumber =  $_POST['keyTodelete'];

                if($keyNumber != ''){

                    $q8 = "DELETE FROM add_event_table WHERE event_id = ".$keyNumber;

                    $q81 = "DELETE FROM join_event WHERE event_id = ".$keyNumber;

                    $data81 = mysqli_query($connection, $q81);
                    
                    $total11 = mysqli_num_rows($data81);
              
                   // $result01 = mysqli_fetch_assoc($data81);
                   // echo $total11;

                    if(mysqli_query($connection,$q8) && $total11 != '1'){

                        header("refresh:0; url = add_event.php");
                    }
                }
                 else{
                    header("refresh:0; url = add_event.php");
                
                }
            }///delete event segment close
       



              if(isset($_POST['event_edit']))///edit event item segment
            {
                $useID = $_SESSION['r_id'];
                $keyNumber =  $_POST['keyTodelete'];

                  

                if($keyNumber != ''){

                  $_SESSION['event_id'] = $keyNumber;

                  header("refresh:0; url = edit_event.php");
                }
                 else{
                    header("refresh:0; url = edit_event.php");
                
                }
              }

          ?> 
      </div>
      <hr style="color: lightblue;">
      <h2 class="my_join_ev"><b><u>My Join Event List</u></b></h2>

      <div class="other_event_list" style="overflow:scroll;">
        
          <?php
            //////////////////////////my joined event start///////////
              
            session_start();

            $U_id = $_SESSION['r_id'];

            $server_name = "localhost";
            $user_name = "root";
            $server_password = "";

            $db_name = "calendar";

            error_reporting(0);//for error don't show
            

            $connection = mysqli_connect($server_name, $user_name, $server_password, $db_name);
            echo "<table align=center border=2 width=950  id=table_note style=overflow:scroll;>";
            echo "<tr height=50 >";

            echo "<th>Event</th>";
              echo "<th>Event Description</th>";
              echo "<th>Select</th>";
              echo "<th>Delete</th>";


              echo "</tr>";

            $q21 =  "SELECT * FROM add_event_table INNER JOIN (SELECT event_id FROM join_event WHERE reg_id = $U_id) s on add_event_table.event_id = s.event_id ORDER BY add_event_table.event_id DESC";

            $data21 = mysqli_query($connection, $q21);
  
            
            while($result10 = mysqli_fetch_assoc($data21)){

              ?>
              <form action="" method="post"> 
              <?php
              echo  "<tr align=center height=10>
                   <td><b>Event Name :</b> $result10[event_title]<br>
                   <b>Event Date :</b> $result10[start_date] <b>Event Time :</b>$result10[event_time]
                   <br><b>End Date :</b>$result10[ending_date] <b>Event Location :</b>$result10[location]</td>
                   <td>$result10[event_description]</td>
                   <td><input type=checkbox name=keyTojoinId value=$result10[event_id] required=required> </td>
                   <td><button id=submit_btn type=submit name=delete_event_join class=btn>Done</button></td>
                 </tr>";

              ?></form>
              <?php
             }

             echo "</table>"; //////////////////////////my joined event close///////////


             if(isset($_POST['delete_event_join']))///delete joined event item segment
              {

               // $message = "Do you want to delete this event";
               // echo "<script type='text/javascript'>alert('$message');</script>";

                $useID = $_SESSION['r_id'];
                $keyNumber =  $_POST['keyTojoinId'];

                if($keyNumber != ''){

                    $q23 = "DELETE FROM join_event WHERE event_id = ".$keyNumber." AND reg_id = ".$useID;

                    if(mysqli_query($connection,$q23)){

                        header("refresh:0; url = add_event.php");
                    }
                }
                 else{
                    header("refresh:0; url = add_event.php");
                
                }
              }


          ?> 




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
</script>