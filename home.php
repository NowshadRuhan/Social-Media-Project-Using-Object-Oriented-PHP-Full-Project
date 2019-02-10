<!DOCTYPE html>
<?php
        session_start();

?>
<html>
<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="stylesheet" href="mybr/fontawesome-free-5.5.0-web/css/all.css">
 	<link rel="stylesheet" href="css/bt.css">
 	<link rel = "stylesheet" type = "text/css" href = "css/index_for.css" />

</head>
<body>
<div class="full_body" >
<div class="topnav" id="myTopnav">

	<a href="home.php">Home</a>
	<a href="schedule.php">Schedule</a>	
    <a href="about1.php">About</a>
	<!---<a href="registration.php">Registration</a> 
	<a href="signin.php">SignIn</a>--->
	<a href="index.php">Logout</a>
	
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>


    
<div class="firstDiv" style="max-width:100%">

	<?php echo "<h1  class=intoText align=center id=demo>Welcome ".$_SESSION['name']." !!</h1><br>"; ?>
	<h2 class="intoText" align="center" id="demo1"></h2>
	<h3 class="intoText" align="center" id="demo2"></h3>
</div>


    

<script>
var i = 17;
var j = 0;
var k = 0;
var txt1 = "This is the site about Personal Calander .";
var txt2 = "Using this site a person can remember his/her daily-task, some speecial date, meeting & event .";
var speed = 100;
var speed1 = 200;
var speed1 = 200;
function typeWriter() {

 
  if(i==17){
      if (j < txt1.length) {
        document.getElementById("demo1").innerHTML += txt1.charAt(j);
        j++;
        setTimeout(typeWriter, speed1);
      }
    }
    if(j==42){
        if (k < txt2.length) {
        document.getElementById("demo2").innerHTML += txt2.charAt(k);
        k++;
        setTimeout(typeWriter, speed1);
      }
    }
}
window.onload=typeWriter ;
</script>








<div class="container col-sm-4 col-md-7 col-lg-4 mt-5">
    <div class="card">
        <h3 class="card-header" id="monthAndYear"></h3>
        <table class="table table-bordered table-responsive-sm"  onclick="openForm()" id="calendar">
            <thead>
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>
            </thead>

            <tbody id="calendar-body">

            </tbody>
        </table>

        <div class="form-inline">

            <button class="btn btn-outline-primary col-sm-6" id="previous" onclick="previous()">Previous</button>

            <button class="btn btn-outline-primary col-sm-6" id="next" onclick="next()">Next</button>
        </div>
        <br/>
        <form class="form-inline">
            <label class="lead mr-2 ml-2" for="month">Jump To: </label>
            <select class="form-control col-sm-4" name="month" id="month" onchange="jump()">
                <option value=0>Jan</option>
                <option value=1>Feb</option>
                <option value=2>Mar</option>
                <option value=3>Apr</option>
                <option value=4>May</option>
                <option value=5>Jun</option>
                <option value=6>Jul</option>
                <option value=7>Aug</option>
                <option value=8>Sep</option>
                <option value=9>Oct</option>
                <option value=10>Nov</option>
                <option value=11>Dec</option>
            </select>


            <label for="year"></label><select class="form-control col-sm-4" name="year" id="year" onchange="jump()">
            <option value=1990>1990</option>
            <option value=1991>1991</option>
            <option value=1992>1992</option>
            <option value=1993>1993</option>
            <option value=1994>1994</option>
            <option value=1995>1995</option>
            <option value=1996>1996</option>
            <option value=1997>1997</option>
            <option value=1998>1998</option>
            <option value=1999>1999</option>
            <option value=2000>2000</option>
            <option value=2001>2001</option>
            <option value=2002>2002</option>
            <option value=2003>2003</option>
            <option value=2004>2004</option>
            <option value=2005>2005</option>
            <option value=2006>2006</option>
            <option value=2007>2007</option>
            <option value=2008>2008</option>
            <option value=2009>2009</option>
            <option value=2010>2010</option>
            <option value=2011>2011</option>
            <option value=2012>2012</option>
            <option value=2013>2013</option>
            <option value=2014>2014</option>
            <option value=2015>2015</option>
            <option value=2016>2016</option>
            <option value=2017>2017</option>
            <option value=2018>2018</option>
            <option value=2019>2019</option>
            <option value=2020>2020</option>
            <option value=2021>2021</option>
            <option value=2022>2022</option>
            <option value=2023>2023</option>
            <option value=2024>2024</option>
            <option value=2025>2025</option>
            <option value=2026>2026</option>
            <option value=2027>2027</option>
            <option value=2028>2028</option>
            <option value=2029>2029</option>
            <option value=2030>2030</option>
        </select></form>
    </div>
</div>









	 


<div class="form-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h1 >Scheduling</h1>

    
    <b><input type="submit" formaction="Add_note.php" class="add_note" value="Add Note"></b>
    
    <b><input type="submit" formaction="add_event.php" class="add_event" value="Add Event"></b>

	<b><input type="submit" formaction="remainder.php" class="add_remainder" value="Remaider"></b>

 	<b><input type="submit" formaction="Add_task.php" class="add_daily_task" value="Daily Task"></b>
   
    <button type="button" action="" class="btn cancel" onclick="closeForm()"><b>CLOSE</b></button>
  </form>
</div>






<br><br>
<br><br>
    <hr>

<div class="footer">
	<br><br>
	<p align="center">Develop by @ Rocksar Sultana Smriti</p>
	<p align="center">Email : smriti.neub@gmail.com</p>
	<br><br><br>
</div>

 
 
 </div>


<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>

 <script>  
 
 <!--- manu bars java script --->
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>




<script src="scripts.js"></script>

</body>
</html>
