<?php 

session_start();
 if (!isset ($_SESSION['username']))  {
 header ("Location: index.php"); }
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Links -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/all.min.css">
			<script src="assets/js/jquery.min.js"></script
			<script src="assets/js/popper.min.js"></script>
			<script src="assets/js/bootstrap.min.js"></script>
		<!--  -->
		  <link href="style.css" rel="stylesheet">
	</head>
	<body > <br>
		<div class="container" >  	
			<a href="index.php" style="text-decoration: none; color: black;"> <img src="logo.png" width="40" /> Online Quiz System </a>	
			<!-- <a style="float: right;" class="btn btn-link" href="logout.php">  Logout </a>  -->
			<center > <span  style="font-size: 3em; font-weight: bold; padding: 25px; text-decoration: underline; color: red; font-style: italic;"> OOPS..!</span> </center>
			 <br> 
			<div class="jumbotron bg-dark ">
					<h1 class="text-center text-white" > <B> Sorry! <span class="text-danger"> Exam </span> Is Not Available <B> </h1>  <br>
					<marquee direction="" scrollamount="5" >	<h3 class=" text-white"> Exams are disabled , contact your Educator/Adminstrator </h3> </marquee>
				<br> <br> <br>
				<form method="POST" action="logout.php">
					<center> 
						<input type="submit" class="btn btn-warning" value= "Logout"  style="font-size:1.5em; font-weight: bold;" /> <br>
					</center>
				</form>
			</div>
		</div>
    <?php include "footer.php";?>
  </body>
 </html>