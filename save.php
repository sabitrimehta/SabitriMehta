<?php
if(isset($_POST['next'])){

session_start();
if (isset($_POST['next'])) {

	$fname      = $_POST['first_name'];
	$mname      = $_POST['middle_name'];
	$lname      = $_POST['last_name'];
	$gender     = $_POST['gender'];
	$contact    = $_POST['contact'];
	$email      = $_POST['email'];
	$department = $_POST['department'];

	$query = "INSERT INTO employee_details (first_name,middle_name,last_name,gender,contact,email,department) VALUES('$fname','$mname','$lname','$gender','$contact','$email','$department')";
	$result=mysqli_query($conn,$query);
	$e_id = mysqli_insert_id($conn);
	$_SESSION["employee_id"] = $e_id;

	if ( mysqli_query($conn,$query)) {
		//echo "Data inserted into Database";
		header("Location:address.php");
		die();
	}
	else{
		echo "failed to save data $query. ".mysql_error($conn);
	}

}
?>
