<?php
include("connection1.php");
$id = $_GET['id'];
$empdepartment = mysqli_query ($conn, "DELETE FROM empdepartment.*,department.dept_name,position.position_name
     FROM empdepartment join department on empdepartment.de_id=department.de_id join position on empdepartment.position_id=position.position_id WHERE dept_id=$id");
header('Refresh:1; url = academicview.php');
?>