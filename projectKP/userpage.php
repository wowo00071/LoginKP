<?php 
session_start();

if (!isset($_SESSION["username"])) 
{
	header("location:login.php");
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<h1>This is User Home Page</h1>
<br>
<?= $_SESSION["username"] ?>
<br>
<a href="login.php">Logout</a>
</body>
</html>