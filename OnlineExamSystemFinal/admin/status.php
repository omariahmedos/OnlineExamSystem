<?php 
require("../dbConnection.php");error_reporting(0);
session_start();
	$_SESSION['status']= $_GET['stat'];
	$_SESSION['disable']= $_GET['disable'];
	if ($_SESSION['status']) {
		if (!isset($_SESSION['user']) && empty($_SESSION['user'])) {	//for secuirty implementation to prevent SQL queries			unset($_GET['status']);		}		else {			$qq="select * from questions where category ='$_SESSION[status]'";			$q = mysqli_num_rows(mysqli_query($conn,$qq )) ;				if ($q>0) {					$query = mysqli_query($conn,"update test_unlock set test_name= '$_SESSION[status]' where sn= '1'") or die('Sorry, the server is down') ;				} 				else {					echo "<script> alert('The Exam cannot be Enabled as it has no questions') </script>";					}		}	}	else if ($_SESSION['disable']) {
		if (!isset($_SESSION['user']) && empty($_SESSION['user'])) {	//for secuirty implementation to prevent SQL queries			unset($_GET['disable']);		}		else {
			$query = mysqli_query($conn,"update test_unlock set test_name= NULL where sn= '1'") or die('Sorry, the server is down') ;
		}
	}
		header("Refresh:0; url=exam.php");
?>