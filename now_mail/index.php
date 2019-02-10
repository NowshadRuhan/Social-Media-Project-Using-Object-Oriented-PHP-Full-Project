<!DOCTYPE html>
<html>
	<head>
		<title>Send an Email on Form Submission using PHP with PHPMailer</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<br />

<?php
		session_start();

           // $U_id = $_SESSION['r_id'];

              $server_name = "localhost";
              $user_name = "root";
              $server_password = "";

              $db_name = "calendar";

              error_reporting(0);//for error don't show

              $connection = mysqli_connect($server_name, $user_name, $server_password, $db_name);


            




             

            $q111 =  "SELECT reg_table.reg_id,reg_table.user_email,remainder_table.remainder_title,remainder_table.remainder_description, remainder_table.remainder_date, remainder_table.remainder_time FROM reg_table INNER JOIN remainder_table ON reg_table.reg_id=remainder_table.reg_id ORDER BY remainder_table.remainder_time ASC";

            $data1 = mysqli_query($connection, $q111);
            

            	$todaydate = date("Y-m-d"); 
				$LocalTime = strtotime('+5 hours');
  				$todaytime = date('H:i:s', $LocalTime);	
  				header("Refresh: 3; url=index.php");

  			$a = 0;
            while($result4 = mysqli_fetch_assoc($data1)){

            	
            	$num_date[] = $result4['remainder_time']; 
  				
  				

            	if(($todaydate == $result4['remainder_date']) & ($todaytime >= $result4['remainder_time']))	
            	{
            		
            		
            		$time = $num_date[$a];

            		emailDone($time);
            		//echo $time."<br>";
            		
            		$last = $result4['remainder_time'];
            		
            		$a++;
            		}else{
            			 echo   "not done";
            		}

            
          }
          
          

          

          function emailDone($time){

          	$server_name = "localhost";
              $user_name = "root";
              $server_password = "";

              $db_name = "calendar";

              error_reporting(0);//for error don't show

              $connection = mysqli_connect($server_name, $user_name, $server_password, $db_name);
          	//$time2 = $time;
          	//echo $time2."<br>";

          	$time2 = "'".$time."'";

          	$q0 = "SELECT * FROM remainder_table where remainder_time = ".$time2;
          	$data0 = mysqli_query($connection, $q0);
          	//echo $data0;
          	$result5 = mysqli_fetch_assoc($data0);


          	$id = $result5['reg_id'];
          	$emailTitle = $result5['remainder_title'];
          	$emaildescription = $result5['remainder_description'];

          	$q9 = "SELECT user_email FROM reg_table where reg_id = ".$id;
          	$data9 = mysqli_query($connection, $q9);
          	
          	$result6 = mysqli_fetch_assoc($data9);

          	$us_mail = $result6['user_email'];



          	if(mail($us_mail, $emailTitle, $emaildescription)){
				echo "Mail sent";
			}else{
				echo "not sent you";
			}
          }

?>


		<div class="container">
			<div class="row">
				<div class="col-md-8" style="margin:0 auto; float:none;">
					<h3 align="center">Send an Email on Form Submission using PHP with PHPMailer</h3>
					<br />
					
					<form method="post">
						<div class="form-group">
							<label>To</label>
							<input type="text" name="TOO" placeholder="Enter Name" class="form-control"  />
						</div>
						
						<div class="form-group">
							<label> Subject</label>
							<input type="text" name="subject" class="form-control" placeholder="Enter Subject" value="" />
						</div>
						<div class="form-group">
							<label> Message</label>
							<textarea name="message" class="form-control" placeholder="Enter Message"></textarea>
						</div>
						<div class="form-group" align="center">
							<input type="submit" name="submit" value="Submit" class="btn btn-info" />
						</div>
					</form>

					<?php

						$date = date('Y/m/d H:i:s');
						$LocalTime1 = strtotime('+5 hours');
  						$date1 = date('H:i:s', $LocalTime1);


						echo "<h1 align=center>".$date."</h1><br>";
						echo "<h1 align=center>".$date1."</h1>";


						

					?>
				</div>
			</div>
		</div>
	</body>
</html>

<!-- <?php
	
	// if(isset($_POST['submit'])){
	// 	if(mail($_POST['TOO'], $_POST['subject'], $_POST['message'])){
	// 		echo "Mail sent";
	// 	}else{
	// 		echo "not sent you";
	// 	}
	// }


?> -->