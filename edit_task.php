<!Doctype html>
<html lang="en">

<?php
              
  session_start();

  $U_id = $_SESSION['r_id'];
  $task_id =   $_SESSION['task_id'];

  $server_name = "localhost";
  $user_name = "root";
  $server_password = "";

  $db_name = "calendar";

  error_reporting(0);//for error don't show

  $connection = mysqli_connect($server_name, $user_name, $server_password, $db_name);

  $q26 =  "SELECT * FROM  daily_tasks_table WHERE reg_id = $U_id AND tasks_id = $task_id";

  $data11 = mysqli_query($connection, $q26);

  $result22 = mysqli_fetch_assoc($data11);

  $tasks_title = $result22[tasks_title];
  $tasks_date = $result22[tasks_date];
  $tasks_time = $result22[tasks_time];
  $tasks_note = $result22[tasks_note];


  if(isset($_POST['edit_to_back']))///edit to back item segment
  {
        header("refresh:0; url = Add_task.php");
  }


  if(isset($_POST['edit_task_add']))///edit and update item segment
  {

      $useID = $_SESSION['r_id'];
      $tasks_title1 =  $_POST['edit_task_title'];
      $tasks_date1 =  $_POST['edit_task_date'];
      $tasks_time1 =  $_POST['edit_task_time'];
      $tasks_note1 =  $_POST['edit_task_note'];

      if($tasks_title1 != '' && $tasks_date1 != '' && $tasks_time1 != '' && $tasks_note1 != ''){

        $q25 =  "UPDATE daily_tasks_table SET tasks_title = '$tasks_title1', tasks_date = '$tasks_date1', tasks_time = '$tasks_time1', tasks_note = '$tasks_note1' 
          WHERE  tasks_id = '$task_id' AND  reg_id = '$useID';";

          if(mysqli_query($connection, $q25)){
              header("refresh:0; url = Add_task.php");
          }else{
              header("refresh:0; url = edit_task.php");
          }
         
      }
  }
?>



<head>
  <meta charset="utf-8">
 <style type="text/css">

body {
      
  background-color:#2E8B57; 
  margin: 0px 0px 0px 0px;
  font-family: Arial, Helvetica, sans-serif;
}
.full_body{
  margin-bottom:0px;
  margin-left: 0px;
  margin-right: 0px;
  margin-top: 0px;
}
.contact-form1{
      flex: 3;
      background:rgba(0,0,0, .6);
      color:white;
      padding: 20px;
      display: flex;
      box-shadow: 0px 0px 10px 3px grey;
}

hr{
   background: white;  
}

.contact-form{
      flex: 3;
      background:rgba(0,0,0, .6);
      color:white;
      margin-top: 20px;
      margin-right: 20px;
      padding: 20px;    
      box-shadow: 0px 0px 10px 3px grey;
}
.show_all_task{
  flex: 3;
  text-align: center;
  margin-left: 20px;
  margin-top: 30px;
}

#input-group{

 resize: vertical;
  top:10px;
  width: 400px;
  height: 35px;
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
  padding: 10px;
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





<div class="container contact-form1">
	

	<div class="container contact-form" height="100%">
		<h1 align="Center" >Edit Your Daily task</h1>
		<hr>

		    <form id="contactform" action="" method="post"> 

		    	<div class="st_div">
		    		<p class="contact"><label for="name">Task Title</label></p> 
		    		<input type="text" id="input-group" name="edit_task_title" value="<?php echo $tasks_title; ?>"  required ="required"> 
				</div>

				<div class="nd_div">	
		    		<p class="contact"><label for="email">Task Date</label></p> 
		    		<input type="Date" id="input-group" name="edit_task_date" value="<?php echo $tasks_date; ?>" required ="required" > <br><br>
		    	</div>

		    	<div class="nd_div">	
		    		<p class="contact"><label for="email">Task Time</label></p> 
		    		<input type="time" id="input-group" name="edit_task_time" value="<?php echo $tasks_time; ?>" required ="required" > <br><br>

		    	</div>

		    	<div class="nd_div">	
		    		<p class="contact"><label for="email">Task Note</label></p> 
		    		<input type="text" id="input-group" name="edit_task_note" value="<?php echo $tasks_note; ?>" required ="required" > <br><br>

		    	</div>
		    	<div class="rd_div">
		           <button id="submit_btn" type="submit" name="edit_task_add" class="btn"><b>SUBMIT</b></button>
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
