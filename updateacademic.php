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

    $academic_id =$_GET['id'];

    $sql = mysqli_query ($conn, "SELECT academic.*,level.level_name,board.board_name
     FROM academic join level on academic.level_id=level.level_id join board on academic.board_id=board.board_id  WHERE ac_id= $academic_id");
    ?>

		<form action="#" method="POST">
			<?php while($academic = mysqli_fetch_array($sql)){?>


		<h1>Update Employee Academic Qualification</h1>
		<div class="form">
			
           	<input type="text" name="level" class="textfield" placeholder="update level"value="<?php echo $academic['level_name'];?>" >
			  <input type="hidden" name="level_id" value="<?php echo $academic['level_id']?>">

			
           	<input type="text" name="board" class="textfield" placeholder="update Board"value="<?php echo $academic['board_name'];?>" >
			  <input type="hidden" name="board_id" value="<?php echo $academic['board_id']?>">
			
			<input type="text" name="institute_name" class="textfield" placeholder=" Update Name Of The Institute" value="<?php echo $academic['institute_name'];?>">

			<input type="text" name="passed_year" class="textfield" placeholder=" Update Passed Year " value="<?php echo $academic['passed_year'];?>">

			<input type="text" name="division" class="textfield" placeholder=" Update GPA/Percentage" value="<?php echo $academic['division'];?>">

			<input type="submit" name="update" value="update" name="" class="btn">
			
			
			
		</div>
	<?php } ?>
		</form>
		
	</div>

</body>
</html>

 <?php
 // include ("connection1.php");
if(isset($_POST['update'])){
$ac_id    = $_GET['id'];
$level_id = $_POST['level_id'];
$board_id = $_POST['board_id'];
// $academic = $_POST['academic'];
$level    = $_POST['level'];
$board    = $_POST['board'];
$institutename =$_POST['institute_name'];
$passedyear =$_POST['passed_year'];
$division =$_POST['division'];	
$result = mysqli_query($conn, "UPDATE academic SET institute_name ='$institutename', passed_year=$passedyear , division='$division' WHERE ac_id=$ac_id");
$result1 = mysqli_query($conn, "UPDATE level SET level_name='$level' WHERE level_id=$level_id");
$result2 = mysqli_query($conn, "UPDATE board SET board_name='$board' WHERE board_id=$board_id");
	header("location: academicview.php");
}
?>

