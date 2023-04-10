

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X_UA_compatible" content="ie=edge">
	<title>navigation</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<style>
		.body{
			font-family: montserrat;

		}
		.navbar{
			background: #0082e6;
			border-radius: 30px;
			height: 60px;
			width: 100%
		}
		.navbar ul{
			overflow: auto;
		}
		.navbar li{
			float: left;
			list-style: none;
			margin: 13px 20px;


		}
		.navbar li a{
			padding:3px 3px;
			text-decoration: none;
			color: white;
		}
		.navbar li a:hover{
			color: red;
		}
		.search{
			float: right;
			color: white;
			padding:12px 75px;
		}
		.navbar input{
			border:2px solid black;
			border-radius: 14px;
			padding:3px 17px;
			width: 139px;

		}
		
	</style>
</head>
<body>
	<header>
		
		
		<nav class="navbar">
			<ul>
				<li><a href="navbar.php">Employee Details</a></li>
				<li><a href="address.php">Employee Address</a></li>
				<li><a href="academic.php">Employee Academic</a></li>
				<li><a href="department.php">Employee Department</a></li>
				<li><a href="personal_details.php">Employee Personal Details</a></li>
				<div class="search">
					<input type="text" name="search" id="search" placeholder="Search">
					
				</div>
			</ul>
			<div class="image">
			<img src="employee.jpg"  style="  height: 100%; width: 100%;">
			</div>
		</nav>
    <h2>Login Form</h2>
    <form method="post" action="login.php">
        <label>Username:</label>
        <input type="text" class="textfield" name="username"><br><br>
        <label>Password:</label>
        <input type="password" class="textfield" name="password"><br><br>
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>


<?php
include("connection1.php");
session_start();
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Your authentication code goes here
    // For example, you could check if the username and password match a user in your database
    if($username == "admin" && $password == "sabitri"){
        $_SESSION['username'] = $username;
        header('Location: navbar.php');
        exit();
    } else {
        echo "Invalid username or password";
    }
}
?>
