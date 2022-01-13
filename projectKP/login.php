<?php
error_reporting(0);
$host="localhost";
$user="root";
$password="";
$db="login";


session_start();

$data=mysqli_connect($host, $user, $password, $db);
if($data===false)
{
	die("connection error");
}


if($_SERVER["REQUEST_METHOD"]=="POST"){
	$username=$_POST["username"];
	$password=$_POST["password"];

	$sql="select * from login where username= '".$username."' AND password= '".$password."' ";

	$result=mysqli_query($data, $sql);

	$row=mysqli_fetch_array($result);

	if($row["usertype"]=="user")
	{	
		$_SESSION["username"]=$username;


		header("location:userpage.php");
	}

	else if ( $row["usertype"]=="admin") 
	{
		$_SESSION["username"]=$username;
		header("location:adminpage.php");	
	}

	else if ( $row["usertype"]=="staff") 
	{
		$_SESSION["username"]=$username;
		header("location:adminpage.php");	
	}

	else
	{
		echo "<script type ='text/JavaScript'>";  
	    echo "alert('Username atau Password salah')";  
 	   	echo "</script>";  
	
	}

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet"> 
    <title>splash screen</title>
</head>
<body>

    <div class = "splash">
        <img class="pelindo" src = "image/pelindo3.png">
    </div>    

    <div class = "container">
        <div class = "login">
            <img class="loginPelindo" src = "image/loginRec.png">
        </div>
        
        <div class = "login-container">
            <form action="#" method="POST">
                <h2>Selamat Datang</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>Username</h5>
                        <input class="input" type="text" name="username" required>
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h5>Password</h5>
                        <input class="input" type="password" name="password"required>
                    </div>
                </div>
                <input type="submit" class="btn" value="login">
            </form>
        </div>
    </div>    

<script src = "script/javascript.js">

</script>

</body>
</html>