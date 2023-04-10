<?php
include("connection1.php");
$id = $_GET['id'];
$address = mysqli_query ($conn, "DELETE FROM `address`.*,country.c_name,district.d_name,province.p_name,city.ct_name
     FROM `address` join country on address.c_id=country.c_id join `district` on address.d_id=district.d_id 
    join `province` on address.p_id=province.p_id join `city` on address.ct_id=city.ct_id  WHERE add_id = $id");
header('Refresh:1; url = viewaddress.php');
?>