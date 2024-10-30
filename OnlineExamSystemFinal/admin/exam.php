<?php 

require("../dbConnection.php");
session_start();
	if (!isset($_SESSION['user'])) {
		header('Location: index.php');
	}
	if (isset($_POST['submit1'])) {
		$examname = htmlspecialchars($_POST['examname']);
		$examtime = htmlspecialchars($_POST['examtime']);
		$examper = htmlspecialchars($_POST['examper']);
		if (!empty ($examname) && !empty ($examtime) && !empty ($examper) ) { 
			//echo "Exam is added successfully";
			$e = mysqli_query($conn, "insert into exam_category values (NULL,'$examname','$examtime' , '$examper')");
				if ($e ) {
					header ("Location: exam.php");
				}
				else {
					echo "<script> alert('Exam Already Exists!') </script>";
					header ("refresh:0 url=exam.php");
				}
		}
		else {
			echo "<script> alert('All fields must be filled!') </script>";
			header("refresh:0; url=exam.php");
		}
	}
	if (isset($_GET['del'])) {
		//to prevent SQL querys (SQL)  in the web page link 
		if (!isset($_SESSION['user']) && empty($_SESSION['user'])) {	 //for secuirty implementation to prevent SQL queries
			unset($_GET['del']);
		}
	else {
		$del = htmlspecialchars($_GET['del']);	
		$queryfire= mysqli_query($conn,"delete from exam_category where category='$del'");
		$qry= mysqli_query($conn, "delete from exam_results where tName='$del'");
		$query= mysqli_query($conn, "delete from questions where category='$del'");
		$q= mysqli_query($conn, "delete from exam_status where activeExam='$del'");
		header("Location: exam.php");
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
			  <li><a href="contact.php"> <i class="fa fa-edit"></i>Manage Inquiries </a></li>	
			  <li><a href="logout.php"> <i class="fa fa-lock"></i>Logout </a></li>	 
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header bg-success"> 
              <h3 class="no-margin-bottom text-white text-center"><b>Manage Exams </b> </h3>
          </header>
          <!-- Dashboard Counts Section-->
          <section class="dashboard-header container-fluid p-3 m-0"  style="background: white;">
			<!-- <h3 class="text-center"> Active Exam: <span style="font-weight: bold;  font-size: 1.2em;  " class="text-success">  <?php echo $_SESSION['status']; ?> </span> </h3>  -->
		<div class="row"  > 
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 "  >   <br> 
		<h4 class="text-center bg-light " style="  padding:10px; border-radius:25px;"> Add Exam </h4> 
	<form name="form1"  method="POST"> 
		<br>
		<input type="text" placeholder=" Exam Name" class="form-control" name="examname"/>
		<input type="number" min="1" placeholder="Exam Question Time in Seconds e.g: 60" class="form-control" name="examtime"/>
		<input type="number" min="1" placeholder="Exam Passing Percentage e.g: 50" class="form-control" name="examper"/>
		<input type="submit" class="btn btn-success form-control" value="Add Exam" name="submit1" style="margin-bottom:10px;"/>
		<span style="color: gray;"><b style="color: red;"> Attention:</b> Fill all fields properly. </span>
	</form>
	  </div>  <br> 
	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 border-left"   > 
	<br>
	<h4 class="text-center bg-light " style="  padding:10px; border-radius:25px;"> View Exam</h4> 
		<table class="table       table-bordered table-responsive "> 
<tr> 	 <th> Exam Name </th>  <th> Exam Time </th>  <th> Exam Per%</th> 		<th> Edit Exam </th> <th> Delete Exam </th> <th> Exam Questions </th>  <th> Exam <br> Status </th> </tr>
	<?php
	$qry="select * from test_unlock";
		$result=mysqli_query($conn,$qry);
		while($row=mysqli_fetch_array($result)){
			$_SESSION['testName']=$row['test_name'];
		}
		$res = mysqli_query($conn, "select *from exam_category");
		while ($row=mysqli_fetch_array($res)) {
				$exam=$row['category'];
				$duration=$row['exam_time_in_seconds'];
				$persontage=$row["exam_per"];
			?>
				<tr><td> <?php echo $exam ?> </td> <td> <?php echo $duration ?></td>  <td> <?php echo $persontage."%" ?></td> 
				<td> <a href="editExam.php?id=<?php echo $row['id'] ?>" class="btn btn-primary form-control"> Edit </a> </td>
				<td><a href="exam.php?del=<?php echo $exam?>"class="btn btn-danger form-control" onclick="return confirm('Are you sure to Delete ? <?php echo $exam;?> ')">Delete  </a></td>	
				<td><a href="questions.php?id=<?php echo $row['id']?>" class="btn btn-warning  "> Questions    </a></td>
			<?php
			if(urlencode($exam==$_SESSION['testName'])){
			?> 
			<td class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "><h4 class="text-center text-danger shadow  "  style="border-radius:5px; padding: 5px;"> Enabled </h4> </td>
			<?php
			} 
			else{ ?>
			 <td class="col-xs-12 col-sm-12 col-md-12 col-lg-12  p-3  " > 
			 <a href="status.php?stat=<?php echo urlencode($exam); ?>" class="btn btn-success form-control" onclick="return confirm('Are you sure to enable the exam ? <?php ?>' )">
			 Enable <i class="fa fa-unlock" > 
			 </i>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a> </td>
			<?php
			}
			?>		
			<?php
		}
			?>
	</table>
	<a href="status.php?disable=<?php echo 'NULL'?>" class="btn btn-warning form-control"style="font-size: 1em; font-weight: bold; color:black;;" onclick="return confirm('Are you sure to Disable All Exams ?' )"> Disable All Exams <i class="fa fa-power-off" aria-hidden="true"></i>  </a>
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