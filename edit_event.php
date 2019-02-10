<!Doctype html>
<html lang="en">
<?php
              
  session_start();

  $U_id = $_SESSION['r_id'];
  $event_id = $_SESSION['event_id'];

  $server_name = "localhost";
  $user_name = "root";
  $server_password = "";

  $db_name = "calendar";

  error_reporting(0);//for error don't show

  $connection = mysqli_connect($server_name, $user_name, $server_password, $db_name);

  $q27 =  "SELECT * FROM  add_event_table WHERE reg_id = $U_id AND event_id = $event_id";

  $data12 = mysqli_query($connection, $q27);

  $result23 = mysqli_fetch_assoc($data12);

  $event_title = $result23[event_title];
  $start_date = $result23[start_date];
  $ending_date = $result23[ending_date];
  $event_time = $result23[event_time];
  $location = $result23[location];
  $event_description = $result23[event_description];


  if(isset($_POST['edit_to_back']))///edit to back item segment
  {
        header("refresh:0; url = add_event.php");
  }


  if(isset($_POST['edit_event_ADD']))///edit and update item segment
  {

      $useID = $_SESSION['r_id'];
      $event_title1 =  $_POST['edit_event_title'];
      $start_date1 =  $_POST['edit_event_date'];
      $ending_date1 =  $_POST['edit_end_date'];
      $event_time1 =  $_POST['edit_event_time'];
      $location1 =  $_POST['edit_event_lacation'];
      $event_description1 =  $_POST['edit_e_description'];

      if($event_title1 != '' && $start_date1 != '' && $ending_date1 != '' && $event_time1 != '' && $location1 != '' && $event_description1 != ''){

        $q28 =  "UPDATE add_event_table SET event_title = '$event_title1', start_date = '$start_date1', ending_date = '$ending_date1', event_time = '$event_time1', location = '$location1',event_description = '$event_description1' WHERE event_id = '$event_id' AND  reg_id = '$useID';";

          if(mysqli_query($connection, $q28)){
              header("refresh:0; url = add_event.php");
          }else{
              header("refresh:0; url = edit_event.php");
          }
         
      }
  }
?>

<head>
  <meta charset="utf-8">
	


 <style type="text/css">
   
body {

  background-color:#2E8B57;      
  margin: 0px;
  font-family: Arial, Helvetica, sans-serif;
}
.full_body{
  margin-bottom:0px;
  margin-left: 0px;
  margin-right: 0px;
  margin-top: 0px;
}
.main_div_event{
  display: flex;
  width: 100%;
}
hr{
   background: white;  
}

.contact-form{
    flex: 2;
    background:rgba(0,0,0, .6);
    color:white;
    margin-top: 10px;
    margin-left: 20px;
    margin-right: 20px;
    padding: 20px;      
    box-shadow: 0px 0px 10px 3px grey;
}
#input_group{
  resize: vertical;
  top:10px;
  width: 400px;
  height: 35px;
  font-size: 16px;
  border-radius: 8px;
}
#input_group1{
  resize: vertical;
  font-size: 16px;
  border-radius: 8px;
}
.st_div{
  width: 100%;
  height: 100px;
}
.nd_div{
  width: 100%;
  height: 100px;
}
.rd_div{
  width: 100%;
  height: 100px;
}
#submit_btn{
  padding: 15px;
  text-align: center;
  border-radius: 8px;
  background-color: lightblue;
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

</head>


<body>


<div class="main_div_event">

    <div class="container contact-form" height="100%">
      <h1>Edit Your Event</h1>
      <hr>
      <form class="Edit_event_add" action="" method="post">
        
        <div class="st_div">
                <label>Event Title</label><br><br>
                <input type="text" name="edit_event_title" id="input_group" value="<?php echo $event_title;?>" required="required">

        </div>
        <br>
        <div class="st_div">
                <label>Start Date</label><br><br>
                <input type="date" name="edit_event_date" id="input_group" value="<?php echo $start_date;?>" required="required">

        </div>
        <br>
        <div class="st_div">
                <label>End Date</label><br><br>
                <input type="date" name="edit_end_date" id="input_group" value="<?php echo $ending_date;?>" required="required">

        </div>
        <br>
        <div class="st_div">
                <label>Event Time</label><br><br>
                <input type="Time" name="edit_event_time" id="input_group" value="<?php echo $event_time;?>" required="required">

        </div>
        <br>
        <div class="st_div">
                <label>Event Location</label><br><br>
                <input type="text" name="edit_event_lacation" id="input_group" value="<?php echo $location;?>" required="required">

        </div>
        <br>
        <div class="nd_div">
                <label>Event Description</label><br><br>
                <textarea name="edit_e_description" id="input_group1" cols="50" rows="5" wrap="soft"><?php echo $event_description;?></textarea>
                
        </div><br><br>
        <div class="rd_div">
                <br><br>
                <button id="submit_btn" type="submit" name="edit_event_ADD" class="btn">Submit</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <button id="submit_btn" type="submit" name="edit_to_back" class="btn"><b>Back</b></button>
        </div>
      </form>
      
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
