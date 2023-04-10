 <?php
include("connection1.php");
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Update Employee Details</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
		<div class="center">
		<?php
		include("connection1.php");
		$employee_id=$_GET['id'];
		$sql = mysqli_query($conn,"SELECT e_id,first_name,middle_name,last_name,gender,contact,email, department FROM employee_details WHERE e_id = $employee_id");
		?>
		<form action="" method="POST">
	    <?php while ($employee=mysqli_fetch_array($sql)) { 
	    ?>
		<h1> Update Employee Details</h1>
		<div class="form">
			<input type="text" name="first_name" class="textfield" placeholder="First Name" 
			value="<?php echo $employee['first_name']?>">
			<input type="text" name="middle_name" class="textfield" placeholder="Middle Name" 
			value="<?php echo $employee['middle_name']?>">
			<input type="text" name="last_name" class="textfield" placeholder="Last Name" value="<?php echo $employee['last_name']?>">

			<select class="textfield" name="gender">
				<option value="Not Selected">Select Gender</option>

				<option value="Male"
					<?php
						if($employee['gender']=='Male'){
							echo "selected";
						}
					?>
				>
				male</option>

				<option value="Female"
					<?php
						if($employee['gender']=='Female'){
							echo "selected";
						}
					?>
				>
				Female</option>

				<option value="Others"
					<?php
						if($employee['gender']=='Others'){
							echo "selected";
						}
					?>
				>
				Others</option>
			</select>

			<input type="text" name="contact" class="textfield" placeholder="Contact" value="<?php echo $employee['contact']?>">

			<input type="text" name="email" class="textfield" placeholder="Email" value="<?php echo $employee['email']?>">

			<select class="textfield" name="department" >
				<option value="Not Selected">Select Department</option>

				<option value="IT"
					<?php
						if($employee['department']=='IT'){
							echo "selected";
						}
					?>
				>
				IT</option>

				<option value="HR"
					<?php
						if($employee['department']=='HR'){
							echo "selected";
						}
					?>
				>
				HR</option>

				<option value="Account"
					<?php
						if($employee['department']=='Account'){
							echo "selected";
						}
					?>
				
				>
				Account</option>

				<option value="Sells"
					<?php
						if($employee['department']=='Sells'){
							echo "selected";
						}
					?>
				
				>
				Sells</option>

				<option value="Marketing"
					<?php
						if($employee['department']=='Marketing'){
							echo "selected";
						}
					?>
				
				>
				Marketing</option>
			</select>
			<input type="submit" name="Update" value="Update" class="btn">	
		</div>
	   
		</form>
		<?php } ?>
		
	</div>


</body>
</html>

 <?php
if(isset($_POST['Update'])){
     
     $e_id=$_POST['id'];
	$fname      = $_POST['first_name'];
	$mname      = $_POST['middle_name'];
	$lname      = $_POST['last_name'];
	$gender     = $_POST['gender'];
	$contact    = $_POST['contact'];
	$email      = $_POST['email'];
	$department = $_POST['department'];
	$result= mysqli_query($conn, "UPDATE employee_details SET first_name='$fname', middle_name='$mname',last_name='$lname', gender='$gender', contact='$contact', email='$email', department='$department' WHERE e_id = $employee_id");
	header("location: menu.php");
}
?>




