<?php
session_start();
require("dbConnection.php");
	if (isset($_POST['login'])) {
		if(!empty($_POST["username"]) AND !empty($_POST["password"])) { 
			$username =  htmlspecialchars( mysqli_real_escape_string($conn,$_POST['username']));
			//$password =  htmlspecialchars( mysqli_real_escape_string($conn,$_POST['password']));		
			$passwordFinal =  md5($_POST['password']);
			$captcha =	 htmlspecialchars($_POST['captcha']);	
		
				// For  checking enrollment of student
			$test = mysqli_query($conn,"select * from registration  where username='$username' ") or die('bug'); 
			while($row1=mysqli_fetch_array($test)) {
				$enroll = $row1['enroll'];	
			}	
				/// For Validation of students credentials and eligibility 
			$sql= mysqli_query($conn, "select * from registration");
				while($row=mysqli_fetch_array($sql)) {
					if($row['username']==$username AND $row['password']==$passwordFinal ) {
						
						
						if ( $enroll == '1') { 
   if ($captcha == $_SESSION['captcha']) {
						
							$_SESSION["username"]= htmlspecialchars($_POST["username"]);	
							$_SESSION["studentFirstName"]=$row['firstname'];
							$_SESSION["studentLastName"]=$row['lastname'];
							$_SESSION["studentPassport"]=$row['passport'];				
							header("Location: instruction.php");
							
   }
   else {	 
   $msg = "Please enter a valid captcha!";
   }
						}
					elseif($enroll == '0' ) { 
						$_SESSION["username"]= htmlspecialchars($_POST["username"]);
						header("Location: error.php");
					}
					}
					else {
						$msg = "Incorrect Username or Password.";
					}
				}		
		}
		else{
			$msg = "Username or Password are blank.";
		}
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Online Exam System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="assets/css/fontastic.css">
    <!-- Google fonts - Poppins -->
   <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700"> -->
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- Favicon-->
     <!-- Links -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
	    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	  <link href="style.css" rel="stylesheet">
  </head>
  <body>
    <div class="container p-5 ">
		<div class="row justify-content-center shadow p ">
			<div class="col-md-6 border-right">
				<h2 class="text-center text-danger p-4"> <b> Online Exam System </b></h2> 
				<center> <img src="logo.png" style="width:65%;" /> </center>
			</div>
			<div class="col-md-6 ">
				<h2 class="bg-success p-4 text-white text-center " style="border-radius: 0px 0px 100px 100px;" > Student Panel</h2> 
				<br>
				<form method="POST" action="index2.php" class="p-5 shadow mb-5 " style="border-radius:50px;">
					<h2 class="text-center text-danger	"> <b> Student Login </b></h2> <br>
					<input type="text" placeholder="Username" class="form-control p-3" name="username" />
					
					<input type="password" placeholder="Password" class="form-control p-3"  name="password"/>
						<input type="text" class="form-control" placeholder="Captcha" name="captcha" />
					<a href="" style="margin-bottom:10px;"><img src="captcha.php" style="border-radius: 20px;"></a>
					
					<input type="submit" value="Login" name="login" class="btn btn-primary  form-control"/>
					<a href="index.php" class="btn btn-warning  form-control"> Go Back</a>
					<?php 
					 if (!isset($msg)) {
						echo "<script> document.getElementById('box').style.display = 'none' </script> ";
					 }
					 else {
						echo "<script> document.getElementById('box').style.display = 'block' </script> ";
					 }
					 if (isset($msg)) {
					 ?>					
					 <div class="alert alert-danger mt-2" id='box'" ><i class="fa fa-exclamation-triangle" aria-hidden="true" style="font-size:1.2em;"></i> <strong> Warning! <?php echo $msg;}?> </strong></div>
				</form> <br>
			</div>
		</div>
	</div>
	  <?php include "footer.php";?>
  </body>
</html>