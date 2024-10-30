<?php 
require("../dbConnection.php");
session_start();
	if (!isset($_SESSION['user'])) {
		header('Location: index.php');
	}
	if (isset($_GET['del'])) {
		$del = htmlspecialchars($_GET['del']);
		$queryfire= mysqli_query($conn,"delete from exam_results where studentUsername='$del'");
		
		//even delete student status table
		$query= mysqli_query($conn,"delete from exam_status where activeUser='$del' AND activeExam='$_GET[examCat]' ");
			header("Location: results.php?");
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
			  <li><a href="exam.php"> <i class="fa fa-book-open"></i>Manage Exams </a></li>	
			  <li><a href="students.php"> <i class="fa fa-users"></i>Manage Students </a></li>	
			  <li class="active"><a href="results.php"> <i class="fa fa-poll"></i>Manage Results </a></li>	
			  <li><a href="contact.php"> <i class="fa fa-edit"></i>Manage Inquiries </a></li>	
			  <li><a href="logout.php"> <i class="fa fa-lock"></i>Logout </a></li>	        
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header bg-success">           
              <h3 class="no-margin-bottom text-white text-center"><b>Manage Results </b> </h3>       
          </header>
          <!-- Dashboard Counts Section-->     
          <section class="dashboard-header container-fluid p-3 m-0"  style="background: white;">
			<div class="row "  > 
				<br> 
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 border-left"   > 
					<br>
					<h4 class="text-center bg-light " style="  padding:10px; border-radius:25px;"> View Results</h4> 
					<br> 
					<?php
					$query = mysqli_query($conn,"select * from exam_category ") or die('data error');
					$num=mysqli_num_rows($query);
						if ($num>0) {
							while($row=mysqli_fetch_array($query)) {
								echo "<h5> <a href=results.php?r=".urlencode($row[1] ) . " style='text-decoration: none; '><div class='bg-light ' style='padding:5px; border-radius:15px;'>&nbsp;" .$row[1] ."</div></a> </h5>";
							}
						}?>	
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 border-left"> <br>
					<h4 class="text-center bg-light " style="  padding:10px; border-radius:25px;"> 
						<?php 
							if (isset($_GET['r'])) {
								$_SESSION['selectCate'] = $_GET['r'];
							};							
							if (!empty($_SESSION['selectCate'])) {  echo $_SESSION['selectCate']; } else { echo 'Category' ;}
						?>
					</h4>  
					<?php 
					if(!empty($_SESSION['selectCate'])){		
						echo " <a href='resultPDF.php?r=$_SESSION[selectCate]' target='_blank' class='btn btn-success fas fa-file-pdf  p-2' style='margin-bottom:10px; font-size:1em; float:right;'><span style='font-family:arial; font-weight:normal;'>  <b>PDF</b> </span>   </a>";
						echo "<table class='table table-responsive table-bordered'>";
						echo "<tr> <th> Student Name </th><th> Student Username </th>	<th> Marks </th><th> Total Marks </th>	<th> Percentage </th> <th> Remarks </th> <th> Date </th> <th> Delete</th></tr>";
						
						$query= "SELECT * FROM `exam_results` WHERE `tName`='" .$_SESSION['selectCate'] ."' order by `persontage` desc";
						$result=mysqli_query($conn,$query);
						while($row=mysqli_fetch_array($result)){
							echo "<tr>";
							echo "<td>" .$row['studentName'] ."</td>";
							echo "<td> " .$row['studentUsername']. "</td>";
							echo "<td>" .$row['correctAnswer'] ."</td>";
							echo "<td>" .$row['totalQuestions'] ."</td>";
							echo "<td>" .$row['persontage'] ."%"."</td>";
							echo "<td>"  .$row['remarks'] ."</td>";
							echo "<td>" .date("d-m-Y",strtotime($row['date'])) ."</td>";	//strtotim is to sort the date format
					?>
						<td>	<a href="results.php?del=<?php echo $row['studentUsername']?>&examCat=<?php echo $_SESSION['selectCate']?>"class="btn btn-danger form-control" onclick="return confirm('Are you sure to Delete ? <?php echo $row['studentName'];?> ')">Delete  </a></td>	
					<?php	echo "</tr>";
						}	
							echo "</table>";														
					}
					?>
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