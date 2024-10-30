<?php
session_start();
require("dbConnection.php");
if (!isset ($_SESSION['username']))  {
	header ("Location: index2.php");
}
	// For deleting records from exam status table in the database as it causes cache issues
	$DeleteEmptyStatus = mysqli_query($conn,"delete  FROM exam_status where  activeUser= '' AND sPASSPORT=''");	//For Checking Enbaled exam for studnets	$activeExam= mysqli_query($conn, "select * from test_unlock") or die('fail to retrieve Test');
	while($rowExam=mysqli_fetch_array ($activeExam)) {
		$notTest= $rowExam['test_name'];
		if ($notTest== NULL) {
			header("Location: sorry.php");
		}
		else {
			$_SESSION['examName'] = $rowExam['test_name']; //assignning The exam name fetched from test_unlock table.  
			}
		}
		$qry=mysqli_query($conn,"select * from exam_category where category='$_SESSION[examName]'") ;
		while($row=mysqli_fetch_array($qry)) {
			
			$_SESSION['eTime']=$row['exam_time_in_seconds'];			$_SESSION['ePassPer']=$row['exam_per'];
		}
		// For Exam Status
		$statusQuestion= mysqli_query($conn,"select * from exam_status where activeUser='$_SESSION[username]' AND activeExam='$_SESSION[examName]' ") or die("stats error");
			while($row=mysqli_fetch_array($statusQuestion)) {
				$_SESSION['checkQNO']= $row['questionNO']; 			}			$count= mysqli_num_rows($statusQuestion); 
			if ($count >0) 
				{					//when user logs back the data will not be changed so the status for the student will not be changed				}
			else 
			{
			$in= mysqli_query($conn, "insert into exam_status values (NULL,	'$_SESSION[username]' ,'$_SESSION[studentPassport]','$_SESSION[examName]', '1', '0', '$_SESSION[ePassPer]')") or die('fail insert stats');			}
?>
<!DOCTYPE HTML>
<html>
<head>
	 <title></title>
	   <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Links -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
	<script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!--  -->
	  <link href="style.css" rel="stylesheet">
</head><body> 	<br>
    <div class="container ">
		<div class="card border shadow" style=""> 
			<form method="POST" action="home.php">  
				<div class="card-header">  <h2 class="text-center text-success"> <?php echo $_SESSION['examName'];?></h2></div>
				<div class="card-body   " style="padding: px;" >  <h2 class="text-center" style="border-radius: 50px; ">Welcome  <span style="color: red;"> <?php echo $_SESSION['username'];?></span></h2> 
					<h3 class="text-center bg-light" style="border-radius:25px; padding:8px; font-weight: bold;"> Instructions for Examination </h3>  
					<ul style="font-size: 1em;"> 
						<li style="list-style-type: none; color: green; " > <b>Please listen carefully the Invigilator's instructions before starting the Exam  </b></li>						<li> To start the Exam <b> <u> Click On Start Exam.</u></b></li>						<li >  You need to get <b> <u> <?php echo $_SESSION['ePassPer'];?>% Percentage For Passing Exam.</b></u> </li>  						<li >Every Questions have <b> <u> <?php echo $_SESSION['eTime']; ?> Seconds.	</u> </b> </li> 						<li> Once the Exam is started you must attend all questions otherwise your <b> <u> Exam Will Not be Graded. </u></b></li>						<li> In case of browser getting closed  <b> <u>  You Can Resume At That Question Where You Were Left. </u></b></li>						<li >You can Skip to next questions using <b><u> Next Button. </u></b> </li> 
						<li > You can't navigate to <b><u> Previous Questions So You Must Answer Carefully. </u> </b> </li>
						<li >  All Questions <b>  <u> Have Equal Marks.</b>  </u></li> 
						<li >  You will be shown your <b> <u> Instant Result Once Test Ends.</u>  </b> </li> 
					</ul>
					<u>  <h3 class="text-center"> <b> Wish You Best Of Luck </b></h3></u>
					<hr> 
					<center>     <input type="submit" class="btn btn-success  " value="Start Exam" style="font-size: 20px; font-weight:bold; border-radius: 3px 30px 3px 30px; padding:10px;"  />  <br>
						<a class=" btn btn-danger text-white  " href="logout.php" style="font-size: 20px; font-weight:bold; border-radius: 30px 3px 30px 3px; padding:10px;" > Logout </a>					</center>
				</div>			</form>		</div>
	</div>	<br>   <?php include "footer.php";?>
</body>
</html>
