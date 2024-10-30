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
			  <li><a href="exam.php"> <i class="fa fa-book-open"></i>Manage Exams </a></li>	
			  <li class="active"><a href="students.php"> <i class="fa fa-users"></i>Manage Students </a></li>	
			  <li><a href="results.php"> <i class="fa fa-poll"></i>Manage Results </a></li>	
			  <li><a href="contact.php"> <i class="fa fa-edit"></i>Manage Inquiries </a></li>	
			  <li><a href="logout.php"> <i class="fa fa-lock"></i>Logout </a></li>        
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header bg-success">     
              <h3 class="no-margin-bottom text-white text-center"><b>Manage Students </b> </h3>
          </header>
          <!-- Dashboard Counts Section-->
      <section class="dashboard-header container-fluid p-3 m-0"  style="background: white;">
		<div class="row "  > 
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"  >   <br> 
				<h4 class="text-center bg-light " style="  padding:10px; border-radius:25px;"> Add Student </h4> 
					<br>
				<form name="form1" method="POST" action="addStudents.php">
					<input type="text" class="form-control" placeholder="First Name" name="firstname"/> 
					<input type="text" class="form-control" placeholder="Last Name" name="lastname"/>
					<input type="text" class="form-control" placeholder="Username" name="username"/>
					<input type="text" class="form-control" placeholder="Password Should Be Strong" name="password"/>
					<input type="text" class="form-control" placeholder="Passport" name="passport" />
				
					

           
					 <center> 
						<input type="submit" value="Add Student" class="btn btn-success form-control" name="submit" />
					 </center>
					 <span style="color: gray;"><b style="color: red;"> Attention:</b> Every Student must have unique Username and Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character. . </span>
				</form>
				<br>
			</div>  
			<br> 
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 border-left"   > 
				<br>
				<h4 class="text-center bg-light " style="  padding:10px; border-radius:25px;"> View Students</h4> 
				<br>
				<table class="table    table-responsive  table-bordered  ">
					<tr> 	
						<th  style="width:50%;"> Name </th> 
						<th  style="width:50%;"> Surname </th>
						<th  style="width:50%;"> Username </th>
						<th  style="width:50%;"> Password </th>
						<th  style="width:50%;"> Passport </th>
						<th  style="width:50%;"> Action </th>
					</tr>
					<?php 
						$res = mysqli_query($conn, "select *from registration");
							while ($row=mysqli_fetch_array($res)) {
								$Name= $row['firstname'];//for delete function in status.php 
								$enroll = $row["enroll"];//for enable/disable function in status.php
								?>	
								<tr>
									<td  style="width:auto;"> <a href="studentstatus.php?studentUser=<?php echo$row['username']; ?>">  <?php echo $row["firstname"]; ?></a> </td> 
									<td  style="width:auto;"> <?php echo $row["lastname"];?></td> 
									<td  style="width:auto;"> <?php echo $row["username"];?></td> 
									<td  style="width:auto;"> <?php echo $row["password"];?></td> 
									<td style="width:auto;"> <?php echo $row["passport"];?></td> 
									<td style="width:auto; white-space: nowrap;" class="p-3"> 
										<?php if ($enroll == '0') {?>
												<a href="addStudents.php?enable=<?php echo urlencode($row['username'])?>"class="btn btn-success btn- " >Enable  </a> 
										<?php }  
											else  {		
										?>
												<a href="addStudents.php?disable=<?php echo urlencode($row['username'])?>"class="btn btn-warning btn- " >Disable  </a> 
										<?php }?>
											<span style="color: gray;">||</span>
											<a href="addStudents.php?del=<?php echo $row['id']?>"class="btn btn-danger btn- " onclick="return confirm('Are you sure to Delete ? <?php echo  $Name;?> ')"> Delete  </a> 
										<?php }?>
									</td>
								</tr>
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