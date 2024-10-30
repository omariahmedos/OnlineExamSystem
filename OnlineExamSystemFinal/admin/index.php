<?php
session_start();
require("../dbConnection.php");

if(isset($_POST['submit1'])){
	$uname= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['username']));
	$passwd= htmlspecialchars(mysqli_real_escape_string($conn,$_POST['password']));
		$captcha =	 htmlspecialchars($_POST['captcha']);	
	if(!empty($uname) && !empty($passwd)){
		
		 if ($captcha == $_SESSION['captcha']) {
		
		$securePassword =  md5($passwd);
		
		$sql=mysqli_query($conn,"select * from admin")or die ("Admin Database Error");
		while($row=mysqli_fetch_array($sql)){
			if($row['username']==$uname AND $row['password']==$securePassword){
				$_SESSION['user'] = $uname;
				header("Location: home.php");
			}else{
				echo "<script> alert('Please Enter your credentials correctly') </script>";
				header("Refresh:0; url=index.php");
			}
		} 
	}

else {echo "<script> alert('Please enter a valid captcha!') </script>";	}
	} 
	
	
	else{
		echo "<script> alert('All fields must be completed') </script>";	
	}
}
?>

<!DOCTYPE htmli
<html>
<head>
    <title></title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Links -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
	
	    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <!--  -->
	  <link href="../style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
<BR> <BR> 
        <div class="jumbotron"  >
		    <h2 class="text-center"> Admin Login Panel </h2>
		<form name="form" action="index.php" method="POST">
<input type="text" class="form-control" placeholder="Username" name="username"/> 
<input type="password" class="form-control" placeholder="Password" name="password" />
	<input type="text" class="form-control" placeholder="Captcha" name="captcha" />
   <a href="" style="margin-bottom:10px;">     <img src="captcha.php" class="img-responsive"style="border-radius: 20px;"></a>
           
  <button type="submit" class="btn btn-primary form-control" name="submit1" style="margin-top:10px; "> Login </button>
<a href="../index.php" class="btn btn-warning form-control  "style="margin-top:10px; "> Go back</a>
  </center> 
</form>
     </div>
   </div>
<?php include "../footer.php";?>
</body>
</html>