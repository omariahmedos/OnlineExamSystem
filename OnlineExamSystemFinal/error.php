<?php 
session_start(); if (!isset ($_SESSION['username']))  {	header ("Location: index.php");}
?>
<!DOCTYPE HTML>
<html>
	<head>
		 <title></title>
		   <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Links -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/all.min.css">			<script src="assets/js/jquery.min.js"></script>			<script src="assets/js/popper.min.js"></script>
			<script src="assets/js/bootstrap.min.js"></script>
		<!--  -->
		  <link href="style.css" rel="stylesheet">
	</head>
	<body >  <br>
		<div class="container" >  
			<div class="jumbotron bg-white shadow p-4"> 				<a href="#" style="text-decoration: none; color: black;"> <img src="logo.png" width="40" /> Online Quiz System </a>					<!-- <a style="float: right;" class="btn btn-link" href="logout.php">  Logout </a>   --> <br><br> 				<h2 class="text-center text-warning bg-dark  shadow  p-2  " style="border-radius:50px;" > <B> You Are Not Enrolled for Current Examination! </B></h2>  <br>  				<div class="row">					<div class="col-md-12">						<center>							<img src="locker.gif" width="200" class="img-responsive"/> 						</center> 					</div>					<div class="col-md-12">						<center> <h4 class="bgoutline-dark"> <b class=""> You're currently Logged in as  <span class="text-danger">  <?php echo $_SESSION['username'];?>    </span> </b>   </h4>							<h5 class="text-center text-secondary "> <b>  You are missing out! Ask your Admin or Teacher to Enable you for the Examination. </b> </h5>							<form method="POST" action="logout.php">							<br>							<input type="submit" class="btn btn-success " value= "Logout"  style="font-size:em; font-weight: bold;" /> 						</center>						</form>					</div>				</div>			</div>
		</div>		<?php include "footer.php";?>	</body>
</html>