
<?php
    
    session_start();
    
    $server_name = "localhost";
    $user_name = "root";
    $server_password = "";

    $db_name = "calendar";

    error_reporting(0);//for error don't show

    $connection = mysqli_connect($server_name, $user_name, $server_password, $db_name);

    $_SESSION['connected'] = $connection;

    if(isset($_POST['submit'])) /// Registration form segment 
    {
        $name = $_POST['name'];
        $email =  $_POST['email'];
        $CUsername =  $_POST['username'];
        $Cpass =  $_POST['password'];
        $Confpass =  $_POST['repassword'];
        $birth =  $_POST['birthday'];
        $gender =  $_POST['gender'];
        $mobile = $_POST['mobile'];

     //    if($connection){
    	// 	echo "connected"."<br>";
    	// }

	    if($Cpass == $Confpass){

	           $q = "insert into reg_table(name,user_email,user_name,user_password,user_birthday,user_gender,user_mobile) 
	           value('$name','$email','$CUsername','$Confpass',
	           '$birth','$gender','$mobile')";

	        if(mysqli_query($connection,$q)){

	          	header("refresh:0; url = signin.php");
			 }
		}else{
			  	header("refresh:0; url = registration.php");

		}
    }/// Registration form segment close
  




////////////////**********////////////////////////

    if(isset($_POST['login'])) /// login form segment 
    {
        $l_email =  $_POST['l_email'];
        $l_pass =  $_POST['l_password'];
        
        
	    if($l_pass != ''){

	        $q1 = "SELECT * FROM reg_table WHERE user_email = '$l_email' OR user_name = '$l_email' AND user_password = '$l_pass'";

	        $data = mysqli_query($connection, $q1);
                    
            $total = mysqli_num_rows($data);

	        if($total == '1'){

	      //     	if($connection){
    			// 	echo "connected"."<br>";
    			// }
                    
                $result = mysqli_fetch_assoc($data);
                   
                   
                $_SESSION['r_id'] = $result['reg_id'];
                $_SESSION['name'] = $result['name'];
                $_SESSION['u_email'] = $result['user_email'];
                $_SESSION['u_name'] = $result['user_name'];
                $_SESSION['u_gender'] = $result['user_gender'];

            //     echo $total."<br>";
	          	// echo $_SESSION['r_id']."<br>";
	          	// echo $_SESSION['name']."<br>";
	          	// echo $_SESSION['u_email']."<br>";
	          	// echo $_SESSION['u_name']."<br>";
	          	// echo $_SESSION['u_gender']."<br>";

	          
	          	header("refresh:0; url = home.php");

			 }else{
			  	header("refresh:0; url = signin.php");

			}
		}else{
			  	header("refresh:0; url = signin.php");

		}
    }/// login form segment close






    ////////////////**********////////////////////////

    if(isset($_POST['note_ADD'])) /// add- note form segment 
    {
    	$useID = $_SESSION['r_id'];
        $note_title =  $_POST['note_title'];
        $note_description =  $_POST['n_description'];

        

	    if($useID != '' && $note_title != '' && $note_description != ''){

	           $q2 = "insert into note_table(reg_id,note_title,note_text) value('$useID','$note_title','$note_description')";

	        if(mysqli_query($connection,$q2)){

	          	header("refresh:0; url = Add_note.php");
			 }else{
				header("refresh:0; url = Add_note.php");
			}
		}
		else{
			header("refresh:0; url = Add_note.php");
		}
    }/// add- note form segment close
////////////////**********////////////////////////


    if(isset($_POST['event_ADD'])) /// add- event form segment 
    {
    	$useID_event = $_SESSION['r_id'];
        $event_title =  $_POST['event_title'];
        $start_date =  $_POST['event_date'];
        $end_date =  $_POST['end_date'];
        $event_time =  $_POST['event_time'];
        $event_location =  $_POST['event_lacation'];
        $event_description =  $_POST['e_description'];

        

	    if($useID_event != '' && $event_title != '' && $start_date != '' && $end_date != '' && $event_time != ''
	    	&& $event_location != '' && $event_description != ''){

	           $q6 = "insert into add_event_table (event_title,start_date,ending_date,event_time,
	   	location,reg_id,event_description) value('$event_title','$start_date','$end_date','$event_time',
	   	'$event_location','$useID_event','$event_description')";

	        if(mysqli_query($connection,$q6)){

	          	header("refresh:0; url = add_event.php");
			 }else{
				header("refresh:0; url = add_event.php");
			}
		}
		else{
			header("refresh:0; url = add_event.php");
		}
    }/// add- event form segment close
