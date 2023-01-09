<?php 
session_start(); 
include "database.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: main.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: main.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: homePage.php");
		        exit();
            }else{
				header("Location: main.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: main.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: main.php.php");
	exit();
}