<?php
include("connection1.php");
$id = $_GET['id'];
$address = mysqli_query ($conn, "DELETE FROM academic.*,level.level_name,board.board_name
     FROM academic join level on academic.level_id=level.level_id join board on academic.board_id=board.board_id WHERE ac_id=$id");
header('Refresh:1; url = academicview.php');
?>