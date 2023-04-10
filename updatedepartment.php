 <?php
include("connection1.php");
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Update Employee Academic Details</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<div class="center">

	 <?php include("connection1.php");

    $empdepartment_id =$_GET['id'];

    $sql = mysqli_query ($conn, "SELECT empdepartment.*,department.dept_name,position.position_name
     FROM empdepartment join department on empdepartment.de_id=department.de_id join position on empdepartment.position_id=position.position_id WHERE dept_id=$empdepartment_id");
    ?>

		<form action="#" method="POST">
			<?php while($empdepartment = mysqli_fetch_array($sql)){?>
		
		<h1> Update Employee Department</h1>
		<div class="form">

	        <input type="text" name="department" class="textfield" placeholder="update Department Name"value="<?php echo $empdepartment['dept_name'];?>" >
			  <input type="hidden" name="de_id" value="<?php echo $empdepartment['dept_id']?>">
			
            <input type="text" name="position" class="textfield" placeholder="update Position" value="<?php echo $empdepartment['position_name'];?>" >
			  <input type="hidden" name="position_id" value="<?php echo $empdepartment['position_id']?>">

			<input type="text" name="salary" class="textfield" placeholder="Salary" value="<?php echo $empdepartment['salary'];?>" >

			<input type="text" name="joined_date" class="textfield" placeholder="Department joined Date" value="<?php echo $empdepartment['joined_date'];?>" >

			<input type="submit" name="update" value="update" class="btn">
			
			
		</div>
	<?php } ?>
		</form>
		
	</div>

</body>
</html>

 <?php
if(isset($_POST['update'])){
$dept_id     = $_GET['id'];
$de_id       = $_POST['de_id'];
$position_id = $_POST['position_id'];
$department  = $_POST['department'];
$position    = $_POST['position'];
$salary      =$_POST['salary'];
$joined_date =$_POST['joined_date'];
// var_dump("update");die();
$result  = mysqli_query($conn, "UPDATE empdepartment SET salary =$salary, joined_date='$joined_date' WHERE dept_id=$dept_id");
$result1 = mysqli_query($conn, "UPDATE department SET dept_name='$department' WHERE de_id=$de_id");
$result2 = mysqli_query($conn, "UPDATE position SET position_name='$position' WHERE position_id=$position_id");

	header("location: viewdepartment.php");
}
?>

