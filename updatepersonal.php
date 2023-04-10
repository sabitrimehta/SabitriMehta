<!DOCTYPE html>
<html>
<head>
	<title>Employee Details</title>
	<!-- <link rel="stylesheet" type="text/css" href="style2.css"> -->
	
	 <style>
input[type=text], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
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
.btn{
	width: 18%;
	height: 50px;
	background-color: #D071f9;
	border-width: 5px;
	font-size: 20px;
	color: white;
	cursor: pointer;
	border: 0;
	margin: 7px 0;
}

</style>
</head>
<body>
	<div class="main">
		<div class="details">
			<?php
		include("connection1.php");
		$personal_id = $_GET['id'];
		$sql = mysqli_query($conn,"SELECT * FROM personal_details WHERE citizenship_no = $personal_id");
		?>
			
			<form id="center" method="POST">
			<?php while ($personal=mysqli_fetch_array($sql)) { 
	    	?>
				<h2>Employee Personal Details</h2>
			 <div class="form">
				<input type="text" name="full_name" id="name" class="textfield" placeholder="full name" value="<?php echo $personal['full_name']?>">
				
				<input type="text" name="contact_no" id="contact" class="textfield" placeholder="contact no" value="<?php echo $personal['contact_no']?>">

				
				<input type="text" name="email" id="email" class="textfield" placeholder="email" value="<?php echo $personal['email']?>">

				<input type="text" name="age" id="age" class="textfield" placeholder="Age" value="<?php echo $personal['age']?>">

				<select class="textfild" name="blood_group">
				    <option value="Not Selected">Select Blood_group</option>
				    <option value="A+"
				    <?php
						if($personal['blood_group']=='A+'){
							echo "selected";
						}
					?>
				    >
				    A+</option>
				    <option value="A-"
				     <?php
						if($personal['blood_group']=='A-'){
							echo "selected";
						}
					?>
				    >
				    A-</option>
				    <option value="B+"
				     <?php
						if($personal['blood_group']=='B+'){
							echo "selected";
						}
					?>
				    >
				    B+</option>
				    <option value="B-"
				     <?php
						if($personal['blood_group']=='B-'){
							echo "selected";
						}
					?>
				    >
				    B-</option>
				    <option value="AB+"
				     <?php
						if($personal['blood_group']=='AB+'){
							echo "selected";
						}
					?>
				    >
				    AB+</option>
				    <option value="AB-"
				     <?php
						if($personal['blood_group']=='AB-'){
							echo "selected";
						}
					?>
				    >
				    AB-</option>
				    <option value="O+"
				     <?php
						if($personal['blood_group']=='O+'){
							echo "selected";
						}
					?>
				    >
				    O+</option>
				    <option value="O-"
				     <?php
						if($personal['blood_group']=='O-'){
							echo "selected";
						}
					?>
				    >
				    O-</option>
				</select>

				<input type="text" name="nationality" id="nationality" class="textfield" placeholder="nationality" value="<?php echo $personal['nationality']?>">

				<input type="text" name="citizenship_no" id="name" class="textfield" placeholder="citizenship no" value="<?php echo $personal['citizenship_no']?>">

				<input type="text" name="citizenship_issued_from" id="name" class="textfield" placeholder=" citizenship issued from" value="<?php echo $personal['citizenship_issued_from']?>">

				<input type="text" name="father_name" id="name" class="textfield" placeholder="father's name" value="<?php echo $personal['father_name']?>">

				<input type="text" name="mother_name" id="name" class="textfield" placeholder="mother's name" value="<?php echo $personal['mother_name']?>">

				<input type="text" name="spouse_name" id="name" class="textfield" placeholder="spouse name" value="<?php echo $personal['spouse_name']?>">


			
				<input type="submit" name="update" value="update" name="" class="btn">
			 </div>
				
			</form>
		<?php } ?>
		</div>
		
	</div>

</body>
</html>


<?php
include("connection1.php");
?>


<?php
if(isset($_POST['update'])){
	
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

	$query= mysqli_query($conn, "UPDATE personal_details SET full_name='$fullname', contact_no='$contact' , email='$email', age='$age', blood_group='$bgroup', nationality='$nationality', citizenship_no='$citizenshipno',citizenship_issued_from= '$citizenshipissued',father_name='$fname',mother_name='$mname',spouse_name='$sname' WHERE citizenship_no = $personal_id");
	
	 	header("location: personallist.php");


}
?>

