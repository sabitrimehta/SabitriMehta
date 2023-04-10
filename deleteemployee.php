<?php
include("connection1.php");
$id = $_GET['id'];
$employee = mysqli_query($conn,"DELETE  FROM `employee_details` WHERE e_id = $id");
header('Refresh:1; url = menu.php');
?>