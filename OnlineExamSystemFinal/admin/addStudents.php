<?phpsession_start();require("../dbConnection.php"); // if (!isset ($_SESSION['username']))  {	// header ("Location: index.php"); // }	if (isset($_POST["submit"])) {		$firstname = htmlspecialchars($_POST['firstname']);		$lastname =	 htmlspecialchars($_POST['lastname']);		$username =	 htmlspecialchars($_POST['username']);		$password =	 htmlspecialchars($_POST['password']);		$passport =	 htmlspecialchars($_POST['passport']);			$count=0;			// APPLYING PASSWORD STRENGTH CHECKUP// assigning variable to hold onto the following criteria $uppercase = preg_match('@[A-Z]@', $password); //uppercase of A to Z $lowercase = preg_match('@[a-z]@', $password); //lowercase of a to z $number    = preg_match('@[0-9]@', $password); //number 0 to 9 $specialChars = preg_match('@[^\w]@', $password); //special character 						//						$sql= mysqli_query($conn,"select * from registration where  username='$_POST[username]' ") or die("registeration cannot be made at the moment");			$count=mysqli_num_rows($sql);			$countReal = strip_tags ($count);			if ($countReal >0) {					echo "<script> alert('User Already Exists! ');</script>";					header("refresh:0; url=students.php");			}			else {				if (!empty($firstname) && !empty($lastname) && !empty($username) && !empty($password) && !empty($passport)) {								//if all condition is NOT meet up if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {   // echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';         	echo "<script> alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character. ');</script>"; }else {	 	  				$strongPassword = md5($password);						mysqli_query($conn, "insert into registration values (NULL,'$firstname','$lastname','$username','$strongPassword','$passport' ,'1')") or die(mysqli_error($conn)); header("refresh:0; url=students.php");    				} 												}				else {						echo "<script> alert('Please fill all fields ');</script>";						header("refresh:0; url=students.php");				}			}	}	else if (isset($_GET["del"])) {		if (!isset($_SESSION['user']) && empty($_SESSION['user'])) {	//for secuirty implementation to prevent SQL queries			unset($_GET['del']); 		}		else {			$queryFire= mysqli_query($conn,"delete from registration where id='$_GET[del]'") or die('Failed to Delete Record');				header("refresh:0; url=students.php");		}	}	else if (isset($_GET["enable"]) ) {		if (!isset($_SESSION['user']) && empty($_SESSION['user'])) {	//for secuirty implementation to prevent SQL queries			unset($_GET['enable']); 		}	else {			$queryFire= mysqli_query($conn,"update registration set enroll='1' where username='$_GET[enable]'") or die('Failed to Enable');		header("refresh:0; url=students.php");	}	}	else if ( isset($_GET["disable"]) ) {		if (!isset($_SESSION['user']) && empty($_SESSION['user'])) {	 //for secuirty implementation to prevent SQL queries			unset($_GET['disable']);		}		else {				$queryFire= mysqli_query($conn,"update registration set enroll='0' where username='$_GET[disable]'") or die('Failed to Disable');			header("refresh:0; url=students.php");		}	}		header("refresh:0; url=students.php");?>