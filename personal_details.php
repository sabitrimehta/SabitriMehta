<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X_UA_compatible" content="ie=edge">
	<title>navigation</title>
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
     
<!DOCTYPE html>
<html>
<head>
	<title>Employee Details</title>
	<!-- <link rel="stylesheet" type="text/css" href="style2.css"> -->
	
	 <style>
	 	
.center{
	position: absolute;
	top: 40%;
	left: 40%;
	transform: translate(-20%, -20%);
	width: 650px;
	height: 850px;
	background-color: pink;
	border-radius: 2px;
}
input[type=text], select {
  width: 40%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 2px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 50%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.center h2{
	text-align: center;
	padding-bottom: 20px;
	border-bottom: 1px solid silver;
	height: 50px;
}

.form{
	padding: 15px;
	margin: 0 20px;
	height: 450px;
}

.btn{
	width: 18%;
	height: 50px;
	background-color: #D071f9;
	border-width: 5px;
	font-size: 20px;
	color: white;
	cursor: pointer;
	border: 0;
	margin: 4px 0;
}
.center_inline{
	display: flex;
	flex-flow: row wrap;
	align-items: center;
}
.main{
	height: 600px;
}

</style>
</head>
<body>
	<div class="center">
		<div class="main">

			<form id="center" method="POST">
			<h2>Employee Personal Details</h2>

			 <div class="form">
				<input type="text" name="full_name" id="name" class="textfield" placeholder="full name" required>
				
				<input type="text" name="contact_no" id="contact" class="textfield" placeholder="contact no" required>

				
				<input type="text" name="email" id="email" class="textfield" placeholder="email"required>

				<input type="text" name="age" id="age" class="textfield" placeholder="Age" required>

				<select class="textfild" name="blood_group" required>
				    <option value=""></option>
				    <option value="A+">A+</option>
				    <option value="A-">A-</option>
				    <option value="B+">B+</option>
				    <option value="B-">B-</option>
				    <option value="AB+">AB+</option>
				    <option value="AB-">AB-</option>
				    <option value="O+">O+</option>
				    <option value="O-">O-</option>
				</select>


				<input type="text" name="nationality" id="nationality" class="textfield" placeholder="nationality" required>

				<input type="text" name="citizenship_no" id="name" class="textfield" placeholder="citizenship no" required>

				<input type="text" name="citizenship_issued_from" id="name" class="textfield" placeholder=" citizenship issued from" required>

				<input type="text" name="father_name" id="name" class="textfield" placeholder="father's name" required>

				<input type="text" name="mother_name" id="name" class="textfield" placeholder="mother's name" required>

				<input type="text" name="spouse_name" id="name" class="textfield" placeholder="spouse name" required>
			
				<input type="submit" name="submit" value="submit" name="" class="btn">
			 </div>
				
			</form>
		</div>
		
	</div>

</body>
</html>


<?php
include("connection1.php");
?>


<?php
if(isset($_POST['submit'])){
	 $e_id      = $_SESSION["employee_id"];
	$fullname      = $_POST['full_name'];
	$contact       = $_POST['contact_no'];
	$email         = $_POST['email'];
	$age           = $_POST['age'];
	$bgroup        = $_POST['blood_group'];
	$nationality   = $_POST['nationality'];
	$citizenshipno = $_POST['citizenship_no'];
	$citizenshipissued = $_POST['citizenship_issued_from'];
	$fname         = $_POST['father_name'];
	$mname         = $_POST['mother_name'];
	$sname         = $_POST['spouse_name'];

	$query = "INSERT INTO personal_details (e_id,full_name,contact_no,email,age,blood_group,nationality,citizenship_no,citizenship_issued_from,father_name,mother_name,spouse_name) VALUES($e_id, '$fullname', $contact,'$email',$age,'$bgroup','$nationality', $citizenshipno,'$citizenshipissued','$fname','$mname','$sname')";

	if ( mysqli_query($conn,$query)) {
		
		echo "Data inserted into Database";
		
	}

	// else{
	// 	echo "failed to save data $query. ";
	// }

}
?>
</body>
</html>




