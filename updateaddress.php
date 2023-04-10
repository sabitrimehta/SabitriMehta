 <?php
include("connection1.php");
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Update Employee Address</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<div class="center">
	 <?php include("connection1.php");
    $address_id =$_GET['id'];
    $sql = mysqli_query ($conn, "SELECT address.*,country.c_name,district.d_name,province.p_name,city.ct_name
     FROM address join country on address.c_id=country.c_id join district on address.d_id=district.d_id 
    join province on address.p_id=province.p_id join city on address.ct_id=city.ct_id  WHERE add_id= $address_id");
    ?>

		<form action="#" method="POST">
			<?php while($address = mysqli_fetch_array($sql)){?>

		<h1>Update Employee Address</h1>
		<div class="form">
			

			<select class="textfield" name="add_type">
				<option value="Not_ selected">Select Address Type</option>
				<option value="permanent"
				 <?php
						if($address['add_type']=='permanent'){
							echo "selected";
						}
					?>
				>
				Permanent</option>
				<option value="temporary"
				 <?php
						if($address['add_type']=='temporary'){
							echo "selected";
						}
					?>
				>
				Temporary</option>
			</select>

				<input type="text" name="country" class="textfield" placeholder="update country"value="<?php echo $address['c_name'];?>" >
			      <input type="hidden" name="c_id" value="<?php echo $address['c_id']?>">

	

				<input type="text" name="province" class="textfield" placeholder="update country"value="<?php echo $address['p_name'];?>" >
				<input type="hidden" name="p_id" value="<?php echo $address['p_id']?>">

                 <input type="text" name="district" class="textfield" placeholder="update district"value="<?php echo $address['d_name'];?>" >
			    <input type="hidden" name="d_id" value="<?php echo $address['d_id']?>">
	

			
            <input type="text" name="city" class="textfield" placeholder="update city"value="<?php echo $address['ct_name'];?>" >
		    <input type="hidden" name="ct_id" value="<?php echo $address['ct_id']?>">

			<input type="text" name="ward_no" class="textfield" placeholder="ward_no" value="<?php echo $address['ward_no']?>">

			<input type="text" name="tole" class="textfield" placeholder="Tole Name" value="<?php echo $address['tole']?>">

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
$add_id = $_GET['id'];
$c_id = $_POST['c_id'];
$p_id = $_POST['p_id'];
$d_id = $_POST['d_id'];
$ct_id = $_POST['ct_id'];
$address = $_POST['address'];
$country = $_POST['country'];
$district = $_POST['district'];
$province =  $_POST['province'];
$addtype =$_POST['add_type'];
$city =$_POST['city'];
$ward =$_POST['ward_no'];
$tole =$_POST['tole'];	
$result = mysqli_query($conn, "UPDATE address SET add_type ='$addtype', ward_no=$ward , tole='$tole' WHERE add_id=$add_id");
$result1 = mysqli_query($conn, "UPDATE country SET c_name='$country' WHERE c_id=$c_id");
$result2 = mysqli_query($conn, "UPDATE province SET p_name='$province' WHERE p_id=$p_id");
$result3 = mysqli_query($conn, "UPDATE district SET d_name='$district' where d_id=$d_id");
$result4 = mysqli_query($conn, "UPDATE city SET ct_name='$city' where ct_id=$ct_id");
	header("location: viewaddress.php");
}
?>

