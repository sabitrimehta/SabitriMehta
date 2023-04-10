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
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
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
?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Employee Details</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	
	<div class="center">

		<form action="#" method="POST">

		<h1>Employee Department</h1>
		<div class="form">
			
            
			<?php 

	        $department_res = mysqli_query($conn, "SELECT * FROM department");
             ?>
			<select class="textfield" name="department" required>
				<option value=""></option>
				<?php while($department= mysqli_fetch_array($department_res)){?>
					<option value="<?php echo $department['de_id'];?>"><?php echo $department['dept_name'];?></option>
			    <?php }?>	
			</select>

			<?php 
	        $position_res = mysqli_query($conn, "SELECT * FROM position");
             ?>
			<select class="textfield" name="position" required>
				<option value=""></option>
				<?php while($position= mysqli_fetch_array($position_res)){?>
					<option value="<?php echo $position['position_id'];?>"><?php echo $position['position_name'];?></option>
			    <?php }?> 				
			</select>

			<input type="text" name="salary" class="textfield" placeholder="Salary" required>

			<input type="text" name="joined_date" class="textfield" placeholder="Department joined Date" required>

			<input type="submit" name="submit" value="submit" class="btn">
			
			
		</div>
		</form>
		
	</div>


</body>
</html>

<?php
include("connection1.php");
if(isset($_POST['submit'])){
       $e_id      = $_SESSION["employee_id"];
	$department   = $_POST['department'];
	$position     = $_POST['position'];
	$salary       = $_POST['salary'];
	$joined_date  = $_POST['joined_date'];
	$query = "INSERT INTO empdepartment (e_id,de_id,position_id,salary,joined_date) VALUES($e_id, $department, $position, $salary, '$joined_date')";

      $data = mysqli_query($conn, $query);


     if ($data) {
		echo "Data inserted into Database";
	}

	 else{
	 echo "failed to save data";
	}


}
?>

</body>

</html>


