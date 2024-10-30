<?php
require("../dbConnection.php");session_start();
	if (!isset($_SESSION['user'])) {
		header('Location: index.php');
	}
	if (isset($_POST["submit1"])) {
		 $questionno =htmlspecialchars($_POST['questionno']);		 $question =  htmlspecialchars($_POST['question']);		 $op1 =		  htmlspecialchars($_POST['op1']);		 $op2 = 	  htmlspecialchars($_POST['op2']);		 $op3 = 	  htmlspecialchars($_POST['op3']);		 $op4 = 	  htmlspecialchars($_POST['op4']);		 $answer = 	  htmlspecialchars($_POST['answer']);
		if (!empty($questionno) && !empty($question) && !empty($op1) && !empty($op2) && !empty($op3) && !empty($op4) && !empty($answer )) {
			if ($answer == $op1 || $answer == $op2 || $answer ==$op3 || $answer == $op4){				$sql= mysqli_query($conn, "insert into questions values (NULL,'$questionno' ,'$question', ' $op1' , '$op2' ,'$op3', '$op4', '$answer','$_SESSION[examCate]'  )") or die("insert error");								header("refresh:0; url=questions.php?id=$_SESSION[id]"); 			}else {				echo "<script> alert('Answer Must be one of the options') </script>";				header("refresh:0; url=questions.php?id=$_SESSION[id]");				} 			}		else {			echo "<script> alert('All fields must be filled!') </script>";				header("refresh:0; url=questions.php?id=$_SESSION[id]");		}	}
?>