////////////////**********////////////////////////


    if(isset($_POST['remainder_button'])) /// add- remainder form segment 
    {
    	$useID_remainder = $_SESSION['r_id'];
        $remainder_title =  $_POST['remainder_title'];
        $remainder_discription =  $_POST['remainder_discription'];
        $remainder_date =  $_POST['remainder_date'];
        $remainder_time =  $_POST['remainder_time'];

        

	    if($useID_remainder != '' && $remainder_title != '' && $remainder_discription != '' && $remainder_date != '' && $remainder_time != ''){

	           $q9 = "insert into remainder_table(reg_id,remainder_title,remainder_description,
	           remainder_date,remainder_time) value('$useID_remainder','$remainder_title','$remainder_discription',
	           '$remainder_date','$remainder_time')";

	           
	        if(mysqli_query($connection,$q9)){

	          	header("refresh:0; url = remainder.php");
			 }else{
				header("refresh:0; url = remainder.php");
			}
		}
		else{
			header("refresh:0; url = remainder.php");
		}
    }/// add- remainder form segment close

////////////////**********////////////////////////



     if(isset($_POST['task_add'])) /// add- remainder form segment 
    {
    	$useID_task = $_SESSION['r_id'];
        $task_title =  $_POST['task_title'];
        $task_date =  $_POST['task_date'];
        $task_time =  $_POST['task_time'];
        $task_note =  $_POST['task_note'];
        

	    if($useID_task != '' && $task_title != '' && $task_date != '' && $task_time != '' && $task_note != ''){

	           $q12 = "insert into daily_tasks_table(reg_id,tasks_title,tasks_date,
	           tasks_time,tasks_note) value('$useID_task','$task_title','$task_date','$task_time',
	           '$task_note')";

	           
	        if(mysqli_query($connection,$q12)){

	          	header("refresh:0; url = Add_task.php");
			 }else{
				header("refresh:0; url = Add_task.php");
			}
		}
		else{
			header("refresh:0; url = Add_task.php");
		}
    }



     if(isset($_POST['join']))///join other in event item segment
     {
                 $useID = $_SESSION['r_id'];
                 $keyNumber =  $_POST['keyTo'];


                $q16 = "SELECT * FROM join_event  WHERE event_id = ".$keyNumber." AND reg_id = ".$useID;

				$data = mysqli_query($connection, $q16);
                    
            	$total = mysqli_num_rows($data);
             	
                $result9 = mysqli_fetch_assoc($data);

              //  echo $total."<br>";

                $q18 = "SELECT * FROM add_event_table WHERE event_id = ".$keyNumber." AND reg_id = ".$useID;

                $data0 = mysqli_query($connection, $q18);
                    
            	$total0 = mysqli_num_rows($data0);
             	
                $result10 = mysqli_fetch_assoc($data0);

                echo $total0."<br>";
               
                if($total != '1' && $total0 != '1'){
	                // echo $result9['join_id']."</br>";
	                // echo $result9['event_id']."</br>";
	                // echo $result9['reg_id']."</br>";
                	
                	if($keyNumber != ''){

                       $q17 = "insert into join_event(event_id,reg_id) value('$keyNumber','$useID')";

	                    if(mysqli_query($connection,$q17)){

	                       header("refresh:0; url = schedule.php");
	                    }else{
	                    	echo "not done";
	                    }
	                }
	                 else{
	                 	
	                    header("refresh:0; url = schedule.php");
	                
	                }

                }else{
	                 
	                header("refresh:2; url = schedule.php");
	                
	            }		
                       
                   
                    
        }///join other in event item segment



 	 if(isset($_POST['admin_login'])) /// login admin form segment 
    {
        $admin_name =  $_POST['l_email'];
        $admin_pass =  $_POST['l_password'];
        
        
	    if($admin_name != '' && $admin_pass != ''){

	        $q30 = "SELECT * FROM admin_table WHERE ad_user_name = '$admin_name' AND ad_pass = '$admin_pass'";

	        $data30 = mysqli_query($connection, $q30);
                    
            $total30 = mysqli_num_rows($data30);

	        if($total30 == '1'){

	          	if($connection){
    			 	echo "connected"."<br>";
    			}
                    
                $result30 = mysqli_fetch_assoc($data30);
                   
                   
                $_SESSION['ad_id'] = $result30['ad_id'];
                $_SESSION['ad_user_name'] = $result30['ad_user_name'];
                $_SESSION['ad_pass'] = $result30['ad_pass'];

                
                
	          	header("refresh:0; url = admin_home.php");

			 }else{
			  	header("refresh:0; url = signin.php");

			}
		}else{
			  	header("refresh:0; url = signin.php");

		}
    }/// login form segment close
     

       
?>