<?php

session_start();
require("dbConnection.php");
	if (!isset ($_SESSION['username']))  {
		header ("Location: index2.php");
	}
		$_SESSION['showResult']=false;	
		//To check if student has attempted the exam
		$checkRes= mysqli_query($conn, "select * from exam_results  ") or die('failed to get res');
		while($rowExam=mysqli_fetch_array ($checkRes)) {
			if ($rowExam['studentUsername']==$_SESSION['username'] AND $rowExam['tName']== $_SESSION['examName'] ) {
				$_SESSION['showResult']=true;
				header("Location: results.php");
			}
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
		<script>
			var num= <?php echo $_SESSION['eTime']?> ;
			var x = setInterval(function(){
			num--;
			document.getElementById("timer").innerHTML = num;
			if(parseInt(num)  <=0){
			document.forms["myExam"].submit();
		   }
			},1000);
		</script>
	<style>
		input[type=radio]{
		width: 1.1em;
		height: 1.1em;
		}
	</style>
</head>
	<body> 
	<br>
		<div class="container "> 
			<div class="card border shadow" style=""> 
			<?php 
			$stat = mysqli_query($conn,"select * from exam_status where activeExam='$_SESSION[examName]' AND  activeUser='$_SESSION[username]'");
				while($row=mysqli_fetch_array($stat)) {
					$_SESSION['qno']= $row['questionNO'];
					$_SESSION['Score']= $row['score'];
				}
				$sql= mysqli_query($conn,"select * from questions where category='$_SESSION[examName]' AND question_no='$_SESSION[qno]' ");
				$sql2= mysqli_query($conn,"select * from questions where category='$_SESSION[examName]'");
				$_SESSION['TotalQuestions']=mysqli_num_rows($sql2);
				// echo  "<h2> $_SESSION[Score] </h2>" ;
				while($row=mysqli_fetch_array($sql)) {
			?>
			<form method="POST" action="verify.php" id="myExam" > 
				<div class="card-header " style="padding:px;"> 
					<div class="row">
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">  <h2 class="">  Exam Title:  <span class="text-success"><b> <?php echo $_SESSION['examName'];?> </b></span> </h2> </div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> <h2 class="">  Total  Questions:  <span class="text-primary"><b> <?php echo $_SESSION['TotalQuestions'];?> </b></span> </h2> </div>
					</div>
				</div>
				<div class="card-body " style="padding:0em; margin:0em;"> 
					<div class="row "  style="padding:0px; margin:0px;">
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8  jumbotron border-right" style="padding: 10px;">
							<div class="" style="padding: 25px;">
								<div class="row " >
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bg-light  " style="border-radius: 5px; padding: 10px;"> 
										<b>  <span style="font-size:1.6em;" class="text-danger">  Q.No.#  <?php echo $row['question_no'];	 ?>: </span></b> &nbsp;
										<b><span style="font-size:1.6em;"> <?php echo $row['question']; ?> </span>  </b>  </div>
								</div>   
								<br> <br> 
								<div  class="form-check-inline bg-light  col-xs-12 col-sm-12 col-md-12 col-lg-12 "  style="border-radius: 5px; padding: 10px;  ">
								  <label class="form-check-label col-xs-12 col-sm-12 col-md-12 col-lg-12" >
									<input type="radio" class="form-check-input " name="op" value="<?php echo htmlspecialchars($row['op1']); ?>"> <b style="font-size:1.3em;">  <?php echo $row['op1']; ?>  </b>
								  </label>
								</div>
								<br>	
								<br>
								<div class="form-check-inline bg-light  col-xs-12 col-sm-12 col-md-12 col-lg-12 "  style="border-radius: 5px; padding: 10px; ">
								  <label class="form-check-label col-xs-12 col-sm-12 col-md-12 col-lg-12" >
									<input type="radio" class="form-check-input " name="op" value="<?php echo htmlspecialchars($row['op2']); ?>"> <b style="font-size:1.3em;">  <?php echo $row['op2']; ?>  </b>
								  </label>
								</div>
								<br>
								<br>
								<div class="form-check-inline bg-light  col-xs-12 col-sm-12 col-md-12 col-lg-12 "  style="border-radius: 5px; padding: 10px; ">
								  <label class="form-check-label col-xs-12 col-sm-12 col-md-12 col-lg-12" >
									<input type="radio" class="form-check-input " name="op" value="<?php echo htmlspecialchars($row['op3']); ?>"> <b style="font-size:1.3em;">  <?php echo $row['op3']; ?>  </b>
								  </label>
								</div>
								<br>
								<br>
								<div class="form-check-inline bg-light  col-xs-12 col-sm-12 col-md-12 col-lg-12 "  style="border-radius: 5px; padding: 10px; ">
								  <label class="form-check-label col-xs-12 col-sm-12 col-md-12 col-lg-12" >
									<input type="radio" class="form-check-input " name="op" value="<?php echo htmlspecialchars($row['op4']); ?>"> <b style="font-size:1.3em;">  <?php echo $row['op4']; ?>  </b>
								  </label>
								</div>
								<?php  
								$_SESSION['correctOp'] =$row['answer'];
								}?>
								<div class="row"> 
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">  <br>
										<center>	
											<input type="submit" name="btnNext" value="Next" class="btn btn-success  "  style="font-size:1.8em; font-weight: bold;"  onclick="this.form.submit(); this.disabled=true;  "   /> 
											&nbsp;
										</center> 
									</div>
				</form>
								</div>
							</div>
						</div>
						<!-- Next Section--> 
					  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 bg-light" style="padding: 5px; ; margin:0; height: 422px; border-radius: 5px; "> 
						<h1 class="">&nbsp; <span class="far fa-clock text-secondary" > </span>  <b>Time: </b> <span class=""> <b class="text-danger"id="timer">  <?php echo $_SESSION['eTime'];?> </b>  </span></h1>    <hr>
						<h2 class="">&nbsp;&nbsp;&nbsp;<span class="fa fa-calendar-check text-secondary" aria-hidden="true"></span> <b>&nbsp;Date: </b> <span class=" text-info"><b><?php echo date("d M Y");?></b></span></h2>   
						<br>
					   <div class="card">
					   <div class="card-header"> 
						<h5> <b>  Student Details </b> </h5>
					   </div>
					   <div class="card-body" style=" padding:0px;">
					   <table class="table table-bordered "> 
						<tr> 
						   <th> Name</th>
						   <th> Passport Number</th>
						</tr>
					   <tr> 
					   <td> <?php echo $_SESSION['studentFirstName'];  ?></td>
					   <td> <?php echo $_SESSION['studentPassport'];?></td>
					   </tr>
					   </table>
					   </div>
						<a href="logout.php"  class="btn btn-danger  form-control " style="font-size: 1.3em;" > End/Logout <span class="fa fa-lock"> </span></a>
					   </div> 
					</div> 
					</div>
				</div>
			</div>
		</div> 
		<br>
		<?php include "footer.php";?>
	</body>
</html>
<?php
	if (isset($_SESSION['checkQNO'])) {
		if ( $_SESSION['checkQNO'] > $_SESSION['TotalQuestions']) {
			header("Location: results.php");	
		}
	}
?>