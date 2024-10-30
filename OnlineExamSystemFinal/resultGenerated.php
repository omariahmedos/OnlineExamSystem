<?php
session_start();
require("dbConnection.php");
	if (!isset ($_SESSION['username']))  {
		header ("Location: index2.php");
	}
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
</head>
<body> <br>
    <div class="container "> 
		<div class="jumbotron  " style="padding:10;">
			<div class="card shadow">
				<div class="card-header"> Online Quiz System </div>
					<div class="card-body">
						<h2 class="text-center bg-light  " style="  padding:10px; border-radius:25px;"> Student  &nbsp; Results </h2> 
						<br>	 						<table class=" table   table-responsive table-bordered shadow   " > 
						<tr >
							<th>   Student Name </th>
							<th>   Student Passport  </th>
							<th>  Subject </th>
							<th>  Obtain Marks  </th>
							<th>  Total Marks  </th>
							<th>  Percentage </th>
							<th>  Remarks </th>
							<th>  Date </th>
						</tr>
							<?php
							$res = mysqli_query($conn, "select * from exam_results where studentUsername='$_SESSION[username]' AND tName='$_SESSION[examName]' ");
								while($row=mysqli_fetch_array($res)) {
									echo "<tr> ";
									echo "<td> "; echo $row['studentName']; echo "</td>";
									echo "<td> "; echo $row['studentPASSPORT']; echo "</td>";
									echo "<td> "; echo $row['tName']; echo "</td>";
									echo "<td> "; echo $row['correctAnswer']; echo "</td>";
									echo "<td> "; echo $row['totalQuestions']; echo "</td>";
									echo "<td> "; echo $row['persontage']; echo " %</td>";
										if ($row['remarks']== 'Pass') { 
											echo "<td class='text-success'> <b> ";  echo $row['remarks']; echo "</b></td>";	
										} 
										else {														echo "<td class='text-danger'> <b> ";  echo $row['remarks']; echo "</b></td>";	
										}												//Show Date format
											echo "<td  >" .date("d-m-Y",strtotime($row['date'])) ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";								}
							?>
						</table>
							<br>
							<a href= "logout.php" class="btn btn-danger  "><span class="fa fa-lock"> </span>  Logout </a>
					</div>
			</div>
		</div>
	</div>	
	<br>
   <?php include "footer.php";?>
</body>
</html>