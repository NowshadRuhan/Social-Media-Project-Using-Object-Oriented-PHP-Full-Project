<!DOCTYPE html>
<?php
              
  session_start();

  $U_id = $_SESSION['r_id'];
  $remainder_id =   $_SESSION['remainder_id'];

  $server_name = "localhost";
  $user_name = "root";
  $server_password = "";

  $db_name = "calendar";

  error_reporting(0);//for error don't show

  $connection = mysqli_connect($server_name, $user_name, $server_password, $db_name);

  $q25 =  "SELECT * FROM  remainder_table WHERE reg_id = $U_id AND remainder_id = $remainder_id";

  $data11 = mysqli_query($connection, $q25);

  $result21 = mysqli_fetch_assoc($data11);

  $remainder_title = $result21[remainder_title];
  $remainder_description = $result21[remainder_description];
  $remainder_date = $result21[remainder_date];
  $remainder_time = $result21[remainder_time];


  if(isset($_POST['edit_to_back']))///edit to back item segment
  {
        header("refresh:2; url = remainder.php");
  }


  if(isset($_POST['edit_remainder_button']))///edit and update item segment
  {

      $useID = $_SESSION['r_id'];
      $remainder_title1 =  $_POST['remainder_title'];
      $remainder_description1 =  $_POST['remainder_discription'];
      $remainder_date1 =  $_POST['remainder_date'];
      $remainder_time1 =  $_POST['remainder_time'];

      if($remainder_title1 != '' && $remainder_description1 != '' && $remainder_date1 != '' && $remainder_time1 != ''){

        $q25 =  "UPDATE remainder_table SET remainder_title = '$remainder_title1', remainder_description = '$remainder_description1', remainder_date = '$remainder_date1', remainder_time = '$remainder_time1' 
          WHERE  remainder_id = '$remainder_id' AND  reg_id = '$useID';";

          if(mysqli_query($connection, $q25)){
              header("refresh:0; url = remainder.php");
          }else{
              header("refresh:0; url = edit_remainder.php");
          }
         
      }
  }
?>




<html>
<head>
	<title>Edit Remainder</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	


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
hr{
   background: white;  
}

.contact-form{
       flex: 3;
      background:rgba(0,0,0, .6);
      color:white;
      margin-top: 100px;
      margin-right: 20px;
      padding: 20px;
      margin-left: 20px;
      box-shadow: 0px 0px 10px 3px grey;
}
.show_all_remainder{
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
.th_div{
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

<body class="full_body">




<div class="mainDiv_remainder">

	<div class="container contact-form" height="100%">
		<h1 class="remainder_text">Edit Your Remainder</h1>
	    <hr>
	  <form  class="form_remainder" action="" method="post" align="center">
	    
	    <div class="st_div">
		    <label id="title"><b>Title</b></label><br><br>
		    <input id="input-group" type="text"  name="remainder_title" value="<?php echo $remainder_title ?>" required="required">
		</div>

	    <div class="nd_div">
		    <label id="discripsion"><b>Discripsion</b></label><br><br>
		    <input id="input-group" type="text"  name="remainder_discription" value="<?php echo $remainder_description ?>" required="required">
		</div>

		 <div class="nd_div">
		    <label id="date"><b>Date</b></label><br><br>
		    <input id="input-group" type="date"  name="remainder_date" value="<?php echo $remainder_date ?>" required="required">
		</div>

		<div class="rd_div">
			<label id="time"><b>Time</b></label><br><br>
		    <input id="input-group" type="time"  name="remainder_time" value="<?php echo $remainder_time ?>" required="required">
		</div>

		<div class="th_div">
	    	<button id="submit_btn" type="submit" name="edit_remainder_button" class="btn">Submit</button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button id="submit_btn" type="submit" name="edit_to_back" class="btn">Back</button>
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

