<?php
include("connection1.php");
$id = $_GET['id'];
$employee = mysqli_query($conn,"DELETE  FROM `personal_details` WHERE citizenship_no=$id");
header('Refresh:1; url = personallist.php');
?>