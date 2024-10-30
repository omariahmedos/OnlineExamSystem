<?php

require("../dbConnection.php");
session_start();
	if (!isset($_SESSION['user'])) {
		header('Location: index.php');
	}
	$id=$_GET["id"];
	$idl=	htmlspecialchars($_GET["idl"]);
	$qNo='';
	$question='';
	$op1='';
	$op2='';
	$op3='';
	$op4='';
	$answer='';
	$res=mysqli_query ($conn, "select * from questions where id=$id");
	while($row=mysqli_fetch_array($res)) {
		$qNo= $row['question_no'];
		$question= $row['question'];
		$op1= $row['op1'];
		$op2= $row['op2'];
		$op3= $row['op3'];
		$op4= $row['op4'];
		$answer=$row['answer'];	
	}
	if (isset($_POST['submit1'])) {
		 $myqno =		  htmlspecialchars($_POST['qno']);
		 $myquestion =  htmlspecialchars($_POST['question']);
		 $myop1 =		  htmlspecialchars($_POST['op1']);
		 $myop2 = 	  htmlspecialchars($_POST['op2']);
		 $myop3 = 	  htmlspecialchars($_POST['op3']);
		 $myop4 = 	  htmlspecialchars($_POST['op4']);
		 $myanswer = 	  htmlspecialchars($_POST['answer']);
		if (!empty($myqno) && !empty($myquestion) &&  !empty($myop1) &&!empty($myop2) &&!empty($myop3) &&!empty($myop4) &&!empty($myanswer) ) {
			if ($myanswer == $op1 || $myanswer == $op2 || $myanswer ==$op3 || $myanswer == $op4){
				mysqli_query($conn, "update questions set  question_no='$myqno' , question='$myquestion' ,op1='$myop1' ,op2='$myop2', op3='$myop3', op4='$myop4', answer='$myanswer' where id=$id");
				header("Refresh:0; url=questions.php?id=$_GET[id2]");
			}else{
				echo "<script> alert('Answer Must be one of the options') </script>";
				header("Refresh:0; url=questions.php?id=$_GET[id2]");
			}
		}
		else {
			echo "<script> alert('All fields must be filled!') </script>";	
			//header("Location: questions.php?id=$_SESSION[id]");
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
				  <h3 class="no-margin-bottom text-white text-center"><b>Update Question </b> </h3>
				</header>
			  <!-- Dashboard Counts Section-->
			  <section class="dashboard-header container-fluid p-3 m-0"  style="background: white;">
				<div class="row ">
					<div class="col-md-12">
						<form name="form1" method="POST"> 
							<input type="number" min="1" placeholder="Add Question Num" class="form-control" name="qno" value="<?php echo $qNo;?>" />
							<input type="text" placeholder="Add Question" class="form-control" name="question" value="<?php echo $question;?>" />
							<input type="text" placeholder="Option 1" class="form-control" name="op1" value="<?php echo $op1;?>" />
							<input type="text" placeholder="Option 2" class="form-control" name="op2"  value="<?php echo $op2;?>"  />
							<input type="text" placeholder="Option 3" class="form-control" name="op3"  value="<?php echo $op3;?>" />
							<input type="text" placeholder="Option 4" class="form-control" name="op4"  value="<?php echo $op4;?>"  /> 
							<input type="text" placeholder="Answer" class="form-control" name="answer" value="<?php echo $answer;?>" />
							<input type="submit" class="btn btn-success form-control " value="Update Question" name="submit1"/>
							<a href="questions.php?id=<?php echo $_SESSION['id']; ?>" class="btn btn-warning form-control"> Go Back to Questions</a>
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