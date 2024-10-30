<?php
session_start();
require("dbConnection.php");
 if (!isset ($_SESSION['username']))  {
	header ("Location: index2.php");
}
$countScore = mysqli_query($conn, "select * from exam_status where activeUser='$_SESSION[username]'");
	while($row=mysqli_fetch_array($countScore)) {
		$correct=$row['score'];
		$passPer = $row['passPer'];
	}	$test=$_SESSION['examName'];	$time=$_SESSION['eTime'];	$name=$_SESSION['studentFirstName'];	$passport=$_SESSION['studentPassport'];	$total=$_SESSION['TotalQuestions'];	$wrong =( (int)$_SESSION['TotalQuestions'] - (int) $correct);	$per =number_format( $correct /  $_SESSION['TotalQuestions'] * 100 ,2); //percentage formula = obtain/total*100    
	if ($per < $passPer) {			$remarks="Fail";		}		else {			$remarks="Pass";		}	if ($_SESSION['showResult'] == false ) {			$res= mysqli_query($conn,"select * from exam_results where tName='$test' AND studentUsername='$_SESSION[username]' ");			$counterRes= mysqli_num_rows($res);		if ($counterRes > 0) {			//If the result exists, the system will not modify data in exam results		}		else {		$sql= mysqli_query ($conn, "insert into exam_results  values (NULL, '$test', '$time', '$name', '$_SESSION[username]', '$passport', '$total', '$correct', '$wrong', '$per', '$remarks', NOW())") or die('fail to add in result');		}		//To clear data from exam status after the result is generated	//	mysqli_query($conn, "delete from  exam_status where activeUser='$_SESSION[username]' AND activeExam='$_SESSION[examName]' ");		header("Location: resultGenerated.php");	}	else {		header("Location: resultGenerated.php");	}	header("Location: resultGenerated.php");?>
