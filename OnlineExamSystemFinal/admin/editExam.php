<?php	

require("../dbConnection.php");
session_start();

if (!isset($_SESSION['user'])) {
	header('Location: index.php');
}
$_SESSION['id']= $_GET['id'];
$sql=mysqli_query($conn, "select * from exam_category where id =$_SESSION[id]");
	
	while($row=mysqli_fetch_array($sql)) {
	$exam_category=$row["category"];
	$exam_time= $row["exam_time_in_seconds"];
	$exam_per= $row["exam_per"];
	}
// Get Questions Record
	$res=mysqli_query($conn, "select * from questions where category ='$exam_category'") or die('fail ques');
	while($row1=mysqli_fetch_array($res)) {
		$questionCate = $row1['category'];
	}
	if (isset($_POST["submit1"])) {
		$examname = htmlspecialchars($_POST['examname']);
		$examtime = htmlspecialchars($_POST['examtime']);
		$examper = htmlspecialchars($_POST['examper']);
	
		if (!empty($examname) && !empty($examtime) && !empty($examper)  ) {
			$Result=mysqli_query($conn, "select * from exam_results where tName='$exam_category' ") or die('fail res');
		while($row3= mysqli_fetch_array($Result)) {
			$resName = $row3['tName'];
		}
		mysqli_query($conn, "update exam_results set tName='$examname' where tName='$resName'") or die('fail');
		mysqli_query($conn, "UPDATE questions SET category='$examname' WHERE category='$questionCate'") or die('fail');	
		mysqli_query($conn, "UPDATE exam_category SET category='$examname', exam_time_in_seconds='$examtime', exam_per='$examper' WHERE id=$_SESSION[id]");
		//if(!$val) {echo "<script> alert('Exam Already Exists, choose another exam name!')</script>";}
			header("Location: exam.php");
		}
		else {
			echo "<script> alert('All fields must be filled!') </script>";
		}
	}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="../assets/css/fontastic.css">
    <!-- Google fonts - Poppins -->
   <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700"> -->
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="../assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="../assets/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../img/favicon.ico">
     <!-- Links -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
	    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/inactivity.js"></script>
	  <link href="../style.css" rel="stylesheet">
  </head>
  <body id="myBody" onload="my()">
    <div class="page ">
      <!-- Main Navbar-->
      <header class="header ">
        <nav class="navbar bg-primary">
          <div class="container-fluid ">
            <div class="navbar-holder d-flex align-items-center  justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="home.php" class="navbar-brand d-none d-sm-inline-block">
                  <div class="brand-text d-none d-lg-inline-block"><strong>Online Exam System</strong></div>
                  <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>BD</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">             
              <i class="bg-primary fa fa-sign-out"> </i>
                <!-- Logout   -->
            <a href="logout.php" class="btn btn-danger  btn-md"> Logout <span class="fa fa-lock"> </span> </a>
			</ul>
            </div>
          </div>
        </nav>
      </header>
		<div class="page-content d-flex align-items-stretch"> 
			<!-- Side Navbar -->
			<nav class="side-navbar" style="background:#eef3fa;">
			<!-- Sidebar Header-->  
			<center >  <img src="../logo.png" alt="..." class="img-fluid  p-1  mt-3 " width="180" ></center>      
			<!-- Sidebar Navidation Menus--><span class="heading">Main</span>
			  <ul class="list-unstyled" >
				  <li><a href="home.php"> <i class="fa fa-home"></i>Home </a></li>
				  <li class="active"><a href="exam.php"> <i class="fa fa-book-open"></i>Manage Exams </a></li>	
				  <li><a href="students.php"> <i class="fa fa-users"></i>Manage Students </a></li>	
				  <li><a href="results.php"> <i class="fa fa-poll"></i>Manage Results </a></li>	
				  <li><a href="contact.php"> <i class="fa fa-edit"></i>Manage Inquires </a></li>	
				  <li><a href="logout.php"> <i class="fa fa-lock"></i>Logout </a></li>	
			</nav>
			<div class="content-inner">
			<!-- Page Header-->
				<header class="page-header bg-success">  
					<h3 class="no-margin-bottom text-white text-center"><b>Update Exam </b> </h3>
				</header>
          <!-- Dashboard Counts Section-->
				<section class="dashboard-header container-fluid p-3 m-0"  style="background: white;">
					<div class="row ">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<form name="form1"  method="POST"> 
								<h5> Updated Exam Category </h5> 
								<input type="text" placeholder="Add Exam Category" class="form-control" name="examname" value="<?php echo $exam_category; ?>"/>
								<h5> Exam Question Time Seconds </h5> 
								<input type="number" min="1" placeholder="Exam Question Time Seconds" class="form-control" name="examtime" value="<?php echo $exam_time;?>"/>
								<h5> Exam Passing Percentage </h5> 
								<input type="number" min="1" placeholder="Exam Passing Percentage e.g: 50" class="form-control" name="examper" value="<?php echo $exam_per;?>"/>
								<input type="submit" class="btn btn-success form-control " value="Update Exam" name="submit1" style="margin-bottom:10px;"/>
								<a href="exam.php" class="btn btn-warning form-control "> Go Back to Exam</a>
							</form>
						</div>
					</div>
						<br>
				</section>
			   <!-- Page Footer-->
			  <footer class="main-footer">
				<div class="container-fluid">
				  <div class="row">
					<div class="col-sm-6">
					  <p>© Copyright Ahmed Omari, All Rights Reserved 2021</p>
					</div>
					<div class="col-sm-6 text-right">
					  <p>Developed by <a href="#" class="external"><b>Ahmed Omari</b></a></p>
					  
					</div>
				  </div>
				</div>
			  </footer>
			</div>
      </div>
    </div>
		<!-- JavaScript files-->
		<script src="../assets/vendor/jquery/jquery.min.js"></script>
		<script src="../assets/vendor/popper.js/umd/popper.min.js"> </script>
		<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="../assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
		<script src="../assets/vendor/chart.js/Chart.min.js"></script>
		<script src="../assets/vendor/jquery-validation/jquery.validate.min.js"></script>
		<script src="../assets/js/charts-home.js"></script>
		<!-- Main File-->
		<script src="../assets/js/front.js"></script>
  </body>
</html>