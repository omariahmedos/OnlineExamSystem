<?php

require("../dbConnection.php");
session_start();
	if (!isset($_SESSION['user'])) {
		header('Location: index.php');
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
                  <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>OES</strong></div></a>
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
      <div class="page-content d-flex align-items-stretch  "> 
        <!-- Side Navbar -->
        <nav class="side-navbar  " style="background:#eef3fa;">
          <!-- Sidebar Header-->
          <center >  <img src="../logo.png" alt="..." class="img-fluid  p-1  mt-3 " width="180" ></center>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled " >
            <li class="active"><a href="home.php"> <i class="fa fa-home"></i>Home </a></li>
			  <li><a href="exam.php"> <i class="fa fa-book-open"></i>Manage Exams </a></li>	
			  <li><a href="students.php"> <i class="fa fa-users"></i>Manage Students </a></li>	
			  <li><a href="results.php"> <i class="fa fa-poll"></i>Manage Results </a></li>	
			  <li><a href="contact.php"> <i class="fa fa-edit"></i>Manage Inquiries </a></li>	
			  <li><a href="logout.php"> <i class="fa fa-lock"></i>Logout </a></li>	      
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header bg-success">
              <h3 class="no-margin-bottom text-white text-center"><b>Welcome to Admin Panel </b></h3>
          </header>
          <!-- Dashboard Counts Section-->
          <section class="dashboard-header  container-fluid p-3 m-0"  style="background: white;">
			<br>
			<div class="row">
				<div class="col-md-6">  
					<div class="card  " style="background: orange; color:white;"> 
						<div class="card-body">
							<div class="row"> 
								<?php 
									$qryStudent = mysqli_num_rows(mysqli_query($conn, "select * from registration")); 
								?>
								<div class="col-md-8 ">   <h1> <?php echo $qryStudent;?> </h1>  
								<span> <b>Total Students</b></span>
								</div>
								<div class="col-md-4">     <span class="fa fa-users" style="font-size:5em;"> </span>  </div>
							</div>
						</div>
					</div>
				 </div>
				<div class="col-md-6">  
					<div class="card  " style="background: red; color:white;"> 
						<div class="card-body">
							<div class="row"> 
								<?php 
								$qryExams = mysqli_num_rows(mysqli_query($conn, "select * from exam_category")); 
								?>
								<div class="col-md-8 ">   <h1> <?php echo $qryExams;?>  </h1>  
									<span> <b> Total Exams </b></span>    </div>
								<div class="col-md-4">     <span class="fa fa-book-open" style="font-size:5em;"> </span>  </div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">    
					<div class="card  " style="background: green; color:white;"> 
						<div class="card-body">
							<div class="row"> 
								<?php 
								$qryQues = mysqli_num_rows(mysqli_query($conn, "select * from questions")); 
								?>
								<div class="col-md-8 ">   <h1> <?php echo $qryQues;?> </h1>  
									<span> <b>Total Questions </b></span>    </div>
								<div class="col-md-4">     <span class="fa fa-question-circle" style="font-size:5em;"> </span>  </div>
							</div>
						</div>
					</div>
				 </div>
				<div class="col-md-6">    </div>
			</div>
				<br>
				<br>
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