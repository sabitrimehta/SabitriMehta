
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X_UA_compatible" content="ie=edge">
	<title>navigation</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
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
	</header>
	<?php
include("connection1.php");
 session_start();
if(isset($_POST['next'])){
		// $error ='';
	$fname      = $_POST['first_name'];
	$mname      = $_POST['middle_name'];
	$lname      = $_POST['last_name'];
	$gender     = $_POST['gender'];
	$contact    = $_POST['contact'];
	$email      = $_POST['email'];
	$department = $_POST['department'];


		    if(!empty($fname) && !empty($mname) && !empty($lname) && !empty($gender) && !empty($contact) && !empty($email) && !empty($department)){
		    	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				echo "Invalid email format";
			} 
			
			$query = "INSERT INTO employee_details (first_name,middle_name,last_name,gender,contact,email,department) VALUES('$fname','$mname','$lname','$gender','$contact','$email','$department')";

	    $data = mysqli_query($conn, $query);
	     $e_id = mysqli_insert_id($conn);
         $_SESSION["employee_id"] = $e_id;

	    if ($data) {
		   echo "Data inserted into Database";	
		   header("Location: address.php");
           die();
	    }
	    else{
		echo "failed to save data $query. ";
	    }
		} else {
		$error ="Please fill all fields";	
		}
}
?>
	<div class="center">

		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

		<h1>Employee Details</h1>
		<div class="text-right"><h4><?php echo @$error;?></h4></div>
		<div class="form">
			<input type="text" name="first_name" class="textfield" placeholder="First Name" >
			<input type="text" name="middle_name" class="textfield" placeholder="Middle Name" >
			<input type="text" name="last_name" class="textfield" placeholder="Last Name" >

			<select class="textfield" name="gender" >
				<option value=""></option>
				<option value="Male">male</option>
				<option value="Female">Female</option>
				<option value="Others">Others</option>
			</select>

			<input type="text" name="contact" class="textfield" placeholder="Contact" >

			<input type="text" name="email" class="textfield" placeholder="Email" >

			<select class="textfield" name="department" >
				<option value=""></option>
				<option value="IT">IT</option>
				<option value="HR">HR</option>
				<option value="Account">Account</option>
				<option value="Business Development">Business Development</option>
				<option value="Sells">Sells</option>
				<option value="Marketing">Marketing</option>
			</select>
			<input type="submit" name="next" value="next" name="" class="btn">
			
		</div>
		</form>
		
	</div>


</body>
</html>
