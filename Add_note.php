<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Note</title>
	
	<link rel = "stylesheet" type = "text/css" href = "css/Add_note.css" />
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



<div class="main_div">

    <div class="container contact-form" height="100%">
    	<h1>Add Note</h1>
      <hr>
      <form class="note_add" action="connection.php" method="post">
        
        <div class="st_div">
                <label>Note Title</label><br><br>
                <input type="text" name="note_title" id="input_group" required="required">

        </div>
        <br>
        <div class="nd_div">
                <label>Note Description</label><br><br>
                <textarea name="n_description" id="input_group1"  cols="50" rows="5" wrap="soft"></textarea>
                
        </div><br><br>
        <div class="rd_div">
                <br><br>
                <button id="submit_btn" type="submit" name="note_ADD" class="btn">Submit</button>

        </div>
      </form>
    	

    </div>

    <div class="show_all_note">

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

              echo "<th>Note Title</th>";
              echo "<th>Note Description</th>";
              echo "<th>Select</th>";
              echo "<th>Edit</th>";
              echo "<th>Delete</th>";

              echo "</tr>";

            $q4 =  "SELECT * FROM note_table  WHERE reg_id = $U_id ORDER BY note_id DESC";

            $data1 = mysqli_query($connection, $q4);
  
            echo "<h2><b<u>My Note List</u></b></h2>";
            while($result2 = mysqli_fetch_assoc($data1)){

              ?>
              <form action="" method="post"> 
              <?php
              echo  "<tr align=center height=10>
                   <td>$result2[note_title]</td>
                   <td>$result2[note_text]</td>
                   <td><input type=checkbox name=keyTodelete value=$result2[note_id] required=required> </td>

                   <td><input id=submit_btn type=submit name=edit_note value=Edit class=btn ></td>

                   <td><button id=submit_btn type=submit name=delete_note class=btn>Done</button></td>
                 </tr>";

              ?></form>
              <?php
             }

             echo "</table>";


             if(isset($_POST['delete_note']))///delete note item segment
              {
                $useID = $_SESSION['r_id'];
                $keyNumber =  $_POST['keyTodelete'];

                  

                if($keyNumber != ''){

                       $q5 = "DELETE FROM note_table WHERE note_id = ".$keyNumber;

                    if(mysqli_query($connection,$q5)){

                        header("refresh:2; url = Add_note.php");
                    }
                }
                 else{
                    header("refresh:2; url = Add_note.php");
                
                }
              }///delete note segment close



              if(isset($_POST['edit_note']))///edit note item segment
              {
                $useID = $_SESSION['r_id'];
                $keyNumber =  $_POST['keyTodelete'];

                  

                if($keyNumber != '' && $useID != ''){

                      $_SESSION['note_id'] = $keyNumber;

                      header("refresh:2; url = edit_note.php");
                }
                else{
                    header("refresh:2; url = Add_note.php");
                
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

</body>
</html>
