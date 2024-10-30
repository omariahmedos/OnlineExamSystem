<?php
require("dbConnection.php");
session_start();
	if (!isset ($_SESSION['username']))  {
		header ("Location: index2.php");
	}
	$selectedOption= $_POST['op'];
	$correctOption=   $_SESSION['correctOp'];
	if ($_SERVER["REQUEST_METHOD"] == "POST"  ){
		$_SESSION['qno'] +=1; //To update question number into database
		if($selectedOption==$correctOption){
			$_SESSION['Score']+=1;
			mysqli_query($conn, "update exam_status set questionNO ='$_SESSION[qno]' , score='$_SESSION[Score]' where activeExam='$_SESSION[examName]' AND activeUser='$_SESSION[username]'");
			header("Location: home.php");
		}
		else {
			mysqli_query($conn, "update exam_status set questionNO ='$_SESSION[qno]' , score='$_SESSION[Score]' where activeExam='$_SESSION[examName]' AND activeUser='$_SESSION[username]'");
			header("Location: home.php");
		}
		if ($_SESSION['qno'] > $_SESSION['TotalQuestions'] ) {
			header("Location: results.php");	 
			exit();
		}
	}		header("Location: home.php");
?>




