<!DOCTYPE html>
<html lang="en">
<?php
              
  session_start();

  $U_id = $_SESSION['r_id'];
  $note_id =  $_SESSION['note_id'];

  $server_name = "localhost";
  $user_name = "root";
  $server_password = "";

  $db_name = "calendar";

  error_reporting(0);//for error don't show

  $connection = mysqli_connect($server_name, $user_name, $server_password, $db_name);

  $q24 =  "SELECT * FROM note_table WHERE reg_id = $U_id AND note_id = $note_id";

  $data10 = mysqli_query($connection, $q24);

  $result20 = mysqli_fetch_assoc($data10);

  $note_title = $result20[note_title];

  $note_description = $result20[note_text];


  if(isset($_POST['edit_to_back']))///edit to back item segment
  {
        header("refresh:2; url = Add_note.php");
  }


  if(isset($_POST['edit_note_ADD']))///edit and update item segment
  {

      $useID = $_SESSION['r_id'];
      $note_e_title =  $_POST['edit_note_title'];
      $note_e_description =  $_POST['edit_n_description'];

      if($note_e_title != '' && $note_e_description != ''){

        $q25 =  "UPDATE note_table SET note_title = '$note_e_title', note_text = '$note_e_description' 
          WHERE  note_id = '$note_id' AND  reg_id = '$useID';";

          if(mysqli_query($connection, $q25)){
              header("refresh:2; url = Add_note.php");
          }
         
      }
  }
?>



<head>
	<meta charset="UTF-8">
	<title>Edit Note</title>
	
<style type="text/css">

body {    
  background-size:cover;
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

hr{
   background: white;  
}

.contact-form{
       flex: 3;
      background:rgba(0,0,0, .6);
      color:white;
      margin-top: 100px;
      margin-left: 20px;
      padding: 20px;
      margin-right:  20px;
      box-shadow: 0px 0px 10px 3px grey;
}
#input_group{
  resize: vertical;
  top:10px;
  width: 400px;
  height: 35px;
  font-size: 18px;
  border-radius: 8px;
}

#input_group1{
  resize: vertical;
  border-radius: 8px;
  font-size: 18px;
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

#footer{
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





<div class="main_div">

    <div class="container contact-form" height="100%">
    	<h1 align="center">Edit Your Note</h1>
      <hr>
      <form class="note_add" action="" method="post">
       
        <div class="st_div">
                <label>Note Title</label><br><br>
                <input type="text" name="edit_note_title" id="input_group" value="<?php echo $note_title; ?>" required="required">

        </div>
        <br>
        <div class="nd_div">
                <label>Note Description</label><br><br>
                <textarea name="edit_n_description" id="input_group1"   cols="60" rows="5" wrap="soft"><?php echo $note_description; ?></textarea>
                
        </div><br><br>
        <div class="rd_div">
                <br><br>
                <button id="submit_btn" type="submit" name="edit_note_ADD" class="btn">Submit</button>
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
