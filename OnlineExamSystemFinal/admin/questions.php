<?php

require("../dbConnection.php");
session_start();
	if (!isset($_SESSION['user'])) {
		header('Location: index.php');
	}
	$id= $_GET["id"];
	$exam_category='';
	$_SESSION['id']=$id;
	$res= mysqli_query($conn, "Select * from exam_category where id=$id");
		while($row=mysqli_fetch_array($res)) {
			$exam_category= $row['category'];
			$_SESSION['examCate']=$exam_category;
		}
		if (isset($_GET['del'])) {
			if (!isset($_SESSION['user']) && empty($_SESSION['user'])) {	
				unset($_GET['del']);
			}
			else {
				$queryfire= mysqli_query($conn,"delete from questions where id='$_GET[del]'");
					header("Location: questions.php?id=$id");
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
          <!-- Sidebar Navidation Menus-->
				<span class="heading">Main</span>
				  <ul class="list-unstyled" >
				   <li><a href="home.php"> <i class="fa fa-home"></i>Home </a></li>
					  <li class="active"><a href="exam.php"> <i class="fa fa-book-open"></i>Manage Exams </a></li>	
					  <li><a href="students.php"> <i class="fa fa-users"></i>Manage Students </a></li>	
					  <li><a href="results.php"> <i class="fa fa-poll"></i>Manage Results </a></li>	
					  <li><a href="contact.php"> <i class="fa fa-edit"></i>Manage Inquiries </a></li>	
					  <li><a href="logout.php"> <i class="fa fa-lock"></i>Logout </a></li>	   
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
			<header class="page-header bg-success">           
				<h3 class="no-margin-bottom text-white text-center"><b>Manage Questions </b> </h3>       
			</header>
          <!-- Dashboard Counts Section-->       
		<section class="dashboard-header container-fluid p-3 m-0"  style="background: white;">
			<div class="row ">
				<div class="col-xs-12 col-sm-12 col-md-12  col-lg-12  ">
					<h4 class="text-center bg-light " style="  padding:10px; border-radius:25px;"> <?php echo $_SESSION['examCate'];  ?></h4> 
					<form name="form1" method="POST" action="addQuestions.php"> 
						<input type="number" min="1" placeholder="Question No #" class="form-control" name="questionno" />
						<input type="text" placeholder="Add Question" class="form-control" name="question" />
						<input type="text" placeholder="Option 1" class="form-control" name="op1" />
						<input type="text" placeholder="Option 2" class="form-control" name="op2" />
						<input type="text" placeholder="Option 3" class="form-control" name="op3" />
						<input type="text" placeholder="Option 4" class="form-control" name="op4" />
						<input type="text" placeholder="Answer" class="form-control" name="answer" />  
						<input type="submit" class="btn btn-success" value="Add Question" name="submit1"/><br>
						<span style="color: gray;"><b style="color: red;"> Attention:</b> Fill all fields and question no in ordered way. </span>
					</form>
				</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  " style="margin-top:px;">
						<table class="table table-responsive table-bordered   bg-">
							<h4 class="text-center bg-light " style="  padding:10px; border-radius:25px;"> View Questions </h4> 
								<tr > 
									<th  style="width:10%;"> No </th>
									<th  style="width:50%;"> Questions </th>
									<th  style="width:50%;"> Option 1 </th>
									<th  style="width:50%;"> Option 2 </th>
									<th  style="width:50%;"> Option 3 </th>
									<th  style="width:50%;"> Option 4 </th>
									<th  style="width:50%;"> Answer </th>
									<th style="width:50%;"> Edit </th>
									<th  style="width:50%;"> Delete </th>
								</tr>
							<?php
							$res = mysqli_query($conn, "select * from questions where category='$exam_category' ");
								while($row=mysqli_fetch_array($res)) {
									echo "<tr> ";
									echo "<td> "; echo $row['question_no']; echo "</td>";
									echo "<td> "; echo $row['question']; echo "</td>";
									echo "<td> "; echo $row['op1']; echo "</td>";
									echo "<td> "; echo $row['op2']; echo "</td>";
									echo "<td> "; echo $row['op3']; echo "</td>";
									echo "<td> "; echo $row['op4']; echo "</td>";
									echo "<td> "; echo $row['answer']; echo "</td>";
									echo "<td> ";
							?>
							<a href="editQuestions.php?id=<?php echo $row["id"];?>&idl=<?php echo $_SESSION['examCate'];?>&id2=<?php echo $id;?>"class="btn btn-primary form-control"> Edit </a>
							<?php
									echo "</td>";
									echo "<td> ";												
							?>
							<a  href="questions.php?id=<?php echo $id;?>&del=<?php echo $row['id']?>" class="btn btn-danger form-control" onclick="return confirm('Are you sure to Delete ?\n<?php echo "QNo: ". $row['question_no'] . " : ". $row['question']; ?>')"> Delete  </a> 
							<?php
									echo "</td>"; 
									echo "</tr>";
								}
							?>
						</table>
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