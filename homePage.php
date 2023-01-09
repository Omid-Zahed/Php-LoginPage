<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="StylingLoginForm.css">
</head>
<body>
     <h1>Login Sucessfully!<?php echo $_SESSION['user_name']; ?></h1>
     <a href="LogOut.php">Logout</a>
</body>
</html>

<?php 
}else{
     header("Location: main.php");
     exit();
}
 ?>